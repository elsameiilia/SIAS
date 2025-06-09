@extends('layouts.admin')

@section('content')

<style>
    .stat-card-link {
        color: inherit;
        text-decoration: none;
    }
    .stat-card {
        background-color: #ffffff;
        border: none;
        border-radius: 20px;
        transition: transform 0.2s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }
    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.1);
    }
</style>

<div class="container-fluid">
    <h1 class="h2 mb-4 fw-bold">Dashboard Admin</h1>
    <div class="mt-5">
        <h4 class="fw-bold">Manajemen Data</h4>
        <div class="d-flex flex-wrap gap-2 mt-3">
            <a href="{{ route('admin.siswa.index') }}" class="btn btn-lg btn-light border">Data Siswa</a>
            <a href="{{ route('admin.guru.index') }}" class="btn btn-lg btn-light border">Data Guru</a>
            <a href="{{ route('admin.kelas.index') }}" class="btn btn-lg btn-light border">Data Kelas</a>
        </div>
    </div>

</div>

@endsection