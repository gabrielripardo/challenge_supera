<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([ 
            'name' => 'Gabriel',
            'email' => 'gts.senna@gmail.com',
            'password' => Hash::make('password'),
        ]);        
        User::create([ 
            'name' => 'Maria',
            'email' => 'maria@gmail.com',
            'password' => Hash::make('password'),
        ]);    
    }
}
