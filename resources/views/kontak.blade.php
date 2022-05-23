@extends('templates._main')
@section('judul', 'home')
@section('isi')
    <h2 class="mt-3">halaman kontak</h2>
    <h3>Hp {{$handphone}}</h3>

    <!-- cara pertama

    <img src="/img/walpeper.jpg" alt="walpeper"> -->

    cara kedua

    <img src="{{ asset('img/walpeper.jpg') }}" alt="walpeper">
@endsection