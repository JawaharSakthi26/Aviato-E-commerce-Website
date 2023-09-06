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
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/assets/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{asset('/assets/frontend/css-frontend/style.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
</head>
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <aside class="col-md-3 col-lg-2 sidebar sidebar-dark bg-dark main-sidebar sidebar-dark-primary elevation-4 d-flex flex-column position-fixed">
      <div class="position-sticky">
        <a href="{{ route('home') }}" class="brand-link" style="text-decoration: none;">
          <span class="brand-text font-weight-bold text-light text-uppercase">Sumanas Tech</span>
        </a>
        <div class="sidebar-nav flex-grow-1">                
          <ul class="nav nav-pills nav-sidebar flex-column flex-column">
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt" aria-hidden="true"></i>
                  Dashboard
              </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-table" aria-hidden="true"></i>
                    Categories
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-box" aria-hidden="true"></i>
                    Add Products
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-user" aria-hidden="true"></i>
                    User List
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('orderList.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-check" aria-hidden="true"></i>
                  <p>Orders List</p>
                </a>
              </li>
                <li class="nav-item">
                  <a href="{{route('paymentList.index')}}" class="nav-link ">
                  <i class="nav-icon fas fa-solid fa-credit-card" aria-hidden="true"></i>
                    <p>Payments</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('logout')}}" class="nav-link" name="logout">
                  <i class="nav-icon fas fa-sign-out-alt" aria-hidden="true"></i>
                    <p>Log out</p>
                  </a>
                </li>
            </ul>
        </div>
    </div>
</aside>

  @yield('content')

  </div>
</div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> 

{{-- text editor tinymce in product index page  --}}
{{-- <script>
  tinymce.init({selector:'textarea'});
  var tinyMCEContent = tinymce.get('prodDescription').getContent();
  document.getElementById('prodDescription').value = tinyMCEContent;
</script> --}}

<script>
//  Image upload and display in create category page
var imageDisp = function (event) {
  var image = document.getElementById('output');
  image.src = URL.createObjectURL(event.target.files[0]);
}
</script>

{{-- File input in create category page --}}
<script>
  $(function () {
    bsCustomFileInput.init();
  });
  </script>

  {{-- Datatable in category list page --}}
<script type="text/javascript">
    $(function () {
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('category.index') }}",
          columns: [
              {"title": "Serial",
              render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
              }},
              {data: 'categoryName', name: 'categoryName'},
              {data: 'categoryPhoto', name: 'categoryPhoto',
                render: function(data, type, full, meta) {
                  return '<img src="assets/uploads/' + data + '" height="100" width="100">';
                }},
              {data:  'action', name: 'action', orderable: false, searchable: false,
                render: function(data, type, full, meta){
                  return '<a href="category/'+full.id+'/edit" class="edit btn btn-success btn-sm">Edit</a><form action="category/'+full.id+'" method="POST" style="display: inline">@method("DELETE")@csrf<button type="submit" class="btn btn-danger btn-sm mx-2" title="Delete Category">DELETE</button>';
                }
            },
          ]
      });
    });
</script>

  {{-- Datatable in category list page --}}
  <script type="text/javascript">
    $(function () {
      var table = $('.data-table-users').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('users.index') }}",
          columns: [
              {"title": "Serial",
              render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
              }},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'contact', name: 'contact'},
              {data: 'address', name: 'address'},
              {data: 'country', name: 'country'},
              {data: 'skills', name: 'skills'},
              {data: 'gender', name: 'gender'},
              {data: 'hobbies', name: 'hobbies'},
              {data:  'action', name: 'action', orderable: false, searchable: false,
                render: function(data, type, full, meta){
                  return '<a href="users/'+full.id+'/edit" class="edit btn btn-success btn-sm">Edit</a><form action="users/'+full.id+'" method="POST" style="display: inline">@method("DELETE")@csrf<button type="submit" class="btn btn-danger btn-sm mx-2" title="Delete Category">DELETE</button>';
                }
            },
          ]
      });
    });
</script>

  {{-- Datatable in category list page --}}
  <script type="text/javascript">
    $(function () {
      var table = $('.data-table-banner').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('banner.index') }}",
          columns: [
              {"title": "Serial",
              render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
              }},
              {data: 'bannerName', name: 'bannerName'},
              {data: 'bannerPhoto', name: 'bannerPhoto',
                render: function(data, type, full, meta) {
                  return '<img src="'+data+'" height="100" width="100">';
                }},
              {data:  'action', name: 'action', orderable: false, searchable: false,
                render: function(data, type, full, meta){
                  return '<a href="banner/'+full.id+'/edit" class="edit btn btn-success btn-sm">Edit</a><form action="banner/'+full.id+'" method="POST" style="display: inline">@method("DELETE")@csrf<button type="submit" class="btn btn-danger btn-sm mx-2" title="Delete Category">DELETE</button>';
                }
            },
          ]
      });
    });
</script>
<script>
  Dropzone.options.uploadForm = {
    // The configuration options for your dropzone
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 100,
    maxFiles: 100,
  
    // The initialization function for your dropzone
    init: function() {
      var myDropzone = this;
  
      // Process the queue when the submit button is clicked
      document.getElementById("submitButton").addEventListener("click", function(e) {
        e.preventDefault();
        e.stopPropagation();
        myDropzone.processQueue();
      });
  
      // Handle the events for success and error
      this.on("successmultiple", function(files, response) {
        // Handle the success case
        console.log("Files were successfully uploaded!");
      });
  
      this.on("errormultiple", function(files, response) {
        // Handle the error case
        console.log("Error uploading files.");
      });
    }
  };
</script>
</html>