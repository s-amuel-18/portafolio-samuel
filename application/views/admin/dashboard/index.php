    <!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>
                    <?php echo  $trabajos_del_dia["cantidad"]?>
                </h3>

                <p>Trabajos Registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-bag"></i>
            </div>
            <a href="<?php echo site_url("admin/trabajos") ?>" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>
                    <?php echo $count_proyects?>
                </h3>

                <p>Proyectos Registrados</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
            </div>
            <a href="<?php echo site_url("admin/proyecto") ?>" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?php echo count( $correos_sin_leer )?>
                    
                </h3>

                <p>Mensajes Nuevos</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <a href="<?php echo site_url("admin/contacto") ?>" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
    <div class="col-md-6">
        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title text-capitalize">trabajos registrados en el dia</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach (omitir_datos_arr($trabajos_del_dia["trabajos"], 5) as $trabajo) : ?>
                                <tr>
                                    <td><?php echo $trabajo->id?></td>
                                    <td><?php echo $trabajo->nombre?></td>
                                    <td><?php echo $trabajo->email?></td>
                                    <td><?php echo $trabajo->for_fecha?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <a href="<?php echo site_url("admin/trabajos") ?>" class="btn btn-sm btn-info float-right">Ver Todos Los Trabajos</a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title text-capitalize">Nuevos correos</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                
                <?php if( !empty( $correos_sin_leer ) ):?>
                    <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($correos_sin_leer as $correo) : ?>
                                <tr>
                                    <td><?php echo $correo->nombre?></td>
                                    <td><?php echo $correo->email?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <?php else:?>
                    <p class="p-3 text-muted text-capitalize">No hay correos nuevos</p>
                <?php endif?>
                
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <a href="<?php echo site_url("admin/contacto") ?>" class="btn btn-sm btn-info float-right">Ver Todos Los Correos</a>
            </div>
            <!-- /.card-footer -->
        </div>
    </div>
</div>