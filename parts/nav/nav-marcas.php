
<script type="text/javascript" lang="javascript" charset="utf-8">
<?php
	//pega a url correta
	printf('var irPara = "%s"',  get_site_url());
?>
				
	var abrirMarcas = function(){
		jQuery("#subMenu").slideToggle("400");
		jQuery('html, body').animate({ scrollTop: 0 }, 'slow');
	};
	jQuery('.mouse-over-menu').click(function(e) {
		event.preventDefault();
		jQuery('.login-menu').slideToggle("400");
	});
	jQuery('.login-menu').mouseleave(function(e) {
		event.preventDefault();
		jQuery('.login-menu').slideToggle("400");
	});
	jQuery('.mouse-over-busca').click(function(e){
		jQuery('.nav-busca').slideToggle("200");
		jQuery('#txt').val('');
	});
	$(document).ready(function(){
		jQuery('#txt').keypress(function(e){
			if(e.keyCode == 13){
				document.location.href = irPara + "/busca/?" + "termo="+$(this).val();
							
			}
		});
	});
				
</script>

<div id="subMenu">
	<div class="container">
					
	<?php
	// sempre se verefica se a função relativa a um plugin existe 
	// para evitar fatal erro nos updates 
	if(function_exists('pll_get_term')){
		//pega a categoria pai de acordo com o idioma
		$cat_pai = get_categories( array(
				  'parent'  => pll_get_term(290),// retorna o id correto de acordo com idioma
				  'hide_empty' => false
		) );

	}else{
		$cat_pai = get_categories( array(
				  'parent'  => 19,
				  'hide_empty' => false
		) );
	}						


		//imprime o nome da categoria pai e seus "filhos"
	foreach ( $cat_pai as $cat ) {
		// categoria pai nome
		printf( '<div class="ft-s-13 ft-w-sb">%1$s</div>',
   		esc_html( $cat->name ));

		$cat_filho = get_categories( array(

			'parent'  => 	$cat->term_id,
			'hide_empty' => false

		) );

		// categorias filhos da categoria acima
		foreach ( $cat_filho as $cat_f ) {
			printf( '<a href="%1$s" class="ft-red m-r-30">%2$s</a>',
   			esc_url( get_category_link($cat_f->term_id ) ),
   			esc_html( $cat_f->name ));
		}
	}
					
	?>

	</div>
</div>


