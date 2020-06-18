<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stadium;
use Illuminate\Validation\Rule;

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

        //Validazione (le chiavi sono i name degli input e i valori sono le validazioni che decidiamo di inserire, vedi funzione che ho creato nella sezione utilities)
        $request->validate($this->validationRules());

        //Salva nuovo stadio nel db
        $stadium = new Stadium();
        //$stadium->name = $data['name']; // ['name'] e le altre chiavi associative che stanno sotto sono prese dai vari "name" degli input del form
        //$stadium->team_owner = $data['team_owner'];
        //$stadium->capacity_spectators = $data['capacity_spectators'];
        //$stadium->description = $data['description'];

        //Usando "fillable" nel model Stadium dichiaro ciò che voglio inserire, in alternativa senza usare fillable si può fare come la parte commentata sopra
        $stadium->fill($data);
        $saved = $stadium->save();
        
        //Redirect to show
        if($saved) {
            //Se va a buon fine, cerca l'ultimo record della tabella stadiums, diamo referenza e lo portiamo nel redirect con la route
            $newStadium = Stadium::find($stadium->id);
            return redirect()->route('stadiums.show', $newStadium->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Stadium $stadium)
    {
        //L'url che sta in index con quella rotta arriva qui con l'id definito, quindi grazie al model Stadium Laravel crea una istanza dietro le quinte riconosce che si tratta di un id passato dall'url e fa un find(id)
        return view('stadiums.show', compact('stadium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Stadium $stadium)
    {
        //dietro le quinte se lasciassimo $id come parametro sopra $classroom = Classroom::find($id);

        return view('stadiums.edit', compact('stadium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stadium $stadium)
    {
        //Prendiamo i dati della form e li immagazziniamo in un array $data
        $data = $request->all();

        //Validazione
        $request->validate($this->validationRules($stadium->id));

        //Update dati db
        $updated = $stadium->update($data);


        if($updated) { //se updated è true farà il redirect alla show di quello stadio
            return redirect()->route('stadiums.show', $stadium->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stadium $stadium)
    {
        //Referenza entità da eliminare da usare col metodo with nel redirect
        $ref = $stadium->name;

        //Delete
        $deleted = $stadium->delete();

        //Redirect with session data
        if($deleted) {
            return redirect()->route('stadiums.index')->with('cancelled', $ref); //con with creo una session nell'index, per portarmi le info
        }
    }

    //Utilities
    //Validation rules
    private function validationRules($id = null) { //mettiamo null di default visto che usiamo questo metodo anche in store, dove non serve il parametro
        return [
            'name' => [
                'required',
                'max:40',
                //Rule va aggiunto in alto con use
                Rule::unique('stadiums')->ignore($id) //creo una regola unique nella tabella classroom, però non escludi l'id del record attuale, così si possono modificare i parametri che non sono unique senza essere bloccati in caso non si dovesse cambiare anche il dato con la validazione unique
            ],

            'team_owner' => 'required|max:20',
            'capacity_spectators' => 'required',
            'description' => 'required'
        ];
    }
}
