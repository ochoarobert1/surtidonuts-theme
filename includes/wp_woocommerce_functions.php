<?php

if (!defined('ABSPATH')) {
    die('Invalid request.');
}
/**
 * Woocommerce Custom Overrides
 *
 * @link https://woocommerce.com/
 *
 * @package surtidonuts
 */

class woocommerceCustomOverrides
{
    /**
     * Main Constructor.
     */
    function __construct()
    {
        add_action('after_setup_theme', array($this, 'woocommerce_support'), 1);
        add_action('init', array($this, 'woocommerce_general_overrides'), 99);
        add_action('init', array($this, 'woocommerce_archive_overrides'), 99);
        add_action('init', array($this, 'woocommerce_single_overrides'), 99);
    }

    /**
     * Add Woocommerce Support to Theme
     */
    public function woocommerce_support()
    {
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }

    /**
     * Overrides for General Purposes
     */
    public function woocommerce_general_overrides()
    {
        //remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

        remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
        remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

        add_action('woocommerce_before_main_content', array($this, 'surtidonuts_woocommerce_custom_wrapper_start'), 10);
        add_action('woocommerce_after_main_content', array($this, 'surtidonuts_woocommerce_custom_wrapper_end'), 10);
    }

    /**
     * Woocommerce main class wrapper - start
     */
    public function surtidonuts_woocommerce_custom_wrapper_start()
    {
        echo '<section id="main" class="container-fluid"><div class="row"><div class="woocustom-main-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">';
    }

    /**
     * Woocommerce main class wrapper - end
     */
    public function surtidonuts_woocommerce_custom_wrapper_end()
    {
        echo '</div></div></section>';
    }

    /**
     * Overrides for Archive / Shop / Taxonomies Section
     */
    public function woocommerce_archive_overrides()
    {
        //remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
        //remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
        //remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
        //remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    }

    /**
     * Overrides for Single Product Section
     */
    public function woocommerce_single_overrides()
    {
        //remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
        //remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
    }
}

// Call custom class
new woocommerceCustomOverrides;
