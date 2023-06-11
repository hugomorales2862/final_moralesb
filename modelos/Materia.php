<?php
require_once 'Conexion.php';
class Materia extends Conexion{
    public $mat_id;
    public $mat_nombre;
    public $mat_situacion;

    public function __construct($args = [] )
    {
        $this-> mat_id = $args ['mat_id'] ?? NULL;
        $this-> mat_nombre = $args  ['mat_nombre'] ?? ' '; 
    }

   public function guardar (){
    $sql = "INSERT INTO materias(mat_nombre)values ('$this->mat_nombre')";
    $resultado =  self::ejecutar($sql);
    return $resultado;
   }


    public function buscar(){
        $sql =  " SELECT * FROM materias where mat_situacion = 1";
        if($this->mat_nombre != ' '){
            $sql .= " and mat_nombre like '%$this->mat_nombre%'";
            }
        $resultado = self::servir($sql);
        return $resultado;

    }

    public function modificar (){
        $sql = "UPDATE materias SET mat_nombre = '$this->mat_nombre' where mat_id = $this->mat_id ";
        $resultado = self::ejecutar($sql);
        return $resultado;    
    }

    public function eliminar(){
        $sql = "UPDATE materias SET mat_situacion = 0 where mat_id = $this->mat_id";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

}
?>
