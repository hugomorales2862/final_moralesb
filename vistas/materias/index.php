<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php include_once __DIR__.'/../../includes/header.php' ?>
<?php include_once __DIR__. '/../../includes/navbar.php' ?>
<div class="container">
    <h1 class="text-center">Formulario de ingreso de Materias  </h1>
    <div class="row justify-content-center">
        <form action="../../controladores/materias/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
                <div class="col">
                    <label for="mat_nombre">Materia del curso</label>
                    <input type="text" name="mat_nombre" id="mat_nombre" class="form-control">
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
<?php include_once __DIR__. '/../../includes/footer.php' ?>