@extends('layouts.master')

@section('content')
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Parametros para generar reporte</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Seleccione las opciones para generar su reporte de las ocurrencias de los riesgos.
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								{{Form::open(['route' => 'admin.ocurrencia.showReporte', 'role' => 'form', 'target' => '_blank'])}}

									<div class="form-group">
										<label for="riesgo_id">Riesgo</label>
										{{ Form::select('riesgos[]',$riesgos,null,array('class' => 'chosen-select form-control', 'multiple' => 'multiple', 'data-placeholder' => 'Seleccion los riesgos...')) }}
									</div>

									<div class="form-group">
										<label for="fecha_desde">Desde</label>
										<input type="date" class="form-control" placeholder="Primera Ocurrencia" name="fecha_desde" id="fecha_desde">
									</div>

									<div class="form-group">
										<label for="fecha_hasta">Hasta</label>
										<input type="date" class="form-control" placeholder="Primera Ocurrencia" name="fecha_hasta" id="fecha_hasta">
									</div>

									<button type="submit" class="btn btn-success">Generar Reporte</button>
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

@section('script')

	<script type="text/javascript">
		$('.chosen-select').chosen();
	</script>
@stop
