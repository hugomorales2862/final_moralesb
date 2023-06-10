<?php 
abstract class Conexion {
    public static $conexion = null;

    private static function conectar() {
        try {
            // CONEXION A LA BD DE INFORMIX EN DOCKER
            self::$conexion = new PDO('informix:host=host.docker.internal; service=9088; database=final; server=informix; protocol=onsoctcp;EnableScrollableCursors=1', 'informix', 'in4mix');
            // DEFINIR EL MANEJO DE EXCEPCIONES
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "CONECTADO";
        } catch (PDOException $e) {
            // IMPRIME EN PANTALLA EL ERROR
            echo "Error de conexión de BD";
            echo "<br>";
            echo $e->getMessage();
            exit;
        }

        return self::$conexion;
    }

    public static function ejecutar($sql) {
        // CONECTANDOSE A LA BD CON EL METODO CONECTAR
        $conexion = self::conectar();
        // PREPARAMOS LA SENTENCIA
        $sentencia = $conexion->prepare($sql);
        // EJECUTAMOS A SENTENCIA
        $resultado = $sentencia->execute();
        $id = $conexion->lastInsertId();
        // CERRANDO LA CONEXION
        $conexion = null;
        // DEVOLVEMOS RESULTADOS
        return [
            'resultado' => $resultado,
            'id' => $id
        ];
    }

    public static function servir($sql) {
        // CONECTANDOSE A LA BD CON EL METODO CONECTAR
        $conexion = self::conectar();
        // PREPARAMOS LA SENTENCIA
        $sentencia = $conexion->prepare($sql);
        // EJECUTAMOS A SENTENCIA
        $sentencia->execute();
        $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        // CERRANDO LA CONEXION
        $conexion = null;
        // DEVOLVEMOS RESULTADOS
        return $resultados;
    }
}
?>