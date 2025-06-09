@extends('layouts.navbarkuri')

@section('content')
    <div class="container">
        <h2>Monitoring Absensi Guru</h2>

        <form method="GET" action="{{ route('wakasek.kurikulum.monitoring.guru') }}" class="mb-2">
            <div class="input-group mb-2" style="max-width: 350px;">
                <input type="date" name="tanggal" id="tanggal" value="{{ $tanggal }}" class="form-control mb-2">
                <button type="submit" class="btn btn-hijau-sias">Cari</button>
            </div>
        </form>

        <div class="table-responsive table-wrapper mb-2">
            <table class="table table-bordered">
                <thead class="thead-secondary">
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
                        <td>{{ ucfirst($item->status ?? '-') }}</td>
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
    </div>
@endsection
