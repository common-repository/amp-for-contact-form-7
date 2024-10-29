<?php

/**
 * Plugin Name:         AMP for Contact Form 7
 * Plugin URI:          http://www.rapidthemes.net/wp/plugins/fix-amp-contact-form7
 * Description:         Contact Form 7 With amp Plugin.
 * Author:              eSoft Arena Limited
 * Author URI:          http://www.esoftarena.com/
 * Version:             1.3.2
 * License:             GPL-2.0+
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:         AMPCF7
 * Domain Path:         /languages
 * Copyright 2019-2020 by esoftarena
 */

// Initialized Namespace.
namespace ESOFT\AMPCF7;

// If this file is called directly, abort.
if (!defined('ABSPATH')) exit;

require_once __DIR__ . '/vendor/autoload.php';

if (!class_exists('AmpCF7')) :

    /**
     * Main AMP Contact Form 7 Class
     *
     * @since 1.2
     */

    final class AmpCF7
    {
        function __construct()
        {
            $this->define_constants();
            $this->load_dependencies();

            /**
             * Active Deactive Hook
             */
            register_activation_hook(__FILE__, [$this, 'activate_plugin']);
        }

        /**
         * Define All Constants
         */
        private function define_constants()
        {
            if (!defined('AMPCF7_NAME')) {
                define('AMPCF7_NAME', plugin_basename(__FILE__)); // Plugin Name
            }
            if (!defined('AMPCF7_HANDLE')) {
                define('AMPCF7_HANDLE', plugin_basename(dirname(__FILE__))); // Plugin Handle 
            }
            if (!defined('AMPCF7_PATH')) {
                define('AMPCF7_PATH', plugin_dir_path(__FILE__)); // Plugin Path
            }
            if (!defined('AMPCF7_URL')) {
                define('AMPCF7_URL', plugins_url('', __FILE__) . '/'); // Plugin URL
            }
            if (!defined('AMPCF7_VERSION')) {
                define('AMPCF7_VERSION', '1.3.2'); // Plugin Version
            }
        }

        /**
         * Divided Admin And Public Section
         */
        private function load_dependencies()
        {
            load_plugin_textdomain('AMPCF7', false, basename(dirname(__FILE__)) . '/languages');
            /**
             * Admin Section
             */
            if (is_admin()) {
                new INCLUDES\Admin\Admin();
            } else {
                new INCLUDES\FrontEnd\FrontEnd();
            }
        }

        /**
         * Plugin Active Function
         */
        public function activate_plugin()
        {
            new INCLUDES\activator();
        }
    }

endif; // End if class_exists check.

new AmpCF7;
