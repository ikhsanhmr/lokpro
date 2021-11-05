<?php

namespace App\Http\Controllers;

use App\Models\PostingLowongan;
use Illuminate\Http\Request;

class PostingLowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lowongan.index',[
            'lowongans' => PostingLowongan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lowongan.create',[

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'posisi' => 'required',
            'deskripsi' => 'required',
            'gaji' => 'required',
            'lokasi' => 'required',
        ]);
        PostingLowongan::create($validatedData);
        return redirect('/lowongan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostingLowongan  $postingLowongan
     * @return \Illuminate\Http\Response
     */
    public function show(PostingLowongan $postingLowongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostingLowongan  $postingLowongan
     * @return \Illuminate\Http\Response
     */
    public function edit(PostingLowongan $postingLowongan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostingLowongan  $postingLowongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostingLowongan $postingLowongan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostingLowongan  $postingLowongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostingLowongan $postingLowongan)
    {
        //
    }
}
