<form method="POST" action="{{ route('suppliers.update', $data->id) }}">
    <div class="form-group">
        @csrf
        @method("PUT")
        <label>Nama Supplier</label>
        <input type="text" class="form-control" name="nmSupplier" value="{{ $data->nama }}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>