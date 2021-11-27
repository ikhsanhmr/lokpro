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
        ->orderBy('id_lamaran', 'desc')
        ->get();
}

function lamaran($id = false)
{
    // mengambil data lamaran company
    if ($id == false) {
        return DB::table('lamarans')
            ->join('users', 'users.id', '=', 'lamarans.company_id')
            ->join('data_users', 'data_users.user_id', '=', 'lamarans.company_id')
            ->select('users.*', 'data_users.id as data_users_id', 'data_users.job_location', 'data_users.jumlah_pekerja', 'data_users.company_location', 'data_users.company_culture', 'data_users.sosmed', 'data_users.logo', 'lamarans.id as id_lamaran', 'lamarans.company_id', 'lamarans.job_position', 'lamarans.salary_range', 'lamarans.job_location as lokasi_kerja', 'lamarans.job_description')
            ->orderBy('id_lamaran', 'desc')
            ->get();
    } else {
        return DB::table('lamarans')
            ->join('users', 'users.id', '=', 'lamarans.company_id')
            ->join('data_users', 'data_users.user_id', '=', 'lamarans.company_id')
            ->select('users.*', 'data_users.id as data_users_id', 'data_users.job_location', 'data_users.jumlah_pekerja', 'data_users.company_location', 'data_users.company_culture', 'data_users.sosmed', 'data_users.logo', 'lamarans.id as id_lamaran', 'lamarans.company_id', 'lamarans.job_position', 'lamarans.salary_range', 'lamarans.job_location as lokasi_kerja', 'lamarans.job_description')
            ->where('lamarans.id', '=', $id)
            ->first();
    }
}

function pelamar()
{
    // untuk mengambil data dari tabel pelamars tanpa harus mengetik ulang banyak
    return DB::table('pelamars')
        ->join('lamarans', 'lamarans.id', '=', 'pelamars.lamaran_id')
        ->join('users', 'users.id', '=', 'pelamars.pelamar_id')
        ->join('data_users', 'data_users.user_id', '=', 'lamarans.company_id')
        ->select('users.*', 'data_users.id as data_users_id', 'data_users.job_location', 'data_users.jumlah_pekerja', 'data_users.company_location', 'data_users.company_culture', 'data_users.sosmed', 'data_users.logo', 'lamarans.id as id_lamaran', 'lamarans.company_id', 'lamarans.job_position', 'lamarans.salary_range', 'lamarans.job_location as lokasi_kerja', 'lamarans.job_description', 'pelamars.id as id_pelamar', 'pelamars.pelamar_id', 'pelamars.lamaran_id', 'pelamars.ktp_number', 'pelamars.place_of_birth', 'pelamars.date_of_birth', 'pelamars.address', 'pelamars.phone_number', 'pelamars.gender', 'pelamars.religion', 'pelamars.marital_status', 'pelamars.document', 'pelamars.status');
}

function pelamars()
{
    // untuk mengambil data dari tabel pelamars tanpa harus mengetik ulang banyak
    return DB::table('pelamars')
        ->join('lamarans', 'lamarans.id', '=', 'pelamars.lamaran_id')
        ->join('users', 'users.id', '=', 'lamarans.company_id')
        ->join('data_users', 'data_users.user_id', '=', 'lamarans.company_id')
        ->select('users.*', 'data_users.id as data_users_id', 'data_users.job_location', 'data_users.jumlah_pekerja', 'data_users.company_location', 'data_users.company_culture', 'data_users.sosmed', 'data_users.logo', 'lamarans.id as id_lamaran', 'lamarans.company_id', 'lamarans.job_position', 'lamarans.salary_range', 'lamarans.job_location as lokasi_kerja', 'lamarans.job_description', 'pelamars.id as id_pelamar', 'pelamars.pelamar_id', 'pelamars.lamaran_id', 'pelamars.ktp_number', 'pelamars.place_of_birth', 'pelamars.date_of_birth', 'pelamars.address', 'pelamars.phone_number', 'pelamars.gender', 'pelamars.religion', 'pelamars.marital_status', 'pelamars.document', 'pelamars.status');
}

function nav_on($dt = [])
{
    // untuk auto select active sidebar
    $url =  explode('/', url()->full());
    for ($i = 0; $i < count($dt); $i++) {
        if ($dt[$i] == end($url)) {
            return 'active';
        }
    }
    return '';
}
