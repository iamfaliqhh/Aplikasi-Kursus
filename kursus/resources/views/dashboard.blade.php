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
    @include('sidebar')
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
