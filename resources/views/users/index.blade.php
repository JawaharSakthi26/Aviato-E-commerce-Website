@extends('layouts.app')
@section('content')
<title>Users | List</title>
<body>      
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="col-12 mt-3">
        <h4>Hello, <span class="display-6 font-italic font-weight-bolder">{{ auth()->user()->name }}!</span></h4>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>User List</h2>
                    </div>
                    <div class="card-body">
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered data-table-users text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Country</th>
                                        <th>Skills</th>
                                        <th>Gender</th>
                                        <th>Hobbies</th>
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