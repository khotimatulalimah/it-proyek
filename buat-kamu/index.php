<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilihan Lagu untuk Kamu</title>
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
        .button {
            background-color: #6200ea;
            color: white;
            padding: 10px 20px;
            margin: 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .button:hover {
            background-color: #3700b3;
        }
    </style>
</head>
<body>

<h1>Pilihan Lagu untuk Kamu</h1>
<p>Pilih suasana hati kamu untuk mendengarkan lagu yang cocok:</p>

<a href="lagu.php?mood=sedih" class="button">Sedih</a>
<a href="lagu.php?mood=bahagia" class="button">Bahagia</a>
<a href="lagu.php?mood=marah" class="button">Marah</a>
<a href="lagu.php?mood=patah_hati" class="button">Patah Hati</a>

</body>
</html>
