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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body class="bg-black bg-opacity-10">

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">

            @auth
                <form action="/logout" method="post">
                    @csrf
                    <button class="btn btn-link float-right" type="submit">Kijelentkezés</button>

                </form>
            @else
                <a href="/login"><Button class="btn btn-primary">Bejelentkezés</Button></a>

            @endauth

            <a href="/" class="navbar-brand">Blog rendszer</a>

            <form action="/filter-post" class="d-flex" role="search">

                <select class="form-control p-3 text-center" name="labelFilter" id="labelFilter">
                    <option value="null" disabled selected>Címkeválasztó</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                <button class="btn btn-outline-success" type="submit">Search</button>

            </form>
        </div>
    </nav>

    <div class="content bg-white mt-1 mb-4 mx-4 p-5 rounded-5 shadow">
        @if (session()->has('post_ok'))
            <div>
                <p>{{ session('post_ok') }}</p>
            </div>
        @endif
        <div>

        </div>

        <div class="mt-3">

            @auth
                <a href="/new-post"><button class="btn btn-primary">Új bejegyzés</button></a>
            @endauth

            @foreach ($posts as $post)
                <div class="mt-3 p-3 border-start border-end shadow-sm rounded">

                    <div class="d-flex justify-content-between">

                        <span>
                            <div class="ms-1">
                                <a href="/posts/{{ $post->id }}"><button class="btn btn-light">
                                        <h4>{{ $post->title }}</h4>
                                    </button></a>
                            </div>
                            <div class="mt-2">

                                <span class="m-3 p-1 px-2 rounded-5 bg-secondary-subtle">{{ $post->label->name }}</span>

                            </div>
                        </span>

                        <span> {{ $post->user->name }}
                            ({{ Str::substr($post->created_at, 0, 10) }})
                        </span>
                    </div>
                    <div>
                        <p class="m-3">{{ $post->text }}</p>
                    </div>

                    @auth

                        <div class="d-inline-flex">
                            <div class="mx-2 mb-1">
                                <form action="/edit-post/{{ $post->id }}" method="get">
                                    <button class="btn btn-secondary" type="submit">Módosítás</button>
                                </form>
                            </div>
                            <div class="mb-1">
                                <form action="/delete-post/{{ $post->id }}" method="get">
                                    <button class="btn btn-danger" type="submit">Törlés</button>
                                </form>
                            </div>
                        </div>
                    @endauth
                    <br>

                </div>
            @endforeach


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>


    <script>
        $("#labelFilter").select2({});
    </script>

</body>

</html>
