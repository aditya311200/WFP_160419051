@extends('layouts.conquer2')

@section('content')
<div class="page-content">
    <h3 class="page-title">
        Daftar Transaksi
    </h3>

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ route('welcome') }}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Transaksi</a>
            </li>
        </ul>
        <div class="page-toolbar">
            <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <p>Berikut Data Transaksi :</p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Customer</th>
                    <th>Nama Kasir</th>
                    <th>Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d) 
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->customer->nama }}</td>
                        <td>{{ $d->user->name }}</td>
                        <td>{{ $d->transaction_date }}</td>
                        <td>
                            <a class="btn btn-default" data-toggle="modal" href="#basic" onclick="getDetailData({{ $d->id }})">Lihat Rincian Pembelian</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</div>

<!-- Modal -->
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog" style="width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Detail Transaksi</h4>
            </div>

            <div class="modal-body" id="msg">
                <!-- isi modal -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('ajaxquery')
<script>
	function getDetailData(id) {
		$.ajax({
			type:'POST',
			url:"{{ route('transaction.showAjax') }}",
			data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                },
			success: function(data) {
				$('#msg').html(data.msg);
			}
		});
	}
</script>
@endsection