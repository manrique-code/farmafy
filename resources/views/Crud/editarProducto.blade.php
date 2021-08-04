<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('CrudCss/editarProducto.css') }}"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <title>FarmaFy</title>
    
</head>

<body>
    <main>
    <h1>Editar Producto</h1>
    <form class="row needs-validation centrar" novalidate>

    <div class="row">

    <div class="input-group mb-3">
    <input type="text"  class="form-control " id="validationCustom01"placeholder="Código" aria-label="Codigo" required>
 
</div >

  <div class="input-group mb-3">
    <input type="text" class="form-control " placeholder="Nombre de producto" aria-label="Nombre de producto" required>
 
</div>

  <div class="input-group mb-3">
  <span class="input-group-text">L</span>
  <input type="text" class="form-control "  placeholder="Precio" aria-label="Amount (to the nearest dollar)" required>
  <span class="input-group-text">.00</span>

</div>

  <div class="input-group mb-3">
  <input type="text" class="form-control " id="validationCant" placeholder="Cantidad Existente" aria-label="Cantidad Existente" required>
 
</div>


<div class="input-group mb-3">
  <input type="file" class="form-control " id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"  placeholder="Cantidad Existente" aria-label="Upload" required> 
    <button class="btn btn-outline-secondary" type="button"  name="subir"id="inputGroupFileAddon04">Cargar</button>
   
</div>
<div class="input-group mb-3">
 
    <img src="..." class="rounded mx-auto d-block" alt="...">
</div>

  <div  class=" row col">
    <button class="btn btn-primary" type="submit">Guardar</button>
</div>
<div  class=" row col">
    <button class="btn btn-primary" type="submit">Cancelar</button>
</div>

</form>
</main>
<script src="validacion.js"></script>
</body>
