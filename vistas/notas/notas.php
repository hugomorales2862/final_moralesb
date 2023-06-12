<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../modelos/Dmateria.php';
var_dump($_POST);
try {
    $dmateria = new Dmateria();

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
    <h1 class="text-center">Formulario de registro de notas</h1>
    <div class="row justify-content-center">
        <form action="/controladores/notas/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
                <div class="col">
                    <label for="calif_nota">NOTA</label>
                    <input type="text" name="calif_nota" id="calif_nota" class="form-control required">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="calif_resultado">GANO/PERDIO</label>
                    <input type="text" name="calif_resultado" id="calif_resultado" class="form-control required">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="calif_alumno">ALUMNO</label>
                    <select name="calif_alumno" id="calif_alumno" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($dmaterias as $key => $dmateria) : ?>
                            <?php if (isset($dmateria['ASIG_ALUMNO'])) : ?>
                                <option value="<?= $dmateria['ASIG_ALUMNO'] ?>"><?= $dmateria['ASIG_ALUMNO'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="calif_materia">MATERIA</label>
                    <select name="calif_materia" id="calif_materia" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($dmaterias as $key => $dmateria) : ?>
                            <?php if (isset($dmateria['ASIG_MATERIA'])) : ?>
                                <option value="<?= $dmateria['ASIG_MATERIA'] ?>"><?= $dmateria['ASIG_MATERIA'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
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