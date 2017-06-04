<?php

	/*
	template name: gdrive

	*/
get_header();

$link_contato_page = get_page_link(163);// contato page
$link_contato_gdrive = get_page_link(163);// contato page

	if( function_exists ( 'pll_get_post' ) )// link para página de contato correta
		$link_contato_page = get_page_link(pll_get_post(163));
?>
<style>
	body{
		background: white;
	}
</style>
<section class="container m-t-80">
	<div class="row m-b-20">
		<div class="col-xs-12 text-center">
			<div class="ft-s-24 ft-w-b">
				<?php _e( 'Arquivos para desenvolvedores', 'enova-foods' ); ?>
			</div>
		</div>
		<div class="col-xs-12 text-center m-t-20">
			<div class="ft-w-r ft-s-13 lh24">
				<?php _e( 'Estamos felizes que você esteja integrando-se a Enova Foods. Reunimos alguns arquivos úteis para que você possa usá-los em seus projetos. Você pode usar o nome Enova Foods e logotipos para qualquer coisa relacionada à nossa Companhia, tais como materiais de marketing, desde que você siga nossas diretrizes de uso da marca. Sugerimos que entre em contato para mais informações e detalhes sobre a aplicação e manuseio.', 'enova-foods' ); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<iframe src="https://drive.google.com/embeddedfolderview?id=<?php the_field("page_gdrive_link"); ?>#grid" style="width: 100%; min-height: 500px!important; border: 1px solid #CCC border-radius: 5px; padding: 0px; background: white;" frameborder="0"></iframe>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 text-center m-t-20 m-b-80">
			<div class="ft-w-r ft-s-13 lh24">
				<?php _e( 'Para visualizar este conteúdo você precisa estar ', 'enova-foods' ); ?>
				<a href="http://drive.google.com" target="_blank" class="ft-red ft-w-b"><?php _e( 'logado</a> em sua conta no Google e possuir as devidas permissões.', 'enova-foods' ); ?>
				<br />
				<a href="<?php echo $link_contato_page ?>" class="ft-red ft-w-b"><?php _e( 'Entre em contato', 'enova-foods' ); ?>
					
				</a> <?php _e( 'com nossa equipe para solicitar permissão.', 'enova-foods' ); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer();?>