<?php 
add_action('wp_before_admin_bar_render', 'remove_menu_topo');
add_filter('admin_footer_text', 'novo_texto_footer');
add_action('wp_dashboard_setup', 'cria_painel_de_suporte');
add_action('admin_head', 'mudar_cores_dashboard');
add_action('login_head', 'mudar_css_login' );
add_action('admin_head', 'remove_menu_ajuda');
add_action('wp_dashboard_setup', 'remove_paineis_principais_dashboard' );
add_action('admin_footer','altera_cores_nos_posts');
add_action('admin_menu', 'novo_menu_dashboard');
add_action('admin_menu', 'remover_info_atualizacao');
add_action('admin_menu', 'huge_it_slider_options_panel');//Plugin slider-image e encontra-se na slider.php linha #134
add_action('wp_ajax_nopriv_somaLike','somaLike');
add_action('wp_ajax_somaLike','somaLike');
add_action('wp_ajax_nopriv_f_get_produtos','f_get_produtos');
add_action('wp_ajax_f_get_produtos','f_get_produtos');
add_action('wp_ajax_nopriv_f_get_produtos_light','f_get_produtos_light');
add_action('wp_ajax_f_get_produtos_light','f_get_produtos_light');
add_action('wp_head','ajaxurl');
add_action('wp_ajax_nopriv_verifica_banco','verifica_banco');
add_action('wp_ajax_verifica_banco','verifica_banco');
add_action('wp_ajax_nopriv_verifica_tudo','verifica_tudo');
add_action('wp_ajax_verifica_tudo','verifica_tudo');
add_action('wp_ajax_nopriv_add_banco','add_banco');
add_action('wp_ajax_add_banco','add_banco');

add_filter('update_footer', 'minha_versao', 9999 );
//add_filter('screen_options_show_screen', 'remover_opcoes_tela');
add_filter('menu_order', 'wpmidia_remove_some_menu_items' );
add_filter('custom_menu_order', 'wpmidia_toggle_custom_menu_order' );
add_filter('login_headerurl', 'mudar_link_padrao_login');
add_filter('login_headertitle', 'mudar_texto_alternativo_login');
add_filter('single_template', create_function(
	'$the_template',
	'foreach( (array) get_the_category() as $cat ) {
		if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") )
			return TEMPLATEPATH . "/single-{$cat->slug}.php"; }
		return $the_template;' )
);//Fun??o que retorna a p¨¢gina single de cada p¨¢gina por categoria.

//Customizar menu do topo principal
function remove_menu_topo() {
	global $wp_admin_bar;
	//Remove o logo
	$wp_admin_bar->remove_menu('wp-logo');
	//Remove a aba de updates
	$wp_admin_bar->remove_menu('updates');
	//Remove o personalizar temas
	$wp_admin_bar->remove_menu('customize');
	//Remove os comentarios
	$wp_admin_bar->remove_menu('comments');
	//Remove do menu superior o icone de nova pagina
	$wp_admin_bar->remove_menu('new-content');
	//Remove o meu superior de visualizar pagina
	$wp_admin_bar->remove_menu('view');
}

//Cria??o de novos menus
function novo_menu_dashboard() {
	add_menu_page('Conteudos Enova', '<b>Enova Foods</b>', 'manage_options', '/');
	add_submenu_page( '/', 'Produtos', 'Produtos', 'manage_options', 'edit.php?post_type=produtos');
	add_submenu_page( '/', 'Receitas', 'Receitas', 'manage_options', 'edit.php?post_type=receitas');
	add_submenu_page( '/', 'Novidades', 'Novidades', 'manage_options', 'edit.php?post_type=novidades');
	add_submenu_page( '/', 'Representantes', 'Representantes', 'manage_options', 'edit.php?post_type=representantes');
	add_submenu_page( '/', 'Tags', 'Tags', 'manage_options', 'edit-tags.php?taxonomy=post_tag');
	add_submenu_page( '/', 'Conteúdos', 'Conteúdos', 'manage_options', 'edit.php');
	add_submenu_page( '/', '------------------------------', '------------------------------', 'manage_options', 'index.php');
	add_submenu_page( '/', 'Páginas', 'Páginas', 'manage_options', 'edit.php?post_type=page');
	add_submenu_page( '/', 'Banners', 'Banners', 'manage_options', 'admin.php?page=sliders_huge_it_slider');
	add_submenu_page( '/', 'Submarcas', 'Submarcas', 'manage_options', 'edit-tags.php?taxonomy=category');
	add_submenu_page( '/', 'Mídias', 'Mídias', 'manage_options', 'upload.php');
	add_submenu_page( '/', 'Idiomas', 'Idiomas', 'manage_options', 'options-general.php?page=mlang');
	add_submenu_page( '/', 'Usuários', 'Usuários', 'manage_options', 'users.php');
	add_submenu_page( '/', 'Suporte', 'Suporte', 'manage_options', 'index.php');

	remove_submenu_page( $menu_slug, $submenu_slug );
}

function wpmidia_remove_some_menu_items($menu_order){
	global $menu;
	global $current_user; 
	get_currentuserinfo();
	//print_r($current_user);

	if( $current_user->data->user_login != 'anderson' ){  //  <-- COLOQUE AQUI O LOGIN DO USUARIO QUE DESEJA RESTRINGIR  
	$excludes = array(
		//Oculta o menu principal
		'index.php',
		//Oculta as postagens
		'edit.php',
		//Oculta o painel de midias
		'upload.php',
		//Oculta oculta a ¨¢rea de p¨¢ginas
		'edit.php?post_type=page',
		//Oculta o menu ferramentas
		'tools.php',
		//Oculta os comentarios
		'edit-comments.php',
		//Oculta a ¨¢rea de temas
		'themes.php',
		//Oculta a ¨¢rea dos plugins
		'plugins.php',
		//Oculta a p¨¢gina de usu¨¢rios
		'users.php',
		//Oculta as op??es gerais do WP
		'options-general.php',
		//Remove todos os separadores
		'wp-menu-separator',
		//Oculta o banners - plugin
		'toplevel_page_sliders_huge_it_slider',
		//Oculta os campos personalizados - plugin
		'edit.php?post_type=acf',
		//Oculta o ultimate member - plugin
		'ultimatemember'     
		);
	foreach ( $menu as $mkey => $m ) {
		foreach( $excludes as $exclude ){
			$key = array_search( $exclude, $m );
			if( $key ) unset( $menu[$mkey] );
		}
	}
	}
	return $menu_order;

/*
//-> para mais de um usu¨¢rio restrito, vamos fazer o seguinte: (http://php.net/manual/en/function.in-array.php)
$restritos = array('usuario1', 'usuario2', 'usuario3');
if( in_array($current_user->data->user_login, $restritos ) )
{
///aqui vai o resto do c¨®digo
}
*/
}

//Remove o menu de ajuda da dashboard
function remove_menu_ajuda() {
	$screen = get_current_screen();
	$screen->remove_help_tabs();
}

//Remove as op??es de tela na dashboard
function remover_opcoes_tela(){
	return false;
}

//Remove a informa??o que o wordpress tem uma nova vers?o
function remover_info_atualizacao() {
	remove_action( 'admin_notices', 'update_nag', 3 );
}
//Modifica o texto do footer
function novo_texto_footer() {
	//echo 'Desenvolvido por <a href="http://3sixty.com.br/" target="_blank">3Sixty';
}

//Zera a vers?o do wordpress para nao solicitar atualiza??o
function minha_versao() {
	return '';
}

//Adiciona um css personalizado para tela de login
function mudar_css_login() {
	echo '<link media="all" type="text/css" href="'.get_template_directory_uri().'/login-style.css" rel="stylesheet">';
}

//Direcionar login para a pagina principal mudando link padrao
function mudar_link_padrao_login() {
	return home_url();
}

//Mudar o texto alternativo ao passar o mouse no login
function mudar_texto_alternativo_login() {
	return get_option('blogname');
}

//Customiza??o de cores
function mudar_cores_dashboard() {
//Menu principal parte de cima
	echo '<style type="text/css">#wpadminbar {background:#999;}</style>';
//Background do menu esquerda principal
	echo '<style type="text/css">#adminmenuwrap {background:#767676}</style>';
//Background dos objetos do menu da esquerda
	echo '<style type="text/css">#adminmenu {background:#767676}</style>';
//Background dos objetos do menu da esquerda selecionados
	echo '<style type="text/css">.wp-first-item {background:#555!important}</style>';
//Background dos objetos do menu da esquerda abertos
	echo '<style type="text/css">.wp-submenu-wrap {background:#555!important}</style>';
}

function remove_paineis_principais_dashboard() {
	global $wp_meta_boxes;

	// Remove o widget "Links de entrada" (Incomming links)
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);        
	// remove o widget "Plugins"
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);        
	// remove o widget "Rascunhos recentes" (Recent drafts)
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	// remove o widget "QuickPress"
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);

	// remove painel de boas vindas
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
	// remove o widget "Agora" (Right now)
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	// remove o widget "Agora" (Right now)
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	// remove o widget "Blog do WordPress" (Primary)
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	// remove o widget "Outras not¨ªcias do WordPress" (Secondary)
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);   
}


function cria_painel_de_suporte() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', '3Sixty | Suporte', 'texto_painel_suporte');
}

function texto_painel_suporte() {
	echo 'Se você tiver qualquer dúvida ou precisar de ajuda, por favor, entre em contato comigo através da minha página de <a href="http://3sixty.com.br">contato</a>.';
}

function wpmidia_toggle_custom_menu_order(){
	return true;
}

//Modifica a cor com base na categoria que o post foi definido
function altera_cores_nos_posts(){
	?>
	<style>
		.status-draft{background: #FCE3F2 !important}
		.status-pending{background: #87C5D6 !important}
		.status-publish{}
		.status-future{background: #C6EBF5 !important}
		.status-private{background:#F2D46F}
		.category-representantes{background:#FFFDB0!important}
		.category-novidades{background:#6FE6F2!important}
		.category-empresa{background:#DFFFDB!important}
		.category-receitas{background:#DF00DB!important}
	</style>
	<?php
}

//N?o esta sendo usada apenas para testes
function ajaxurl() {
	?>
	<script type="text/javascript">
		var ajaxurl = '<?php echo admin_url("admin-ajax.php"); ?>';
	</script>
	<?php
}

//Exibe os produtos que foi clicado a partir da categoria
function f_get_produtos(){

	if(isset($_POST["tag_slug"])){

		$args = array("tag"=>$_POST['tag_slug'], "category"=>$_POST['categoria'], 'post_type' => 'produtos',"nopaging"=>true, 'orderby'=> 'title', 'order' => 'ASC');
		$posts = get_posts($args);

		foreach($posts as $post)
		{
			?>
			<div class="col-xs-6 col-sm-3 col-md-2 text-center m-b-20">
				<div style="overflow: hidden; background: #F6F6F6; padding-top: 15px; padding-bottom: 15px; border-radius: 3px;">
					<img id="img-produto-marcas" src="<?php echo get_field('imagem_marcas',$post->ID)["url"];?>" alt="<?php echo $post->ID;?>" class="col-centered">
				</div>
				<div class="col-xs-12 p-t-10 ft-w-b">
					<?php echo $post->post_title; ?>
				</div>
			</div>
			<?php
		}
	}
	die();
}

//Fun??o que exibe a lightbox do produto que foi selecionado dentro de uma categoria
function f_get_produtos_light(){
	$prod_cod = $_POST['prod_cod'];
	if(isset($_POST["prod_cod"])){
		?>
		<style>
			body{
				overflow: hidden;
			}
		</style>
		<div class="modalGigante">
			<div class="meuX ft-white hidden-xs destroi">+</div>
			<div class="meuX ft-gray visible-xs destroi">+</div>
			<div class="container-fluid">
				<div class="row hidden-xs">
					<div class="col-xs-7 produto_imagem">
						<div class="row text-center">
							<img src="<?php echo get_field('imagem_marcas', $prod_cod)['url']; ?>" class="img-responsive col-centered" alt="<?php echo get_field('imagem_marcas', $prod_cod)['alt']; ?>">
						</div>
					</div>
					<div class="col-xs-5 red produto_descricao">
						<div>
							<div class="ft-white ft-w-b ft-s-18">
								<?php echo get_the_title($prod_cod);?>
							</div>
							<div class="ft-white m-t-10 post_produto_dsc_css" style="max-height: 250px; overflow: auto; ::-webkit-scrollbar-thumb{background:red;}">
								<?php the_field('post_produto_dsc', $prod_cod);?>
							</div>
							<div class="row p-l-10 p-r-10 m-t-20" style="position: absolute;">
								<ul class="nav produtos_dados nav-tabs" role="tablist">
									<li role="presentation" class="active">
										<a href="#post_produto_dados_tecnicos" aria-controls="post_produto_dados_tecnicos" role="tab" data-toggle="tab" class="ft-w-b ft-s-15"><?php _e('Dados Técnicos', 'enova-foods') ?></a>
									</li>
									<li role="presentation">
										<a href="#post_produto_tabela_nutricional" aria-controls="post_produto_tabela_nutricional" role="tab" data-toggle="tab" class="ft-w-b ft-s-15"><?php _e('Tabela Nutricional', 'enova-foods') ?></a>
									</li>
									<li role="presentation">
										<a href="#post_produto_ingredientes" aria-controls="post_produto_ingredientes" role="tab" data-toggle="tab" class="ft-w-b ft-s-15">
										<?php _e('Ingredientes', 'enova-foods') ?></a>
									</li>
								</ul>
								<div class="tab-content tab-produtos-dados post_produto_dsc_css">
									<div role="tabpanel" class="tab-pane fade in active p-t-10 p-r-10 p-l-10" id="post_produto_dados_tecnicos">
										<div class="ft-white">
											<?php the_field('post_produto_dados_tecnicos', $prod_cod);?>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane fade p-t-10 p-r-10 p-l-10" id="post_produto_tabela_nutricional">
										<div class="ft-white">
											<?php the_field('post_produto_tabela_nutricional', $prod_cod);?>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane fade p-t-10 p-r-10 p-l-10" id="post_produto_ingredientes">
										<div class="ft-white">
											<?php the_field('post_produto_ingredientes', $prod_cod);?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row visible-xs">
					<div class="produto_imagem_xs">
						<div class="text-center">
							<img src="<?php echo get_field('imagem_marcas', $prod_cod)['url']; ?>" class="img-responsive col-centered" alt="<?php echo get_field('imagem_marcas', $prod_cod)['alt']; ?>">
						</div>
					</div>
					<div class="red produto_descricao_xs">
						<div class="col-xs-12 m-t-10">
							<div class="ft-white ft-w-b">
								<?php the_field('post_produto_titulo', $prod_cod);?>
							</div>
							<div class="ft-white post_produto_dsc_css" style="max-height: 95px; overflow: auto;">
								<?php the_field('post_produto_dsc', $prod_cod);?>
							</div>
						</div>
						<div class="row">
							<ul class="nav produtos_dados nav-tabs" role="tablist">
								<li role="presentation" class="active">
									<a href="#post_produto_dados_tecnicos1" aria-controls="post_produto_dados_tecnicos" role="tab" data-toggle="tab" class="ft-w-b ft-s-14">Dados Técnicos</a>
								</li>
								<li role="presentation">
									<a href="#post_produto_tabela_nutricional1" aria-controls="post_produto_tabela_nutricional" role="tab" data-toggle="tab" class="ft-w-b ft-s-14">Tabela Nutricional</a>
								</li>
								<li role="presentation">
									<a href="#post_produto_ingredientes1" aria-controls="post_produto_ingredientes" role="tab" data-toggle="tab" class="ft-w-b ft-s-14">Ingredientes</a>
								</li>
							</ul>
							<div class="col-xs-12">
								<div class="tab-content tab-produtos-dados-xs post_produto_dsc_css">
									<div role="tabpanel" class="tab-pane fade in active p-t-10 p-r-10 p-l-10" id="post_produto_dados_tecnicos1">
										<div class="ft-white">
											<?php the_field('post_produto_dados_tecnicos', $prod_cod);?>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane fade p-t-10 p-r-10 p-l-10" id="post_produto_tabela_nutricional1">
										<div class="ft-white">
											<?php the_field('post_produto_tabela_nutricional', $prod_cod);?>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane fade p-t-10 p-r-10 p-l-10" id="post_produto_ingredientes1">
										<div class="ft-white">
											<?php the_field('post_produto_ingredientes', $prod_cod);?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
}



//Fun??o que soma os likes na pagina de novidades
function somaLike(){
	$postid = $_POST["postid"];
	session_save_path(realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));

	session_start();
	global $wpdb;
	$wpdb->show_errors( true );

	//Se ainda n?o tiver dado like
	if(!isset($_SESSION["liked"][$postid])){
		//Verifica no banco se existe algum like.
		$_SESSION["liked"][$postid] = true;
		$q = "SELECT cont_like FROM wp_postlike WHERE id_post ='". $postid . "'";


		$res = $wpdb->get_results($q);

		//Se n?o existe like, insere.
		if($res == null){
			$q = "INSERT INTO wp_postlike (id_post,cont_like) VALUES(" . $postid . ",1); ";
			$res = $wpdb->get_results($q);
			$q = " SELECT cont_like FROM wp_postlike WHERE id_post =". $postid . ";";

			$res = $wpdb->get_results($q);

			echo $res[0]->cont_like;
			//Se j¨¢ existe like, atualiza.
		}else{
			$q = "UPDATE wp_postlike SET cont_like = ". ($res[0]->cont_like+1) ." WHERE id_post = ". $postid . ";";
			$res = $wpdb->get_results($q);
			$q = " SELECT cont_like FROM wp_postlike WHERE id_post =". $postid . ";";

			$res = $wpdb->get_results($q);
			echo $res[0]->cont_like;
		}
		//J¨¢ deu like no post apenas tr¨¢s.
	}else{
		$q = "SELECT cont_like FROM wp_postlike WHERE id_post ='". $postid . "'";

		$res = $wpdb->get_results($q);

		echo $res[0]->cont_like;
	}
	die();
}

//Fun??o que retorna e conta os likes na p¨¢gina de novidades
function get_like_count($postid){
	$q = "SELECT cont_like FROM wp_postlike WHERE id_post ='". $postid . "'";

	global $wpdb;
	$wpdb->show_errors( true );
	$res = $wpdb->get_results($q);

	return $res[0]->cont_like;
}

//Fun??o que retorna os posts por Slug da categoria
function f_get_tags_slugs($posts)
{
	$tags_slugs = [];
	foreach($posts as $post)
	{
		$tags_p = wp_get_post_tags($post->ID);
		$tags_p_slugs = [];
		foreach($tags_p as $tag_p)
		{
			array_push($tags_p_slugs,$tag_p->slug);
		}

		$tags_slugs = array_merge($tags_slugs,array_diff($tags_p_slugs,$tags_slugs));

	}
	return $tags_slugs;
}

//Fun??o que cria o menu na parte de marcas por subcategorias
function get_empresas()
{

//Pesquisa os filhos da categoria Empresa
	$args = array('parent'=>get_category_by_slug('empresa')->cat_ID);
	$arrEmpresas = get_categories($args);

	$Empresas = array();

//Percorre o array de empresas
	foreach($arrEmpresas as $emp)
	{
		$Empresa = new stdClass();
//Obtem as marcas.
		$args = array('parent'=>$emp->cat_ID);
		$arrCatMarcas = get_categories($args);
		$Marcas = array();

		foreach($arrCatMarcas as $marca)
		{
			$marca->Imagem = get_random_category_image($marca->cat_ID);
			$marca->Empresa = $emp->name;
			array_push($Marcas,$marca);
		}

		$Empresa->marcas = $Marcas;
		$Empresa->nome = $emp->name;

//Garbage Colector e seus mist¨¦rios!!!!
		array_push($Empresas,$Empresa);
	}
	return $Empresas;
}

//Obtem a imagem aleat¨®ria do post.
function get_random_category_image($idCategoria)
{
	$args = array('category'=>$idCategoria);
	$postId = get_posts($args)[0]->ID;

	return get_field('imagem_marcas',$postId)["url"];

}

//Verifica se a categoria ¨¦ uma marca.
function is_marca($slugCategoria)
{
	$categoria = get_category_by_slug($slugCategoria)->cat_ID;
	$categoriaMarca = get_category_by_slug('marcas')->cat_ID;

	return cat_is_ancestor_of($categoriaMarca,$categoria );
}

//Fun??o que retorna as buscas.
function busca($termo){
	global $wpdb;
	$wpdb->show_errors( true );
	$q = "SELECT DISTINCT p.ID FROM wp_postmeta pm ";
	$q.= "JOIN wp_posts p ON pm.post_id = p.ID ";
	$q.= "JOIN wp_term_relationships tr ON tr.object_id = p.ID ";
	$q.= "JOIN wp_term_taxonomy tt ON tt.term_taxonomy_id = tr.term_taxonomy_id ";
	$q.= "JOIN wp_terms t ON t.term_id = tt.term_id ";
	$q.= "WHERE (pm.meta_value LIKE '%". $termo ."%' OR p.post_title LIKE '%".$termo ."%' OR t.name LIKE '%".$termo ."%') AND p.ping_status = 'open' ";
	$q.= "AND t.slug NOT IN('nenhuma')";

	$res = $wpdb->get_results($q);
	$posts = [];

	foreach($res as $row)
	{
		array_push($posts,get_post($row->ID));
	}
	return $posts;


}

//Fun??o de busca na pagina representantes.
function buscaRep($termo){
	global $wpdb;
	$wpdb->show_errors( true );

	$q = "SELECT DISTINCT post_id FROM wp_postmeta WHERE ";
	$q .=	" meta_key IN( ";
		$q .= " 'page_representante_uf', ";
		$q .= " 'page_representante_desc', ";
		$q .= " 'page_representante_cidade', ";
		$q .= " 'page_representante_func', ";
		$q .= " 'page_representante_tel', ";
		$q .= " 'page_representante_nome' ";
		$q .= ") ";
$q .=" AND meta_value LIKE '%".$termo."%' ";

$res = $wpdb->get_results($q);
$posts = [];

foreach($res as $row)
{
	array_push($posts,get_post($row->post_id));
}
if(empty($posts)){
	?>
	<section class="container">
		<div class="row">
			<div class="m-t-40 text-center">
				<img src="<?php echo get_theme_root_uri(); ?>/enovafoods/img/busca-nada-encontrado.png" alt="" >
			</div>

			<div class="rct-dsc m-t-40 m-b-80 text-center lh24">
				Nenhum representante encontrado com esse termo.
			</div>
		</div>
	</section>
	<?php
};
return $posts;

}

//Obtem posts pelo id da categoria.
function get_posts_by_category($idCategoria)
{
	$params = array(
		'post_type' => 'produtos',
		'category'=>$idCategoria, 
		'nopaging'=>true, 
		'&orderby=title'

		);

	$posts = get_posts($params);

	foreach($posts as $post)
	{
		$post->tag = wp_get_post_tags($post->ID)[0];
	}
	return $posts;
}

//Exibe na pagina de receitas os filtros
function montaSelectFiltro($meta_key,$label)
{
	global $wpdb;
	$queryebla = "SELECT DISTINCT meta_value FROM wp_postmeta WHERE meta_key = '". $meta_key ."'";
	$wpdb->show_errors( true );
	$res = $wpdb->get_results($queryebla);
	$get_val = "";
	if(isset($_GET["val"]))
	{
		$get_val = $_GET["val"];
	}
	?>
	<select name="<?php echo $meta_key; ?>" id="selectDiaSemana" class="ft-gray selfil">
		<option value="0"><?php echo $label; ?></option>

		<?php foreach($res as $temp){ ?>
		<option <?php if($temp->meta_value == $get_val){echo "selected";} ?> value="<?php echo $temp->meta_value; ?>"><?php echo $temp->meta_value; ?> </option>
		<?php } ?>

	</select>
	<?php

}

// Fun??o que cria a pagina??o das p¨¢ginas.
function wp_pagination($pages = '', $range = 9)
{  
	global $wp_query, $wp_rewrite;  
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;  
	$pagination = array(  
		'base' => @add_query_arg('page','%#%'),  
		'format' => '',  
		'total' => $wp_query->max_num_pages,  
		'current' => $current,  
		'show_all' => true,  
		'type' => 'plain'  
		);  
	if ( $wp_rewrite->using_permalinks() ) $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );  
	if ( !empty($wp_query->query_vars['s']) ) $pagination['add_args'] = array( 's' => get_query_var( 's' ) );  
	echo '<div class="wp_pagination text-center">'.paginate_links( $pagination ).'</div>';
}


///////////////////////////////BLOCO DE TESTES///////////////////////////////
function verifica_banco(){

	$nome = $_POST["nome"];

	global $wpdb;
	$wpdb->show_errors( true );

	$q = "SELECT meus_testes FROM wp_testes WHERE meus_testes ='". $nome . "'";

	$res = $wpdb->get_results($q);
	echo $res[0]->meus_testes;

}
function verifica_tudo(){	
	global $wpdb;
	$wpdb->show_errors( true );

	$q = "SELECT user_email FROM wp_users";

	$res = $wpdb->get_results($q);

	foreach ($res as $teste) {
		echo $teste->user_email;
	}

}
function add_banco(){	
	global $wpdb;
	$wpdb->show_errors( true );
	$nome = $_POST["nome"];
	$q = "INSERT into wp_testes (meus_testes) values ('".$nome."')";

	$res = $wpdb->get_results($q);

	echo var_dump($res);
	verifica_tudo();
}



///////////////////////////////INTERNACIONALIZAÇÂO DO TEMA///////////////////////////////
load_theme_textdomain('enova-foods', get_template_directory() . '/languages' );

//adiciona suporte a menus
add_theme_support( 'menus' );

//registra os menus usados pelo tema
register_nav_menus(array(
	'footer' => __('menu footer'),
	'header' => __('menu header')
));

//carregar css, js de acordo com a documentação wordpress
function addCssJs(){
	//css
	wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array() );
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array() );
	wp_enqueue_style('bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css', array() );
	wp_enqueue_style('bootstrap-theme.min', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array() );
	wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css', array() );
	wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick.css', array() );
	wp_enqueue_style('slick-theme', get_template_directory_uri() . '/css/slick-theme.css', array() );

	//js
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/vendor/slick.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', array(), '1.0.0', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
	wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', array(), '1.0.0', true );



}

// cria diferents tipos de post type
function create_posttype() {
	//post type novidades
  register_post_type( __('novidades'),
    array(
      'labels' => array(
        'name' =>  __('Novidades', 'enova-foods'),
        'singular_name' => __('Novidade', 'enova-foods')
      ),
      'taxonomies' => array('category'),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => __('novidades', 'enova-foods'))
    )
  );
  //post type representantes
    register_post_type( __( 'representantes' ),
    array(
      'labels' => array(
        'name' =>  __('Representantes', 'enova-foods'),
        'singular_name' => __('Representante', 'enova-foods')
      ),
      'taxonomies' => array('category'),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => __('representantes-enovas', 'enova-foods'))
    )
  );
   //post type receitas
  register_post_type( __('receitas' ),
    array(
      'labels' => array(
        'name' =>  __('Receitas', 'enova-foods'),
        'singular_name' => __('Receita', 'enova-foods')
      ),
      'taxonomies' => array('category'),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => __('receitas-enovas', 'enova-foods'))
    )
  );
   //post type prudutos
    register_post_type( __( 'produtos' ),
    array(
      'labels' => array(
        'name' =>  __('Produtos', 'enova-foods'),
        'singular_name' => __('produto', 'enova-foods')
      ),
      'taxonomies' => array('category', 'post_tag' ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => __('produtos-enova', 'enova-foods'))
    )
  );
}

add_action( 'wp_enqueue_scripts', 'addCssJs' );
add_action( 'init', 'create_posttype' );
?>