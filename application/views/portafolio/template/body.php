<?php $this->load->view("portafolio/template/head"); ?>
<?php $this->load->view("portafolio/template/nav"); ?>

<?php if ($this->session->userdata("is_logged") and $this->session->userdata("rol") == "administrador") : ?>
  <!-- <a href="<?php echo site_url("admin") ?>" class="btn btn-outline-success" ><i class="fas fa-tachometer-alt"></i></a> -->

  <a href="<?php echo site_url("admin") ?>" class="btn banner_ripple ripple_white" style="position: fixed; bottom: 15px; left: 15px; z-index: 10000;"><span class="ripple"><i class="fas fa-tachometer-alt"></i></span></a>

<?php endif ?>



<!-- body -->
{body}
<!-- end body -->
<a href="https://wa.me/<?php echo url_title($this->telefono, "", true)?>" class="btn banner_ripple ripple_white"  target="_blanck" style="position: fixed; bottom: 15px; right: 0px; z-index: 10000;"><span class="ripple"><i class="ion-social-whatsapp"></i></span></a>

<?php $this->load->view("portafolio/template/footer"); ?>