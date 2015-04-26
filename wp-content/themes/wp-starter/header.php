<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php wp_title('&rsaquo;', true, 'right'); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-62287945-1', 'auto');
			ga('send', 'pageview');

	</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="header" class="container"> 
	<div class="row">
		<div class="large-12 columns">
			<hgroup class="site-logo" role="banner">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
			</hgroup>

			<nav id="access" class="right" role="navigation">
			<?php wp_nav_menu( array(
				'theme_location' => 'primary',
				'container' => false,
				'depth' => 0,
				'items_wrap' => '<ul class="primary-nav">%3$s</ul>',
				'fallback_cb' => 'wpforge_menu_fallback',
				'walker' => new wpforge_walker( array(
					'in_top_bar' => false,
					'item_type' => 'li'
				) ),
			) ); ?>
			</nav>
			<a href="#" class="mobile-nav-toggle right"><span>Open Menu</span><svg viewBox="0 0 136 125" xmlns="http://www.w3.org/2000/svg"><g><path d="m136.406311,23.625l-136.406311,0l0,-23.625l136.406311,0l0,23.625zm0,50.765587l-136.406311,0l0,-23.624996l136.406311,0l0,23.624996zm0,50.625l-136.406311,0l0,-23.625l136.406311,0l0,23.625z"/></g></svg></a>
		</div>
	</div>
</div>
<div class="header-filler"></div>

<div class="container">
	<div class="header-search row"><div class="large-12 columns"><?php get_search_form(); ?></div></div>

<section class="row" role="document">