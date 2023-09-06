@extends('layouts.app')
  @section('content')
  <title>Add Products</title>
  <body>      
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container mt-3">
            <h4>Hello, <span class="display-6 font-italic font-weight-bolder">{{ auth()->user()->name }}</span></h4>
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h2>Add Product</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('product.store') }}" id="upload-form" class="dropzone"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" id="category" name="category">
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach ($categoryName as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="prodName">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="prodDescription" name="prodDescription"
                                        rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="sku" class="form-label">Stock Keeping Unit</label>
                                    <input type="text" class="form-control" id="prodSku" name="prodSku">
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="prodQuantity"
                                        name="prodQuantity" min="1">
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="prodPrice" name="prodPrice">
                                </div>
                                <div class="my-3 text-center">
                                    <button type="submit" id="submitButton" class="btn btn-success">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
  </body>
  @endsection