<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hora extends Model
{
    //
    protected $fillable = [
        'materia',
        'conteudo',
        'horaInicial',
        'horaFinal',
        'data'
    ];
}
