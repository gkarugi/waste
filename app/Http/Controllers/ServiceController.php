<?php

namespace App\Http\Controllers;

use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_ext = $file->getClientOriginalExtension();
            $timestamp = str_replace([' ',':'],'-',Carbon::now()->toDateTimeString());
            $name = $timestamp.'.'.$file_ext;
            $path = $file->storeAs('services',$name, 'public');
        }
        
        $service = new Service();
        $service->name = $data['name'];
        $service->price = $data['price'];
        $service->description = $data['description'];
        $service->image = $path;

        $service->save();

        return redirect()->route('services.index')->withMessage('Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('admin.services.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $service = Service::find($service)->first();
        return view('admin.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $data = $request->except('_token');
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_ext = $file->getClientOriginalExtension();
            $timestamp = str_replace([' ',':'],'-',Carbon::now()->toDateTimeString());
            $name = $timestamp.'.'.$file_ext;
            $path = $file->storeAs('services',$name, 'public');
        }

        $service = Service::find($service)->first();

        $service->name = $data['name'];
        $service->price = $data['price'];
        $service->description = $data['description'];

        if($request->hasFile('image')){
            $service->image = $path;
        }

        $service->save();

        return redirect()->route('services.index')->withMessage('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service = Service::find($service)->first();
        $service->delete();

        return redirect()->route('services.index')->withMessage('Success');
    }
}
