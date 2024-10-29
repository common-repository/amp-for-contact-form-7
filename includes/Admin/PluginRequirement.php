<?php

/**
 * Create Admin Menu 
 *
 * @package    AMP for Contact Form 7
 * @subpackage AMP for Contact Form 7/admin
 * @author     Roni
 */

// Set Namespace.
namespace ESOFT\AMPCF7\INCLUDES\Admin;

class PluginRequirement
{
    function __construct()
    {
        add_action('admin_init', [$this, 'AMPCF7_status_check']);
    }

    function AMPCF7_status_check()
    {
        if (!function_exists('AMPCF7_installation_link')) {
            function AMPCF7_installation_link($name)
            {
                $slug = $name;
                $action = 'install-plugin';
                $amp_install_url = wp_nonce_url(
                    add_query_arg(
                        array(
                            'action' => $action,
                            'plugin' => $slug
                        ),
                        admin_url('update.php')
                    ),
                    $action . '_' . $slug
                );
                return $amp_install_url;
            }
        }

        if (!function_exists('AMPCF7_activation_link')) {
            function AMPCF7_activation_link($name)
            {
                $plugin_name = $name;
                $action = 'activate';

                if (strpos($plugin_name, '/')) {
                    $plugin_name = str_replace('\/', '%2F', $plugin_name);
                }
                $url = sprintf(admin_url('plugins.php?action=' . $action . '&plugin=%s&plugin_status=all&paged=1&s'), $plugin_name);
                $_REQUEST['plugin'] = $plugin_name;
                $url = wp_nonce_url($url, $action . '-plugin_' . $plugin_name);
                return $url;
            }
        }

        $AMPCF7_c_1 = esc_html("This Plugin Depends On ", "AMPCF7");
        $AMPCF7_c_2 = esc_html(". So In Order To Work Properly, Please", "AMPCF7");
        $AMPCF7_id = esc_attr("message", "AMPCF7");
        $AMPCF7_class = esc_attr("error is-dismissible", "AMPCF7");

        $AMPCF7_amp_first = esc_html(" AMP First.", "AMPCF7");
        $AMPCF7_cf7_first = esc_html(" Contact Form 7 First.", "AMPCF7");

        $AMPCF7_amp_p_url = esc_url("//wordpress.org/plugins/amp/", "AMPCF7");
        $AMPCF7_cf7_p_url = esc_url("//wordpress.org/plugins/contact-form-7/", "AMPCF7");

        $AMPCF7_install = esc_html("Install", "AMPCF7");
        $AMPCF7_activate = esc_html("Activate", "AMPCF7");

        $AMPCF7_amp = esc_html("AMP", "AMPCF7");
        $AMPCF7_cf7 = esc_html("Contact Form 7", "AMPCF7");
        $AMPCF7_slas = esc_html("/", "AMPCF7");

        if (!is_plugin_active('contact-form-7/wp-contact-form-7.php') and !is_plugin_active('amp/amp.php')) {

            echo '<div id="' . $AMPCF7_id . '" class="' . $AMPCF7_class . '">
                <p>' . $AMPCF7_c_1 . '<a href="' . $AMPCF7_amp_p_url . '">' . $AMPCF7_amp . '</a> ' . $AMPCF7_c_2 . ' <a href="' . AMPCF7_installation_link('amp') . '">' . $AMPCF7_install . '</a> ' . $AMPCF7_slas . ' <a href="' . AMPCF7_activation_link('amp/amp.php') . '">' . $AMPCF7_activate . '</a>' . $AMPCF7_amp_first . '</p>
                </div>';

            echo '<div id="' . $AMPCF7_id . '" class="' . $AMPCF7_class . '">
                <p>' . $AMPCF7_c_1 . '<a href="' . $AMPCF7_cf7_p_url . '">' . $AMPCF7_cf7 . '</a>' . $AMPCF7_c_2 . '<a href="' . AMPCF7_installation_link('contact-form-7') . '">' . $AMPCF7_install . '</a> ' . $AMPCF7_slas . ' <a href="' . AMPCF7_activation_link('contact-form-7/wp-contact-form-7.php') . '">' . $AMPCF7_activate . '</a>' . $AMPCF7_cf7_first . '</p>
                </div>';

            deactivate_plugins('/' . AMPCF7_HANDLE . '/' . AMPCF7_HANDLE . '.php');
        }

        if (is_plugin_active('contact-form-7/wp-contact-form-7.php') and !is_plugin_active('amp/amp.php')) {
            echo '<div id="' . $AMPCF7_id . '" class="' . $AMPCF7_class . '">
                <p>' . $AMPCF7_c_1 . '<a href="' . $AMPCF7_amp_p_url . '">' . $AMPCF7_amp . '</a>' . $AMPCF7_c_2 . '<a href="' . AMPCF7_installation_link('amp') . '">' . $AMPCF7_install . '</a> ' . $AMPCF7_slas . ' <a href="' . AMPCF7_activation_link('amp/amp.php') . '">' . $AMPCF7_activate . '</a>' . $AMPCF7_amp_first . '</p>
                </div>';

            deactivate_plugins('/' . AMPCF7_HANDLE . '/' . AMPCF7_HANDLE . '.php');
        }

        if (!is_plugin_active('contact-form-7/wp-contact-form-7.php') and is_plugin_active('amp/amp.php')) {
            echo '<div id="' . $AMPCF7_id . '" class="' . $AMPCF7_class . '">
                <p>' . $AMPCF7_c_1 . '<a href="' . $AMPCF7_cf7_p_url . '">' . $AMPCF7_cf7 . '</a>' . $AMPCF7_c_2 . '<a href="' . AMPCF7_installation_link('contact-form-7') . '">' . $AMPCF7_install . '</a> ' . $AMPCF7_slas . ' <a href="' . AMPCF7_activation_link('contact-form-7/wp-contact-form-7.php') . '">' . $AMPCF7_activate . '</a> ' . $AMPCF7_cf7_first . '</p>
                </div>';

            deactivate_plugins('/' . AMPCF7_HANDLE . '/' . AMPCF7_HANDLE . '.php');
        }
    }
}
