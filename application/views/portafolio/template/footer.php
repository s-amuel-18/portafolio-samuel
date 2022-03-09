    <!-- START FOOTER SECTION -->
    <footer class="footer_dark background_bg overlay_bg_blue_90" data-img-src="<?php echo base_url() ?>assets/portafolio/images/footer_bg.jpg">
        <div class="top_footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="footer_logo">
                            <a href="index.html"><img alt="logo" class="lazy" data-src="<?php echo base_url() ?>assets/portafolio/images/logo_white.png"></a>
                        </div>
                        <p></p>
                        <ul class="list_none social_icons rounded_social socail_style1 social_white mt-3">
                            <?php foreach ($this->redes_sociales as $red_social) : ?>
                                <li><a href="<?php echo $red_social->url ?>" target="_blank"><i class="<?php echo $red_social->icono ?>"></i></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-sm-6 mt-4 mt-lg-0">
                        <ul class="list_none widget_links widget_links_style1">
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#">Sobre Mi</a></li>
                            <li><a href="#">Servicios</a></li>
                            <li><a href="#">Experiencia Laboral</a></li>
                            <li><a href="#">contacto</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-sm-12 mt-4 mt-lg-0">
                        <p>Puedes dejar tu correo electrónico para recibir notificaciones.</p>
                        <div class="newsletter_form">
                            <form>
                                <div class="rounded_input">
                                    <input type="text" required="" placeholder="Enter Email Address">
                                </div>
                                <button type="submit" title="Subscribe" class="btn btn-default btn-radius btn-aylen" name="submit" value="Submit">
                                    subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bottom_footer border_top_tran">
                        <div class="row">
                            <div class="col-12">
                                <p class="copyright m-0 text-center">© <?php echo date_format(new DateTime(), "Y")?> Todos los derechos reservados <a href="#" class="text_default">
                                    <?php echo $nombre_completo?>
                                </a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END FOOTER SECTION -->


    <!-- Latest jQuery -->
    <script src="<?php echo base_url() ?>assets/portafolio/js/jquery-1.12.4.min.js"></script>
    <!-- jquery-ui -->
    <script src="<?php echo base_url() ?>assets/portafolio/js/jquery-ui.js"></script>
    <!-- popper min js -->
    <!-- <script src="<?php echo base_url() ?>assets/portafolio/js/popper.min.js"></script> -->
    <!-- Latest compiled and minified Bootstrap -->
    <script src="<?php echo base_url() ?>assets/portafolio/bootstrap/js/bootstrap.min.js"></script>
    <!-- owl-carousel min js  -->
    <script src="<?php echo base_url() ?>assets/portafolio/owlcarousel/js/owl.carousel.min.js"></script>
    <!-- magnific-popup min js  -->
    <!-- <script src="<?php echo base_url() ?>assets/portafolio/js/magnific-popup.min.js"></script> -->
    <!-- waypoints min js  -->
    <script src="<?php echo base_url() ?>assets/portafolio/js/waypoints.min.js"></script>
    <!-- yall -->
    <script src="<?php echo base_url() ?>assets/portafolio/js/yall.min.js"></script>
    <!-- parallax js  -->
    <script src="<?php echo base_url() ?>assets/portafolio/js/parallax.js"></script>
    <!-- countdown js  -->
    <!-- <script src="<?php echo base_url() ?>assets/portafolio/js/jquery.countdown.min.js"></script> -->
    <!-- jquery.counterup.min js -->
    <!-- <script src="<?php echo base_url() ?>assets/portafolio/js/jquery.counterup.min.js"></script> -->
    <!-- imagesloaded js -->
    <script src="<?php echo base_url() ?>assets/portafolio/js/imagesloaded.pkgd.min.js"></script>
    <!-- isotope min js -->
    <script src="<?php echo base_url() ?>assets/portafolio/js/isotope.min.js"></script>
    <!-- vanilla-tilt.babel.min js -->
    <script src='<?php echo base_url() ?>assets/portafolio/js/vanilla-tilt.babel.min.js'></script>
    <!-- typed.min js -->
    <script src="<?php echo base_url() ?>assets/portafolio/js/typed.min.js"></script>
    <!-- typed text js -->
    <script src="<?php echo base_url() ?>assets/portafolio/js/typed-text.js"></script>
    <!-- mCustomScrollbar.concat.min js -->
    <script src="<?php echo base_url() ?>assets/portafolio/js/jquery.mCustomScrollbar.concat.min.js"></script>


    <!-- jquery-validation -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-validation/additional-methods.min.js"></script>

    <!-- scripts js -->
    <script src="<?php echo base_url() ?>assets/portafolio/js/scripts.js"></script>

    <script>
        $(function() {
            // VALIDACION
            $('#contact_form').validate({
                rules: {
                    nombre: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    asunto: {
                        required: true
                    },
                    descripcion: {
                        required: true
                    }
                },  
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });


        })
        
        document.addEventListener("DOMContentLoaded", function() {
  yall({
    observeChanges: true
  });
});
    </script>

    </body>

    </html>