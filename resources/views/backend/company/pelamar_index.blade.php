@extends('backend.layouts.main')
@section('backendcontainer')
<div class="page-heading">
    <section class="section">
        <div class="card">
            @if(session()->has('berhasil'))
                <div class="alert alert-success alert-dismissible show fade">
                    {{ session('berhasil') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title mb-0">Semua Pelamar</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <table class="table table-hover table-striped rounded">
            <tr>
                <th>No</th>
                <th>Gender</th>
                <th>Tanggal Lahir</th>
                <th>Address</th>
                <th>Aksi</th>
            </tr>
            @foreach ($pelamars as $pelamar)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pelamar->gender }}</td>
                <td>{{ $pelamar->date_of_birth }}</td>
                <td>{{ $pelamar->address }}</td>
                <td>
                    <a href="/company/job/{{ $pelamar->lamaran_id }}/pelamar/{{ $pelamar->id }}" class="btn btn-info">
                        <i class="bi bi-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </section>
</div>
@endsection
