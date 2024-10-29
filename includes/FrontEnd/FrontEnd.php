<?php

/**
 * The FrontEnd Main functionality of the plugin.
 * 
 *
 * @package    AMP for Contact Form 7
 * @subpackage AMP for Contact Form 7/Frontend
 * @author     Roni
 */

// Set Namespace.
namespace ESOFT\AMPCF7\INCLUDES\FrontEnd;

class FrontEnd
{

    function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'frontend_hooks']);
        new Cf7();
    }

    /**
     * Enqueue Css And JS
     */

    function frontend_hooks()
    {
        wp_enqueue_style('ampcf7-frontend-style', AMPCF7_URL . 'includes/FrontEnd/Assets/css/FrontEnd.css');
    }
}
