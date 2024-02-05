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
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Pendaftaran Garansi</h4>
                    <!-- center modal -->
                    <div>
                        <button class="btn btn-info waves-effect waves-light mb-4" onclick="printDiv('cetak')"><i
                            class="fa fa-print"> </i></button>
                        <!--<button class="btn btn-secondary waves-effect waves-light mb-4"><i class="fas fa-eye"
                                                        title="Mode grid"> </i></button>-->
                        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalTambah"
                            style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Tambahkan Pendaftaran</button>
                    </div>
                    <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                        aria-hidden="true" id="modalTambah">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Pendaftaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="save-pendaftaran" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <label for="name">Pendaftaran</label>
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="Masukkan Garansi" name="name" required>
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
                                    <th>Nama Pemilik</th>
                                    <th>Merek Mobil</th>
                                    <th>Jenis Mobil</th>
                                    <th>Nomor Rangka</th>
                                    <th>Nomor Plat</th>
                                    <th>Kaca Film Depan</th>
                                    <th>Kaca Film Samping</th>
                                    <th>Kaca Film Belakang</th>
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
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
                                            <div class="dropdown text-sans-serif"><button
                                                class="btn btn-primary tp-btn-light sharp" type="button"
                                                id="order-dropdown-7" data-bs-toggle="dropdown"
                                                data-boundary="viewport" aria-haspopup="true"
                                                aria-expanded="false"><span><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="18px" height="18px" viewbox="0 0 24 24"
                                                version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none"
                                                fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                        <circle fill="#000000" cx="5" cy="12" r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="12" cy="12" r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="19" cy="12" r="2">
                                                        </circle>
                                                </g>
                                                </svg></span></button>
                                                <div class="dropdown-menu dropdown-menu-end border py-0"
                                                    aria-labelledby="order-dropdown-7">
                                                    <div class="py-2"><a class="dropdown-item"
                                                        href="/verified-registration/{{ $x->id }}">Terverifikasi</a><a
                                                        class="dropdown-item"
                                                        href="/notverified-registration/{{ $x->id }}">Belum
                                                                            Terverifikasi</a>
                                                        <div class="dropdown-divider"></div><a
                                                            class="dropdown-item text-success"
                                                            href="/finish-registration/{{ $x->id }}">Selesai
                                                            </a>
                                                        </div>
                                                        <div class="dropdown-divider"></div><a
                                                        class="dropdown-item text-danger"
                                                        href="/invalid-registration/{{ $x->id }}">Tidak
                                                        Sah</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-primary shadow btn-xs sharp me-1" title="Edit"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalEdit{{ $x->id }}"><i
                                                    class="fa fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".delete{{ $x->id }}"></i></a>

                                            {{-- modal edit --}}
                                            <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                                                aria-hidden="true" id="modalEdit{{ $x->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Merek</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="update-merek" method="POST" enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id" value="{{ $x->id }}">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-xl-12">
                                                                            <label for="iduser">Merek</label>
                                                                            <input type="text" class="form-control" id="name"
                                                                                placeholder="Masukkan Merek" name="name" required value="{{$x->name}}">
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