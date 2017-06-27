<?php

namespace App\Http\Controllers;

use App\ServiceProvider;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_providers = ServiceProvider::all();

        return view('admin.service_providers.index',compact('service_providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service_providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        $user = \App\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt('password'),
        ]);
        
        \Bouncer::assign('service-provider')->to($user);
        
        $service_provider = new ServiceProvider();
        $service_provider->phone = $data['phone'];
        $service_provider->location = $data['location'];
        $service_provider->description = $data['description'];
        $service_provider->user()->associate($user);
        $service_provider->save();

        return redirect()->route('service-providers.index')->withMessage('Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceProvider $serviceProvider)
    {
        $service_provider = ServiceProvider::find($serviceProvider)->first();

        return view('admin.service_providers.edit',compact('service_provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceProvider $serviceProvider)
    {
        $data = $request->except('_token');

        $service_provider = ServiceProvider::find($serviceProvider)->first();


        $user = $service_provider->user;

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();
    
        $service_provider->phone = $data['phone'];
        $service_provider->location = $data['location'];
        $service_provider->description = $data['description'];
        $service_provider->save();

        return redirect()->route('service-providers.index')->withMessage('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceProvider $serviceProvider)
    {
        
    }
}
