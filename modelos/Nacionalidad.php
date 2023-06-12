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
    $sql = "INSERT INTO nacionalidades (nac_pais)values ('$this->nac_pais')";
    $resultado =  self::ejecutar($sql);
    return $resultado;
   }


    public function buscar(){
        $sql =  " SELECT * FROM nacionalidades where nac_situacion = 1";
        if ($this->nac_pais != '') {
            $descripcion = strtolower($this->nac_pais); 
            $sql .= " AND LOWER(nac_pais) LIKE '%' || LOWER('" . $descripcion . "') || '%'";
        }

    }

    public function modificar (){
        $sql = "UPDATE nacionalidades SET nac_pais = '$this->nac_pais' where nac_id = $this->nac_id ";
        $resultado = self::ejecutar($sql);
        return $resultado;    
    }

    public function eliminar(){
        $sql = "UPDATE nacionalidades SET nac_situacion = 0 where nac_id = $this->nac_id";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

}
?>
