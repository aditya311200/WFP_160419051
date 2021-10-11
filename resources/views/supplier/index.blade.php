@extends('layouts.conquer2')

@section('content')
<div class="page-content">
    <h3 class="page-title">
        Daftar Supplier
    </h3>

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ route('welcome') }}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Supplier</a>
            </li>
        </ul>
        <div class="page-toolbar">
            <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <p>Berikut List Supplier :</p>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h3 class='panel-title'>
                    Informasi Rinci untuk Anda
                    <a class='btn btn-default' href='#' onclick="showInfo()">Lihat Rincian</a>
                </h3>
            </div>
            <div id='showinfo' class='panel-body'>
                <!-- isi dari ajax -->
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Supplier</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d) 
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>
                            <a class="btn btn-default" data-toggle="modal" href="#basic" onclick="getDetailData({{ $d->id }})">Show w/ AJAX</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</div>

<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="model-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal Title</h4>
            </div>

            <div class="modal-body" id="msg">
                <!-- isi modal -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info">Save Change</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('ajaxQuery')
<script>
	function showInfo() {
		$.ajax({
			type:'POST',
			url:"{{ route('supplier.showinfo') }}",
			data: {'_token': '<?php echo csrf_token(); ?>'},
			success: function(data) {
				$('#showinfo').html(data.msg);
			}
		});
	}
</script>

<script>
	function getDetailData(id) {
		$.ajax({
			type:'POST',
			url:"{{ route('supplier.showmodal') }}",
			data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
			success: function(data) {
				$('#msg').html(data.msg);
			}
		});
	}
</script>
@endsection