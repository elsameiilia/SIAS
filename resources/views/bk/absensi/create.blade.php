@extends('layouts.app')
@section('content')
    <h3>Tambah Absensi untuk {{ $siswa->nama }} pada tanggal {{ $tanggal }}</h3>

    <form action="{{ route('bk.absensi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="siswa_id" value="{{ $siswa->siswa_id }}">
        <input type="hidden" name="tanggal" value="{{ $tanggal }}">

        <div class="mb-3">
            <label>Status:</label>
            <select name="status" class="form-control">
                <option value="hadir">Hadir</option>
                <option value="sakit">Sakit</option>
                <option value="izin">Izin</option>
                <option value="alpha">Alpha</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Keterangan:</label>
            <input type="text" name="keterangan" class="form-control">
        </div>

        <div class="mb-3">
            <label>Bukti Keterangan (opsional):</label>
            <input type="file" name="bukti_keterangan" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan Absensi</button>
    </form>
@endsection
