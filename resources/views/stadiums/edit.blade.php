@extends('layouts.main')

@section('main-content')
    <h1 class="mb-4">Edit</h1>

    {{-- Per mostrare alert di errore --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('stadiums.update', $stadium->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{old('name', $stadium->name)}}" placeholder="Stadium name">  {{-- old: il primo parametro è il valore che avevo messo prima di essere bloccato dalla validazione, il secondo è il valore di default quando inizio l'edit --}}
        </div>
        <div class="form-group">
            <label for="team_owner">Owner</label>
            <input type="text" class="form-control" name="team_owner" id="team_owner" value="{{old('team_owner', $stadium->team_owner)}}" placeholder="Stadium owner">
        </div>
        <div class="form-group">
            <label for="capacity_spectators">Capacity</label>
            <input type="text" class="form-control" name="capacity_spectators" id="capacity_spectators" value="{{old('capacity_spectators', $stadium->capacity_spectators)}}" placeholder="Capacity">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" value="{{old('description', $stadium->description)}}" placeholder="Description">
        </div>
        <input class="btn btn-primary" type="submit" value="Update">
    </form>
@endsection