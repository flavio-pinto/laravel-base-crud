<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'/>
        <title>Laravel CRUD</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <header class="mb-5">
            <nav class="navbar navbar-expand navbar-light bg-light">
                <div class="nav-brand">Serie A</div>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('stadiums.index')}}">Stadiums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('stadiums.create')}}">Add stadium</a>
                    </li>
                </ul>
            </nav>
        </header>