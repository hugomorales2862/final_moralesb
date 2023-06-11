<?php
require_once 'Conexion.php';
class Materia extends Conexion{
    public $ID;
    public $mat_nombre;
    public $mat_situacion;

    public function __construct($args = [] )
    {
        $this-> ID = $args ['ID'] ?? NULL;
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
        $sql = "UPDATE materias SET mat_nombre = '$this->mat_nombre' where ID = $this->ID ";
        $resultado = self::ejecutar($sql);
        return $resultado;    
    }

    public function eliminar(){
        $sql = "UPDATE materias SET mat_situacion = 0 where ID = $this->ID";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

}
?>
