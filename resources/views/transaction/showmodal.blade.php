<div class="portlet">
    <div class="portlet-title">
        <b>Tampilan data dari Transaksi : {{ $data->id }} {{ $data->transaction_date }}</b>
    </div>

    <div class="portlet-body">
        <div class="row">
            @foreach($dataProduk as $dp)
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="{{ asset('images/'.$dp->image) }}">
                        <div class="caption">
                            <p align="center"><b>{{ $dp->nama }}</b></p>
                            <hr>
                            <p>Kategori: {{ $dp->category->nama }} pieces</p>
                            <hr>
                            <p>Harga : Rp {{ $dp->pivot->harga_produk }}</p>   
                            <hr>
                            <p>Jumlah : {{$dp->pivot->quantity }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>