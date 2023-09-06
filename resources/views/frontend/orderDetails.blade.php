@extends('layouts.file')
@section('content')
<title>Aviato | Order Details</title>
<body id="body">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Your Orders</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{route('home.index')}}">Home</a></li>
                            <li class=""><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                            <li class="active">Order Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="page-wrapper">
      <div class="cart shopping">
          <div class="container">
              <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                      <div class="block">
                        <div class="order-info">
                          <div class="row">
                              <div class="col-md-6">
                                  <h5>Order ID: {{ $order->id }}</h5>
                              </div>
                              <div class="col-md-6 text-right">
                                  <h5>Order Date: {{ $order->created_at->format('M j, Y') }}</h5>
                              </div>
                          </div>
                      </div>
                          <div class="product-list">
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th class="">Item Name</th>
                                          <th class="">Item Quantity</th>
                                          <th class="">Item Total Price</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($orderDetails as $orderDetail)
                                      <tr>
                                          <td>
                                              <div class="product-info">
                                                  @php
                                                  $product = $orderDetail->product;
                                                  @endphp
                                                  @if ($product)
                                                  @foreach ($product->images as $image)
                                                  @php
                                                  $imagePath = asset('assets/productUploads/'.$product->id.'/'.$image->prodImages);
                                                  @endphp
                                                  <img width="80" src="{{ $imagePath }}" alt="Product Image" />
                                                  @break
                                                  @endforeach
                                                  <a href="{{ route('productdetails.index',['productId' => $product->id]) }}">{{ $product->prodName }}</a>
                                                  @endif
                                              </div>
                                          </td>
                                          <td>{{ $orderDetail->quantity }}</td>
                                          <td>{{number_format($orderDetail->total_price,2) }}</td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                              <div class="order-total">
                                  <b class="text-danger">Total Amount: ${{number_format($order->product_total,2) }}</b>
                              </div>
                              <div class="text-center">
                                  <a href="{{ route('orders.index') }}" class="btn btn-main">GO BACK</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</body>
@endsection