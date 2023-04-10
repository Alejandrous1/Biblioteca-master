<?php
    class Productos extends Controllers{
        public function __construct()
        {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
            parent::__construct();

        }
        public function productos()
        {
            $producto = $this->model->selectProducto();
            $materias = $this->model->selectMateria();
            $editorial = $this->model->selectEditorial();
            $autor = $this->model->selectAutor();
            $data = ['productos' => $producto, 'materias' => $materias, 'editoriales' => $editorial, 'autores' => $autor];
            $this->views->getView($this, "listar", $data);
        }
        
}
