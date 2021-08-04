<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('CrudCss/agregarproducto.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>FarmaFy</title>

</head>

<body>
<main>
    <h1>Agregar Producto</h1>
    <form class="row needs-validation centrar" novalidate>
    <form class="formulario" method="post" action="{{route('Ingresarprod')}}">
     @csrf
      <div class="row">

        <div class="input-group mb-3">
          <input type="text" class="form-control " id="validationCustom01" placeholder="Código" aria-label="Codigo" name ="IdProducto"required>

        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control " placeholder="Nombre de producto" aria-label="Nombre de producto" name ="NombreProducto" required>

        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">L</span>
          <input type="text" class="form-control " placeholder="Precio" aria-label="Amount (to the nearest dollar)" name ="Precio"required>
          <span class="input-group-text">.00</span>

        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control " id="validationCant" placeholder="Cantidad" aria-label="Cantidad Existente" name ="Disponibilidad"required>

        </div>


        <div class="input-group mb-3">
          <input type="file" class="form-control " id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" placeholder="" aria-label="Upload" required name="imagen">
          <button class="btn btn-outline-secondary" type="button" name="subir" id="inputGroupFileAddon04">Cargar</button>

        </div>
        <div class="input-group mb-3">

          <img src="..." class="rounded mx-auto d-block" alt="...">
        </div>

        <div div class="input-group boton mb-3">
          <button class="btn btn-primary" type="submit" name ="Cancelar" Value="Cancelar">Registrar</button>
        </div>
        </form>
    </form>
  </main>
  <script src="{{ asset('CrudCss/Js/validacion.js') }}"></script>
</body>
</html>