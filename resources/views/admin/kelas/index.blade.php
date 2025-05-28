@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Data Kelas</h3>

        <form class="mb-3" method="GET">
            <input type="text" name="search" class="form-control" placeholder="Cari kelas atau sub kelas..." value="{{ request('search') }}">
        </form>

        <a href="{{ route('admin.kelas.create') }}" class="btn btn-success mb-3">+ Tambah Kelas</a>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Kelas</th>
                <th>Sub Kelas</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($kelas as $k)
                <tr>
                    <td>{{ $k->kelas }}</td>
                    <td>{{ $k->sub_kelas }}</td>
                    <td>
                        <a href="{{ route('admin.kelas.edit', $k->kelas_id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.kelas.destroy', $k->kelas_id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">Belum ada data kelas.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
