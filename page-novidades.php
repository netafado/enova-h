<?php 
	
	/*
	template name: Novidades

	*/

	$link_contato_page = get_page_link(163);// contato page

	if( function_exists ( 'pll_get_post' ) )// link para página de contato correta
		$link_contato_page = get_page_link(pll_get_post(163));

 ?>

<?php get_header();
//is_page('novidades');
?>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript" charset="utf-8">
	jQuery(document).ready(function($) {
		jQuery('.compartilhamento-novidades a').css("vertical-align", "middle!important;");
	});
</script>
<script>
	$(document).ready(function(){
		$(".fa-heart").click(function(){
			var postid = $(this).data("postid");

			$.ajax(
			{
				method:"POST",
				url:ajaxurl,

				data: {
					action:"somaLike",
					"postid":postid}
				}).done(function(html){
					console.log("Post id: " + postid + " Retorno: " + html);
					$("#like"+postid).html(html);
				});
			});
	});
</script>
<!-- HEADER -->
<header>

	<section class="container-fluid"style="height:360px;  background:url('<?php echo get_template_directory_uri(); ?>/img/banner-novidades.jpg');background-size: cover;  background-position: center;">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="col-xs-12 col-sm-8 col-centered conteudo-banner-sobre3 text-center" style="background-color: rgba(255, 255, 255, 0.9);">
						<div class="borda">
							<div class="ft-w-b ft-s-24 lh34 m-t-20 ft-dark-gray">
								<p>
									<?php _e('NOVIDADES ENOVA FOODS', 'enova-foods'); ?>
								</p>
							</div>
							<div class="separador1"></div>
							<h2 class="ft-w-r ft-s-13 lh24 text-center">
								<?php _e('Fique por dentro de todas as novidades em eventos, notícias especiais, novos produtos e muito mais!', 'enova-foods'); ?>
							</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="container m-t-50 m-b-80">
		<div class="row">
			<div class="col-xs-12 col-md-9">
				<?php

				if( function_exists( 'pll_get_term' ) )
					$category_translated = pll_get_term(12, null);
				

				$query = new WP_Query(array(
					'post_type' => 'novidades'
				));

				//query_posts("category_name=novidades");
				if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
				$image = get_field('page_novidades_img_destaque');
				?>
				<div class="col-xs-2 col-md-1 p-r-0 p-l-0" style="border-right: 1px solid #ddd;">
					<p class="ft-s-18 ft-orange ft-w-b text-center m-b-0 p-r-10">
						<?php echo strtoupper(substr(get_the_date('F'),0,3));?>
					</p>      
					<p class="ft-s-36 ft-orange ft-w-b text-center p-r-10">
						<?php the_date('d');?>
					</p>    
					<div class="separador m-t-0 m-b-10"></div>  
					<p class="p-l-10">
						<i class="fa fa-heart ft-pink" data-postid="<?php echo get_the_id();?>"></i> <span id="like<?php echo get_the_id(); ?>"><?php echo get_like_count(get_the_id()); ?></span>
					</p>
				</div>

				<div class="col-xs-10 col-md-11">
					<a href="<?php the_permalink(); ?>">
						<div style="height: 340px; overflow: hidden; border-radius: 3px;">
							<img src="<?php echo $image['url']; ?>" class="img-responsive" alt="<?php echo $image['alt']; ?>" style="width: 100%;">
						</div>
					</a>
					<p class="ft-w-b ft-s-15 m-t-20">
						<a href="<?php the_permalink(); ?>"><?php the_title()?></a>
					</p>
					<p class="lh24">
						<?php the_content(__('Continue lendo...', 'enova-foods')); ?>
					</p>
					<div class="separador m-t-60 m-b-60"></div>
				</div>

				<?php 
				endwhile; else:
				endif;
				wp_reset_query();
				?>
			</div>

			<div class="col-xs-offset-1 col-md-offset-0 col-xs-10 col-md-3 m-t-20 m-b-20">
				<div class="lh24 m-b-40">
					<?php _e('Conecte-se ainda mais com a família Enova Foods! Confira fotos, assista a vídeos e leia tudo sobre nossas últimas publicações.', 'enova-foods'); ?> 
				</div>
				<div class="m-t-40 ft-w-b ft-s-15"><a href="<?php echo $link_contato_page;?>">
					<?php _e('Assine nossa newsletter', 'enova-foods'); ?>
					</a>
				</div>
				<div class="lh24 m-b-20">
					<?php _e('Não fique por fora de nenhuma novidade, assine nossa Newsletter.', 'enova-foods'); ?>
						
				</div>
				<a href="<?php echo get_page_link(pll_get_post(163)) ;?>">
					<button type="button" class="btn btn-lg btn-block pink m-t-20 m-b-20">
						<?php _e('Assine nossa Newsletter', 'enova-foods'); ?>
					</button>
				</a>
				<div class="m-t-30">
					<div class="ft-s-15 ft-w-b">
						<?php _e('Compartilhe!', 'enova-foods'); ?>
					</div>
					<div class="m-t-10">
						<div class="compartilhamento-novidades">
							<div>
								<a href="https://twitter.com/share" class="twitter-share-button"{count} data-text="Novidades Enova Foods:" data-hashtags="enovafoods">Tweet</a>
								<script>
									!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
								</script>
							</div>
							<div>
								<div class="fb-share-button" data-href="<?php echo $_SERVER[REQUEST_URI]?>" data-layout="button"></div>
							</div>
							<div style="margin-top: 4px;">
								<a data-pin-do="buttonBookmark" data-pin-color="red" href="https://www.pinterest.com/pin/create/button/"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</header>
<!-- !HEADER -->

<?php get_footer(); ?>