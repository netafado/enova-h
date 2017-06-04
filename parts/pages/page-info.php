<?php 
$link_to_contato = get_page_link(2153);

if( function_exists ( 'pll_get_post' ) ){
	// link para página de contato correta
	$link_to_contato = get_page_link(pll_get_post(2153));
	
}

?>

							<div class="ft-s-15 ft-w-sb m-b-10"><?php _e( 'Mantenha-se em contato', 'enova-foods'); ?></div>
							<div class="lh24"><?php _e( 'Registre-se se você precisa:', 'enova-foods'); ?></div>
							<div class="">
								<p class="lh24">
									<i class="fa fa-check ft-green"></i> <?php _e( 'Enviar uma mensagem', 'enova-foods'); ?><br>
									<i class="fa fa-check ft-green"></i> <?php _e(  'Ser um representante', 'enova-foods'); ?><br>
									<i class="fa fa-check ft-green"></i> <?php _e(  'Enviar elogio ou reclamações', 'enova-foods'); ?><br>
									<i class="fa fa-check ft-green"></i><?php _e(  'Receber novidades da Enova Foods<Fbr> Entre outras opções...', 'enova-foods'); ?>
								</p>
							</div>


							<div class="m-t-20">
							<?php _e(  'E-mail SAC', 'enova-foods'); ?>: 
							<span class="ft-red"><a href="mailto:sac@enovafoods.com.br">sac@enovafoods.com.br</a></span></div>
						<div class="m-t-10">SAC: <span class="ft-w-b">0800 55 2323</span></div>
						<div class="m-t-10"><?php _e( 'E-mail', 'enova-foods'); ?>: 
							<span class="ft-w-b"><a href="mailto:comercial@enovafoods.com.br">comercial@enovafoods.com.br</a></span>
						</div>

						<div class="m-t-10"><?php _e( 'E-mail', 'enova-foods'); ?>: <span class="ft-w-b"><a href="mailto:recrutamento@enovafoods.com.br">recrutamento@enovafoods.com.br</a></span></div>
						<div class="ft-w-b m-t-20">
							<?php _e( 'Fábrica','enova-foods'); ?>, Catanduva

							<span class="ft-red ft-w-r"><a href="https://www.google.com.br/maps/place/Av.+Elías+Bauab,+665+-+Distrito+Industrial+José+Antonio+Boso,+Catanduva+-+SP,+15803-155/@-21.1281617,-48.9931613,17z/data=!3m1!4b1!4m2!3m1!1s0x94bc1ef075094407:0x7e05efb69a328868" target="_blank"><?php _e( 'ver no mapa', 'enova-foods'); ?></a></span>
							</div>
							<div class="ft-w-b m-t-10">
								<?php _e( 'Fábrica','enova-foods'); ?>, Queluz <span class="ft-red ft-w-r"><a href="https://www.google.com.br/maps/place/Makro+–+Loja+Nova+Iguaçu/@-22.740905,-43.5025727,17z/data=!3m1!4b1!4m2!3m1!1s0x99670bcae76acf:0xa75492f3ac9cb95b" target="_blank"><?php _e( 'ver no mapa', 'enova-foods'); ?></a></span></div>
							<div class="ft-w-b m-t-10"><?php _e( 'Escritório','enova-foods'); ?>, São Paulo <span class="ft-red ft-w-r"><a href="https://www.google.com.br/maps/place/Av.+Queiroz+Filho,+1700+-+Vila+Hamburguesa,+S%C3%A3o+Paulo+-+SP/@-23.5433032,-46.734875,17z/data=!3m1!4b1!4m5!3m4!1s0x94ce561dfe7d912d:0x5bfde976d68488f!8m2!3d-23.5433032!4d-46.7326863" target="_blank"><?php _e( 'ver no mapa', 'enova-foods'); ?></a></span>
						</div>
							<div class="ft-w-b m-t-10"><?php _e( 'Escritório','enova-foods'); ?>, Rio de Janeiro <span class="ft-red ft-w-r"><a href="https://www.google.com.br/maps/place/R.+Manuel+Vitórino,+155+-+Encantado,+Rio+de+Janeiro+-+RJ/@-22.8948811,-43.3060559,17z/data=!3m1!4b1!4m2!3m1!1s0x997d111dd83d75:0x125b4f1f39d9918" target="_blank"><?php _e( 'ver no mapa', 'enova-foods'); ?></a></span></div>
							<a href="<?php echo $link_to_contato; ?>"><div class="ft-red ft-w-sb m-t-30">
							<?php _e('Assine nossa newsletter', 'enova-foods');?> 
							<i class="fa fa-angle-double-right"></i></div></a>
						</div>

