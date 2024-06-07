@extends('master.master-admin')

@section('title')
    Data Produk | DrArtexFilms
@endsection

@section('header')
@endsection

@section('navbar')
    @parent
@endsection

@section('menunya')
    <h1 class="font-weight-bold" style="font-size: 24px;">Data Produk<h1>
@endsection

@section('menu')
    @include('sidebar')
@endsection

@section('content')
@error('success')