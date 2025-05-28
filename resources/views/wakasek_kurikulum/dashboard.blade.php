@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dashboard Wakasek Kurikulum</h2>

        <div class="mt-4">
            <a href="{{ route('wakasek.absen.guru') }}" class="btn btn-primary mb-2">Absensi Guru</a>
            <a href="{{ route('wakasek.monitoring.guru') }}" class="btn btn-secondary mb-2">Monitoring Guru</a>
        </div>
    </div>
@endsection
