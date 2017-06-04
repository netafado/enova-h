<footer class="hidden-print">
	<div class="container-fluid" style="background: white">
		<div class="row">
			<div class="container m-t-40 m-b-40">
				<div class="col-xs-12 col-sm-2">

					<img src="<?php echo get_template_directory_uri(); ?>/img/logo-apoiadora.png" alt="" style="width:70px">

						<p class="idioma-texto ft-w-sb"><?php _e( 'Idioma', 'enova-foods' ); ?></p>
						<div class="lang-footer">

							<label class="meuSelectsContatosAfter">
						
							<?php 
							// imprime as bandeiras, e verifica se o plugin exist
							if(function_exists('pll_the_languages') )
									pll_the_languages(array('dropdown'=> 1)); 
							?> 

						</div>
						

				</div>

				<div class="col-sm-10 col-md-6">
					<div class="col-xs-12 ft-s-13 ft-w-sb">
						<?php _e('Encontre-nos', 'enova-foods'); ?>
					</div>
					<div class="col-xs-12 col-md-6">
						<h1 class="ft-s-13 ft-w-sb ft-gray"><?php _e('Fábrica, Catanduva', 'enova-foods'); ?></h1>
						<div class="ft-w-r ft-s-13 ft-gray lh21">Avenida Elias Bauab, 665 - Distrito Industrial José Antonio Boso, Catanduva – SP -<br> T +55 17 3531.4000</div>
						<h1 class="ft-s-13 ft-w-sb ft-gray"><?php _e('Fábrica, Queluz', 'enova-foods'); ?></h1>
						<div class="ft-w-r ft-s-13 ft-gray lh21">Rodovia Presidente Dutra, 5,5km - Bairro Estrela, Queluz – SP <br> T +55 12 3147.2442</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<h1 class="ft-s-13 ft-w-sb ft-gray"><?php _e('Escritório, São Paulo', 'enova-foods'); ?></h1>
						<div class="ft-w-r ft-s-13 ft-gray lh21">Av. Queiroz Filho, 1700 - Conjunto 301- Torre Sky, Villa Hamburguesa, São Paulo – SP - T +55 11 2595.4900</div>
						<h1 class="ft-s-13 ft-w-sb ft-gray"><?php _e('Escritório, Rio de Janeiro', 'enova-foods'); ?></h1>
						<div class="ft-w-r ft-s-13 ft-gray lh21">Rua do Feijão, 654 – Bairro Penha Circular, Rio de Janeiro – RJ <br> T +55 21 2289.3658</div>
					</div>
				</div>
				<div class="hidden-sm col-md-3 col-sm-offset-1">
					<div class="col-xs-12 ft-s-13 ft-w-sb"><?php _e('Newsletter', 'enova-foods') ?></div>
					<div class="col-xs-12">
						<h1 class="ft-w-r ft-s-13 ft-gray lh21">
							<?php _e('Seja o primeiro a saber sobre novidades especiais, novos produtos e muitas outras coisas!', 'enova-foods') ?>
								
						</h1>
						<a href="<?php echo get_page_link(pll_get_post(163)) ?>">
							<button type="button" class="btn btn-lg btn-block orange m-t-30">
								<?php _e('Assine nossa Newsletter', 'enova-foods'); ?>
							</button>
						</a>
						<div class="m-t-10">

							<a onclick="window.open(this.href, 'mywin','left=100,top=100,width=490,height=505,toolbar=0,resizable=0'); return false;" href="http://www.facebook.com/sharer/sharer.php?u=http://www.enovafoods.com.br&title=ENOVAFOODS" class="m-r-10">
								<img src="<?php echo get_template_directory_uri(); ?>/img/icon-facebook.png" alt="" style="width:9px">
							</a>

							<a onclick="window.open(this.href, 'mywin','left=100,top=100,width=490,height=505,toolbar=none,resizable=0'); return false;" href="http://twitter.com/intent/tweet?status=Produtos de alta qualidade que conquistam e fidelizam os consumidores. Acesse: www.enovafoods.com.br" class="m-r-10">
								<img src="<?php echo get_template_directory_uri(); ?>/img/icon-twitter.png" alt="" style="width:17px">
							</a>

							<a onclick="window.open(this.href, 'mywin','left=100,top=100,width=490,height=505,toolbar=0,resizable=0'); return false;" href="https://plus.google.com/share?url=http://www.enovafoods.com.br" class="m-r-10">
								<img src="<?php echo get_template_directory_uri(); ?>/img/icon-g.png" alt="" style="width:22px">
							</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid red">
		<div class="container">
			<div class="row p-t-30 p-b-30">
				<div class="col-xs-12 text-center">
					<?php
							$args = array(
								'container' => false,
								'menu_class' => 'nav navbar-bot ft-w-sb col-centered',
								'theme-location' => 'footer'								
							);

							wp_nav_menu($args);

						?>

				</div>

				<div class="col-xs-12 text-center">
					<span class="developer">
							<?php _e('Não se esqueça de dar uma olhada em nossos', 'enova-foods'); ?> 
						<a href="<?php echo get_theme_root_uri(); ?>/enovafoods/termos_de_uso.pdf" target="_blank">
							<?php _e('Termos de Uso', 'enova-foods'); ?> 
						</a>, 

						<a href="<?php echo get_theme_root_uri(); ?>/enovafoods/politicas_de_privacidade.pdf" target="_blank">
							<?php _e('Políticas de Privacidade', 'enova-foods'); ?> 
						</a> <?php _e('e no site do ', 'enova-foods'); ?> 

						<a href="http://3sixty.com.br">
							<?php _e('Desenvolvedor.', 'enova-foods'); ?> 
						</a>
						</span>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>

<script>window.jQuery || document.write('<script src="<?php echo get_theme_root_uri(); ?>/enovafoods/js/vendor/jquery-2.1.4.min.js"><\/script>')</script>

<?php wp_footer(); ?>

</body>
</html>