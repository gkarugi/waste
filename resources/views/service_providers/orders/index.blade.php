@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">My Orders</div>
	<div class="panel-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Customer Name</th>
					<th>email</th>
					<th>Service Name</th>
					<th>price</th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $order)
				<tr>
					<th scope="row">{{ $loop->iteration }}</th>
					<td>{{ $order->user->name }}</td>
					<td>{{ $order->user->email }}</td>
					<td>{{ $order->service->name }}</td>
					<td>{{ $order->price }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection