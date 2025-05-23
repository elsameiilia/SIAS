@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Kelas {{ $kelas }}</h2>
        <div class="row">
            @foreach ($subKelasList as $kelasItem)
                <div class="col-md-4 mb-3">
                    <a href="{{ route('bk.kelas.tanggal', ['kelas_id' => $kelasItem->kelas_id, 'tanggal' => now()->toDateString()]) }}" class="btn btn-outline-success w-100">
                        {{ $kelasItem->kelas }}-{{ $kelasItem->sub_kelas }}
                    </a>
                </div>
            @endforeach
        </div>
@endsection
