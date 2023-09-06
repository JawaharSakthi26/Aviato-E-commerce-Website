@extends('layouts.file')
@section('content')
<title>Aviato | Address Details</title>
<body id="body">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Address Details</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{route('home.index')}}">Home</a></li>
                            <li class="active">Address Details</li>
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
                        <li><a href="{{route('orders.index')}}">Orders</a></li>
                        <li><a class="active" href="{{route('address.index')}}">Address</a></li>
                        <li><a href="{{route('profile_details.index')}}">Profile Details</a></li>
                    </ul>
                    <div class="dashboard-wrapper user-dashboard">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Country</th>
                                        <th>Zip code</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($address as $index => $item)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->address}}, {{$item->city}}</td>
                                        <td>{{$item->country}}</td>
                                        <td>{{$item->zip_code}}</td>
                                        <td>
                                            <div class="btn-group" role="group" style="white-space: nowrap;">
                                                <a href="{{ route('updateAddress.edit', $item->id) }}" class="btn btn-warning" style="margin-right: 10px;">Edit Address</a>
                                                <form action="{{ route('address.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Cancel Order</button>
                                                </form>
                                            </div>
                                        </td>
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
