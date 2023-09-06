@extends('layouts.app') 
@section('content')
<title>Payments</title>
<body>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container mt-3">
            <h1>Payment Summary</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Total Items</th>
                        <th>Total Price</th>
                        <th>Payment Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <td>#{{ $payment['order_id'] }}</td>
                        <td>{{ $payment['total_items'] }}</td>
                        <td>${{ number_format($payment['total_price'], 2) }}</td>
                        <td>
                            @if($payment['payment_status'] === 'success')
                            <span class="badge badge-success">Success</span>    
                            @elseif($payment['payment_status'] === 'failed')
                            <span class="badge badge-danger">Failed</span>
                            @elseif($payment['payment_status'] === 'processing')
                            <span class="badge badge-warning">Processing</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
@endsection