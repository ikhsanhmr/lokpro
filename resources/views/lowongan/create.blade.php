@extends('layouts.app')

@section('title', 'Posting Lowongan Pekerjaan')

@section('css')
<style>

</style>
@endsection

@section('content')
<section class="py-0" id="home">
    <div class="bg-holder d-none d-sm-block" style="background-image:url({{ asset('frontend/assets/img/illustrations/hero-bg.png') }});background-position:right top;background-size:contain;">
    </div>
    <!--/.bg-holder-->

    <div class="bg-holder d-sm-none" style="background-image:url({{ asset('frontend/assets/img/illustrations/hero-bg.png') }});background-position:right top;background-size:contain;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
        <div class="row align-items-center min-vh-75 min-vh-md-100">
            <div class="col-md-7 col-lg-6 py-6 text-sm-start text-center">
                <h1 class="mt-6 mb-sm-4 display-2 fw-semi-bold lh-sm fs-4 fs-lg-6 fs-xxl-8">Posting Lowongan Pekerjaan</h1>
                <p class="mb-4 fs-1">Temukan Tenaga Kerja Berkualitas untuk Perusahaan Anda</p>
                <div class="pt-3">
                    <form>
                        <div class="input-group w-xl-75 w-xxl-50 d-flex flex-end-center">
                            <input class="form-control rounded-pill shadow-lg border-0" id="formGroupExampleInput" type="text" placeholder="Seacrh by skill, company and job" /><img class="input-box-icon me-2" src="{{ asset('frontend/assets/img/illustrations/search.png') }}" width="30" alt="" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container">
        <form action="{{route('lowongan.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="posisi" class="form-label">Posisi</label>
                <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Posisi/Jabatan Pekerjaan">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Pekerjaan</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Pekerjaan">
            </div>
            <div class="mb-3">
                <label for="gaji" class="form-label">Range Gaji</label>
                <input type="text" class="form-control" id="gaji" name="gaji" placeholder="Rp 5.000.000 - Rp 7.000.000">
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi Kerja</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Yogyakarta">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</section>
@endsection

@section('js')
<script>

</script>
@endsection