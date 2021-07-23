<?php
if (!defined('ABSPATH')) {
    die('Invalid request.');
}

function surtidonuts_load_scripts()
{
    $version_remove = NULL;
    if (!is_admin()) {
        if ($_SERVER['REMOTE_ADDR'] == '::1') {

            /*- BOOTSTRAP ON LOCAL  -*/
            wp_register_script('bootstrap-bundle', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), '5.0.2', true);
            wp_enqueue_script('bootstrap-bundle');

            /*- STICKY ON LOCAL  -*/
            //wp_register_script('sticky', get_template_directory_uri() . '/js/sticky.min.js', array('jquery'), '1.3.0', true);
            //wp_enqueue_script('sticky');

            /*- AOS ON LOCAL -*/
            //wp_register_script('aos-js', get_template_directory_uri() . '/js/aos.js', array('jquery'), '3.0.0', true);
            //wp_enqueue_script('aos-js');

        } else {

            /*- BOOTSTRAP -*/
            wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.0.2', true);
            wp_enqueue_script('bootstrap');

            /*- STICKY -*/
            //wp_register_script('sticky', 'https://cdnjs.cloudflare.com/ajax/libs/sticky-js/1.3.0/sticky.min.js', array('jquery'), '1.3.0', true);
            //wp_enqueue_script('sticky');

            /*- AOS -*/
            //wp_register_script('aos-js', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array('jquery'), '2.3.4', true);
            //wp_enqueue_script('aos-js');
        }

        /*- SWIPER JS -*/
        //wp_register_script('swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.5/swiper-bundle.min.js', array('jquery'), '6.7.5', true);
        //wp_enqueue_script('swiper-js');

        /*- MAIN FUNCTIONS -*/
        wp_register_script('main-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), $version_remove, true);
        wp_enqueue_script('main-functions');

        /* LOCALIZE MAIN SHORTCODE SCRIPT */
        wp_localize_script('main-functions', 'custom_admin_url', array(
            'ajax_url' => admin_url('admin-ajax.php')
        ));

        /*- WOOCOMMERCE OVERRIDES -*/
        if (class_exists('WooCommerce')) {
            wp_register_script('main-woocommerce-functions', get_template_directory_uri() . '/js/surtidonuts-woocommerce.js', array('jquery'), $version_remove, true);
            wp_enqueue_script('main-woocommerce-functions');
        }

        if (is_single('post') && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        } else {
            wp_deregister_script('comment-reply');
        }
    }
}

add_action('wp_enqueue_scripts', 'surtidonuts_load_scripts', 1);
