<?php
/**
 * The template for displaying search forms 
 */
?>
	<form method="get" id="searchform" class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="searchbox" name="s" id="s" placeholder="Search..." />
		<input type="submit" class="searchbtn" name="submit" id="searchsubmit" value="Search" />
	</form>
