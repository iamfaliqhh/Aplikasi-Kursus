@extends('master.master-admin')

@section('title')
    Edit Pendaftaran Garansi | STEALTH
@endsection

@section('header')
@endsection

@section('navbar')
    @parent
@endsection

@section('menunya')
    <h1 class="font-weight-bold" style="font-size: 24px;">Edit Pendaftaran Garansi</h1>
@endsection

@section('menu')    
    @include('sidebar')
@endsection

@section('content')
    <div class="row">
        <form action="/update-registration/{{ $viewData->id_pendaftaran }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-xl-12">
                <div class="custom-accordion">
                    <div class="card">
                        <a href="#personal-data" class="text-dark" data-bs-toggle="collapse">
                            <div class="p-4">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3"> <i class="uil uil-receipt text-primary h2"></i> </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Data Garansi</h5>
                                        <p class="text-muted text-truncate mb-0">Pastikan data garansi tersebut sesuai ya!
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div id="personal-data" class="collapse show">
                            <div class="p-4 border-top">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label"  for="">Kode Garansi</label>
                                            <input type="text" value="" class="form-control" id="" name=""
                                                placeholder="Masukkan Kode Garansi" value="">
                                            @error()
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="">Nama</label>
                                            <input type="text" value="" class="form-control" id="" name=""
                                                placeholder="Masukkan Nama" value="">
                                            @error()
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="">Merek Mobil</label>
                                            <select class="form-control wide" name="" value="">
                                                <option value=""  selected>
                                                </option>
                                                <option value=""></option>
                                            </select>
                                            @error()
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="">Jenis Mobil</label>
                                            <select class="form-control wide" name="" value="">
                                                <option value=""  selected>
                                                </option>
                                                <option value=""></option>
                                            </select>
                                            @error()
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-4 mb-lg-0">
                                            <label class="form-label">Nomor Rangka</label>
                                            <input type="text" value="" class="form-control" id="" name=""
                                                placeholder="Masukkan Nomor Rangka" value="">
                                            @error()
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4 mb-lg-0">
                                            <label class="form-label" for="">Nomor Plat</label>
                                            <input type="text" value="" class="form-control" id="" name=""
                                            placeholder="Masukkan Nomor Plat" value="">
                                            @error()
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <!--<input name="tanggallahir" class="datepicker-default form-control" id="datepicker" >-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="">Kaca Film Depan</label>
                                            <select class="form-control wide" name="" value="">
                                                <option value=""  selected>
                                                </option>
                                                <option value=""></option>
                                            </select>
                                            @error()
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="">Kaca Film Samping</label>
                                            <select class="form-control wide" name="" value="">
                                                <option value=""  selected>
                                                </option>
                                                <option value=""></option>
                                            </select>
                                            @error()
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                        <div class="mb-3 mb-4">
                                            <label class="form-label" for="">Kaca Film Belakang</label>
                                            <select class="form-control wide" name="" value="">
                                                <option value=""  selected>
                                                </option>
                                                <option value=""></option>
                                            </select>
                                            @error()
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Peringatan!</strong>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <div class="text-end mt-2 mt-sm-0">
                                <button type="submit" name="add" class="btn btn-primary">Perbaharui</button>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row-->
                </div>
        </form>
    </div>
    <!-- end row -->
@endsection

@section('footer')
@endsection
