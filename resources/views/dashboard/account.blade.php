@extends('layouts.begin_back')

@section('title') Akun @endsection

@section('account') active @endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><span class="pr-2 fas fa-user-cog"></span> Akun</h4>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Profil
                            </h3>
                        </div>
                        <form action="{{ route('dashboard.account.update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="avatar">Avatar</label>
                                    <div class="row">
                                        <div class="col-sm-auto">
                                            <img src="{{ $user->avatar_link }}"
                                                style="object-fit: cover; object-position: 50% 0%;" width="150"
                                                height="150" class="img-circle elevation-2 mb-2" alt="User Image"
                                                id="previewImage">
                                        </div>
                                        <div class="col-sm">
                                            <div class="custom-file">
                                                <input type="file" name="avatar" class="custom-file-input" id="image">
                                                <label class="custom-file-label">Pilih file</label>
                                                <small class="text-muted form-text">Format yang didukung jpg gif png.
                                                    Maksimum 2MB</small>
                                                @error('avatar')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <small class="form-text text-muted">Terakhir diubah :
                                            {{ $user->updated_at->format('d M Y') }}
                                        </small>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary float-right">
                                            <i class="fas fa-save pr-2"></i> Perbarui</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Ganti Sandi
                            </h3>
                        </div>
                        <form action="{{ route('dashboard.account.update.password') }}" method="post">
                            @csrf
                            <input type="text" autocomplete="username" hidden>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="password">Sandi lama</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Masukkan sandi lama..." autocomplete="current-password">
                                    @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="new_password">Sandi baru</label>
                                    <input type="password" name="new_password" class="form-control"
                                        placeholder="Masukkan sandi baru..." autocomplete="new-password">
                                    @error('new_password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="new_password_confirmation">Ketik ulang sandi baru</label>
                                    <input type="password" name="new_password_confirmation" class="form-control"
                                        placeholder="Ketik ulang sandi baru..." autocomplete="new-password">
                                    @error('new_password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary float-right"><i
                                        class="fas fa-key pr-2"></i>
                                    Ganti</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('footer-script')
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
    //preview avatar
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#previewImage').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function () {
        readURL(this);
    });

</script>
@endsection
