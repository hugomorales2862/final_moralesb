<?php
require '../../modelos/Grado.php';
    try {
        $grado = new Grado($_GET);

        $resultado = $grado->buscar();
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">Modificar Grados</h1>
        <div class="row justify-content-center">
            <form action="../../controladores/grados/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="gra_id">
                <div class="row mb-3">
                    <div class="col">
                        <label for="gra_descripcion">Grado a modificar</label>
                        <input type="text" name="gra_descripcion" id="gra_descripcion" class="form-control" required>
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
<?php include_once '../../includes/footer.php'?>