<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getAdminDashboard()
    {
    	return view('admin.dashboard');
    }

    public function getSpDashboard()
    {
    	return view('service_providers.dashboard');
    }
}
