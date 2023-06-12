<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__.'/../../modelos/Arma.php';
require_once __DIR__.'/../../modelos/Grado.php';
require_once __DIR__.'/../../modelos/Nacionalidad.php';
require_once __DIR__.'/../../modelos/Alumno.php';

    try {
        $alumno = new Alumno();
        $arma = new Arma();
        $grado = new grado();
        $nacionalidad = new Nacionalidad();
        $alumnos = $alumno->buscar();
        $armas = $arma->buscar();
        $grados = $grado->buscar();
        $nacionalidades = $nacionalidad->buscar();
            // var_dump($grados);
            // exit;
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }

?>
<?php include_once __DIR__.'/../../includes/header.php' ?>
<?php include_once __DIR__. '/../../includes/navbar.php' ?>
<div class="container">
        <h1 class="text-center">Formulario de registro de alumnos</h1>
        <div class="row justify-content-center">
            <form action="/final_moralesb/controladores/alumnos/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
                <div class="col">
                    <label for="alu_nombre">Nombre</label>
                    <input type="text" name="alu_nombre" id="alu_nombre" class="form-control required">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="alu_apellido">Apellido</label>
                    <input type="text" name="alu_apellido" id="alu_apellido" class="form-control required">
                </div>
            </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alu_grado">Grado</label>
                        <select name="alu_grado" id="alu_grado" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($grados as $key => $grado) : ?>
                                <option value="<?= $grado['gra_id'] ?>"><?= $grado['gra_descripcion'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alu_arma">Arma o Servicio</label>
                        <select name="alu_arma" id="alu_arma" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($armas as $key => $arma) : ?>
                                <option value="<?= $arma['arm_id'] ?>"><?= $arma['arm_descripcion'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alu_nac">Nacionalidad</label>
                        <select name="alu_nac" id="alu_nac" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($nacionalidades as $key => $nacionalidad) : ?>
                                <option value="<?= $nacionalidad['nac_id'] ?>"><?= $nacionalidad['nac_pais'] ?></option>
                            <?php endforeach?>  
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
<?php include_once __DIR__. '/../../includes/footer.php' ?>