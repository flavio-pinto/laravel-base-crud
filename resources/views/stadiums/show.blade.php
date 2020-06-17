@extends('layouts.main')

@section('main-content')
    <h1 class="mb-4">{{$stadium->name}}</h1>

    <ul class="list-group">
        <li class="list-group-item">
            ID: {{$stadium->id}}
        </li>
        <li class="list-group-item">
            Owner: {{$stadium->team_owner}}
        </li>
        <li class="list-group-item">
            Capacity: {{$stadium->capacity_spectators}}
        </li>
        <li class="list-group-item">
            Description: {{$stadium->description}}
        </li>
        <li class="list-group-item">
            Created at: {{$stadium->created_at}}
        </li>
        <li class="list-group-item">
            Updated at: {{$stadium->updated_at}}
        </li>
    </ul>
@endsection