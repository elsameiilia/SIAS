@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Monitoring Siswa Bolos</h3>

        <form method="GET" action="{{ route('bk.bolos.index') }}" class="mb-3">
            <label for="tanggal">Pilih Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" value="{{ $tanggal }}">
            <button type="submit" class="btn btn-primary btn-sm">Lihat</button>
        </form>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Keterangan</th>
            </tr>
            </thead>
            <tbody>
            @forelse($bolos as $b)
                <tr>
                    <td>{{ $b->siswa->nama }}</td>
                    <td>{{ $b->siswa->kelas->kelas }}-{{ $b->siswa->kelas->sub_kelas }}</td>
                    <td>{{ $b->jadwal->mapel->nama_mapel ?? '-' }}</td>
                    <td>{{ $b->keterangan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data bolos pada tanggal ini.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
