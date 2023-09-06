@extends('layouts.app')
@section('content')
<title>Banner List</title>
<body>      
<div class="container-fluid col-12">
<div class="col-12 mt-3">
  <h4>Hello, <span class="display-6 font-italic font-weight-bolder">{{auth()->user()->name}}!</span></h4>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h2>Banner List</h2>
        </div>
        <div class="card-body">
          <div class="btn float-right">
            <a href="{{route('banner.create')}}" class="btn btn-success btn-sm" title="Create Category">Create New Banner</a>
          </div>
          <br><br>
          <div class="table-responsive">
            <table class="table table-bordered data-table-banner text-center">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Banner Name</th>
                  <th>Banner Photo</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  
<div class="back-btn text-center">
  <a href="{{route('home')}}" class="btn btn-primary btn-md mb-3" title="Go back">BACK</a>
</div>
</div>
</body>
@endsection