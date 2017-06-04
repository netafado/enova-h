<?php


	$link_contato_page = get_page_link(163);// contato page
	$link_to_print =  get_page_link(1397);// imprimir
		if( function_exists ( 'pll_get_post' ) ){
	// link para página de contato correta
		$link_contato_page = get_page_link(pll_get_post(163));
		$link_to_print = get_page_link(pll_get_post(1397));
	}

get_header();?>
<script type="text/javascript" charset="utf-8">
	function imprimir() {
		window.print();
	}
</script>

<header>
	<section class="container m-t-50 m-b-80">
		<div class="row">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<?php $image = get_field('post_receitas_img_destaque'); ?>
				<div class="col-xs-12 col-md-8">
					<div class="col-xs-12 receitas-exibe-img-principal p-l-10 p-r-10 p-t-10 m-b-30">
						<img src="<?php echo $image['url']; ?>" class="img-responsive" alt="<?php echo $image['alt']; ?>">
						<div class="p-l-10 p-r-10 text-right m-t-10 m-b-15 hidden-print">
							<div class="row">
								<div class="ft-red ft-w-sb"><i class="fa fa-angle-double-left"></i>
									<a href="<?php print $_SERVER['HTTP_REFERER'];?>"><?php _e('Voltar para todas as receitas', 'enova-foods'); ?></a>
								</div>
							</div>
						</div>
					</div>
					<div class="row p-l-10 p-r-10 visible-print">
						<div class="col-xs-12">
							<div class="row">
								<div class="col-xs-5">
									<div class="ft-w-b">
										><?php _e('Ingredientes:', 'enova-foods'); ?>
									</div>
									<div class="m-t-10">
										<?php the_field('post_receitas_ing'); ?>
									</div>
								</div>

								<div class="col-xs-7">
									<div class="ft-w-b">
										<?php _e('Modo de preparo:', 'enova-foods'); ?>
									</div>
									<div class="m-t-10">
										<?php the_field('post_receitas_prep'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row p-l-10 p-r-10 hidden-print">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active">
								<a href="#ingredientes" aria-controls="ingredientes" role="tab" data-toggle="tab" class="ft-w-b ft-s-15 ft-dark-gray">
								<?php _e('INGREDIENTES', 'enova-foods'); ?></a>
							</li>
							<li role="presentation">
								<a href="#mododepreparo" aria-controls="mododepreparo" role="tab" data-toggle="tab" class="ft-w-b ft-s-15">
								<?php _e('MODO DE PREPARO', 'enova-foods'); ?></a>
							</li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active p-t-30  p-r-10 p-l-10" id="ingredientes">
								<?php the_field('post_receitas_ing'); ?>
								<div class="p-l-10 p-r-10 m-t-10 m-b-15">
									<div class="row">
										<div class="ft-red ft-w-sb p-t-10">
											<a href="<?php echo $link_contato_page;  ?>">
												<?php _e('Envie sua receita para nós', 'enova-foods'); ?> <i class="fa fa-angle-double-right"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade p-t-30 p-r-10 p-l-10" id="mododepreparo">
								<p>
									<?php the_field('post_receitas_prep'); ?>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-4 m-t-20 m-b-20 p-r-40 p-l-40">
					<div class="ft-s-15 ft-red ft-w-b m-b-10">
						<?php the_field('post_receitas_titulo'); ?>
					</div>
					<div class="lh24 m-b-40">
						<?php the_field('post_receitas_dsc'); ?>
					</div>
					<div class="m-t-20 separador3"></div>
					<div class="m-t-40 ft-w-b ft-s-15"><?php _e('Informações da receita', 'enova-foods'); ?></div>

					<div class="m-t-20"><span class="ft-w-b"><img src="<?php echo get_theme_root_uri(); ?>/enovafoods/img/icon-yield.png" alt="Rendimentos">  
						<?php _e('Rendimentos', 'enova-foods'); ?></span>: <?php the_field('post_receitas_serve_pessoas'); ?> <?php _e('pessoas', 'enova-foods'); ?>
					</div>

					<div class="m-t-20"><span class="ft-w-b"><img src="<?php echo get_theme_root_uri(); ?>/enovafoods/img/icon_timer.png" alt="Tempo de Preparo"> 
					 	<?php _e('Tempo de Preparo', 'enova-foods'); ?></span>: <?php the_field('post_receitas_tempo_prep'); ?> <?php _e('minutos', 'enova-foods'); ?>
					 </div>

					<div class="m-t-20"><span class="ft-w-b"><img src="<?php echo get_theme_root_uri(); ?>/enovafoods/img/icon_chef-hat.png" alt="Grau de Dificuldade">  
						<?php _e('Grau de Dificuldade', 'enova-foods'); ?></span>: <a href="#"><?php the_field('post_receitas_grau_dif'); ?></a>
					</div>

					<div class="m-t-20"><span class="ft-w-b"><img src="<?php echo get_theme_root_uri(); ?>/enovafoods/img/icon_method.png" alt="Modo de Preparo">  
						<?php _e('Modo de Preparo', 'enova-foods'); ?></span>: <a href="#"><?php the_field('post_receitas_prep_select'); ?></a>
					</div>

					<div class="m-t-20"><span class="ft-w-b"><img src="<?php echo get_theme_root_uri(); ?>/enovafoods/img/icon_consumer.png" alt="Ocasião">  
						<?php _e('Ocasião', 'enova-foods'); ?></span>: <a href="#"><?php the_field('post_receitas_ocs'); ?></a>

					</div>
					<div class="m-t-20 separador3"></div>

					<div class="m-t-20 m-b-20" style="height: 160px;">
						<form action="<?php echo $link_to_print; ?>" method="POST" class="hidden-print hidden-xs">
							<button type="button" class="btn btn-lg orange p-r-20 m-b-30 m-t-10 p-l-20 p-r-20 col-xs-12 hidden-xs" onclick="imprimir();">
								<?php _e('Imprimir', 'enova-foods'); ?>
							</button>
							<div class="m-b-10 ft-w-b ft-s-15 hidden-print"><?php _e('Envie por e-mail', 'enova-foods'); ?></div>
							<div class="col-xs-9 p-l-0 p-r-0">
								<input type="text" name="email_receita" id="input" class="meuSelects btn-block p-r-10 p-l-10 p-b-10 p-t-10 light-gray" placeholder="<?php _e('email@exemplo.com.br', 'enova-foods'); ?>" requerid="requerid" style="border-top-right-radius: 0px!important; border-bottom-right-radius: 0px!important;">
							</div>
							<button type="submit" class="btn btn-lg purple p-l-20 p-r-20 col-xs-3 hidden-xs" style="border-top-left-radius: 0px; border-bottom-left-radius: 0;">OK</button>

							<textarea name="conteudo_email" hidden>
								<?php _e('Receita:', 'enova-foods'); ?>
								<?php the_field('post_receitas_titulo'); ?>

								<?php _e('Descrição:', 'enova-foods'); ?>
								<?php the_field('post_receitas_dsc'); ?>
								
								<?php _e('Ingredientes:', 'enova-foods'); ?>
								<?php the_field('post_receitas_ing'); ?>
								
								<?php _e('Modo de preparo:', 'enova-foods'); ?>
								<?php the_field('post_receitas_prep'); ?>
								
								<?php _e('Rendimentos:', 'enova-foods'); ?>
								<?php the_field('post_receitas_serve_pessoas'); ?> <?php _e('pessoas', 'enova-foods'); ?>.
							</textarea>
						</form>
					</div>
					<div class="m-t-20 separador3"></div>
					<div class="p-t-30 ft-w-b ft-s-15 hidden-print"><?php _e('Produtos Relacionados', 'enova-foods'); ?></div>
					<div class="m-t-20 p-b-20 p-t-20 p-l-30 p-r-30 related-products-base text-center hidden-print">
						<?php 
						$pegaIDpostRelacao	= get_field('post_receitas_relacionamento',get_the_ID())->ID;
						$urlImagemRelacao	= get_field("imagem_marcas",$pegaIDpostRelacao);
						$descricaoProduto	= get_field('post_receitas_relacionamento')->post_title;
						?>
						<div class="col-xs-12">
							<a href="<?php echo get_category_link(wp_get_post_categories(get_field('post_receitas_relacionamento')->ID)[2]);?>">
								<img class="" src="<?php echo $urlImagemRelacao['url']; ?>" style="height: 180px;">
							</a>
						</div>
						<div class="col-xs-12 p-t-10 ft-w-b">
							<a href="<?php echo get_category_link(wp_get_post_categories(get_field('post_receitas_relacionamento')->ID)[2]);?>">
								<?php echo $descricaoProduto; ?>
							</a>
						</div>
					</div>
					<button type="button" class="btn btn-lg orange m-t-20 m-b-20 p-l-20 p-r-20 col-xs-12 col-sm-6 visible-xs hidden-print">
					<?php _e('Imprimir', 'enova-foods'); ?>
					</button>
					<form action="/wp/index.php/imprimir" method="POST" class="hidden-print hidden-md hidden-lg">
						<textarea name="conteudo_email" hidden>
							<?php _e('Receita:', 'enova-foods'); ?>
							<?php the_field('post_receitas_titulo'); ?>

							<?php _e('Descrição:', 'enova-foods'); ?>
							<?php the_field('post_receitas_dsc'); ?>

							<?php _e('Ingredientes:', 'enova-foods'); ?>
							<?php the_field('post_receitas_ing'); ?>

							<?php _e('Modo de preparo:', 'enova-foods'); ?>
							<?php the_field('post_receitas_prep'); ?>

							<?php _e('Rendimentos:', 'enova-foods'); ?>
							<?php the_field('post_receitas_serve_pessoas'); ?> <?php _e('pessoas', 'enova-foods'); ?>.
						</textarea>
						<div class="col-xs-12 p-l-0 p-r-0">
							<input type="text" name="email_receita" id="input" class="meuSelects p-r-10 p-l-10 p-b-10 p-t-10 btn-block light-gray" placeholder="email@exemplo.com.br" requerid>
						</div>
						<button type="submit" class="btn btn-lg purple m-t-20 p-l-20 p-r-20 col-xs-12 col-sm-6 visible-xs hidden-print">
							<?php _e('Enviar', 'enova-foods'); ?>							
						</button>

					</form>
				</div>
			<?php endwhile; else: ?>
		<?php endif; ?>
	</div>
</section>
</header>



<?php get_footer(); ?>