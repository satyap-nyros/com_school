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

jimport('joomla.application.component.controllerform');

/**
 * Parent controller class.
 */
class SchoolControllerParent extends JControllerForm
{

    function __construct() {
        $this->view_list = 'parents';
        parent::__construct();
    }

}
