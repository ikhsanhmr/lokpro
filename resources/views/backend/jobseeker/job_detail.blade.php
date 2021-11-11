@extends('backend.layouts.main')
@section('backendcontainer')
<div class="page-heading">
    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Company Data</h3>
                        <img class="mb-3 mt-3" style="display:block; margin:auto;" height="60px" width="60px" src="/backend/images/logocompany/{{ $lm->logo }}" alt="logo company">
                        <table class="table table-striped mb-0">
                            <tbody>
                                <tr>
                                    <td class="text-bold-500">Company Name</td>
                                    <td>: {{ $lm->name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Company Location</td>
                                    <td>: {{ $lm->company_location }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Company Culture</td>
                                    <td>: {{ $lm->company_culture }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <h3 class="text-center mt-5 mb-3">Job Vacanci</h3>
                        <table class="table table-striped mb-0">
                            <tbody>
                                <tr>
                                    <td class="text-bold-500">Job Position</td>
                                    <td>: {{ $lm->job_position }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Salary Range</td>
                                    <td>: {{ $lm->salary_range }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500">Job Location</td>
                                    <td>: {{ $lm->lokasi_kerja }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-bold-500 text-center">Job Description</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class=""><?= nl2br(htmlspecialchars($lm->job_description)); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="text-center mt-5 mb-3">Apply Now</h3>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Job Position</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input readonly type="text" id="first-name" class="form-control"
                                                 placeholder="Job Position" value="{{ $lm->job_position }}">
                                        </div>
                                        <h4 class="mt-5 mb-2"><u>Personal data</u></h4>
                                        <div class="col-md-4">
                                            <label>Full Name</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input readonly type="text" id="first-name" class="form-control"
                                                name="fname" placeholder="Full Name" value="{{ user()->name }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label>KTP Number</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="email-id" class="form-control"
                                                name="ktp_number" placeholder="KTP Number">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Place of birth</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="contact-info" class="form-control"
                                                name="place_of_birth" placeholder="Place of birth">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Date of birth</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" id="contact-info" class="form-control"
                                                name="date_of_birth" placeholder="Date of birth">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Address</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="contact-info" class="form-control"
                                                name="address" placeholder="Address">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Phone Number</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="contact-info" class="form-control"
                                                name="phone_number" placeholder="Phone Number">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Email Address</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input readonly type="email" id="contact-info" class="form-control"
                                                name="email_adrress" placeholder="Email Address" value="{{ user()->email }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Gender</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <Select name="gender" class="form-control">
                                                <option value="">Gender</option>
                                                <option value="">Male</option>
                                                <option value="">Female</option>
                                            </Select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Religion</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="contact-info" class="form-control"
                                                name="religion" placeholder="Religion">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Marital status</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <Select name="marital_status" class="form-control">
                                                <option value="">Marital Status</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Widower">Widower</option>
                                                <option value="Widow">Widow</option>
                                            </Select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Document (PDF)</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="file" id="contact-info" class="form-control"
                                                name="document" placeholder="Document">
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic Horizontal form layout section end -->
</div>
@endsection