<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'All job page'
        ];

        return view("backend/company/all_job", $data);
    }

    public function post()
    {
        $data = [
            'title' => 'Post page'
        ];

        return view("backend/company/post_job", $data);
    }

    public function save_post(Request $req)
    {
        $req->validate([
            'job_position' => 'required',
            'salary_range' => 'required',
            'job_location' => 'required',
            'job_description' => 'required'
        ]);

        $lamaran = new Lamaran();
        $lamaran->company_id = user()->id;
        $lamaran->job_position = $req->job_position;
        $lamaran->salary_range = $req->salary_range;
        $lamaran->job_location = $req->job_location;
        $lamaran->job_description = $req->job_description;
        $lamaran->save();

        return redirect('/company/Post_Job')->with('berhasil', 'Successfully insert data');
    }
}
