<?php get_header();?>

<?php 

//$cat = get

$categoria = get_queried_object();

$posts = get_posts_by_category(get_query_var('cat'));

$tags = f_get_tags_slugs($posts);


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

//Exibe o produto que foi selecionado pela marca com AJAX
jQuery('.go-tag').click(function(){ 
	$('.go-tag').removeClass('active');
	$(this).addClass("active");

	var tag_slug = $(this).data("tag_slug");
	var botao_base = $(this);

	var html_base = $(this).html();

	$(this).html('<div class="fa fa-spinner fa-spin"></div>'); //Cria o loader no botao
	var categoria = "<?php echo get_query_var('cat'); ?>";

	console.log(categoria);

	$(".exibeProduto").slideUp('fast');
	$.ajax({
		method:"POST",
		url:ajaxurl,

		data: {
			action:"f_get_produtos",
			"tag_slug":tag_slug,
			"categoria":categoria
		}
	}).done(function(html){
		$(botao_base).html(html_base); //Retorna o conteudo anterior que estava no votao
		$("#posts-by-tag").html(html);
		$(".exibeProduto").slideDown('fast');
	});
});

//Exibe o produto que foi selecionado pela TAG (Ex: 1Litro)
jQuery('#posts-by-tag').on('click', '#img-produto-marcas', function(e){
	var prod_cod = $(this).attr('alt');
	console.log(prod_cod);
	var caminho_base = $(this);
	console.log(caminho_base);
	var url_imagem_base = $(this).attr('src');
	console.log(url_imagem_base);

	$(this).attr('src', '/wp/wp-content/themes/enovafoods/img/loader2.gif'); //Cria o loader no botao
	$.ajax(
	{
		method:"POST",
		url:ajaxurl,

		data: {
			action:"f_get_produtos_light",
			"prod_cod":prod_cod
		}
	}).done(function(html){
		$(caminho_base).attr('src', url_imagem_base); //Retorna o conteudo anterior que estava no botao
		$("#exibe-produto").html(html);
		$("#exibe-produto").fadeIn("slow");
	});
});
jQuery('#exibe-produto').on('click', '.destroi', 
	function(e){
		$("#exibe-produto").fadeOut("slow", function(){
			$('#exibe-produto').html('');
		});

	});
});
</script>


<header class="white">
	<section class="container-fluid" style="background: #F4F7F8">
		<div class="container">
			<div class="row m-b-50">
				<?php $image = get_field('imagem_-_categoria', $categoria);?>
				<div class="col-xs-12 col-md-10 col-centered text-center m-t-40">
					<img src="<?php echo $image['url']; ?>" class="img-responsive col-centered" alt="<?php echo $image['alt']; ?>">
				</div>
				<div class="col-xs-12 text-center m-t-40">
					<span class="col-xs-10 col-centered ft-s-24 ft-w-b">
						<?php the_field('page_submarcas_titulo_marca', $categoria); ?><br />
					</span>
				</div>
				<div class="col-xs-12 text-center m-t-10">
					<span class="ft-w-r ft-s-13 lh24 text-center"><?php echo category_description( $category_id ); ?></span>
				</div>
				<div class="col-xs-12 text-center m-t-40">
					<a href="#mais">
						<button type="button" class="btn btn-lg orange p-l-30 p-r-30 scrollTo">
						<?php _e('Saiba mais', 'enova-foods'); ?></button>
					</a>
				</div>
			</div>
		</div>
	</section>
	<section class="container">
		<div class="row m-b-20">
			<div class="col-xs-12 text-center m-t-40">
				<span class="col-xs-10 col-centered ft-s-24 ft-w-b" id="mais" style="text-transform: uppercase;">
					<?php _e('Vantagens & Benefícios', 'enova-foods'); ?></span>
				<div class="separador1"></div>
			</div>
		</div>
		<div class="row checks-modificados">
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<?php the_field('page_submarcas_vant_bene_col1', $categoria); ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<?php the_field('page_submarcas_vant_bene_col2', $categoria); ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<?php the_field('page_submarcas_vant_bene_col3', $categoria); ?>
			</div>
		</div>

		<div class="row m-b-20">
			<div class="col-xs-12 text-center m-t-60">
				<div class="separador1"></div>
				<span class="col-xs-10 col-centered ft-s-24 ft-w-b" id="mais" style="text-transform: uppercase;">
					<?php _e('Conheça nossos produtos', 'enova-foods'); ?></span>
				<span class="ft-w-r ft-s-13 lh24 text-center">
					<p> <?php _e('Clique em uma das categorias abaixo e conheça nossa linha completa de produtos.', 'enova-foods'); ?></p>
				</span>
			</div>
		</div>

	</section>
	<section class="container">
		<div class="row m-b-30 ">
			<div class="col-xs-10 col-centered text-center">
				<?php 
				//Como o sort não pode ser usado sozinho declarei ele em uma variavel para organizar as tags
				$organiza_tags = natsort($tags);

				//Cria as tags já organizadas anteriormente
				foreach($tags as $tag_p) { ?>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-2  text-center col-centered-inline">
					<button type="button" class="btn btn-block btn-colorido p-t-10 p-b-10 m-t-10 go-tag" data-tag_slug="<?php echo $tag_p ?>">
						<?php echo get_term_by('slug',$tag_p,'post_tag')->name; ?>
					</button>
				</div>
				<?php }?>
			</div>
		</div>
	</section>

	<section class="container-fluid exibeProduto" style="background:#ECECEC">
		<div class="container">
			<div class="row m-b-80 m-t-80">
				<div class="col-xs-12">
					<div id="posts-by-tag">
						<!-- Produtos exibidos a partir do ajax no inicio da pagina e da functions.php -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="exibe-produto" style="display:none;">
		<!-- Exibe o descritivo do produto para cada produto clicado dentro de uma marca -->
	</section>
</header>

<?php get_footer(); ?>