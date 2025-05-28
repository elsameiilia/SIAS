@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('wakasek.absen.guru.simpan') }}" enctype="multipart/form-data">
    @csrf
    <table class="table">
        <thead>
        <tr>
            <th>Nama Guru</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Bukti</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($guru as $index => $g)
            <tr>
                <td>
                    {{ $g->nama }}
                    <input type="hidden" name="guru_id[]" value="{{ $g->id }}">
                </td>
                <td>
                    <select name="status[]">
                        <option value="hadir">Hadir</option>
                        <option value="sakit">Sakit</option>
                        <option value="izin">Izin</option>
                        <option value="alpha">Alpha</option>
                    </select>
                </td>
                <td><input type="text" name="keterangan[]"></td>
                <td><input type="file" name="bukti[]"></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary">Simpan Absensi</button>
</form>
@endsection
