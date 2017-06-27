@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">Services <span class="pull-right"><a href="{{ route('services.create') }}" class="btn btn-xs btn-success">Create New</a></span></div>
	<div class="panel-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($services as $service)
				<tr>
					<th scope="row">{{$loop->iteration}}</th>
					<td>{{$service->name}}</td>
					<td>
						<div class="dropdown">
							<button class="btn btn-xs btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Actions
							<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a href="{{route('services.edit', $service ->id)}}">Edit</a></li>
								<li>
									<a href="{{ route('services.destroy', $service ->id)}}" onclick="event.preventDefault();
										document.getElementById('delete-form{{ $service->id }}').submit();">
										Delete
									</a>
								</li>
								<form id="delete-form{{ $service->id }}" action="{{ route('services.destroy', $service ->id) }}" method="POST" style="display: none;">
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