<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use App\Models\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyApplicationController extends Controller
{
    public function belum()
    {
        $data = [
            'title' => 'Waiting for confirmate',
            'nav_tree' => '',
            'pelamar' => pelamar()->where('pelamars.status', '=', 'belum')->where('pelamars.pelamar_id', '=', user()->id)->get()
        ];

        return view("backend/jobseeker/belum_dikonfirmasi", $data);
    }

    public function sudah()
    {
        $data = [
            'title' => 'Confirmed',
            'nav_tree' => '',
            'pelamar' => pelamar()->where('pelamars.status', '=', 'sudah')->where('pelamars.pelamar_id', '=', user()->id)->get()
        ];

        return view("backend/jobseeker/sudah_dikonfirmasi", $data);
    }

    public function ditolak()
    {
        $data = [
            'title' => 'Rejected',
            'nav_tree' => '',
            'pelamar' => pelamar()->where('pelamars.status', '=', 'ditolak')->where('pelamars.pelamar_id', '=', user()->id)->get()
        ];

        return view("backend/jobseeker/lamaran_ditolak", $data);
    }
}
