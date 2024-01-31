@extends('master.master-admin')

@section('title')
    Dashboard | STEALTH
@endsection

@section('header')
@endsection

@section('navbar')
    @parent
@endsection


@section('menunya')
    <h1 class="font-weight-bold" style="font-size: 24px;">Dashboard<h1>
@endsection

@section('menu')
    @auth
        <ul class="metismenu" id="menu">
            <li class="mm-active"><a href="dashboard">
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
                        <li><a href="{{route('data-user')}}">Garansi</a></li>
                        <li><a href="{{route('data-sekolah')}}">Merek & Tipe Mobil</a></li>
                        <li><a href="{{route('data-produk')}}">Produk</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-database"></i>
                        <span class="nav-text">Data History</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('data-registration')}}">Pendaftaran Garansi</a></li>
                    </ul>
                </li>
            @else
                <li><a href="{{route('data-registration')}}" aria-expanded="false">
                    <i class="fa fa-database"></i>
                        <span class="nav-text">Pendaftaran</span>
                    </a>
                </li>
            @endif
            <!--<li><a href="#" aria-expanded="false">
                    <i class="fa fa-download"></i>
                    <span class="nav-text">Pusat Unduhan</span>
                </a>
            </li>-->
        </ul>
    @endauth
@endsection

@section('content')
    <!--Buat Admin-->
    @auth
        @if (auth()->user()->role == 'Administrator')
            @include('dashboard.dashboard-admin')
        @elseif(auth()->user()->role == 'Calon Peserta')
            @include('dashboard.dashboard-user')
        @endif
    @endauth
@endsection

@section('footer')
@endsection
