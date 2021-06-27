<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTipo extends Model
{
    use HasFactory;
    protected $table='tipos';
    
    public function relAutomoveis(){
        return $this->hasMany('App\Models\ModelAutomovel', 'id_tipo');
    }
}
