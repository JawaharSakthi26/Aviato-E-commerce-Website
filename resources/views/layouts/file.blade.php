<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
	
  <!-- theme meta -->
  <meta name="theme-name" content="aviato" />
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="{{asset('/assets/frontend/plugins-frontend/themefisher-font/style.css')}}">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset('/assets/frontend/plugins-frontend/bootstrap/css/bootstrap.min.css') }}">
  <!-- Animate css -->
  <link rel="stylesheet" href="{{asset('/assets/frontend/plugins-frontend/animate/animate.css') }}">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="{{asset('/assets/frontend/plugins-frontend/slick/slick.css') }}">
  <link rel="stylesheet" href="{{asset('/assets/frontend/plugins-frontend/slick/slick-theme.css') }}">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('/assets/frontend/css-frontend/style.css') }}">

</head>
<!-- Start Top Header Bar -->
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
				<div class="contact-number">
					<i class="tf-ion-ios-email"></i>
					<a href="#!"><span>aviato@gmail.com</span></a> 
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->
				<div class="logo text-center">
					<a href="#">
						<!-- replace logo here -->
						<svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink">
							<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
								font-family="AustinBold, Austin" font-weight="bold">
								<g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
									<text id="AVIATO">
										<tspan x="108.94" y="325">AVIATO</tspan>
									</text>
								</g>
							</g>
						</svg>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Cart -->
				<ul class="top-menu text-right list-inline">
					<li class="dropdown cart-nav dropdown-slide">
						<a href="{{route('cart.index')}}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-android-cart"></i> Cart</a>
						<div class="dropdown-menu cart-dropdown">
							@php
								$totalPrice = 0;
							@endphp
							<!-- Cart Item -->
							@foreach(\App\Models\Cart::where('user_id', Auth::id())->get() as $item)
							<div class="media">
								<a class="pull-left" href="#!">
									<img src="{{asset('assets/productUploads/'.$item->product_image)}}" alt="image" />
								</a>
								<div class="media-body">
									<h4 class="media-heading"><a href="#!">{{$item->product_name}}</a></h4>
									<div class="cart-price">
										<span>{{$item->product_quantity . ' x ' .$item->product_price}}</span>
									</div>
									<h5><strong>${{number_format($item->product_quantity * $item->product_price,2)}}</strong></h5>
								</div>
								<form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                	@csrf
                                	@method('DELETE')
									<button type="submit" style="background-color: transparent; border: none;" class="remove"><i class="tf-ion-close"></i></button>
                                </form>
							</div><!-- / Cart Item -->
							@php
								$totalPrice += $item->product_quantity * $item->product_price;
							@endphp
							@endforeach
							<div class="cart-summary">
								<span>Total</span>
								<span class="total-price">${{ number_format($totalPrice,2) }}</span>
							</div>
							<ul class="text-center cart-buttons">
								<li><a href="{{route('cart.index')}}" class="btn btn-small">View Cart</a></li>
								<li><a href="{{route('checkout.index')}}" class="btn btn-small btn-solid-border">Checkout</a></li>
							</ul>
						</div>

					</li><!-- / Cart -->
					@if(auth()->user()->email === 'admin@gmail.com')
						<li>
							<a href="{{ route('home') }}"><i class="tf-ion-person"></i> {{auth()->user()->name}} Panel</a>
						</li>
					@endif
					<!-- Search -->
					<li class="dropdown search dropdown-slide">
						<a href="{{route('logout')}}" class=""><i class="tf-ion-log-out"></i> Logout</a>
					</li><!-- / Search -->
					
				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->

<!-- Main Menu Section -->
<section class="menu">
	<nav class="navbar navigation">
		<div class="container">
			<div class="navbar-header">
				<h2 class="menu-title">Main Menu</h2>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- / .navbar-header -->

			<!-- Navbar Links -->
			<div id="navbar" class="navbar-collapse collapse text-center">
				<ul class="nav navbar-nav">

					<!-- Home -->
					<li class="dropdown ">
						<a href="{{route('home.index')}}">Home</a>
					</li><!-- / Home -->
					<!-- Elements -->
					<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Shop <span
								class="tf-ion-ios-arrow-down"></span></a>
						<div class="dropdown-menu">
							<div class="row">
								<!-- Basic -->
								<div class="col-lg-12 col-md-12 mb-sm-12">
									<ul>
										{{-- <li class="dropdown-header"></li>
										<li role="separator" class="divider"></li> --}}
										<li><a href="{{route('shop.index')}}">Shop</a></li>
										<li><a href="{{route('cart.index')}}">Cart</a></li>
										<li><a href="{{route('checkout.index')}}">Checkout</a></li>
									</ul>
								</div>
							</div>
						</div>
					</li>
					<!-- Pages -->
					<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">My Account <span
								class="tf-ion-ios-arrow-down"></span></a>
						<div class="dropdown-menu">
							<div class="row">
								<!-- Contact -->
								<div class="col-sm-12 col-xs-12">
									<ul>
										{{-- <li class="dropdown-header"></li>
										<li role="separator" class="divider"></li> --}}
										<li><a href="{{route('dashboard.index')}}">Dashboard</a></li>
										<li><a href="{{route('orders.index')}}">Orders</a></li>
										<li><a href="{{route('address.index')}}">Address</a></li>
										<li><a href="{{route('profile_details.index')}}">Profile Details</a></li>
									</ul>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</section>

@yield('content')

<section class="call-to-action bg-gray section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="title">
					<h2>SUBSCRIBE TO NEWSLETTER</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, <br> facilis numquam impedit ut sequi. Minus facilis vitae excepturi sit laboriosam.</p>
				</div>
				<div class="col-lg-6 col-md-offset-3">
				    <div class="input-group subscription-form">
				      <input type="text" class="form-control" placeholder="Enter Your Email Address">
				      <span class="input-group-btn">
				        <button class="btn btn-main" type="button">Subscribe Now!</button>
				      </span>
				    </div><!-- /input-group -->
			  </div><!-- /.col-lg-6 -->

			</div>
		</div> 		<!-- End row -->
	</div>   	<!-- End container -->
</section>   <!-- End section -->
<footer class="footer section text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="social-media">
					<li>
						<a href="#">
							<i class="tf-ion-social-facebook"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="tf-ion-social-instagram"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="tf-ion-social-twitter"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="tf-ion-social-pinterest"></i>
						</a>
					</li>
				</ul>
				<ul class="footer-menu text-uppercase">
					<li>
						<a href="#">CONTACT</a>
					</li>
					<li>
						<a href="{{route('shop.index')}}">SHOP</a>
					</li>
					<li>
						<a href="#">Pricing</a>
					</li>
					<li>
						<a href="#">PRIVACY POLICY</a>
					</li>
				</ul>
				<p class="copyright-text">Copyright &copy;2023, Designed &amp; Developed by <a href="#">J_W_H_R</a></p>
			</div>
		</div>
	</div>
</footer>

    <!-- Main jQuery -->
    <script src="{{asset('/assets/frontend/plugins-frontend/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{asset('/assets/frontend/plugins-frontend/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap Touchpin -->
    <script src="{{asset('/assets/frontend/plugins-frontend/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
    <!-- Video Lightbox Plugin -->
    <script src="{{asset('/assets/frontend/plugins-frontend/ekko-lightbox/dist/ekko-lightbox.min.js') }}"></script>
    <!-- Count Down Js -->
    <script src="{{asset('/assets/frontend/plugins-frontend/syo-timer/build/jquery.syotimer.min.js') }}"></script>
    <!-- slick Carousel -->
    <script src="{{asset('/assets/frontend/plugins-frontend/slick/slick.min.js') }}"></script>
    <script src="{{asset('/assets/frontend/plugins-frontend/slick/slick-animation.min.js') }}"></script>
    <!-- Main Js File -->
    <script src="{{asset('/assets/frontend/js-frontend/script.js') }}"></script>
  </html>