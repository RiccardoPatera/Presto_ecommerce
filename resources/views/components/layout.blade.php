<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
    <script src="https://kit.fontawesome.com/cfb677e60e.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    @livewireStyles
    @vite(['resources/css/app.css'])
</head>
<body>
    <x-navbar />


    <div id="container">


        {{$slot}}






    </div>

        <div class="push"> </div>
        <x-footer/>
    @livewireScripts
    <script src="https://kit.fontawesome.com/203597dd98.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    @vite(['resources/js/app.js'])
</body>
</html>
