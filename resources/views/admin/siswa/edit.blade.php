@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Edit Siswa</h3>

        <form action="{{ route('admin.siswa.update', $siswa->siswa_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}" required>
            </div>

            <div class="mb-3">
                <label>NIS</label>
                <input type="text" name="nis" class="form-control" value="{{ $siswa->nis }}" required>
            </div>

            <div class="mb-3">
                <label>Kelas</label>
                <select name="kelas_id" class="form-control" required>
                    @foreach ($kelas as $k)
                        <option value="{{ $k->kelas_id }}" {{ $siswa->kelas_id == $k->kelas_id ? 'selected' : '' }}>
                            {{ $k->kelas }} - {{$k->sub_kelas}}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
