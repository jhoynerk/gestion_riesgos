@extends('layouts.master')
@section('content')

	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ocurrencias registradas</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Costos de impacto y de solución del riesgo <b>{{$riesgo->nombre}}</b>
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="flot-chart">
										<div class="flot-chart-content" id="flot-line-chart-multi"></div>
									</div>
								</div>
							</div>

							<table class="table table-striped table-bordered table-hover tables-riesgo">
							<thead>
								<tr>
									<th>Fecha</th>
									<th>Riesgo</th>
									<th>Costo Del Impacto</th>
									<th>Costo de la Solución</th>
									<th>Técnico encargado</th>
									<th>Evaluador encargado</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($ocurrencias as $ocurrencia)
									<tr class="odd gradeX">

										<td>{{date( 'Y/m/d' , strtotime($ocurrencia->fecha_error) )}}</td>
										<td>{{$ocurrencia->riesgo->nombre}}</td>
										<td>{{$ocurrencia->costo_impacto}}</td>
										<td>{{$ocurrencia->costo_solucion}}</td>
										<td>{{$ocurrencia->user_responsable->nombre .' '.$ocurrencia->user_responsable->apellido }}</td>
										<td>
											@if (is_object($ocurrencia->user_registro))
												{{$ocurrencia->user_registro->nombre .' '.$ocurrencia->user_registro->apellido }}
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('script')
	<script src="{{url()}}/js/plugins/flot/excanvas.min.js"></script>
	<script src="{{url()}}/js/plugins/flot/jquery.flot.js"></script>
	<script src="{{url()}}/js/plugins/flot/jquery.flot.pie.js"></script>
	<script src="{{url()}}/js/plugins/flot/jquery.flot.resize.js"></script>
	<script src="{{url()}}/js/plugins/flot/jquery.flot.tooltip.min.js"></script>

	<script type="text/javascript">
		$(function() {
			var oilprices = [
				@foreach ($ocurrencias as $ocurrencia)
					[{{strtotime($ocurrencia->fecha_error) * 1000}}, {{$ocurrencia->costo_impacto}}],
				@endforeach

			];
			var exchangerates = [
				@foreach ($ocurrencias as $ocurrencia)
					[{{strtotime($ocurrencia->fecha_error) * 1000}}, {{$ocurrencia->costo_solucion}}],
				@endforeach
			];

			function euroFormatter(v, axis) {
				return v.toFixed(axis.tickDecimals) + "BsF";
			}

			function doPlot(position) {
				$.plot($("#flot-line-chart-multi"), [{
					data: oilprices,
					label: "Costo del impacto (BsF)"
				}, {
					data: exchangerates,
					label: "Costo de solución",
					yaxis: 2
				}], {
					xaxes: [{
						mode: 'time'
					}],
					yaxes: [{
						min: 0
					}, {

						alignTicksWithAxis: position == "right" ? 1 : null,
						position: position
					}],
					legend: {
						position: 'sw'
					},
					grid: {
						hoverable: true
					},
					tooltip: true,
					tooltipOpts: {
						content: "%s para %x era %y (BsF)",
						xDateFormat: "%y-%0m-%0d",

						onHover: function(flotItem, $tooltipEl) {

						}
					}

				});
			}

			doPlot("right");

			$("button").click(function() {
				doPlot($(this).text());
			});
		});
	</script>
@stop
