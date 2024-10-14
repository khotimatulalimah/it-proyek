<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[name="harga"]::-webkit-outer-spin-button,
        input[name="harga"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[name="harga"] {
            -moz-appearance: textfield;
        }
        
        button {
            padding: 8px 12px; /* Padding untuk membuat tombol lebih kecil */
            background-color: #2597e4; /* Warna biru untuk tombol simpan */
            color: white;
            border: none;
            border-radius: 50px; /* Membuat tombol oval */
            cursor: pointer;    
            font-size: 14px; /* Ukuran font lebih kecil */
            transition: background-color 0.3s; /* Efek transisi */
            margin: 0 auto; /* Pusatkan tombol */
            display: block; /* Agar tombol berfungsi dengan margin otomatis */
        }
        button:hover {
            background-color: #000f63; /* Warna lebih gelap saat hover */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Data</h1>
    <form action="/edit-post/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama_item">Nama Item:</label>
        <input type="text" name="nama_item" id="nama_item" value="{{ $post->nama_item }}" required>

        <label for="kategori">Kategori:</label>
        <input type="text" name="kategori" id="kategori" value="{{ $post->kategori }}" required>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" id="harga" value="{{ $post->harga }}" step="0.01" required>

        <label for="stok">Stok:</label>
        <input type="number" name="stok" id="stok" value="{{ $post->stok }}" required>

        <button type="submit">Simpan Perubahan</button>
    </form>
</div>

</body>
</html>
