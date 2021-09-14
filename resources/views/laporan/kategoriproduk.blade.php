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
        <h2>Laporan Kategori</h2>
        <p>Latihan #1</p>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Harga Minimum</th>
                    <th>Harga Rata-Rata Produk</th>
                </tr>
            </thead>
            <tbody>
                @foreach($arr_data as $category) 
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category['category']->nama }}</td>
                        <td>Rp {{ $category['min']->harga_jual }}</td>
                        <td>Rp {{ $category['avg'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
