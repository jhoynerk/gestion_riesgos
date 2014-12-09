@extends('layouts.master')
@section('content')
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Registrar usuario</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Formulario de registro de usuario
					</div>
					<div class="panel-body">
						@include('layouts.partials._errors')
						<div class="row">
							<div class="col-lg-12">
								{{Form::open(['route' => 'admin.usuario.store', 'role' => 'form'])}}
									<!-- <div class="form-group">
										<label for="">Nombre</label>
										<input class="form-control">
										<p class="help-block" name="" id="">Example block-level help text here.</p>
									</div> -->
									<div class="form-group">
										<label for="nombre">Nombre</label>
										{{Form::text('nombre', Input::old('nombre'), ['placeholder' => 'Nombre', 'class'=> 'form-control','required'=>'required' ])}}
									</div>
									<div class="form-group">
										<label for="apellido">Apellido</label>
										{{Form::text('apellido', Input::old('apellido'), ['placeholder' => 'Apellido', 'class'=> 'form-control','required'=>'required' ])}}
									</div>
									<div class="form-group">
										<label for="cedula">Cedula</label>
										{{Form::text('cedula', Input::old('cedula'), ['placeholder' => 'Cedula', 'class'=> 'form-control','required'=>'required' ])}}
									</div>
									<div class="form-group">
										<label for="correo">Email</label>
										{{Form::email('correo', Input::old('correo'), ['placeholder' => 'Email', 'class'=> 'form-control','required'=>'required' ])}}
									</div>
									<div class="form-group">
										<label for="password">Contraseña</label>
										{{Form::password('password', ['placeholder' => 'Contraseña', 'class'=> 'form-control','required'=>'required' ])}}
									</div>
									<div class="form-group">
										<label for="password_confirmation">Repetir Contraseña</label>
										{{Form::password('password_confirmation', ['placeholder' => 'Repetir Contraseña', 'class'=> 'form-control','required'=>'required' ])}}
									</div>
									<!-- <div class="form-group">
										<label>Static Control</label>
										<p class="form-control-static">email@example.com</p>
									</div> -->
									<div class="form-group">
										<label>Rol del Usuario</label>
										{{Form::select('rol', $roles, Input::old('rol'), ['class'=>'form-control', 'required'=>'required'])}}
									</div>

									<button type="submit" class="btn btn-success">Registrar</button>
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
