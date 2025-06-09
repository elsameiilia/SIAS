@extends('layouts.navbarkuri')

@section('content')

<style>
    @media (min-width: 768px) {
        .border-start-md-custom {
            border-left: 1px solid rgba(255, 255, 255, 0.3);
        }
    }
</style>

<h1 class="h2 mb-4 fw-bold">Dashboard</h1>

<h4>dem ini mnrtmu dipake gak kira-kira? niatnya tuh sbnrnya ntar dikasih count guru from table gitu, tapi ntar merubah controller. buang aja bang kalo repot, soalnya bingung jg mau dikasih apaan</h4>
<div class="card text-white" style="background-color: #1E6042; border-radius: 20px;">
    <div class="card-body p-4">
        <div class="row gy-4 gy-md-0 align-items-center text-center">
            <div class="col-md-4">
                <div class="d-flex align-items-center justify-content-center p-2">
                    <i class="bi bi-person-circle" style="font-size: 2.8rem;"></i>
                    <div class="ms-3">
                        <h4 class="fw-bold mb-0">2180</h4>
                        <p class="mb-0 small">Guru</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center justify-content-center p-2">
                    <i class="bi bi-mortarboard-fill" style="font-size: 2.8rem;"></i>
                    <div class="ms-3">
                        <h4 class="fw-bold mb-0">2180</h4>
                        <p class="mb-0 small">Siswa</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="d-flex align-items-center justify-content-center p-2">
                    <i class="bi bi-door-open" style="font-size: 2.8rem;"></i>
                    <div class="ms-3">
                        <h4 class="fw-bold mb-0">2180</h4>
                        <p class="mb-0 small">Kelas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection