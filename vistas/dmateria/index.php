<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/../../modelos/Alumno.php';
require_once __DIR__ . '/../../modelos/Materia.php';
require_once __DIR__ . '/../../modelos/Dmateria.php';

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
<?php include_once __DIR__ . '/../../includes/header.php' ?>
<?php include_once __DIR__ . '/../../includes/navbar.php' ?>
<div class="container">
    <h1 class="text-center">Formulario de asignacion de alumnos a materias </h1>
    <div class="row justify-content-center">
        <form action="/final_moralesb/controladores/dmaterias/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
                <div class="col">
                    <label for="asig_alumno">ALUMNO</label>
                    <select name="asig_alumno" id="asig_alumno" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($alumnos as $key => $alumno) : ?>
                            <option value="<?= $alumno['ALU_ID'] ?>"><?= $alumno['ALU_NOMBRE'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="asig_materia">MATERIA</label>
                    <select name="asig_materia" id="asig_materia" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($materias as $key => $materia) : ?>
                            <option value="<?= $materia['MAT_ID'] ?>"><?= $materia['MAT_NOMBRE'] ?></option>
                        <?php endforeach ?>
                    </select>
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
<?php include_once __DIR__ . '/../../includes/footer.php' ?>