<?php
/*
Menu parte principal
*/

	$link_contato_page = get_page_link(163);// contato page
	$link_login_page = get_page_link(155);
	if( function_exists ( 'pll_get_post' ) ){
	// link para página de contato correta
		$link_contato_page = get_page_link(pll_get_post(163));
		$link_login_page = get_page_link(pll_get_post(155));
	}


?>

<nav class="navbar navbar-default ft-w-r ft-s-13 m-b-0 visible-xs white hidden-print">
	<div class="container-fluid">
		<div class="visible-xs" style="position: absolute; right: 30px;">
			<a class="mouse-over-busca">
				<img style="width: 20px; cursor: pointer;" class="m-r-20" src="<?php echo get_theme_root_uri(); ?>/enovafoods/img/icon-search.png"/>
			</a>

			<?php
			if(is_user_logged_in())
			{
				?>
				<a class="mouse-over-menu">
					<?php 
				}else{
					?>
					<a href="<?php echo $link_login_page; ?>">
						<?php } ?>
						<img style="width: 25px;" src="<?php echo get_theme_root_uri(); ?>/enovafoods/img/icon-user.png"/>
					</a>
				</div>
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed m-l-10" data-toggle="collapse" data-target="#abrirMenu" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="text-center" style="margin-left: -35px;">
						<a href="<?php echo home_url();?>">
							<img class="imgLogoEnovaResponsivo" src="<?php echo get_theme_root_uri(); ?>/enovafoods/img/Logo_EnovaFoods.png" alt="">
						</a>
					</div>
					<!-- <a class="navbar-brand" href="#"><div class="logoFoodTruck1"></div></a> -->
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="navbar-collapse collapse" id="abrirMenu" aria-expanded="false" style="height: 1px;">

					<!-- MENU MOBILE-->
					<?php get_template_part('parts/nav/nav', 'mobile') ?>

				</div>
			</div>
		</nav>

		<nav class="container-fluid navbar-normal hidden-xs white hidden-print">
			<div class="" style="position: absolute; right: 30px;">
				<a class="mouse-over-busca">
					<img style="width: 20px; cursor: pointer;" class="m-r-20" src="<?php echo get_theme_root_uri(); ?>/enovafoods/img/icon-search.png"/>
				</a>
				<?php
				if(is_user_logged_in())
				{
					?>
					<a class="mouse-over-menu">
						<?php 
					}else{
						?>
						<a href="<?php echo $link_login_page; ?>">
							<?php } ?>
							<img style="width: 25px;" src="<?php echo get_theme_root_uri(); ?>/enovafoods/img/icon-user.png"/>
						</a>

						<div class="login-menu">
							<a class="ft-gray" href="<?php echo $link_contato_page ?>">
								<?php _e('Configurações', 'enova-foods') ?>
							</a>
							<a class="ft-red" href=" <?php echo wp_logout_url( get_permalink() ); ?> ">
								<?php _e('Sair', 'enova-foods') ?>
							</a>
						</div>
					</div>

					<!-- menu big Screens folder(parts/nav)-->
					<?php get_template_part( 'parts/nav/nav', 'bigScreen' ); ?>
					
				</nav>

				<!-- NAVBUSCA -->
				<?php get_template_part('parts/nav/nav', 'busca') ?>


				<!-- !Abrir menu marcas -->
				<?php get_template_part('parts/nav/nav', 'marcas') ?>
				

