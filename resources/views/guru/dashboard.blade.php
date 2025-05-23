@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Pilih Tingkat Kelas</h3>
        <div class="list-group">
            @foreach($tingkat as $t)
                <a href="{{ route('guru.kelas.sub', $t) }}" class="list-group-item list-group-item-action">
                    Kelas {{ $t }}
                </a>
            @endforeach
        </div>
        <h3>Form Bolos</h3>
        <a href="{{ route('guru.form.bolos') }}" class="btn btn-secondary mt-3">Form Bolos</a>
    </div>
@endsection
