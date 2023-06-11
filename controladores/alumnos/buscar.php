<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '../../../modelos/Alumno.php';

try {
    $_GET['venta_fecha'] = $_GET['venta_fecha'] != '' ? date('Y-m-d', strtotime($_GET['venta_fecha'])) : '';
  
    $alumno = new Alumno($_GET);
    $resultado = $arma->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>GRADO</th>
                            <th>NOMBRE DEL ALUMNO</th>
                            <th>NOMBRE DEL ALUMNO</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($resultado) > 0):?>
                            <?php foreach($resultado as $key => $arma) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $alumno['alu_grado'] ?></td>
                                    <td><?= $alumno['alu_nombre'] ?></td>
                                    <td><?= $alumno['alu_apellido'] ?></td>
                                    <td><a class="btn btn-info w-100" href="../../controladores/alumnos/detalle.php?alu_id=<?= $alumno['alu_id']?>">VER DETALLE</a></td>
                                    <td><a class="btn btn-warning w-100" href="../../controladores/alumnos/modificar.php $alumno['alu_id']?>">Modificar</a></td>
                                    <td><a class="btn btn-danger w-100" href="../../controladores/alumnos/eliminar.php $alumno['alu_id']?>">Eliminar</a></td>
                                </tr>
                            <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="4">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="../../vistas/alumnos/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>
