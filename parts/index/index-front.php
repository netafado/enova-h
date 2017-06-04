<header>
<section class="container-fluid hold-banner" style="height:500px;">

		<div class="row hold-banner">

	
		<?php if(have_posts()): while(have_posts()):the_post();	?>

			<?php the_content(); ?>

		<?php endwhile; ?>
		<?php endif; ?>
		</div>
	</section>