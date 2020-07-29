@extends('layouts.begin_back')

@section('title') Portofolio Baru @endsection

@section('portofolio') active @endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><span class="pr-2 fas fa-file-alt"></span> Portofolio Baru</h4>
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
                                Form Portofolio
                            </h3>
                        </div>
                        <form action="{{ route('dashboard.portofolio.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="https://via.placeholder.com/272x197" class="elevation-1 img-rounded"
                                            style="object-fit: cover; object-position: 50% 0%" width="272" height="197"
                                            id="previewImage">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="image">Gambar <span class="text-danger">*</span></label>
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="image">
                                                <label class="custom-file-label">Pilih file</label>
                                                <small class="text-muted form-text">Format yang didukung jpg gif png.
                                                    Maksimum 2MB</small>
                                                @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Judul <span class="text-danger">*</span></label>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ old('title') }}" placeholder="Masukkan judul...">
                                            @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Deskripsi <span class="text-danger">*</span></label>
                                            <textarea class="textarea"
                                                name="description">{{ old('description') }}</textarea>
                                            @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer float-right">
                                <a href="{{ route('dashboard.portofolio.index') }}" class="btn btn-secondary"><i
                                        class="fas fa-arrow-left pr-2"></i>
                                    Kembali</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save pr-2"></i>
                                    Simpan</button>
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
        // Summernote
        $('.textarea').summernote()
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
    });

</script>
@endsection