<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use Illuminate\Http\Request;

class JobseekerDashboardController extends Controller
{
    private $nav_tree = "jobseeker-dashboard";

    public function index()
    {
        $data = [
            'nav_tree' => $this->nav_tree,
        ];

        return view("backend.pages.jobseeker.dashboard", $data);
    }

    public function postArtikel(Request $req)
    {
        $foto_video = $req->foto_video->move('backend/images/artikel', $req->foto_video->hashName());
        $foto_video = $foto_video->getFilename();
        $artikel = new artikel();
        $artikel->subject = $req->subject;
        $artikel->description = $req->description;
        $artikel->foto_video = $foto_video;
        $artikel->user_id = user()->id;
        $artikel->save();
        return redirect()->back();
    }
}
