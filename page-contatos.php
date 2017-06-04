
<?php 

/* 
 Template Name:Contatos

*/

$link_to_contato = get_page_link(171);
$page_login = get_page(155);

if( function_exists ( 'pll_get_post' ) ){
	// link para página de contato correta
	$link_to_contato = get_page_link(pll_get_post(171));
	$page_login = get_page_link(pll_get_post(155));
	
}

get_header();
is_page('contatos');

if(is_user_logged_in()){
	header("Location:" . $link_to_contato );
}
?>


<header>
	<section class="container-fluid" style="background:url('<?php echo get_theme_root_uri(); ?>/enovafoods/img/contato-background.jpg');background-size: cover; background-position: center;">
		<div class="container col-xs-12 col-sm-10 col-md-11 col-lg-8 col-centered">
			<div class="row m-t-60 m-b-60">
				<div class="col-xs-12">
					<div class="col-xs-12 conteudo-banner-contatos">
						<div class="col-xs-12 col-md-7 text-center m-t-20 m-b-20">
							<div class="row">
								<div class="ft-w-r ft-s-13 lh24 text-center">
								<?php _e( 'Para enviar uma mensagem é necessário estar logado. Entre com sua conta ou se você ainda não possui uma, cadastre-se preenchendo os campos abaixo', 'enova-foods'); ?></div>
								<a href="<?php echo $page_login;  ?>"> 
									<button type="button" class="btn btn-lg orange m-t-20 p-l-30 p-r-30">
										<?php _e('Já tenho uma conta Enova', 'enova-foods');?>
									</button></a>
								<div class="separador-ou" style="position: absolute; margin-top: 17px; width: 100%;">
									<div class="ou-separador" style="background-color: white; margin: 0 auto; width: 40px;">
										<?php _e( 'OU', 'enova-foods'); ?>
									</div>
								</div>
								<div class="separador m-l-20" style="width: 94%;"></div>
							</div>
							<div>
								<div class="row">
									<div> 
										
										<?php
										
										while(have_posts())
										{
											the_post();
											the_content();
										}?>
										
									</div>        
								</div>
							</div>
							<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-1 m-t-20 m-b-20">

								<?php get_template_part('parts/pages/page', 'info'); ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</header>

	<?php get_footer(); ?>