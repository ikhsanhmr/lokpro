<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use App\Models\Pelamar;
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

    public function job_detail(Request $req)
    {

        if ($req->status == 2 || $req->status == 3) {
            $pelamar = new Pelamar();
            $req->status == 2 ? $st = 'ditolak' : $st = 'sudah';
            $pelamar->where('id', '=', $req->id_pelamar)->update([
                'status' => $st,
            ]);
            return redirect('/company/job_detail/?id=' . $req->id)->with('berhasil', 'Status update successfully');
        }

        if ($req->status == 'menunggu') {
            $plr = pelamar()->where('status', '=', 'menunggu')->where('company_id', '=', user()->id)->where('lamaran_id', '=', $req->id)->get();
        } elseif ($req->status == 'sudah') {
            $plr = pelamar()->where('status', '=', 'sudah')->where('company_id', '=', user()->id)->where('lamaran_id', '=', $req->id)->get();
        } elseif ($req->status == 'ditolak') {
            $plr = pelamar()->where('status', '=', 'ditolak')->where('company_id', '=', user()->id)->where('lamaran_id', '=', $req->id)->get();
        } else {
            $plr = pelamar()->where('company_id', '=', user()->id)->where('lamaran_id', '=', $req->id)->get();
        }

        $data = [
            'title' => 'Job Detail Page',
            'lm' => lamaran($req->id),
            'plr' => $plr,
            'id'    => $req->id,
            'status'    =>  $req->status
        ];

        return view("backend/company/job_detail", $data);
    }
}
