<x-app-layout>
	<x-slot name="header">
		<div class="container">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				{{__('Product')}}
			</h2>
		</div>
	</x-slot>

	<div class="row">
		<div class="container-fluid ">
			@if (session('status'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					data berhasil <strong>{{ session('status') }}</strong> 
				</div>
			@endif
			<div class="row d-flex justify-content-center">
				<div class="col-10">
					<a href="/product/create" class="btn btn-primary float-right mb-3 mt-1">Add</a>
					<a href="/product/export/xlsx" class="btn btn-success float-left ml-2 mb-3 mt-1">Eport xlsx</a>
					<a href="/product/export/csv" class="btn btn-warning float-left ml-2 mb-3 mt-1">Export csv</a>
					<a href="/product/export/pdf" class="btn btn-danger float-left ml-2 mb-3 mt-1">Export pdf</a>
					<table class="table">
						<thead>
							<tr>
								<th class="text-center" scope="col" class="text-center">No</th>
								<th class="text-center" scope="col">Product Title</th>
								<th class="text-center" scope="col">Product Slug</th>
								<th class="text-center" scope="col">Product Image</th>
								<th class="text-center" scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($data as $item)
						<tr>
							<td class="text-center">{{ $loop->iteration }}</td>
								<td class="text-center">{{ $item->product_title }}</td>
								<td class="text-center">{{ $item->product_slug }}</td>
								<td class="text-center"><img src="{{ asset('/storage/img/' . $item->product_image) }}" width="50"></td>
								<td class="d-flex justify-content-center">
									<a class="btn btn-primary" href="{{ url('/product', $item->product_slug) }}">
										Show
									</a>
									<form action={{"/product/delete/" . $item->product_slug}} method="post" class="d-inline">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger ml-2">Delete</button>
									</form>
								</td>
							</tr>
							@endforeach
					
						</tbody>
					</table>
				{{ $data->links() }}
				</div>
			</div>
		</div>
	</div>
</x-app-layout>