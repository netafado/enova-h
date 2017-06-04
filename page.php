<?php get_header();?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<?php $v_url = $_SERVER["REQUEST_URI"];
	if(strpos($v_url,"login") == true) {
	?>
	<style>
		.um-misc-with-img{
			display: none;
		}
	</style>
	<div class="m-t-50 m-b-50">
		<?php } else {?>
		<div class="">
			<?php }?>
			<?php the_content();?>
		</div>
	<?php endwhile; else: ?>
<?php endif; ?>
<?php get_footer(); ?>