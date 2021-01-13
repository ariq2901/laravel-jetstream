@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card boxs-card">
            <div class="card-header bg-primary">
                <a href="{{ url('/product') }}">
                    <button class="btn btn-success float-left mr-2">Back</button>
                </a>
                <h2 class="float-right">Create</h2>
            </div>
            <div class="card-body">
              <form action="/product/store" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="title">product title</span>
                  </div>
                  <input type="text" class="form-control @error('product_title') is-invalid @enderror" name="product_title" aria-describedby="product_title" value="{{ old('product_title') }}">
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
                  <input type="text" class="form-control @error('product_price') is-invalid @enderror" name="product_price" aria-describedby="product_price" value="{{ old('product_price') }}">
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
                  <input type="number" class="form-control @error('category_id') is-invalid @enderror" name="category_id" aria-describedby="category_id" value="{{ old('category_id') }}">
                  @error('category_id')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="input-group mb-3 @error('image') invalid-error @enderror">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="padding: 0 30px;" id="imagelabel">Upload</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="product_image" style="cursor: pointer" id="image" value="{{ old('image') }}" aria-describedby="imagelabel">
                    <label class="custom-file-label" for="product_image">Choose file</label>
                  </div>
                </div>
                @error('product_image')
                  <div class="text-danger" style="margin-top: -20px">
                    <small>{{ $message }}</small>
                  </div>
                @enderror
                <button class="btn btn-primary float-right" type="submit" value="Simpan Data">Get request</button>
              </form>
            </div>
        </div>
    </div>

       
</div>    
@endsection


