<?php

if (!defined('ABSPATH')) {
    die('Invalid request.');
}
/**
 * CMB2 Custom Metaboxes
 *
 * @link https://woocommerce.com/
 *
 * @package surtidonuts
 */
class customCMB2Class
{
    /**
     * Main Constructor.
     */
    public function __construct()
    {
        add_filter('cmb2_show_on', array($this, 'ed_metabox_include_front_page'), 10, 2);
        add_filter('cmb2_show_on',  array($this, 'be_metabox_show_on_slug'), 10, 2);
        add_action('cmb2_admin_init', array($this, 'surtidonuts_register_custom_metabox'));
    }

    /**
     * Register custom metaboxes.
     */
    public function surtidonuts_register_custom_metabox()
    {
        $prefix = 'std_';

        $cmb_metabox = new_cmb2_box(array(
            'id'            => $prefix . 'metabox',
            'title'         => esc_html__('Test Metabox', 'surtidonuts'),
            'object_types'  => array('page'), // Post type
            // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
            // 'context'    => 'normal',
            // 'priority'   => 'high',
            // 'show_names' => true, // Show field names on the left
            // 'cmb_styles' => false, // false to disable the CMB stylesheet
            // 'closed'     => true, // true to keep the metabox closed by default
            // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
            // 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
        ));

        $cmb_metabox->add_field(array(
            'name'       => esc_html__('Test Text', 'surtidonuts'),
            'desc'       => esc_html__('field description (optional)', 'surtidonuts'),
            'id'         => $prefix . 'text',
            'type'       => 'text',
            'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
            // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
            // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
            // 'on_front'        => false, // Optionally designate a field to wp-admin only
            // 'repeatable'      => true,
            // 'column'          => true, // Display field value in the admin post-listing columns
        ));
    }

    /**
     * Include custom 'show_on' for Front Page
     */
    public function ed_metabox_include_front_page($display, $meta_box)
    {
        if (!isset($meta_box['show_on']['key'])) {
            return $display;
        }

        if ('front-page' !== $meta_box['show_on']['key']) {
            return $display;
        }

        $post_id = 0;

        // If we're showing it based on ID, get the current ID
        if (isset($_GET['post'])) {
            $post_id = $_GET['post'];
        } elseif (isset($_POST['post_ID'])) {
            $post_id = $_POST['post_ID'];
        }

        if (!$post_id) {
            return false;
        }

        // Get ID of page set as front page, 0 if there isn't one
        $front_page = get_option('page_on_front');

        // there is a front page set and we're on it!
        return $post_id == $front_page;
    }

    /**
     * Include custom 'show_on' for Page Slug
     */
    public function be_metabox_show_on_slug($display, $meta_box)
    {
        if (!isset($meta_box['show_on']['key'], $meta_box['show_on']['value'])) {
            return $display;
        }

        if ('slug' !== $meta_box['show_on']['key']) {
            return $display;
        }

        $post_id = 0;

        // If we're showing it based on ID, get the current ID
        if (isset($_GET['post'])) {
            $post_id = $_GET['post'];
        } elseif (isset($_POST['post_ID'])) {
            $post_id = $_POST['post_ID'];
        }

        if (!$post_id) {
            return $display;
        }

        $slug = get_post($post_id)->post_name;

        // See if there's a match
        return in_array($slug, (array) $meta_box['show_on']['value']);
    }
}

// Initialize class
new customCMB2Class;
