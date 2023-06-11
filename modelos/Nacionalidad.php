<?php
require_once 'Conexion.php';
class Nacionalidad extends Conexion{
    public $ID;
    public $nac_pais;
    public $nac_situacion;

    public function __construct($args = [] )
    {
        $this-> ID = $args ['ID'] ?? NULL;
        $this-> nac_pais = $args  ['nac_pais'] ?? ' '; 
    }

   public function guardar (){
    $sql = "INSERT INTO nacionalidades (nac_pais)values ('$this->nac_pais')";
    $resultado =  self::ejecutar($sql);
    return $resultado;
   }


    public function buscar(){
        $sql =  " SELECT * FROM nacionalidades where nac_situacion = 1";
        if($this->nac_pais != ' '){
            $sql .= " and nac_pais like '%$this->nac_pais%'";
            }
        $resultado = self::servir($sql);
        return $resultado;

    }

    public function modificar (){
        $sql = "UPDATE nacionalidades SET nac_pais = '$this->nac_pais' where ID = $this->ID ";
        $resultado = self::ejecutar($sql);
        return $resultado;    
    }

    public function eliminar(){
        $sql = "UPDATE nacionalidades SET nac_situacion = 0 where ID = $this->ID";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

}
?>
