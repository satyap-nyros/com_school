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

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_school', JPATH_ADMINISTRATOR);
$canEdit = JFactory::getUser()->authorise('core.edit', 'com_school');
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_school')) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>
<?php if ($this->item && $this->item->state == 1) : ?>

    <div class="item_fields">
        <table class="table">
            <tr>
			<th><?php echo JText::_('COM_SCHOOL_FORM_LBL_STUDENT_ID'); ?></th>
			<td><?php echo $this->item->id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_SCHOOL_FORM_LBL_STUDENT_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_SCHOOL_FORM_LBL_STUDENT_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_SCHOOL_FORM_LBL_STUDENT_NAME'); ?></th>
			<td><?php echo $this->item->name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_SCHOOL_TITLE_PARENT'); ?></th>
			<td><?php 
				$db =& JFactory::getDBO();       
				$query  = $db->getQuery(true);					
				$query->select('*')
				      ->from('#__school_parents')
				      ->where('id = '.$this->item->parent_id);
				$db->setQuery($query,0,1);
				$row = $db->loadObject();
				echo $row->name; ?>
			</td>
</tr>
<tr>
			<th><?php echo JText::_('COM_SCHOOL_FORM_LBL_PARENT_PHONE'); ?></th>
			<td><?php echo $row->phone; ?></td>
</tr>

        </table>
    </div>
    <?php if($canEdit && $this->item->checked_out == 0): ?>
		<a class="btn" href="<?php echo JRoute::_('index.php?option=com_school&task=student.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_SCHOOL_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_school')):?>
									<a class="btn" href="<?php echo JRoute::_('index.php?option=com_school&task=student.remove&id=' . $this->item->id, false, 2); ?>"><?php echo JText::_("COM_SCHOOL_DELETE_ITEM"); ?></a>
								<?php endif; ?>
    <?php
else:
    echo JText::_('COM_SCHOOL_ITEM_NOT_LOADED');
endif;
?>
