<?php

//Não sei direito o que essa função faz. Copiei e colei do forum mesmo.
function is_ajax() {
	return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

get_header();

$categoria = get_queried_object();


	get_template_part("marca");

?>