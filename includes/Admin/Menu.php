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

class Menu
{

	public $user_level = 'manage_options';

	public function __construct()
	{
		add_action('admin_menu', [$this, 'register_menu_page']);
	}

	/**
	 * Register Admin Menu
	 */

	function register_menu_page()
	{
		return true;
	}
}
