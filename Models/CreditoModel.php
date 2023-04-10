<?php
class CreditoModel extends Mysql{
    public function __construct()
    {
        parent::__construct();
    }
    public function selectLibros()
    {
        $sql = "SELECT * FROM libro WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectLibrosCantidad(int $id)
    {
        $sql = "SELECT * FROM libro WHERE id = $id";
        $res = $this->select($sql);
        return $res;
    }
    public function selectUsuarios()
    {
        $sql = "SELECT * FROM usuarios WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectPrestamoCantidad()
    {
        $sql = "SELECT * FROM prestamo WHERE estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function selectPrestamo()
    {
        $userId = $_SESSION['id'];
        $sql = "SELECT u.id, u.nombre, l.id, l.titulo, p.id, p.id_usuario, p.id_libro, p.fecha_prestamo, p.fecha_devolucion, p.cantidad, p.observacion, p.estado FROM usuarios u INNER JOIN libro l INNER JOIN prestamo p ON u.id =p.id_usuario WHERE p.id_libro = l.id AND $userId = p.id_usuario";
        $res = $this->select_all($sql);
        return $res;


        /*$userId = $_SESSION['id'];
        $sql="SELECT u.id, u.nombre, l.id, l.titulo, p.id, p.id_usuario, p.id_libro, p.fecha_prestamo, p.fecha_devolucion, p.cantidad, p.observacion, p.estado FROM usuarios u INNER JOIN libro l ON u.id = l.id INNER JOIN prestamo p ON p.id_usuario = u.id WHERE p.id_usuario = '$userId'";

        //$sql = "SELECT u.id, u.nombre, l.id, l.titulo, p.id, p.id_usuario, p.id_libro, p.fecha_prestamo, p.fecha_devolucion, p.cantidad, p.observacion, p.estado FROM usuarios u INNER JOIN libro l INNER JOIN prestamo p ON p.id_usuario = u.id WHERE p.id_libro = l.id";
        $res = $this->select_all($sql);*/
        return $res;
    }
    public function insertarPrestamo(int $usuarios, int $libro,  String $fecha_prestamo, String $fecha_devolucion,int $cantidad, String $observacion)
    {
        $this->libro = $libro;
        $this->usuarios = $usuarios;
        $this->cantidad = $cantidad;
        $this->fecha_prestamo = $fecha_prestamo;
        $this->fecha_devolucion = $fecha_devolucion;
        $this->observacion = $observacion;
        $query = "INSERT INTO prestamo(id_usuario, id_libro, fecha_prestamo, fecha_devolucion, cantidad ,observacion) VALUES (?,?,?,?,?,?)";
        $data = array($this->usuarios, $this->libro, $this->fecha_prestamo, $this->fecha_devolucion, $this->cantidad, $this->observacion);
        $this->insert($query, $data);
        return true;
    }
    public function estadoPrestamo(String $obser, int $estado, int $id)
    {
        $this->obser = $obser;
        $this->estado = $estado;
        $this->id = $id;
        $query = "UPDATE prestamo SET observacion = ?, estado = ? WHERE id = ?";
        $data = array($this->obser, $this->estado, $this->id);
        $this->update($query, $data);
        return true;
    }
    public function actualizarCantidad(String $cantidad, int $id)
    {
        $this->cantidad = $cantidad;
        $this->id = $id;
        $query = "UPDATE libro SET cantidad = ? WHERE id = ?";
        $data = array($this->cantidad, $this->id);
        $this->update($query, $data);
        return true;
    }
    public function selectDatos()
    {
        $sql = "SELECT * FROM configuracion";
        $res = $this->select($sql);
        return $res;
    }
    public function selectPrestamoDebe()
    {
        $userId = $_SESSION['id'];
        $sql = "SELECT u.id, u.nombre, l.id, l.titulo, p.id, p.id_usuario, p.id_libro, p.fecha_prestamo, p.fecha_devolucion, p.cantidad, p.observacion, p.estado FROM usuarios u INNER JOIN libro l ON u.id = l.id INNER JOIN prestamo p ON p.id_usuario = u.id WHERE p.id_usuario = '$userId' AND p.estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
}
