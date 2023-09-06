@extends('layouts.file')
@section('content')
<title>Aviato | Cart</title>
<body id="body">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Cart</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{route('home.index')}}">Home</a></li>
                            <li><a href="{{route('shop.index')}}">Shop</a></li>
                            <li class="active">cart</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="page-wrapper">
      <div class="cart shopping">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="block">
                <div class="product-list">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="">Item Name</th>
                          <th class="">Item Price</th>
                          <th class="">Item Quantity</th>
                          <th class="">Total Price</th>
                          <th class="">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($cart as $item)
                        <tr class="">
                            <td class="">
                                <div class="product-info">
                                    <img width="80" src='{{ asset('assets/productUploads/' . $item->product_image) }}' alt='' />
                                    <a href="{{ route('productdetails.index', ['productId' => $item->product_id]) }}">{{ $item->product_name }}</a>
                                </div>
                            </td>
                            <td class="">${{ number_format($item->product_price,2) }}</td>
                            <td class="">{{ $item->product_quantity }}</td>
                            <td class="">${{ number_format($item->product_price * $item->product_quantity,2) }}</td>
                            <td class="">
                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="product-remove" style="background-color: transparent; border: none;">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <a href="{{route('checkout.index')}}" class="btn btn-main pull-right">Checkout</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
@endsection