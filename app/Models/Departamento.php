<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';

    public function municipios() {
        return $this->hasMany(Municipio::class);
    }

    public function votos() {
        return $this->hasMany(Voto::class);
    }
}
