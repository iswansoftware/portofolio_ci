@extends('layouts.begin_back')

@section('title') Index @endsection

@section('dashboard') active @endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"><span class="pr-2 fas fa-tachometer-alt"></span> Dasbor</h4>
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
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-8 col-12 align-self-center">
                    <h1>Hallo, {{ Auth::user()->name }} !</h1>
                    <div class="alert alert-warning" role="alert">
                        <i class="icon fas fa-exclamation-triangle"></i> <strong>It’s not a bug</strong>. It’s an
                        undocumented feature!
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <!-- small box -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3>{{ $portofolioCount }}</h3>

                            <p>Total Portofolio</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div class="col-sm-12">
                    <div id="carouselPortofolio" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators my-4">
                            @foreach ($portofolio as $key)
                            <li data-target="#carouselPortofolio" data-slide-to="{{ $key->id }}" @if ($loop->first)
                                class="active" @endif></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($portofolio as $item)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <img class="d-block w-100" src="{{ $item->image_link }}"
                                    style="object-fit: cover; object-position: 50% 0%;" width="1045" height="580">
                                <div class="carousel-caption d-none d-md-block mb-4 card-img-overlay text-white-50">
                                    <h5 class="text-bold">{{ $item->title }}</h5>
                                    <p class="text-truncate">{!! $item->description !!}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselPortofolio" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselPortofolio" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    {{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100"
                                src="https://placehold.it/900x500/39CCCC/ffffff&text=I+Love+Bootstrap"
                                alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                src="https://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap"
                                alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100"
                                src="https://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap"
                                alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div> --}}
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