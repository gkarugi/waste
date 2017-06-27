@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">Create Service</div>
	<div class="panel-body">
		<form class="form-horizontal" role="form" method="POST" accept-charset="UTF-8" enctype="multipart/form-data"  action="{{ route('services.update',$service->id) }}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PATCH">
			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
				<label for="name" class="col-md-4 control-label">Name</label>
				<div class="col-md-6">
					<input id="name" type="text" class="form-control" name="name" value="{{ $service->name }}" required autofocus>
					@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>
			</div>
			<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
				<label for="price" class="col-md-4 control-label">Price</label>
				<div class="col-md-6">
					<input id="price" type="number" class="form-control" name="price" value="{{ $service->price }}" required autofocus>
					@if ($errors->has('price'))
					<span class="help-block">
						<strong>{{ $errors->first('price') }}</strong>
					</span>
					@endif
				</div>
			</div>
			<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
				<label for="description" class="col-md-4 control-label">Description</label>
				<div class="col-md-6">
					<textarea id="description" class="form-control" name="description" required> {{ $service->description }}</textarea>
					@if ($errors->has('description'))
					<span class="help-block">
						<strong>{{ $errors->first('description') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
				<label for="image" class="col-md-4 control-label">Display Picture</label>
				<div class="col-md-6">
					<input id="image" type="file" class="form-control" name="image">
					@if ($errors->has('image'))
					<span class="help-block">
						<strong>{{ $errors->first('image') }}</strong>
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
@endsection
