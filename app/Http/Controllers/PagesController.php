<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function getHome()
	{
		$services = Service::with('serviceProviders')->get();
		return view('website.home',compact('services'));
	}

	public function getServices()
	{
		$services = Service::with('serviceProviders')->get();
		return view('website.services',compact('services'));
	}

	public function getContact()
	{
		return view('website.contact');
	}

	public function getSingleServices($id)
	{
		$service = Service::find($id);
		return view('website.single-service',compact('service'));
	}
}