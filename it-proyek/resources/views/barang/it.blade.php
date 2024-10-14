<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>It Posts</title>
    <!-- Tambahkan Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
            font-family: Arial, sans-serif;
        }
        h1, h2 {
            color: #343a40;
            text-align: center;
            margin-bottom: 20px;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .form-control, .form-select {
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: #5cb85c;
            box-shadow: 0 0 5px rgba(92, 184, 92, 0.5);
        }
        .btn {
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }
        .table thead {
            background-color: #007bff;
            color: white;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .edit-button {
            background-color: #28a745;
            color: white;
        }
        .edit-button:hover {
            background-color: #218838;
        }
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Data Item Barang</h1>

    <!-- Menampilkan pesan sukses -->
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="/create-post" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" name="nama_item" class="form-control" placeholder="Nama Item" required>
        </div>
        <div class="mb-3">
            <select name="kategori" class="form-select" required>
                <option value="" disabled selected>Pilih Kategori</option>
                <option value="sembako">Sembako</option>
                <option value="makanan_beku">Makanan Beku</option>
                <option value="perabotan">Perabotan</option>
                <option value="makanan_ringan">Makanan Ringan</option>
                <option value="minuman">Minuman</option>
            </select>
        </div>
        <div class="mb-3">
            <input type="number" step="0.01" name="harga" class="form-control" placeholder="Harga" required>
        </div>
        <div class="mb-3">
            <input type="number" name="stok" class="form-control" placeholder="Stok" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<div class="container">
    <h2>Semua Data</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Item</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post['nama_item'] }}</td>
                <td>{{ $post['kategori'] }}</td>
                <td>Rp {{ number_format($post['harga'], 0, ',', '.') }}</td>
                <td>{{ $post['stok'] }}</td>
                <td>
                    <a href="/edit-post/{{ $post->id }}" class="btn edit-button">Ubah</a>
                    <form action="/delete-post/{{ $post->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin dihapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
