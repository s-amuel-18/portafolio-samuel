<a href="<?php echo site_url("admin/proyecto/update//" . $proyecto->id) ?>" class="btn btn-outline-success" style="position: fixed; bottom: 70px; right: 15px; z-index: 10000;"><i class="nav-icon fas fa-edit"></i></a>

<div class="container-fluid">

<div class="row mb-3">
    <div class="col-10">
      <a href="<?php echo site_url("admin/proyecto")?>" class="btn btn-info mr-2">Proyectos</a>
    </div>

    <div class="col-2 d-flex justify-content-end">
      <a href="<?php echo site_url("admin/proyecto/crear") ?>" class="btn btn-success">Nuevo</a>
    </div>
  </div>

<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <img class="w-100" style="max-height: 500px; object-fit: cover;" src="<?php echo base_url($proyecto->poster_img) ?>" alt="portfolio_img2">
      </div>
  
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-text-width"></i>
              Datos Del Proyecto
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <dl class="row">
              <dt class="col-sm-4 text-capitalize">nombre</dt>
              <dd class="col-sm-8"><?php echo $proyecto->nombre?></dd>

              <dt class="col-sm-4 text-capitalize">categoria</dt>
              <dd class="col-sm-8"><?php echo $proyecto->categoria?></dd>
              <!-- <dd class="col-sm-8 offset-sm-4">Donec id elit non mi porta gravida at eget metus.</dd> -->

              <dt class="col-sm-4 text-capitalize">Link del Proyecto</dt>
              <dd class="col-sm-8">
                <a href="<?php echo $proyecto->link_proyecto?>"><?php echo $proyecto->link_proyecto?></a>
              </dd>

              <dt class="col-sm-4 text-capitalize">Fecha De Inicio Del Proyecto</dt>
              <dd class="col-sm-8"><?php echo $proyecto->fecha_inicio_proyecto?>
              </dd>

              <dt class="col-sm-4 text-capitalize">Fecha Fin Fel Protecto</dt>
              <dd class="col-sm-8"><?php echo $proyecto->fecha_fin_proyecto?>
              </dd>

              <dt class="col-sm-4 text-capitalize">Pequeña Descripcion</dt>
              <dd class="col-sm-8"><?php echo $proyecto->pequeña_descripcion?>
              </dd>
            </dl>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
  
  
    </div>
    <div class="row mt-5">
      <div class="col-12">
        <div class="pf_content text_white">
          <div class="heading_s1">
            <h2>Descripcion</h2>
          </div>
          <?php echo $proyecto->descripcion?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>