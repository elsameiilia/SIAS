@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Tambah Kelas</h3>
        <form action="{{ route('admin.kelas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Tingkat Kelas</label>
                <input type="text" name="kelas" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Sub Kelas</label>
                <input type="text" name="sub_kelas" class="form-control" required>
            </div>
            <button class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
