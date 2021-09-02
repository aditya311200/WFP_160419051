<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ini Toko Roti</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>Product Table</h2>
        <p>Praktikum #1</p>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Harga Jual</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Harga Produksi</th>
                    <th>Category ID</th>
                    <th>Supplier ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d) 
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->stok }}</td>
                        <td>{{ $d->harga_jual }}</td>
                        <td>{{ $d->created_at }}</td>
                        <td>{{ $d->updated_at }}</td>
                        <td>{{ $d->harga_produksi }}</td>
                        <td>{{ $d->category_id }}</td>
                        <td>{{ $d->supplier_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="container">
        <h2>Product Table</h2>
        <p>Praktikum #2</p>
        @foreach($data->chunk(3) as $dd) 
        <div class="row align-items-center">
            @foreach($dd as $d)
                <div class="col mb-4">
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
        @endforeach   
    </div>
</body>
</html>
