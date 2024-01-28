<main class="container">
    <script language="JavaScript">
        function Confirmar() {

            if ($('#nombre').val().length != "" && $('#apellido_p').val().length != "" && $('#apellido_m').val().length != "" &&
                $('#sexo option:selected').val().length != "" && $("#correo").val() != "" && $("#telefono").val() != "" &&
                $('#cp').val().length != 0 && $('#colonia').val().length != "" && $('#municipio').val().length != "" &&
                $('#estado').val().length != "" && $('#permiso').val().length != "" ) {
                // alert("ok");
                document.altaformulario.submit()

            } else {
                alert('Faltan datos por llenar..!!');
            }
        }

        function Cancelar() {
            if (confirm('Se perderan los datos, Estas seguro de continuar?')) {
                window.location.href = "users";
            }

            /*
                        function cp(cp) {
                            $.ajax({
                                type: "POST",
                                url: 'cp',
                                data: {
                                    "cp": cp,
                                },
                                success: function(data) {
                                    var myResponse = data.num;
                                    alert(myResponse);
                                    
                                },


                            });
                        }
            */
        }
    </script>
    <form name="altaformulario" action="<?php echo base_url('Welcome/createuser'); ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
        <center>
            <h3 style="color:#0099FF">
                <span class="text-dark"> NUEVO
                    Usuario</span>
            </h3>
           
        </center>
        <div class="row">
            <div class="col-12">
                <center>
                    <br>
                    <div class="form-group row">
                        <label for="nombre" class="col-2 col-form-label" style="text-align: left">Nombre</label>
                        <div class="col-3">
                            <input type="text" class="form-control" value="" name="nombre" id="nombre" autocomplete="off" require>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="apellido_p" class="col-2 col-form-label" style="text-align: left">Apellido Paterno</label>
                        <div class="col-3">
                            <input type="text" class="form-control" value="" name="apellido_p" id="apellido_p" autocomplete="off" require>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellido_m" class="col-2 col-form-label" style="text-align: left">Apellido Materno</label>
                        <div class="col-3">
                            <input type="text" class="form-control" value="" name="apellido_m" id="apellido_m" autocomplete="off" require>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="sexo" class="col-2 col-form-label" style="text-align: left">Sexo</label>
                        <div class="col-3">
                            <select id="sexo" name="sexo" class="form-control">
                                <option value="">Seleccionar...</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="correo" class="col-2 col-form-label" style="text-align: left">Correo</label>
                        <div class="col-3">
                            <input type="email" class="form-control" value="" name="correo" id="correo" autocomplete="off" require>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="telefono" class="col-2 col-form-label" style="text-align: left">Telefono</label>
                        <div class="col-3">
                            <input type="text" class="form-control" value="" name="telefono" id="telefono" autocomplete="off" require>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cp" class="col-2 col-form-label" style="text-align: left">Codigo Postal</label>
                        <div class="col-3">
                            <input type="text" class="form-control" value="" name="cp" id="cp" autocomplete="off" require>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="colonia" class="col-2 col-form-label" style="text-align: left">Colonia</label>
                        <div class="col-3">
                            <input type="text" class="form-control" value="" name="colonia" id="colonia" autocomplete="off" require>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="municipio" class="col-2 col-form-label" style="text-align: left">Municipio</label>
                        <div class="col-3">
                            <input type="text" class="form-control" value="" name="municipio" id="municipio" autocomplete="off" require>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="estado" class="col-2 col-form-label" style="text-align: left">Estado</label>
                        <div class="col-3">
                            <input type="text" class="form-control" value="" name="estado" id="estado" autocomplete="off" require>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="permiso" class="col-2 col-form-label" style="text-align: left">Tipo de Usuario</label>
                        <div class="col-3">
                            <select id="permiso" name="permiso" class="form-control">
                                <option value="">Seleccionar...</option>
                                <option value="Administrativos">Administrativos</option>
                                <option value="Administrativos-Operativos">Administrativos-Operativos</option>
                                <option value="Operativos">Operativos</option>
                            </select>
                        </div>
                    </div>
                </center>
                <center>
                    <button type="button" class="btn btn-primary" onclick="Confirmar()">Guardar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-danger" onclick="Cancelar()">Cancelar</button>
                </center>

            </div>
        </div>
    </form>

</main>