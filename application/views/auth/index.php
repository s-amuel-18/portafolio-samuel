<div class="d-flex justify-content-center align-items-center bg_black4" style="min-height: 100vh;">

  <div style="max-width: 500px;" class="icon_box icon_box_style_3 radius_box_10 box_dark">

    <div class="field_form form_style2 rounded_input animation animated fadeInUp" data-animation="fadeInUp" data-animation-delay="0.02s" style="animation-delay: 0.02s; opacity: 1;">

      <div class="d-flex justify-content-center py-4">
        <img src="<?php echo base_url() ?>assets/portafolio/images/logo_white.png" alt="logo">
      </div>

      <?php if( isset( $_SESSION["message"] ) ):?>
        <div class="">
          <div class="alert alert-<?php echo $_SESSION["message"]["color"]?>" role="alert">
          <?php echo $_SESSION["message"]["message"]?>
          </div>
        </div>
      <?php 
        unset($_SESSION["message"]);
      endif?>        

      
      <form method="POST" action="<?php echo site_url("login")?>">
        <div class="row">
          <div class="form-group col-12">
            <input required="required" placeholder="Nombre de Usuarion *" id="username" class="form-control" name="username" type="text">
          </div>
          <div class="form-group col-12">
            <input required="required" placeholder="Contraseña *" id="password" class="form-control" name="password" type="password">
          </div>

          <div class="col-lg-12">
            <button type="submit" title="Submit Your Message!" class="btn btn-default btn-radius btn-aylen m-auto d-block" name="submit" value="Submit">Submit</button>
            <!-- <button type="submit">dsa</button> -->
          </div>
          <div class="col-lg-12 text-center">
            <div id="alert-msg" class="alert-msg text-center"></div>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>