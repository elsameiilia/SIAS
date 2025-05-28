@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Tambah Siswa</h3>

        <form action="{{ route('admin.siswa.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>NIS</label>
                <input type="text" name="nis" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Kelas</label>
                <select name="kelas_id" class="form-control" required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelas as $k)
                        <option value="{{ $k->kelas_id }}">{{ $k->kelas }} - {{$k->sub_kelas}}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
