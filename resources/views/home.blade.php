@extends('layouts.app')
@section('content')
<style>
  a.btn.btn-dark:hover {
    background-color: #3c3d3e;
    color: #fff;
}
</style>
<title>Home</title>
        <!-- Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="container mt-3 d-flex justify-content-between align-items-center">
              <h4>Hello, <span class="display-4 font-italic font-weight-bolder">{{ auth()->user()->name }}!</span></h4>
              <a href="{{ route('home.index') }}" class="btn btn-dark" style="transition: background-color 0.2s;">
                User Module
            </a>
          </div>
      </main>
@endsection
