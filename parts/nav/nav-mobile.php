<?php 
		$args_menu = array(
			'theme_location' => 'header',
			'menu_class' => 'nav navbar-nav text-center',
			'menu_id' => 'header-mobile', 
			'container' => false,
			'fallback_cb' => false
		);
	wp_nav_menu($args_menu);
?>

