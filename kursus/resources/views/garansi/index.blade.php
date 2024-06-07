@extends('master.master-admin')

@section('title')
    Garansi | STEALTH
@endsection

@section('header')
@endsection

@section('navbar')
    @parent
@endsection

@section('menunya')
    <h1 class="font-weight-bold" style="font-size: 24px;">Garansi<h1>
@endsection

@section('menu')
    @include('sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Garansi</h4>
                    <!-- center modal -->
                    <div>
                        <button class="btn btn-secondary waves-effect waves-light mb-4" onclick="printDiv('cetak')"><i
                            class="fa fa-print"> </i></button>
                        <!--<button class="btn btn-secondary waves-effect waves-light mb-4"><i class="fas fa-eye"
                                                        title="Mode grid"> </i></button>-->
                        <button type="button" class="btn btn-secondary mb-4" data-bs-toggle="modal" data-bs-target=".modal"
                            style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Tambahkan Garansi</button>
                    </div>
                    <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Kode Garansi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="save-user" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="userid" value="{{ auth()->user()->id }}">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <label for="iduser">Kode Garansi</label>
                                                    <input type="text" class="form-control" id="nama"
                                                        placeholder="Masukkan Kode Garansi" name="nama" required>
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
                                    <th>Kode Garansi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataUser as $x)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $x->name }}</td>
                                    <td></td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-primary shadow btn-xs sharp me-1" title="Edit"
                                                href=""><i
                                                    class="fa fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".delete{{ $x->id }}"></i></a>
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
                                                            menghapus data ini?<br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger light"
                                                                data-bs-dismiss="modal">Batalkan</button>
                                                            <a href="{{ route('delete-user', $x->id) }}">
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