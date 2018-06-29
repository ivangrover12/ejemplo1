<!DOCTYPE html>
<html>
<head>
    <title>Larabel - @yield('title')</title>
    <link <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>

	<nav class="navbar navbar-dark bg-primary">
		<a href="#" class="navbar-brand">Ejemplo Cechus y Karen</a>	

		<a href="/trainers/create" class="btn btn-success">CrearNuevo</a>
		<a href="/trainers" class="btn btn-warning" >Home</a>
		{{-- {!! Form::open([ 'route' => ['trainers.store', $trainer->slug],'method' => 'DELETE']) !!}
	 	{!! Form::submit('CrearNuevo', ['class' => 'btn btn-danger']) !!}
	 	{!! Form::close() !!} --}}
	</nav>

    <div class="container">
        @yield('content')
    </div>


</body>
</html>
