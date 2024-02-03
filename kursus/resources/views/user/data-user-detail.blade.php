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
    <div class="row mb-4">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#about-me" data-bs-toggle="tab"
                                        class="nav-link active show">Profil</a>
                                </li>
                                <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab"
                                        class="nav-link">Pengaturan Profil</a>
                                </li>
                                <li class="nav-item"><a href="#password-settings" data-bs-toggle="tab"
                                        class="nav-link">Pengaturan Kata Sandi</a>
                                </li>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="about-me" class="tab-pane fade active show">
                                    <div class="profile-personal-info">
                                        <br>
                                        @if (
                                            $viewData->no_hp == null ||
                                                $viewData->tempat_lahir == null ||
                                                $viewData->gender == null ||
                                                $viewData->alamat == null)
                                            <div class="alert alert-warning alert-dismissible fade show">
                                                <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                                    stroke-width="2" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round" class="me-2">
                                                    <path
                                                        d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                                                    </path>
                                                    <line x1="12" y1="9" x2="12" y2="13">
                                                    </line>
                                                    <line x1="12" y1="17" x2="12.01" y2="17">
                                                    </line>
                                                </svg>
                                                <strong>Peringatan!</strong> Data belum lengkap. Silahkan lengkapi data akun
                                                sekarang.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="btn-close">
                                                </button>
                                            </div>
                                        @endif
                                        <br>
                                        <h4 class="text-primary mb-4">Informasi Pribadi</h4>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Nama </h5>
                                            </div>
                                            <div class="col-sm-9 col-7">{{ $viewData->nama }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Jenis Kelamin </h5>
                                            </div>
                                            <div class="col-sm-9 col-7">
                                                {{ $viewData->gender }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Tempat Lahir</h5>
                                            </div>
                                            <div class="col-sm-9 col-7">
                                                {{ $viewData->tempat_lahir }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Tanggal Lahir</h5>
                                            </div>
                                            <div class="col-sm-9 col-7">
                                                {{ $viewData->tanggal_lahir }}
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h5 class="f-w-500">Alamat
                                                </h5>
                                            </div>
                                            <div class="col-sm-9 col-7">
                                                {{ $viewData->alamat }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-about-me">
                                        <div class="pt-4 border-bottom-1 pb-3">
                                            <h4 class="text-primary">Kontak Pribadi</h4>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-6 col-6">
                                                <h5 class="f-w-500"><i class="fas fa-phone-alt"></i>
                                                    {{ $viewData->no_hp }}

                                                </h5>
                                            </div>
                                            <div class="col-sm-6 col-6">
                                                <h5 class="f-w-500"><i class="fas fa-envelope"></i>
                                                    {{ $viewData->email }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-about-me">
                                        <div class="pt-4 border-bottom-1 pb-3">
                                            <h4 class="text-primary">Sosial Media</h4>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3 col-5">
                                                <h2>
                                                    <a href="https://www.instagram.com/{{ $viewData->instagram }}/"><i
                                                            class="fab fa-instagram" style="width: 50px"></i></a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="profile-settings" class="tab-pane fade">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <br>
                                            <h4 class="text-primary">Pengaturan Profil</h4>
                                            <form action="{{ route('update-user', $viewData->user_id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="userid" value="{{ auth()->user()->id }}">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Nama</label>
                                                        <input type="text" value="{{ $viewData->nama }}"
                                                            class="form-control" name="nama" readonly>

                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" value="{{ $viewData->email }}"
                                                            class="form-control" name="email" readonly>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" class="form-control-file"
                                                    value="{{ $viewData->user_id }}">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Jenis Kelamin</label>
                                                        @if ($viewData->gender != null)
                                                            @if ($viewData->gender == 'Perempuan')
                                                                <select class="form-control wide" name="jk"
                                                                    value="{{ old('jk') }}">
                                                                    <option value="{{ $viewData->gender }}" selected>
                                                                        {{ $viewData->gender }}</option>
                                                                    <option value="Laki-laki">Laki-laki</option>
                                                                </select>
                                                            @else
                                                                <select class="form-control wide" name="jk"
                                                                    value="{{ old('jk') }}">
                                                                    <option value="{{ $viewData->gender }}" selected>
                                                                        {{ $viewData->gender }}</option>
                                                                    <option value="Perempuan">Perempuan</option>
                                                                </select>
                                                            @endif
                                                        @else
                                                            <select class="form-control wide" name="jk"
                                                                value="{{ old('jk') }}">
                                                                <option value="{{ old('jk') }}" disabled selected>
                                                                    Pilih
                                                                    Jenis Kelamin </option>
                                                                <option value="Laki-laki">Laki-aki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                            @error('jk')
                                                                <div class="alert alert-warning" role="alert">
                                                                    <strong>Warning!</strong>
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Foto Profil</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Upload</span>
                                                            <div class="form-file">
                                                                <input type="file" class="form-file-input form-control"
                                                                    name="foto">
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="pathFoto" class="form-control-file"
                                                            value="{{ $viewData->foto }}">
                                                        <img class="avatar-lg rounded-circle img-thumbnail"
                                                            src="{{ url('/' . $viewData->foto) }}" width="75px"
                                                            height="auto" alt="">
                                                        @error('foto')
                                                            <div class="alert alert-warning" role="alert">
                                                                <strong>Warning!</strong>
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Tempat Lahir</label>
                                                        <input type="text" value="{{ $viewData->tempat_lahir }}"
                                                            value="{{ old('tempat') }}" class="form-control"
                                                            name="tempat">
                                                        @error('tempat')
                                                            <div class="alert alert-warning" role="alert">
                                                                <strong>Warning!</strong>
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Tanggal Lahir</label>
                                                        <input type="date" value="{{ $viewData->tanggal_lahir }}"
                                                            value="{{ old('tanggal') }}" class="form-control"
                                                            name="tanggal">
                                                        @error('tanggal')
                                                            <div class="alert alert-warning" role="alert">
                                                                <strong>Warning!</strong>
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Alamat</label>
                                                    <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ $viewData->alamat }}</textarea>
                                                    @error('alamat')
                                                        <div class="alert alert-warning" role="alert">
                                                            <strong>Warning!</strong>
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">No HP</label>
                                                        <input type="text" value="{{ $viewData->no_hp }}"
                                                            value="{{ old('hp') }}" class="form-control"
                                                            name="hp">
                                                        @error('hp')
                                                            <div class="alert alert-warning" role="alert">
                                                                <strong>Warning!</strong>
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Sosial Media
                                                            Instagram</label>
                                                        <input type="text" value="{{ $viewData->instagram }}"
                                                            value="{{ old('ig') }}" class="form-control"
                                                            name="ig">
                                                        @error('ig')
                                                            <div class="alert alert-warning" role="alert">
                                                                <strong>Warning!</strong>
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Perbaharui Data</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="password-settings" class="tab-pane fade">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <br>
                                            <h4 class="text-primary">Pengaturan Kata Sandi</h4>
                                            <form action="{{ route('edit-pw-user') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $viewData->id }}">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Kata Sandi Baru</label>
                                                        <input type="password" class="form-control" name="passwordbaru">
                                                        @error('passwordbaru')
                                                            <div class="alert alert-warning" role="alert">
                                                                <strong>Warning!</strong>
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Ulangi Kata Sandi Baru</label>
                                                        <input type="password" class="form-control" name="passwordbaru2">
                                                        @error('passwordbaru2')
                                                            <div class="alert alert-warning" role="alert">
                                                                <strong>Warning!</strong>
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Perbaharui Data</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('footer')
@endsection
