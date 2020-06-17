@extends('layouts.main')

@section('main-content')
    <h1 class="mb-4">Homepage</h1>

    <section class="teams">
        <h2 class="text-primary">Clubs List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>City</th>
                    <th>Points</th>
                    <th>Coach</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td>{{$team->name}}</td>
                        <td>{{$team->city}}</td>
                        <td>{{$team->points}}</td>
                        <td>{{$team->coach}}</td>
                        <td>{{$team->description}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection