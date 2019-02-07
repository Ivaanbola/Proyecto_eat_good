<?php

class Bd {

    private $server = "localhost";
    private $usuario = "root";
    private $pass = "";
    private $basedatos = "eatgood";
    private $conexion;
    private $resultado;

    public function __construct() {

        $this->conexion = new mysqli($this->server, $this->usuario, $this->pass, $this->basedatos);
        $this->conexion->select_db($this->basedatos);
        $this->conexion->query("SET NAMES 'utf8'");
    }

    public function consultaSimple($consulta) {
        $this->resultado =   $this->conexion->query($consulta);

        $res = mysqli_fetch_assoc($this->resultado);

        return $res;
    }

    public function consulta($consulta) {
        // echo $consulta;
        $this->resultado = $this->conexion->query($consulta);
        $res = $this->resultado;
        return $res;
    }

    public function query($sql) {
        $res = $this->conexion->query($sql);
        return $res;
    }

    public function numeroElementos() {

        $num = $this->resultado->num_rows;
        return $num;
    }

    public function numeroElementosConSql($sql) {

        $this->resultado = $this->conexion->query($sql);
        $num = $this->numeroElementos();
        return $num;
    }

    public function nombreDB() {

        return $this->basedatos;
    }

    public function insertarElemento($tabla, $datos, $foto = 0, $directorio = "") {

        $claves = array();
        $valores = array();

        foreach ($datos as $clave => $valor) {
            $claves[] = $clave;
            $valores[] = "'" . $valor . "'";
        }

        if ($foto != 0) {
            $ruta = subirFoto($foto, $directorio);
            $claves[] = "ruta";
            $valores[] = "'" . $ruta . "'";
        }


        $sql = "INSERT " . $tabla . " (" . implode(',', $claves) . ") VALUES  (" . implode(',', $valores) . ")";

        $this->resultado = $this->conexion->query($sql);
        $res = $this->resultado;
        return $res;
    }

    /**



      /**
     * Metodo actualizar con sudida de foto
     * @param type $id
     * @param type $tabla
     * @param type $datos
     * @param type $foto
     * @param type $directorio
     */
    public function uppdateBD($id, $tabla, $datos, $foto = "", $directorio = "") {

        $sentencias = array();

        foreach ($datos as $campo => $valor) {
            if ($campo != "id" && $campo != "x" && $campo != "y") {
                $sentencias[] = $campo . "='" . addslashes($valor) . "'";
            }
        }
        if (strlen($foto['name']) > 0) {
            if (strlen($foto['name']) > 0) {
                borrarFoto($id, $tabla, 'ruta');
                $ruta = subirFoto($foto, $directorio);

                $sentencias[] = "ruta='" . $ruta . "'";
            }
        }
        $campos = implode(",", $sentencias);
        $sql = "UPDATE " . $tabla . " SET " . $campos . " WHERE id=" . $id;
        $conexion = new Bd();
        //echo $sql;
        $conexion->consulta($sql);
    }

    public function uppdateBDfile($id, $tabla, $datos, $file = "", $directorio = "") {

        $sentencias = array();
        foreach ($datos as $campo => $valor) {
            if ($campo != "id" && $campo != "x" && $campo != "y") {
                $sentencias[] = $campo . "='" . addslashes($valor) . "'";
            }
        }
        if (strlen($file['name']) > 0) {
            if (strlen($file['name']) > 0) {
                borrarFoto($id, $tabla, 'pdf');
                $ruta = subirArchivo($file, $directorio);

                $sentencias[] = "pdf='" . $ruta . "'";
            }
        }
        $campos = implode(",", $sentencias);
        $sql = "UPDATE " . $tabla . " SET " . $campos . " WHERE id=" . $id;
        $conexion = new Bd();
        //echo $sql;
        $conexion->consulta($sql);
    }

}

?>
