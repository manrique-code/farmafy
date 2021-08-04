<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <link rel="stylesheet" href="{{ asset('CrudCss/visualizarproducto.css') }}"> 
    <link rel="stylesheet" href="{{ asset('CrudCss/CrudUser.css') }}">

	<title>Tabla de productos</title>
     <title>FarmaFy</title>
</head>
<body>
	
	<main>
	<h1>Productos</h1>
	<div class="col-xs-12">
	<div class="input-buscar">
                    <form action="{{route('findprod')}}" method="get">

                        <div class="input-buscar-2">
                            <input type="search" id="buscar" value="{{$texto}}" class="buscar" name="TextoBusqueda" placeholder="Buscar"><a href="{{route('findprod')}}" method="get"><i class="fas fa-search icon"></i></a>
                        </div>
                    </form>
                    <div class="button-1">
                        <button type="button" class="btn btn-primary button" data-bs-toggle="modal" data-bs-target="#" data-bs-whatever="@mdo"> <a style="text-decoration:none"  href="{{route('productos2')}}">Agregar Producto</a>
						</button>
                    </div>
                </div>

		<br>
		<table class="table table-bordered">
			<thead>
			
			<tr>
					<th>Código</th>
					<th>Nombre de Producto</th>
					<th>Precio</th>
					<th>Existencia</th>
					<th>Editar</th>
					<th>Eliminar</th>
					
				</tr>
			</thead>
			<tbody>
				@if(count($producto)<=0) <tr>
                            <td>No hay Resultados</td>
                            </tr>
                            @else
			@foreach($producto as $productos)
			<tr>
					<td>{{$productos->IdProducto}}</td>
					<td>{{$productos->NombreProducto}}</td>
					<td>{{$productos->Precio }}</td>
					<td>{{$productos->Disponibilidad}}</td>
					<td><a class="btn btn-warning" href="#">Editar<i class="fa fa-plus"></i></a></td>
                    <td><a class="btn btn-danger" href="#">Eliminar<i class="fa fa-plus"></i></a></td>			
					</tr>
				@endforeach
				@endif
			</tbody>
		</table>
		
	</div>
	</main>

</body>
</html>
