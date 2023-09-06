@extends('layouts.file')
@section('content')
<title>Aviato | Address Details</title>
<body id="body">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Update Address</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{route('home.index')}}">Home</a></li>
                            <li class=""><a href="{{route('dashboard.index')}}">Dashboard</li></a>
                            <li class="active">Update address</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="page-wrapper">
        <div class="checkout shopping">
           <div class="container">
              <div class="row">
                 <div class="col-md-8">
                    <div class="block billing-details">
                       <h4 class="widget-title">Update Billing Address</h4>
                       {!! Form::model($address, ['route' => ['updateAddress.update', $address->id], 'method' => 'PUT']) !!}
                           <div class="form-group">
                             {!! Form::label('name', 'Full Name') !!}
                             {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'full_name']) !!}
                           </div>
                           <div class="form-group">
                             {!! Form::label('address', 'Address') !!}
                             {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'user_address']) !!}
                           </div>
                           <div class="checkout-country-code clearfix">
                             <div class="form-group">
                                {!! Form::label('zip_code', 'Zip Code') !!}
                                {!! Form::text('zip_code', null, ['class' => 'form-control', 'id' => 'user_post_code']) !!}
                             </div>
                             <div class="form-group">
                                {!! Form::label('city', 'City') !!}
                                {!! Form::text('city', null, ['class' => 'form-control', 'id' => 'user_city']) !!}
                             </div>
                           </div>
                           <div class="form-group">
                             {!! Form::label('country', 'Country') !!}
                             {!! Form::text('country', null, ['class' => 'form-control', 'id' => 'user_country']) !!}
                           </div>
                           {!! Form::submit('Update Address', ['class' => 'btn btn-main pull-right']) !!}
                       {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
