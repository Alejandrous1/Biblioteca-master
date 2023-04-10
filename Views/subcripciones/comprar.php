<?php encabezado() ?>
<!-- Begin Page Content -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo base_url(); ?>subcripcion/modificar" method="post" enctype="multipart/form-data" autocomplete="off">
                                <input  type="hidden" id="S_Precio" value="<?php echo $data['precio']; ?>">
                                
                                <div id="paypal-button-container"></div>

                                <!-- Include the PayPal JavaScript SDK -->
                                <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>

                                <script>
                                    var venta= document.getElementById("S_Precio").value; 
                                    console.log(venta);
                                    // Render the PayPal button into #paypal-button-container
                                    paypal.Buttons({

                                        // Set up the transaction
                                        createOrder: function(data, actions) {
                                            return actions.order.create({
                                                purchase_units: [{
                                                    amount: {
                                                        value: venta
                                                    }
                                                }]
                                            });
                                        },

                                        // Finalize the transaction
                                        onApprove: function(data, actions) {
                                            return actions.order.capture().then(function(orderData) {
                                                // Successful capture! For demo purposes:
                                                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                                                var transaction = orderData.purchase_units[0].payments.captures[0];
                                                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                                                // Replace the above to show a success message within this page, e.g.
                                                // const element = document.getElementById('paypal-button-container');
                                                // element.innerHTML = '';
                                                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                                                // Or go to another URL:  actions.redirect('thank_you.html');
                                            });
                                        }


                                    }).render('#paypal-button-container');
                                </script>
                            </form>
                            <form method="post" action="<?php echo base_url(); ?>Usuarios/actualizarS" autocomplete="off">
                                <?php $_SESSION['id']; ?> 
                                <?php $_SESSION['membresiaEstado']; ?>                                 

                                <div class="modal-body">
                                <input id="id" hidden name="id" value="<?php echo $_SESSION['id']; ?>">
                                        <div class="col-lg-6">
                                            <select id="membresiaEstado" class="form-control" name="membresiaEstado" hidden>
                                                <option selected value="1" <?php if ($_SESSION['membresiaEstado'] == "1") {
                                                                                    echo "selected";
                                                                                } ?>></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary btn-block" type="submit">Aceptar</button>
                                    <a class="btn btn-secondary btn-block" href="<?php echo base_url();?>subcripciones">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php pie() ?>