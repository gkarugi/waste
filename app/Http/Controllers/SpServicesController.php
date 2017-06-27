<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SpServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$all_services = Service::all();
    	$my_services = \Auth::user()->serviceProvider->services;

    	$services = $all_services->diff($my_services);
                
        return view('service_providers.services.index',compact('services','my_services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
    	$service = (int) $request->service;
    	$price = (int) $request->price;
    	$service_provider = \Auth::user()->serviceProvider;
    	
        $service_provider->services()->attach($service, ['price' => $price]);

        return redirect()->back()->withMessage('Success');
    }
}
