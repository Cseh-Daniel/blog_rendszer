<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
</head>

<body>

    <div>
        <h1>Bejelentkezés</h1>

        @if (session()->has('reg_ok'))
            <div>
                <p> {{ session('reg_ok') }} </p>
            </div>
        @endif

        <form action="/login" method="post">
            @csrf
            <label for="email">E-mail:</label><br>
            <input type="email" name="email"><br>
            @error('email')
                <p>{{ $message }}</p>
            @enderror

            <label for="password">Jelszó:</label><br>
            <input type="password" name="password"><br>
            @error('password')
                <p>{{ $message }}</p>
            @enderror

            <br>
            <input type="submit" value="Bejelentkezés">
        </form>

        @error('logErr')
            <p>
                {{ $message }}
            </p>
        @enderror

        <a href="/registration">
            <p>Regisztráció</p>
        </a>

    </div>
</body>

</html>
