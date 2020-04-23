@extends('layouts.begin_auth')

@section('title') Masuk @endsection

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="index2.html"><b>Admin</b>Portofolio</a>
    </div>
    <!-- /.login-logo -->
    @if ($errors->any())
    <div class="alert alert-warning">
        <h6><i class="icon fas fa-exclamation-triangle"></i> Oops!</h6>
        @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
        @endforeach
    </div>
    @endif
    @include('includes.alert')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Masuk dengan akun Anda!</p>

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Kata Sandi">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">
                                Ingat saya?
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                <a href="#">Lupa kata sandi?</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection