@extends('layouts.conquer2')

@section('content')
<div class="page-content">
    <h3 class="page-title">
        Create Supplier
    </h3>

    <div class="page-bar">_
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ route('home') }}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="{{ url('suppliers') }}">Supplier</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Create</a>
            </li>
        </ul>
        <div class="page-toolbar">
            <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h3 class='panel-title'>
                    Supplier's Form
                </h3>
            </div>

            <div class='panel-body'>
                <form method="POST" action="{{ route('suppliers.store') }}" enctype="multipart/form-data">
                    <div class="form-group">
                        @csrf
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control" name="nmSupplier">
                        <small class="forn-text text-muted">Isikan Nama Supplier Anda</small>
                    </div>

                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div> 
</div>
@endsection