<?php get_header();

	/*
	template name: df

	*/
is_page('institucional');
?>

<header>
	<section class="container-fluid m-t-20">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-6 m-t-40 m-b-50">
					<div class="ft-w-b">
						<?php the_title(); ?>
					</div>
					<div class="m-t-20 ft-w-r ft-s-13 lh24">
						<?php the_field('page_demonstrativos_archives'); ?>
					</div>
				</div>
			</div>
		</div>
</section>

</header>

<?php get_footer(); ?>