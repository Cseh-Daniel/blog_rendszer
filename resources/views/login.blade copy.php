<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
</head>
<body>
    
@if(session()->has("reg_ok"))
<div>
    <p>{{session("reg_ok")}}</p>
</div>
@endif

<div>
    <h1>Bejelentkezés</h1>
    <form action="/login" method="post">
    @csrf
    <label for="email">E-mail:</label><br>
    <input type="email" name="email"><br>

    <label for="password">Jelszó:</label><br>
    <input type="password" name="password"><br>
    <br>
    <input type="submit" value="Bejelentkezés">
    </form>
</div>

<br>

<div>
<h2>Regisztráció</h2>
<form action="/registration" method="post">
    @csrf
    <label for="email">E-mail:</label><br>
    <input type="text" name="email" value="{{old('email')}}">
    
    @error("email")
    <p>{{$message}}</p>
    @enderror
    <br>


    <label for="name">Felhasználónév:</label><br>
    <input type="text" name="name" value="{{old('name')}}">
    @error("name")
    <p>{{$message}}</p>
    @enderror
    <br>

    <label for="password">Jelszó:</label><br>
    <input type="password" name="password">
    @error("password")
    <p>{{$message}}</p>
    @enderror
    <br>

    <label for="password_confirmation">Jelszó újra:</label><br>
    <input type="password" name="password_confirmation"><br>
    <br>
    <input type="submit" value="Regisztrálás">

</form>

</div>

</body>
</html>