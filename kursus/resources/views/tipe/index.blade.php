@extends('master.master-admin')

@section('title')
    Tipe Mobil | DrArtexFilms
@endsection

@section('header')
@endsection

@section('navbar')
    @parent
@endsection

@section('menunya')
    <h1 class="font-weight-bold" style="font-size: 24px;">Tipe Mobil<h1>
@endsection

@section('menu')
    @include('sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Tipe Mobil</h4>
                    <!-- center modal -->
                    <div>
                        <button class="btn btn-secondary waves-effect waves-light mb-4" onclick="printDiv('cetak')"><i
                            class="fa fa-print"> </i></button>
                        <!--<button class="btn btn-secondary waves-effect waves-light mb-4"><i class="fas fa-eye"
                                                        title="Mode grid"> </i></button>-->
                        <button type="button" class="btn btn-secondary mb-4" data-bs-toggle="modal" data-bs-target="#modalTambah"
                            style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Tambahkan Tipe</button>
                    </div>
                    <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                        aria-hidden="true" id="modalTambah">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Tipe</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="save-tipe" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <label for="name">Tipe</label>
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="Masukkan Merek" name="name" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <label for="name">Merek</label>
                                                    <select name="merek" id="merek" class="form-select">
                                                        <option>Pilih Merek</option>
                                                        @foreach($merk as $val)
                                                            <option value="{{$val->id}}">{{$val->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
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
                                    <th>Tipe</th>
                                    <th>Merek</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $x)
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    <td>{{ $x->name }}</td>
                                    <td>
                                        @foreach($merk as $val)
                                            @if($val->id == $x->merek_id)
                                                {{$val->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-secondary shadow btn-xs sharp me-1" title="Edit" 
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalEdit{{ $x->id }}"><i class="fa fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger shadow btn-xs sharp" title="Delete" data-bs-toggle="modal"
                                            data-bs-target=".delete{{ $x->id }}"><i class="fa fa-trash"></i></a>

                                            {{-- modal edit --}}
                                            <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                                                aria-hidden="true" id="modalEdit{{ $x->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Tipe</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="update-tipe" method="POST" enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id" value="{{ $x->id }}">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-xl-12">
                                                                            <label for="iduser">Tipe</label>
                                                                            <input type="text" class="form-control" id="name"
                                                                                placeholder="Masukkan Merek" name="name" required value="{{$x->name}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-xl-12">
                                                                            <label for="name">Merek</label>
                                                                            <select name="merek" id="merek" class="form-select">
                                                                                <option>Pilih Merek</option>
                                                                                @foreach($merk as $val)
                                                                                    <option value="{{$val->id}}" {{ ($val->id == $x->merek_id)? 'selected' : '' }}>{{$val->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer border-top-0 d-flex">
                                                                    <button type="button" class="btn btn-danger light"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                    <button type="submit" name="add" class="btn btn-primary">Edit
                                                                        Data</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                            {{-- modal delete --}}
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
                                                            menghapus data ini?<br> {{ $x->name }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger light"
                                                                data-bs-dismiss="modal">Batalkan</button>
                                                            <a href="{{ route('delete-tipe', $x->id) }}">
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