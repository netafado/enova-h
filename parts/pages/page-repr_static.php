<?php get_header();?>

<script>
	<?php $url = get_page_link( get_the_ID() );
		echo 'var localUrl = "' . $url . '"';
	 ?>

	$(document).ready(function(){
		$('#txt-rep').keypress(function(e){
			if(e.keyCode == 13){
				document.location.href = localUrl  + '?' + "termo="+$(this).val();
			}
		});
		$('#btn').click(function(e){
			document.location.href = localUrl  + '?' + "termo="+$("#txt-rep").val();
		});
	});
</script>

<header>
	<section class="container-fluid"style="height:500px;  background:url('<?php echo get_template_directory_uri(); ?>/img/representantes-map.jpg');background-size: cover;  background-position: center;">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="col-xs-12 col-md-7 col-centered conteudo-banner-representantes text-center" style="background-color: rgba(255, 255, 255, 0.9);">
						<div class="borda">
							<div class="ft-w-b ft-s-20 lh34 m-t-20 ft-dark-gray">
								<p>
									<?php the_field('page_representantes_edit_tit_bnr');?>
								</p>
							</div>
							<div class="separador1"></div>
							<h2 class="ft-w-r ft-s-13 lh24 text-center">
								<?php the_field('page_representantes_edit_desc_bnr');?>
							</h2>
							<div class="row">
								<div class="col-xs-12">
									<div class="col-xs-12 col-md-7 text-right m-t-10">
										<input type="text" name="txt" id="txt-rep" class="meuSelects p-r-10 p-l-10 p-b-10 p-t-10 btn-block" 
										placeholder="<?php esc_html_e('Digite a palavra-chave', 'enova-foods'); ?>" required="required" title=""
										<?php if(isset($_GET["termo"])){ echo 'value="'.$_GET["termo"].'"'; } ?>>
									</div>
									<div class="col-xs-12 col-md-5 m-t-10">
										<button type="button" id="btn" class="btn btn-lg btn-block orange">
											<?php _e('Pesquisar', 'enova-foods'); ?>
										</button>
									</div>
								</div>
							</div>
							<div class="row m-t-20">
								<div class="ft-red ft-w-sb m-b-10">
									<a href="<?php echo $link_contato_page;//pega o link correto de acordo com o idioma atual ?>">
										<?php _e('Seja um representante da Enova Foods', 'enova-foods'); ?>
									<i class="fa fa-angle-double-right"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>