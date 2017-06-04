
<?php
/**
 * Parte responsavel por mostrar uma page na Home.
 * 
 */
get_header();
?>

	<!--Exibe o banner esta em slider_front_end.html.php Plugin Linha 1116 CSS main.css-->
	<?php  get_template_part('parts/index/index', 'front') ?>
	<!--Conteudo que se repet entre front-page, home e index -->
	<?php  get_template_part('parts/index/index', 'static') ?>
	
	
	
<?php get_footer(); ?>