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
        <h2>Product Detail</h2>
        <p>Praktikum #1</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Hasil</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ID</td>
                    <td>{{ $product->id }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $product->nama }}</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>{{ $product->harga_jual }}</td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>{{ $product->category->nama }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $product->created_at }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $product->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
