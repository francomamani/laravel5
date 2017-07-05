<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Personal extends Model
{
	use SoftDeletes;
	protected $table = "personals";
	protected $dates = ['deleted_at'];	
	protected $fillable = ['nombres', 'apellidos', 'cargo', 'carnet'];
	//protected $hidden = ['carnet'];
/*	protected $fillable = array('nombres', 'apellidos', 'cargo', 'carnet');*/
	public function compraMateriales()
	{
		return $this->hasMany("App\CompraMaterial");
	}
}
