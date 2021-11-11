<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacanciController extends Controller
{

    public function detail_job(Request $req)
    {

        $data = [
            'title' => 'All job page',
            'nav_tree' => '',
            'lm' => lamaran($req->id)
        ];

        return view("backend/jobseeker/job_detail", $data);
    }
}
