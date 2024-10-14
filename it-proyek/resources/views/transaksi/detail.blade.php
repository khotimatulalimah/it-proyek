<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Transaksi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        h1 {
            color: #343a40;
            text-align: center;
            margin-bottom: 30px;
        }
        h2 {
            color: #495057;
            margin-top: 20px;
            text-align: center;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .form-container {
            display: none;
            margin-top: 20px;
            transition: all 0.3s ease-in-out;
        }
        .table th {
            background-color: #031164;
            color: white;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 123, 255, 0.05);
        }
        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Detail Data Transaksi</h1>
    
    <button id="addDataButton" class="btn btn-primary mb-3 btn-custom"><i class="bi bi-plus-circle"></i> Tambah Data</button>
    
    <div class="form-container" id="formContainer">
        <form action="/create-post" method="POST" id="dataForm">
            @csrf
            <div class="mb-3">
                <input type="text" name="nama_karyawan" class="form-control" placeholder="Nama Karyawan" required>
            </div>
            <div class="mb-3">
                <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
            </div>
            <div class="mb-3">
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" name="harga" placeholder="Harga" required>
            </div>
            <div class="mb-3">
                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
            </div>
            <div class="mb-3">
                <input type="text" name="metode_pembayaran" class="form-control" placeholder="Metode Pembayaran" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
    
    <h2>Semua Data</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Nama Barang</th>
                    <th>Tanggal</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Metode Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->nama_karyawan }}</td>
                    <td>{{ $post->nama_barang }}</td>
                    <td>{{ $post->tanggal }}</td>
                    <td>Rp. {{ number_format($post->harga, 0, ',', '.') }}</td>
                    <td>{{ $post->jumlah }}</td>
                    <td>{{ $post->metode_pembayaran }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const addDataButton = document.getElementById('addDataButton');
    const formContainer = document.getElementById('formContainer');

    addDataButton.addEventListener('click', () => {
        formContainer.style.display = formContainer.style.display === 'block' ? 'none' : 'block';
    });
</script>
</body>
</html>
