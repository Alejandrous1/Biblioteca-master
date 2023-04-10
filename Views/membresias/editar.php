<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo base_url(); ?>membresias/modificar" method="post" enctype="multipart/form-data" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="descripcion">Descripción</label>
                                                <textarea id="descripcion" class="form-control" name="descripcion" rows="2"><?php echo $data['descripcion']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="precio">Precio</label>
                                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                            <input id="precio" class="form-control" type="text" name="precio" value="<?php echo $data['precio'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tipo">Tipo</label>
                                            <input id="tipo" class="form-control" type="text" name="tipo" value="<?php echo $data['tipo']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Modificar</button>
                                            <a class="btn btn-danger" href="<?php echo base_url(); ?>membresias">Atras</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php pie() ?>