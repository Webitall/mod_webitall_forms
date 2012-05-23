<?php
/**
 * @version		$Id: default.php 21322 2011-05-11 01:10:29Z dextercowley $
 * @package		Joomla.Site
 * @subpackage	mod_login
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive'); 
JHTML::_('behavior.formvalidation');
if($form->form_placeholder){
	JHTML::_('behavior.mootools');
}
?>
<form action="<?php echo JRoute::_('index.php', true); ?>" method="post" id="subscribe-form" class="form-validate" onSubmit="return myValidate(this);">
<?php echo $generatedform; ?>
<input type="hidden" name="task" value="form.sendForm">
<input type="hidden" name="view" value="form">
<input type="hidden" name="option" value="com_webitall_forms">
<input type="hidden" name="formid" value="<?php echo $FormID;?>">
<input type="hidden" name="Itemid" value="<?php echo $Itemid;?>">
<? if($form->form_url){ ?>
	<input type="hidden" name="wform[url]" value="<? echo JURI::base();?>">
<? } ?>
<?php echo JHtml::_('form.token'); ?>
</form>
<?
if($form->form_placeholder){ ?>
<script>
window.addEvent('domready', function() {
	var wFields=new Array();
	
	$$('.placeholder').addEvent('click', function(){
		wFields[this.get('name')] = this.get('value');
		this.set('value', '');
		
	});
	$$('.placeholder').addEvent('mouseleave', function(){
		if(!this.get('value')){
			this.set('value', wFields[this.get('name')]);
		}
	});
});
</script>
<? } ?>