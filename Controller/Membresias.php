<?php
class Membresias extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
        parent::__construct();
    }
    public function membresias()
    {
        $data = $this->model->selectMembresia();
        $this->views->getView($this, "listar", $data);
    }
    public function registrar()
    {
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $tipo = $_POST['tipo'];
        $insert = $this->model->insertarMembresia($descripcion, $precio, $tipo);
        if ($insert) {
            header("location: " . base_url() . "membresias");
            die();    
        }
    }
    public function editar()
    {
        $id = $_GET['id'];
        $data = $this->model->editMembresia($id);
        if ($data == 0) {
            $this->membresias();
        } else {
            $this->views->getView($this, "editar", $data);
        }
    }
    public function modificar()
    {
        $id = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $tipo = $_POST['tipo'];
        $actualizar = $this->model->actualizarMembresia($descripcion, $precio, $tipo, $id);
        if ($actualizar) {   
            header("location: " . base_url() . "membresias"); 
            die();
        }
    }
    public function eliminar()
    {
        $id = $_POST['id'];
        $this->model->estadoMembresia(0, $id);
        header("location: " . base_url() . "membresias");
        die();
    }
    public function reingresar()
    {
        $id = $_POST['id'];
        $this->model->estadoMembresia(1, $id);
        header("location: " . base_url() . "membresias");
        die();
    }
}
?>