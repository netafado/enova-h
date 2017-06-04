
<?php 
	/*
		Argumentos para a query
	*/
	$args = array(
		'post_type' => 'representantes',
		'meta_query'		=> array(
			'relation'		=> 'OR',
			array(
				'key'		=> 'page_representante_nome',
				'value'		=> $_GET["termo"],
				'compare'	=> 'LIKE'
			),
			array(
				'key'		=> 'page_representante_cidade',
				'value'		=> $_GET["termo"],
				'compare'	=> 'LIKE'
			)
		)
	);

	$wp_query_result =  new WP_Query($args);
	if ( $wp_query_result->have_posts() ) : ?>

	<?php while ($wp_query_result->have_posts() ) : $wp_query_result->the_post(); ?>
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
						<div class="rps-bse white m-b-10 m-t-10"> 
			<div class="rct-tit ft-w-sb ft-s-15 m-t-20 m-l-20 m-r-20">

					<?php the_field('page_representante_nome');?>
				</div>
				<div class="m-r-20 m-l-20 lh24 ft-gray">
					<?php the_field('page_representante_func');?>
				</div>
				<div class="m-t-10 p-l-20 p-r-20 lh18">
					<p><?php the_field('page_representante_cidade'); ?></p>
					<p><?php the_field('page_representante_desc'); ?></p>
					<p><?php the_field('page_representante_uf'); ?></p>
					<p><?php the_field('page_representante_tel');?></p>
					<a href="mailto:<?php the_field('page_representante_email');?>">
						<?php the_field('page_representante_email');?>
					</a>
				</div>
			</div>
		</div>
	<?php endwhile; ?>

	<?php else :?>
		<section class="container">
			<div class="row">
				<div class="m-t-40 text-center">
					<img src="<?php echo get_theme_root_uri(); ?>/enovafoods/img/busca-nada-encontrado.png" alt="" >
				</div>

				<div class="rct-dsc m-t-40 m-b-80 text-center lh24">
					<?php _e( 'Nenhum representante encontrado com esse termo.', 'enova-foods' ); ?>
				</div>
			</div>
		</section>
		
	<?php 
	endif; 
	 wp_reset_postdata(); 
	 ?>