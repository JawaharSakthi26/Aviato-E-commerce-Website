@extends('layouts.file')
@section('content')
<style>
	.product-item {
    width: 100%;
    max-width: 300px; 
    margin: 5px auto;
}

.product-thumb img {
    display: block;
    width: 100%;
    height: auto;
    max-width: 100%;
    max-height: 200px; 
    object-fit: contain;
}
</style>
<title>Aviato | Shop</title>
<body id="body">
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Shop</h1>
					<ol class="breadcrumb">
						<li><a href="{{route('home.index')}}">Home</a></li>
						<li class="active">shop</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="products section">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="widget">
					<h4 class="widget-title">Short By</h4>
					<form method="post" action="#">
                        <select class="form-control">
                            <option>Man</option>
                            <option>Women</option>
                            <option>Accessories</option>
                            <option>Shoes</option>
                        </select>
                    </form>
	            </div>
				<div class="widget product-category">
					<h4 class="widget-title">Categories</h4>
					<div class="panel-group commonAccordion" id="accordion" role="tablist" aria-multiselectable="true">
					  	<div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingOne">
						      	<h4 class="panel-title">
						        	<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          	Shoes
						        	</a>
						      	</h4>
						    </div>
					    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<ul>
									<li><a href="#!">Brand & Twist</a></li>
									<li><a href="#!">Shoe Color</a></li>
									<li><a href="#!">Shoe Color</a></li>
								</ul>
							</div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingTwo">
					      <h4 class="panel-title">
					        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					         	Duty Wear
					        </a>
					      </h4>
					    </div>
					    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					    	<div class="panel-body">
					     		<ul>
									<li><a href="#!">Brand & Twist</a></li>
									<li><a href="#!">Shoe Color</a></li>
									<li><a href="#!">Shoe Color</a></li>
								</ul>
					    	</div>
					    </div>
					  </div>
					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingThree">
					      <h4 class="panel-title">
					        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					          	WorkOut Shoes
					        </a>
					      </h4>
					    </div>
					    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
					    	<div class="panel-body">
					      		<ul>
									<li><a href="#!">Brand & Twist</a></li>
									<li><a href="#!">Shoe Color</a></li>
									<li><a href="#!">Gladian Shoes</a></li>
									<li><a href="#!">Swis Shoes</a></li>
								</ul>
					    	</div>
					    </div>
					  </div>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="row">
					@foreach($singleImages as $image)
					<div class="col-md-4 mb-4">
						<div class="product-item">
							<div class="product-thumb">
								<span class="bage">Sale</span>
								<a href="{{ route('productdetails.index', ['prodId' => $image->prod_Id]) }}">
									<img src="{{ asset('assets/productUploads/' . $image->prod_Id . '/' . $image->prodImages) }}" alt="product-img" />
								</a>
								<div class="preview-meta">
									<ul>
										<li>
											<span data-toggle="modal" data-target="#product-modal">
												<i class="tf-ion-ios-search-strong"></i>
											</span>
										</li>
										<li>
											<a href="#"><i class="tf-ion-ios-heart"></i></a>
										</li>
										<li>
											<a href="#"><i class="tf-ion-android-cart"></i></a>
										</li>
									</ul>
								</div>
							</div>
							<div class="product-content">
								<h4><a href="{{ route('productdetails.index', ['productId' => $image->prod_Id]) }}">
									{{ App\Models\Product::where('id', $image->prod_Id)->pluck('prodName')->first() }}
								</a></h4>
								<p class="price">{{ App\Models\Product::where('id', $image->prod_Id)->pluck('prod_price')->first() }}</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
        </div>
    </section>
</body>
@endsection