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
