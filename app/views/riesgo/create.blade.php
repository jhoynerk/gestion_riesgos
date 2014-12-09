@extends('layouts.master')

@section('content')
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Registrar riesgo</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Formulario de registro de riesgo
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								{{Form::open(['route' => 'admin.riesgo.store', 'role' => 'form'])}}

									<div class="form-group">
										<label for="nombre">Nombre</label>
										<input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" required>
									</div>
									<div class="form-group">
										<label for="descripcion">Descripción</label>
										<textarea class="form-control" rows="3" name="descripcion" id="descripcion"></textarea>
									</div>
									<div class="form-group">
										<label for="impacto">Nivel de Magnitud de Impacto</label>
										<select class="form-control" name="impacto" id="impacto" required>
											<option value="">Seleccione la Magnitud del riesgo</option>
											@for ($i = 1; $i <= 5 ; $i++)
												<option value="{{$i}}">{{$i}}</option>
											@endfor
										</select>
									</div>
									<div class="form-group">
										<label for="probabilidad">Nivel de Probabilidad de Ocurrencia</label>
										<select class="form-control" name="probabilidad" id="probabilidad" required>
											<option value="">Seleccione la Probabilidad del riesgo</option>
											@for ($i = 1; $i <= 5 ; $i++)
												<option value="{{$i}}">{{$i}}</option>
											@endfor
										</select>
									</div>
									<!-- <div class="form-group">
										<label for="primera_ocurrencia">Fecha de la primera ocurrecia</label>
										<input type="date" class="form-control" placeholder="Primera Ocurrencia" name="primera_ocurrencia" id="primera_ocurrencia">
									</div> -->
									<button type="submit" class="btn btn-success">Registrar</button>
									<button type="reset" class="btn btn-warning">Resetear</button>
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
