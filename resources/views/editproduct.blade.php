@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 bg-white">
        
    </div> 

    <div class="col-12 bg-white">
        <div class="card">
            <div class="card-header bg-primary">
                <a href="{{ url('/product') }}">
                    <button class="btn btn-success float-left mr-2">Back</button>
                </a>
                <h2>Edit</h2>
            </div>
            <div class="card-body">

                <form action={{"/product/update/" . $data->id}} method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id" value={{$data->id}}>
                    <div class="form-group">
                        <label for="product_title">Product Title</label>
                        <input type="text" class="form-control @error('product_title') is-invalid @enderror" value="{{$data->product_title}}" name="product_title">
                        @error('product_title')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="title">product price</span>
                    </div>
                    <input type="text" class="form-control @error('product_price') is-invalid @enderror" name="product_price" aria-describedby="product_price" value="{{ $data->product_price }}">
                    @error('product_price')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="title">Category</span>
                    </div>
                    <input type="text" class="form-control @error('category_id') is-invalid @enderror" name="category_id" aria-describedby="category_id" value="{{ $data->category_id }}">
                    @error('product_price')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <img src="{{ asset('/storage/img/' . $data->product_image) }}" width="100">
                    <div class="input-group mb-3 col-6">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="padding: 0 30px;" id="imagelabel">Upload</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="product_image" style="cursor: pointer" id="image" value="{{ old('image') }}" aria-describedby="imagelabel">
                          <label class="custom-file-label" for="product_image">Choose file</label>
                        </div>
                      </div>
                    <input class="btn btn-primary float-right" type="submit" value="Simpan Data">
                </form>
            </div>
        </div>
    </div>

       
</div>    
@endsection


