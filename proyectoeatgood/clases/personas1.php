<?php

class ListaPersonas
{

    private $lista;

    public function __construct()
    {
        $this->lista = array();
    }

    public function obtenerPersonas()
    {

        $sql = "SELECT id, nombre, apellidos, telefono FROM usuarios ORDER BY id DESC";

        $conexion = new Bd();
        $res = $conexion->consulta($sql);

        while (list($id, $nombre, $apellidos, $telefono) = mysqli_fetch_array($res)) {

            $fila = new Persona1();
            $fila->llenarPersona($id, $nombre, $apellidos, $telefono);
            array_push($this->lista, $fila);
        }
    }



    public function imprimirLista()
    {

        $txt = "<table border=1>";

        for ($i = 0; $i < sizeof($this->lista); $i++) {

            $txt .= $this->lista[$i]->imprememe();
        }

        $txt .= "</table>";

        return $txt;
    }

    public function imprimirListaGestion()
    {
        $txt = "<table border=1>";
        $txt .= "<tr><td>Nombre del plato </td><td> Precio </td><td>Foto</td></tr>";
        for ($i = 0; $i < sizeof($this->lista); $i++) {
            $txt .= $this->lista[$i]->imprememeGestion();
        }
        $txt .= "</table>";

        return $txt;
    }

}

class Personas1
{

    private $id;
    private $nombre;
    private $apellidos;
    private $telefono;
    

  
    public function setTel($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getTel()
    {
        return $this->telefono;
    }

  
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setId($id)
    {

        $id = intval($id);
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function __construct()
    {

    }

    /**
     * Version para novatos, que se alarga mucho, y realmente no se
     * utiliza en PHP, pero para seguir la estructura POO y que sea como
     * habeis visto en JAVA.
     * @param $datos
     * @param $archivos
     */
    public function obtenerPersona($datos, $archivos)
    {

        $this->nombre = addslashes($datos['nombre']);
        $this->apellidos = addslashes($datos['apellidos']);
        $this->telefono = addslashes($datos['telefono']);


        // vamos a insertar los elementos de texto en la BD, luego nos
        //ocuparemos de los archivos (ok, Felipe)


        $this->addTrabajadorBD();
    }

    public function upPersona($datos, $archivo)
    {

        //$sql = "UPDATE persona SET nombre='".$nombre."'.......... WHERE id=".intval($datos['id'])

        $conexion = new Bd();
        $conexion->uppdateBD(intval($datos['id']), 'usuarios', $datos);
    }

    public function obtenerPorId($id)
    {

        $sql = "SELECT id, nombre, apellidos, telefono
        FROM usuarios
        WHERE id=" . $id;


        $conexion = new Bd();

        $res = $conexion->consultaSimple($sql);
        $this->id = $res['id'];
        $this->nombre = $res['nombre'];
        $this->apellidos = $res['apellidos'];
        $this->telefono = $res['telefono'];

    }

    public function obtenerPorIdGestion($id)
    {

        $sql = "SELECT id, nombre, precio, foto
        FROM menu
        WHERE id=" . $id;


        $conexion = new Bd();

        $res = $conexion->consultaSimple($sql);
        $this->id = $res['id'];
        $this->nombre = $res['nombre'];
        $this->precio = $res['precio'];
        $this->foto = $res['foto'];
    }

    /**
     * sigo con el modo novato
     */
    private function addTrabajadorBD()
    {
        $sql = "INSERT INTO usuarios (nombre, apellidos, telefono)
        VALUES ('" . $this->nombre . "', '" . $this->apellidos . "','" . $this->telefono . "' );";


        $conexion = new Bd  ();
        $conexion->consulta($sql);
    }

    public function llenarPersona($id, $nombre, $apellidos, $telefono)
    {

        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;


    }

    public function llenarMenu($id, $nombre, $precio, $foto)
    {

        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->foto = $foto;

    }


    public function imprememeGestion()
    {
        $txt="";
        $txt .= "<tr><td>" . $this->nombre .
            "</td><td>" . $this->precio . "</td><td><img src='" . $this->foto .
            "'></td><td><a href='añadirPlato.php?id=" . $this->id . "'>Editar</a></td></tr>";
        return $txt;
    }


    public function imprememe()
    {
        $txt = "<tr><td>" . $this->id . "</td><td>" . $this->nombre .
            "</td><td>" . $this->apellidos . "</td><td>" . $this->localidad .
            "</td><td>" . $this->mail . "</td><td><a href='altas.php?id=" . $this->id . "'>Editar</a></td></tr>";
        return $txt;
    }

    public static function login($datos)
    {
        $ok = false;
        $sql = "SELECT id FROM login WHERE usuario='" . addslashes($datos['usuario']) . "' AND contraseña='" . md5($datos['contraseña']) . "';";

        $conexion = new bd();
        $res = $conexion->consultaSimple($sql);

        if ($conexion->numeroElementos() > 0) {
            session_start();
            $_SESSION['id_usuario'] = $res['id'];
            $ok = true;
        }
        return $ok;

    }


    public function uppPlato($datos, $archivo)
    {
        $txtfoto = "";
        if ($archivo['foto']['name'] != "") {
            $this->setFoto($archivo['foto']);
            $txtfoto = ", foto='" . $this->foto . "' ";
        }
        $sql = "UPDATE menu SET nombre='" . $datos['nombre'] . "', precio='" . $datos['precio'] . $txtfoto
            . "' WHERE id='" . $datos['id'] . "';";
        $conexion = new bd();
        $conexion->consulta($sql);
    }

    public function subirFoto($archivo, $pesoMax = 5000000, $directorio = "imagenes/")
    {
        $ruta = "";
        $tipo = $archivo['type'];
        $tamano = $archivo['size'];
        $nombreArchivo = $this->limpiaString($archivo['name']);
        $nombreArchivo = $this->quitarExtension($nombreArchivo, ".");
        if ((strpos($tipo, 'jpeg') || strpos($tipo, 'png')) && $tamano < $pesoMax) {
            $idUnico = time();
            if (strpos($tipo, 'jpeg')) {
                $extension = '.jpg';
            } else {
                $extension = '.png';
            }
            $nombre_fichero = $directorio . $nombreArchivo . $extension;
            if (file_exists($directorio . $nombreArchivo . ".jpg") || file_exists($directorio . $nombreArchivo . ".png")) {
                $nombre_fichero = $directorio . $nombreArchivo . $idUnico . $extension;
            }
            if (move_uploaded_file($archivo['tmp_name'], $nombre_fichero)) {
                $ruta = $nombre_fichero;
            } else {
                echo "<script>alert('Error al subir el archivo al servidor')</script>";
                $ruta = -1;
            }
        } else {
            echo "<script>alert('La foto debe tener una extensiÃƒÂ³n del tipo: jpg o png')</script>";
            $ruta = -1;
        }
        return $ruta;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        if ($foto['name'] != "") {
            $this->foto = $this->subirFoto($foto);
        }
    }


    public function creaObj($datos, $foto)
    {
        $this->setNombre($datos['nombre']);
        $this->setFoto($foto['foto']);
        $this->setPrecio($datos['precio']);
        $this->addMenu();

    }

    private function addMenu()
    {
        $sql = "INSERT INTO menu(nombre,precio,foto) 
            VALUES ('" . $this->nombre . "','" . $this->precio . "','" .
            $this->foto . "')";
        $conexion = new bd();
        $conexion->consulta($sql);

    }

    private function quitarExtension($cadena, $caracter)
    {
// localicamos en que posiciÃƒÂ³n se haya la $subcadena, en nuestro caso la posicion es "7"
        $posicionsubcadena = strrpos($cadena, $caracter);
// eliminamos los caracteres desde $subcadena hacia la izq, y le sumamos 1 para borrar tambien el @ en este caso
        $nombre = substr($cadena, 0, ($posicionsubcadena));
        return $nombre;
    }

    public function borrarFoto($id)
    {
        $sql = "SELECT foto FROM menu WHERE id=" . $id;

        $conexion = new bd();
        $res = $conexion->consultaSimple($sql);
        $ruta = $res['foto'];

        if (!unlink($ruta)) {
            echo "<script> alert('Error al borrar el Archivo,');</script>";
        }
    }

    private function limpiaString($archivo)
    {
        $archivo = str_replace("[áàâãªä@]", "a", $archivo);
        $archivo = str_replace("[ÁÀÂÃÄ]", "A", $archivo);
        $archivo = str_replace("[éèêë]", "e", $archivo);
        $archivo = str_replace("[ÉÈÊË]", "E", $archivo);
        $archivo = str_replace("[íìîï]", "i", $archivo);
        $archivo = str_replace("[ÍÌÎÏ]", "I", $archivo);
        $archivo = str_replace("[óòôõºö]", "o", $archivo);
        $archivo = str_replace("[ÓÒÔÕÖ]", "O", $archivo);
        $archivo = str_replace("[úùûü]", "u", $archivo);
        $archivo = str_replace("[ÚÙÛÜ]", "U", $archivo);
        $archivo = str_replace("[¿?\]", "_", $archivo);
        $archivo = str_replace(" ", "_", $archivo);
        $archivo = str_replace("ñ", "n", $archivo);
        $archivo = str_replace("Ñ", "N", $archivo);
//para ampliar los caracteres a reemplazar agregar lineas de este tipo:
//$archivo = str_replace("caracter-que-queremos-cambiar","caracter-por-el-cual-lo-vamos-a-cambiar",$archivo);
        return $archivo;
    }

}
