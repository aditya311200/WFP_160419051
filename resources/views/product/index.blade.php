@extends('layouts.conquer2')

@section('content')
<div class="page-content">
    <h3 class="page-title">
        Daftar Produk
    </h3>

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ route('welcome') }}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Product</a>
            </li>
        </ul>
        <div class="page-toolbar">
            <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
            </div>
        </div>
    </div>

    <div class="container">
        <p>Berikut Produk yang dijual :</p>
        <div class="row">
            @foreach($queryBuilder as $d)
                <div class="col-mb-4 col-sm-4">
                    <div class="card bg-" style="width: 18rem">
                        <img src="{{ asset('images/'.$d->image) }}" class="card-img-top" alt="..." style="width: 100%; height: 200px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $d->nama }}</h5>
                            <p class="card-text">{{ $d->harga_jual }}</p>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div> 
    </div>
</div>
@endsection