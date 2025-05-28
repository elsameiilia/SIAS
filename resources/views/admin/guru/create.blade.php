@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Tambah Guru</h3>

        <form action="{{ route('admin.guru.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option value="guru_pengajar">Guru Pengajar</option>
                    <option value="guru_bk">Guru BK</option>
                    <option value="wakasek_kesiswaan">Wakasek Kesiswaan</option>
                    <option value="wakasek_kurikulum">Wakasek Kurikulum</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
