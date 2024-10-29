<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       http://www.rapidthemes.net/wp/plugins/fix-amp-contact-form7
 * @since      1.2
 *
 * @package    AMP for Contact Form 7
 */

// If uninstall not called from WordPress, then exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
	exit;
}

new Plugin_Uninstall;

class Plugin_Uninstall
{

	/**
	 * Unistall Plugin
	 *
	 * @since    1.2
	 */

	public function __construct()
	{
		delete_option('active_captcha');
		delete_option('ampcf7_captchakey');
		delete_option('ampcf7_sucmessage');
	}
}
