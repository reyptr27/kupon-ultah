@extends('voyager::master')

@section('page_title', 'Import From File')

@section('page_header')
<div class="container-fluid">
    <h1 class="page-title">
        <i class="voyager-book-download"></i> Import From File
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
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    <br>
                    @endif

                    <br>

                    @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }}
                        @endforeach
                    </div>
                    <br>
                    @endif

                    <p><b><i>*only accept .xls .xlsx and .csv</i></b></p>

                    <form action="{{ route('simpan.kupon') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input type="file" name="file" />
                            <br>
                            <button type="submit" class="btn btn-primary">
                                <i class="voyager-book-download"></i> Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection