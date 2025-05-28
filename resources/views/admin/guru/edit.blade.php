@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Edit Guru</h3>

        <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $guru->nama }}" required>
            </div>
            <div class="mb-3">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ $guru->nip }}" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="{{}}" required>
            </div>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
