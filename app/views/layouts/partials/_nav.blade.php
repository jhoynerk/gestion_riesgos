<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="{{url('admin/dashboard')}}">
		<img class="logo pull-left" src="{{url()}}/img/logo.png">
		GESTIÓN DE RIESGOS TECNOLÓGICOS
	</a>
</div>

<ul class="nav navbar-top-links navbar-right">
	<li>{{Auth::user()->nombre.' '.Auth::user()->apellido}}</li>

	<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
		</a>
		<ul class="dropdown-menu dropdown-user">
			<li><a href="{{url()}}/logout"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
			</li>
		</ul>
	</li>
</ul>


<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">

			<li>
				<a href="{{url('admin/dashboard')}}" class="<?= Request::is('admin/dashboard') ? 'active' : '' ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
			</li>
			@if (Auth::user()->rol == 0)
				<li class="<?= Request::is('admin/usuario*') ? 'active' : '' ?>">
					<a href="#"><i class="fa fa-user fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
							<a class="<?= Request::is('admin/usuario') ? 'active' : '' ?>" href="{{ route('admin.usuario.index') }}">Listado</a>
						</li>
						<li>
							<a class="<?= Request::is('admin/usuario/crear') ? 'active' : '' ?>" href="{{ route('admin.usuario.create') }}">Registrar</a>
						</li>
					</ul>
				</li>
			@endif
			<li class="<?= Request::is('admin/riesgo*') ? 'active' : '' ?>">
				<a href="#"><i class="fa fa-bug fa-fw"></i> Riesgos<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a class="<?= Request::is('admin/riesgo') ? 'active' : '' ?>" href="{{ route('admin.riesgo.index') }}">Listado</a>
					</li>
					<li>
						@if (Auth::user()->rol == 0)
							<a class="<?= Request::is('admin/riesgo/crear') ? 'active' : '' ?>" href="{{ route('admin.riesgo.create') }}">Registrar</a>
						@endif
					</li>
					<li>
						<a class="<?= Request::is('admin/riesgo/mapa/show') ? 'active' : '' ?>" href="{{ route('admin.riesgo.mapa') }}">Mapa de Calor</a>
					</li>
				</ul>
			</li>

			<li class="<?= Request::is('admin/ocurrencia*') ? 'active' : '' ?>">
				<a href="#"><i class="fa fa-edit fa-fw"></i> Ocurrencias de Riesgo<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a class="<?= Request::is('admin/ocurrencia') ? 'active' : '' ?>" href="{{ route('admin.ocurrencia.index') }}">Listado</a>
					</li>
					<li>
						@if (Auth::user()->rol == 0 OR Auth::user()->rol == 2)
							<a class="<?= Request::is('admin/ocurrencia/crear') ? 'active' : '' ?>" href="{{ route('admin.ocurrencia.create') }}">Registrar</a>
						@endif
					</li>
					<li>
						<a class="<?= Request::is('admin/ocurrencia/reporte') ? 'active' : '' ?>" href="{{ route('admin.ocurrencia.beforeReporte') }}">Reportes</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>

<style type="text/css">
	.logo{
		margin-top: -10px;
		margin-left: 5px;
		margin-right: 10px;
	}
</style>

