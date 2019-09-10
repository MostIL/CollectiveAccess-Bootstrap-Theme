<?php
/** ---------------------------------------------------------------------
 * views/system/configuration_error_intstall_html.php : 
 * ----------------------------------------------------------------------
 * Israel Ministry of Sports and Culture 
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
		$va_tmp = explode("/", str_replace("\\", "/", $_SERVER['SCRIPT_NAME']));
		array_pop($va_tmp);
		$vs_path = join("/", $va_tmp);
?>
<?php print _t("<div class='error'>An error in your system configuration has been detected</div>
	    General installation instructions can be found
	    <a href='http://wiki.collectiveaccess.org/index.php?title=Installation_(Providence)' target='_blank'>here</a>.
	    For more specific hints on the existing issues please have a look at the messages below."); ?>
	<br/><br/>
<?php
foreach (self::$opa_error_messages as $vs_message):
?>
		<div class="permissionError">
			<?php print caNavIcon(__CA_NAV_ICON_ALERT__ , 2, array('class' => 'permissionErrorIcon')); ?>
			<?php print $vs_message; ?>
			<div style='clear:both; height:1px;'><!-- empty --></div>
		</div>
		<br/>
<?php
endforeach;
?>
