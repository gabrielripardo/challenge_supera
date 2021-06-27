<?php

namespace Database\Seeders;
use App\Models\ModelTipo;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelTipo::create([             
            'nome' => 'Carro',            
        ]);     
        ModelTipo::create([             
            'nome' => 'Moto',            
        ]);     
        ModelTipo::create([             
            'nome' => 'Caminhão',            
        ]);     
    }
}
