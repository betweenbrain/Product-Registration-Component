<?php defined('_JEXEC') or die;

/**
 * File       registration.php
 * Created    8/12/14 12:38 AM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */

require_once JPATH_COMPONENT . '/controller.php';

class RegistrationControllerRegistration extends RegistrationController
{

	/**
	 * Method to save the form data.
	 *
	 * @param    array        The form data.
	 *
	 * @return    mixed        The user id on success, false on failure.
	 * @since    1.6
	 */
	public function save()
	{
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Get the user data.
		$data = JFactory::getApplication()->input->get('jform', array(), 'array');

		// Initialise variables.
		$model = $this->getModel('register', 'RegistrationModel');

		// Now update the loaded data to the database via a function in the model
		$registration = $model->submit($data);

		// check if ok and display appropriate message.  This can also have a redirect if desired.
		if ($registration)
		{
			echo "<h2>Registration has been saved</h2>";
		}
		else
		{
			echo "<h2>Registration failed to be saved</h2>";
		}

		return true;
	}
}
