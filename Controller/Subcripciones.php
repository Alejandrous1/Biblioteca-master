<?php
class Subcripciones extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
        parent::__construct();
    }
    public function subcripciones()
    {
        $data = $this->model->selectSubcripciones();
        $this->views->getView($this, "listar", $data);
    }
    public function estadoSubcripcion(int $estado, int $id)
    {
        $this->estado = $estado;
        $this->id = $id;
        $query = "UPDATE membresia SET estado = ? WHERE id = ?";
        $data = array($this->estado, $this->id);
        $this->update($query, $data);
        return true;
    }
    public function comprar()
    {
        $id = $_GET['id'];
        $data = $this->model->editSubcripciones($id);
        if ($data == 0) {
            $this->subcripciones();
        } else {
            $this->views->getView($this, "comprar", $data);
        }
    }
    public function modificar()
    {
        $id = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $tipo = $_POST['tipo'];
        $actualizar = $this->model->actualizarSubcripciones($descripcion, $precio, $tipo, $id);
        if ($actualizar) {   
            header("location: " . base_url() . "subcripciones"); 
            die();
        }
    }

    public function eliminar()
    {
        $id = $_POST['id'];
        $this->model->estadoSubcripciones(0, $id);
        header("location: " . base_url() . "subcripciones");
        die();
    }
    public function reingresar()
    {
        $id = $_POST['id'];
        $this->model->estadoSubcripciones(1, $id);
        header("location: " . base_url() . "subcripciones");
        die();
    }
}
?>