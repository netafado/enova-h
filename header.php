<!DOCTYPE HTML>
<html class="no-js" <?php language_attributes(); ?>>
<head>

	<!-- 
	/*
	Theme Name: Paperoff
	Theme URI: http://paperoff.com.br
	Author: BONOBOTEC
	Author URI: http://bonobotec.com.br
	Description: Template for enterprise!
	Version: 2.6
	License: All rights reserved
	Theme date: 28/08/2014
	License URI: license.txt
	Tags: template, CMS, paperoff, ged, responsive, new, CRM, clientes, amigos, parceiros,documentos, ferramenta, captura, rapida, seugra, beneficios, digital, contato
	*/
-->

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php bloginfo('name');?></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?> <?php bloginfo('charset') ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="all" type="text/css" />

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_theme_root_uri(); ?>/enovafoods/img/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_theme_root_uri(); ?>/enovafoods/img/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_theme_root_uri(); ?>/enovafoods/img/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_theme_root_uri(); ?>/enovafoods/img/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_theme_root_uri(); ?>/enovafoods/img/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_theme_root_uri(); ?>/enovafoods/img/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_theme_root_uri(); ?>/enovafoods/img/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_theme_root_uri(); ?>/enovafoods/img/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_theme_root_uri(); ?>/enovafoods/img/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_theme_root_uri(); ?>/enovafoods/img/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_theme_root_uri(); ?>/enovafoods/img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_theme_root_uri(); ?>/enovafoods/img/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_theme_root_uri(); ?>/enovafoods/img/favicon-16x16.png">

<link rel="apple-touch-icon" href="<?php echo get_theme_root_uri(); ?>/enovafoods/img/favicon.ico">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_theme_root_uri(); ?>/enovafoods/img/favicon.ico" />
<link rel="icon" href="<?php echo get_theme_root_uri(); ?>/enovafoods/img/favicon.ico" type="image/x-icon">

<link rel="manifest" href="<?php echo get_theme_root_uri(); ?>/enovafoods/img/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo get_theme_root_uri(); ?>/enovafoods/img/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- Place favicon.ico in the root directory -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,400italic,700' rel='stylesheet' type='text/css'>



<script src="<?php echo get_theme_root_uri(); ?>/enovafoods/js/vendor/jquery-2.1.4.min.js"></script>
<script src="<?php echo get_theme_root_uri(); ?>/enovafoods/js/vendor/modernizr-2.8.3.min.js"></script>


<?php wp_head(); ?>
</head>
<body>

<!-- Inclui o goofle analytics -->
<?php get_template_part( 'analyticstracking' ); ?>

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- header topo -->
<?php get_template_part('parts/header/header', 'topo'); ?>


<!-- NAVBAR -->
<?php get_template_part('parts/nav/nav', 'main')?>