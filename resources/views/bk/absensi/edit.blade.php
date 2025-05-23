@extends('layouts.app')
@section('content')
<h3>Edit Absensi: {{ $absensi->siswa->nama }}</h3>

<form action="{{ route('bk.absensi.update', $absensi->absensi_siswa_id) }}" method="POST">
    @csrf
    @method('PUT')

    <select name="status" required>
        <option value="hadir" {{ $absensi->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
        <option value="sakit" {{ $absensi->status == 'sakit' ? 'selected' : '' }}>Sakit</option>
        <option value="izin" {{ $absensi->status == 'izin' ? 'selected' : '' }}>Izin</option>
        <option value="alpha" {{ $absensi->status == 'alpha' ? 'selected' : '' }}>Alpha</option>
    </select>

    <input type="text" name="keterangan" value="{{ $absensi->keterangan }}">
    <input type="text" name="bukti_keterangan" value="{{ $absensi->bukti_keterangan }}">

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
