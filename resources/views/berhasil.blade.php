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
                Terimakasih telah berbelanja di <strong>Roti MOX</strong>.
            </h2>

            <p>
                Selamat anda telah mendapatkan <b style="color: #ff0000"> {{ $kupon->jumlah }} </b> kupon dari kode:
                <b style="color: #ff0000"> {{ $kupon->kode_kupon }} </b>.
            </p>

            <p><b>Syarat dan ketentuan:</b></p>
            <ul class="syarat">
                <li>Voucher berlaku s/d 31 Desember 2021</li>
                <li>Voucher tidak dapat dikembalikan dan tidak dapat ditukar dengan uang tunai</li>
                <li>Harap tunjukkan voucher ini saat pembelanjaan</li>
                <li>Voucher ini hanya dapat dipergunakan 1 kali dalam satu hari (jika tidak digunakan maka voucher
                    dianggap hangus dihari tersebut)</li>
                <li>Voucher dapat digunakan di seluruh cabang Roti MOX</li>
            </ul>

        </div>
    </div>
    <div class="_footer d-flex justify-content-center">
        <a class="btn-berhasil" href="https://rotimox.com/">Back to homepage</a>
    </div>
</div>
@endsection

@section('extra-js')
@endsection