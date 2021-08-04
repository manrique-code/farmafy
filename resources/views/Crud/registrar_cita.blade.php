<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('CrudCss/registro_cita.css') }}">
    <title>Registrar Cita</title>
</head>
<body >
    <section class="form-register">
        <h1>Registrar Cita</h1>
        <input class="controller" type="text" name="id_cliente" id="id_cliente" placeholder="Ingrese la identidad del cliente">
        <input class="controller" type="text" name="nombre_cliente" id="nombre_cliente" placeholder="Ingrese el nombre del cliente">
        <input class="controller" type="text" name="nombre_empleado" id="nombre_empleado" placeholder="Ingrese el nombre del empleado">
        <input class="controller" type="datetime-local" name="fecha_cita" id="fecha_cita" placeholder="Ingrese la fecha de la cita">
        <p>estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>
        <input class="botons" type="submit" value="Registrar">
        <input class="botons" type="submit" value="Cancelar">
        
    </section>
    
</body>
</html>

