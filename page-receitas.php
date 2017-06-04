<?php 
/*

Template Name: Receitas

*/
// pega o correto link para pagina de contato de acordo com o idioma
$link_receitas_page = get_page_link( 110 );
$link_contato = get_page_link( 163 );
if(function_exists ( 'pll_get_post')){

	$link_receitas_page = get_page_link(pll_get_post(110));
	$link_contato = get_page_link(pll_get_post(163));
}

get_header(); 

?>

<script type="text/javascript" lang="javascript">
	$(document).ready(function(){

	//Suaviza o scroll de todos os links das páginas
	$(function() {
		$('a[href*=#]:not([href=#])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					$('html,body').animate({
						scrollTop: target.offset().top
					}, 1000);
					return false;
				}
			}
		});
	});

	$(".selfil").change(function(){
		//pega a url correta
		<?php printf('var irPara = "%s";',  $link_receitas_page); ?>
		var param = $(this).attr('name');
		var val = $(this).val();

		document.location.href = irPara + '/?param=' + param + '&val=' + val;
	});
});
</script>
<header>
	<section class="container-fluid"style="height:360px;  background:url('<?php echo get_template_directory_uri(); ?>/img/banner-receitas.jpg');background-size: cover;  background-position: center;">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="col-xs-12 col-md-8 col-centered conteudo-banner-sobre3 text-center" style="background-color: rgba(255, 255, 255, 0.9);">
						<div class="borda">
							<div class="ft-w-b ft-s-24 lh34 m-t-20 ft-dark-gray">
								<p>
									<?php the_field('page_receitas_edit_tit_bnr');?>
								</p>
							</div>
							<div class="separador1 hidden-xs"></div>
							<h2 class="ft-w-r ft-s-13 lh24 text-center">
								<?php the_field('page_receitas_edit_desc_bnr');?>
							</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="container-fluid" style="margin-top:-40px"> 
		<div class="container">
			<div class="row">
				<div class="col-xs-1 text-center col-centered">
					<a href="#conteudo-receitas"><i class="fa fa-2x fa-angle-down ft-white"></i></a>
				</div>
			</div>
		</div>
	</section>

	<section class="container"  id="conteudo-receitas">
		<div class="row m-t-30 m-b-20">
			<div class="col-xs-12 col-md-2 m-t-10 selector-recipes">
				<div class="col-md-12 meuSelects">
					<label class="meuSelectsContatosAfter">
						<select name="post_receitas_prep_select" id="selectDiaSemana" class="ft-gray selfil">
							<option value="0"><?php _e( 'Modo de preparo', 'enova-foods'); ?></button></option>
							<option value="<?php _e( 'Assar', 'enova-foods'); ?>"><?php _e( 'Assar', 'enova-foods'); ?></option>
							<option value="<?php _e( 'Grelhar', 'enova-foods'); ?>"><?php _e( 'Grelhar', 'enova-foods'); ?> </option>
							<option value="<?php _e( 'Cozinhar', 'enova-foods'); ?>"><?php _e( 'Cozinhar', 'enova-foods'); ?> </option>
							<option value="<?php _e( 'Gelar', 'enova-foods'); ?>"><?php _e( 'Gelar', 'enova-foods'); ?> </option>			
						</select>
					</label>
				</div>
			</div>
			<div class="col-xs-12 col-md-2 m-t-10 selector-recipes">
				<div class="col-md-12 meuSelects">
					<label class="meuSelectsContatosAfter">
						<select name="post_receitas_grau_dif" id="selectDiaSemana" class="ft-gray selfil">
							<option value="0"><?php _e( 'Dificuldade', 'enova-foods'); ?></option>
							<option value="<?php _e( 'Médio', 'enova-foods'); ?>"><?php _e( 'Médio', 'enova-foods'); ?> </option>
							<option value="<?php _e( 'Fácil', 'enova-foods'); ?>"><?php _e( 'Fácil', 'enova-foods'); ?></option>
							<option value="<?php _e( 'Difícil', 'enova-foods'); ?>"><?php _e( 'Difícil', 'enova-foods'); ?></option>		
						</select>
					</label>
				</div>
			</div>
			<div class="col-xs-12 col-md-2 m-t-10 selector-recipes">
				<div class="col-md-12 meuSelects">
					<label class="meuSelectsContatosAfter">
						<select name="post_receitas_ocs" id="selectDiaSemana" class="ft-gray selfil">
							<option value="0"><?php _e( 'Ocasião', 'enova-foods'); ?></option>
							<option value="<?php _e( 'Festa', 'enova-foods'); ?>"><?php _e( 'Festa', 'enova-foods'); ?> </option>
							<option value="<?php _e( 'Sobremesa', 'enova-foods'); ?>"><?php _e( 'Sobremesa', 'enova-foods'); ?> </option>
							<option value="<?php _e( 'Café da tarde', 'enova-foods'); ?>"><?php _e( 'Café da tarde', 'enova-foods'); ?></option>
							<option value="<?php _e( 'Almoço', 'enova-foods'); ?>"><?php _e( 'Almoço', 'enova-foods'); ?></option>		
						</select>
					</label>
				</div>
			</div>
		</div>
		<div class="separador m-b-10"></div>
		<!-- <div class="filtros ft-red"><i><b>Resultados para:</b> "Filtro 1" + "Filtro 2" </i></div> -->
	</section>

	<section class="container">
		<div class="row m-t-20 m-b-20">

			<!-- mesma coisa que o include do php -->
			<?php get_template_part('parts/pages/page', 'receitas') ?>

		</div>
	</section>

		<section class="container">
			<div class="row m-t-20 m-b-80 p-r-10 pull-right">
				<div class="ft-red ft-w-sb">
					<a href="<?php echo $link_contato; ?>">
						<?php _e('Envie sua receita para nós', 'enova-foods'); ?> 
						<i class="fa fa-angle-double-right"></i>
					</a>
				</div>
			</div>
		</section>
			


				
	<?php get_footer(); ?>