<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bejegyzés szerkesztése</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body class="bg-black bg-opacity-10">

    <div class="content bg-white m-5 p-5 rounded-5 shadow">
        <h1>Bejegyzés szerkesztése</h1>
        <form action="/edit-post" method=post>
            @csrf

            <input type="hidden" name="postID" value="{{ $post->id }}">

            <label class="form-label" for="title">Cím:</label><br>
            <input class="form-control " type="text" name="title" value="{{ $post->title }}">
            @error('title')
                <p>{{ $message }}</p>
            @enderror
            <br>
            <label class="form-label" for="text">Bejegyzés:</label><br>
            <textarea class="form-control" name="text">{{ $post->text }}</textarea>

            @error('text')
                <p>{{ $message }}</p>
            @enderror
            <br>

            <select class="form-control" name="tags[]" id="tags" placeholder="Válasszon" multiple>
                @foreach ($tags as $tag)
                    <option value="#$lb{{ $tag->id }}"
                        @foreach ($usedTags as $select)

                        @if ($select->id == $tag->id)
                            selected
                            @endif
                        @endforeach>
                        {{ $tag->name }}
                    </option>
                @endforeach

            </select>
            <button class="btn btn-primary p-2 mt-3 d-flex" type="submit">Mentés</button>

        </form>
        <a class="btn btn-light p-2 mt-5" href="/"> Főoldal </a>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#tags').select2({
                    placeholder: "Kérem válasszon",
                    tags: true
                });
            });
        </script>

    </div>
</body>

</html>
