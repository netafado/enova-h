<?php get_header();?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<?php the_content();?>
	<section class="container">
		<div class="row">
			<div class="m-t-40 text-center">
				
			</div>

			<div class="rct-dsc m-t-40 m-b-80 text-center lh24">
				Representantes
			</div>
		</div>
	</section>
<?php endwhile; else: ?>
<?php endif; ?>
<?php get_footer(); ?>