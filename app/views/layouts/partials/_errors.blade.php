@if($errors->has())
	<div class="alert alert-danger">
		<ul>
		<!--recorremos los errores en un loop y los mostramos-->
		@foreach ($errors->all('<p>:message</p>') as $message)
			<li>{{ $message }}</li>
		@endforeach
		</ul>
	</div>
@endif
