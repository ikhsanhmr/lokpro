@extends('layouts.backend.jobseeker.app')

@section('style')
    <style>
        .profile-box {
            width: 150px;
            height: 150px;
        }

    </style>

@endsection

@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Your Profile</h3>
                    <p class="text-subtitle text-muted">Complete your profile to get the best of our services</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('jobseeker.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Your Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="personal-information-tab" data-bs-toggle="tab" href="#personal-information" role="tab"
                                    aria-controls="personal-information" aria-selected="true">Personal Information</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="education-contact-tab" data-bs-toggle="tab" href="#education-contact" role="tab"
                                    aria-controls="exp-education" aria-selected="false">Education & Contacts</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="experience-preference-tab" data-bs-toggle="tab" href="#experience-preference" role="tab"
                                    aria-controls="experience-preference" aria-selected="false">Experience & Job Preferences</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-4" id="myTabContent">
                            <div class="tab-pane fade active show" id="personal-information" role="tabpanel" aria-labelledby="personal-information-tab">
                                <form id="personal-information-form" class="form" action="{{ route('jobseeker.profile.update-personal-info') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{ asset('/backend/images/faces/2.jpg') }}" alt=""
                                                class="w-100">
                                            <button type="button" id="change-profile-picture-button" class="btn btn-block btn-primary mt-2 font-weight-bold">CHANGE</button>
                                            <div style="display: none">
                                                <input type="file" name="profile_picture" id="profile_picture">
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <h3>{{ Auth::user()->name }}</h3>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <ul class="p-1 m-1">
                                                    @foreach ($errors->all() as $error)
                                                    <li>
                                                        {{ $error }}
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-5 col-12">
                                            <div class="form-group">
                                                <label for="fullname">Full Name *</label>
                                                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Full Name" value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-12">
                                            <div class="form-group">
                                                <label for="date_of_birth">Date of Birth *</label>
                                                <div class="input-group mb-3">
                                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                                    value="{{ isset($jobseeker_detail)?$jobseeker_detail->date_of_birth:'' }}">
                                                    <span class="input-group-text" id="basic-addon2">
                                                        <i class="bi bi-calendar-week"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <label for="gender">Gender *</label>
                                                <select class="form-select" name="gender" id="gender">
                                                    <option value="">Choose</option>

                                                    @if (isset($jobseeker_detail))
                                                        @if ($jobseeker_detail->gender == 'male')
                                                            <option value="male" selected>Laki - laki</option>
                                                            <option value="female">Perempuan</option>
                                                        @else
                                                            <option value="male">Laki - laki</option>
                                                            <option value="female" selected>Perempuan</option>
                                                        @endif
                                                    @else
                                                        <option value="male">Laki - laki</option>
                                                        <option value="female">Perempuan</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="phone_number">Phone Number *</label>
                                                <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Phone Number"
                                                value="{{ isset($jobseeker_detail)?$jobseeker_detail->phone_number:'' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="province">Province *</label>
                                                <div class="form-group">
                                                    <select class="form-select" name="province" id="province">
                                                        <option value="0">Choose</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="city">City *</label>
                                                <select class="form-select" name="city" id="city">
                                                    <option value="0">Choose</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Bio</label>
                                                <textarea class="form-control" name="bio" id="bio" cols="30" rows="10">{{ isset($jobseeker_detail)?$jobseeker_detail->bio:'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">SAVE</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="education-contact" role="tabpanel" aria-labelledby="education-contact-tab">
                                <form id="education-contact-form" class="form mt-4">
                                    <div class="row">
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <label for="gender">Education/Degree *</label>
                                                <select class="form-select" id="degree" name="degree">
                                                    <option value="0">Choose</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <div class="form-group">
                                                <label for="fullname">Institution *</label>
                                                <input type="text" id="institution_name" name="institution_name" class="form-control" placeholder="Institution Name">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <label for="gender">Graduation Year *</label>
                                                <select class="form-select" id="graduation_year" name="graduation_year">
                                                    <option value="0">Choose</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">SAVE</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="experience-preference" role="tabpanel" aria-labelledby="experience-preference-tab">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    $("#change-profile-picture-button").on('click', function (event) {
        $('#profile_picture').trigger('click');
    });
</script>
@endsection
