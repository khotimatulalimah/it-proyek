<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit Post</title>
    </head>

    <body>
        <h1>Edit Post</h1>
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

            <button type="submit">Save Changes</button>
        </form>
    </body>
</html>
