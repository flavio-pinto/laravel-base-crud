@extends('layouts.main')

@section('main-content')
    {{-- Alert in caso di session delete --}}
    @if(session('cancelled'))
        <div class="alert alert-success">
            {{session('cancelled')}} successfully deleted
        </div>
    @endif

    <h1 class="mb-4">Stadiums</h1>

    <section class="stadiums">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Owner</th>
                    <th>Capacity</th>
                    <th>Description</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($stadiums as $stadium)
                    <tr>
                        <td>{{$stadium->id}}</td>
                        <td>{{$stadium->name}}</td>
                        <td>{{$stadium->team_owner}}</td>
                        <td>{{$stadium->capacity_spectators}}</td>
                        <td>{{$stadium->description}}</td>
                        <td><a class="btn btn-success" href="{{route('stadiums.show', $stadium->id)}}">Show</a></td>
                        <td><a class="btn btn-primary" href="{{route('stadiums.edit', $stadium->id)}}">Edit</a></td>
                        <td>
                            <form action="{{route('stadiums.destroy', $stadium->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection