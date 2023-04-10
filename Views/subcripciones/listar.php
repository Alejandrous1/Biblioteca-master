<?php encabezado() ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h5 class="text-center">Subcripciones Disponibles</h5>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-light mt-4" id="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Tipo</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $subcripcion) {
                                    if ($subcripcion['estado'] == 1) {
                                        $estado = '<span class="badge-success p-1 rounded">Activo</span>';
                                    } else {
                                        $estado = '<span class="badge-danger p-1 rounded">Inactivo</span>';
                                    }
                                ?>
                                    <tr>
                                        <td><?php echo $subcripcion['descripcion']; ?></td>
                                        <td><?php echo $subcripcion['precio']; ?></td>
                                        <td><?php echo $subcripcion['tipo']; ?></td>
                                        <td><?php echo $estado; ?></td>
                                        <td>
                                            <a class="btn btn-secondary btn-block" href="<?php echo base_url() ?>subcripciones/comprar?id=<?php echo $subcripcion['id'] ?>">Comprar</a>
                                        </td>
                                        <!-- <td><button class="btn btn-secondary btn-block" type="button" data-toggle="modal" data-target="#comprarSub">Comprar</button></td> -->
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