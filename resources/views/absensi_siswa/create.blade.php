@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Form Absensi Siswa</h3>

        <form action="{{ route('absensi-siswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="siswa_id" class="form-label">Nama Siswa</label>
                <select name="siswa_id" id="siswa_id" class="form-select" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($siswa as $s)
                        <option value="{{ $s->siswa_id }}">{{ $s->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Status</label><br>
                @foreach(['hadir', 'sakit', 'izin', 'alpha'] as $status)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" value="{{ $status }}" required>
                        <label class="form-check-label">{{ ucfirst($status) }}</label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control">
            </div>

            <div class="mb-3">
                <label for="bukti_keterangan" class="form-label">Upload Bukti (Opsional)</label>
                <input type="file" name="bukti_keterangan" id="bukti_keterangan" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Absensi</button>
        </form>
    </div>
@endsection
