<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>select2 test</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


</head>

<body>
    <h1>Select2 test</h1>
    <hr>

    <div>

        <form action="/tags" method="post">
            @csrf
            <select name="pelda[]" id="pelda" multiple="multiple">
                <option value="egy">1</option>
                <option value="ketto">2</option>
                <option value="harom">3</option>
                <option value="lorem ipsum">lorem ipsum</option>


            </select>

            <input type="submit" value="Mentés">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pelda').select2({
                placeholder: "Kérem válasszon",
                tags: true
            });
        });
    </script>

</body>

</html>
