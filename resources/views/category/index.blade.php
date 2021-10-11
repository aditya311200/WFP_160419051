@extends('layouts.conquer2')

@section('content')
<div class="page-content">
    <h3 class="page-title">
        Daftar Kategori
    </h3>

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ route('welcome') }}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Category</a>
            </li>
        </ul>
        <div class="page-toolbar">
            <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <p>Berikut List Kategori Roti yang Dijual :</p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d) 
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->nama }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</div>
@endsection