<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új Poszt</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

        <select class="tags" name="tags[]" id="tags" placeholder="Válasszon">

            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach

        </select>


        <button type="submit">Mentés</button>

    </form>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.tags').select2({
                placeholder:"Kérem válasszon",
                tags: true
            });
        });
    </script>
</body>

</html>
