@extends('backend.layouts.main')
@section('backendcontainer')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h4 class="card-title mb-0 mx-auto ms-md-0">All Job Vacanci</h4>
                    </div>
                    <div class="col-md-4 mt-md-0 mt-3">
                        <input class="form-control" id="search" type="text" placeholder="Cari Pekerjaan">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="row">
            <div class="col-md-8">
                <div class="row" id="myList">
                    @if(empty(lamaran()[0]->id))
                    <span class="text-center">Empty job vacanci</span>
                    @endif
                    @foreach(lamaran() as $l)
                    <div class="col-lg-6 pilih {{ $l->tipe_loker }} {{ $l->tipe_pekerjaan }} {{ $l->remote }}">
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
                                <a href="/jobseeker/job_detail?id={{ $l->id_lamaran }}">
                                    <button class="btn btn-primary btn-block btn-sm"><i class="fas fa-eye"></i></button>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 filter">
                <div class="card card-light">
                    <div class="card-header pb-2">
                        <h5 class="text-primary">Filter Pencarian</h5>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="kategori">
                            <div class="judul-kategori text-dark fw-bold">Tipe Loker</div>
                            <div class="checkbox mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="kerja" name="tipe_loker" id="tipe_loker_kerja" rel="kerja">
                                    <label class="form-check-label" for="tipe_loker_kerja">
                                        Kerja
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="magang" id="tipe_loker_magang" name="tipe_loker" rel="magang">
                                    <label class="form-check-label" for="tipe_loker_magang">
                                        Magang
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="kategori mt-4">
                            <div class="judul-kategori text-dark fw-bold">Tipe Pekerjaan</div>
                            <div class="checkbox mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="fulltime" id="tipe_pekerjaan_full" name="tipe_pekerjaan" rel="fulltime">
                                    <label class="form-check-label" for="tipe_pekerjaan_full">
                                        Full Time
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="parttime" id="tipe_pekerjaan_part" name="tipe_pekerjaan" rel="parttime">
                                    <label class="form-check-label" for="tipe_pekerjaan_part">
                                        Part Time
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="kategori mt-4">
                            <div class="judul-kategori text-dark fw-bold">Remote</div>
                            <div class="checkbox mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="wfh" id="tipe_pekerjaan_wfo" name="remote" rel="wfh">
                                    <label class="form-check-label" for="tipe_pekerjaan_wfo">
                                        Work From Office
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="wfo" id="tipe_pekerjaan_wfh" name="tipe_pekerjaan" rel="wfo">
                                    <label class="form-check-label" for="tipe_pekerjaan_wfh">
                                        Work From Home
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function(){
      $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myList .pilih").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

    $(document).ready(function(){
        console.log('apa')
        $('.form-check').on('click', 'input', function(){
            var value = $(this).val();
            $('#myList > .pilih').hide();
            $('.form-check').find('input:checked').each(function () {
                $('#myList > .pilih.' + $(this).attr('rel')).show();
            });
        });
    });
</script>
@endsection