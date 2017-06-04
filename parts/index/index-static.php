<section class="container">
		<div class="row">
			<div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4">
				<div class="conteudo-estatico-home">
					<img src="<?php echo get_template_directory_uri(); ?>/img/qualidade-e-inovacao.png" alt="">

					<h1 class="ft-w-sb ft-s-15 ft-dark-gray"><?php _e('Qualidade e Inovação', 'enova-foods'); ?></h1>
					<h2 class="ft-w-r ft-s-13 lh24 ft-dark-gray">
						<!-- SETANDO OS GETTERS para INTERNACIONALIZAÇÂO DO TEMA -->
						<?php _e('Estas são as duas palavras que nos guiam em todas as nossas atividades para oferecer o que há de melhor para a família brasileira. Confira nossas marcas e linhas de produtos, você irá se surpreender.', 'enova-foods');
						?>
					</h2>
				</div>
			</div>
			<div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4">
				<div class="conteudo-estatico-home">
					<img src="<?php echo get_template_directory_uri(); ?>/img/selecionado-para-voce.png" alt>
					<h1 class="ft-w-sb ft-s-15 ft-dark-gray"><?php _e('Selecione para você', 'enova-foods'); ?></h1>
					<h2 class="ft-w-r ft-s-13 lh24 ft-dark-gray">
						<!-- SETANDO OS GETTERS para INTERNACIONALIZAÇÂO DO TEMA -->
						<?php  _e('Garantimos que nossos produtos sejam criados com todo o cuidado e carinho que as famílias merecem. E é por isso que nossos produtos são sinônimo de qualidade, sucesso e aceitação por todos que nos conhecem.', 'enova-foods'); ?>
					</h2>
				</div>
			</div>
			<div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4">
				<div class="conteudo-estatico-home">
					<img src="<?php echo get_template_directory_uri(); ?>/img/garantia-e-qualidade.png" alt="">
					<h1 class="ft-w-sb ft-s-15 ft-dark-gray"><?php _e('Garantia e Qualidade', 'enova-foods'); ?></h1>
					<h2 class="ft-w-r ft-s-13 lh24 ft-dark-gray">
						<!-- SETANDO OS GETTERS para INTERNACIONALIZAÇÂO DO TEMA -->
						<?php  _e('Quem experimenta confirma. Quem revende reconhece a competência dos nossos profissionais e representantes comerciais. Quem vende percebe valor, rentabilidade e uma companhia responsável e comprometida.' , 'enova-foods'); 
						?>
					</h2>
				</div>
			</div>
		</div>
	</section>


	<!-- Pega os produtos de forma randomica -->
	<?php  get_template_part('parts/index/index', 'rand_products'); ?>


</header>



<!-- <a class="btn btn-primary" data-toggle="modal" href='#modal-id1'>Trigger modal1</a>
	<a class="btn btn-primary" data-toggle="modal" href='#modal-id2'>Trigger modal2</a> -->
	<div class="modal fade" id="modal-id1">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title text-center ft-w-sb ft-s-15 m-t-10">
						<?php _e('ENTRAR', 'enova-foods'); ?>						
					</h4>
					<h5 class="text-center m-t-10 m-b-20 ft-s-13">
						<?php _e('Olá visitante, é bom ve-lo novamente.', 'enova-foods'); ?>
					</h5>
					<div class="row">
						<div class="col-xs-12 text-center">
							<div class="col-xs-11 col-centered">
								<input type="text" name="" id="input" class="meuSelects p-r-10 p-l-10 p-b-10 p-t-10 btn-block m-b-10" placeholder="Email">
								<input type="text" name="" id="input" class="meuSelects p-r-10 p-l-10 p-b-10 p-t-10 btn-block" placeholder="<?php _e('Senha', 'enova-foods'); ?>">
								<input type="checkbox" class="m-t-20" name="" value="Lembrar usuário">
								<button type="button" class="btn btn-lg orange m-t-10 pull-right" style="width: 100px;">Entrar</button>
							</div>
							<div class="col-xs-12 text-center">
								<div class="m-t-20 m-b-20 ft-red ft-w-sb">
									<?php _e('Esqueci minha senha', 'enova-foods'); ?> 
									<i class="fa fa-angle-double-right"></i>
								</div>
							</div>
						</div>     
					</div>
				</div>
			</div>
			<h6 class="ft-white text-center m-t-20">
				<?php _e('Ainda não possui uma conta? Clique aqui', 'enova-foods'); ?> 
			</h6>
		</div>
	</div>
	<div class="modal fade" id="modal-id2">
		<div class="modal-dialog modal-sm">   
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h5 class="modal-title ft-w-b m-t-10 m-l-10 ft-gray">
						<i class="fa fa-long-arrow-left"></i> 
							<?php _e('Voltar', 'enova-foods'); ?>
					</h5>

					<h4 class="modal-title text-center ft-w-b ft-s-15 m-t-10">
						<?php _e('Esqueci minha senha', 'enova-foods'); ?>
					</h4>

					<h5 class="text-center m-t-10 m-b-10 ft-s-13 p-l-20 p-r-20 lh18">
						<?php _e('Insira seu endereço de e-mail para resetar sua senha. Talvez você necessite ver sua pasta de spam.', 'enova-foods'); 
						?>
					</h5>
					<div class="row">
						<div class="col-xs-12 text-center">
							<div class="col-xs-11 col-centered">
								<input type="text" name="" id="input" class="meuSelects p-r-10 p-l-10 p-b-10 p-t-10 btn-block" placeholder="Email">
								<input type="checkbox" class="m-t-20" name="" value="Lembrar usuário">
								<button type="button" class="btn btn-lg btn-block orange m-t-10 m-b-20 pull-right">
									<?php _e('Confirmar', 'enova-foods') ?>
								</button>
							</div>
						</div>     
					</div>
				</div>
			</div>
			<h6 class="ft-white text-center m-t-20">
				<?php _e('Ainda não possui uma conta? Clique aqui', 'enova-foods'); ?>
			</h6>
		</div>
	</div>