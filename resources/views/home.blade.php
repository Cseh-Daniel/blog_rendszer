<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body class="bg-black bg-opacity-10">
    <div class="content bg-white m-5 p-5 rounded-5 shadow">
        @if (session()->has('post_ok'))
            <div>
                <p>{{ session('post_ok') }}</p>
            </div>
        @endif

        <div>
            <H1>Blog rendszer</H1>
            @auth
                <form action="/logout" method="post">
                    @csrf
                    <button class="btn btn-link" type="submit">Kijelentkezés</button>

                </form>
            @else
                <a href="/login"><Button>Bejelentkezés</Button></a>

            @endauth

        </div>

        <div class="mt-3">
            <h2>Üdvözöllek!</h2>
            <hr>
            @auth
                <a href="/new-post"><button class="btn btn-primary">Új bejegyzés</button></a>
            @endauth

            @foreach ($posts as $post)
                <div class="mt-3">


                    <a href="/posts/{{ $post->id }}"><button class="btn btn-light"><h3>{{ $post->title }}</h3></button></a>
                    <p class="m-3">{{ $post->text }}</p>


                    @auth



                        <form action="/edit-post/{{ $post->id }}" method="get">
                            <button class="btn btn-secondary" type="submit">Módosítás</button>
                        </form>
                        <form action="/delete-post/{{ $post->id }}" method="get">
                            <button class="btn btn-danger" type="submit">Törlés</button>
                        </form>
                    @endauth
                    <br>

                </div>
            @endforeach


        </div>
    </div>
</body>

</html>
