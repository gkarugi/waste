@extends('layouts.site-main')

@section('page')
<section id="features">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <p></p>
                <div class="feature-1">
                    <img src="{{ \Storage::disk('public')->url($service->image) }}" class="img-responsive" alt="{{ $service->name }}">
                </div>
                <p></p>
            </div>
            <div class="col-sm-6">
                <div class="feature-detail">
                    <h1 class="title animated fadeInRight wow" data-wow-delay=".1s">{{ $service->name }}</h1>
                    <p class="features-txt animated fadeInRight wow" data-wow-delay=".5s">{{ $service->description }}</p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="panel panel-default">
                <div class="panel-heading">Service Providers providing this service</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($service->serviceProviders as $serviceProvider)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$serviceProvider->user->name}}</td>
                                <td>{{$serviceProvider->pivot->price}}</td>
                                <td>
                                    <a href="{{ route('save.order', $service->id) }}" onclick="event.preventDefault();
                                        document.getElementById('order-form').submit();" class="btn btn-xs btn-success">Order</a>
                                    <form id="order-form" action="{{ route('save.order', $service->id) }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="service" value="{{ $service->id }}">
                                        <input type="hidden" name="sp" value="{{ $serviceProvider->id }}">
                                        <input type="hidden" name="price" value="{{ $serviceProvider->pivot->price }}">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection