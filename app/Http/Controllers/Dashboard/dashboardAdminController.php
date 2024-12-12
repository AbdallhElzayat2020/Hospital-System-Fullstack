<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardAdminController extends Controller
{
    public function index()
    {
        return view('Dashboard.Admin.dashboard');
    }
}
