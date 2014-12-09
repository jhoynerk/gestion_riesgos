<?php

class Riesgo extends Eloquent {
	protected $table = 'riesgos';
	protected $fillable = ['nombre', 'descripcion','impacto', 'probabilidad', ''];
	

	public function ocurrencias()
	{
		return $this->hasMany('Ocurrencia');
	}	
	
}
