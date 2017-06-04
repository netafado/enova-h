<section class="container-fluid" style="height:500px;">
		<div class="row">
			<?php

				//verefica o idioma atual para imprimir o correto banner 
				if(get_locale() == 'en_US')//inglês americano?
				{
					echo do_shortcode("[huge_it_slider id='7']"); 
				}
				elseif(get_locale() == 'pt_BR')//português?
				{
					echo do_shortcode("[huge_it_slider id='2']"); 
				}
				else{
					echo do_shortcode("[huge_it_slider id='2']"); 
				}
			?>
		</div>
	</section>