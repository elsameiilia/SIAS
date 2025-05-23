@extends('layouts.app')
@section('content')
<h3>Absensi Kelas {{ $kelas->kelas }} {{ $kelas->sub_kelas }} - {{ $tanggal }}</h3>
<form method="GET" action="{{ route('bk.kelas.tanggal', [$kelas->kelas_id, 'tanggal' => now()->toDateString()]) }}" onsubmit="this.action += this.tanggal.value;">
    <input type="date" name="tanggal" value="{{ $tanggal }}">
    <button type="submit">Lihat</button>
</form>

<table class="table">
    <thead>
    <tr>
        <th>Nama</th>
        <th>Status</th>
        <th>Keterangan</th>
        <th>Bukti</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($siswa as $s)
        <tr>
            <td>{{ $s->nama }}</td>
            <td>{{ $s->absensiSiswa->first()->status ?? '-' }}</td>
            <td>{{ $s->absensiSiswa->first()->keterangan ?? '-' }}</td>
            <td>
                @if($s->absensiSiswa->first()?->bukti_keterangan)
                    <a href="{{ asset('storage/' . $s->absensiSiswa->first()->bukti_keterangan) }}" target="_blank">Lihat</a>
                @else
                    -
                @endif
            </td>
            <td>
                @if($s->absensiSiswa->first())
                    <a href="{{ route('bk.absensi.edit', $s->absensiSiswa->first()->absensi_siswa_id) }}" class="btn btn-sm btn-warning">Edit</a>
                @else
                    <a href="{{ route('bk.absensi.create', [$s->siswa_id, $tanggal]) }}" class="btn btn-sm btn-primary">Isi Absen</a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
