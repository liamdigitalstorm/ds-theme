<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>

	<?php
    remove_action('wp_head', '_admin_bar_bump_cb');
	do_action( 'wpbootstrap_before_wp_head' );
	wp_head();
	do_action( 'wpbootstrap_after_wp_head' );
	?>

		<style type="text/css" media="screen">
			<?php if( is_admin_bar_showing() ): ?>
			#wpadminbar{top:auto;bottom:0}@media screen and (max-width: 600px){#wpadminbar{position:fixed}}#wpadminbar .menupop .ab-sub-wrapper,#wpadminbar .shortlink-input{bottom:32px}@media screen and (max-width: 782px){#wpadminbar .menupop .ab-sub-wrapper,#wpadminbar .shortlink-input{bottom:46px}}@media screen and (min-width: 783px){.admin-bar.masthead-fixed .site-header{top:0}}
			<?php endif; ?>
			<?php if( $menu_position === 'fixed-top' ): ?>
			html{margin-top: 50px;}
			<?php endif; ?>
		</style>
</head>

<body <?php body_class(); ?>>
    
    <?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>

<div class="wrapper">



	<header class="container-fluid container-header">
		<div class="row ">
		    <div class="container">
			<div class="col-sm-3 logo col-xs-6">
			
			</div>
			<div class="col-sm-9 static col-xs-5">
				
			</div>
			</div>
		</div>
		<div class="row js-header-height header-nav">
		    <div class="col-sm-12">
		<?php wp_nav_menu( array( 'theme_location' => 'max_mega_menu_1' ) ); ?>
		</div>
		</div>
	</header>
	<section class="container-fluid container-main" role="main">

	

