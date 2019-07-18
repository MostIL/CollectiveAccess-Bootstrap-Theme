<?php
/* ----------------------------------------------------------------------
 * themes/default/views/find/Search/search_forms/search_form_table_html.php 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2009-2011 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * ----------------------------------------------------------------------
 */
 
	$va_form_element_list = $this->getVar('form_elements');
	
	$va_settings = $this->getVar('settings');
	if (!($vn_num_columns = $va_settings['form_width'])) { $vn_num_columns = 2; }
	print '<div>';
		$vn_c = 1;
		foreach($va_form_element_list as $vn_index => $va_element) {
			if ($vn_c == 1) {
				print '<div class="row">';
			}
			
			print "<div class='col form-group'><label>".$va_element['label']."</label>\n".$va_element['element']."</div>\n";
		
			if ($vn_c == $vn_num_columns) {
				$vn_c = 1;
				print "</div>\n";
			}else{
				$vn_c++;
			}
		}
		if ($vn_c != 1) {
			print "</div>\n";
		}

	print "</div>\n";
?>