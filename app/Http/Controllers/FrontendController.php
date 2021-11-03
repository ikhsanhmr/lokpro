<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.template.frontend');
    }

    public function test()
    {
        return 'oke';
    }
}
