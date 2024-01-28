<main class="container">
    <script>
        function eliminar(id) {

            if (confirm('Eliminar ' + id + '?')) {
                /*
                                $.ajax({
                                    type: "POST",
                                    url: '#',
                                    data: {
                                        "#": id

                                    },
                                    success: function(data) {

                                        $("#").load(" #");
                                        alert(data.msg);
                                        //location.reload();

                                    }
                                });
                */
            }
        }
    </script>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <div class="card">
                            <div class="container">
                                <center>
                                    <h3><span class=" text-dark">Usuarios</span></h3>
                                </center><br />
                                <div class="box-body" id="usuarios">
                                    <?php if (count($data) > 0) {

                                    ?>

                                        <!-- ................. FORMULARIO DE BUSQUEDA ................. -->
                                        <form id="miForm" action="users" method="GET">
                                            <div class="form-group row">
                                                <div class="col-xs-10">
                                                    <input type="text" class="form-control" name="busq" placeholder="Busqueda..." autocomplete="off">&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                                <div class="col-xs-1">
                                                    <input type="submit" class="btn btn-default" />&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                                <div class="col-xs-1">
                                                    <button type="button" class="btn btn-default" style="text-align: right;" onclick="Cancelar()"><span class="nav-icon fa fa-close">X</span></button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- ................... FIN DE FORMULARIO .................... -->
                                        <div class=" table-responsive p-0">
                                            <table class="display table table-hover">
                                                <thead class="tbencabezado">
                                                    <tr>
                                                        <th>
                                                            <center><strong>No</strong></center>
                                                        </th>
                                                        <th>
                                                            <center><strong>Id</strong></center>
                                                        </th>
                                                        <th>
                                                            <center><strong>Nombre</strong></center>
                                                        </th>
                                                        <th>
                                                            <center><strong>Correo</strong></center>
                                                        </th>
                                                        <th>
                                                            <center><strong>Estatus</strong></center>
                                                        </th>
                                                        <th>
                                                            <center><strong>Ver</strong></center>
                                                        </th>
                                                        <th>
                                                            <center><strong>Editar</strong></center>
                                                        </th>
                                                        <th>
                                                            <center><strong>Eliminar</strong></center>
                                                        </th>

                                                    </tr>
                                                </thead>

                                                <?php
                                                $c = 1;
                                                foreach ($data as $sql) {
                                                ?>
                                                    <tbody class="texto" id="myTable">
                                                        <tr>
                                                            <td>
                                                                <center><?= $c++ ?></center>
                                                            </td>
                                                            <td>
                                                                <center><?= $sql->id ?></center>
                                                            </td>
                                                            <td>
                                                                <center><?= $sql->nombre . " " . $sql->apellido_m . " " . $sql->apellido_m ?></center>
                                                            </td>
                                                            <td>
                                                                <center><?= $sql->correo ?></center>
                                                            </td>
                                                            <td>
                                                                <center><?= $sql->estatus ?></center>
                                                            </td>
                                                            <td>
                                                                <center><a href="<?php echo base_url('infouser/' . $sql->id); ?>"><i class="nav-icon fa fa-eye text-info"></i></a>
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <center><a href="<?php echo base_url('editouser/' . $sql->id); ?>"><i class="nav-icon fa fa-pencil text-info">X</i></a>
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <center><i class="nav-icon fa fa-trash" onclick="eliminar('<?= $sql->id ?>')" style="cursor: pointer;"></i></center>
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                <?php }
                                                ?>
                                            </table>

                                        </div>
                                    <?php

                                    } else {
                                    ?>
                                        <form id="miForm" action="#" method="GET">
                                            <div class="form-group row">
                                                <div class="col-xs-10">
                                                    <input type="text" class="form-control" name="busq" placeholder="Busqueda..." autocomplete="off">&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                                <div class="col-xs-1">
                                                    <input type="submit" class="btn btn-default" />&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                                <div class="col-xs-1">
                                                    <button type="button" class="btn btn-default" style="text-align: right;" onclick="Cancelar()"><span class="nav-icon fa fa-close"></span></button>
                                                </div>
                                            </div>
                                        </form>
                                        <br />
                                        <div><label style='color:#FA206A'>...No se ha encontrado ningun
                                                Usuario...</label> </div>

                                    <?php } //fin de else 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</main>