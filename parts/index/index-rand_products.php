<?php 

/**

 * Parte responsavel por mostrar os produtos

 * de forma randomica com base no idioma

 * @package enova-foods

 * 

 */



?>

	<section class="container">		

		<div class="row m-b-80">

			<div class="carrousel-conteudo">

				<?php

				

				$categories = array();

				$cat_empresa;

				//pega a categoria pai de acordo com o idioma

				// sempre se verefica se a função relativa a um plugin existe 

				// para evitar fatal erro nos updates

				if(function_exists('pll_get_term'))
					$cat_empresa =  pll_get_term( 290 );

									

				$cat_pai = get_categories( array(

					'post_type' => 'produtos',

					'parent'  => $cat_empresa,

					'hide_empty' => false

				) );					





				//pega o id das categorias filho

				foreach ( $cat_pai as $cat ) {					

					$cat_filho = get_categories( array(

						'parent'  => 	$cat->term_id,

						'hide_empty' => false

					) );



				//pega o id das categorias filho

					foreach ( $cat_filho as $cat_f ) {

						array_push($categories, $cat_f->term_id);

					}
								

				}



				//argumentos para pegar de forma randomica os posts dentro da categoria

				//empresa e suas submarcas

				$args_cat = array(

						'cat' => $categories,

						'orderby' => 'rand',

						'post_type' => 'produtos',

						'posts_per_page' => 20


					);

				$query_post = new WP_Query( $args_cat );
						

				?>





				<?php if( $query_post->have_posts() ): while( $query_post->have_posts() ):$query_post->the_post() ?>

					<?php

					$cats_id = wp_get_post_categories(  get_the_ID());									


									$id_cat = array();									

									$cat_id;

									$cat_name;

									$cat_descr;



									foreach ($cats_id as $key) {

										array_push($id_cat, $key);

									}								



									$c = get_categories (

										array(

										'include' => $id_cat,

										'childless' => true

										));


									foreach ($c as $key) {																

										$cat_id =  $key->cat_ID;

										$cat_name = $key->name;

										$cat_descr = $key->description;

									}

					 ?>

					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">

							<div class="prd-slider">

								<div class="prd-img text-center">



									<a href="<?php echo get_category_link( $cat_id ); ?>">

									<?php

									$image = get_field('imagem_marcas');

									if( !empty($image) ): ?>

										<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" style="max-height: 80%; margin-top: 16px;" />

									<?php endif; ?>

									<!--<img src="/img/Logo_EnovaFoods.png" class="img-responsive" alt=""> -->

									</a>

								</div>

								<div class="prd-dsc">

									<a href="<?php echo get_category_link( $cat_id ); ?>">

										<h1 class="text-center ft-s-13 ft-w-sb m-t-0 ft-dark-gray"><?php echo $cat_name; ?></h1>

									</a>

									<h2 class="text-center ft-s-13 lh18 ft-dark-gray"><?php echo mb_substr( $cat_descr, 0, 70, 'utf-8') . '...'; ?></h2>

								</div>

							</div>

						</div>



				<?php endwhile; ?>

				<?php endif;

				/* Restore original Post Data */

				wp_reset_postdata(); ?>				

			</div>

		</div>

	</section>