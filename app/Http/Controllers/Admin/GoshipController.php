<?php

namespace App\Http\Controllers\Admin;

use App\Settings;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class GoshipController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin')->except('logout');
    }
    public function index(){
        $params =  [
            'breadcrumb' => ['Settings', 'Goship'],
            'title' => 'goship',
            'model' => Settings::where('name', '=', 'goship')->first()
        ];

        return view( "admin.goship.index",  $params);
    }
}
