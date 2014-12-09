@extends('layouts.master')

@section('content')

	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ver riesgo</h1>
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

						@if (Session::has('message'))
							<div class="alert alert-success">
								<ul>
									@if (is_array(Session::get('message')))
										@foreach (Session::get('message') as $element)
											<li>{{ $element }}</li>
										@endforeach
									@else
										<li>{{ Session::get('message') }}</li>
									@endif
								</ul>
							</div>
						@endif

						<div class="row">
							<div class="col-lg-12">
									<div class="form-group">
										<label for="nombre">Nombre</label>
										<input type="text" class="form-control" value="{{$riesgo->nombre}}" disabled>
									</div>
									<div class="form-group">
										<label for="descripcion">Descripción</label>
										<textarea class="form-control" rows="3" name="descripcion" id="descripcion" disabled>{{$riesgo->descripcion}}</textarea>
									</div>
									<div class="form-group">
										<label for="impacto">Nivel de Magnitud</label>
										<input type="text" class="form-control" value="{{$riesgo->impacto}}" disabled>
									</div>
									<div class="form-group">
										<label for="probabilidad">Nivel de Probabilidad</label>
										<input type="text" class="form-control" value="{{$riesgo->probabilidad}}" disabled>
									</div>
									<div class="form-group">
										<label>Mapa de Calor</label>
										<table class="table">
											<tr>
												<td rowspan="12" colspan="1" id="rotate">
													<img src="{{url('img/eje_y.png')}}">
												</td>
											</tr>
											<tr>
												<td colspan="10" align="center">Probabilidad de Amenaza</td>
											</tr>
											<?php $i = 5 ?>
											@foreach ($mapa_calor as $mapa)
												@if ($i%5 == 0 )
													<tr>
												@endif
												<td class="{{$mapa['class']}}">
												{{$mapa['y']*$mapa['x']}}

												@if ($riesgo->impacto == $mapa['y'] && $riesgo->probabilidad == $mapa['x'])
														<i class="fa fa-asterisk point_riesgo"  title="{{$riesgo->nombre}}"> </i>
												@endif

												</td>
												<?php $i++; ?>
												@if ($i%5 == 0 )
													</tr>
												@endif
											@endforeach
										</table>
										@foreach ($mapa_calor as $mapa)
											@if (($mapa['y'] == $riesgo->impacto) AND ($mapa['x'] == $riesgo->probabilidad))
												<div class="alert alert-{{$mapa['class']}} text-center"> {{$mapa['msg']}}
											@endif
										@endforeach
												({{($riesgo->probabilidad*$riesgo->impacto)}})
										</div>
									</div>
									<a class="btn btn-success" href="{{url('admin/riesgo')}}">Regresar</a>
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
			padding: 30px;

		}

		#rotate{
			padding: 0!important;
			width: 10px;
		}

		.Rotate-90
		{
			-webkit-transform: rotate(-90deg);
			-moz-transform: rotate(-90deg);
			-ms-transform: rotate(-90deg);
			-o-transform: rotate(-90deg);
			transform: rotate(-90deg);

			-webkit-transform-origin: 50% 50%;
			-moz-transform-origin: 50% 50%;
			-ms-transform-origin: 50% 50%;
			-o-transform-origin: 50% 50%;
			transform-origin: 50% 50%;


			width: auto;
			position: relative;
			top: 200px;
		}

	</style>

@stop
