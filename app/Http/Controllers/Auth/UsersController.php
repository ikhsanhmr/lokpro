<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $req)
    {
        if (user()->admin == 1) {
            $users = new User();
            $user = $users->get();

            // jadikan dan hapus admin
            if (isset($req->id) && !empty($req->id)) {
                $u = $users->where('id', '=', $req->id)->count();
                if ($u > 0) {
                    $admin = $user->where('id', '=', $req->id)->first()->admin;
                    if ($admin == 1) {
                        $users->where('id', '=', $req->id)->update([
                            'admin' => '',
                        ]);
                    } else {
                        $users->where('id', '=', $req->id)->update([
                            'admin' => '1',
                        ]);
                    }
                    return redirect()->back();
                } else {
                    return redirect()->back();
                }
            }

            $data = [
                'nav_tree' => '',
                "users" => $user
            ];

            return view('auth/users', $data);
        }
        return redirect()->back();
    }
}
