@extends('layouts.file')
@section('content')
<title>Aviato | Dashboard</title>
<body id="body">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Dashboard</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{route('home.index')}}">Home</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline dashboard-menu text-center">
                        <li><a class="active" href="{{route('dashboard.index')}}">Dashboard</a></li>
                        <li><a href="{{route('orders.index')}}">Orders</a></li>
                        <li><a href="{{route('address.index')}}">Address</a></li>
                        <li><a href="{{route('profile_details.index')}}">Profile Details</a></li>
                    </ul>
                    <div class="dashboard-wrapper user-dashboard">
                        <div class="media">
                            <div class="pull-left">
                                <img class="media-object user-img" src="{{asset('assets/frontend/img-frontend/no_image_available.jpg')}}" alt="Image">
                            </div>
                            <div class="media-body">
                                <h2 class="media-heading">Welcome, {{auth()->user()->name}} !</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, iure, est. Sit mollitia est maxime! Eos
                                    cupiditate tempore, tempora omnis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, nihil. </p>
                            </div>
                        </div>
                        <div class="total-order mt-20">
                            <h4>Total Orders</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Date</th>
                                            <th>Items</th>
                                            <th>Total Price</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dashboard as $item)
                                    <tr>
                                        <td>#{{$item['order_id']}}</td>
                                        <td>{{ \Carbon\Carbon::parse($item['created_at'])->format('d F Y') }}</td>
                                        <td>{{$item['total_items']}}</td>
                                        <td>${{number_format($item['total_price'], 2)}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
@endsection