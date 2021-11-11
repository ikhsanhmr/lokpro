@extends('backend.layouts.main')
@section('backendcontainer')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">All Job</h4>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="row">
            @if(empty(lamaran_company()[0]->id))
            <span class="text-center">Empty Job</span>
            @endif
            @foreach(lamaran_company() as $l)
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-1">
                            <div class="col-2">
                                <img height="30px" width="30px" src="/backend/images/logocompany/{{ $l->logo }}" alt="tes">
                            </div>
                            <div class="col-10">
                                <h5>{{ $l->job_position }}</h5>
                            </div>
                        </div>
                        <p>
                            <span>Company: {{ $l->name }}</span>
                            <br>
                            <i>Job location: {{ $l->lokasi_kerja }}</i>
                            <br>
                            <b>Rp. {{ $l->salary_range }}</b>    
                        </p>
                        <a href="/company/job_detail/?id={{ $l->id_lamaran }}">
                            <button class="btn btn-primary btn-block btn-sm"><i class="fas fa-eye"></i></button>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection