<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobseekerProfileController extends Controller
{
    private $nav_tree = "jobseeker-profile";

    public function index()
    {
        $data = [
            'nav_tree' => $this->nav_tree,
        ];

        return view("backend.pages.jobseeker.profile.index", $data);
    }
}
