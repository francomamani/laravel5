<?php

use Illuminate\Database\Seeder;
use App\Personal;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Personal::create([
           'nombres' => "Juan",
           'apellidos' => "Mendoza",
           'cargo' => "Administrativo",
           'carnet' => "78645641"
        ]);
        Personal::create([
           'nombres' => "Daniela",
           'apellidos' => "Suarez",
           'cargo' => "Contadora",
           'carnet' => "4654562"
        ]);
        Personal::create([
           'nombres' => "Julia",
           'apellidos' => "Schlesinger",
           'cargo' => "Gerente",
           'carnet' => "21234560"
        ]);
/*        $this->call(PersonalSeeder::class);
        $this->call(CompraMaterialSeeder::class);*/
    }
}
