<div class="modal-body">
    <div class="">
        <div class="">
            <h4><?php echo $trabajo->nombre ?></h4>
            <p><small class="text-muted"><?php echo $trabajo->for_fecha ?></small></p>
        </div>
        <h5>
            <a target="_blank" href="mailto:<?php echo $trabajo->email ?>"><?php echo $trabajo->email ?></a>

        </h5>
        <h5>
            <a target="_blank" href="<?php echo $trabajo->url_trabajo ?>"><?php echo $trabajo->url_trabajo ?></a>
        </h5>
        <p><?php echo $trabajo->descripcion ?></p>
    </div>
</div>
<div class="modal-footer bg-<?php echo $trabajo->enviado == 1 ? "success" : "danger"?>">
    <div class="w-100 d-flex align-items-center  justify-content-between">
        <?php if ($trabajo->enviado == 1) : ?>
            Este trabajo ya ha resivido correos
            <i class="fas fa-check"></i>

        <?php else : ?>
            Aun no se ha enviado un correo a este trabajo
            <i class="far fa-times-circle"></i>

        <?php endif ?>
    </div>
</div>