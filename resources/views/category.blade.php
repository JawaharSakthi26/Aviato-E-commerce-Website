  @extends('layouts.app')
  @section('content')
  <title>Categories</title>
  <body>      
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="container mt-3">
          <h4>Hello, <span class="display-6 font-italic font-weight-bolder">{{ auth()->user()->name }}</span></h4>
          <div class="row">
              <div class="col-12 mt-3">
                  <div class="card">
                      <div class="card-header">
                          <h2>Category List</h2>
                      </div>
                      <div class="card-body">
                          <div class="btn float-right">
                              <a href="{{ route('category.create') }}" class="btn btn-success btn-sm"
                                  title="Create Category">Create Category</a>
                          </div>
                          <br><br>
                          <div class="table-responsive">
                              <table class="table table-bordered data-table text-center">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>Category Name</th>
                                          <th>Category Photo</th>
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
  </main>
  </body>
  @endsection