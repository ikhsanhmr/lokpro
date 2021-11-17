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

        return view("backend/company/job_index", $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Post page'
        ];

        return view("backend/company/job_create", $data);
    }

    public function store(Request $req)
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

        return redirect('/company/job/create')->with('berhasil', 'Successfully insert data');
    }
    public function show($id)
    {
        $data = [
            'job' => Lamaran::find($id)
        ];

        return view('backend/company/job_show', $data);
    }
    public function edit($id)
    {
        $data = [
            'job' => Lamaran::find($id)
        ];

        return view('backend/company/job_edit', $data);
    }
    public function update(Request $req, $id)
    {
        $validated = $req->validate([
            'job_position' => 'required',
            'salary_range' => 'required',
            'job_location' => 'required',
            'job_description' => 'required'
        ]);

        $lamaran = Lamaran::find($id);
        $lamaran->update($validated);
        return redirect('/company/job/' . $id)->with('berhasil', 'Successfully change data');
    }
    public function destroy(Request $req, $id)
    {
        $lamaran = Lamaran::find($id);
        $lamaran->delete();
        return redirect('/company/job')->with('berhasil', 'Successfully remove data');
    }

    public function pelamar_index(Lamaran $lamaran)
    {
        $data = [
            'lamaran' => $lamaran,
            'pelamars' => Pelamar::where('lamaran_id', $lamaran->id)->get()
        ];

        return view('backend/company/pelamar_index', $data);
    }

    public function pelamar_show(Lamaran $lamaran, Pelamar $pelamar)
    {
        $data = compact('lamaran', 'pelamar');

        return view('backend/company/pelamar_show', $data);
    }
}
