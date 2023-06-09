<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it By CodeArtisans</title>
</head>
<body>
    <div>
        <h1> Un utente ha chiesto di lavorare con noi</h1>
         <p>Ecco i suoi dati</p>
         <p>Nome {{$data['name']}}</p>
         <p>Cognome {{$data['surname']}}</p>
         <p>Lettera di presentazione:{{$data['body']}}</p>
         <p>Per rendere reviosre questo utente </p>
         <a href="{{route('make_revisor',compact('user'))}}">Clicca qui</a>
    </div>
</body>
</html>
