@extends('layouts.master')

@section('content')

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Mapa de calor del listado de riesgos</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					Formulario de registro de riesgo
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>Mapa de Calor</label>
								<table class="table table_calor">
									<tr>
										<td rowspan="12" colspan="1" id="rotate">
											<img src="{{url('img/eje_y.png')}}">
											<!-- <div class="Rotate-90">Magnitud de daño</div> -->
										</td>
									</tr>
									<tr>
										<td colspan="10" align="center">Probabilidad de ocurrencia</td>
									</tr>
									<!--
										$e_y = impacto
										$e_x = probabilidad
									-->
									<?php $i = 5; ?>
									@foreach ($mapa_calor as $mapa)
										@if ($i%5 == 0 )
											<tr>
										@endif
										<td class="{{$mapa['class']}}">
										{{$mapa['y']*$mapa['x']}}
										@foreach ($riesgos as $riesgo)
											@if ($riesgo->impacto == $mapa['y'] && $riesgo->probabilidad == $mapa['x'])
													<i class="fa fa-asterisk point_riesgo"  title="{{$riesgo->nombre}}"> </i>
											@endif
										@endforeach
										</td>
										<?php $i++; ?>
										@if ($i%5 == 0 )
											</tr>
										@endif
									@endforeach


								</table>

								<table class="table tables-riesgo" id="dataTables-example">
									<thead>
										<tr>
											<th>Descripción del Riesgo</th>
											<th>Probabilidad</th>
											<th>Magnitud</th>
											<th>Estado del riesgo</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($riesgos as $riesgo)
											@foreach ($mapa_calor as $mapa)
												@if (($mapa['y'] == $riesgo->impacto) AND ($mapa['x'] == $riesgo->probabilidad))
													<tr class="{{$mapa['class']}}">
												@endif
											@endforeach

												<td>{{$riesgo->nombre}}</td>
												<td>{{$riesgo->probabilidad}}</td>
												<td>{{$riesgo->impacto}}</td>
												<td>{{$riesgo->impacto * $riesgo->probabilidad}}</td>
											</tr>
										@endforeach
									</tbody>
								</table>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('script')
	<script type="text/javascript">
		$('.point_riesgo').tooltip();
	</script>
@stop

@section('css')
	<style type="text/css">
	.table>thead>tr>.red, .table>tbody>tr>.red, .table>tfoot>tr>.red, .table>thead>tr>.red, .table>tbody>tr>.red, .table>tfoot>tr>.red{
		background-color: #cd0200;
	}
	.table>thead>tr>.yellow, .table>tbody>tr>.yellow, .table>tfoot>tr>.yellow, .table>thead>tr>.yellow, .table>tbody>tr>.yellow, .table>tfoot>tr>.yellow{
		background-color: #f5e625;
	}
	.table>thead>tr>.green, .table>tbody>tr>.green, .table>tfoot>tr>.green, .table>thead>tr>.green, .table>tbody>tr>.green, .table>tfoot>tr>.green{
		background-color: #22b24c;
	}
	.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{
		text-align: center;
		max-width: 15px;
	}

	.table_calor>thead>tr>th, .table_calor>tbody>tr>th, .table_calor>tfoot>tr>th, .table_calor>thead>tr>td, .table_calor>tbody>tr>td, .table_calor>tfoot>tr>td{
		padding-bottom: 30px;
		padding-top: 30px;
	}

	#rotate{
		padding: 0;
		padding-top: 200px;
		width: 30px;
	}
</style>

@stop
