<?php
class ProductosModel extends Mysql{
    protected $id, $nombre,$imagen;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectProducto()
    {
        $sql = "SELECT a.id, a.autor, e.id, e.editorial, m.id, m.materia, l.id, l.titulo, l.cantidad, l.id_autor, l.id_editorial, l.id_materia, l.descripcion, l.imagen, l.estado FROM autor a INNER JOIN editorial e INNER JOIN materia m INNER JOIN libro l ON a.id = l.id_autor AND e.id = l.id_editorial WHERE m.id = l.id_materia";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectMateria()
    {
        $sql = "SELECT * FROM materia";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectEditorial()
    {
        $sql = "SELECT * FROM editorial";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectAutor()
    {
        $sql = "SELECT * FROM autor";
        $res = $this->select_all($sql);
        return $res;
    }
}
