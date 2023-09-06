<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/assets/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{asset('/assets/plugins/fontawesome-free-5.15.4-web/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/assets/css/adminlte.min.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

@yield('content')

 <!-- jQuery -->
 <script src="{{ asset('/assets/plugins/jquery/jquery.min.js') }}"></script>
 <!-- Bootstrap 4 -->
 <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <!-- AdminLTE App -->
 <script src="{{ asset('/assets/js/adminlte.min.js') }}"></script>
 <script src="{{ asset('/assets/js/adminlte.js') }}"></script>
 <!-- jquery-validation -->
 <script src="{{ asset('/assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
 <script src="{{ asset('/assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>
 <script src="{{ asset('/assets/js/registerValidate.js') }}"></script>
 <script src="{{ asset('/assets/js/loginValidate.js') }}"></script>
 <script src="{{ asset('/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
 <script src="{{ asset('/assets/plugins/tinymce_6.6.1/tinymce/js/tinymce/tinymce.min.js')}}"></script>