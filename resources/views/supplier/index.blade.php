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
                <a href="{{ route('home') }}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Supplier</a>
            </li>
           
        </ul>
        <div class="page-toolbar">
            <a class="btn btn-info" href="{{ route('suppliers.create') }}">+ New Supplier</a>

            <a class="btn btn-info" data-toggle="modal" href="#createform">+ New Supplier (Modal)</a>
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
                    <th>Logo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d) 
                    <tr id="tr_{{ $d->id }}">
                        <td>{{ $d->id }}</td>
                        <td class="editable" id="td_nama_{{ $d->id }}">{{ $d->nama }}</td>
                        <td>
                            <img src="{{ asset('images/'.$d->logo) }}" alt="...">

                            <div class="modal fade" id="modalChange_{{ $d->id }}" tabindex="-1" role="basic" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form role="form" method="POST" action="{{ route('supplier.changeLogo') }}" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                                <h4 class="modal-title">Change Logo</h4>
                                            </div>

                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Logo</label>
                                                    <input type="file" class="form-control" id="logo" name="logo"/>
                                                    <input type="hidden" id="id" name="id" value="{{ $d->id }}"/>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-info">Submit</button>
                                                <a data-dismiss='modal' class='btn btn-default'>Cancel</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>  

                            <br>
                            <a href="#modalChange_{{ $d->id }}" data-toggle='modal' class='btn btn-xs btn-default'>Change</a>
                        </td>

                        <td>
                            <a class="btn btn-warning" data-toggle="modal" href="#basic" onclick="getDetailData( {{ $d->id }} )">Show w/ AJAX</a>

                            <a class="btn btn-success" href="{{ route('suppliers.edit', $d->id) }}">Edit</a>

                            <a class="btn btn-primary" href="#modalEdit" data-toggle="modal" onclick="getEditForm( {{ $d->id }} )">+ Edit A</a>

                            <a class="btn btn-info" href="#modalEdit" data-toggle="modal" onclick="getEditForm2( {{ $d->id }} )">+ Edit B</a>

                            @can('delete-permission')
                                <form method="POST" action="{{ route('suppliers.destroy', $d->id) }}">
                                    @csrf    
                                    @method('DELETE')
                                    <input type="SUBMIT" class="btn btn-danger" value="Delete" onclick="if(!confirm('Apakah mau dihapus?')) {return false;}">
                                </form>

                                <a class="btn btn-danger" onclick="deleteDataRemoveTR( {{ $d->id }} )">Delete 2</a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</div>

<!-- Modal -->
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
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

<div class="modal fade" id="createform" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add New Supplier</h4>
            </div>

            <div class="modal-body" id="msgCreateForm">
                <form method="POST" action="{{ route('suppliers.store') }}">
                    <div class="form-group">
                        @csrf
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control" name="nmSupplier">
                        <small class="form-text text-muted">Isikan Nama Supplier Anda</small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Save Changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Detail Supplier</h4>
            </div>

            <div class="modal-body" id="modalContent">
                <!-- isi modal -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-info">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<!-- end Modal -->
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

<script>
    function getEditForm(id) {
        $.ajax({
            type:'POST',
			url:"{{ route('supplier.getEditForm') }}",
			data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                },

			success: function(data) {
				$('#modalContent').html(data.msg);
			}
        })
    }
</script>

<script>
    function getEditForm2(id) {
        $.ajax({
            type:'POST',
			url:"{{ route('supplier.getEditForm2') }}",
			data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                },

			success: function(data) {
				$('#modalContent').html(data.msg);
			}
        })
    }
</script>

<script>
    function saveDataUpdateTD(id) {
        var eName = $('#eName').val();
        
        $.ajax({
            type:'POST',
			url:"{{ route('supplier.saveData') }}",
			data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                    'nama': eName,
                },

			success: function(data) {
				if(data.status == 'ok') {
                    alert(data.msg)
                    $('#td_name_'+id).html(eName);
                }
			}
        });
    }
</script>

<script>
    function deleteDataRemoveTR(id) {
        $.ajax ({
            type: 'POST',
            url: '{{ route("supplier.deleteData") }}',
            data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                },

			success: function(data) {
				if(data.status == 'ok') {
                    alert(data.msg)
                    $('#tr_' + id).remove();
                } else {
                    alert(data.msg)
                }
			}
        })
    }
</script>
@endsection

@section('initialscript')
<script>
    $('.editable').editable({
        closeOnEnter : true,
        callback:function(data){
            if(data.content){
                var s_id = data.$el[0].id
                var fname = s_id.split('_')[1]
                var id = s_id.split('_')[2]

                $.ajax({
                    type: 'POST',
                    url: '{{ route("supplier.saveDataField") }}',
                    data: {
                        '_token': '<?php echo csrf_token() ?>',
                        'id': id,
                        'fname': fname,
                        'value': data.content
                    },

                    success: function(data) {
                        alert(data.msg)
                    }
                });
            }
        }
    });
</script>
@endsection