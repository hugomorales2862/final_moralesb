<?php
require_once 'Conexion.php';

class Dmateria extends Conexion {
  
    public $asig_materia;
    public $asig_alumno;
    public $asig_situacion;

    public function __construct($args = [])
    {
        $this->asig_materia = $args['asig_materia'] ?? '';
        $this->asig_alumno = $args['asig_alumno'] ?? '';
        $this->asig_situacion = $args['asig_situacion'] ?? '';
    }

    public function guardar()
    {
        $sql = "INSERT INTO asig_materia (asig_materia, asig_alumno) VALUES ('$this->asig_materia', '$this->asig_alumno')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar()
    {
        $sql = "SELECT asig_materia.asig_materia, asig_materia.asig_alumno
                FROM asig_materia
                INNER JOIN alumnos ON asig_materia.asig_alumno = alumnos.alu_id
                INNER JOIN materias ON asig_materia.asig_materia = materias.mat_id
                WHERE asig_materia.asig_situacion = '1'";

        if ($this->asig_materia != '') {
            $sql .= " AND materias.mat_nombre LIKE '%$this->asig_materia%'";
        }

        if ($this->asig_alumno != '') {
            $sql .= " AND alumnos.alu_nombre LIKE '%$this->asig_alumno%'";
        }
      
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
        $sql = "UPDATE asig_materia 
                SET ";
    
        if ($this->asig_alumno != '') {
            $sql .= "asig_alumno = '$this->asig_alumno', ";
        }
    
        if ($this->asig_materia != '') {
            $sql .= "asig_materia = '$this->asig_materia', ";
        }
  
        $sql = rtrim($sql, ', ') . " 
                WHERE asig_alumno = '$this->asig_alumno' 
                AND asig_materia = '$this->asig_materia'";
    
        $resultado = self::ejecutar($sql);
    
        $sql = "UPDATE calificaciones 
                SET ";
    
        if ($this->asig_alumno != '') {
            $sql .= "calif_alumno = '$this->asig_alumno', ";
        }
    
        if ($this->asig_materia != '') {
            $sql .= "calif_materia = '$this->asig_materia', ";
        }
    
        $sql = rtrim($sql, ', ') . " 
                WHERE calif_alumno = '$this->asig_alumno' 
                AND calif_materia = '$this->asig_materia'";
    
        $resultado_calif = self::ejecutar($sql);
    
        if ($resultado && $resultado_calif) {
            return true;
        } else {
            return false;
        }
    }
}
    
?>
