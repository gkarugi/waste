@extends('layouts.site-main')

@section('page')
<section class="section" id="services">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h3 class="text-uppercase font-bold">Make Your Order for the Service</h3>
				<div class="title-hr"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-md-offset-4">
				<p class="sub-title">
					<ol>
						<li>Go to Mpesa </li>
						<li>Lipa na Mpesa</li>
						<li>Then Paybill </li>
						<li>Enter business No. as 855601</li>
						<li>Enter account No. as your name </li>
						<li>Enter amount</li>
						<li>Your Order will be processed as soon as we receive the transaction</li>
					</ol>
				</p>
			</div>
			<p></p>
			<p></p>
			<div class="col-sm-4 col-md-offset-5">
				<a href="{{ route('make.order', $service->id) }}" onclick="event.preventDefault();
				document.getElementById('order-form').submit();" class="btn btn-lg btn-success text-center">Make Order</a>
				<form id="order-form" action="{{ route('make.order', $service->id) }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
			</div>
		</div>
	</div>
</section>

@endsection