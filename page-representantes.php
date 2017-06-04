<?php 
/*
Template Name: Representantes
*/

// pega o correto link para pagina de contato de acordo com o idioma
if(function_exists ( 'get_page_link'))
	$link_contato_page = get_page_link(pll_get_post(171));
?>


<?php get_template_part('parts/pages/page', 'repr_static'); // parte estatica da página?>
	

	<section class="container">
		<div class="row m-t-20">
			<?php
			// verifica qual arquivo se deve carregar ´p
			if(isset($_GET["termo"]) && $_GET["termo"] != ''  && $_GET["termo"]  != ' '){				
				get_template_part('parts/pages/page', 'repr_termos');
			}else{
				get_template_part('parts/pages/page', 'repr_default');
			} ?>
		</div>
		
		
	</section>

	<section class="container">
		<div class="row m-t-20 m-b-80 pull-right">
			<div class="ft-red ft-w-sb">
				<a href="<?php echo $link_contato_page;//pega o link correto de acordo com o idioma atual ?>">
					<?php _e('Seja um representante da Enova Foods', 'enova-foods'); ?>
					 <i class="fa fa-angle-double-right"></i>
				</a>
			</div>
		</div>
	</section>

</header>

<?php get_footer(); ?>