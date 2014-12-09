@extends('layouts.master')

@section('content')
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Modificar riesgo</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Formulario para modificar riesgo
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								{{Form::open(['route' => ['admin.riesgo.update', $riesgo->id], 'method' => 'put', 'role' => 'form'])}}

									<div class="form-group">
										<label for="nombre">Nombre</label>
										{{Form::text('nombre', $riesgo->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required' => 'required'])}}
									</div>
									<div class="form-group">
										<label for="descripcion">Descripción</label>
										{{Form::textarea('descripcion', $riesgo->descripcion, ['class' => 'form-control', 'required' => 'required', 'rows' => '3'])}}
									</div>
									<div class="form-group">
										<label for="impacto">Nivel de Magnitud</label>
										{{Form::select('impacto', [1=>1,2=>2,3=>3,4=>4,5=>5], $riesgo->impacto, ['class' => 'form-control', 'required' => 'required'])}}
									</div>
									<div class="form-group">
										<label for="probabilidad">Nivel de Probabilidad</label>
										{{Form::select('probabilidad', [1=>1,2=>2,3=>3,4=>4,5=>5], $riesgo->probabilidad, ['class' => 'form-control', 'required' => 'required'])}}
									</div>
									<div class="form-group">
										<label for="primera_ocurrencia"></label>
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
