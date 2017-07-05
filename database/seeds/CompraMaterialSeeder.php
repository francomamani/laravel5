<?php

use Illuminate\Database\Seeder;
use App\Personal;
use App\CompraMaterial;
class CompraMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//ejemplo estatico con id predeterminado
    	CompraMaterial::create([
            'personal_id' => 1, 
            'num_factura' => '12313287', 
            'fecha_compra' => '2017-06-04'
    	]);
    	//ejemplo dinamico con id desconocido
		$personal = Personal::create([
			          'nombres' => "Daniela",
			           'apellidos' => "Navarro",
			           'cargo' => "Administrativo", 
			           'carnet' => "1564"
			    	]);
    	CompraMaterial::create([
            'personal_id' => $personal->id, 
            'num_factura' => '123132787', 
            'fecha_compra' => '2017-06-06'
    	]);

    }
}
