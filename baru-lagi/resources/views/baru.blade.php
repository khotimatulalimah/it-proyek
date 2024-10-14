        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>baru.php</title>
        </head>
        
            <body>
            <div style="border : 3px solid black" >
                <h2> Create a new post </h2>
                <form action="/create-post" method="POST">
                    @csrf
                    <input type="text" name="title" placeholder="post title">
                    <textarea name="body" placeholder="body content..."></textarea>
                    <button> save post </button>
                </form>
            </div>

            <div style= "border:3px solid black:">
                <h2> All post </h2>
                @foreach ($posts as $post)
                <div style= "background-color: gray;padding: 10px; margin:10px;">
                    <h3> {{ $post['title'] }}</h3>
                    {{ $post['body'] }}
                    <p><a href="/edit-post/{{ $post->id }}"> Edit</a></p>

                    {{-- form untuk delete --}}
                    <form action="/delete-post/{{ $post->id }}"method ="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm ('Yakin Dihapus?')"> Delete</button> 
                    </form>
                </div>
                @endforeach
            </div>
        </body>
        </html>
