<?php
require_once 'Conexion.php';
class Arma extends Conexion{
    public $arm_id;
    public $arm_idescripcion;
    public $arm_situacion;

    public function __construct($args = [] )
    {
        $this-> arm_id = $args ['arm_id'] ?? NULL;
        $this-> arm_descripcion = $args  ['arm_descripcion'] ?? ' '; 
    }

   public function guardar (){
    $sql = "INSERT INTO armas (arm_descripcion)values ('$this->arm_descripcion')";
    $resultado =  self::ejecutar($sql);
    return $resultado;
   }

 
    public function buscar(){
        $sql =  " SELECT * FROM armas where arm_situacion = 1";
        if($this->arm_descripcion != ' '){
            $sql .= " and arm_descripcion like '%$this->arm_descripcion%'";
            }
        $resultado = self::servir($sql);
        return $resultado;

    }

    public function modificar (){
        $sql = "UPDATE armas SET arm_descripcion = '$this->arm_descripcion' where arm_id = $this->arm_id ";
        $resultado = self::ejecutar($sql);
        return $resultado;    
    }

    public function eliminar(){
        $sql = "UPDATE armas SET arm_situacion = 0 where arm_id = $this->ID";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

}
?>
