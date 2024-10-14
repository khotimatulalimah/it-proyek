<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Mengatur karakter encoding dan viewport untuk responsivitas -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Detail Data Transaksi</title>
    
    <style>
        /* Gaya untuk elemen body */
        body {
            font-family: Arial, sans-serif; /* Mengatur font untuk seluruh halaman */
            background-color: #f4f4f4; /* Warna latar belakang */
            margin: 0; /* Menghilangkan margin default */
            padding: 0; /* Menghilangkan padding default */
        }
        
        /* Gaya untuk kontainer utama */
        .container {
            width: 60%; /* Lebar kontainer 60% dari halaman */
            margin: 50px auto; /* Margin atas 50px dan auto untuk tengah horizontal */
            background-color: #fff; /* Warna latar belakang kontainer putih */
            padding: 20px; /* Padding di dalam kontainer */
            box-shadow: 0 0 10px rgba(238, 236, 236, 0.1); /* Bayangan halus di sekitar kontainer */
            border-radius: 10px; /* Sudut melengkung pada kontainer */
        }
        
        /* Gaya untuk judul */
        h1, h2 {
            color: #333; /* Warna teks judul */
            text-align: center; /* Mengatur teks agar berada di tengah */
        }
        
        /* Gaya untuk formulir */
        form {
            display: flex; /* Menggunakan flexbox untuk pengaturan elemen */
            flex-direction: column; /* Mengatur elemen dalam kolom */
            gap: 15px; /* Jarak antara elemen formulir */
            align-items: center; /* Menyejajarkan elemen di tengah */
            text-align: center; /* Mengatur teks agar berada di tengah */
        }
        
        /* Gaya untuk elemen input */
        input[type="text"], input[type="number"], input[type="date"] {
            padding: 10px; /* Padding di dalam input */
            border: 1px solid #ccc; /* Batas input berwarna abu-abu */
            border-radius: 5px; /* Sudut melengkung pada input */
            font-size: 16px; /* Ukuran font dalam input */
            width: 100%; /* Lebar input 100% dari kontainer */
        }
        
        /* Menghilangkan spinner pada input type number */
        .no-spinner::-webkit-inner-spin-button,
        .no-spinner::-webkit-outer-spin-button {
            -webkit-appearance: none; /* Menghilangkan tampilan default spinner */
            margin: 0; /* Menghilangkan margin */
        }
        
        /* Gaya untuk tombol */
        button {
            padding: 8px 12px; /* Padding di dalam tombol */
            background-color: #2597e4; /* Warna latar belakang tombol */
            color: white; /* Warna teks tombol */
            border: none; /* Menghilangkan batas tombol */
            border-radius: 50px; /* Sudut melengkung pada tombol */
            cursor: pointer; /* Mengubah kursor menjadi pointer saat hover */
            font-size: 16px; /* Ukuran font dalam tombol */
            width: 100px; /* Lebar tombol */
            margin-top: 10px; /* Margin atas tombol */
            display: inline-block; /* Memungkinkan margin dan padding */
        }
        
        /* Gaya saat tombol di-hover */
        button:hover {
            background-color: #03007a; /* Mengubah warna tombol saat di-hover */
        }
        
        /* Gaya untuk tabel */
        table {
            width: 100%; /* Lebar tabel 100% dari kontainer */
            border-collapse: collapse; /* Menggabungkan batas tabel */
            margin-top: 20px; /* Margin atas tabel */
        }
        
        /* Gaya untuk batas tabel, header dan data */
        table, th, td {
            border: 1px solid #ccc; /* Batas tabel dan sel berwarna abu-abu */
        }
        
        /* Gaya untuk header dan sel tabel */
        th, td {
            padding: 10px; /* Padding di dalam sel tabel */
            text-align: left; /* Mengatur teks dalam sel tabel agar rata kiri */
        }

        /* Gaya untuk header tabel */
        th {
            background-color: #031164; /* Warna latar belakang header tabel */
            color: white; /* Mengatur warna teks header tabel menjadi putih */
        }
        
        /* Gaya untuk kontainer formulir */
        .form-container {
            display: none; /* Formulir disembunyikan secara default */
            margin-top: 20px; /* Margin atas untuk kontainer formulir */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Detail Data Transaksi</h1> <!-- Judul utama -->
    
    <button id="addDataButton">Tambah Data</button> <!-- Tombol untuk menampilkan formulir -->
    
    <div class="form-container" id="formContainer">
        <form action="/create-post" method="POST" id="dataForm"> <!-- Formulir untuk menambah data -->
            @csrf <!-- Token CSRF untuk keamanan -->
            <input type="text" name="nama_karyawan" placeholder="Nama Karyawan" required> <!-- Input untuk nama karyawan -->
            <input type="text" name="nama_barang" placeholder="Nama Barang" required> <!-- Input untuk nama barang -->
            <input type="date" name="tanggal" required> <!-- Input untuk tanggal -->
            <input type="number" class="no-spinner" name="harga" placeholder="Harga" required> <!-- Input untuk harga -->
            <input type="number" name="jumlah" placeholder="Jumlah" required> <!-- Input untuk jumlah -->
            <input type="text" name="metode_pembayaran" placeholder="Metode Pembayaran" required> <!-- Input untuk metode pembayaran -->
            <button type="submit">Simpan</button> <!-- Tombol untuk menyimpan data -->
        </form>
    </div>
    
    <h2>Semua Data</h2> <!-- Judul untuk tabel data -->
    <table>
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Nama Barang</th>
                <th>Tanggal</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Metode Pembayaran</th> <!-- Tambahan kolom untuk metode pembayaran -->
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post) <!-- Loop untuk menampilkan data dari variabel $posts -->
            <tr>
                <td>{{ $post['nama_karyawan'] }}</td> <!-- Menampilkan nama karyawan -->
                <td>{{ $post['nama_barang'] }}</td> <!-- Menampilkan nama barang -->
                <td>{{ $post['tanggal'] }}</td> <!-- Menampilkan tanggal -->
                <td>Rp. {{ number_format($post['harga'], 0, ',', '.') }}</td> <!-- Menampilkan harga dengan format rupiah -->
                <td>{{ $post['jumlah'] }}</td> <!-- Menampilkan jumlah -->
                <td>{{ $post['metode_pembayaran'] }}</td> <!-- Menampilkan metode pembayaran -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    // JavaScript untuk menangani tampilan formulir
    const addDataButton = document.getElementById('addDataButton'); // Mengambil elemen tombol
    const formContainer = document.getElementById('formContainer'); // Mengambil kontainer formulir

    addDataButton.addEventListener('click', () => {
        formContainer.style.display = 'block'; // Menampilkan formulir saat tombol diklik
    });
</script>

</body>
</html>
