<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új Poszt</title>
</head>

<body>
    <h1>Új bejegyzés létrehozása</h1>

    <form action="/new-post" method="post">
        @csrf

        <label for="title">Cím:</label><br>
        <input type="text" name="title">
        @error("title")
            <p>{{ $message }}</p>
        @enderror
        <br>



        <label for="text">Bejegyzés:</label><br>
        <textarea name="text" cols="50" rows="30"></textarea>

        @error("text")
            <p>{{ $message }}</p>
        @enderror
        <br>
        <button type="submit">Mentés</button>

    </form>

</body>

</html>
