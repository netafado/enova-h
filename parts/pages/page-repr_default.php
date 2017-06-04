<?php 

				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

				$wp_query = new WP_Query(array(
					'post_type' => 'representantes',
					'posts_per_page' => 30,
					'paged' => $paged
				));
				
				if($wp_query->have_posts()) : while($wp_query -> have_posts()) : $wp_query -> the_post();

				?>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<div class="rps-bse white m-b-10 m-t-10"> 
						<div class="rct-tit ft-w-sb ft-s-15 m-t-20 m-l-20 m-r-20">
							<?php the_field('page_representante_nome');?>
						</div>
						<div class="m-r-20 m-l-20 lh24 ft-gray">
							<?php the_field('page_representante_func');?>
						</div>
						<div class="m-t-10 p-l-20 p-r-20 lh18">
							<p><?php the_field('page_representante_cidade');?></p>
							<p><?php the_field('page_representante_desc');?></p>
							<p><?php the_field('page_representante_uf');?></p>
							<p><?php the_field('page_representante_tel');?></p>
							<a href="mailto:<?php the_field('page_representante_email');?>">
								<?php the_field('page_representante_email');?>
							</a>
						</div>
					</div>
				</div>

				<?php 
				endwhile; ?>				
				
			
				<?php  
				endif;?>
				 <div class="container">
					<div class="next bg-nav ft-w-sb ft-red row">
														 
						<div class="col-xs-6 nav-before ft-red">
							
							<?php previous_posts_link(__('Anteriores', 'enova-foods' )) ?>
						</div>

						<div class="col-xs-6 nav-next ft-red">
							<?php next_posts_link(__('Próximo', 'enova-foods' )); ?>
							
						</div>
						
						

					</div>
					
				</div>


				<?php wp_reset_postdata();		
			
			?>