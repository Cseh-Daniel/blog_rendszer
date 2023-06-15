<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="bg-black bg-opacity-10">

    <div class="content bg-white m-5 p-5 rounded-5 shadow text-center">
        <h1>Bejelentkezés</h1>

        @if (session()->has('reg_ok'))
            <div>
                <p> {{ session('reg_ok') }} </p>
            </div>
        @endif
            <div class="m-5">
        <form action="/login" method="post">
            @csrf
            <label class="form-label text-left" for="email">E-mail:</label>
            <input class="form-control" type="email" name="email"><br>
            @error('email')
                <p>{{ $message }}</p>
            @enderror

            <label class="form-label for="password">Jelszó:</label>
            <input class="form-control" type="password" name="password"><br>
            @error('password')
                <p>{{ $message }}</p>
            @enderror

            <br>
            <input class="btn btn-primary" type="submit" value="Bejelentkezés">
        </form>
    </div>
        @error('logErr')
            <p>
                {{ $message }}
            </p>
        @enderror

        <a href="/registration">
            <p>Regisztráció</p>
        </a>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
