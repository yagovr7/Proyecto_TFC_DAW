<?php

class Conexion extends PDO
{
    private $host = 'localhost';
    private $user = 'root';
    private $passwd = '';
    private $BBDD = 'tracker';

    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->BBDD;charset=utf8";
        parent::__construct($dsn, $this->user, $this->passwd);
    }

    function loginCorrecto($correo, $password)
    {
        try {
            $query_combinada = "SELECT * FROM usuarios WHERE correo=:correo";

            $stmt = $this->prepare($query_combinada);
            $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);

            $stmt->execute();
            $objectUsuario = $stmt->fetch(PDO::FETCH_OBJ);
            if ($objectUsuario && password_verify($password, $objectUsuario->password)) {
                return $objectUsuario;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    function ver_Proyecto($cod_Proyecto)
    {
        $sql = 'SELECT * FROM proyectos WHERE cod_Proyecto = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $cod_Proyecto, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

    function descripcionProyecto($id_Alumno)
    {
        $sql = 'SELECT * FROM descripcion WHERE id_Alumno = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $id_Alumno, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    function subirDescripcion($id_Alumno, $titulo, $descripcion)
    {
        $sql = 'INSERT INTO `descripcion` (`id_Alumno`,`titulo`,`descripcion`) VALUES (?, ?, ?);';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $id_Alumno, PDO::PARAM_INT);
        $stmt->bindParam(2, $titulo, PDO::PARAM_STR);
        $stmt->bindParam(3, $descripcion, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function modificarDescripcion($id_Alumno, $titulo, $descripcion)
    {
        $sql = 'UPDATE descripcion SET titulo = ?, descripcion = ? WHERE id_Alumno = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $titulo, PDO::PARAM_STR);
        $stmt->bindParam(2, $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(3, $id_Alumno, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    function eliminarDescripcion($id_Alumno)
    {
        $sql = 'DELETE FROM descripcion WHERE id_Alumno = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $id_Alumno, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function verObjetivos($id_Alumno)
    {
        $sql = 'SELECT * FROM objetivos WHERE id_Alumno = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $id_Alumno, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

    function subirObjetivo($objetivo, $id_Alumno)
    {
        $sql = 'INSERT INTO `objetivos` (`descripcion`,`id_Alumno`) VALUES (?, ?);';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $objetivo, PDO::PARAM_STR);
        $stmt->bindParam(2, $id_Alumno, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminarObjetivo($cod_Objetivo)
    {
        $sql = 'DELETE FROM objetivos WHERE cod_Objetivo = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $cod_Objetivo, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function subirER($id_Alumno, $img)
    {
        $sql = 'INSERT INTO `er` (`id_Alumno`,`imagen`) VALUES (?, ?);';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $id_Alumno, PDO::PARAM_INT);
        $stmt->bindParam(2, $img, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function verER($id_Alumno)
    {
        $sql = 'SELECT * FROM er WHERE id_Alumno = ?;';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $id_Alumno, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }

    function eliminarER($id_Alumno)
    {
        $sql = 'DELETE FROM er WHERE id_Alumno = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $id_Alumno, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function verRecursosH($id_Alumno)
    {
        $sql = 'SELECT * FROM recursosh WHERE id_Alumno = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $id_Alumno, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

    function subirRecursosH($descripcion, $precio, $id_Alumno)
    {
        $sql = 'INSERT INTO `recursosh` (`descripcion`, `precio`, `id_Alumno`) VALUES (?, ?, ?);';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(2, $precio, PDO::PARAM_INT);
        $stmt->bindParam(3, $id_Alumno, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminarRecursosH($cod_Recurso)
    {
        $sql = 'DELETE FROM recursosh WHERE cod_Recurso = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $cod_Recurso, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function verRecursosM($id_Alumno)
    {
        $sql = 'SELECT * FROM recursosm WHERE id_Alumno = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $id_Alumno, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

    function subirRecursosM($descripcion, $precio, $id_Alumno)
    {
        $sql = 'INSERT INTO `recursosm` (`descripcion`, `precio`, `id_Alumno`) VALUES (?, ?, ?);';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(2, $precio, PDO::PARAM_INT);
        $stmt->bindParam(3, $id_Alumno, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminarRecursosM($cod_Recurso)
    {
        $sql = 'DELETE FROM recursosm WHERE cod_Recurso = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $cod_Recurso, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function verTecnologias($id_Alumno)
    {
        $sql = 'SELECT * FROM tecnologias WHERE id_Alumno = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $id_Alumno, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

    function subirTecnologias($nombre, $descripcion, $enlace, $id_Alumno)
    {
        $sql = 'INSERT INTO `tecnologias` (`nombre`, `descripcion`, `enlace`, `id_Alumno`) VALUES (?, ?, ?, ?);';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
        $stmt->bindParam(2, $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(3, $enlace, PDO::PARAM_STR);
        $stmt->bindParam(4, $id_Alumno, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminarTecnologias($cod_Tecnologia)
    {
        $sql = 'DELETE FROM tecnologias WHERE cod_Tecnologia = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $cod_Tecnologia, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function verAlumnos($id_Profesor)
    {
        $sql = 'SELECT * FROM usuarios WHERE id_Profesor = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $id_Profesor, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

    function verUsuarios()
    {
        $sql = 'SELECT nombre, apellidos, correo, tipo_Usuario FROM usuarios';
        $stmt = $this->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

    function verCasosDeUso($id_Alumno)
    {
        $sql = 'SELECT * FROM casosdeuso WHERE id_Alumno = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $id_Alumno, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

    function subirCasoDeUso($uso, $descripcion, $tiempo, $id_Alumno)
    {
        $sql = 'INSERT INTO `casosdeuso` (`uso`, `descripcion`, `tiempo`, `id_Alumno`) VALUES (?, ?, ?, ?);';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $uso, PDO::PARAM_STR);
        $stmt->bindParam(2, $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(3, $tiempo, PDO::PARAM_INT);
        $stmt->bindParam(4, $id_Alumno, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function eliminarCasoDeUso($cod_Caso)
    {
        $sql = 'DELETE FROM casosdeuso WHERE cod_Caso = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $cod_Caso, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function AllUsers()
    {
        $sql = "SELECT id, nombre, apellidos, correo, password, tipo_Usuario , id_Profesor FROM usuarios WHERE NOT tipo_Usuario = 'admin'";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt -> fetchAll(PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }

    function Profesores()
    {
        $sql = "SELECT id, nombre, apellidos FROM usuarios WHERE tipo_Usuario = 'profesor'";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt -> fetchAll(PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }

    function newUser( $correo, $password, $password2, $nombre, $apellidos, $id_Profesor, $tipo_Usuario){
        try {
            $sql = "INSERT INTO `usuarios` (`correo`, `password`, `nombre`, `apellidos`, `id_Profesor`, `tipo_Usuario`) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->prepare($sql);
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bindParam(1, $correo, PDO::PARAM_STR);
            $stmt->bindParam(2, $hash, PDO::PARAM_STR);
            $stmt->bindParam(3, $nombre, PDO::PARAM_STR);
            $stmt->bindParam(4, $apellidos, PDO::PARAM_STR);
            $stmt->bindParam(5, $id_Profesor, PDO::PARAM_INT);
            $stmt->bindParam(6, $tipo_Usuario, PDO::PARAM_STR);
            $stmt -> execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    function eliminarUsuario($id)
    {
        $sql = 'DELETE FROM usuarios WHERE id = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function updateName($nombre, $apellidos, $id)
    {
        $sql = 'UPDATE usuarios SET nombre = ?, apellidos = ? WHERE id = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
        $stmt->bindParam(2, $apellidos, PDO::PARAM_STR);
        $stmt->bindParam(3, $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function updateEmail($email, $id)
    {
        $sql = 'UPDATE usuarios SET correo = ? WHERE id = ?';
        $stmt = $this->prepare($sql);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function updatePassword($password, $id)
    {
        $sql = 'UPDATE usuarios SET password = ? WHERE id = ?';
        $stmt = $this->prepare($sql);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(1, $hash, PDO::PARAM_STR);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
