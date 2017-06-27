@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">Service Providers</div>
	<div class="panel-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<th scope="row">{{ $loop->iteration }}</th>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection