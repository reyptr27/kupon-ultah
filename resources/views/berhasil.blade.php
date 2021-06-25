@extends('layouts.main')

@section('title', 'Berhasil redeem kupon')

@section('content')
<div class="thankyou-page">
    <div class="_header">
        <div class="logo">
            <img src="{{ asset('/img/logo.png') }}" alt="logo">
        </div>
        <h1>Thank You!</h1>
    </div>
    <div class="_body">
        <div class="_box">
            <h2>
                Terimakasi telah berbelanja di <strong>Roti MOX</strong>.
            </h2>

            <p>
                Selamat anda telah mendapatkan <b style="color: #ff0000"> {{ $kupon->jumlah }} </b> kupon dari kode:
                <b style="color: #ff0000"> {{ $kupon->kode_kupon }} </b>.
            </p>

        </div>
    </div>
    <div class="_footer d-flex justify-content-center">
        <a class="btn-berhasil" href="https://rotimox.com/">Back to homepage</a>
    </div>
</div>
@endsection

@section('extra-js')
@endsection