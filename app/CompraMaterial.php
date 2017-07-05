<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class CompraMaterial extends Model
{
	protected $table = "compra_materials";
	protected $fillable = ['personal_id', 'num_factura', 'fecha_compra'];
	public function personal()
	{
		return $this->belongsTo('App\Personal');
	}
}
