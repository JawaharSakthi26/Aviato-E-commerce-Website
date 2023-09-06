@extends('layouts.app')
@section('content')
<body class="hold-transition login-page">
<title>Make Banner</title>
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Sumanas</b>&nbsp;Tech</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg text-uppercase">Create new Banner</p>
      @if($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
      @if (isset($banner))
      <form action="{{route('banner.update',$banner->id)}}" method="post" id="addCategory" enctype="multipart/form-data">
      @method('PATCH')
      @else
      <form action="{{route('banner.store')}}" method="post" id="addCategory" enctype="multipart/form-data">
      @endif

      @csrf
       <div class="input-group mb-3">
          <input type="text" class="form-control" name="bannerName" placeholder="Banner Name" value="{{ old('bannerName',$banner->bannerName ?? '')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-box"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Banner Image</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="bannerPhoto" id="exampleInputFile" onchange="imageDisp(event)">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
            </div>
            <p><img id="output" src="{{old('bannerPhoto',$banner->bannerPhoto ?? '/assets/uploads/EmptyDP.webp')}}" class="img-fluid mt-3 mx-5" width="200" height="200" /></p>
          </div>
        <div class="col-12 mx-auto">
          <button type="submit" class="btn btn-success btn-block my-1">Save</button>
        </div>
        <div class="col-12 mx-auto">
            <a href="{{route('banner.index')}}"><button type="button" class="btn btn-block btn-warning">Back</button></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
@endsection