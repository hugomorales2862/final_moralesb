<?php include_once __DIR__.'/../../includes/header.php' ?>
<?php include_once __DIR__. '/../../includes/navbar.php' ?>
    <div class="container">
        <h1 class="text-center">Buscar Nacionalidad del alumno</h1>
        <div class="row justify-content-center">
            <form action="../../controladores/nacionalidades/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="nac_pais">Nacionalidad</label>
                        <input type="text" name="nac_pais" id="nac_pais" class="form-control" required>
                    </div>
                </div>
        
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-info w-100">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include_once __DIR__.'/../../includes/footer.php' ?>