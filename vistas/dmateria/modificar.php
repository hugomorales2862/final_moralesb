<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__.'/../../modelos/Alumno.php';
require_once __DIR__.'/../../modelos/Materia.php';
require_once __DIR__.'/../../modelos/Dmateria.php';

try {
    $alumno = new Alumno();
    $materia = new Materia();
    $dmateria = new Dmateria();
    $alumnos = $alumno->buscar();
    $materias = $materia->buscar();
    $dmaterias = $dmateria->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>
<?php include_once __DIR__.'/../../includes/header.php'?>
<div class="container">
    <h1 class="text-center">Modificar Alumnos</h1>
    <div class="row justify-content-center">
        <form action="../../controladores/dmaterias/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="alu_id">
            <div class="row mb-3">
                <div class="col">
                    <label for="alu_nombre">Nombre del alumno</label>
                    <input type="text" name="alu_nombre" id="alu_nombre" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-warning w-100">Modificar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once __DIR__.'/../../includes/footer.php'?>
