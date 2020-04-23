@extends('layouts.begin_back')

@section('title') Opsi @endsection

@section('option') active @endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><span class="pr-2 fas fa-cog"></span> Opsi</h4>
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
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Salam Navigasi
                            </h3>
                        </div>
                        <form action="{{ route('dashboard.greeting.update', $greeting->id) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" name="content" class="form-control"
                                        value="{{ $greeting->content }}">
                                    @error('content')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <hr>
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <small class="form-text text-muted">Terakhir diubah :
                                            {{ $greeting->updated_at->format('d M Y') }}
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
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Keahlian
                            </h3>
                        </div>
                        <form action="{{ route('dashboard.skill.update', $skill->id) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" name="content" class="form-control"
                                        value="{{ $skill->content }}">
                                    @error('content')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <hr>
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <small class="form-text text-muted">Terakhir diubah :
                                            {{ $skill->updated_at->format('d M Y') }}
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
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Tentang Saya
                            </h3>
                        </div>
                        <form action="{{ route('dashboard.aboutme.update', $aboutMe->id) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <textarea class="textarea" name="content">{{ $aboutMe->content }}</textarea>
                                    @error('content')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <hr>
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <small class="form-text text-muted">Terakhir diubah :
                                            {{ $skill->updated_at->format('d M Y') }}
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
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Lokasi
                            </h3>
                        </div>
                        <form action="{{ route('dashboard.location.update', $location->id) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" name="content" class="form-control"
                                        value="{{ $location->content }}">
                                    @error('content')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <hr>
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <small class="form-text text-muted">Terakhir diubah :
                                            {{ $location->updated_at->format('d M Y') }}
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
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Kata Motivasi
                            </h3>
                        </div>
                        <form action="{{ route('dashboard.motivation.update', $motivation->id) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" name="content" class="form-control"
                                        value="{{ $motivation->content }}">
                                    @error('content')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <hr>
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <small class="form-text text-muted">Terakhir diubah :
                                            {{ $motivation->updated_at->format('d M Y') }}
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
        $('.textarea').summernote()
    })
</script>
@endsection