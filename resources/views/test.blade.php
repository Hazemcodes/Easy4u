<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://pyscript.net/latest/pyscript.css" />
    <script defer src="https://pyscript.net/latest/pyscript.js"></script>
</head>
<body>
    <form action="/showw" method="post">
        @csrf
        <input type="file" accept="image/*" name="photo" value="{{old('photo')}}" onchange="loadFile(event)">
        <button type="submit">Run Python</button>
    </form>
</body>
</html>