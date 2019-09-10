<?php
/* ----------------------------------------------------------------------
 * views/dashboard/available_widget_list_html.php : 
 * ----------------------------------------------------------------------
 * * Israel Ministry of Sports and Culture 
 * 
 * Theme for CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * For more information about Israel Ministry of Sports and Culture visit:
 * https://www.gov.il/en/Departments/ministry_of_culture_and_sport
 *
 * For more information about CollectiveAccess visit:
 * http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license.
 *
 * This theme for CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details. 
 *
 * ----------------------------------------------------------------------
 */
 
	$o_widget_manager = $this->getVar('widget_manager');
	$va_widget_list = $o_widget_manager->getWidgetNames();
	
	print caFormTag($this->request, 'addWidget', 'caWidgetManagerForm', null, 'post', 'multipart/form-data', '_top', array('disableUnsavedChangesWarning' => true));
?>
		<input type="hidden" name="widget" value="" id='caWidgetManagerFormWidgetValue'/>
<?php
	foreach($va_widget_list as $vs_widget_name) {
		$va_status = WidgetManager::checkWidgetStatus($vs_widget_name);
		if(!$va_status["available"]) continue;
		
		print "<a href='#' onclick='jQuery(\"#caWidgetManagerFormWidgetValue\").val(\"{$vs_widget_name}\"); jQuery(\"#caWidgetManagerForm\").submit();'>".caNavIcon(__CA_NAV_ICON_ADD_WIDGET__, 1)."  ".$o_widget_manager->getWidgetTitle($vs_widget_name)."</a><br/>\n";
		print "<div id='widgetDescription'>".$o_widget_manager->getWidgetDescription($vs_widget_name)."</div>";
	}
?>
	</form>