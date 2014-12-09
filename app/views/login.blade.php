<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sistema de gestión de riesgos tecnológicos</title>

	<!-- Bootstrap Core CSS -->
	<link href="{{url()}}/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="{{url()}}/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="{{url()}}/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="{{url()}}/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style type="text/css">
		form label.error{font:10px Tahoma,sans-serif;color:#ED7476;margin-left:5px; display:inline;}
		form input.error,form input.error:hover,form input.error:focus,form select.error,form textarea.error{border:1px solid #ED7476;background:#FFEDED}
		.logo{margin-top: 50px;}
	</style>
</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-offset-4">
				<center>
					<img class="logo" src="img/logo.png">
				</center>
			</div>
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Acceso de Usuario</h3>
					</div>
					<div class="panel-body">
						@if (Session::has('login_errors'))
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								E-mail o contraseña erronea.
							</div>
						@endif
						{{ Form::open(['id'=>'login_form']) }}
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required="required">
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Contraseña" name="password" id="password" type="password" required="required">
								</div>
								<input type="submit" class="btn btn-lg btn-success btn-block" value="Acceder">
							</fieldset>
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
		<div class="row">

			<div class="col-lg-4 col-md-offset-4">
				<div class="well well-lg">
					<h4>Usuarios de prueba</h4>
					<p>analista@test.com</p>
					<p>tecnico@test.com</p>
					<p>evaluador@test.com</p>
					<p>Clave: test</p>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery Version 1.11.0 -->
	<script src="{{url()}}/js/jquery-1.11.0.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="{{url()}}/js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="{{url()}}/js/plugins/metisMenu/metisMenu.min.js"></script>

	<script src="{{url()}}/js/jquery.validate.js"></script>
	<script src="{{url()}}/js/additional-methods.js"></script>
	<script src="{{url()}}/js/localization/messages_es.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="{{url()}}/js/sb-admin-2.js"></script>

	<script type="text/javascript">
		$("#login_form").validate({
			lang: 'es'
		});
	</script>
</body>

</html>
