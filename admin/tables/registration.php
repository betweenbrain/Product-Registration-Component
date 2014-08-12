<?php defined('_JEXEC') or die;

/**
 * File       registration.php
 * Created    8/12/14 11:57 AM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */
class RegistrationTableregistration extends JTable
{
	var $firstName = null;
	var $lastName = null;
	var $email = null;
	var $company = null;
	var $country = null;
	var $address = null;
	var $productType = null;
	var $serialNumber = null;
	var $purchasedFrom = null;
	var $purchaseDate = null;

	function __construct(&$db)
	{
		parent::__construct('#__registrations', 'id', $db);
	}
}
