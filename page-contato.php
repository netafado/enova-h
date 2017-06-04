<?php
	/*

	Template Name: Contato

	*/ 
?>

<?php get_header();
is_page('contato');
?>

<?php

$contato_page = get_page_link(171);

$url_enova = "/";

$page_login = get_page_link(155);

$page_email = get_page_link(1363);

if( function_exists ( 'pll_get_post' ) ){
	// link para página de contato correta

	$contato_page = get_page_link(pll_get_post(171));
	$url_enova = pll_home_url();
	$page_login = get_page_link(pll_get_post(155));
	$page_email = get_page_link(pll_get_post(1363));
}


$nome = something;
$telefone = something;
$assunto = something;
global $nome, $telefone, $assunto;

if(is_user_logged_in())
{
	$usr = wp_get_current_user();
	if($nome<>''){
		$nome = get_user_meta($usr->ID,"first_name",true) . " " . get_user_meta($usr->ID,"last_name",true);
	}
	$telefone = get_user_meta($usr->ID,"tel_cad",true);
}
?>

<header>
	<section class="container-fluid" style="background:url('<?php echo get_theme_root_uri(); ?>/enovafoods/img/contato-background.jpg');background-size: cover; background-position: center;">
		<div class="container col-xs-12 col-sm-10 col-md-11 col-lg-8 col-centered">
			<div class="row m-t-60 m-b-60">
				<div class="col-xs-12">
					<div class="col-xs-12 conteudo-banner-contatos">
						<div class="col-xs-7 text-center m-t-20 m-b-20">
							<div class="row m-b-20">
								<div class="ft-w-r ft-s-13 lh24 text-center">
								<?php _e('Se você possui muita informação para nos deixar, uma mensagem é um excelente meio de contato. Retornaremos o mais breve possível.', 'enova-foods');
								?>
								</div>
								<!-- <button type="button" class="btn btn-lg orange m-t-20 p-l-30 p-r-30">Já tenho uma conta Enova</button> -->
							</div>
							<form action="<?php echo $page_email ?>" method="POST">
								<div class="col-xs-6 p-r-0 p-t-10">
									<input type="text" name="nome" id="input" class="meuSelects p-r-10 p-l-10 p-b-10 p-t-10 btn-block light-gray" placeholder="Nome Completo" value="<?php echo $nome; ?>">
								</div>
								<div class="col-xs-6 p-r-0 p-t-10">
									<input type="mail" name="email" id="input" class="meuSelects p-r-10 p-l-10 p-b-10 p-t-10 btn-block light-gray" placeholder="Email" value="<?php echo $usr->user_email; ?>">
								</div>
								<div class="col-xs-6 p-r-0 p-t-10">
									<input type="text" name="telefone" id="input" class="meuSelects p-r-10 p-l-10 p-b-10 p-t-10 btn-block light-gray" placeholder="<?php _e('Telefone', 'enova-foods'); ?>" value="<?php echo $telefone; ?>">
								</div>
								<div class="col-xs-6 p-r-0 p-t-10">
									<div class="col-md-12 meuSelects">
										<label class="meuSelectsContatosAfter">
											<select id="selectDiaSemana" class="ft-gray" name="assunto">
												<option value="assunto" selected>
													<?php _e('Assuntos', 'enova-foods');?>
												</option>
												<option value="duvidas">
													<?php _e('Dúvidas', 'enova-foods');?>
												</option>
												<option value="sugestoes">
													<?php _e('Sugestões', 'enova-foods');?>
												</option>
												<option value="reclamacoes">
													<?php _e('Reclamações', 'enova-foods');?>
												</option>
												<option value="elogios">
													<?php _e('Elogios', 'enova-foods');?>
												</option>
												<option value="trabalheconosco">
													<?php _e('Trabalhe conosco', 'enova-foods');?>
												</option>
												<option value="outros">
													<?php _e('Outros', 'enova-foods');?>
												</option>
											</select>
										</label>
									</div>
								</div>
								<!-- <div class="col-xs-12 m-t-10">
									<input type="file" name="arquivo">
								</div> -->
								<div class="col-xs-12 p-r-0 p-t-10">
									<textarea class="meuSelects p-r-10 p-l-10 p-b-10 p-t-10 btn-block" placeholder="<?php _e( 'Digite sua mensagem', 'enova-foods'); ?>" name="mensagem" rows="8"></textarea>
									<button type="submit" class="btn btn-lg purple m-t-20 p-l-50 p-r-50">
										<?php _e('Enviar Mensagem', 'enova-foods');?>
									</button>
									<div class="ft-w-r ft-s-13 lh24 m-t-10 text-center">
										<?php _e('Deseja enviar a mensagem com uma conta diferente?', 'enova-foods');?>
										 <a href="<?php echo wp_logout_url( $page_login ); ?>">
										 	<?php _e('Clique aqui.', 'enova-foods');?>
										 </a>
										 </div>
								</div>
							</form>
						</div>
						<div class="col-xs-4 col-xs-offset-1 m-t-20 m-b-20">

							<?php get_template_part('parts/pages/page', 'info'); ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</header>

<?php get_footer(); ?>
