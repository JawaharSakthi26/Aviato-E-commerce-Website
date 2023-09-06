@extends('layouts.file')
@section('content')
<title>Aviato | Profile Details</title>
<body id="body">
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content">
                        <h1 class="page-name">Profile Details</h1>
                        <ol class="breadcrumb">
                            <li><a href="{{route('home.index')}}">Home</a></li>
                            <li class="active">Profile Details</li>
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
              <li><a href="{{route('address.index')}}">Address</a></li>
              <li><a class="active"  href="{{route('profile_details.index')}}">Profile Details</a></li>
            </ul>
            <div class="dashboard-wrapper dashboard-user-profile">
              <div class="media">
                <div class="pull-left text-center" href="#!">
                  <img class="media-object user-img" src="{{asset('assets/frontend/img-frontend/no_image_available.jpg')}}" alt="Image">
                </div>
                <div class="media-body">
                  <ul class="user-profile-list">
                    <li><span>Full Name:</span>{{auth()->user()->name}}</li>
                    <li><span>Email:</span>{{auth()->user()->email}}</li>
                    <li><span>Phone:</span>{{auth()->user()->contact}}</li>
                    <li><span>Address:</span>{{auth()->user()->address}}</li>
                    @php
                        $countryArr = ["1" => "India", "2" => "Canada", "3" => "USA"];   
                        $selectedCountryNumber = auth()->user()->country; 
                        $selectedCountry = isset($countryArr[$selectedCountryNumber]) ? $countryArr[$selectedCountryNumber] : '';
                    @endphp
                    <li><span>Country:</span>{{ $selectedCountry }}</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</body>
@endsection