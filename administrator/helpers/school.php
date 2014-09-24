<?php

/**
 * @version     1.0.0
 * @package     com_school
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      vinod <prattipati.satyanarayana@gmail.com> - http://
 */
// No direct access
defined('_JEXEC') or die;

/**
 * School helper.
 */
class SchoolHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
		
        		JHtmlSidebar::addEntry(
			JText::_('COM_SCHOOL_TITLE_PARENTS'),
			'index.php?option=com_school&view=parents',
			$vName == 'parents'
		);
			JHtmlSidebar::addEntry(
			JText::_('COM_SCHOOL_TS_STUDENTS'),
			'index.php?option=com_school&view=students',
			$vName == 'students'
		);

    }

    /**
     * Gets a list of the actions that can be performed.
     *
     * @return	JObject
     * @since	1.6
     */
    public static function getActions() {
        $user = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_school';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }


}
