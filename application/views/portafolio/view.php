<!-- START SECTION BREADCRUMB -->
<section class="breadcrumb_section bg_black4 page-title-light">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h1>Detalles Del Proyecto</h1>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-sm-end">
                        <li class="breadcrumb-item"><a href="<?php echo site_url()?>">Home</a></li>
                        <li class="breadcrumb-item active text-capitalize" aria-current="page">
                            <?php echo $proyecto->nombre; ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION PORTFOLIO DETAIL -->
<section class="bg_black2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <img class="lazy" data-src="<?php echo base_url($proyecto->poster_img) ?>" alt="portfolio_img1" />
            </div>
            <div class="col-lg-4">
                <ul class="list_none portfolio_info_box pr_info_text_white">
                    <li><span class="text-uppercase">Nonmbre</span><?php echo $proyecto->nombre ?></li>
                    <li><span class="text-uppercase">Fecha</span><?php echo $proyecto->inicio_fecha ?></li>
                    <li><span class="text-uppercase">Categoria</span><?php echo $proyecto->categoria ?></li>
                    <li><span class="text-uppercase">PROJECT link</span>
                        <a target="_blank" class="text-white" href="<?php echo $proyecto->link_proyecto ?>"><?php echo $proyecto->link_proyecto ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="pf_content text_white">
                    <div class="heading_s1">
                        <h2><?php echo $proyecto->nombre ?></h2>
                    </div>
                    <div class="text-light">
                        <?php echo $proyecto->descripcion ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION PORTFOLIO DETAIL -->