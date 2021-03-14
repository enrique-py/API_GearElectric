<?php

include_once 'conexion.php'; //archivo de conexion a mysql

//Leer info de mi base 
$sql_leer = 'SELECT * FROM datos';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();
$resultado = $gsent->fetchAll();

//Agregar info a mi base 
if($_POST)
{
    $nombre = $_POST['nombre'];
    $tipo_documento = $_POST['tipo_documento'];
    $documento = $_POST['documento'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $sql_agregar = 'INSERT INTO datos (nombre,
    tipo_documento, documento, telefono, correo) VALUES (?,?,?,?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array(
        $nombre, $tipo_documento, $documento, $telefono, $correo
    ));

    echo 'Agregado';
}

?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Prueba GearElectric S.A.S</title>
  </head>
  <body>
    <div class="container-xl, table-responsive">
        <blockquote class="blockquote text-center">
            <br>
            <p class="mb-0">Personas Registradas en el Evento.</p>
            <br>
        </blockquote>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo Documento</th>
                <th scope="col">Documento</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($resultado as $dato): ?>
                <tr>
                    <td scope="row"><?php echo $dato['id'] ?></td>
                    <td><?php echo $dato['nombre'] ?></td>
                    <td><?php echo $dato['tipo_documento'] ?></td>
                    <td><?php echo $dato['documento'] ?></td>
                    <td><?php echo $dato['telefono'] ?></td>
                    <td><?php echo $dato['correo'] ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  </body>
</html>