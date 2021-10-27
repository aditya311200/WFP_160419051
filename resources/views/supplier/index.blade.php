@extends('layouts.conquer2')

@section('content')
<div class="page-content">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

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
            <a type="button" class="btn btn-fit-height default" href="{{ route('suppliers.create') }}">+ New Supplier</a>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d) 
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>
                            <a class="btn btn-warning" data-toggle="modal" href="#basic" onclick="getDetailData({{ $d->id }})">Show w/ AJAX</a>
                            <a class="btn btn-success" href="{{ route('suppliers.edit', $d->id) }}">Edit</a>

                            <form method="POST" action="{{ route('suppliers.destroy', $d->id) }}">
                                @csrf    
                                @method('DELETE')
                                <input type="SUBMIT" class="btn btn-danger" value="Delete" onclick="if(!confirm('Apakah mau dihapus?')) {return false;}">
                            </form>
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
                <h4 class="modal-title">Detail Supplier</h4>
            </div>

            <div class="modal-body" id="msg">
                <!-- isi modal -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-info">Save changes</button> -->
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
			url:"{{ route('supplier.showAjax') }}",
			data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                },
			success: function(data) {
				$('#msg').html(data.message);
			}
		});
	}
</script>

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
@endsection