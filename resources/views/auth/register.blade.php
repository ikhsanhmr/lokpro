@extends('auth.layouts.app')

@section('content')

    <body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ route('frontend') }}"><b>Lok</b>Pro</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#pekerja" data-toggle="tab">Worker</a></li>
                    <li class="nav-item"><a class="nav-link" href="#perusahaan" data-toggle="tab">Company</a></li>
                </ul>

                <div class="tab-content mt-3">
                    <div class="tab-pane active" id="pekerja">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full name" name="name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                @error('name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                @error('password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                        <label for="agreeTerms">
                                            I agree to the <a href="#">terms</a>
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="perusahaan">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Company name" name="name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                @error('name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                @error('password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                        <label for="agreeTerms">
                                            I agree to the <a href="#">terms</a>
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>

                {{-- <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                </div> --}}

                <a href="{{ route('login') }}" class="text-center">I already have a account</a>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.register-box -->
    </body>
@endsection
