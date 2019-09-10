<?php
/** ---------------------------------------------------------------------
 * views/system/configuration_error_schema_update_html.php : 
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>CollectiveAccess database update</title>
	<link href="<?php print $vs_path; ?>/themes/default/css/error.css" rel="stylesheet" type="text/css" media='all'/>
	<link href='../assets/fontawesome/css/font-awesome.min.css' rel='stylesheet' type='text/css' media='all'/>
</head>
<body>
	<div id='box'>
	<div id="logo"><img src="<?php print $vs_path ?>/themes/default/graphics/logos/ca_logo.png"/></div><!-- end logo -->
	<div id="content">
		<div class='error'><?php print _t("Updating your database..."); ?></div>
<?php
flush();
$va_messages = self::performDatabaseSchemaUpdate();
?>

<?php
	$vb_has_error = false;
	foreach($va_messages as $vs_key => $vs_message) {
?>
		<div class="permissionError">
<?php
		if(preg_match('!^error_!', $vs_key)) {
			$vb_has_error = true;
?>
			<?php print caNavIcon(__CA_NAV_ICON_ALERT__ , 2, array('class' => 'permissionErrorIcon')); ?>
<?php
			print "{$vs_message}";
		} else {
?>
			<?php print caNavIcon(__CA_NAV_ICON_ALERT__ , 2, array('class' => 'permissionErrorIcon')); ?>
<?php
			print "{$vs_message}";
		}
?>
			<div style='clear:both; height:1px;'><!-- empty --></div>
		</div>
<?php
	}
?>

<div class='contentSuccess' style='align: center;'>
<?php
	if ($vb_has_error) {
		print _t("Errors occurred while performing the update. <a href='%1/index.php'>Return to the login screen</a>.", __CA_URL_ROOT__); 
	} else {
		print _t("Update complete. You can now <a href='%1/index.php'>log into your system</a>", __CA_URL_ROOT__); 
	}
?>
</div>
</div><!-- end content --></div><!-- end box -->
</body>
</html>