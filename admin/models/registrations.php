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

		$start = $this->state->get('date.start');
		$end   = $this->state->get('date.end');

		$query
			->select($db->quoteName(
					array(
						'id',
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
			->where($db->quoteName('purchaseDate') . ' > ' . $db->quote($start)
				. ' AND ' . $db->quoteName('purchaseDate') . ' < ' . $db->quote($end));

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
	public function getColumnNames()
	{
		// Get the table object from the model.
		$table   = $this->getTable();
		$pattern = '/[A-Z]/';
		foreach ($table->getFields() as $field => $values)
		{
			$fields[] = ucwords(preg_replace($pattern, ' $0', $field));
		}

		return $fields;
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
	 * Generates a CSV file
	 */
	public function getCsv()
	{
		$input = JFactory::getApplication()->input;
		$start = $input->get('startDate');
		$end   = $input->get('endDate');

		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=product-registrations-' . $start . '-' . $end . '.csv');

		// create a file pointer connected to the output stream
		$output = fopen('php://output', 'w');

		// output the column headings
		fputcsv($output, $this->getColumnNames());

		// loop over the rows, outputting them
		foreach ($this->getItems() as $item)
		{
			fputcsv($output, (array) $item);
		}

		// Close file pointer
		fclose($output);

		// Prevent further output
		exit();

	}

	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 */
	protected function populateState($ordering = null, $direction = null)
	{
		$input = JFactory::getApplication()->input->get('jform', array(), 'ARRAY');

		$app = JFactory::getApplication('administrator');

		if (array_key_exists('registrations', $input))
		{
			if (array_key_exists('startDate', $input['registrations']))
			{
				$startDate = $app->setUserState($this->context . '.date.start', $input['registrations']['startDate']);
				$this->setState('date.start', $startDate);
			}

			if (array_key_exists('endDate', $input['registrations']))
			{
				$endDate = $app->setUserState($this->context . '.date.end', $input['registrations']['endDate']);
				$this->setState('date.end', $endDate);
			}
		}
	}
}
