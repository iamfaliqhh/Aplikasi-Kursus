@extends('master.master-admin')

@section('title')
    Pendaftaran Garansi | STEALTH
@endsection

@section('header')
@endsection

@section('navbar')
    @parent
@endsection

@section('menunya')
    <h1 class="font-weight-bold" style="font-size: 24px;">Pendaftaran Garansi<h1>
@endsection

@section('menu')
    @include('sidebar')
@endsection

@section('content')
    <div class="row">
        {{ csrf_field() }}
        <div class="col-xl-12">
            <div class="custom-accordion">
                @if (auth()->user()->role == 'Administrator')
                <div class="row my-4">
                    <div class="col">
                        <div class="text-end mt-2 mt-sm-0">
                            <a href="../../data-registration"><button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close </button></a>
                            @if ($viewData->status_pendaftaran =='Belum Terverifikasi')
                            <a href="../../verified-registration/{{$viewData->id_pendaftaran}}"><button type="button" class="btn btn-primary">Verified</button></a>
                            @endif
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row-->
                <div class="card card-body">
                    <div class="card-header">
                        <h4 class="card-title">Data Pendaftaran</h4>
                        <!-- center modal -->
                        <div>
                            @if ($viewData->status_pendaftaran == "Belum Terverifikasi")
                            <button class="btn btn-warning mb-4" style="margin-bottom: 1rem;" disabled>Belum Terverifikasi</button>
                            @elseif ($viewData->status_pendaftaran == "Terverifikasi")
                                @if ($viewDataPembayaran->status !="Gratis" && $viewDataPembayaran->status !="Dibayar")
                                <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target=".upload"
                                style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Upload Pembayaran  </button>
                                @endif

                            <button class="btn btn-success mb-4" style="margin-bottom: 1rem;" disabled>Terverifikasi</button>
                            @elseif ($viewData->status_pendaftaran == "Selesai")
                            <button class="btn btn-primary mb-4" style="margin-bottom: 1rem;" disabled>Selesai</button>
                            @else
                            <span class="badge badge-danger">Data Tidak Sah</span>
                            @endif
                        </div>
                    </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mb-2">
                                    <div class="pt-4 border-bottom-1 pb-3">
                                        <h4 class="text-primary"><b>Detil Data Garansi</b></h4>
                                    </div>
                                    <div class="col-sm-4 col-5">
                                        <h5 class="f-w-400">Kode Garansi</h5>
                                    </div>
                                    <div class="col-sm-8 col-7">
                                        <h5 class="f-w-500">:</h5>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-400">Nama</h5>
                                    </div>
                                    <div class="col-sm-8 col-6">
                                        <h5 class="f-w-500">:</h5>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-400">Merek Mobil</h5>
                                    </div>
                                    <div class="col-sm-8 col-6">
                                        <h5 class="f-w-500">:</h5>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-400">Jenis Mobil</h5>
                                    </div>
                                    <div class="col-sm-8 col-6">
                                        <h5 class="f-w-500">:</h5>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-400">Tanggal Daftar</h5>
                                    </div>
                                    <div class="col-sm-8 col-6">
                                        <h5 class="f-w-500">:</h5>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-400">Nomor Rangka</h5>
                                    </div>
                                    <div class="col-sm-8 col-6">
                                        <h5 class="f-w-500">:</h5>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-400">Nomor Plat</h5>
                                    </div>
                                    <div class="col-sm-8 col-6">
                                        <h5 class="f-w-500">:</h5>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-400">Kaca Film Depan</h5>
                                    </div>
                                    <div class="col-sm-8 col-6">
                                        <h5 class="f-w-500">:</h5>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-400">Kaca Film Samping</h5>
                                    </div>
                                    <div class="col-sm-8 col-6">
                                        <h5 class="f-w-500">:</h5>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-400">Kaca Film Belakang</h5>
                                    </div>
                                    <div class="col-sm-8 col-6">
                                        <h5 class="f-w-500">:</h5>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4 col-6">
                                        <h5 class="f-w-400">Status</h5>
                                    </div>
                                    <div class="col-sm-8 col-6">
                                        <h5 class="f-w-500">:</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="pt-4 border-bottom-1 pb-3">
                                    <img src="{{ asset($viewData->pas_foto) }}" width="250px" height="300" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row-->
        </div>
    </div>
    <!-- end row -->
    @endsection

    @section('footer')
    @endsection
