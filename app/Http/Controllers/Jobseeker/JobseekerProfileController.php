<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\{
    User,
    JobseekerDetail,
};


class JobseekerProfileController extends Controller
{
    private $nav_tree = "jobseeker-profile";

    public function index()
    {
        $jobseeker_detail = JobseekerDetail::where('jobseeker_id', '=', Auth::user()->id)->first();

        $data = [
            'nav_tree' => $this->nav_tree,
            'jobseeker_detail' => $jobseeker_detail,
        ];

        return view("backend.pages.jobseeker.profile.index", $data);
    }

    public function updatePersonalInfo(Request $request)
    {
        $messages = [
            'required' => ':attribute is required',
        ];

        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            // 'province' => 'required',
            // 'city' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = User::where('id', '=', Auth::user()->id)->update([
                'name' => $request->input('fullname'),
            ]);
            $jobseeker_detail = JobseekerDetail::where('jobseeker_id', '=', Auth::user()->id)
                ->first('id');

            if (isset($jobseeker_detail)) {
                $jobseeker_detail = JobseekerDetail::where('jobseeker_id', '=', Auth::user()->id)
                ->update([
                    'jobseeker_id' => Auth::user()->id,
                    'bio' => $request->input('bio'),
                    'gender' => $request->input('gender'),
                    'date_of_birth' => $request->input('date_of_birth'),
                    'phone_number' => $request->input('phone_number'),
                    'profile_picture' => 'filename',
                ]);
            } else {
                $jobseeker_detail = JobseekerDetail::create([
                    'jobseeker_id' => Auth::user()->id,
                    'bio' => $request->input('bio'),
                    'gender' => $request->input('gender'),
                    'date_of_birth' => $request->input('date_of_birth'),
                    'phone_number' => $request->input('phone_number'),
                    'profile_picture' => 'filename',
                ]);
            }

            return redirect()->back()->with('success', 'Update successful!');
        }
    }

    public function updateEducationInfo(Request $request)
    {
        $messages = [
            'required' => ':attribute is required',
        ];

        $validator = Validator::make($request->all(), [

        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            return redirect()->back()->with('success', 'Kategori berhasil ditambahkan!');
        }
    }
}
