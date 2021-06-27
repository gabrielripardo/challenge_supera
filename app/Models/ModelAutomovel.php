<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAutomovel extends Model
{
    use HasFactory;
    protected $table='automoveis';
    protected $fillable = ['id_user', 'tipo', 'marca', 'modelo', 'versao'];

    public function relUsers(){
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}
