@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dashboard Guru BK</h2>
        <p>Pilih Tingkat Kelas:</p>
        <div class="row">
            @foreach ($tingkatKelas as $tingkat)
                <div class="col-md-4 mb-3">
                    <a href="{{ route('bk.kelas.listSub', $tingkat->kelas) }}" class="btn btn-outline-primary w-100">
                        Kelas {{ $tingkat->kelas }}
                    </a>
                </div>
            @endforeach
        </div>
        <h3>Form Bolos</h3>
        <a href="{{ route('bk.bolos.index') }}" class="btn btn-secondary mt-3">Monitoring Bolos</a>
        <h3>Form Bolos</h3>
        <a href="{{ route('bk.rekap.data') }}" class="btn btn-secondary mt-3">Rekap Data</a>
    </div>
@endsection
