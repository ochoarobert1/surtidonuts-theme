<?php /* POST FORMAT - GALLERY */ ?>
<?php $defaultatts = array('class' => 'img-fluid', 'itemprop' => 'image'); ?>
<article id="post-<?php the_ID(); ?>" class="the-single col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 <?php echo join(' ', get_post_class()); ?>" itemscope itemtype="http://schema.org/Article">
    <?php if ( has_post_thumbnail()) : ?>
    <picture>
        <?php the_post_thumbnail('single_img', $defaultargs); ?>
    </picture>
    <?php endif; ?>
    <header>
        <h1 itemprop="name"><?php the_title(); ?></h1>
        <?php the_tags( __( 'Tags: ', 'surtidonuts' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
    </header>
    <div class="post-content" itemprop="articleBody">
        <?php the_content() ?>
        <?php wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'surtidonuts' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>', ) ); ?>
        <footer>
            <p>Categorias: <?php the_category(', '); // Separated by commas ?></p>
            <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
            <span class="author">Publicado por: <?php the_author_posts_link(); ?></span>
        </footer>
    </div><!-- .post-content -->
    <meta itemprop="datePublished" datetime="<?php echo get_the_time('Y-m-d') ?>" content="<?php echo get_the_date('i') ?>">
    <meta itemprop="author" content="<?php echo esc_attr(get_the_author()) ?>">
    <meta itemprop="url" content="<?php the_permalink() ?>">
    <?php if ( comments_open() ) { comments_template(); } ?>
</article> <?php // end article ?>
