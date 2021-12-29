<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobseekerDashboardController extends Controller
{
    private $nav_tree = "jobseeker-dashboard";

    public function index(Request $req)
    {
        if (isset($req->me) && $req->me == 1) {
            $artikel = DB::table('artikels')
                ->join('users', 'users.id', '=', 'artikels.user_id')
                ->join('jobseeker_details', 'jobseeker_details.jobseeker_id', '=', 'users.id')
                ->where('users.id', '=', user()->id)
                ->select('jobseeker_details.*', 'users.id as id_user', 'users.role', 'users.name', 'users.email', 'users.password', 'artikels.id as id_artikel', 'artikels.subject', 'artikels.description', 'artikels.foto_video', 'artikels.user_id')
                ->orderByDesc('artikels.id');
        } else {
            $artikel = DB::table('artikels')
                ->join('users', 'users.id', '=', 'artikels.user_id')
                ->join('jobseeker_details', 'jobseeker_details.jobseeker_id', '=', 'users.id')
                ->select('jobseeker_details.*', 'users.id as id_user', 'users.role', 'users.name', 'users.email', 'users.password', 'artikels.id as id_artikel', 'artikels.subject', 'artikels.description', 'artikels.foto_video', 'artikels.user_id')
                ->orderByDesc('artikels.id');
        }
        $data = [
            'nav_tree' => $this->nav_tree,
            'artikel' => $artikel->get()
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
