<?php
/* ----------------------------------------------------------------------
 * themes/mana/views/find/search_advanced_form_html.php 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
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
 	
	$t_form = $this->getVar('t_form');
	$vn_form_id = $t_form->getPrimaryKey();
	
	if (!$vn_form_id) {
		//
		// no form defined
		//
?>
		<div class="alert alert-warning" role="alert">
			<?php print _t("You must define a search form before you can use the advanced search.").' '.caNavLink($this->request, _t('Click here to create a new form.'), '', 'manage', 'SearchForm', 'ListForms'); ?>
		</div>
<?php
	} else {
		if(!$t_form->haveAccessToForm($this->request->getUserID(), __CA_SEARCH_FORM_READ_ACCESS__, $vn_form_id)) {
			//
			// No access to form - shouldn't ever happen
			//
?>
			<div class="alert alert-danger" role="alert">
				<h4 class="alert-heading">
					<?php print _t('You do not have access to this form'); ?>
				</h4>
			</div>
<?php
		} else {
			//
			// Generate form
			//
			
			$va_form_element_list = $this->getVar('form_elements');
			$va_flds = array();
			foreach($va_form_element_list as $vn_i => $va_element) {
				$va_flds[] = "'".$va_element['name']."'";
			}
?>
	<div class="jumbotron">
		<?php print caFormTag($this->request, 'Index', 'AdvancedSearchForm', null, 'post', 'multipart/form-data', '_top', array('disableUnsavedChangesWarning' => true)); ?>
				<?php print $this->render('Search/search_forms/search_form_table_html.php'); ?>
			<div class="form-row">
				<?php print caJSButton($this->request, __CA_NAV_ICON_CANCEL__, _t("Reset"), 'AdvancedSearchFormReset', array('onclick' => 'caAdvancedSearchFormReset()'), array()); ?>			
				<?php print caJSButton($this->request, __CA_NAV_ICON_SEARCH__, _t("Search"), 'AdvancedSearchFormSearch', array('onclick' => 'jQuery("#AdvancedSearchForm").submit();'), array()); ?> 
			</div>
			<hr class="my-4">
			<div class="form-row justify-content-end">
				<div class="col-6">
					<span><?php print _t("Save search as"); ?>:</span>
					<?php print caHTMLTextInput('_label', array('class'=>'form-control','id' => 'caAdvancedSearchSaveLabelInput')); ?>
					<a href="#" onclick="caSaveSearch('AdvancedSearchForm', jQuery('#caAdvancedSearchSaveLabelInput').val(), [<?php print join(',', $va_flds); ?>]); return false;" class="button"><?php print caNavIcon(__CA_NAV_ICON_GO__, "18px"); ?></a>
				</div>
			</div>
		</form>
	</div>
<?php
		}
	}
?>

<script type="text/javascript">
	function caSaveSearch(form_id, label, field_names) {
		var vals = {};
		jQuery(field_names).each(function(i, field_name) { 					// process all fields in form
			var field_name_with_no_period = field_name.replace('.', '_');	// we need a bundle name without periods for compatibility
			vals[field_name] = jQuery('#' + form_id + ' [id=' + field_name_with_no_period + ']').val();
		});
		vals['_label'] = label;											// special "display" title, used if all else fails
		vals['_field_list'] = field_names;								// an array for form fields to expect
		vals['_form_id'] = <?php print (int)$vn_form_id; ?>;			// the current form_id, if running with an interface that passed a form_id
		
		jQuery.getJSON('<?php print caNavUrl($this->request, $this->request->getModulePath(), $this->request->getController(), "addSavedSearch"); ?>', vals, function(data, status) {
			if ((data) && (data.md5)) {
				jQuery('.savedSearchSelect').prepend(jQuery("<option></option>").attr("value", data.md5).text(data.label)).attr('selectedIndex', 0);
					
			}
		});
	}
	
	function caAdvancedSearchFormReset() {
		jQuery('#AdvancedSearchForm textarea').val('');
		jQuery('#AdvancedSearchForm input[type=text]').val('');
		jQuery('#AdvancedSearchForm input[type=hidden]').val('');
		jQuery('#AdvancedSearchForm select').val('');
		jQuery('#AdvancedSearchForm input[type=checkbox]').attr('checked', 0);
	}
</script>