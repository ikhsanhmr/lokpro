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
                        <h4 class="card-title mb-0">Manage Users</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="card">
            <div class="card-header">
                Manage Users
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Full name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                        <tr>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->role }}</td>
                            <td>
                                <span class="badge bg-{{ $u->admin == 1 ? 'success' : 'warning' }}">{{ $u->admin == 1 ? 'Admin' : 'Not admin' }}</span>
                            </td>
                            <td>
                                <button onclick="window.location.href = '/{{ user()->role }}/users?id={{ $u->id }}'" class="btn btn-danger btn-sm"><i class="fas fa-sync-alt"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection