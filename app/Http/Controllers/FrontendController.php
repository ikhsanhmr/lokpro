<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.home.index', [
            "jobs" => Lamaran::all()
        ]);
    }

    public function jobs()
    {
        return view('frontend.jobs.jobs', [
            "jobs" => Lamaran::all()
        ]);
    }

    public function detailsJob($id)
    {
        return view('frontend.jobs.detail', [
            "job" => Lamaran::find($id)
        ]);
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
