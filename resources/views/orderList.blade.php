@extends('layouts.app')

@section('content')
<title>Order List</title>
        <!-- Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container mt-3">
                <h1>Order Details</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product ID</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderDetails as $orderDetail)
                        <tr>
                            <td>#{{ $orderDetail->order_id }}</td>
                            <td>{{ $orderDetail->product_id }}</td>
                            <td>{{ $orderDetail->quantity }}</td>
                            <td>${{number_format($orderDetail->price,2) }}</td>
                            <td>${{number_format($orderDetail->total_price,2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
@endsection
