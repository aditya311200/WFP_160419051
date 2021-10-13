@extends('layouts.conquer2')

@section('content')
<div class="page-content">
    <h3 class="page-title">
        Daftar Customer
    </h3>

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ route('welcome') }}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Customer</a>
            </li>
        </ul>
        <div class="page-toolbar">
            <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <p>Berikut List Customer :</p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($queryBuilder as $d) 
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->alamat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</div>
@endsection