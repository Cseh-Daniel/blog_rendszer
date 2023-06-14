<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bejegyzés szerkesztése</title>
</head>

<body>
    <h1>Bejegyzés szerkesztése</h1>
    <form action="/edit-post/{{ $post->id }}" method=post>
        @csrf

        <label for="title">Cím:</label><br>
        <input type="text" name="title" value="{{ $post->title }}">
        @error("title")
            <p>{{ $message }}</p>
        @enderror
        <br>
        <label for="text">Bejegyzés:</label><br>
        <textarea name="text" cols="50" rows="30">{{ $post->text }}</textarea>

        @error("text")
            <p>{{ $message }}</p>
        @enderror
        <br>
        <button type="submit">Mentés</button>


    </form>


</body>

</html>
