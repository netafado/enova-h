<?php 
	/* Template name:Institucional */ 


	$link_contato_page = get_page_link(163);// contato page
	$link_contato_gdrive = get_page_link(1371);// gdrive

	if( function_exists ( 'pll_get_post' ) ){
		// link para página de contato correta
		$link_contato_page = get_page_link(pll_get_post(163));
		$link_contato_gdrive = get_page_link(pll_get_post(1371));// gdrive
	}

?>

<?php get_header();
is_page('institucional');
?>

<header>
	<section class="container-fluid"style="height:500px; background:url('<?php echo get_template_directory_uri(); ?>/img/banner-about-us3.jpg');background-size: cover;  background-position: center;">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="col-xs-12 col-md-7 col-centered conteudo-banner-sobre text-center" style="background-color: rgba(255, 255, 255, 0.9);">
						<div class="borda">
							<div class="ft-s-b ft-w-b ft-s-24 lh34 m-t-20 ft-dark-gray hidden-xs">
								<p style="padding: 0 50px">
									<?php the_field('page_institucional_tit_bnr'); ?>
								</p>
							</div>
							<div class="separador1 hidden-xs"></div>
							<h2 class="ft-w-r ft-s-13 lh24 text-center">
								<?php the_field('page_institucional_dsc_bnr'); ?>
							</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="container">
		<div class="row" style="background: #F3F7F8">
			<div class="col-xs-12 col-sm-12 col-md-6">
				<div class="conteudo-estatico-home">
					<h2 class="ft-w-r ft-s-13 lh24">
						<?php the_field('page_institucional_txt_1'); ?>
					</h2>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6">
				<div class="conteudo-estatico-home">
					<h2 class="ft-w-r ft-s-13 lh24">
						<?php the_field('page_institucional_txt_2'); ?>
					</h2>
				</div>
			</div>
		</div>
	</section>

	<section class="container-fluid"style="height:500px;  background:url('<?php echo get_template_directory_uri(); ?>/img/banner-about-us4.jpg');background-size: cover;  background-position: center;">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="col-xs-12 col-md-4 conteudo-banner-sobre2 pull-right" style="background-color: rgba(255, 255, 255, 0);">
						<h1 class="ft-white ft-w-b ft-s-24">
							<?php the_field('page_institucional_tit_brn_2'); ?>
						</h1>
						<div class="separador2"></div>
						<h2 class="ft-w-r ft-s-13 lh24 ft-white">
							<?php the_field('page_institucional_dsc_bnr_2'); ?>
						</h2>
						<button type="button" class="btn btn-lg red m-t-30" onclick="abrirMarcas();">
							<?php _e('Conheça nossos produtos', 'enova-foods'); ?></button>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="container-fluid" hidden>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 m-t-80 m-b-30">
					<div class="col-xs-12 col-md-8 col-centered" style="background-color: rgba(255, 255, 255, 0);">
						<h1 class="ft-s-b ft-w-b ft-s-24 lh34 m-t-20 ft-dark-gray text-center">
							<?php the_field('page_institucional_tit_mda'); ?>
						</h1>
						<div class="separador1"></div>
						<h2 class="ft-w-r ft-s-13 lh24  m-b-30 text-center">
							<?php the_field('page_institucional_dsc_mda'); ?>
						</h2>
					</div>
					<div class="col-xs-8 col-centered carrousel-conteudo1">
						<?php 
						$links_ytb = get_field('page_institucional_lnk_ytb');
						$links = explode(',', $links_ytb);
						foreach ($links as $key) {
							?>
							<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
								<div class="prd-slider prd-video">
									<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo trim($key); ?>" frameborder="0" allowfullscreen></iframe>
								</div>
							</div>
							<?php
						};
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="container-fluid m-t-20" style="border-top: 1px solid #EEE">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-center m-t-40 m-b-50">
					<div class="ft-w-b">
						<?php _e('Arquivos da Marca para Desenvolvedores', 'enova-foods'); ?>
					</div>
					<div class="m-t-20 m-b-20 ft-w-r ft-s-13 lh24">
						<?php _e('Estamos felizes que você esteja integrando-se a Enova Foods. Reunimos alguns arquivos úteis para que você possa usá-los em seus projetos. Você pode usar o nome Enova Foods e logotipos para qualquer coisa relacionada à nossa Companhia, tais como materiais de marketing, desde que você siga nossas diretrizes de uso da marca. Sugerimos que entre em contato para mais informações e detalhes sobre a aplicação e manuseio.', 'enova-foods'); ?>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<a href="<?php echo $link_contato_gdrive; ?>" title="Google Drive">
								<button type="button" class="btn btn-lg red p-l-50 p-r-50"><?php _e('Acesse o diretório', 'enova-foods'); ?></button>
							</a>
						</div>
					</div>
					<div class="m-t-20 ft-w-r ft-s-13 lh24">
						<?php _e('Não encontrou o arquivo que estava procurando?', 'enova-foods'); ?> <a href="<?php echo $link_contato_page ?>" class="ft-red ft-w-b"><?php _e('Entre em contato', 'enova-foods'); ?></a>.
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

</header>

<?php get_footer(); ?>