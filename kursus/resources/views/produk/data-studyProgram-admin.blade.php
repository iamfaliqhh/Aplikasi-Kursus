@extends('master.master-admin')

@section('title')
    Produk | DrArtexFilms
@endsection

@section('header')
@endsection

@section('navbar')
    @parent
@endsection

@section('menunya')
    <h1 class="font-weight-bold" style="font-size: 24px;">Produk<h1>
@endsection

@section('menu')
    @include('sidebar')
@endsection

@section('content')
@error('success')
<div class="alert alert-success alert-dismissible fade show">
    <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
    <strong>Sukses!</strong> Data berhasil disimpan.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
    </button>
</div>
@enderror
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Produk</h4>
                    <!-- center modal -->
                    <div>
                        <button class="btn btn-secondary waves-effect waves-light mb-4" onclick="printDiv('cetak')"><i
                                class="fa fa-print"> </i></button>
                        <button type="button" class="btn btn-secondary mb-4" data-bs-toggle="modal" data-bs-target=".modal"
                            style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Tambah Produk</button>
                    </div>

                    <div class="modal fade modal" tabindex="-1" role="dialog" id="modal_tambah" aria-labelledby="mySmallModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="save-produk" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="userid" value="{{ auth()->user()->id}}">
                                        <div class="form-group">
                                            <label for="kode">Kode Produk</label>
                                            <input type="text" class="form-control" id="kode"
                                                placeholder="Masukkan kode produk" name="kode" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="iduser">Nama Produk</label>
                                            <input type="text" class="form-control" id="nama"
                                                placeholder="Masukkan nama produk" name="nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="iduser">Kategori Produk</label>
                                            <select name="kategori" id="kategori" class="form-select sel2">
                                                <option value="">Pilih Kategori</option>
                                            @foreach($kategori as $val)
                                                <option value="{{$val->id}}">{{$val->kategori}}</option>
                                            @endforeach
                                            </select>
                                            <!-- <input type="text" class="form-control" id="kategori"
                                                placeholder="Masukkan kategori produk" name="kategori" required> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="tipe_warranty">Tipe Garansi</label>
                                            <select name="tipe_warranty" id="tipe_warranty" class="form-select tipe">
                                                <option disabled selected option>Pilih Tipe Garansi</option>
                                                @foreach($mWarranty as $val)
                                                    <option value="{{$val->id}}">{{$val->tipe}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="is_lifetime">Garansi Seumur Hidup?</label>
                                            <div class="form-check">
                                                <input class="form-check-input tes" type="checkbox" name="is_lifetime" id="is_lifetime" value="1"><label class="form-check-label">Ya</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-top-0 d-flex">
                                            <button type="button" class="btn btn-danger light"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
                <div class="card-body" id="cetak">
                    <div class="table-responsive">
                        {{ csrf_field() }}

                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori Produk</th>
                                    <th>Tipe Garansi</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viewData as $x)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $x->id_produk }}</td>
                                        <td>{{$x->nama_produk}}</td>
                                        <td>
                                            @foreach($kategori as $val)
                                                @if($x->kategori_produk == $val->id)
                                                    {{$val->kategori}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($mWarranty as $val)
                                                @if($x->tipe_warranty != 0)
                                                    @if($x->tipe_warranty == $val->id)
                                                        {{$val->tipe}}
                                                    @endif
                                                @endif
                                            @endforeach
                                            @if($x->tipe_warranty == 0)
                                                @if($x->is_lifetime == 1)
                                                    Seumur Hidup
                                                @else
                                                    -
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-warning shadow btn-xs sharp me-1" title="Edit" data-bs-toggle="modal" data-bs-target=".edit{{ $x->id }}"><i class="fa fa-pencil-alt"></i></a>
                                                <!-- <a class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash" data-bs-toggle="modal" data-bs-target=".delete{{ $x->id }}"></i></a> -->
                                                <a href="delete-produk/{{$x->id}}" class="btn btn-danger shadow btn-xs sharp btn-delete" data-name="{{$x->nama_produk}}"><i class="fa fa-trash"></i></a>

                                                <!-- START MODAL DELETE -->
                                                <div class="modal fade delete{{ $x->id }}" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
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
                                                                menghapus data ini?<br> {{ $x->nama_produk }}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger light"
                                                                    data-bs-dismiss="modal">Batalkan</button>
                                                                <a href="delete-produk/{{ $x->id }}">
                                                                    <button type="submit" class="btn btn-danger shadow">
                                                                        Ya, Hapus Data!
                                                                    </button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END MODAL DELETE -->

                                            </div>
                                        </td>
                                    </tr>

                                    <!-- START MODAL EDIT -->
                                    <div class="modal fade edit{{ $x->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Sunting Produk</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="update-produk/{{ $x->id }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="userid" value="{{ auth()->user()->id}}">
                                                        <div class="form-group">
                                                            <input type="hidden" name="id" id="nama" class="form-control"
                                                                value="{{ $x->id }}">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <label for="iduser">Kode Produk</label>
                                                                    <input type="text" class="form-control" id="kode"
                                                                        value="{{ $x->id_produk }}" name="kode" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <label for="iduser">Nama Produk</label>
                                                                    <input type="text" class="form-control" id="nama"
                                                                        value="{{ $x->nama_produk }}"
                                                                        placeholder="Masukan nama produk" name="nama"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <label for="iduser">Kategori Produk</label>
                                                                    <select name="kategori" id="kategori" class="form-select">
                                                                        <option value="">Pilih Kategori</option>
                                                                        @foreach($kategori as $val)
                                                                        <option value="{{$val->id}}" {{ ($val->id == $x->kategori_produk)? 'selected' : '' }}>{{$val->kategori}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <!-- <input type="text" class="form-control" id="kategori"
                                                                    placeholder="Masukkan kategori produk" name="kategori" required> -->
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <label for="tipe_warranty">Tipe Garansi</label>
                                                                    <select name="tipe_warranty" id="tipe_warranty" class="form-select tipe">
                                                                        <option disabled selected option>Pilih Tipe Garansi</option>
                                                                        @foreach($mWarranty as $val)
                                                                            <option value="{{$val->id}}" {{ ($val->id == $x->tipe_warranty) ? 'selected' : '' }}>{{$val->tipe}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <label for="is_lifetime">Garansi Seumur Hidup?</label>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input tes" type="checkbox" name="is_lifetime" id="is_lifetime" value="1" {{ ($x->is_lifetime==true)?'checked':'' }}><label class="form-check-label">Ya</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-top-0 d-flex">
                                                            <button type="button" class="btn btn-danger light"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Perbaharui
                                                                Data</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <!-- END MODAL EDIT -->
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