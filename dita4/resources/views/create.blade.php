<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title">
        <br><br>
        <textarea name="content" placeholder="Content"></textarea>
        <br><br>
        <button type="submit">Create Post</button>
    </form>
</body>
</html>