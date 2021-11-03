<form method="POST" action="{{ route('suppliers.update', $data->id) }}">
    <div class="form-group">
        @csrf
        @method("PUT")
        <label>Nama Supplier</label>
        <input type="text" class="form-control" name="nmSupplier" value="{{ $data->nama }}" id="eName">
    </div>

    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="saveDataUpdateTD({{ $data->id }})">Submit</button>
    <a class="btn btn-default" data-dismiss="modal">Cancel</a>
</form>