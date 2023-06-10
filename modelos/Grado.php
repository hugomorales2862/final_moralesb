<?php
require_once __DIR__ . '/Conexion.php';

class Grado extends Conexion{
    public $gra_id;
    public $gra_descripcion;
    public $gra_situacion;

    public function __construct($args = [] )
    {
        $this-> gra_id = $args ['gra_id'] ?? NULL;
        $this-> gra_descripcion = $args  ['gra_descripcion'] ?? ' '; 
    }

   public function guardar (){
    $sql = "INSERT INTO grados (gra_descripcion)values ('$this->gra_descripcion')";
    $resultado =  self::ejecutar($sql);
    return $resultado;
   }


    public function buscar(){
        $sql =  " SELECT * FROM grados where gra_situacion = 1";
        if($this->gra_descripcion != ' '){
            $sql .= " and gra_descripcion like '%$this->gra_descripcion%'";
            }
        $resultado = self::servir($sql);
        return $resultado;

    }

    public function modificar (){
        $sql = "UPDATE grados SET gra_descripcion = '$this->gra_descripcion' where gra_id = $this->gra_id ";
        $resultado = self::ejecutar($sql);
        return $resultado;    
    }

    public function eliminar(){
        $sql = "UPDATE grados SET gra_situacion = 0 where gra_id = $this->gra_id";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

}
?>
