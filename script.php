<?php defined('_JEXEC') or die;

/**
 * File       script.php
 * Created    8/11/14 4:02 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */

/**
 * Script file
 */
class com_registrationInstallerScript
{
	/**
	 * method to install the component
	 *
	 * @return void
	 */
	function install($parent)
	{
		// $parent is the class calling this method
		$parent->getParent()->setRedirectURL('index.php?option=com_registration');
	}

	/**
	 * method to uninstall the component
	 *
	 * @return void
	 */
	function uninstall($parent)
	{
	}

	/**
	 * method to update the component
	 *
	 * @return void
	 */
	function update($parent)
	{
	}

	/**
	 * method to run before an install/update/uninstall method
	 *
	 * @return void
	 */
	function preflight($type, $parent)
	{
	}

	/**
	 * method to run after an install/update/uninstall method
	 *
	 * @return void
	 */
	function postflight($type, $parent)
	{
	}
}