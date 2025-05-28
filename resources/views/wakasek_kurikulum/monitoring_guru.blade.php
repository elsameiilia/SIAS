@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Monitoring Absensi Guru</h2>

        <form method="GET" class="mb-3">
            <label for="tanggal">Pilih Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $tanggal }}">
            <button type="submit" class="btn btn-primary mt-2">Lihat</button>
        </form>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nama Guru</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Bukti</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($data as $item)
                <tr>
                    <td>{{ $item->nama_guru }}</td>
                    <td>{{ $item->status ?? '-' }}</td>
                    <td>{{ $item->keterangan ?? '-' }}</td>
                    <td>
                        @if ($item->bukti)
                            <a href="{{ asset('storage/' . $item->bukti) }}" target="_blank">Lihat Bukti</a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada data guru ditemukan.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
