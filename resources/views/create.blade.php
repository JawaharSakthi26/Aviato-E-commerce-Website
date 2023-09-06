@extends('layouts.app')
@section('content')
<body class="hold-transition login-page">
    <title>{{ isset($category) ? 'Edit' : 'Create' }} Category</title>
<body class="hold-transition login-page">
<main class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Sumanas</b>&nbsp;Tech</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg text-uppercase">{{ isset($category) ? 'Edit' : 'Create' }} Category</p>
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}" method="post" id="addCategory" enctype="multipart/form-data">
                    @csrf
                    @if(isset($category))
                        @method('PATCH') <!-- Use PATCH method for updates -->
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="categoryName" placeholder="Category Name" value="{{ isset($category) ? $category->categoryName : '' }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-box"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Category Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="categoryPhoto" id="exampleInputFile" onchange="imageDisp(event)">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        <p><img id="output" src="{{ isset($category) ? asset('assets/uploads/' . $category->categoryPhoto) : '/assets/uploads/EmptyDP.webp' }}" class="img-fluid mt-3 mx-5" width="200" height="200" /></p>
                    </div>
                    <div class="col-12 mx-auto">
                        <button type="submit" class="btn btn-success btn-block my-1">{{ isset($category) ? 'Update' : 'Save' }}</button>
                    </div>
                    <div class="col-12 mx-auto">
                        <a href="{{ route('category.index') }}"><button type="button" class="btn btn-block btn-warning">Back</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
@endsection
