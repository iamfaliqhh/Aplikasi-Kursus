@extends('master.master-admin')

@section('title')
    Data Merek & Tipe | STEALTH
@endsection

@section('header')
@endsection

@section('navbar')
    @parent
@endsection

@section('menunya')
    <h1 class="font-weight-bold" style="font-size: 24px;">Merek & Tipe Mobil<h1>
@endsection

@section('menu')
    @auth
        <ul class="metismenu" id="menu">
            <li><a href="{{ route('dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->role == 'Administrator')
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-book"></i>
                        <span class="nav-text">Data Master </span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('data-user') }}">Garansi</a></li>
                        <li><a href="{{ route('data-sekolah') }}">Merek & Tipe Mobil</a></li>
                        <li><a href="{{ route('data-produk') }}">Produk</a></li>

                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-database"></i>
                        <span class="nav-text">Data History</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('data-registration') }}">Pendaftaran</a></li>
                        <li><a href="{{ route('data-pembayaran') }}">Pembayaran</a></li>
                    </ul>
                </li>
            @else
                <li><a href="{{ route('data-registration') }}" aria-expanded="false">
                        <i class="fa fa-database"></i>
                        <span class="nav-text">Pendaftaran</span>
                    </a>
                </li>
            @endif
        </ul>
    @endauth
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Merek & Tipe Mobil</h4>

                    <!-- center modal -->
                    <div>
                        <button class="btn btn-info waves-effect waves-light mb-4" onclick="printDiv('cetak')"><i
                                class="fa fa-print"> </i></button>
                        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target=".modal"
                            style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Tambah Sekolah</button>
                    </div>


                    <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Sekolah</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="save-school" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="userid" value="{{ auth()->user()->id }}">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <label for="iduser">NPSN</label>
                                                    <input type="text" class="form-control" id="nama"
                                                        placeholder="Enter NPSN" name="id" required>
                                                </div>
                                                <div class="col-xl-8">
                                                    <label for="iduser">Nama Sekolah</label>
                                                    <input type="text" class="form-control" id="nama"
                                                        placeholder="Enter School Name" name="nama" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="iduser">Alamat</label>
                                            <textarea name="Address" id="" cols="30" rows="5" class="form-control" placeholder="Enter Address"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="iduser">Kabupaten/Kota</label>

                                            <input class="form-control" list="datalistOptionsSekolah" id="exampleDataList"
                                                placeholder="Pilih wilayah" name="kota" value="{{ old('kota') }}">
                                            <datalist id="datalistOptionsSekolah">
                                                <option value="Purwakarta">Purwakarta</option>
                                                <option value="Subang">Subang</option>
                                                <option value="Karawang">Karawang</option>
                                                <option value="Bandung">Bandung</option>
                                                <option value="Banten">Banten</option>
                                                <option value="Bekasi">Bekasi</option>
                                                <option value="Bogor">Bogor</option>
                                            </datalist>
                                        </div>
                                        <div class="modal-footer border-top-0 d-flex">
                                            <button type="button" class="btn btn-danger light"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" name="add" class="btn btn-primary">Tambahkan
                                                Data</button>
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
                                    <th>NPSN</th>
                                    <th>Nama Sekolah</th>
                                    <th>Alamat</th>
                                    <th>Kota</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($viewData as $x)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $x->NPSN }}</td>
                                        <td>{{ $x->nama_sekolah }}</td>
                                        <td>{{ $x->alamat }}</td>
                                        <td>{{ $x->kota }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-primary shadow btn-xs sharp me-1" title="Edit"
                                                    data-bs-toggle="modal" data-bs-target=".edit{{ $x->NPSN }}"><i
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
                                                                    class="fa fa-trash"></i><br> Anda yakin ingin menghapus
                                                                data ini?<br>{{ $x->id }}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger light"
                                                                    data-bs-dismiss="modal">Batalkan</button>
                                                                <a href="delete-school/{{ $x->id }}">
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

                                    <div class="modal fade edit{{ $x->NPSN }}" tabindex="-1" role="dialog"
                                        aria-labelledby="mySmallModalLabel" aria-hidden="true">

                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Sunting Sekolah</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="update-school/{{ $x->NPSN }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="userid"
                                                            value="{{ auth()->user()->id }}">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-xl-4">
                                                                    <label for="iduser">NPSN</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama" value="{{ $x->NPSN }}"
                                                                        placeholder="Enter NPSN" name="id" readonly>
                                                                </div>
                                                                <div class="col-xl-8">
                                                                    <label for="iduser">Nama Sekolah</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama" value="{{ $x->nama_sekolah }}"
                                                                        placeholder="Enter School Name" name="nama"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="iduser">Alamat</label>
                                                            <textarea name="Address" id="" cols="30" rows="5" class="form-control">{{ $x->alamat }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="iduser">Kabupaten/Kota</label>
                                                            <input class="form-control" list="datalistOptionsSekolah"
                                                                id="exampleDataList" name="kota"
                                                                value="{{ $x->kota }}">
                                                            <datalist id="datalistOptionsSekolah">
                                                                <option value="Purwakarta">Purwakarta</option>
                                                                <option value="Subang">Subang</option>
                                                                <option value="Karawang">Karawang</option>
                                                                <option value="Bandung">Bandung</option>
                                                                <option value="Banten">Banten</option>
                                                                <option value="Bekasi">Bekasi</option>
                                                                <option value="Bogor">Bogor</option>
                                                            </datalist>
                                                        </div>
                                                        <div class="modal-footer border-top-0 d-flex">
                                                            <button type="button" class="btn btn-danger light"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" name="add"
                                                                class="btn btn-primary">Perbaharui
                                                                Data</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
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
