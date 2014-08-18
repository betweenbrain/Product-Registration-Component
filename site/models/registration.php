<?php defined('_JEXEC') or die;

/**
 * File       registration.php
 * Created    8/11/14 1:43 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */

jimport('joomla.application.component.modelform');

class RegistrationModelRegistration extends JModelForm
{

	/**
	 * @param array $data
	 * @param bool  $loadData
	 *
	 * @return bool
	 */
	public function getForm($data = array(), $loadData = true)
	{

		$form = $this->loadForm('com_registration.registration', 'registration', array('control' => 'jform', 'load_data' => true));

		if (empty($form))
		{
			return false;
		}

		return $form;

	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return    mixed    The data for the form.
	 * @since    1.6
	 */
	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState('com_registration.edit.registration.data', array());

		return $data;
	}
}
