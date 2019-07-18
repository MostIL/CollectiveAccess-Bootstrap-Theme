<div class="alert alert-danger" role="alert">
	<?php
	print "<p>"._t("Errors occurred when trying to access")." <code>".$this->getVar('referrer')."</code>:</p>";
	?>

	<ul>
		<?php
			foreach($this->getVar("error_messages") as $vs_message) {
				print "<li>$vs_message </li>\n";
			}
		?>
	</ul>
</div>