<?php
/** ---------------------------------------------------------------------
 * themes/mana/views/system/configuration_error_html.php : 
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
		
		if (!is_array($opa_error_messages)) {
			$opa_error_messages = self::$opa_error_messages;
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>CollectiveAccess configuration error display</title>
	<link href="<?php print $vs_path; ?>/themes/mana/css/bootstrap.css" rel="stylesheet" type="text/css" media='all'/>
	<link href='../assets/fontawesome/css/font-awesome.min.css' rel='stylesheet' type='text/css' media='all'/>
</head>
<body>
	<div class="container">
		<div class="card col-4">
		<img class="card-img-top" src="<?php print $vs_path ?>/themes/mana/graphics/logos/ca_logo.png"/><!-- end logo -->
			<div class="card-body">
				<?php print "<div class='alert alert-danger' role='alert'>An error in your system configuration has been detected</div>"?>
			<?php
			foreach ($opa_error_messages as $vs_message):
			?>
				<div class="alert alert-dark" role="alert">
					<?php print caNavIcon(__CA_NAV_ICON_ALERT__ , 2, array('class' => 'permissionErrorIcon')); ?>
					<?php print $vs_message;
						$date = new DateTime();
						$date = $date->format("y:m:d h:i:s");					
						error_log($date.' configuration error - '.$vs_message,3,'//192.168.106.146/opertaion/importLogs/mana/ConfigError.log')
					?>
				</div>
			<?php
			endforeach;
			?>
			</div><!-- end content -->
		</div><!-- end card -->
	</div>
</body>
</html>