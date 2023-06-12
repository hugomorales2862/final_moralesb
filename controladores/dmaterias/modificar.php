<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ .'/../../modelos/Alumno.php';

$resultado = false;
if (
    isset($_POST['alu_nombre'], $_POST['alu_apellido'], $_POST['alu_grado'], $_POST['alu_arma'], $_POST['alu_nac']) &&
    $_POST['alu_nombre'] != '' && $_POST['alu_apellido'] != '' && $_POST['alu_grado'] != '' &&
    $_POST['alu_arma'] != '' && $_POST['alu_nac'] != ''
) {

    try {
        $alumno = new Alumno($_POST);
        $resultado = $alumno->modificar();

        if ($resultado) {
            $resultado_asig_materia = $alumno->modificar();
            $resultado_calificaciones = $alumno->modificar();

            if ($resultado_asig_materia && $resultado_calificaciones) {
            } else {
            }
        } else {
        }
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2) {
        $error = $e2->getMessage();
    }
} else {
    $error = "Debe llenar al menos un dato";
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
        <div class="row">
            <div class="col-lg-6">
                <?php if ($resultado) : ?>
                    <div class="alert alert-success" role="alert">
                        Modificado exitosamente!
                    </div>
                <?php else : ?>
                    <div class="alert alert-danger" role="alert">
                        Ocurrió un error: <?= $error ?>
                    </div>
                <?php endif ?>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="/controladores/alumnos/buscar.php" class="btn btn-info">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>

</html>