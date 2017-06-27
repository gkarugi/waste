@extends('layouts.site-main')

@section('page')
	<style type="text/css">
		.bg-img {
		  background: url("{{ asset('website/images/7.jpg') }}");
		  background-size: cover;
		  position: relative;
		}
	</style>
	<!-- HOME -->
	<section class="home bg-img" id="home">
		<div class="bg-overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<div class="home-wrapper">
						<h1 class="animated fadeInDown wow" data-wow-delay=".1s">Taka garbage Collection</h1>
						 <h4 class="animated fadeInDown wow" data-wow-delay=".2s">A platform of connecting users to efficient Garbage collection services at affordable prices</h4>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END HOME -->
	<!-- FEATURES-1 -->
	<section class="section" id="services">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h3 class="text-uppercase font-bold">Our Services</h3>
					<div class="title-hr"></div>
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<p class="sub-title">We offer the best garbage collection services in the market at affordable prices</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row text-center">
				@foreach($services as $service)
	                <div class="col-sm-4 wow fadeInLeft animated">
		                <a href="{{ route('frontend-services.show',$service->id) }}">
		            		<div class="services-box">
		                        <div class="text-center">
		                            <img class="img-responsive" src="{{ \Storage::disk('public')->url($service->image) }}" alt="{{ $service->name }}">
		                        </div>

		                        <div>
		                            <h4 class="font-bold">{{ $service->name }}</h4>
		                            <p class="text-muted">{{ $service->description }}</p>
		                        </div>
		                    </div>
		                </a>   
	                </div>
	            @endforeach
			</div>
		</div>
	</section>
	<!-- END FEATURES-1 -->

	<!-- SCREENSHOTS -->
	<section class="section" id="works">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h3 class="text-uppercase font-bold zoomIn animated wow">Gallery</h3>
					<div class="title-hr"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<a href="{{ asset('images/screenshots/1.jpg') }}" class="thumb preview-thumb image-popup" title="Screenshot-1">
						<img src="{{ asset('website/images/1.jpg') }}" class="thumb-img" alt="work-thumbnail">
					</a>
				</div>
				<div class="col-sm-4">
					<a href="{{ asset('images/screenshots/2.jpg') }}" class="thumb preview-thumb image-popup" title="Screenshot-2">
						<img src="{{ asset('website/images/2.jpg') }}" class="thumb-img" alt="work-thumbnail">
					</a>
				</div>
				<div class="col-sm-4">
					<a href="{{ asset('images/screenshots/3.jpg') }}" class="thumb preview-thumb image-popup" title="Screenshot-3">
						<img src="{{ asset('website/images/3.jpg') }}" class="thumb-img" alt="work-thumbnail">
					</a>
				</div>
			</div>
			<!-- end row -->
			<div class="row">
				<div class="col-sm-4">
					<a href="{{ asset('images/screenshots/4.jpg') }}" class="thumb preview-thumb image-popup" title="Screenshot-4">
						<img src="{{ asset('website/images/4.jpg') }}" class="thumb-img" alt="work-thumbnail">
					</a>
				</div>
				<div class="col-sm-4">
					<a href="{{ asset('images/screenshots/5.jpg') }}" class="thumb preview-thumb image-popup" title="Screenshot-5">
						<img src="{{ asset('website/images/5.jpg') }}" class="thumb-img" alt="work-thumbnail">
					</a>
				</div>
				<div class="col-sm-4">
					<a href="{{ asset('images/screenshots/6.jpg') }}" class="thumb preview-thumb image-popup" title="Screenshot-6">
						<img src="{{ asset('website/images/6.jpg') }}" class="thumb-img" alt="work-thumbnail">
					</a>
				</div>
			</div>
			<!-- end row -->
		</div>
	</section>
	<!-- END SCREENSHOTS -->
@endsection