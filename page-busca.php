<?php 
/* 
	Template Name: Busca
*/
get_header(); ?>

<?php

if(isset($_GET["termo"]))
{
	$termo = $_GET["termo"];
}else{

}

?>

<header>
	<section class="container">
		<div class="row">
			<div class="col-xs-6">
				<div class="m-t-50 m-b-20">
					<span class="ft-w-b ft-s-24 ft-dark-gray"><?php _e('Resultado da Busca', 'enova-foods'); ?></span>
				</div>
			</div>
			<div class="col-xs-6">
				<div class="m-t-60 m-b-20">
					<div class="filtros ft-red text-right">
						<?php if(empty(busca($termo))){


						} ?>

					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<div class="separador m-b-10 m-t-0"></div>
			</div>
		</div>
	</section>

	<section class="container">
		<div class="row m-t-20 m-b-80">
			<?php foreach(busca($termo) as $post){ ?>
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">
				<div class="busca-bsc-bse white m-b-10 m-t-10">
					<div class="busca-rct-dsc m-t-20 text-center lh24 ft-orange ft-w-sb">
						<?php 
						$permalink =  get_the_permalink($post->ID);
						$catName = get_the_category($post->ID)[0]->name;
						switch($catName)
						{
							case "Representantes":
							$permalink = "/index.php/representantes";
							break;

							case "CasaDoce":
							$permalink = get_category_link(get_the_category($post->ID)[2]->cat_ID);
							break;
							case "Agtal":
							$permalink = get_category_link(get_the_category($post->ID)[1]->cat_ID);
						} 
						echo $catName;
						?>
					</div>
					<div class="rct-tit ft-w-sb ft-s-15 m-b-10 text-center">
						<a href="<?php echo $permalink; ?>"><?php echo $post->post_title; ?></a>
					</div>

				</div>
			</div>
			<?php } ?>
		</div>
	</section>
	<?php if(empty(busca($termo))){ ?>
	<section class="container">
		<div class="row">
			<div class="m-t-40 text-center">
				<img src="<?php echo get_theme_root_uri(); ?>/enovafoods/img/busca-nada-encontrado.png" alt="" >
			</div>

			<div class="rct-dsc m-t-40 m-b-80 text-center lh24">
				<?php _e('Nenhum item encontrado.', 'enova-foods'); ?>
			</div>
		</div>
	</section>
	<?php } ?>
</header>




<?php get_footer(); ?>