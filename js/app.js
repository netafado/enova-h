var j = jQuery.noConflict();

var menu = document.querySelectorAll('#menu-menu-principal > li');
var menuTopo = document.getElementById('menu-menu-principal');
var btnAbrir = document.querySelectorAll('.openMarcas');

// acrescentar logo no centro do menu
function addLogoToCenter(){
	var onde = Math.floor(menu.length / 2);
	var logoContainer  = document.getElementById('logo-center');	
	menuTopo.insertBefore(logoContainer,menu[onde]);
}


//adiciona o onclick aos botoes com a classe openMarcas
for(i = 0; i < btnAbrir.length; i++){
	btnAbrir[i].onclick = function (argument) {
		abrirMarcas();
	}
}

window.onload = function(){
	addLogoToCenter();
	j('.menu-principal').show(0);
	j('#logo-center').show(0);

	
}

j('#header-mobile > li.menu-item ul.sub-menu').hide();

j('#header-mobile > li.menu-item').on('click', 
	function(){
		console.log('x');
		j(this).find('.sub-menu').fadeToggle();
});

j('#menu-menu-principal > li.menu-item').on('click', 
	function(){
		console.log('x');
		j(this).find('.sub-menu').fadeToggle();
});

j('#menu-menu-principal > li > ul.sub-menu').on('mouseleave', 
	function(){
		j(this).fadeOut(1000);
	});