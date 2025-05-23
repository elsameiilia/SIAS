@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>Daftar Subkelas dari Kelas {{ $tingkat }}</h4>
        <ul class="list-group">
            @foreach($subkelas as $k)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $k->kelas }}-{{ $k->sub_kelas }}
                    <a href="{{ route('guru.absen.form', $k->kelas_id) }}" class="btn btn-sm btn-primary">Isi Absensi</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
