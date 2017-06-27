@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">Add Service</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form" method="POST" action="{{ route('sp-services.store') }}">
			{{ csrf_field() }}
			
			<div class="form-group{{ $errors->has('service') ? ' has-error' : '' }}">
		        <label for="name" class="col-md-4 control-label">Select Service</label>

		        <div class="col-md-6">
		           <select id="service" class="form-control" name="service" value="{{ old('service') }}" required >
		                <option></option>
		                @foreach($services as $service)
		                    <option value="{{ $service->id }}">
		                    {{ $service->name }}</option>
		                @endforeach
		            </select>

		            @if ($errors->has('service'))
		                <span class="help-block">
		                    <strong>{{ $errors->first('service') }}</strong>
		                </span>
		            @endif
		        </div>
		    </div>

		    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
				<label for="price" class="col-md-4 control-label">Price</label>
				<div class="col-md-6">
					<input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}" required autofocus>
					@if ($errors->has('price'))
					<span class="help-block">
						<strong>{{ $errors->first('price') }}</strong>
					</span>
					@endif
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="submit" class="btn btn-primary">
					Submit
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">My Services</div>
	<div class="panel-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>price</th>
				</tr>
			</thead>
			<tbody>
				@foreach($my_services as $service)
				<tr>
					<th scope="row">{{ $loop->iteration }}</th>
					<td>{{ $service->name }}</td>
					<td>{{ $service->pivot->price }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection