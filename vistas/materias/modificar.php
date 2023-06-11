<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require __DIR__.'/../../modelos/Materia.php';
    try {
        $materia = new Materia($_GET);

        $resultado = $materia->buscar();
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once __DIR__.'/../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">Modificar materias</h1>
        <div class="row justify-content-center">
            <form action="../../controladores/materias/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="mat_id">
                <div class="row mb-3">
                    <div class="col">
                        <label for="mat_nombre">materia a modificar</label>
                        <input type="text" name="mat_nombre" id="mat_nombre" class="form-control" required>
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