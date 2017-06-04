	<div class="container">
						<!-- logotipo visibel apenas para telas < sm -->
						<div class="col-sm-12 visible-sm">
							<div class="hidden-xs col-sm-12 text-center">
								<a href="<?php echo home_url();?>">
									<img class="logo-home-normal" src="<?php echo get_theme_root_uri(); ?>/enovafoods/img/Logo_EnovaFoods.png"/>
								</a>
							</div>
						</div>
						<!-- logotipo visibel apenas para telas < sm -->

	<div class="col-xs-12 menu-principal" style="display:none">
							
	<?php 
		$args_menu = array(
			'theme_location' => 'header',
			'container' => false,
			'fallback_cb' => false,
			'menu_id' => 'menu-menu-principal'
		);
	wp_nav_menu($args_menu);
	?>

	</div>

	<!-- este logo desaparece a partir de sm-->
	<li id="logo-center" class="hidden-sm" style="list-style:none; display:none">
		<a href="<?php echo home_url();?>">
			<img class="logo-home-normal center-block" src="<?php echo get_theme_root_uri(); ?>/enovafoods/img/Logo_EnovaFoods.png" />
		</a>
	</li>	
</div>