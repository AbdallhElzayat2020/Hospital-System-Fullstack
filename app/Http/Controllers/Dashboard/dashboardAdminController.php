<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class dashboardAdminController extends Controller
{
    public function index()
    {
        return view('Dashboard.Admin.dashboard');
    }

    public function test()
    {
        
    }
}
