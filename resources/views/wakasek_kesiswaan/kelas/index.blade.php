
    <h3>Pilih Jenjang Kelas</h3>
    @foreach ($kelasGroup as $item)
        <a href="{{ route('wakasek.kesiswaan.kelas.detail', ['kelas_id' => $item->kelas]) }}" class="btn btn-primary m-1">Kelas {{ $item->kelas }}</a>
    @endforeach

