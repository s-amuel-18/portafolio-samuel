<section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Folders</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="#" class="nav-link">
                    <i class="fas fa-inbox"></i> Inbox
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-envelope"></i> Sent
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>


              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
 
              <div class="table-responsive mailbox-messages">
              <table class="table table-bordered table-hover">
                  <tbody>

                  <?php foreach($mensajes as $i => $msj): ?>

                    <tr class="<?php echo in_array($msj->id, $_SESSION["new_mensajes_id"]) ? "bg-secondary" : ""?>" data-widget="expandable-table" aria-expanded="false">
                      <td><?php echo $i + 1?></td>
                      <td><?php echo $msj->nombre?></td>
                      <td>
                        <a href="mailto:<?php echo $msj->email?>"><?php echo $msj->email?></a>
                      </td>
                      <td><?php echo $msj->asunto?></td>
                      <td><?php echo $msj->fecha_creacion?></td>
                    </tr>
                    <tr class="expandable-body">
                      <td colspan="5">
                        <p>
                        <?php echo $msj->descripcion?>
                        </p>
                      </td>
                    </tr>
                    <?php endforeach?>

                    <?php 
                      unset($_SESSION["new_mensajes_id"]);
                    ?>
                    
                    
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>