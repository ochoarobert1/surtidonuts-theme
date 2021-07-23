<?php get_header(); ?>
<main class="container" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
    <div class="row">
        <div class="page-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="container p-0">
                <div class="row">
                    <div class="title-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1><?php _e('Blog', 'surtidonuts'); ?></h1>
                    </div>
                    <?php if (have_posts()) : ?>
                    <section class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                        <?php $defaultatts = array('class' => 'img-fluid', 'itemprop' => 'image'); ?>
                        <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" class="archive-item col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 <?php echo join(' ', get_post_class()); ?>" role="article">
                            <div class="container p-0">
                                <div class="row">
                                    <picture class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12">
                                        <?php if ( has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <?php the_post_thumbnail('blog_img', $defaultatts); ?>
                                        </a>
                                        <?php else : ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <img itemprop="image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-img.jpg" alt="No img" class="img-fluid" />
                                        </a>
                                        <?php endif; ?>
                                    </picture>
                                    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-12">
                                        <header>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <h2 rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h2>
                                            </a>
                                            <time class="date" datetime="<?php echo get_the_time('Y-m-d') ?>" itemprop="datePublished"><?php the_time('d-m-Y'); ?></time>
                                            <span class="author" itemprop="author" itemscope itemptype="http://schema.org/Person"><?php _e('Publicado por:', 'surtidonuts'); ?> <?php the_author_posts_link(); ?></span>
                                        </header>
                                        <p><?php the_excerpt(); ?></p>
                                        <a href="<?php the_permalink(); ?>" title="<?php _e('Leer Más', 'surtidonuts'); ?>" class="btn btn-md btn-dark"><?php _e('Leer Más', 'surtidonuts'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php endwhile; ?>
                        <div class="pagination col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <?php if(function_exists('wp_paginate')) { wp_paginate(); } else { posts_nav_link(); wp_link_pages(); } ?>
                        </div>
                    </section>
                    <aside class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 d-xl-block d-lg-block d-md-block d-sm-none d-none">
                        <?php get_sidebar(); ?>
                    </aside>
                    <?php else: ?>
                    <section class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2><?php _e('Disculpe, su busqueda no arrojo ningun resultado', 'surtidonuts'); ?></h2>
                        <h3><?php _e('Dirígete nuevamente al', 'surtidonuts'); ?> <a href="<?php echo home_url('/'); ?>" title="<?php _e('Volver al Inicio', 'surtidonuts'); ?>"><?php _e('inicio', 'surtidonuts'); ?></a>.</h3>
                    </section>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>