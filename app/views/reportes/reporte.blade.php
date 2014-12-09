
{{ HTML::style('/css/bootstrap_2.css') }}

<style type="text/css">
	.table-bordered {
		border: 1px solid #ddd;
	}
	.table {
		width: 100%;
		max-width: 100%;
		margin-bottom: 20px;
		text-align: center;
		border: 1px solid #aaa;
	}

	.black {
		background-color: #aaa;
		color: #ffffff;
	}

	.head-table{
		background-color: #5bc0de;
		color: #ffffff;
		border-bottom: 1px solid #000;
	}

	.titulo_riesgo{
		background-color: #eee;
		color: #000;
		font-weight: 400;
		font-size: 22px;
	}

	body{
		font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
	}
</style>

<div id="page-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<img class="logo" src="img/logo.jpg">
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Reporte de ocurrencias</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<!-- /.panel-heading -->
				<div class="panel-body">

					<table class="table table-striped table-bordered table-hover tables-riesgo">
						<thead>
							<tr class="head-table">
								<th>Fecha</th>
								<th>Costo del Impacto</th>
								<th>Costo de la Solución</th>
								<th>Medida de solución Implantada</th>
								<th>Técnico encargado</th>
								<th>Evaluador encargado</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$anterior = false;
								$total_impacto = 0;
								$total_solucion = 0;
							 ?>
							@foreach ($ocurrencias as $key =>  $ocurrencia)
								@if (($ocurrencia->riesgo_id != $anterior && $anterior))

									<tr class="black">
										<td><b>TOTAL</b></td>
										<td><b>{{$total_impacto}}</b></td>
										<td><b>{{$total_solucion}}</b></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									<?php
										$total_impacto = 0;
										$total_solucion = 0;
									 ?>
									<?php
										$total_impacto = $total_impacto + $ocurrencia->costo_impacto;
										$total_solucion = $total_solucion + $ocurrencia->costo_solucion;
									?>
									<?php $anterior = $ocurrencias[$key]->riesgo_id ?>
									<tr>
										<td class="titulo_riesgo" colspan="6" align="center">{{$ocurrencia->riesgo->nombre}}</td>
									</tr>

									<tr class="odd gradeX">
										<td>{{date( 'd/m/Y' , strtotime($ocurrencia->fecha_error) )}}</td>
										<td>{{$ocurrencia->costo_impacto}}</td>
										<td>{{$ocurrencia->costo_solucion}}</td>
										<td>{{$ocurrencia->descripcion_rel_error}}</td>
										<td>{{$ocurrencia->user_responsable->nombre .' '.$ocurrencia->user_responsable->apellido }}</td>
										<td>
											@if (is_object($ocurrencia->user_registro))
												{{$ocurrencia->user_registro->nombre .' '.$ocurrencia->user_registro->apellido }}
											@endif
										</td>
									</tr>
								@elseif( (count($ocurrencias) - 1 == $key) )
									<tr class="odd gradeX">
										<td>{{date( 'd/m/Y' , strtotime($ocurrencia->fecha_error) )}}</td>
										<td>{{$ocurrencia->costo_impacto}}</td>
										<td>{{$ocurrencia->costo_solucion}}</td>
										<td>{{$ocurrencia->descripcion_rel_error}}</td>
										<td>{{$ocurrencia->user_responsable->nombre .' '.$ocurrencia->user_responsable->apellido }}</td>
										<td>
											@if (is_object($ocurrencia->user_registro))
												{{$ocurrencia->user_registro->nombre .' '.$ocurrencia->user_registro->apellido }}
											@endif
										</td>
									</tr>
									<?php
										$total_impacto = $total_impacto + $ocurrencia->costo_impacto;
										$total_solucion = $total_solucion + $ocurrencia->costo_solucion;
									?>
									<tr class="black">
										<td><b>TOTAL</b></td>
										<td><b>{{$total_impacto}}</b></td>
										<td><b>{{$total_solucion}}</b></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								@else
									<?php
										$total_impacto = $total_impacto + $ocurrencia->costo_impacto;
										$total_solucion = $total_solucion + $ocurrencia->costo_solucion;
									?>
									@if ($key == 0)
										<tr>
											<td class="titulo_riesgo" colspan="6" align="center">{{$ocurrencia->riesgo->nombre}}</td>
										</tr>
									@endif
									<tr class="odd gradeX">
										<td>{{date( 'd/m/Y' , strtotime($ocurrencia->fecha_error) )}}</td>
										<td>{{$ocurrencia->costo_impacto}}</td>
										<td>{{$ocurrencia->costo_solucion}}</td>
										<td>{{$ocurrencia->descripcion_rel_error}}</td>
										<td>{{$ocurrencia->user_responsable->nombre .' '.$ocurrencia->user_responsable->apellido }}</td>
										<td>
											@if (is_object($ocurrencia->user_registro))
												{{$ocurrencia->user_registro->nombre .' '.$ocurrencia->user_registro->apellido }}
											@endif
										</td>
									</tr>
									<?php $anterior = $ocurrencias[$key]->riesgo_id ?>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
