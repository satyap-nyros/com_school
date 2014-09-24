<?php
/**
 * @version     1.0.0
 * @package     com_school
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      vinod <prattipati.satyanarayana@gmail.com> - http://
 */


// no direct access
defined('_JEXEC') or die;

//for our custom laguage traslation active
$lang =& JFactory::getLanguage();
$lang->load('com_school',JPATH_ROOT,'en-GB');

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_school')) 
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

$controller	= JControllerLegacy::getInstance('School');

$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();


