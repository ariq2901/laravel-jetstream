@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 bg-white">
        
    </div> 

    <div class="col-12 bg-white">
        <div class="card">
            <div class="card-header bg-primary">
                <a href="{{ url('/product') }}">
                    <button class="btn btn-danger float-left mr-2">Back</button>
                    <button class="btn float-right btn-danger center">Delete</button>
                    <a href="/product/edit/{{ $data->product_slug }}">
                        <button class="btn float-right mr-2 btn-success center">Edit</button>
                    </a>
                </a>
                <h2>Show</h2>
            </div>
            <div class="card-body">
                <form>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Title</label>
                        <input type="text" class="form-control" value="{{$data->product_title}}" aria-describedby="emailHelp" placeholder="Enter email" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Product Slug</label>
                        <input type="text" class="form-control" value="{{$data->product_slug}}" placeholder="Password" readonly>
                      </div>
                    </form>
                    <img src="{{ asset('/storage/img/' . $data->product_image) }}" width="50">
            </div>
        </div>
    </div>

       
</div>    
@endsection


