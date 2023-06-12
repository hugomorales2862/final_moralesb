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

   public function buscar()
   {
      
   $sql =  " SELECT * FROM alumnos WHERE alu_situacion = '1'";
   if($this->alu_nombre != ' ' && $this->alu_apellido != ''){
       $sql .= " and alu_nombre like '%$this->alu_nombre%'";
       }
       $sql .= " or alu_apellido like '%$this->alu_apellido%'";
   $resultado = self::servir($sql);
   return $resultado;

}

public function guardar()
{
    $sql = "INSERT INTO alumnos (alu_nombre,alu_apellido_alu_grado,alu_arma,alu_nac) VALUES ('$this->alu_nombre', '$this->alu_apellido',$this->alu_grado,$this->alu_arma,$this->alu_nac)";
    $resultado = self::ejecutar($sql);
    return $resultado;
}

 


public function eliminar() {

    $sql = "UPDATE alumnos 
            SET alu_situacion = '0' 
            WHERE alu_id = $this->alu_id";

    $resultado = self::ejecutar($sql);

        $sql = "UPDATE asig_materia 
            SET asig_situacion = '0' 
            WHERE asig_alumno = $this->alu_id";

    $resultado_materia = self::ejecutar($sql);

    $sql = "DELETE FROM calificaciones 
            WHERE calif_alumno = $this->alu_id";

    $resultado_calif = self::ejecutar($sql);

    
    if ($resultado && $resultado_materia && $resultado_calif) {
        return true;
    } else {
        return false;
    }
}

public function modificar()
{
    // Modificar registro en la tabla alumnos
    $sql = "UPDATE alumnos 
            SET alu_nombre = COALESCE('$this->alu_nombre', alu_nombre), 
                alu_apellido = COALESCE('$this->alu_apellido', alu_apellido), 
                alu_grado = COALESCE('$this->alu_grado', alu_grado), 
                alu_arma = COALESCE('$this->alu_arma', alu_arma), 
                alu_nac = COALESCE('$this->alu_nac', alu_nac)
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