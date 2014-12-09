@extends('layouts.master')
@section('content')
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Panel de Herramientas</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			@if (Auth::user()->rol == 0)
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-group fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="huge">{{count(User::all())}}</div>
									<div><a href="{{url('admin/usuario/crear')}}">Nuevo Usuario</a></div>
								</div>
							</div>
						</div>
						<a href="{{url('admin/usuario')}}">
							<div class="panel-footer">
								<span class="pull-left">Ver usuarios</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			@endif
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-red">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-bug fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">{{count(Riesgo::all())}}</div>
								@if (Auth::user()->rol == 0)
									<div><a href="{{ route('admin.riesgo.create') }}">Nuevo Riesgo</a></div>
								@endif
							</div>
						</div>
					</div>
					<a href="{{ route('admin.riesgo.index') }}">
						<div class="panel-footer">
							<span class="pull-left">Ver riesgos</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-yellow">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-edit fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">{{count(Ocurrencia::all())}}</div>
								@if (Auth::user()->rol == 0 OR Auth::user()->rol == 2)
									<div><a href="{{ route('admin.ocurrencia.create') }}">Nueva ocurrencia</a></div>
								@endif
							</div>
						</div>
					</div>
					<a href="{{ route('admin.ocurrencia.index') }}">
						<div class="panel-footer">
							<span class="pull-left">Ver ocurrencias</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
@stop

