@extends('layouts.navbarkuri')

@section('content')

<h3 class="mb-4">Absensi Guru</h3>

<form method="POST" action="{{ route('wakasek.kurikulum.absen.guru.simpan') }}" enctype="multipart/form-data">
    @csrf
    <div class="table-responsive table-wrapper mb-4">
        <table class="table table-bordered mb-0">
            <thead class="thead-secondary">
                <tr>
                    <th >Nama Guru</th>
                    <th style="width: 180px;">Status</th>
                    <th>Keterangan</th>
                    <th style="width: 250px;">Bukti</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guru as $index => $g)
                    <tr>
                        <td width="180px">
                            {{ $g->nama }}
                        </td>
                        <td>
                            <select name="status[]" class="form-select">
                                <option value="hadir">Hadir</option>
                                <option value="sakit">Sakit</option>
                                <option value="izin">Izin</option>
                                <option value="alpha">Alpha</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="keterangan[]" class="form-control" placeholder="Isi keterangan (opsional)" style="width: 250px;">
                        </td>
                        <td>
                            <input type="file" name="bukti[]" class="form-control" style="width: 300px;">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <button type="submit" class="btn btn-hijau-sias">Simpan Absensi</button>
</form>
@endsection