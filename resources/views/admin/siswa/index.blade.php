@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Data Siswa</h3>

        <form method="GET" action="{{ route('admin.siswa.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari nama siswa..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>

        <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nama</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($siswa as $s)
                <tr>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->nis }}</td>
                    <td>{{ $s->kelas->kelas}} - {{$s->kelas->sub_kelas}}</td>
                    <td>
                        <a href="{{ route('admin.siswa.edit', $s->siswa_id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.siswa.destroy', $s->siswa_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $siswa->appends(['search' => request('search')])->links() }}
        </div>
    </div>
@endsection
