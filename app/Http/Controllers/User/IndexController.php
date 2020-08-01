<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('user/index');
    }

    public function login()
    {
    	return view('user/login');
    }

    public function reg()
    {
    	return view('user/reg');
    }

    public function reg_do()
    {
        $data = request()->except('token'); 
    }

    
}
