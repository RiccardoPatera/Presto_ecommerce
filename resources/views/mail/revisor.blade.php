<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it By CodeArtisans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-fluid vh-100" style="background-color: rgb(37,66,97)">
        <div class="row ">
            <div class="col-12 d-flex  align-items-center h-25" style="background-color: #222f3ed9">
                <h1 class="text-light" style="font-family: 'Righteous', cursive;">presto</h1>
            </div>

        </div>
            <div class="col-12 mt-2">
                <h4 class="text-light text-center"> Un utente vorrebbe entrare a far parte del nostro Team</h4>
            </div>
            <div class="col-12 d-flex  flex-column p-4 ">
                <p class="text-light text-start">Ecco i suoi dati</p>
                <p class="text-light text-start">Nome: {{$data['name']}}</p>
                <p class="text-light text-start">Cognome: {{$data['surname']}}</p>

                <p class="text-light text-start">Lettera di presentazione:</p>
                <div class="bg-light p-3 w-100 h-50 rounded ">
                    {{$data['body']}}
                </div>
                <p class="text-light text-center">Per rendere revisore questo utente </p>
                <a href="{{route('make_revisor',compact('user'))}}" class="text-light">Clicca qui</a>
            </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
