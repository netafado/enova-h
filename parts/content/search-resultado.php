<?php


	$link_representante = get_page_link( 58 );// contato page

	if( function_exists ( 'pll_get_post' ) )// link para página de contato correta
		$link_representante = get_page_link(pll_get_post( 58 ));

?>

<section class="container">
		<div class="row m-t-20 m-b-80">
			<?php if(have_posts()): ?>
				<?php while(have_posts()): the_post(); ?>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
				<div class="busca-bsc-bse white m-b-10 m-t-10">
					<div class="busca-rct-dsc m-t-20 text-center lh24 ft-orange ft-w-sb">
						<?php 
						
						$permalink =  get_the_permalink( );
						$post_type = get_post_type();
						switch( $post_type )
						{
							case "representantes":
							$permalink = $link_representante;
							break;

							case "produtos":
							// pega as categorias do post
							$cats_id = wp_get_post_categories(  get_the_ID() );
							$id_cat = array();

							foreach ($cats_id as $key) {
								array_push( $id_cat, $key );								
							}
							

							$c = get_categories (
								array(
								'include' => $id_cat,
								'childless' => true
							));
							$permalink = get_category_link( $c[0]->cat_ID );
							break;

							default:
							$permalink = get_the_permalink();
						} 
						
						$post_name = get_post_type_object( $post_type );
						echo strtoupper( $post_name->labels->singular_name ) ;
						
						?>
					</div>
					<div class="rct-tit ft-w-sb ft-s-15 m-b-10 text-center">
						<a href="<?php echo $permalink; ?>"><?php echo the_title(); ?></a>
					</div>

				</div>
			</div>
			<?php endwhile; ?>

		<?php else: ?>
			<!-- parte superior -->
			<?php get_template_part( 'parts/content/search', 'nothing') ?>

			<?php endif; ?>
			
		</div>
</section>

