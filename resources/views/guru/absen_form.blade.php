@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>Absensi Siswa Kelas {{ $kelas->kelas }}-{{ $kelas->sub_kelas }}</h4>
        <form action="{{ route('guru.absen.simpan', $kelas->kelas_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Bukti</th>
                </tr>
                </thead>
                <tbody>
                @foreach($siswa as $i => $s)
                    <tr>
                        <td>
                            {{ $s->nama }}
                            <input type="hidden" name="siswa_id[]" value="{{ $s->siswa_id }}">
                        </td>
                        <td>
                            @foreach(['hadir', 'sakit', 'izin', 'alpha'] as $status)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status[{{ $i }}]"
                                           value="{{ $status }}"
                                           {{ (isset($absensiToday[$s->siswa_id]) && $absensiToday[$s->siswa_id]->status === $status) ? 'checked' : '' }} required>
                                    <label class="form-check-label">{{ ucfirst($status) }}</label>
                                </div>
                            @endforeach
                        </td>

                        <td>
                            <input type="text" name="keterangan[]" class="form-control"
                                   value="{{ $absensiToday[$s->siswa_id]->keterangan ?? '' }}">
                        </td>
                        <td><input type="file" name="bukti_keterangan[{{ $i }}]" class="form-control"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-success">Simpan Absensi</button>
        </form>
    </div>
@endsection
