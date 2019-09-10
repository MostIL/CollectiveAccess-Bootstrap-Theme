<?php
/**
 * ----------------------------------------------------------------------
 * views/pageFormat/notifications.php: 
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
 */

		if (sizeof($this->getVar('notifications'))) {
			foreach($this->getVar('notifications') as $va_notification) {
				switch($va_notification['type']) {
					case __NOTIFICATION_TYPE_ERROR__:
						print '<div class="notification-error-box rounded">';
						print '<ul class="notification-error-box">';
						print "<li class='notification-error-box'>".$va_notification['message']."</li>\n";
						break;
					case __NOTIFICATION_TYPE_WARNING__:
						print '<div class="notification-warning-box rounded">';
						print '<ul class="notification-warning-box">';
						print "<li class='notification-warning-box'>".$va_notification['message']."</li>\n";
						break;
					default:
						print '<div class="notification-info-box rounded">';
						print '<ul class="notification-info-box">';
						print "<li class='notification-info-box'>".$va_notification['message']."</li>\n";
						break;
				}
?>
					</ul>
				</div>
<?php
			}
		}
?>