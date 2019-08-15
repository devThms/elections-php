<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    protected $table = 'votos';

    public function departamento() 
    {
        return $this->belongsTo(Departamento::class);
    }

    public function municipio() 
    {
        return $this->belongsTo(Municipio::class);
    }

}
