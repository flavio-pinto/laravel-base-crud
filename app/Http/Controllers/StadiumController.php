<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stadium;

class StadiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stadiums = Stadium::all();
        return view('stadiums.index', compact('stadiums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stadiums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Prendiamo i dati della form e li immagazziniamo in un array $data
        $data = $request->all();

        //Validazione (le chiavi sono i name degli input e i valori sono le validazioni che decidiamo di inserire)
        $request->validate([
            'name' => 'required|unique:stadiums|max:40',
            'team_owner' => 'required|max:20',
            'capacity_spectators' => 'required',
            'description' => 'required'
        ]);

        //Salva nuovo stadio nel db
        $stadium = new Stadium();
        $stadium->name = $data['name']; // ['name'] e le altre chiavi associative che stanno sotto sono prese dai vari "name" degli input del form
        $stadium->team_owner = $data['team_owner'];
        $stadium->capacity_spectators = $data['capacity_spectators'];
        $stadium->description = $data['description'];
        $saved = $stadium->save();
        dd($saved);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
