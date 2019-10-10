<?php 
	$va_menu_color = $this->request->config->get('menu_color');
?>
<div><div id="topNavContainer">
<nav id="topNav"  class="navbar navbar-expand navbar-dark bg-primary">
		<a id="logo"  class="navbar-brand" href="<?php print $this->request->getBaseUrlPath(); ?>">
    <img src="<?php print $this->request->getUrlPathForThemeFile("graphics/logos/".$this->request->config->get('header_img'))?>" height="40" class="d-inline-block align-top" alt="">
  </a>
				<div class="collapse navbar-collapse">
<?php
		if ($this->request->isLoggedIn()) {
		?>
			<ul class="sf-menu navbar-nav mr-auto" >
	<?php
			print $va_menu_bar = $this->getVar('nav')->getHTMLMenuBar('menuBar', $this->request);
?>
			</ul>
<?php
			if ($this->request->user->canDoAction('can_quicksearch')) {
?>
					
					<!-- Quick search -->
<?php 	
						if ($vs_target_table = $this->request->config->get('one_table_search')) {	
							print caFormTag($this->request, 'Index', 'caQuickSearchForm', 'find/'.$vs_target_table, 'post', 'multipart/form-data', '_top', array('disableUnsavedChangesWarning' => true)); 
						} else {
							print caFormTag($this->request, 'Index', 'caQuickSearchForm', 'find/QuickSearch', 'post', 'multipart/form-data', '_top', array('disableUnsavedChangesWarning' => true)); 
						}
					
						if ($this->request->isLoggedIn() && ($this->request->user->getPreference('clear_quicksearch') == 'auto_clear')) { 
?>
						<input type="text" name="search" length="15" class="form-control mr-sm-2" id="caQuickSearchFormText" value="<?php print htmlspecialchars(Session::getVar('quick_search_last_search'), ENT_QUOTES, 'UTF-8'); ?>" onfocus="this.value='';"/>
<?php						
						} else {
?>
						<input type="text" name="search" length="15" class="form-control mr-sm-2" id="caQuickSearchFormText" value="<?php print htmlspecialchars(Session::getVar('quick_search_last_search'), ENT_QUOTES, 'UTF-8'); ?>" onfocus="<?php print htmlspecialchars($this->request->session->getVar('quick_search_last_search'), ENT_QUOTES, 'UTF-8'); ?>"/>	
<?php
						}
?>
						<button class="btn btn-outline-light my-2 my-sm-0" type="submit"><?php print _p(search)?></button>
						<!--<input type="hidden" name="no_cache" value="1"/>-->
					</form>
<?php
			}
		}
?>	
			</div><!-- END navWrapper -->
		<div style="clear:both;"><!--EMPTY--></div>
	</nav><!-- END topNav -->
</div><!-- END topNavContainer --></div>
<div id="main" class="width">
