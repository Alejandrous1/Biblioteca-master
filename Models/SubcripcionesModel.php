<?php
class SubcripcionesModel extends Mysql{
    public function __construct()
    {
        parent::__construct();
    }
    public function selectSubcripciones()
    {
        $sql = "SELECT * FROM membresia";
        $res = $this->select_all($sql);
        return $res;
    }
    public function editSubcripciones(int $id)
    {
        $sql = "SELECT * FROM membresia WHERE id = $id";
        $res = $this->select($sql);
        return $res;
    }


    
    public function actualizarSubcripciones(String $descripcion, int $precio, String $tipo, int $id)
    {
        $this->descripcion = $descripcion;
        $this->precio =$precio;
        $this->tipo =$tipo;
        $this->id =$id;
        $query = "UPDATE membresia SET descripcion = ?, precio = ?,tipo = ? WHERE id = ?";
        $data = array($this->descripcion, $this->precio, $this->tipo, $this->id);
        $this->update($query, $data);
        return true;
    }

    public function estadoSubcripciones(int $estado, int $id)
    {
        $this->estado = $estado;
        $this->id = $id;
        $query = "UPDATE usuario SET estado = ? WHERE id = ?";
        $data = array($this->estado, $this->id);
        $this->update($query, $data);
        return true;
    }

}
?>