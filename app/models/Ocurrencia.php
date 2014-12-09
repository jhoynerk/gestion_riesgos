<?php

class Ocurrencia extends Eloquent {
	protected $table = 'ocurrencias';
	protected $fillable = ['fecha_error', 'descripcion_rel_error', 'riesgo_id', 'fuente_del_error', 'user_responsable_id', 'user_registro_id', 'costo_impacto', 'costo_solucion'];

	public function user_responsable()
	{
		return $this->hasOne('User', 'id', 'user_responsable_id');
	}

	public function user_registro()
	{
		return $this->hasOne('User', 'id', 'user_registro_id');
	}

	public function riesgo()
	{
		return $this->hasOne('Riesgo', 'id', 'riesgo_id');
	}
}

