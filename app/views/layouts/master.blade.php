<!DOCTYPE html>
<html lang="en">

<head>
	@include('layouts.partials._css-includes')
</head>

<body>

	<div id="wrapper">
		@include('layouts.partials._nav')

		@yield('content')

	</div>
	<!-- /#wrapper -->
	@include('layouts.partials._js-includes')

</body>

</html>
