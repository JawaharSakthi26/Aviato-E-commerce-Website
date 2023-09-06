@extends('layouts.file')
@section('content')
<title>Aviato | Orders</title>
<body id="body">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Orders</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{route('home.index')}}">Home</a></li>
                            <li class="active">Orders</li>
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
                        <li><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                        <li><a class="active" href="{{route('orders.index')}}">Orders</a></li>
                        <li><a href="{{route('address.index')}}">Address</a></li>
                        <li><a href="{{route('profile_details.index')}}">Profile Details</a></li>
                    </ul>
                    <div class="dashboard-wrapper user-dashboard">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Items</th>
                                        <th>Total Price</th>
                                        <th>Payment Status</th>                                                                
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $item)
                                    <tr>
                                        <td>#{{$item['order_id']}}</td>
                                        <td>{{ \Carbon\Carbon::parse($item['created_at'])->format('d F Y') }}</td>
                                        <td>{{$item['total_items']}}</td>
                                        <td>${{number_format($item['total_price'], 2)}}</td>
                                        <td>
                                            @if($item['payment_status'] == 'success')
                                            <span class="label label-success">Success</span></td>
                                            @endif
                                            @if($item['payment_status'] == 'failed')
                                            <span class="label label-danger">Failed</span></td>
                                            @endif
                                            @if($item['payment_status'] == 'requires_action')
                                            <span class="label label-warning">Processing</span>
                                        </td>
                                            @endif
                                        <td><a href="{{ route('orderDetails.show', ['orderDetail' => $item['order_id']]) }}" class="btn btn-default">View</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
@endsection