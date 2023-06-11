<?php include_once __DIR__.'/../../includes/header.php' ?>
<?php include_once __DIR__. '/../../includes/navbar.php' ?>
    <div class="container">
        <h1 class="text-center">Buscar Grados Militares</h1>
        <div class="row justify-content-center">
            <form action="../../controladores/grados/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="gra_descripcion">Grado Militar</label>
                        <input type="text" name="gra_descripcion" id="gra_descripcion" class="form-control" required>
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