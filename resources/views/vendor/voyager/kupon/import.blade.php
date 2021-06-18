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
                    <form action="#">
                        @csrf

                        <div class="form-group">
                            <input type="file" name="file" />
                            <br>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection