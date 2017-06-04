<?php 
/**
 * Página responsavel por mostrar o resultado das buscas
 *
 * @package enova-foods
 * 
 */
get_header(); ?>

<!-- parte superior -->
<?php get_template_part( 'parts/content/search', 'statico') ?>

<!-- resultado da pesquisa -->
<?php get_template_part( 'parts/content/search', 'resultado') ?>
	

</header>




<?php get_footer(); ?>