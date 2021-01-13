<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::orderBy('id', 'desc')->paginate(5);
        return view('product', compact('data'));
    }

    public function showProduct($slug)
    {
        $data = Product::where('product_slug', $slug)->first();//cara ke 2
        // if(!$data) abort(404);cara ke1
        return view('showproduct', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
	// {
	// 	$data = Product::table('products')->where('id',$id)->get();
	// 	return view('editproduct',compact('data'));
    // }
    
    
    public function create()
    {
        return view('create');
    }
    
    public function store(Request $request) {
			$request->validate([
				'product_title' => 'required|unique:products',
				'product_price' => 'required|numeric',
				'category_id' => 'required|numeric',
				'product_image' => 'required|mimes:jpeg,bmp,png,jfif,jpg'
			]);

        $image =  $request->product_image;
        $imageName = $image->getClientOriginalName();
        $image->storeAs('/public/img', $imageName);
        
        $product = new Product;
        $product->product_title = $request->product_title;
        $product->product_price = $request->product_price;
        $product->category_id = $request->category_id;
        $product->product_slug = Str::slug($request->product_title);
        $product->product_image = $imageName;
        $product->save();
        
        return redirect('product')->with('session', 'ditambah');
			}
			
			public function edit(Product $product) {
				$data = $product;
        return view('editproduct', compact('data'));
			}
			
			public function update(Product $product, Request $request)
			{
				$item = $product->where('id', $request->id)->first();
				$request->validate([
					'product_price' => 'required|numeric',
					'category_id' => 'required|numeric',
					'product_image' => 'required|mimes:jpeg,bmp,png,jfif,jpg',
					'product_title' => 'unique:products,product_title,'.$item->id
				]);

				if( $request->hasFile('product_image') ) {
					if( $request->file('product_image')->getClientOriginalName() == $item->product_image ) {
						Product::where('id', $request->id)->update([
							'product_title' => $request->product_title,
							'category_id' => $request->category_id,
							'product_price' => $request->product_price,
							'product_slug' => Str::slug($request->product_title)
						]);
					} else {
						$image = $request->file('product_image');
						$filename = $image->getClientOriginalName();
						$image->move(public_path('/storage/img/'), $filename);
						$imagefinal = $request->file('product_image')->getClientOriginalName();
						Product::where('id', $request->id)->update([
							'id' => $request->id,
							'product_title' => $request->product_title,
							'category_id' => $request->category_id,
							'product_price' => $request->product_price,
							'product_slug' => Str::slug($request->product_title),
							'product_image' => $imagefinal
						]);
					}
				}

				return redirect('product')->with('status', 'diupdate');
		}
		
		public function delete(Product $product, $slug)
		{
			$item = $product->where('product_slug', $slug)->first();

			//! Menghapus FILE Image saat data akan dihapus
			unlink(public_path('/storage/img/') . $item->product_image);
			$product->where('product_slug', $slug)->delete();


			return redirect('product');
		}

		//TODO Export File

		public function exportXL()
		{
			return Excel::download(new ProductsExport, 'products.xlsx');
		}

		public function exportCSV()//! bisa digunakan untuk membacup DATABASE
		{
			return Excel::download(new ProductsExport, 'products.csv');
		}

		public function exportPDF()
		{
			return Excel::download(new ProductsExport, 'products.pdf');
		}

		//^ Import File

		public function upload()
		{
			return view('upload');
		}

		public function uploadData(Request $input)
		{
			Excel::import(new ProductsImport, $input->file('file')->store('temp'));
			return redirect('product');
		}
}
