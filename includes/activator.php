<?php

/**
 * Fired during plugin activation
 *
 * @link       http://
 * @since      1.2
 *
 * @package    AMP for Contact Form 7
 * @subpackage AMP for Contact Form 7/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.2
 * @package    AMP for Contact Form 7
 * @subpackage AMP for Contact Form 7/includes
 * @author     Roni
 */

// Set Namespace.
namespace ESOFT\AMPCF7\INCLUDES;

class activator
{

	/**
	 * Active Plugin
	 *
	 * @since    1.2
	 */

	public function __construct()
	{

		$this->Create_Table();
	}

	/**
	 * Create Table
	 *
	 * @since    1.2
	 */

	private function Create_Table()
	{
		return true;
	}
}
