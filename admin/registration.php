<?php defined('_JEXEC') or die;

/**
 * File       registration.php
 * Created    8/11/14 1:28 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */

// Get an instance of the controller prefixed by Registration
$controller = JControllerLegacy::getInstance('Registration');

// Perform the Request task
$controller->execute(JFactory::getApplication()->input->getCmd('task'));

// Redirect if set by the controller
$controller->redirect();