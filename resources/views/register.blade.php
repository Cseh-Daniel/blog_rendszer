<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="bg-black bg-opacity-10">

    <div class="content bg-white m-5 p-5 rounded-5 shadow text-center">
        <h1>Regisztráció</h1>
        <div>
            <form action="/registration" method="post">
                @csrf
                <label class="form-label" for="email">E-mail:</label>
                <input class="form-control" type="text" name="email" value="{{ old('email') }}">

                @error('email')
                    <p>{{ $message }}</p>
                @enderror
                <br>


                <label class="form-label" for="name">Felhasználónév:</label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
                <br>

                <label class="form-label" for="password">Jelszó:</label>
                <input class="form-control" type="password" name="password">
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
                <br>

                <label class="form-label" for="password_confirmation">Jelszó újra:</label>
                <input class="form-control" type="password" name="password_confirmation"><br>
                <br>
                <input class="btn btn-success d-flex-inline" class="form-control" type="submit" value="Regisztrálás">
                <a class="btn btn-link mt-2" href="/login">
                    Van már fiókom!
                </a>
            </form>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
