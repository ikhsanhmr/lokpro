@extends('backend.layouts.main')
@section('backendcontainer')
<div class="page-heading">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <img width="100px" height="100px" src="/backend/images/logo/fp.png" alt="Foto">
                        <h4 class="card-title mt-3">Marthin Salakory</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                    role="tab" aria-controls="home" aria-selected="true">Detail</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile"
                                    role="tab" aria-controls="profile" aria-selected="false">Edit</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <table class="table table-striped mb-0 mt-3">
                                    <tr>
                                        <td>Company Name</td>
                                        <td>: PT. Laravel</td>
                                    </tr>
                                    <tr>
                                        <td>Job Location</td>
                                        <td>: Jakarta | Bandung | Surabaya | Palembang</td>
                                    </tr>
                                    <tr>
                                        <td>Workers</td>
                                        <td>: 205</td>
                                    </tr>
                                    <tr>
                                        <td>Company Location</td>
                                        <td>: Jl.RatuLangit. no 20. Jakarta Utara</td>
                                    </tr>
                                    <tr>
                                        <td>Company Culture</td>
                                        <td>: Teknologi</td>
                                    </tr>
                                    <tr>
                                        <td>Corporate Social Media</td>
                                        <td>: Facebook, Instagram, Twitter</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel"
                                aria-labelledby="profile-tab">
                                <form class="form mt-3">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Company Name</label>
                                                <input type="text" id="first-name-column" class="form-control"
                                                    placeholder="-" name="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Job Location</label>
                                                <input type="text" id="last-name-column" class="form-control"
                                                    placeholder="-" name="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city-column">Number of Workers</label>
                                                <input type="number" id="city-column" class="form-control"
                                                    placeholder="-" name="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="country-floating">Company Location</label>
                                                <input type="text" id="country-floating" class="form-control"
                                                    name="" placeholder="-">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="company-column">Company Culture</label>
                                                <input type="text" id="company-column" class="form-control"
                                                    name="" placeholder="-">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email-id-column">Corporate Social Media</label>
                                                <input type="text" id="email-id-column" class="form-control"
                                                    name="" placeholder="-">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel"
                                aria-labelledby="contact-tab">
                                <p class="mt-2">Duis ultrices purus non eros fermentum hendrerit. Aenean
                                    ornare interdum
                                    viverra. Sed ut odio velit. Aenean eu diam
                                    dictum nibh rhoncus mattis quis ac risus. Vivamus eu congue ipsum.
                                    Maecenas id
                                    sollicitudin ex. Cras in ex vestibulum,
                                    posuere orci at, sollicitudin purus. Morbi mollis elementum enim, in
                                    cursus sem
                                    placerat ut.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection