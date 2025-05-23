@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Data Absensi Siswa</h3>
        <a href="{{ route('absensi-siswa.create') }}" class="btn btn-success mb-3">+ Tambah Absensi</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nama</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Bukti</th>
                <th>Tanggal</th>
            </tr>
            </thead>
            <tbody>
            @foreach($absensi as $a)
                <tr>
                    <td>{{ $a->siswa->nama }}</td>
                    <td>{{ ucfirst($a->status) }}</td>
                    <td>{{ $a->keterangan }}</td>
                    <td>
                        @if($a->bukti_keterangan)
                            <a href="{{ asset('storage/' . $a->bukti_keterangan) }}" target="_blank">Lihat</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $a->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
