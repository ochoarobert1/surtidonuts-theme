<?php get_header(); ?>
<main class="container" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row">
        <article id="post-404" class="page-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/404.png" alt="Error 404 Imagen" class="img-fluid" />
                    </div>
                    <div class="w-100"></div>
                    <div class=" col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1 class="text-center"><?php _e('Error 404', 'surtidonuts'); ?></h1>
                        <hr>
                        <h4 class="text-center"><?php _e('No podemos encontrar la página que buscas. Dirígete nuevamente al', 'surtidonuts'); ?> <a href="<?php echo home_url('/'); ?>" title="<?php _e('Volver al Inicio', 'surtidonuts'); ?>"><?php _e('inicio', 'surtidonuts'); ?></a>.</h4>
                    </div>
                    <div class="w-100"></div>
                </div>
            </div>
        </article>
    </div>
</main>
<?php get_footer(); ?>
