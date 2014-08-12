<?php defined('_JEXEC') or die;

/**
 * File       save.php
 * Created    8/12/14 12:27 AM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */
jimport('joomla.application.component.modelform');

class RegistrationModelRegister extends JModelForm
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
	 * Gets the database table
	 *
	 * @param string $type
	 * @param string $prefix
	 * @param array  $config
	 *
	 * @return mixed
	 */
	public function getTable($type = 'Registration', $prefix = 'RegistrationTable', $config = array())
	{
		$this->addTablePath(JPATH_COMPONENT_ADMINISTRATOR . '/tables');

		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Submit data to the table
	 *
	 * @param $data
	 *
	 * @return bool
	 */
	public function submit($data)
	{

		// Create the array of new/amended fields/properties.
		$values = array(
			'firstName'     => $data['registration']['firstName'],
			'lastName'      => $data['registration']['lastName'],
			'email'         => $data['registration']['email'],
			'company'       => $data['registration']['company'],
			'country'       => $data['registration']['country'],
			'address'       => $data['registration']['address'],
			'productType'   => $data['registration']['productType'],
			'serialNumber'  => $data['registration']['serialNumber'],
			'purchasedFrom' => $data['registration']['purchasedFrom'],
			'purchaseDate' => $data['registration']['purchaseDate']
		);

		// Get the table object from the model.
		$table = $this->getTable();

		if ($table->save($values) === true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
