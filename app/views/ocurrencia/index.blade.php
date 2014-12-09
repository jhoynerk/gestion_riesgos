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
									<th>Fecha</th>
									<th>Riesgo</th>
									<th>Medida de solución Implantada</th>
									<th>Costo del Impacto</th>
									<th>Costo de la Solución</th>
									<th>Técnico encargado</th>
									<th>Evaluador encargado</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($ocurrencias as $ocurrencia)
									<tr class="odd gradeX">

										<td>{{date( 'Y/m/d' , strtotime($ocurrencia->fecha_error) )}}</td>
										<td>{{$ocurrencia->riesgo->nombre}}</td>
										<td>{{$ocurrencia->descripcion_rel_error}}</td>
										<td>{{$ocurrencia->costo_impacto}}</td>
										<td>{{$ocurrencia->costo_solucion}}</td>
										<td>{{$ocurrencia->user_responsable->nombre .' '.$ocurrencia->user_responsable->apellido }}</td>
										<td>
											@if (is_object($ocurrencia->user_registro))
												{{$ocurrencia->user_registro->nombre .' '.$ocurrencia->user_registro->apellido }}</td>
											@endif
										<td class="acciones">
											<a href="{{ route('admin.ocurrencia.tabla', $ocurrencia->riesgo_id) }}" class="btn btn-info btn-circle"><i class="fa fa-search"></i></a>
											@if (Auth::user()->rol == 1 AND Auth::user()->id == $ocurrencia->user_responsable_id)
												<a href="{{ route('admin.ocurrencia.editar', $ocurrencia->id) }}" class="btn btn-success btn-circle" title="Modoficar"><i class="fa fa-pencil"></i></a>
											@endif
											@if (Auth::user()->rol == 0 OR Auth::user()->rol == 2)
												<a href="{{ route('admin.ocurrencia.show', $ocurrencia->id) }}" class="btn btn-success btn-circle" title="Modoficar"><i class="fa fa-pencil"></i></a>
												{{ Form::open(['route' => ['admin.ocurrencia.destroy', $ocurrencia->id], 'method' => 'delete', 'class' => 'form-horizontal' ]) }}
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
