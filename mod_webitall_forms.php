<?php

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once( JPATH_SITE . DS . 'components' . DS . 'com_webitall_forms' . DS .'helpers'.DS.'helper.php' );

$FormID		= $params->get('form_id');	
$Itemid		= JRequest::getInt('Itemid', 0);

$user		= JFactory::getUser();
$app		= JFactory::getApplication();
$db			=& JFactory::getDBO();

	$Formquery = "SELECT * FROM #__webitall_forms WHERE state = 1 AND id = '$FormID'";
	$db->setQuery($Formquery);
	$form = $db->loadObject();
	
	$Fieldsquery = "SELECT * FROM #__webitall_forms_fields WHERE form_id = '$FormID'";
	$db->setQuery($Fieldsquery);
	$fields = $db->loadObjectlist();
		
$generatedform 	= Webitall_formsHelper::GenerateForm($form, $fields);


require JModuleHelper::getLayoutPath('mod_webitall_forms');