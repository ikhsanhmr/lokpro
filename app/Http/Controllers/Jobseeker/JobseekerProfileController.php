<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

use App\Models\{
    User,
    JobseekerDetail,
    JobseekerAddress,
};


class JobseekerProfileController extends Controller
{
    private $nav_tree = "jobseeker-profile";

    public function index()
    {
        $jobseeker = User::find(Auth::user()->id);
        $provinces = DB::table('provinces')->select(['*'])->get();

        $data = [
            'nav_tree' => $this->nav_tree,
            'jobseeker' => $jobseeker,
            'provinces' => $provinces,
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
            'address_description' => 'required',
            'province' => 'required',
            'city' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $jobseeker = User::find(Auth::user()->id);
            $jobseeker->name = $request->input('fullname');
            $jobseeker->save();

            if (isset($jobseeker->jobseekerDetail)) {
                $jobseeker_detail = JobseekerDetail::where('jobseeker_id', '=', $jobseeker->id)
                    ->update([
                        'bio' => $request->input('bio'),
                        'gender' => $request->input('gender'),
                        'date_of_birth' => $request->input('date_of_birth'),
                        'phone_number' => $request->input('phone_number'),
                        'profile_picture' => 'filename',
                    ]);
            } else {
                $jobseeker_detail = JobseekerDetail::create([
                    'jobseeker_id' => $jobseeker->id,
                    'bio' => $request->input('bio'),
                    'gender' => $request->input('gender'),
                    'date_of_birth' => $request->input('date_of_birth'),
                    'phone_number' => $request->input('phone_number'),
                    'profile_picture' => 'filename',
                ]);
            }

            if (isset($jobseeker->jobseekerAddress)) {
                $jobseeker_address = JobseekerAddress::where('jobseeker_id', '=', $jobseeker->id)
                    ->update([
                        'province_id' => $request->input('province'),
                        'city_id' => $request->input('city'),
                        'address_description' => $request->input('address_description'),
                    ]);
            } else {
                $jobseeker_address = JobseekerAddress::create([
                    'jobseeker_id' => $jobseeker->id,
                    'province_id' => $request->input('province'),
                    'city_id' => $request->input('city'),
                    'address_description' => $request->input('address_description'),
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

    public function checkCities(Request $request)
    {
        $cities = DB::table('cities')
            ->where('province_id', '=', $request->province_id)
            ->select(['*'])
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'cities' => $cities,
            ],
        ], Response::HTTP_OK);
    }
}
