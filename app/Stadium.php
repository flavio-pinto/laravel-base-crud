<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    //Per evitare che stadium mi venga trasformato al plurale in stadia, perché Laravel la riconosce come una parola latina
    protected $table = 'stadiums';

    //Fillable: permette scrittura/modifica attributi
    protected $fillable = [
        'name',
        'team_owner',
        'capacity_spectators',
        'description'
    ];
}
