@extends('layouts/app')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-inline">
          <a href="product" class="d-inline btn btn-secondary">back</a>
          <h2>upload file</h2>
        </div>
        <div class="card-body">
          <form action="product/upload/data" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="file">upload a file</label>
              <input type="file" class="form-control-file" name="file" id="file" placeholder="file" aria-describedby="fileHelpId">
            </div>
            <button type="submit" class="btn btn-primary">send</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection