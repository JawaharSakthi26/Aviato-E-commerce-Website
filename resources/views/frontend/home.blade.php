@extends('layouts.file')
@section('content')
<title>Aviato | Home</title>
<body id="body">
<div class="hero-slider">
@foreach ($banner as $banner)
    <div class="slider-item th-fullpage hero-area" style="background-image: url({{ asset('assets/bannerUploads/' . $banner->bannerPhoto)}});">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 text-center">
            <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">{{$banner->bannerName}}</h1>
          </div>
        </div>
      </div>
    </div>
@endforeach
</div>
<section class="product-category section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title text-center">
					<h2>Product Category</h2>
				</div>
			</div>
			<div class="col-md-6">
                @foreach ($productCategory as $imageCategory)
                @if ($loop->iteration == 1 )
                <div class="category-box">
					<a href="#!">
						<img src="{{ asset('assets/bannerUploads/' . $imageCategory->bannerPhoto)}}" alt="" />
						<div class="content">
							<h3>Clothes Sales</h3>
							<p>Shop New Season Clothing</p>
						</div>
					</a>	
				</div>
                @endif
                @if ($loop->iteration == 2 )
				<div class="category-box">
					<a href="#!">
						<img src="{{ asset('assets/bannerUploads/' . $imageCategory->bannerPhoto)}}" alt="" />
						<div class="content">
							<h3>Smart Casuals</h3>
							<p>Get Wide Range Selection</p>
						</div>
					</a>	
				</div>
                @endif
                @endforeach
			</div>
			<div class="col-md-6">
                @foreach ($productCategory as $imageCategory)
                @if ($loop->iteration == 3 )
				<div class="category-box category-box-2">
					<a href="#!">
						<img src="{{ asset('assets/bannerUploads/' .$imageCategory->bannerPhoto) }}" alt="" />
						<div class="content">
							<h3>Boys Casuals</h3>
							<p>Special Design Comes First</p>
						</div>
					</a>	
				</div>
                @endif
                @endforeach
			</div>
		</div>
	</div>
</section>
<section class="products section bg-gray">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2>Trendy Products</h2>
			</div>
		</div>
		<div class="row">
            @foreach ($trendyProducts as $trendyImage)
            @if($loop->iteration <=6)
            <div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
						<span class="bage">Sale</span>
						<img class="img-responsive" src="{{ asset('assets/bannerUploads/' . $trendyImage->bannerPhoto)}}" alt="product-img" />
						<div class="preview-meta">
							<ul>
								<li>
									<span  data-toggle="modal" data-target="#product-modal">
										<i class="tf-ion-ios-search-strong"></i>
									</span>
								</li>
								<li>
			                        <a href="#!" ><i class="tf-ion-ios-heart"></i></a>
								</li>
								<li>
									<a href="#!"><i class="tf-ion-android-cart"></i></a>
								</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="product-single.html">{{$trendyImage->bannerName}}</a></h4>
						<p class="price">200</p>
					</div>
				</div>
			</div>
            @endif
            @endforeach
		</div>
	</div>
</section>
</body>
@endsection