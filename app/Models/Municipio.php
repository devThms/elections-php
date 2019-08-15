<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    
    protected $table = 'municipios';

    public function departamento() 
    {
        return $this->belongsTo(Departamento::class);
    }

    public function votos() {
        return $this->hasMany(Voto::class);
    }
}
