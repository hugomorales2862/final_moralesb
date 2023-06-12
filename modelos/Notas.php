<?php
require_once 'Conexion.php';

class Nota extends Conexion {
    public $calif_id;
    public $calif_alumno;
    public $calif_materia;
    public $calif_nota;
    public $calif_resultado;
    public $calif_situacion;

    public function __construct($args = []) {
        $this->calif_id = $args['calif_id'] ?? NULL;
        $this->calif_alumno = $args['calif_alumno'] ?? '';
        $this->calif_materia = $args['calif_materia'] ?? NULL;
        $this->calif_nota = $args['calif_nota'] ?? '';
        $this->calif_resultado = $args['calif_resultado'] ?? '';
        $this->calif_situacion = $args['calif_situacion'] ?? '';
    }

    public function guardar() {
        $sql = "INSERT INTO calificaciones (calif_alumno, calif_materia, calif_nota, calif_resultado, calif_situacion)
                VALUES ('$this->calif_alumno', '$this->calif_materia', '$this->calif_nota', '$this->calif_resultado', '$this->calif_situacion')";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    public function modificar() {
        $sql = "UPDATE calificaciones SET calif_nota = '$this->calif_nota', calif_resultado = '$this->calif_resultado'
                WHERE calif_id = $this->calif_id";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }

    public function eliminar() {
        $sql = "UPDATE calificaciones SET calif_situacion = '0' WHERE calif_id = $this->calif_id";
        $resultado = $this->ejecutar($sql);
        return $resultado;
    }
}

?>
