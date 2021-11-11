<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function user()
{
    // mengambil data users dan users
    return DB::table('data_users')
        ->join('users', 'users.id', '=', 'data_users.user_id')
        ->select('users.*', 'data_users.id as data_users_id', 'data_users.job_location', 'data_users.jumlah_pekerja', 'data_users.company_location', 'data_users.company_culture', 'data_users.sosmed', 'data_users.logo')
        ->where('data_users.user_id', '=', Auth::user()->id)
        ->first();
    // return Auth::user();
}

function lamaran_company()
{
    // mengambil data lamaran company
    return DB::table('lamarans')
        ->join('users', 'users.id', '=', 'lamarans.company_id')
        ->join('data_users', 'data_users.user_id', '=', 'lamarans.company_id')
        ->select('users.*', 'data_users.id as data_users_id', 'data_users.job_location', 'data_users.jumlah_pekerja', 'data_users.company_location', 'data_users.company_culture', 'data_users.sosmed', 'data_users.logo', 'lamarans.id as id_lamaran', 'lamarans.company_id', 'lamarans.job_position', 'lamarans.salary_range', 'lamarans.job_location as lokasi_kerja', 'lamarans.job_description')
        ->where('lamarans.company_id', '=', Auth::user()->id)
        ->get();
}

function lamaran()
{
    // mengambil data lamaran company
    return DB::table('lamarans')
        ->join('users', 'users.id', '=', 'lamarans.company_id')
        ->join('data_users', 'data_users.user_id', '=', 'lamarans.company_id')
        ->select('users.*', 'data_users.id as data_users_id', 'data_users.job_location', 'data_users.jumlah_pekerja', 'data_users.company_location', 'data_users.company_culture', 'data_users.sosmed', 'data_users.logo', 'lamarans.id as id_lamaran', 'lamarans.company_id', 'lamarans.job_position', 'lamarans.salary_range', 'lamarans.job_location as lokasi_kerja', 'lamarans.job_description')
        ->get();
}