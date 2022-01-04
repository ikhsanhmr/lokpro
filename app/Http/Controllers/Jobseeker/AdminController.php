<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        if (user()->admin == 1) {
            $user = new User();
            $user->where('id', '=', user()->id)->update([
                'role' => 'company',
            ]);
            return redirect('/company/dashboard');
        }
        return redirect()->back();
    }
}
