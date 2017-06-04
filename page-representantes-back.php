<?php 
/*
Template Name: Representantes
*/
?>

<?php get_header();
//is_page('representantes');
?>
<script>
	<?php $url = get_page_link( get_the_ID() );
		echo 'var localUrl = "' . $url . '"';
	 ?>

	$(document).ready(function(){
		$('#txt-rep').keypress(function(e){
			if(e.keyCode == 13){
				document.location.href = localUrl  + '?' + "termo="+$(this).val();
				console.log(localUrl);
			}
		});
		$('#btn').click(function(e){
			document.location.href = localUrl  + '?' + "termo="+$("#txt-rep").val();
			console.log(localUrl);
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
										<input type="text" name="txt" id="txt-rep" class="meuSelects p-r-10 p-l-10 p-b-10 p-t-10 btn-block" placeholder="Digite a palavra-chave" required="required" title=""
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
									<a href="<?php get_site_url(); ?>contatos/">
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


	<section class="container">
		<div class="row m-t-20">
			<?php 
			if(isset($_GET["termo"])){
				$reps = buscaRep($_GET["termo"]);

				foreach($reps as $rep){
					?>
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
						<div class="rps-bse white m-b-10 m-t-10"> 
							<div class="rct-tit ft-w-sb ft-s-15 m-t-20 m-l-20 m-r-20">

								<?php the_field('page_representante_nome',$rep->ID);?>
							</div>
							<div class="m-r-20 m-l-20 lh24 ft-gray">
								<?php the_field('page_representante_func',$rep->ID);?>
							</div>
							<div class="m-t-10 p-l-20 p-r-20 lh18">
								<p><?php the_field('page_representante_cidade',$rep->ID);?></p>
								<p><?php the_field('page_representante_desc',$rep->ID);?></p>
								<p><?php the_field('page_representante_uf',$rep->ID);?></p>
								<p><?php the_field('page_representante_tel',$rep->ID);?></p>
								<a href="mailto:<?php the_field('page_representante_email',$rep->ID);?>">
									<?php the_field('page_representante_email',$rep->ID);?>
								</a>
							</div>
						</div>
					</div>

					<?php 
				}

			}else{
				?>
				<?php 


				$wp_query = new WP_Query(array(
					'post_type' => 'representantes',
					'showposts' => 30,
				));
				
				if($wp_query->have_posts()) : while($wp_query -> have_posts()) : $wp_query -> the_post();

				?>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
					<div class="rps-bse white m-b-10 m-t-10"> 
						<div class="rct-tit ft-w-sb ft-s-15 m-t-20 m-l-20 m-r-20">
							<?php the_field('page_representante_nome');?>
						</div>
						<div class="m-r-20 m-l-20 lh24 ft-gray">
							<?php the_field('page_representante_func');?>
						</div>
						<div class="m-t-10 p-l-20 p-r-20 lh18">
							<p><?php the_field('page_representante_cidade');?></p>
							<p><?php the_field('page_representante_desc');?></p>
							<p><?php the_field('page_representante_uf');?></p>
							<p><?php the_field('page_representante_tel');?></p>
							<a href="mailto:<?php the_field('page_representante_email');?>">
								<?php the_field('page_representante_email');?>
							</a>
						</div>
					</div>
				</div>

				<?php 
				endwhile; else:
				endif;
			}
			?>
		</div>
		<!-- <div class="navigation">
			<div class="next bg-nav">
				<?php next_posts_link('<span>Pr&oacute;ximos</span>') ?>
			</div>
			<div class="prev bg-nav">
				<?php previous_posts_link('<span>Anteriores</span>') ?>
			</div>
		</div> -->
		<?php wp_pagination();?>
	</section>

	<section class="container">
		<div class="row m-t-20 m-b-80 pull-right">
			<div class="ft-red ft-w-sb">
				<a href="<?php get_site_url(); ?>contatos/">
					<?php _e('Seja um representante da Enova Foods', 'enova-foods'); ?>
					 <i class="fa fa-angle-double-right"></i>
				</a>
			</div>
		</div>
	</section>

</header>

<?php get_footer(); ?>