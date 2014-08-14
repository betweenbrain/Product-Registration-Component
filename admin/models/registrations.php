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
	 * Get the items
	 *
	 * @return mixed
	 */
	public function getItems()
	{
		// Create a new query object.
		$db    = $this->getDbo();
		$query = $db->getQuery(true);

		$session = JFactory::getSession();
		$start   = $session->get('com_registration.registrations.date.start');
		$end     = $session->get('com_registration.registrations.date.end');

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
			->where($db->quoteName('purchaseDate') . ' >= ' . $db->quote($start)
				. ' AND ' . $db->quoteName('purchaseDate') . ' <= ' . $db->quote($end));

		$db->setQuery($query);

		return $db->loadRowList();
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
		$session = JFactory::getSession();
		$start   = $session->get('com_registration.registrations.date.start');
		$end     = $session->get('com_registration.registrations.date.end');

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
	 * Method to get the data that should be injected in the form.
	 *
	 * @return	mixed	The data for the form.
	 *
	 * @since	3.2
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState($this->context, new stdClass);

		// Pre-fill the list options
		if (!property_exists($data, 'list'))
		{
			$data->list = array(
				'direction' => null,
				'limit'     => null,
				'ordering'  => null,
				'start'     => null
			);
		}

		return $data;
	}

	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 */
	protected function populateState($ordering = null, $direction = null)
	{
		$input   = JFactory::getApplication()->input;
		$session = JFactory::getSession();

		// Get the form data
		$formData  = new JRegistry($input->get('jform', '', 'array'));
		$startDate = $formData->get('startDate', null);
		$endDate   = $formData->get('endDate', null);

		if ($startDate)
		{
			$session->set($this->context . '.date.start', $startDate);
		}
		if ($endDate)
		{
			$session->set($this->context . '.date.end', $endDate);
		}

	}
}
