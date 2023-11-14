<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('avatar-submit')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" name="avatar">
    <button type="submit">Загрузить аватар</button>
</form>

</body>
</html>
