@extends('layouts.file')
@section('content')
<title>Aviato | Checkout</title>
<body id="body">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Checkout</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('home.index') }}">Home</a></li>
                            <li><a href="{{ route('shop.index') }}">Shop</a></li>
                            <li><a href="{{ route('cart.index') }}">Cart</a></li>
                            <li class="active">checkout</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {!! Form::open(['route' => 'checkout.store', 'method' => 'POST', 'target' => '_parent', 'class' => 'checkout-form']) !!}
    @csrf
    <div class="page-wrapper">
      <div class="checkout shopping">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  @error('total_price')
                  <div class="alert alert-danger">
                    <p class="text-danger">{{ 'Please select items in cart.' }}</p>
                    <a href="{{ route('shop.index') }}"><b class="text-primary"><u>{{ 'Click here to Shop' }}</u></b></a>
                  </div>
                  @enderror
                  <div class="block billing-details">
                     <h4 class="widget-title">Billing Details</h4>
                        <div class="form-group">
                           {!! Form::label('name', 'Full Name') !!}
                           {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'full_name']) !!}
                           @error('name')
                           <p class="text-danger">{{ $message }}</p>
                           @enderror
                        </div>

                        <div class="form-group">
                           {!! Form::label('address', 'Address') !!}
                           {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'user_address']) !!}
                           @error('address')
                           <p class="text-danger">{{ $message }}</p>
                           @enderror
                        </div>

                        <div class="checkout-country-code clearfix">
                           <div class="form-group">
                              {!! Form::label('zip_code', 'Zip Code') !!}
                              {!! Form::text('zip_code', null, ['class' => 'form-control', 'id' => 'user_post_code']) !!}
                              @error('zip_code')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
                           <div class="form-group">
                              {!! Form::label('city', 'City') !!}
                              {!! Form::text('city', null, ['class' => 'form-control', 'id' => 'user_city']) !!}
                              @error('city')
                              <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group">
                           {!! Form::label('country', 'Country') !!}
                           {!! Form::text('country', null, ['class' => 'form-control', 'id' => 'user_country']) !!}
                           @error('country')
                           <p class="text-danger">{{ $message }}</p>
                           @enderror
                        </div>
                  </div>
                  <div class="block">
                     <h4 class="widget-title">Payment Method</h4>
                     <p>Credit Card Details (Secure payment)</p>
                     <div class="checkout-product-details">
                        <div class="payment">
                           <div class="card-details">
                              <div class="form-group">
                                 {!! Form::label('card-number', 'Card Number', ['class' => 'required']) !!}
                                 {!! Form::tel('card_number', null, ['class' => 'form-control', 'id' => 'card-number', 'maxlength' => '19', 'placeholder' => '•••• •••• •••• ••••']) !!}
                                 @error('card_number')
                                 <p class="text-danger">{{ $message }}</p>
                                 @enderror
                              </div>
                              <div class="form-group half-width padding-right">
                                 {!! Form::label('exp_month', 'Expiry (MM)', ['class' => 'required']) !!}
                                 {!! Form::tel('exp_month', null, ['class' => 'form-control', 'id' => 'card-expiry-month', 'maxlength' => '2', 'placeholder' => 'MM']) !!}
                                 @error('exp_month')
                                 <p class="text-danger">{{ $message }}</p>
                                 @enderror
                              </div>
                              <div class="form-group half-width padding-right">
                                 {!! Form::label('exp_year', 'Expiry (YYYY)', ['class' => 'required']) !!}
                                 {!! Form::tel('exp_year', null, ['class' => 'form-control', 'id' => 'card-expiry-year', 'maxlength' => '4', 'placeholder' => 'YYYY']) !!}
                                 @error('exp_year')
                                 <p class="text-danger">{{ $message }}</p>
                                 @enderror
                              </div>
                              <div class="form-group half-width padding-left">
                                 {!! Form::label('cvc', 'Card Code', ['class' => 'required']) !!}
                                 {!! Form::tel('cvc', null, ['class' => 'form-control', 'id' => 'card-cvc', 'maxlength' => '4', 'placeholder' => 'CVC']) !!}
                                 @error('cvc')
                                 <p class="text-danger">{{ $message }}</p>
                                 @enderror
                              </div>
                           </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-md-4">
                   <div class="product-checkout-details">
                      <div class="block">
                         <h4 class="widget-title">Order Summary</h4>
                           @php
                            $totalPrice = 0;
                           @endphp
                        @foreach($cart as $item)
                         <div class="media product-card">
                            <a class="pull-left" href="#">
                               <img class="media-object" src="{{ asset('assets/productUploads/'.$item->product_image) }}" alt="Image" />
                            </a>
                            <div class="media-body">
                               <h4 class="media-heading"><a href="#">{{ $item->product_name }}</a></h4>
                               <p class="price">{{ $item->product_quantity . ' x ' . $item->product_price }}</p>
                              <a href="{{ route('cart.destroy', $item->id) }}" class="remove text-danger">Remove</a>
                            </div>
                         </div>
                        @php
                            $totalPrice += $item->product_quantity * $item->product_price;
                        @endphp
                         {!! Form::hidden('product_id[]', $item->product_id) !!}
                         {!! Form::hidden('product_quantity[]', $item->product_quantity) !!}
                         {!! Form::hidden('product_price[]', $item->product_price) !!}
                         {!! Form::hidden('product_total[]', $item->product_quantity * $item->product_price) !!}
                         {!! Form::hidden('total_price',  $totalPrice) !!}

                        @endforeach
                        {!! Form::hidden('test_card_token', 'pm_card_visa') !!}
                         <div class="discount-code">
                            <p>Have a discount? <a data-toggle="modal" data-target="#coupon-modal" href="#!">Enter it here</a></p>
                         </div>
                         <ul class="summary-prices">
                            <li>
                               <span>Subtotal:</span>
                               <span class="price">${{ number_format($totalPrice, 2) }}</span>
                            </li>
                            <li>
                               <span>Shipping:</span>
                               <span>$0.00</span>
                            </li>
                         </ul>
                         <div class="summary-total">
                            <span>Total</span>
                            <span>${{ number_format($totalPrice, 2) }}</span>
                         </div>
                         <div class="verified-icon">
                            <img src="{{ asset('assets/frontend/img-frontend/verified.png') }}">
                         </div>
                         {!! Form::submit('Place Order', ['class' => 'btn btn-main mt-20']) !!}
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
       <!-- Modal -->
       <div class="modal fade" id="coupon-modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
             <div class="modal-content">
                <div class="modal-body">
                   <form>
                      <div class="form-group">
                         <input class="form-control" type="text" placeholder="Enter Coupon Code">
                      </div>
                      <button type="button" class="btn btn-main">Apply Coupon</button>
                   </form>
                </div>
             </div>
          </div>
       </div>
      {!! Form::close() !!}
</body>
@endsection
