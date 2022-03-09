<div class="row">
    <div class="col-md-9">

        <div class="row">
            <?php
            $this->load->view("admin/components/card-headers", ["items" => $trabajos_por_epoca]);
            ?>
        </div>
    </div>
    <div class="col-md-3">
        <div class="d-flex justify-content-end">
            <button class="btn btn-warning " type="button" data-toggle="modal" data-target="#consulta_reportes_modal"><i class="fas fa-briefcase"></i> Consulta</button>
        </div>
    </div>
</div>

<?php $this->load->view("admin/components/alert"); ?>
<div class="card">
    <div class="card-header">
        <div class="d-flex flex-column flex-sm-row justify-content-between">
            <h3 class="card-title">Trabajos registrados</h3>
            <div class="mt-3 mt-sm-0">
                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#nueva_pagina_trab">Nueva Pagina</button>
                <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#create_tarea">Nuevo Trabajo</button>
            </div>
        </div>
    </div>


    <!-- /.card-header -->
    <div class="card-body">
        <div class="mb-3">

        </div>
        <form action="<?php echo site_url("admin/trabajos/enviado/update") ?>" method="POST">
            <table id="example1" class="table table-bordered table-striped  table-valign-middle table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <!-- <th>Url</th> -->
                        <th>Envio</th>
                        <th>Fecha</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody id="insert_trabajos">
                    <!-- <?php foreach ($trabajos as $trabajo) : ?>

                        <tr id="<?php echo "trabajo-" . $trabajo->id ?>">
                            <td>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" value="1" name="enviado[<?php echo $trabajo->id ?>]" id="checkboxDanger<?php echo $trabajo->id ?>]">
                                        <label for="checkboxDanger<?php echo $trabajo->id ?>]">
                                        </label>
                                    </div>
                     
                                </div>
                                <!-- <input type="checkbox" > -->
                            </td>
                            <td><?php echo $trabajo->id ?></td>
                            <td><?php echo $trabajo->nombre ?></td>
                            <td>
                                <div class="input-group mb-0">
                                    <div class="form-control">
                                        <?php echo $trabajo->email ?>
                                    </div>
                                    <div class="input-group-append">
                                        <button data-clipboard-text="<?php echo $trabajo->email ?>" class="copy input-group-text"><i class="far fa-copy"></i></button>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $trabajo->val_enviado ?></td>
                            <td><?php echo $trabajo->for_fecha ?></td>
                            <td>
                                <div class="">

                                    <button class="btn_update_pagina btn btn-link text-light" type="button" data-toggle="modal" data-target="#view_datos" data-id="<?php echo $trabajo->id ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <button class="btn_update_pagina btn btn-link text-light" type="button" data-toggle="modal" data-target="#view_form_update" data-id="<?php echo $trabajo->id ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <button class="delete_trabajo btn btn-link text-light" type="button" data-id="<?php echo $trabajo->id ?>">
                                        <i class="far fa-times-circle"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach ?> -->
                </tbody>
            </table>

            <br>
            <div class="d-flex flex-md-row flex-column justify-content-between">
                <div class="form-group col-sm-4">
                    <select class="form-control" name="estatus">
                        <option value="1" selected>Enviado</option>
                        <option value="0">Sin Enviar</option>
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Actualizare</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>

<?php
$title_modal = "Nuevo Trabajo";
?>

<div id="create_tarea" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="<?php echo $title_modal ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id=""><?php echo $title_modal ?></h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $this->load->view("admin/trabajos/create", [
                    "accion" => "registrar",
                ]) ?>
            </div>
        </div>
    </div>
</div>

<div id="view_datos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Trabajo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Trabajo">Trabajo</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div id="insert_trabajo_detalle">

            </div>

            <div id="load_trabajo_detalle" class="d-flex justify-content-center align-items-center" style="min-height: 300px;">
                <div class="spinner-border text-light" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="view_form_update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Editar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Trabajo">Editar</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div id="insert_trabajo_update">

            </div>

            <div id="load_trabajo_update" class="d-flex justify-content-center align-items-center" style="min-height: 300px;">
                <div class="spinner-border text-light" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="nueva_pagina_trab" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="title_new_p_trabajo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_new_p_trabajo">Nueva Pagina</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="accordion">
                    <div class="">
                        <button class="btn btn-outline-light collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Paginas
                        </button>
                        <button class="btn btn-outline-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Nueva Pagina
                        </button>
                    </div>
                    <div class="card">
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <table class="table" id="table_paginas">
                                    <thead>
                                        <tr>
                                            <th>nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody id="insert_pagina">
                                        <?php if (!empty($paginas)) : ?>

                                            <?php foreach ($paginas as $pagina) : ?>
                                                <tr id="pagina-<?php echo $pagina->id ?>">
                                                    <td class="d-flex justify-content-between align-items-center">
                                                        <div class="">
                                                            <a target="_blank" class="text-light" href="<?php echo $pagina->url ?>">
                                                                <?php echo $pagina->nombre ?>
                                                            </a>

                                                        </div>
                                                        <div class="">

                                                            <button data-id="<?php echo $pagina->id ?>" class="btn_update_pagina btn btn-link text-light" type="submit">
                                                                <i class="fas fa-edit"></i>
                                                            </button>

                                                            <button data-id="<?php echo $pagina->id ?>" class="btn_delete_pagina btn btn-link text-light" type="submit">
                                                                <i class="far fa-times-circle"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                            <?php endforeach ?>

                                        <?php else : ?>

                                            <h3 class="p-2 h5 text-secondary">No Hay Habilidades Registradas</h3>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <form action="<?php echo site_url("admin/trabajos/pagina/create") ?>" id="form_pagina_nueva" method="POST">

                                    <input type="hidden" name="id">
                                    <!-- nombre -->
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input id="nombre" class="form-control" type="text" name="nombre">
                                    </div>

                                    <!-- url -->
                                    <div class="form-group">
                                        <label for="url_nueva_pagina">Url Sitio Web</label>
                                        <input id="url_nueva_pagina" class="form-control" type="text" name="url_nueva_pagina">
                                    </div>
                                    <button class="btn btn-info float-right" type="submit">Registrar</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>




            </div>
        </div>
    </div>
</div>

<div id="consulta_reportes_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_consulta" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_consulta">Consulta Reportes</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url("admin/trabajos/consulta") ?>" method="GET">

                    <!-- fecha desde -->
                    <div class="form-group">
                        <label>Desde:</label>
                        <div class="input-group date" id="trabajos_desde" data-target-input="nearest">
                            <input name="desde" type="text" class="form-control datetimepicker-input" data-target="#trabajos_desde" />
                            <div class="input-group-append" data-target="#trabajos_desde" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <!-- fecha asta -->
                    <div class="form-group">
                        <label>Hasta:</label>
                        <div class="input-group date" id="trabajos_hasta" data-target-input="nearest">
                            <input name="hasta" type="text" class="form-control datetimepicker-input" data-target="#trabajos_hasta" />
                            <div class="input-group-append" data-target="#trabajos_hasta" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <!-- solo correos sin envio -->
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input name="enviado" type="checkbox" class="custom-control-input" id="check_enviado" name="enviado" value="1">
                            <label class="custom-control-label" for="check_enviado">Solo Correos sin Enviar</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-info" type="submit">Consultar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>