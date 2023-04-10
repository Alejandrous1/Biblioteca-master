<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/styles.css" id="theme-stylesheet">
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <?php if (isset($_GET['msg'])) { ?>
                <div class="toast ml-auto" id="errorPass" data-delay="3000" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="<?php echo base_url(); ?>Assets/img/error.png" class="rounded mr-2" width="20">
                        <strong class="mr-auto">Alerta</strong>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        Usuario o contraseña incorrecta
                    </div>
                </div>
            <?php } ?>
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card border-0 rounded-lg mt-5 sb-sidenav-dark">
                                <div class="card-header text-center ">
                                    <h3 class="font-weight my-4">Login</h3>
                                    <img class="img-thumbnail" src="<?php echo base_url(); ?>Assets/img/logo.jpg" width="150">
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url(); ?>Usuarios/login" method="post" autocomplete="off">
                                        <div class="form-group">
                                            <strong class="text-white">Usuario</strong>
                                            <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario">
                                        </div>
                                        <div class="form-group">
                                            <strong class="text-white">Contraseña</strong>
                                            <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña">
                                        </div>
                                        <button class="btn btn-primary btn-block" type="submit">Iniciar</button>
                                        
                                        <button class="btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#nuevo_user">Nuevo</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <div id="nuevo_user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-white" id="my-modal-title">Nuevo Usuario</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?php echo base_url(); ?>Usuarios/insertar" autocomplete="off">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input id="correo" class="form-control" type="text" name="correo" placeholder="Correo">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="usuario">Usuario</label>
                                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="clave">Contraseña</label>
                                        <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="rol">Rol</label>
                                    <select id="rol" class="form-control" name="rol">
                                        <option value="2" selected>Cliente</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Registrar</button>
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Sistema Biblioteca</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>Assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>Assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>Assets/js/scripts.js"></script>
    <script>
        $(document).ready(function() {
            $('#errorPass').toast('show');
        });
    </script>
</body>

</html>