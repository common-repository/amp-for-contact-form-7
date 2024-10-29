<?php

/**
 * The admin Main functionality of the plugin.
 * 
 *
 * @package    AMP for Contact Form 7
 * @subpackage AMP for Contact Form 7/admin
 * @author     Roni
 */

// Set Namespace.
namespace ESOFT\AMPCF7\INCLUDES\Admin;

class Admin
{

    public function __construct()
    {
        new Menu();
        new PluginRequirement();
        add_action('admin_enqueue_scripts', [$this, 'admin_hooks']);
    }

    /**
     * Enqueue Css And JS
     */

    public function admin_hooks()
    {
        wp_enqueue_script('ampcf7-admin-script', AMPCF7_URL . 'includes/Admin/Assets/js/admin.js', array('jquery'), AMPCF7_VERSION, true);
        wp_localize_script('ampcf7-admin-script', 'ampcf7Ajax', array('ajaxurl' => admin_url('admin-ajax.php'), 'ampcf7url' => AMPCF7_URL, 'ampcf7homeurl' => get_bloginfo('url')));
        wp_enqueue_style('ampcf7-admin-style', AMPCF7_URL . 'includes/Admin/Assets/css/admin.css');
    }
}
