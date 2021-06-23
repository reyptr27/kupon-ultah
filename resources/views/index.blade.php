@extends('layouts.main')

@section('title', 'Kupon Ulang Tahun')

@section('content')
<img class="wave" src="{{ asset('/img/wave.png') }}">
<div class="container">
    <div class="img">
        <img src="{{ asset('/img/bg.svg') }}">
    </div>
    <div class="login-content">
        <div class="card">
            <form action="{{ route('store.transaksi') }}" method="POST">
                @csrf
                <img class="logo" alt="logo" src="{{ asset('/img/logo.png') }}">
                <div class="input-div one">
                    <div class="i">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-cash" viewBox="0 0 16 16">
                            <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                            <path
                                d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                        </svg>
                    </div>
                    <div class="div">
                        <h5>Kode Kupon</h5>
                        <input type="text" id="kupon" name="kupon" class="input" required>
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                    </div>
                    <div class="div">
                        <h5>Nama</h5>
                        <input type="text" id="nama" name="nama" class="input" required>
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg>
                    </div>
                    <div class="div">
                        <h5>No. HP</h5>
                        <input type="number" id="hp" name="hp" class="input" required>
                    </div>
                </div>
                <br>
                <input type="submit" class="btn" value="Redeem">
            </form>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
@endsection