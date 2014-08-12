<?php defined('_JEXEC') or die;

/**
 * File       registration.php
 * Created    8/12/14 1:03 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */

jimport('joomla.application.component.modelform');

class RegistrationModelRegistrations extends JModelList
{

	/**
	 * @param array $data
	 * @param bool  $loadData
	 *
	 * @return bool
	 */
	public function getForm($data = array(), $loadData = true)
	{

		$form = $this->loadForm('com_registration.registrations', 'registrations', array('control' => 'jform', 'load_data' => true));

		if (empty($form))
		{
			return false;
		}

		return $form;

	}

	/**
	 * Build an SQL query to load the list data.
	 *
	 * @return    JDatabaseQuery
	 * @since    1.6
	 */
	protected function getListQuery()
	{
		// Create a new query object.
		$db    = $this->getDbo();
		$query = $db->getQuery(true);

		$input = JFactory::getApplication()->input->get('jform', array(), 'ARRAY');

		$query
			->select($db->quoteName(
					array(
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
					)
				)
			)
			->from($db->quoteName('#__registrations'))
			->where($db->quoteName('purchaseDate') . ' > ' . $db->quote($input['registrations']['startDate']));

		// Add the list ordering clause.
		$orderCol  = $this->state->get('list.ordering');
		$orderDirn = $this->state->get('list.direction');

		if ($orderCol && $orderDirn)
		{
			$query->order($db->escape($orderCol . ' ' . $orderDirn));
		}

		return $query;
	}

	/**
	 *
	 *
	 * @return mixed
	 */
	public function getItems()
	{
		$items = parent::getItems();

		return $items;
	}

	/**
	 * Get database columns
	 * 
	 * @return mixed
	 */
	public function getColumns()
	{
		// Get the table object from the model.
		$table = $this->getTable();

		return $table->getFields();
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
}
