<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php wp_title('&rsaquo;', true, 'right'); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="shortcut icon" href="<?php echo esc_url( home_url( '/' ) ); ?>favicon.ico" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper"> 

    <header id="header"> 
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
                'fallback_cb' => 'wpforge_menu_fallback', // workaround to show a message to set up a menu
                'walker' => new wpforge_walker( array(
                    'in_top_bar' => false,
                    'item_type' => 'li'
                ) ),
            ) ); ?>
            </nav>
        </div>
    </header><!-- #header -->

    <section class="container row" role="document">