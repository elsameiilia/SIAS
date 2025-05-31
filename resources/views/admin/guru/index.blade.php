@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Data Guru</h3>

        <form method="GET" action="{{ route('admin.guru.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari nama guru..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>
        <a href="{{ route('admin.guru.create') }}" class="btn btn-primary mb-3">Tambah Guru</a>
        <h4>Import Data Siswa dari Excel</h4>
        <form action="{{ route('admin.guru.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>File Excel (.xlsx)</label>
                <input type="file" name="file" class="form-control" accept=".xlsx" required>
            </div>
            <button class="btn btn-secondary">Import</button>
        </form>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nama</th>
                <th>NIP</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @forelse($guru as $g)
                <tr>
                    <td>{{ $g->nama }}</td>
                    <td>{{ $g->nip }}</td>
                    <td>{{ ucwords(str_replace('_', ' ', $g->role)) }}</td>
                    <td>
                        <a href="{{ route('admin.guru.edit', $g->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.guru.destroy', $g->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada data guru ditemukan.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $guru->appends(['search' => request('search')])->links() }}
    </div>
    <a href="{{ route('admin.guru.export-excel') }}" class="btn btn-success mb-3">Export Excel</a>
@endsection
