<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('logout');
    }

    public function index()
    {
        return view('admin.dashboard.index', 
            [ 
                'breadcrumb' => ['dashboard'],
                'title' => 'dashboard'
            ]);
    }
}
