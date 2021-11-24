@extends('layouts.conquer2')

@section('content')
<div class="page-content">
    <h3 class="page-title">
        Create Supplier
    </h3>

    <div class="page-bar">
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
                <form method="POST" action="{{ route('suppliers.update', $data->id) }}">
                    <div class="form-group">
                        @csrf
                        @method("PUT")
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control" name="nmSupplier" value="{{ $data->nama }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div> 
</div>
@endsection