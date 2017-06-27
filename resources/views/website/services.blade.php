@extends('layouts.site-main')

@section('page')
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
@endsection