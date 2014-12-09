@extends('layouts.master')

@section('content')
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Modificar ocurrencia</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Formulario para modificar ocurrencia
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								{{Form::open(['route' => ['admin.ocurrencia.update', $ocurrencia->id], 'method' => 'put', 'role' => 'form'])}}

									<div class="form-group">
										<label for="riesgo_id">Riesgo</label>
										{{ Form::select('riesgo_id',$riesgo,$ocurrencia->riesgo_id,array('class' => 'form-control')) }}
									</div>

									<div class="form-group">
										<label for="fecha_error">Fecha de la ocurrecia</label>
										<input type="date" class="form-control" placeholder="Primera Ocurrencia" name="fecha_error" id="fecha_error" value="{{$ocurrencia->fecha_error}}">
									</div>

									<div class="form-group">
										<label for="descripcion_rel_error">Medida de solución Implantada</label>
										<textarea class="form-control" rows="3" name="descripcion_rel_error" id="descripcion_rel_error">{{$ocurrencia->descripcion_rel_error}}</textarea>
									</div>

									<div class="form-group">
										<label for="fuente_del_error">Causa del riesgo</label>
										<input type="text" class="form-control" placeholder="Causa del riesgo" name="fuente_del_error" id="fuente_del_error" value="{{$ocurrencia->fuente_del_error}}" required>
									</div>
									<div class="form-group">
										<label for="user_responsable_id">Ténico encargado del riesgo</label>
										{{ Form::select('user_responsable_id',$users,$ocurrencia->user_responsable_id,array('class' => 'form-control')) }}
									</div>
									<div class="form-group">
										<label for="costo_impacto">Costo de Impacto del riesgo</label>
										<input type="number" class="form-control" placeholder="Costo del impacto" name="costo_impacto" id="costo_impacto" value="{{$ocurrencia->costo_impacto}}" required>
									</div>
									<div class="form-group">
										<label for="costo_solucion">Costo de solución al riesgo</label>
										<input type="number" class="form-control" placeholder="Costo de la solución" name="costo_solucion" id="costo_solucion" value="{{$ocurrencia->costo_solucion}}" required>
									</div>

									<button type="submit" class="btn btn-success">Modificar</button>
								{{Form::close()}}
							</div>
						</div>
						<!-- /.row (nested) -->
					</div>
					<!-- /.panel-body -->
				</div>
			</div>
		</div>
	</div>
@stop
