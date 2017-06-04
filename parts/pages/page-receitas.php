<?php 
/**
 * Arquivo responsavel pela lógica dentro das receitas
 * 
 * Fará a query de acordo com os parametros param e val
 * 
 */


	

	$args;


	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 


	if(isset($_GET['param'])){

		$param = $_GET['param'];
		$val = $_GET['val'];

		if($param == 'post_receitas_ocs'){

			//se o campo ocasião for utilizado a base 
			//da query será o demostrado abaixo, o mesmo vale
			// os demais

			$args = array(
				'post_type'		=> 'receitas',
				'posts_per_page' => 30,
				'paged' => $paged,
				'meta_key'		=> 'post_receitas_ocs',
				'meta_value'	=> $val
				);

		}
		elseif ($param == 'post_receitas_grau_dif') {

			$args = array(
				'post_type'		=> 'receitas',
				'posts_per_page' => 30,
				'paged' 		=> $paged,
				'meta_key'		=> 'post_receitas_grau_dif',
				'meta_value'	=> $val
				);

		}
		elseif ($param == 'post_receitas_prep_select') {

			$args = array(
				'post_type'		=> 'receitas',
				'meta_key'		=> 'post_receitas_prep_select',
				'posts_per_page' => 30,
				'paged' => $paged,
				'meta_value'	=> $val
				);

		}else{

			$args = array(
				'post_type'		=> 'receitas',
				'posts_per_page' => 30,
				'paged' => $paged,
			);

	 	}

	}else{// se nada for passado como parametro ele apenas seleciona todas as receitas
	
		$args = array(
			'post_type'		=> 'receitas',
			'posts_per_page' => 30,
			'paged' => $paged
		);				

	}

	// pega todas as receitas de acordo com o parametros passados
	$query = new WP_Query($args);


	if($query->have_posts()): while($query->have_posts()): $query->the_post();?>

	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
		<div class="rct-bse white m-b-10 m-t-10">
			<div class="rct-tit p-t-20 p-b-20 p-l-20 p-r-20 ft-w-sb ft-s-15">
				<a href="<?php the_permalink();?>">
					<?php the_field('post_receitas_titulo');?>
				</a>
			</div>
			<div class="rct-img">
				<a href="<?php the_permalink();?>">
					<?php $image = get_field('post_receitas_img_destaque'); ?>
					<img src="<?php echo $image['url']; ?>" class="img-responsive" alt="<?php echo $image['alt']; ?>">
				</a>
			</div>
			<div class="rct-dsc p-t-30 p-b-30 p-l-20 p-r-20 text-center lh24">
				<?php the_field('post_receitas_dsc');?>
			</div>
		</div>
	</div>

	<?php 
	endwhile;
	endif; ?>
	
	<div class="container">
		<div class="next bg-nav ft-w-sb ft-red row">
														 
		<div class="col-xs-6 nav-before ft-red">
			<?php previous_posts_link(__('Anteriores', 'enova-foods' )) ?>
		</div>

		<div class="col-xs-6 nav-next ft-red">
			<?php next_posts_link(__('Próximo', 'enova-foods' )); ?>
						
		</div>
						
		<?php wp_reset_postdata(); ?>				

	</div>
					

