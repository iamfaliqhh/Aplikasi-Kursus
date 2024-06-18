@extends('master.master-admin')

@section('title')
    Histori Pendaftaran | DrArtexFilms
@endsection

@section('header')
@endsection

@section('navbar')
    @parent
@endsection

@section('menunya')
    <h1 class="font-weight-bold" style="font-size: 24px;">Histori Pendaftaran Garansi<h1>
@endsection

@section('menu')
    @include('sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Pendaftaran Garansi</h4>
                    <!-- center modal -->
                    <div>
                        <button class="btn btn-secondary waves-effect waves-light mb-4" onclick="printDiv('cetak')"><i
                            class="fa fa-print"> </i></button>
                        <button type="button" data-url="generate-kode" class="btn btn-secondary waves-effect waves-light mb-4 generate_kode" id="generate_kode" title="Generate Kode"><i class="mdi mdi-shape-circle-plus me-1"></i>Generate Kode</button>
                        <button type="button" class="btn btn-secondary mb-4" data-bs-toggle="modal" data-bs-target="#modalTambah"
                            style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Tambah Data Garansi</button>
                    </div>
                    <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                        aria-hidden="true" id="modalTambah">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Data Garansi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="save-pendaftaran" method="POST" enctype="multipart/form-data">
                                        <div class="form-row label-font">
                                            <div class="form-group col-md-6">
                                                <label for="">Nama</label>
                                                <input type="text" name="nama" class="form-control" id="" placeholder="Masukkan Nama Lengkap Anda" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal" id="" placeholder="Masukkan Tanggal Lahir Anda" required>
                                            </div>
                                        </div>
                                        <div class="form-row label-font">
                                            <div class="form-group col-md-6">
                                                <label for="">Email</label>
                                                <input type="email" class="form-control" name="email" id="" placeholder="Masukkan Email Anda" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">No. Handphone</label>
                                                <input type="tel" class="form-control" name="handphone" id="" placeholder="Masukkan No. HP Anda" required>
                                            </div>
                                        </div>
                                            <div class="form-group label-font">
                                                <label for="">Alamat</label>
                                                <input type="text" class="form-control" name="alamat" id="" placeholder="Masukkan Alamat Lengkap Anda" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label label-font">Merek Mobil</label>
                                                <select id="merek-dropdown" class="form-control select2" name="merk">
                                                <option value="">-- Pilih Merek Mobil --</option>
                                                @foreach ($mereks as $m)
                                                <option value="{{$m->id}}">{{$m->name}}</option>
                                                @endforeach
                                                </select>
                                                <br>
                                                <label for="" class="form-label label-font">Tipe Mobil</label>
                                                <select id="tipe-dropdown" class="form-control select2" name="tipe">
                                                    <option value="">-- Pilih Tipe Mobil --</option>
                                                    @foreach ($tipes as $m)
                                                    <option value="{{$m->id}}">{{$m->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-row label-font">
                                                <div class="form-group col-md-6">
                                                    <label for="">Nomor Rangka Kendaraan</label>
                                                    <input type="text" name="nomor_rangka" class="form-control" id="" placeholder="Masukkan Nomor Rangka" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Nomor Plat Kendaraan</label>
                                                    <input type="text" name="nomor_plat" class="form-control" id="" placeholder="Masukkan Nomor Plat" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label label-font">PPF</label>
                                                <select id="" class="form-control select2" name="ppf">
                                                    <option value="">-- Pilih PPF --</option>
                                                    @foreach ($res_ppf as $val)
                                                    <option value="{{$val->id}}">
                                                        {{$val->nama_produk}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label label-font">Kaca Film Depan</label>
                                                <select id="" class="form-control select2" name="front_window">
                                                <option value="">-- Pilih Kaca Film --</option>
                                                @foreach ($windowfilms as $m)
                                                <option value="{{$m->id}}">
                                                    {{$m->nama_produk}}
                                                </option>
                                                @endforeach
                                                </select>
                                                <br>
                                                <label for="" class="form-label label-font">Kaca Film Samping</label>
                                                <select id="" class="form-control select2" name="side_window">
                                                <option value="">-- Pilih Kaca Film --</option>
                                                @foreach ($windowfilms as $m)
                                                <option value="{{$m->id}}">
                                                    {{$m->nama_produk}}
                                                </option>
                                                @endforeach
                                                </select>
                                                <br>
                                                <label for="" class="form-label label-font">Kaca Film Belakang</label>
                                                <select id="" class="form-control select2" name="back_window">
                                                <option value="">-- Pilih Kaca Film --</option>
                                                @foreach ($windowfilms as $m)
                                                <option value="{{$m->id}}">
                                                    {{$m->nama_produk}}
                                                </option>
                                                @endforeach
                                                </select>
                                            </div>
                                        <div class="modal-footer border-top-0 d-flex">
                                            <button type="button" class="btn btn-danger light"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" name="add" class="btn btn-primary">Tambah
                                                Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="cetak">
                        {{ csrf_field() }}
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Garansi</th>
                                    <th>Nama Pemilik</th>
                                    <th>Merek Mobil</th>
                                    <th>Jenis Mobil</th>
                                    <th>Nomor Rangka</th>
                                    <th>Nomor Plat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $x)
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    <td>{{ $x->code ?? '-'}}</td>
                                    <td>{{ $x->nama ?? '-'}}</td>
                                    <td>{{ $x->tipe_mobil->merek->name ?? '-' }}</td>
                                    <td>{{ $x->tipe_mobil->name ?? '-' }}</td>
                                    <td>{{ $x->nomor_rangka ?? '-' }}</td>
                                    <td>{{ $x->nomor_plat ?? '-'}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                @if ($x->status == 'claimed')
                                                <span class="badge badge-success">Terverifikasi<span
                                                    class="ms-1 fa fa-check"></span>
                                                @elseif($x->status == 'unclaimed')
                                                <span class="badge badge-warning">Belum <br> Klaim
                                                    <br><span class="ms-1 fas fa-ban"></span>
                                                @elseif($x->status == 'pending')
                                                <span class="badge badge-primary">Pending<span
                                                    class="ms-1 fa fa-check"></span>
                                                @else
                                                <span class="badge badge-danger">Not Found<span
                                                    class="ms-1 fa fa-ban"></span>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <div class="dropdown text-sans-serif">
                                                    <button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-7" data-bs-toggle="dropdown"
                                                    data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                        <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12" r="2">
                                                                </circle>
                                                                <circle fill="#000000" cx="12" cy="12" r="2">
                                                                </circle>
                                                                <circle fill="#000000" cx="19" cy="12" r="2">
                                                                </circle>
                                                            </g></svg></span>
                                                    </button>
                                                <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-7">
                                                    <div class="py-2">
                                                        @if ($x->status != 'claimed')
                                                        <a class="dropdown-item" href="/verified-registration/{{ $x->id }}">Verifikasi</a>
                                                        @endif
                                                        <a class="dropdown-item" href="/notverified-registration/{{ $x->id }}">Batal Verifikasi</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="dropdown">
                                                <button class="btn btn-primary tp-btn-light" type="button" id="order-dropdown-2" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="order-dropdown-2">
                                                    <a class="btn-xs dropdown-item" title="Detail" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $x->id }}">
                                                        <i class="fa fa-regular fa-eye"></i> Lihat
                                                    </a>
                                                    <a class="btn-xs dropdown-item" title="Edit" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $x->id }}">
                                                        <i class="fa fa-pencil-alt"></i> Ubah
                                                    </a>
                                                    <a href="delete-pendaftaran/{{$x->id}}" class="btn-xs dropdown-item btn-delete" data-name="{{$x->code}}">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </a>
                                                    <!-- <a class="btn-xs dropdown-item btn-delete" href="delete-merek/{{$x->id}}" data-name="{{$x->code}}">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </a> -->
                                                </div>
                                            </div>


                                            {{-- modal detail data --}}
                                            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel{{ $x->id }}" aria-hidden="true" id="modalDetail{{ $x->id }}">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Data Garansi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <input type="hidden" name="id" value="{{ $x->id }}">
                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label for="nama" class="form-label">Kode Garansi</label>
                                                                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $x->code }}" readonly>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="nama" class="form-label">Nama</label>
                                                                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $x->nama }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label for="tanggal" class="form-label">Tanggal Lahir</label>
                                                                        <input type="text" class="form-control datepicker" name="tanggal" id="tanggal" placeholder="dd-mm-YYYY" value="{{ $x->tanggal }}" readonly>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="email" class="form-label">Email</label>
                                                                        <input type="email" class="form-control" name="email" id="email" value="{{ $x->email }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label for="handphone" class="form-label">No. Handphone</label>
                                                                        <input type="tel" class="form-control" name="handphone" id="handphone" value="{{ $x->handphone }}" readonly>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="alamat" class="form-label">Alamat</label>
                                                                        <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $x->alamat }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label for="merek-dropdown" class="form-label">Merek Mobil</label>
                                                                        <select id="merek-dropdown" class="form-control select2" name="merek" disabled>
                                                                            <option value=""></option>
                                                                            @foreach ($mereks as $m)
                                                                                <option value="{{ $m->id }}" @if(isset($x->tipe_mobil->merek->id) && $x->tipe_mobil->merek->id == $m->id) selected @endif>
                                                                                    {{ $m->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="tipe-dropdown" class="form-label">Tipe Mobil</label>
                                                                        <select id="tipe-dropdown" class="form-control select2" name="tipe" disabled>
                                                                            <option value=""></option>
                                                                            @foreach ($tipes as $m)
                                                                                <option value="{{ $m->id }}" @if(isset($x->tipe) && $x->tipe == $m->id) selected @endif>
                                                                                    {{ $m->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label for="nomor_rangka" class="form-label">Nomor Rangka Kendaraan</label>
                                                                        <input type="text" name="nomor_rangka" class="form-control" id="nomor_rangka" value="{{ $x->nomor_rangka }}" readonly>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="nomor_plat" class="form-label">Nomor Plat Kendaraan</label>
                                                                        <input type="text" name="nomor_plat" class="form-control" id="nomor_plat" value="{{ $x->nomor_plat }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="reseller" class="form-label">Alamat Reseller</label>
                                                                    <input type="text" class="form-control" name="reseller" id="reseller" value="{{ $x->reseller }}" readonly>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="ppf" class="form-label">PPF</label>
                                                                    <input type="text" class="form-control" name="ppf" id="ppf" value="{{ $x->ppf_name }}" readonly>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-md-4">
                                                                        <label for="front_window" class="form-label">Kaca Film Depan</label>
                                                                        <input type="text" class="form-control" name="front_window" id="front_window" value="{{ $x->front }}" readonly>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="side_window" class="form-label">Kaca Film Samping</label>
                                                                        <input type="text" class="form-control" name="side_window" id="side_window" value="{{ $x->side }}" readonly>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="back_window" class="form-label">Kaca Film Belakang</label>
                                                                        <input type="text" class="form-control" name="back_window" id="back_window" value="{{ $x->back }}" readonly>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                            @php
                                                $data_code = explode('-',$x->code)[0];
                                                $date = null;
                                                
                                                if (strlen($data_code) === 8 && is_numeric($data_code)) {
                                                    $date = \Carbon\Carbon::createFromFormat('dmY', $data_code)->format('Y-m-d');
                                                }
                                            @endphp

                                            {{-- modal edit --}}
                                            <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                                                aria-hidden="true" id="modalEdit{{ $x->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data Garansi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="update-pendaftaran" method="POST" enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id" value="{{ $x->id }}">
                                                                <div class="form-row label-font">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="">Nama</label>
                                                                        <input type="text" name="nama" class="form-control" id="" placeholder="Masukkan Nama Lengkap Anda" value="{{$x->nama}}" required>
                                                                    </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="">Tanggal Lahir</label>
                                                                    <input type="date" class="form-control" name="tanggal" id="" placeholder="dd-mm-YYYY" value="{{$x->tanggal}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-row label-font">
                                                                <div class="form-group col-md-6">
                                                                    <label for="">Email</label>
                                                                    <input type="email" class="form-control" name="email" id="" placeholder="Masukkan Email Anda" value="{{$x->email}}" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="">No. Handphone</label>
                                                                    <input type="tel" class="form-control" name="handphone" id="" placeholder="Masukkan No. HP Anda" value="{{$x->handphone}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group label-font">
                                                                <label for="">Alamat</label>
                                                                <input type="text" class="form-control" name="alamat" id="" placeholder="Masukkan Alamat Lengkap Anda" value="{{$x->alamat}}" required>
                                                            </div>
                                                            <div class="form-row label-font">
                                                                <div class="form-group col-md-6">
                                                                    <label for="">Tanggal Pemasangan</label>
                                                                    <input type="date" class="form-control" name="tgl_pemasangan" placeholder="dd-mm-YYYY" value="{{ $x->tgl_pemasangan }}" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="">Tanggal Garansi</label>
                                                                    <input type="date" class="form-control" name="code" placeholder="dd-mm-YYYY" value="{{ $date }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="" class="form-label label-font">Merek Mobil</label>
                                                                <select id="merek-dropdown" class="form-control select2" name="merek">
                                                                    <option value="">-- Pilih Merek Mobil --</option>
                                                                    @foreach ($mereks as $m)
                                                                    <option value="{{$m->id}}" @if(isset($x->tipe_mobil->merek->id) && $x->tipe_mobil->merek->id == $m->id) selected @endif>
                                                                        {{$m->name}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                <br>
                                                                <label for="" class="form-label label-font">Tipe Mobil</label>
                                                                <select id="tipe-dropdown" class="form-control select2" name="tipe">
                                                                <option value="">-- Pilih Tipe Mobil --</option>
                                                                    @foreach ($tipes as $m)
                                                                    <option value="{{$m->id}}" @if(isset($x->tipe) && $x->tipe == $m->id) selected @endif>
                                                                        {{$m->name}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-row label-font">
                                                                <div class="form-group col-md-6">
                                                                    <label for="">Nomor Rangka Kendaraan</label>
                                                                    <input type="text" name="nomor_rangka" class="form-control" id="" placeholder="Masukkan Nomor Rangka" value="{{$x->nomor_rangka}}" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="">Nomor Plat Kendaraan</label>
                                                                    <input type="text" name="nomor_plat" class="form-control" id="" placeholder="Masukkan Nomor Plat" value="{{$x->nomor_plat}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="" class="form-label label-font">PPF</label>
                                                                <select id="" class="form-control select2" name="ppf">
                                                                    <option value="">-- Pilih PPF --</option>
                                                                    @foreach ($res_ppf as $val)
                                                                    <option value="{{$val->id}}" {{ ($val->id == $x->ppf)? 'selected' : '' }}>
                                                                        {{$val->nama_produk}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="" class="form-label label-font">Kaca Film Depan</label>
                                                                <select id="" class="form-control select2" name="front_window">
                                                                    <option value="">-- Pilih Kaca Film --</option>
                                                                    @foreach ($windowfilms as $m)
                                                                    <option value="{{$m->id}}" {{ ($m->id == $x->front_window)? 'selected' : '' }}>
                                                                        {{$m->nama_produk}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                <br>
                                                                <label for="" class="form-label label-font">Kaca Film Samping</label>
                                                                <select id="" class="form-control select2" name="side_window">
                                                                    <option value="">-- Pilih Kaca Film --</option>
                                                                    @foreach ($windowfilms as $m)
                                                                    <option value="{{$m->id}}" {{ ($m->id == $x->side_window)? 'selected' : '' }}>
                                                                        {{$m->nama_produk}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                <br>
                                                                <label for="" class="form-label label-font">Kaca Film Belakang</label>
                                                                <select id="" class="form-control select2" name="back_window">
                                                                    <option value="">-- Pilih Kaca Film --</option>
                                                                    @foreach ($windowfilms as $m)
                                                                    <option value="{{$m->id}}" {{ ($m->id == $x->back_window)? 'selected' : '' }}>
                                                                        {{$m->nama_produk}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer border-top-0 d-flex">
                                                                <button type="button" class="btn btn-danger light"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Tambah
                                                                Data</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                            {{-- modal delete --}}
                                            <div class="modal fade" tabindex="-1"
                                                role="dialog" aria-hidden="true" id="delete{{ $x->id }}">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Data</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center"><i
                                                                class="fa fa-trash"></i><br> Apakah anda yakin ingin
                                                            menghapus data ini?<br> {{ $x->name }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger light"
                                                                data-bs-dismiss="modal">Batalkan</button>
                                                            <a href="{{ route('delete-merek', $x->id) }}">
                                                                <button type="submit" class="btn btn-danger shadow">
                                                                    Ya, Hapus Data!
                                                                </button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection