@extends('voyager::master')

@section('page_title', 'Export Data')

@section('page_header')
<div class="container-fluid">
    <h1 class="page-title">
        <i class="voyager-documentation"></i> Export Data
    </h1>
</div>
@endsection

@section('content')
<div class="page-content browse container-fluid">
    @include('voyager::alerts')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <p><i><b>*search by updated_at (transaction processed)</b></i></p>
                    <br>
                    <form action="{{ route('download.transaksi') }}" method="POST" class="form-inline"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="from"><b>From</b></label>
                            <input type="date" class="form-control" id="from" name="from" value="{{ old('from') }}">
                        </div>

                        <div class="form-group">
                            <label for="to"><b>To</b></label>
                            <input type="date" class="form-control" id="to" name="to" value="{{ old('to') }}">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm" name="search">
                            <i class="voyager-search"></i> Search
                        </button>

                        <div class="pull-right">
                            <button type="submit" class="btn btn-success btn-sm" name="exportExcel">
                                <i class="voyager-documentation"></i> Export Data
                            </button>
                        </div>

                    </form>

                    <br>

                    <div class="table-responsive">
                        <table id="#" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Kode Kupon</th>
                                    <th>Nama</th>
                                    <th>Hp</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $transaksis)
                                <tr>
                                    <td>{{ $transaksis->kode_kupon }}</td>
                                    <td>{{ $transaksis->nama }}</td>
                                    <td>{{ $transaksis->hp }}</td>
                                    <td>{{ $transaksis->jumlah }}</td>
                                    <td>{{ $transaksis->total }}</td>
                                    <td>{{ $transaksis->updated_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="pull-right">
                            {{ $transaksi->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection