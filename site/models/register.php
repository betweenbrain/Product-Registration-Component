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

	public function submit($data)
	{

		$db      = JFactory::getDbo();
		$query   = $db->getQuery(true);
		$columns = array(
			'firstName',
			'lastName',
			'email',
			'company',
			'country',
			'address',
			'productType',
			'serialNumber',
			'purchasedFrom',
			'purchaseDate'
		);
		$values  = array(
			$db->quote($data['registration']['firstName']),
			$db->quote($data['registration']['lastName']),
			$db->quote($data['registration']['email']),
			$db->quote($data['registration']['company']),
			$db->quote($data['registration']['country']),
			$db->quote($data['registration']['address']),
			$db->quote($data['registration']['productType']),
			$db->quote($data['registration']['serialNumber']),
			$db->quote($data['registration']['purchasedFrom']),
			$db->quote($data['registration']['purchaseDate'])
		);
		$query
			->insert($db->quoteName('#__registrations'))
			->columns($db->quoteName($columns))
			->values(implode(',', $values));

		$db->setQuery($query);

		if (!$db->query())
		{
			JError::raiseError(500, $db->getErrorMsg());

			return false;
		}
		else
		{
			return true;
		}
	}
}
