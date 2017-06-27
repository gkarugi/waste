@extends('layouts.site-main')

@section('page')

<section class="section" id="contact">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center title-box">
				<h3 class="title">Get In Touch</h3>
				<p class="text-muted sub-title">Please fill out the following form and we will get back to you shortly</p>
				<div class="title-line"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				@if(Session::has('message'))
				<p id="kialart" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
				@elseif(Session::has('error'))
				<p id="kialart" class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
				@endif
				
				<form class="form-horizontal" role="form" method="POST" action="{{ route('contactSendEmail') }}">
					{{ csrf_field() }}
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						
						<div class="col-md-6">
							<label for="name" class="control-label">Your Name</label>
							<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
							@if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
							@endif
						</div>
						<div class="col-md-6">
							<label for="email" class="control-label">Your E-Mail Address</label>
							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
							@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
						
						<div class="col-md-12">
							<label for="subject" class="control-label">Subject</label>
							<input id="subject" type="text" class="form-control" name="subject" value="{{ old('subject') }}" required>
							@if ($errors->has('subject'))
							<span class="help-block ">
								<strong>{{ $errors->first('subject') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
						
						<div class="col-md-12">
							<label for="message" class="control-label">Your Message</label>
							<textarea id="message" class="form-control" name="message" required> {{ old('message') }}</textarea>
							@if ($errors->has('message'))
							<span class="help-block">
								<strong>{{ $errors->first('message') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-center">
							<!-- reCAPTCHA -->
							<div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
							<!-- /reCAPTCHA -->
							@if ($errors->has('g-recaptcha-response'))
							<span style="color: red">
								<strong>{{ $errors->first('g-recaptcha-response') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row">
						<div class=" col-sm-12 text-center">
							<button type="submit" class="btn btn-primary">
							Send Message
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection