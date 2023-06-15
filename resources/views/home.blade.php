<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>

    @if(session()->has("post_ok"))
        <div>
            <p>{{ session("post_ok") }}</p>
        </div>
    @endif

    <div>
        <H1>Blog rendszer</H1>
        @auth
            <form action="/logout" method="post">
                @csrf
                <button type="submit">Kijelentkezés</button>

            </form>

        @else

            <a href="/login"><Button>Bejelentkezés</Button></a>

        @endauth

    </div>

    <div>
        <h2>Üdvözöllek!</h2>
        <hr>
        @auth
            <a href="/new-post"><button>Új bejegyzés</button></a>
        @endauth

        @foreach($posts as $post)

            <div>

                <h3>{{ $post->title }}</h3>
                <a href="/posts/{{ $post->id }}"><button>Megtekintés</button></a>
                <p>{{ $post->text }}</p>


                @auth



                    <form action="/edit-post/{{ $post->id }}" method="get">
                        <button type="submit">Módosítás</button>
                    </form>
                    <form action="/delete-post/{{ $post->id }}" method="get">
                        <button type="submit">Törlés</button>
                    </form>
                @endauth
                <br>

            </div>

        @endforeach


    </div>

</body>

</html>
