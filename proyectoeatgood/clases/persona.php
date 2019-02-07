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
        $sql = "SELECT id, nombre, apellidos, direccion, comunidad, telefono, mail, contraseña FROM usuarios ORDER BY id DESC";

        $conexion = new Bd();
        $res = $conexion->consulta($sql);

        while (list($id, $nombre, $apellidos, $direccion, $comunidad, $telefono, $mail, $contraseña) = mysqli_fetch_array($res)) {
            $fila = new Persona();
            $fila->llenarPersona($id, $nombre, $apellidos, $direccion, $comunidad, $telefono, $mail, $contraseña);
            array_push($this->lista, $fila);
        }
    }

    public function obtenerMenu()
    {
        $sql = "SELECT id, nombre, precio, foto  FROM menu ";
        $conexion = new Bd();
        $res = $conexion->consulta($sql);

        while (list($id, $nombre, $precio, $foto) = mysqli_fetch_array($res)) {
            $fila = new Persona();
            $fila->llenarMenu($id, $nombre, $precio, $foto);
            array_push($this->lista, $fila);
        }
    }

    public function obtenerPlatos()
    {
        $sql = "SELECT id, nombre, precio  FROM platos ";
        $conexion = new Bd();
        $res = $conexion->consulta($sql);

        while (list($id, $nombre, $precio) = mysqli_fetch_array($res)) {
            $fila = new Persona();
            $fila->llenarPlato($id, $nombre, $precio);
            array_push($this->lista, $fila);
        }
    }


    public function imprimirListaGestion()
    {
        $txt = "<table class='table'><thead class='thead-dark'>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Nombre del plato</th>
      <th scope='col'>Precio</th>
      <th scope='col'>Foto</th>
      <th scope='col'>Editar</th>
    </tr>
  </thead>
  <tbody>";
        for ($i = 0; $i < sizeof($this->lista); $i++) {
            $txt .= " <tr><th scope='row'>" . $i . "</th>";
            $txt .= $this->lista[$i]->imprememeGestion();
        }
        $txt .= "  </tbody></table>";

        return $txt;
    }

    public function imprimirListaPlatos()
    {
        $sql = "SELECT sum(precio) as total from platos";
        $conexion = new Bd();
        $res = $conexion->consultaSimple($sql);
        $total = $res['total'];

        $txt = "<table class='table'><thead class='thead-dark'>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Precio</th>
      <th scope='col'>Nombre</th>
    </tr>
  </thead>
  <tbody>";
        for ($i = 0; $i < sizeof($this->lista); $i++) {
            $txt .= " <tr><th scope='row'>" . $i . "</th>";
            $txt .= $this->lista[$i]->imprememeGestionPlato();
        }
        $txt .= "<thead class='thead-dark'> <th scope='col'>Total</th></thead><tr><td>" . $total . " euros</td> </tr>  </tbody></table>";

        return $txt;
    }

}

class Persona
{

    private $id;
    private $nombre;
    private $apellidos;
    private $direccion;
    private $comunidad;
    private $telefono;
    private $mail;
    private $contraseña;
    private $clave;
    private $usuario;
    private $precio;
    private $foto;

    private $platos;
    private $total;

    /**
     * @return mixed
     */
    public function getPlatos()
    {
        return $this->platos;
    }

    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $platos
     */
    public function setPlatos($platos)
    {
        $this->platos = $platos;
    }


    public function getClave()
    {
        return $this->clave;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    public function setContraseña($contraseña)
    {
        $this->contraseña = md5($contraseña);
    }

    public function getContraseña()
    {
        return $this->contraseña;
    }


    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setTel($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getTel()
    {
        return $this->telefono;
    }

    public function setComunidad($comunidad)
    {
        $this->comunidad = $comunidad;
    }

    public function getComunidad()
    {
        return $this->comunidad;
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

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getMail()
    {
        return $this->mail;
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
        $this->id = array();
    }

    public function obtenerPersona($datos, $archivos)
    {

        $this->nombre = addslashes($datos['nombre']);
        $this->apellidos = addslashes($datos['apellidos']);
        $this->direccion = addslashes($datos['direccion']);
        $this->comunidad = addslashes($datos['comunidad']);
        $this->telefono = addslashes($datos['telefono']);
        $this->mail = addslashes($datos['mail']);
        $this->clave = addslashes($datos['clave']);
        if (isset ($datos['id'])) {
            $this->platos = addslashes($datos['id']);
        }

        $this->addTrabajadorBD();

    }


    public static function borrarFotoAjax($id)
    {

        $sql = "SELECT foto FROM menu WHERE id=" . $id;


        $conexion = new Bd();
        $res = $conexion->consultaSimple($sql);

        $ruta = $res['foto'];
        if (!unlink("../" . $ruta)) {
            echo "<script>alert('Error al borrar el Archivo')</script>";

        } else {
            $sql2 = "UPDATE menu SET foto='' WHERE id=" . $id;
            $conexion->consulta($sql2);
        }
    }

    public function obtenerPorId($id)
    {

        $sql = "SELECT id, nombre, apellidos, direccion, comunidad, telefono, mail, clave
        FROM usuarios
        WHERE id=" . $id;


        $conexion = new Bd();

        $res = $conexion->consultaSimple($sql);
        $this->id = $res['id'];
        $this->nombre = $res['nombre'];
        $this->apellidos = $res['apellidos'];
        $this->direccion = $res['direccion'];
        $this->comunidad = $res['comunidad'];
        $this->telefono = $res['telefono'];
        $this->mail = $res['mail'];
        $this->clave = $res['clave'];
    }

    public function obtenerPorIdGestion($id)
    {

        $sql = "SELECT id, nombre, precio, foto FROM menu WHERE id=" . $id;

        $conexion = new bd();

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
        $sql = "INSERT INTO usuarios (nombre, apellidos, direccion, comunidad, telefono, mail,  contraseña, clave)
        VALUES ('" . $this->nombre . "', '" . $this->apellidos . "', '" . $this->direccion . "','" . $this->comunidad . "',
         '" . $this->telefono . "', '" . $this->mail . "','" . $this->clave . "' );";


        $conexion = new Bd();
        $conexion->consulta($sql);
    }


    public function llenarPersona($id, $nombre, $apellidos, $direccion, $comunidad, $telefono, $mail, $clave)
    {

        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->direccion = $direccion;
        $this->comunidad = $comunidad;
        $this->telefono = $telefono;
        $this->mail = $mail;
        $this->clave = $clave;

    }

    public function llenarPlato($id, $nombre, $precio)
    {


        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;


    }

    public function llenarMenu($id, $nombre, $precio, $foto)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->foto = $foto;

    }


    public function imprememeGestion()
    {
        $txt = "";
        $txt .= "</td><td>" . $this->nombre . "</td><td>" . $this->precio . " euros</td><td><img class='miimagen' src='../" . $this->foto .
            "'></td><td><a href='añadirPlato.php?id=" . $this->id . "'>Editar</a></td></tr>";
        return $txt;
    }

    public function imprememeGestionPlato()
    {
        $txt = "";
        $txt .= "</td><td>" . $this->precio . " euros</td><td>" . $this->nombre . "</td></tr>";
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

    public function subirFoto($archivo, $pesoMax = 5000000, $directorio = "img/acabados/")
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
