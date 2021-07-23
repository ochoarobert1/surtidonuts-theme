<?php

if (!defined('ABSPATH')) {
    die('Invalid request.');
}

function surtidonuts_load_styles()
{
    $version_remove = NULL;
    if (!is_admin()) {
        if ($_SERVER['REMOTE_ADDR'] == '::1') {

            /*- BOOTSTRAP CORE ON LOCAL -*/
            wp_register_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', false, '5.0.2', 'all');
            wp_enqueue_style('bootstrap-css');

            /*- ANIMATE CSS ON LOCAL -*/
            wp_register_style('animate-css', get_template_directory_uri() . '/css/animate.min.css', false, '4.1.1', 'all');
            wp_enqueue_style('animate-css');

            /*- FONT AWESOME ON LOCAL -*/
            wp_register_style('fontawesome-css', get_template_directory_uri() . '/css/font-awesome.min.css', false, '4.7.0', 'all');
            wp_enqueue_style('fontawesome-css');

            /*- AOS ON LOCAL -*/
            //wp_register_style('aos-css', get_template_directory_uri() . '/css/aos.css', false, '3.0.0', 'all');
            //wp_enqueue_style('aos-css');

        } else {

            /*- BOOTSTRAP CORE -*/
            wp_register_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', false, '5.0.2', 'all');
            wp_enqueue_style('bootstrap-css');

            /*- ANIMATE CSS -*/
            wp_register_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', false, '4.1.1', 'all');
            wp_enqueue_style('animate-css');

            /*- FONT AWESOME -*/
            wp_register_style('fontawesome-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', false, '4.7.0', 'all');
            wp_enqueue_style('fontawesome-css');

            /*- AOS -*/
            //wp_register_style('aos-css', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', false, '2.3.4', 'all');
            //wp_enqueue_style('aos-css');
        }

        /*- SWIPER JS -*/
        //wp_register_style('swiper-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.5/swiper-bundle.css', false, '6.7.5', 'all');
        //wp_enqueue_style('swiper-css');

        /*- GOOGLE FONTS -*/
        wp_register_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap', false, $version_remove, 'all');
        wp_enqueue_style('google-fonts');

        /*- MAIN STYLE -*/
        wp_register_style('main-style', get_template_directory_uri() . '/css/surtidonuts-style.css', false, $version_remove, 'all');
        wp_enqueue_style('main-style');

        /*- WOOCOMMERCE OVERRIDES -*/
        if (class_exists('WooCommerce')) {
            wp_register_style('main-woocommerce-style', get_template_directory_uri() . '/css/surtidonuts-woocommerce.css', false, $version_remove, 'all');
            wp_enqueue_style('main-woocommerce-style');
        }

        /*- MAIN MEDIAQUERIES -*/
        wp_register_style('main-mediaqueries', get_template_directory_uri() . '/css/surtidonuts-mediaqueries.css', array('main-style'), $version_remove, 'all');
        wp_enqueue_style('main-mediaqueries');

        /*- WORDPRESS STYLE -*/
        wp_register_style('wp-initial-style', get_template_directory_uri() . '/style.css', false, $version_remove, 'all');
        wp_enqueue_style('wp-initial-style');
    }
}

add_action('wp_enqueue_scripts', 'surtidonuts_load_styles', 1);
