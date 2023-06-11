<?php
require_once 'Conexion.php';
class Nacionalidad extends Conexion{
    public $nac_id;
    public $nac_pais;
    public $nac_situacion;

    public function __construct($args = [] )
    {
        $this-> nac_id = $args ['nac_id'] ?? NULL;
        $this-> nac_pais = $args  ['nac_pais'] ?? ' '; 
    }

   public function guardar (){
    $sql = "INSERT INTO nacionalnac_idades (nac_pais)values ('$this->nac_pais')";
    $resultado =  self::ejecutar($sql);
    return $resultado;
   }


    public function buscar(){
        $sql =  " SELECT * FROM nacionalnac_idades where nac_situacion = 1";
        if($this->nac_pais != ' '){
            $sql .= " and nac_pais like '%$this->nac_pais%'";
            }
        $resultado = self::servir($sql);
        return $resultado;

    }

    public function modificar (){
        $sql = "UPDATE nacionalnac_idades SET nac_pais = '$this->nac_pais' where nac_id = $this->nac_id ";
        $resultado = self::ejecutar($sql);
        return $resultado;    
    }

    public function eliminar(){
        $sql = "UPDATE nacionalnac_idades SET nac_situacion = 0 where nac_id = $this->nac_id";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

}
?>
