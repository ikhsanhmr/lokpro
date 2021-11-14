<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.home.index');
    }

    public function jobs()
    {
        return view('frontend.jobs.jobs');
    }

    public function detailsJob()
    {
        return view('frontend.jobs.detail');
    }

    public function articel()
    {
        return view('frontend.articel.articel');
    }

    public function detailsArticel()
    {
        return view('frontend.articel.detail');
    }
}
