<?php
require_once 'Conexion.php';
class Alumno extends Conexion {
    public $alu_id;
    public $alu_nombre;
    public $alu_apellido;
    public $alu_grado;
    public $alu_arma;
    public $alu_nac;
    public $alu_situacion;

    public function __construct($args = [] )
    {
        $this-> alu_id = $args ['alu_id'] ?? NULL;
        $this-> alu_nombre = $args  ['alu_nombre'] ?? ' '; 
        $this-> alu_apellido = $args ['alu_apellido'] ?? ' ';     
        $this-> alu_grado = $args ['alu_grado'] ?? ' ';    
        $this-> alu_arma = $args ['alu_arma'] ?? ' ';     
        $this-> alu_nac = $args ['alu_nac'] ?? ' ';       
        $this-> alu_situacion = $args ['alu_situacion'] ?? ' ';
   }

   public function guardar (){
    $sql = "INSERT INTO alumnos (alu_nombre,alu_apellido, alu_grado, alu_arma, alu_nac)values ('$this->alu_nombre','$this->alu_apellido', '$this->alu_grado', '$this->alu_arma', '$this->alu_nac')";
    $resultado =  self::ejecutar($sql);
    return $resultado;
   }


   public function buscar() {
    $sql = "SELECT alumnos.alu_nombre, alumnos.alu_apellido, grados.gra_descripcion AS grado, armas.arm_descripcion AS arma, nacionalidades.nac_pais AS nacionalidad
            FROM alumnos
            INNER JOIN grados ON alumnos.alu_grado = grados.gra_id
            INNER JOIN armas ON alumnos.alu_arma = armas.arm_id
            INNER JOIN nacionalidades ON alumnos.alu_nac = nacionalidades.nac_id
            WHERE alumnos.alu_situacion = '1'";

    if ($this->alu_nombre != '') {
        $sql .= " AND alumnos.alu_nombre LIKE '%$this->alu_nombre%'";
    }

    if ($this->alu_apellido != '') {
        $sql .= " AND alumnos.alu_apellido LIKE '%$this->alu_apellido%'";
    }

    if ($this->alu_grado != '') {
        $sql .= " AND alumnos.alu_grado = '$this->alu_grado'";
    }

    if ($this->alu_arma != '') {
        $sql .= " AND alumnos.alu_arma = '$this->alu_arma'";
    }

    if ($this->alu_nac != '') {
        $sql .= " AND alumnos.alu_nac = '$this->alu_nac'";
    }

    $resultado = self::servir($sql);
    return $resultado;
}


public function eliminar() {
    $sql = "UPDATE alumnos 
            SET alu_situacion = '0' 
            WHERE alu_id = $this->alu_id";

    $resultado = self::ejecutar($sql);

    // Eliminar registros correspondientes en la tabla asig_materia
    $sql = "UPDATE asig_materia 
            SET asig_situacion = '0' 
            WHERE asig_alumno = $this->alu_id";

    $resultado_asig_materia = self::ejecutar($sql);

    // Comprobar si ambas operaciones se realizaron correctamente
    if ($resultado && $resultado_asig_materia) {
        return true;
    } else {
        return false;
    }
}
public function modificar() {
    // Modificar registro en la tabla alumnos
    $sql = "UPDATE alumnos 
            SET alu_nombre = '$this->alu_nombre', 
                alu_apellido = '$this->alu_apellido', 
                alu_grado = '$this->alu_grado', 
                alu_arma = '$this->alu_arma', 
                alu_nac = '$this->alu_nac' 
            WHERE alu_id = $this->alu_id";

    $resultado = self::ejecutar($sql);

    // Modificar registros correspondientes en la tabla asig_materia
    $sql = "UPDATE asig_materia 
            SET asig_situacion = '1' 
            WHERE asig_alumno = $this->alu_id";

    $resultado_asig_materia = self::ejecutar($sql);

    // Modificar registros correspondientes en la tabla calificaciones
    $sql = "UPDATE calificaciones 
            SET calif_resultado = 'Aprobado' 
            WHERE calif_alumno = $this->alu_id";

    $resultado_calificaciones = self::ejecutar($sql);

    // Comprobar si todas las operaciones se realizaron correctamente
    if ($resultado && $resultado_asig_materia && $resultado_calificaciones) {
        return true;
    } else {
        return false;
    }
}

}

?>