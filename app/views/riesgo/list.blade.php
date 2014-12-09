@extends('layouts.master')
@section('content')

	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Riesgos registrados</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Listado de Riesgos
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						@if (Session::has('message'))
							<div class="alert alert-success">
								<ul>
									<li>{{ Session::get('message') }}</li>
								</ul>
							</div>
						@endif

						<table class="table table-striped table-bordered table-hover tables-riesgo">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Nivel de Magnitud</th>
									<th>Nivel de Probabilidad</th>
									<th>Nivel de riesgo</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($riesgos as $riesgo)
									@foreach ($mapa_calor as $mapa)
										@if (($mapa['y'] == $riesgo->impacto) AND ($mapa['x'] == $riesgo->probabilidad))
											<tr class="odd gradeX {{$mapa['class']}}">
										@endif
									@endforeach
										<td>{{$riesgo->nombre}}</td>
										<td>{{$riesgo->impacto}}</td>
										<td>{{$riesgo->probabilidad}}</td>
										<td>
											@foreach ($mapa_calor as $mapa)
												@if (($mapa['y'] == $riesgo->impacto) AND ($mapa['x'] == $riesgo->probabilidad))
													 {{$mapa['nivel']}}
												@endif
											@endforeach
										</td>
										<td class="acciones">
											<a href="{{ route('admin.riesgo.ver', $riesgo->id) }}" class="btn btn-info btn-circle"><i class="fa fa-search"></i></a>
											@if (Auth::user()->rol == 0)
												<a href="{{ route('admin.riesgo.show', $riesgo->id) }}" class="btn btn-success btn-circle" title="Modoficar"><i class="fa fa-pencil"></i></a>
												{{ Form::open(['route' => ['admin.riesgo.destroy', $riesgo->id], 'method' => 'delete', 'class' => 'form-horizontal' ]) }}
													<button type="submit" class="btn btn-danger btn-circle" title="Eliminar"><i class="fa fa-times"></i></button>
												{{ Form::close() }}
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
