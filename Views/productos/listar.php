<?php encabezado() ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="text-center">Catalago de Libros</h5>
                    <div class="table-responsive">
                        <table class="table table-light mt-4" id="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Titulo</th>
                                    <th>Cant</th>
                                    <th>Autor</th>
                                    <th>Editorial</th>
                                    <th>Materia</th>
                                    <th>Foto</th>
                                    <th>Estado</th>
                                    <th>Descripción</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['productos'] as $producto) {
                                    if ($producto['estado'] == 1) {
                                        $estado = '<span class="badge-success p-1 rounded">Activo</span>';
                                    } else {
                                        $estado = '<span class="badge-danger p-1 rounded">Inactivo</span>';
                                    }
                                ?>
                                    <tr>
                                        <td><?php echo $producto['titulo']; ?></td>
                                        <td><?php echo $producto['cantidad']; ?></td>
                                        <td><?php echo $producto['autor']; ?></td>
                                        <td><?php echo $producto['editorial']; ?></td>
                                        <td><?php echo $producto['materia']; ?></td>
                                        <td><img src="<?php echo base_url() ?>Assets/images/libros/<?php echo $Producto['imagen']; ?>" width="150" class="img-thumbnail"></td>
                                        <td><?php echo $estado ?></td>
                                        <td><?php echo $producto['descripcion']; ?></td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php pie() ?>