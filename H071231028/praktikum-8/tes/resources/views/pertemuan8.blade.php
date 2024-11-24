<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halo pertemuan 8</h1>

    <p>Halo {{ $nama}}</p>
    <ul>
    @foreach($animals as $animal)
        <li>{{$animal}}</li>
        @endforeach


    </ul>
 
</body>
</html>