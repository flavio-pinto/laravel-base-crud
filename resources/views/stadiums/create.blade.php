@extends('layouts.main')

@section('main-content')
    <h1 class="mb-4">Add new stadium</h1>

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

    <form action="{{route('stadiums.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Stadium name">  {{-- old serve per mantenere i dati che si sono riempiti in caso dovessero esserci errori di validazione --}}
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="team_owner" value="{{old('team_owner')}}" placeholder="Stadium owner">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="capacity_spectators" value="{{old('capacity_spectators')}}" placeholder="Capacity">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="description" value="{{old('description')}}" placeholder="Description">
        </div>
        <input class="btn btn-primary" type="submit" value="Create">
    </form>
@endsection