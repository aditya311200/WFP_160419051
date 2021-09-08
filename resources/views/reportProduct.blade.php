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
        <h2>Product dengan Kategori : {{ $category_name }}</h2>
        <p>Praktikum #2</p>
        <p>Data ditemukan berjumlah {{ count($result) }} dari {{ $getTotalData }}</p>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Harga Produk</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach($result as $r) 
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->nama }}</td>
                        <td>{{ $r->stok }}</td>
                        <td>{{ $r->harga_jual }}</td>
                        <td>{{ $r->created_at }}</td>
                        <td>{{ $r->updated_at }}</td>
                        <td>{{ $r->category->nama }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
