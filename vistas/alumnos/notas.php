<?php

require_once '../../modelos/Dmateria.php';
require_once '../../modelos/Notas.php';

$nota = new Nota();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nota->calif_alumno = $_POST['alumno']; // Reemplaza 'alumno' por el nombre del campo select correspondiente
    $nota->calif_materia = $_POST['materia']; // Reemplaza 'materia' por el nombre del campo select correspondiente
    $nota->calif_nota = $_POST['nota'];
    $nota->calif_resultado = $_POST['resultado'];

    try {
        $resultado = $nota->guardar();
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2) {
        $error = $e2->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultado de notas</title>
</head>

<body>
    <div class="container">
    <div class="row justify-content-center">
        <form action="../../controladores/notas/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
                <div class="col">
                    <label for="calif_nota">NOTA</label>
                    <input type="text" name="calif_nota" id="calif_nota" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="calif_resultado">RESULTADO </label>
                    <input type="text" name="calif_resultado" id="calif_resultado" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-primary w-100">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

    <div class="row justify-content-center mt-4">
        <div class="col-lg-8">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>NO.</th>
                        <th>ALUMNO</th>
                        <th>MATERIA</th>
                        <th>NOTA</th>
                        <th>RESULTADO</th>
                        <th>MODIFICAR</th>
                        <th>IMPRIMIR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (count($notas) > 0) :
                        foreach ($notas as $key => $nota) :
                    ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $nota['calif_alumno'] ?></td>
                                <td><?= $nota['calif_materia'] ?></td>
                                <td><?= $nota['calif_nota'] ?></td>
                                <td><?= $nota['calif_resultado'] ?></td>
                                <td><a class="btn btn-warning w-100" href="../../controladores/notas/modificar.php?id=<?= $nota['calif_id'] ?>">Modificar</a></td>
                                <td><a class="btn btn-info w-100" href="/crud_practica9/vistas/ventas/factura.php?venta_id=<?php echo $venta['DETALLE_ID'] ?>">VER DETALLE</a></td>
                            </tr>
                        <?php
                        endforeach;
                    else :
                        ?>
                        <tr>
                            <td colspan="8">NO EXISTEN REGISTROS</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <a href="/vistas/alumnos/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
        </div>
    </div>
    </div>
</body>

</html>