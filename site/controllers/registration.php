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
		$app   = JFactory::getApplication();
		$model = $this->getModel('register', 'RegistrationModel');

		// Validate the posted data.
		$form = $model->getForm();
		if (!$form)
		{
			JError::raiseError(500, $model->getError());

			return false;
		}

		// Validate the posted data.
		$data = $model->validate($form, $data);

		// Check for errors.
		if ($data === false)
		{
			// Get the validation messages.
			$errors = $model->getErrors();

			// Push up to three validation messages out to the user.
			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++)
			{
				if ($errors[$i] instanceof Exception)
				{
					$app->enqueueMessage($errors[$i]->getMessage(), 'warning');
				}
				else
				{
					$app->enqueueMessage($errors[$i], 'warning');
				}
			}

			$input = $app->input;
			$jform = $input->get('jform', array(), 'ARRAY');

			// Save the data in the session.
			$app->setUserState('com_registration.edit.registration.data', $jform, array());

			// Redirect back to the edit screen.
			$this->setRedirect(JRoute::_('index.php?option=com_registration', false));

			return false;
		}

		// Now update the loaded data to the database via a function in the model
		$registration = $model->submit($data);

		// Check for errors.
		if ($registration === false)
		{
			// Save the data in the session.
			$app->setUserState('com_registration.edit.registration.data', $data);

			// Redirect back to the edit screen.
			$this->setMessage(JText::sprintf('Save failed', $model->getError()), 'warning');
			$this->setRedirect(JRoute::_('index.php?option=com_registration', false));

			return false;
		}

		// Clear the profile id from the session.
		$app->setUserState('com_registration.edit.registration.id', null);

		// Redirect to the list screen.
		$this->setMessage(JText::_('COM_REGISTRATION_ITEM_SAVED_SUCCESSFULLY'));
		$menu = JFactory::getApplication()->getMenu();
		$item = $menu->getActive();
		$url  = (empty($item->link) ? 'index.php?option=com_registration' : $item->link);
		$this->setRedirect(JRoute::_($url, false));

		// Flush the data from the session.
		$app->setUserState('com_registration.edit.registration.data', null);

	}
}
