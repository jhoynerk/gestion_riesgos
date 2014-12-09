@extends('layouts.master')
@section('content')
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Usuarios registrados</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Listado de Usuario
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
						<table class="table table-striped table-bordered table-hover tables-riesgo" id="dataTables-example">
							<thead>
								<tr>
									<th>Rol</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Correo</th>
									<th>Cedula</th>
									<th>Creación del usuario</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $user)
									<tr class="odd gradeX">
										<td>{{$roles[$user->rol]}}</td>
										<td>{{$user->nombre}}</td>
										<td>{{$user->apellido}}</td>
										<td>{{$user->correo}}</td>
										<td>{{$user->cedula}}</td>
										<td>{{date( 'd/m/Y' , strtotime($user->created_at) )}}</td>
										<td>
											<a href="{{ route('admin.usuario.show', $user->id) }}" class="btn btn-success btn-circle" title="Modificar"><i class="fa fa-pencil"></i></a>
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
