@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">Service Providers <span class="pull-right"><a href="{{ route('service-providers.create') }}" class="btn btn-xs btn-success">Create New</a></span></div>
	<div class="panel-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Location</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($service_providers as $service_provider)
				<tr>
					<th scope="row">{{ $loop->iteration }}</th>
					<td>{{ $service_provider->user->name }}</td>
					<td>{{ $service_provider->user->email }}</td>
					<td>{{ $service_provider->phone }}</td>
					<td>{{ $service_provider->location }}</td>
					<td>
						<div class="dropdown">
							<button class="btn btn-xs btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Actions
							<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a href="{{ route('service-providers.edit', $service_provider ->id) }}">Edit</a></li>
								<li>
									<a href="{{ route('service-providers.destroy', $service_provider ->id) }}" onclick="event.preventDefault();
										document.getElementById('delete-form{{ $service_provider->id }}').submit();">
										Delete
									</a>
								</li>
								<form id="delete-form{{ $service_provider->id }}" action="{{ route('service-providers.destroy', $service_provider ->id) }}" method="POST" style="display: none;">
									{{ Form::hidden('_method', 'DELETE') }}
									{{ csrf_field() }}
								</form>
							</ul>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection