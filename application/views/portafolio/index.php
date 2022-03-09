<!-- START SECTION BANNER -->
    <section id="home_section" class="banner_section full_screen parallax_bg overlay_bg_blue_90" data-parallax-bg-image="<?php echo base_url() ?>assets/portafolio/images/banner_img.jpg">
        <div class="banner_slide_content">
            <div class="container">
                <!-- STRART CONTAINER -->
                <div class="row align-items-center">
                    <div class="col-xl-5">
                        <div class="image_banner animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                            <img class="lazy" data-src="<?php echo (!$img_perfil) ? base_url("assets/portafolio/images/my_image2.jpg") : base_url($img_perfil) ?>" alt="my_image" />
                            <div class="circle_bg1">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 order-xl-first">
                        <div class="banner_content text_white text-center text-xl-left">
                            <h2 class="text-capitalize animation" data-animation="fadeInUp" data-animation-delay="0.02s">Hola, soy <br>
                                <?php echo isset($nombre_completo) ? $nombre_completo : "Nombre Usuario" ?></h2>
                            <div id="typed-strings" class="d-none">
                                <p><?php echo isset($info_personal->profesion) ? $info_personal->profesion : "Profesion" ?></p>
                            </div>
                            <h4 class="animation" data-animation="fadeInUp" data-animation-delay="0.03s">Soy un Freelance
                                <span id="typed-text" class="text_default"></span>
                            </h4>
                            <p class="animation" data-animation="fadeInUp" data-animation-delay="0.04s">Soy un programador apasionado por la tecnología, diseño y creación de interfaces web, y desarrollo de sistemas para la facilitación de procesos.
                            </p>
                        </div>
                    </div>
                </div>
            </div><!-- END CONTAINER-->
        </div>
        <a href="#about" class="down down_white page-scroll">
            <span class="mouse"><span></span></span>
        </a>
    </section>
    <!-- END SECTION BANNER -->

    <!-- START SECTION ABOUT US -->
    <section id="about" class="bg_black4">
        <div class="container">
            <div class="row align-items-center animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                <div class="col-md-8">
                    <div class="heading_s1 heading_light">
                        <h2>Sobre Mi</h2>
                    </div>
                    <div class="text-white-child">
                        <?php
                        echo empty($resumen)
                            ? "Sin Resumen"
                            : $resumen;
                        ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-md-right">
                        <a target="_blank" href="<?php echo site_url("portafolio/view_curriculum") ?>" class="btn btn-default btn-radius btn-aylen">Descargar CV</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="about_img2 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                        <img class="lazy" data-src="<?php echo (!$img_perfil) ? base_url("assets/portafolio/images/my_image2.jpg") : base_url($img_perfil) ?>" alt="about_img" />
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="about_info text_white animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="heading_s1 mb-4">
                                    <h5>Informacion Basica</h5>
                                </div>
                                <ul class="profile_info_style2 list_none">
                                    <?php if (isset($info_personal)) : ?>
                                        <?php foreach ($info_personal as $key => $value) : ?>
                                            <li>
                                                <span class="title text-capitalize"><?php echo str_replace("_", " ", $key) ?>:</span>
                                                <p><?php echo $value ?></p>
                                            </li>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </ul>



                                <ul class="list_none social_icons rounded_social socail_style1 social_white mt-3">
                                    <?php foreach ($redes_sociales as $red_social) : ?>
                                        <li><a href="<?php echo $red_social->url ?>" target="_blank"><i class="<?php echo $red_social->icono ?>"></i></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <div class="heading_s1 mb-4">
                                    <h5>Mis Habilidades</h5>
                                </div>
                                <div class="skills">
                                    <?php foreach ($habilidades as $habilidad) : ?>
                                        <div class="skill_content pr_style1">
                                            <div class="progrees_bar_text">
                                                <b><?php echo $habilidad->nombre ?></b>
                                            </div>
                                            <div class="progress">
                                                <div class="count_pr"><span class="counter"><?php echo $habilidad->nivel ?></span>%</div>
                                                <div class="progress-bar d-block" role="progressbar" aria-valuenow="<?php echo $habilidad->nivel ?>" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION ABOUT US -->

    <!-- START SECTION SERVICES -->
    <section id="services" class="bg_black2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-9 text-center">
                    <div class="heading_s1 heading_light animation text-center" data-animation="fadeInUp" data-animation-delay="0.02s">
                        <h2>Servicios</h2>
                    </div>
                    <p class="animation text-white" data-animation="fadeInUp" data-animation-delay="0.03s">
                        Mis servicios están enfocados en la programación, diseño y desarrollo de sistemas web.
                    </p>
                </div>
            </div>
            <div class="row animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                <div class="col-lg-4 col-sm-6 text-center">
                    <div class="icon_box icon_box_style_3 radius_box_10 box_dark">
                        <div class="box_icon mb-3">
                            <i class="ti-image"></i>
                        </div>
                        <div class="icon_box_content text_white">
                            <h5>Desarrollo Web</h5>
                            <p>Creacion de sitios web con tecnologias como HTML, CSS, JavaScript y herramientas de desarrollo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <div class="icon_box icon_box_style_3 radius_box_10 box_dark">
                        <div class="box_icon mb-3">
                            <i class="ti-video-camera"></i>
                        </div>
                        <div class="icon_box_content text_white">
                            <h5>Diseño de interfaces</h5>
                            <p>
                                Desarrollo de interfaces web adaptables a las necesidades requeridas por los usuarios.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <div class="icon_box icon_box_style_3 radius_box_10 box_dark">
                        <div class="box_icon mb-3">
                            <i class="ti-crown"></i>
                        </div>
                        <div class="icon_box_content text_white">
                            <h5>Programación</h5>
                            <p>Creación de sistemas y herramientas que facilitan la interacción de los usuarios con los datos de la plataforma</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION SERVICES -->

    <!-- START SECTION PORTFOLIO -->
    <section id="portfolio" class="pb_70 bg_black4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-9 text-center">
                    <div class="heading_s1 heading_light animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                        <h2>Portafolio</h2>
                    </div>
                    <p class="animation text-white" data-animation="fadeInUp" data-animation-delay="0.03s">
                        En esta sección presento una pequeña parte de mis proyectos realizados a lo largo de mi trayectoria como programador</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="cleafix small_divider"></div>
                </div>
            </div>
            <div class="row mb-4 mb-md-5">
                <div class="col-md-12 text-center">
                    <ul class="list_none grid_filter filter_tab1 filter_white animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                        <li><a href="#" class="current" data-filter="*">all</a></li>

                        <?php foreach ($categorias_con_proyectos as $categoria) : ?>
                            <li><a href="#" data-filter=".<?php echo str_replace(" ", "_", $categoria->nombre) ?>"><?php echo $categoria->nombre ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
            <div class="row" id="inner_grid"></div>

        </div>
        </div>

    </section>
    <!-- END SECTION PORTFOLIO -->

    <!-- START WORK EXPERIENCES -->
    <section id="experience" class="bg_black2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-9 text-center">
                    <div class="heading_s1 heading_light animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                        <h2>Experiencia Laboral</h2>
                    </div>
                    <p class="animation text-white" data-animation="fadeInUp" data-animation-delay="0.03s">
                        Esta seccion presenta mi experiencia laboral como programador
                    </p>
                </div>
            </div>
            <div class="row animation" data-animation="fadeInUp" data-animation-delay="0.04s">

                <?php foreach ($resumenes_laborales as $resumen_laboral) : ?>
                    <div class="col-sm-6">
                        <div class="icon_box icon_box_style_2 radius_box_10 box_dark">
                            <div class="icon_box_content text_white">
                                <h4><?php echo $resumen_laboral->nombre ?></h4>
                                <p><span class="text_default"><?php echo $resumen_laboral->duracion ?></span> <?php echo $resumen_laboral->categoria ?></p>
                                <hr>
                                <p>
                                    <?php echo $resumen_laboral->descripcion ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </section>
    <!-- END WORK EXPERIENCES -->


    <!-- START SECTION TESTIMONIAL -->
    <section class="bg_black2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-9 text-center">
                    <div class="heading_s1 heading_light animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                        <h2>Testimonios De Clientes</h2>
                    </div>
                    <p class="animation text-white" data-animation="fadeInUp" data-animation-delay="0.03s">
                        Aqui presto los testimonios de mis ultimos clientes.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                    <div class="carousel_slider testimonial_style2 owl-carousel owl-theme" data-margin="20" data-loop="true" data-autoplay="true" data-items="1">

                        <?php foreach ($testimonios as $tes) : ?>
                            <div class="item">
                                <div class="testimonial_box box_dark text_white">
                                    <div class="testimonial_user">
                                        <div class="testimonial_img">
                                            <img class="lazy" data-src="<?php echo base_url() ?>assets/portafolio/images/client_img1.jpg" alt="client" />
                                        </div>
                                        <div class="client_info">
                                            <h6><?php echo $tes["nombre"] ?></h6>
                                            <span><?php echo $tes["puesto"] ?></span>
                                        </div>
                                    </div>
                                    <div class="testi_meta">
                                        <p>
                                            <?php echo $tes["testimonio"] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION TESTIMONIAL -->


    <!-- START SECTION CONTACT -->
    <section id="contact" class="bg_black2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-9 text-center">
                    <div class="heading_s1 heading_light animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                        <h2>Contactame</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                <div class="col-md-4 text-center">
                    <div class="icon_box icon_box_style_2 box_dark text_white radius_box_10">
                        <div class="box_icon mb-3">
                            <i class="ti-location-pin"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5 class="text-uppercase py-md-2">Direccion</h5>
                            <p>123 Street, New South London , UK</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="icon_box icon_box_style_2 box_dark text_white radius_box_10">
                        <div class="box_icon mb-3">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5 class="text-uppercase py-md-2">Numero de telefono</h5>
                            <p><?php echo isset($info_personal->telefono) ? $info_personal->telefono : "Numero de Telefono" ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="icon_box icon_box_style_2 box_dark text_white radius_box_10">
                        <div class="box_icon mb-3">
                            <i class="ti-email"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5 class="text-uppercase py-md-2">Email</h5>
                            <p>
                                <?php 
                                    $email_user = isset($info_personal->email) ? $info_personal->email : "email"
                                ?>
                                <a target="_blanck" href="mailto:<?php echo $email_user ?>"><?php echo $email_user ?></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">


                    <?php if (isset($_SESSION["message"])) : ?>
                        <div class="col-lg-12 text-center">
                            <div class="alert alert-<?php echo $_SESSION["message"]["color"] ?>" role="alert">
                                <?php echo $_SESSION["message"]["message"] ?>
                            </div>
                        </div>

                    <?php
                        unset($_SESSION["message"]);
                    endif;
                    ?>

                    <div class="field_form form_style2 rounded_input animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                        <form action="<?php echo site_url("portafolio/contacto") ?>" method="POST" id="contact_form">
                            <div class="row">
                                <div class="form-group col-12">
                                    <input required="required" placeholder="Nombre *" id="nombre" class="form-control" name="nombre" type="text">
                                </div>
                                <div class="form-group col-12">
                                    <input required="required" placeholder="E-mail *" id="email" class="form-control" name="email" type="email">
                                </div>
                                <div class="form-group col-12">
                                    <input placeholder="Asunto" id="asunto" class="form-control" name="asunto" type="text">
                                </div>
                                <div class="form-group col-lg-12">
                                    <textarea required="required" placeholder="Mensaje *" id="descripcion" class="form-control" name="descripcion" rows="5"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" title="Enviar mensaje!" class="btn btn-default btn-radius btn-aylen btn-block" name="submit" value="Enviar">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- START SECTION CONTACT -->

    <script>
        window.addEventListener("load", e => {
            // setTimeout(() => {
            const inner_grid = document.getElementById("inner_grid");

            let template = `
<div class="col-md-12">
            <ul class="grid_container gutter_medium work_col3 portfolio_gallery portfolio_style1 animation masonry" data-animation="fadeInUp" data-animation-delay="0.04s">
                <li class="grid-sizer"></li>

                <?php foreach ($proyectos as $proyecto) : ?>
                    <!-- START PORTFOLIO ITEM -->
                    <li class="grid_item <?php echo str_replace(" ", "_", $proyecto->categoria) ?>">
                        <div class="portfolio_item">
                            <a href="<?php echo site_url("portafolio/proyecto/") . $proyecto->url_clean ?>" class="image_link">
                                <img style="max-height: 400px; object-fit: cover;"  src="<?php echo base_url($proyecto->poster_img) ?>" alt="image">
                            </a>
                            <div class="portfolio_content">
                                <div class="link_container">
                                    <a href="<?php echo site_url("portafolio/proyecto/") . $proyecto->url_clean ?>"><i class="ion-plus"></i></a>
                                </div>
                                <h5><a href="<?php echo site_url("portafolio/proyecto/") . $proyecto->url_clean ?>"><?php echo $proyecto->nombre ?></a>
                                </h5>
                                <p><?php echo $proyecto->categoria ?></p>
                            </div>
                        </div>
                    </li>
                    <!-- END PORTFOLIO ITEM -->
                <?php endforeach ?>
            </ul>
        </div>
`;

            inner_grid.innerHTML = template;
            // }, 10000);
        })
    </script>