<?php
// Mendapatkan mood dari URL
$mood = isset($_GET['mood']) ? $_GET['mood'] : 'bahagia';

// Daftar lagu berdasarkan suasana hati
$lagu = [
    'sedih' => [
        'Tulus - Monokrom',
        'Yovie & Nuno - Sakit Hati',
        'Adera - Melewatkanmu'
    ],
    'bahagia' => [
        'Sheila on 7 - Sebuah Kisah Klasik',
        'Dewa 19 - Kangen',
        'Glenn Fredly - Terserah'
    ],
    'marah' => [
        'NOAH - Separuh Aku',
        'Kotak - Beraksi',
        'Superman Is Dead - Sunset di Tanah Anarki'
    ],
    'patah_hati' => [
        'Judika - Bukan Dia Tapi Aku',
        'Samsons - Kenangan Terindah',
        'Anji - Dia'
    ]
];

// Tentukan daftar lagu yang sesuai dengan suasana hati
$judul_lagu = isset($lagu[$mood]) ? $lagu[$mood] : $lagu['bahagia'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lagu <?= ucfirst($mood); ?> </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #6200ea;
            color: white;
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
        }
        a {
            text-decoration: none;
            color: #3700b3;
        }
    </style>
</head>
<body>

<h1>Lagu untuk Suasana <?= ucfirst($mood); ?></h1>

<ul>
    <?php foreach ($judul_lagu as $lagu): ?>
        <li><?= $lagu; ?></li>
    <?php endforeach; ?>
</ul>

<a href="index.php">Kembali ke Pilihan Suasana Hati</a>

</body>
</html>
