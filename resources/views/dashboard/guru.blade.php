<!-- resources/views/dashboard/guru.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard Guru Pengajar</h1>
        <p>Selamat datang, {{ Auth::user()->nama }}</p>
    </div>
@endsection
