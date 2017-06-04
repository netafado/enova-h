<?php get_header();
//is_single('novidades');
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
<!-- HEADER -->
<header>
	<section class="container m-b-80 m-t-80">
		<div class="row">
			<div class="col-xs-10 col-centered">
				<div class="col-xs-12">
					<div class="m-b-20 conteudo-novidades">
						<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
							<?php $image = get_field('page_novidades_img_destaque'); ?>
							<img src="<?php echo $image['url']; ?>" class="img-responsive" alt="<?php echo $image['alt']; ?>"/>
							<p class="ft-w-b ft-s-18 m-t-20">
								<?php the_title()?> 
							</p>

							<i class="fa fa-calendar"></i>  
							<?php the_date('l, d \d\e F, Y');?>
							<p class="lh24">
								<?php the_content('Ler...'); ?>
							</p>

						<?php endwhile; else: ?>
					<?php endif; ?>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div class="pull-right">
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
				<!-- <i class="fa fa-heart ft-pink"></i> <span class="ft-w-sb">Gostou? Clique aqui e dê um like!</span> -->
				<div class="row">
					<div class="col-xs-12">
						<div class="m-t-10 m-b-10 separador"></div>
					</div>
				</div>
				<div class="ft-red ft-w-sb m-b-10">
					<i class="fa fa-angle-double-left"></i>
					<a href="<?php print $_SERVER['HTTP_REFERER'];?>">Voltar para todas as novidades</a>
				</div>
			</div>
		</div>
	</div>
</div>

</section>
</header>
<!-- !HEADER -->

<?php get_footer(); ?>