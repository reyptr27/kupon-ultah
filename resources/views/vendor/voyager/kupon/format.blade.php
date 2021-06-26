@extends('voyager::master')

@section('page_title', 'Format Data')

@section('page_header')
<div class="container-fluid">
    <h1 class="page-title">
        <i class="voyager-trash"></i> Format Data
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

                    <p><b><i class="text-danger">*will be delete all kupon data!</i></b></p>
                    <p><b><i class="text-danger">*deleted data can't be restored</i></b></p>

                    <br>

                    <form action="#">
                        @csrf

                        <div class="form-group">
                            <button type="button" name="btn" value="Submit" id="submitBtn" data-toggle="modal"
                                data-target="#confirm-submit" class="btn btn-danger btn-add-new">
                                <i class="voyager-trash"></i> Format Data
                            </button>
                        </div>
                    </form>

                    <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <b>Confirm Submit</b>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete all data?
                                    <p><b><i class="text-danger">*will be delete all Transaksi & kupon data!</i></b></p>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">
                                        <i class="voyager-angle-left"></i> Cancel
                                    </button>

                                    <form style="display:inline" display: inline;" action="{{ route('hapus.kupon') }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" id="submit" class="btn btn-danger">
                                            <i class="voyager-trash"></i> Format Data
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection