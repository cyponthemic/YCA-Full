<?php
/**
 * WP-Starter functions and definitions.
 *
 * A blank functions.php file to add your own functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage WP_Starter
 * @since WP-Starter 1.0
 */

/**
 * Includes
 */
// OptionTree
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_child_theme_mode', '__return_true' );
load_template( trailingslashit( get_stylesheet_directory() ) . 'option-tree/ot-loader.php' );
// ACF
define( 'ACF_LITE', true );
include_once('advanced-custom-fields/acf.php');
include_once('advanced-custom-fields/acf-field-date-time-picker/acf-date_time_picker.php');
// CPT & Options
load_template( trailingslashit( get_stylesheet_directory() ) . 'inc/custom-post-types.php');
load_template( trailingslashit( get_stylesheet_directory() ) . 'inc/meta-boxes.php');
load_template( trailingslashit( get_stylesheet_directory() ) . 'inc/theme-options.php');

/**
 * Setup WP-Starter Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function wpstarter_theme_setup() {
	load_child_theme_textdomain( 'wpstarter', get_stylesheet_directory() . '/language' );

	remove_editor_styles();
	add_editor_style( array( 'css/foundation.min.css', 'style.css', 'fonts/font-awesome.css' ) );

	add_image_size( 'thumb', 500, 347, true );
	add_image_size( 'thumb2', 600, 320, true );
	add_image_size( 'full', 1200, 2000, false );
	add_image_size( 'long', 600, 870, true );
}
add_action( 'after_setup_theme', 'wpstarter_theme_setup', 99 );

/**
 * Remove Theme Supports for the Child.
 */
function wpstarter_remove_support_child() {
	remove_theme_support( 'post-formats' );
	remove_theme_support( 'custom-header' );
	remove_theme_support( 'custom-background' );
}
add_action( 'after_setup_theme', 'wpstarter_remove_support_child', 11 );

/**
 * Scripts & Styles
 */
function wpstarter_scripts_styles() {
	wp_enqueue_script( 'isotope-js', get_stylesheet_directory_uri() . '/js/isotope.min.js', array('foundation-js'), '', true );
	wp_enqueue_script( 'infinite-scroll-js', get_stylesheet_directory_uri() . '/js/infinite-scroll.min.js', array('foundation-js'), '', true );
	wp_enqueue_script( 'royalslider-js', get_stylesheet_directory_uri() . '/js/royalslider.min.js', array('foundation-js'), '', true );
	wp_enqueue_script( 'app-js', get_stylesheet_directory_uri() . '/js/app.js', array('functions-js'), '', true );

	wp_dequeue_style( 'normalize' );
	wp_enqueue_style( 'royalslider', get_stylesheet_directory_uri() . '/css/royalslider.css' );
	wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/foundation.min.css' );

	global $is_IE, $wp_styles, $wp_scripts;
	if($is_IE) {
		wp_enqueue_style( 'ie8-css', get_stylesheet_directory_uri() . '/css/ie8.css' );
		$wp_styles->add_data( 'ie8-css', 'conditional', 'lt IE 9' );
		wp_enqueue_script( 'html5shiv', get_stylesheet_directory_uri() . '/js/html5shiv.min.js' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpstarter_scripts_styles', 11 );

/**
 * Sidebar
 */
function wpstarter_widgets_init() {
	unregister_sidebar( 'sidebar-2' );
	unregister_sidebar( 'sidebar-3' );

	register_sidebar( array(
		'name' => __( 'Resources Sidebar', 'wpforge' ),
		'id' => 'sidebar-2',
		'description' => __( 'Displays widgets in the blog area as well as pages.', 'wpforge' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Room to create', 'wpforge' ),
		'id' => 'sidebar-3',
		'description' => __( 'Displays widgets in the blog area as well as pages.', 'wpforge' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
}
add_action( 'widgets_init', 'wpstarter_widgets_init', 11 );


//Excerpt
function custom_excerpt_length( $length ) { return 17; }
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more( $more ) { return '...'; }
add_filter('excerpt_more', 'new_excerpt_more');



/* WordPress Gallery Shortcode (WP 3.7.1) for Foundation (might need to be updated from media.php with WP updates) */
remove_shortcode('gallery');
add_shortcode('gallery', 'foundation_gallery_shortcode');
function foundation_gallery_shortcode($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery'));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = 'li';
	$captiontag = 'div';
	$icontag = 'span';

	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_div = '';
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<ul id='$selector' class='gallery galleryid-{$id} large-block-grid-{$columns} small-block-grid-2 gallery-size-{$size_class}' data-clearing>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		if ( ! empty( $link ) && 'file' === $link )
			$image_output = wp_get_attachment_link( $id, $size, false, false );
		elseif ( ! empty( $link ) && 'none' === $link )
			$image_output = wp_get_attachment_image( $id, $size, false );
		else
			$image_output = wp_get_attachment_link( $id, $size, true, false );

		$image_meta  = wp_get_attachment_metadata( $id );

		$orientation = '';
		if ( isset( $image_meta['height'], $image_meta['width'] ) )
			$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';

		$output .= "<{$itemtag} class='gallery-item'>";
		$output .= "
			<{$icontag} class='gallery-icon {$orientation}'>
				$image_output
			</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
	}

	$output .= "
		</ul>\n";

	return $output;
}

$customPostTaxonomies = get_object_taxonomies('venues');

if(count($customPostTaxonomies) > 0)
{
     foreach($customPostTaxonomies as $tax)
     {
	     $args = array(
         	  'orderby' => 'name',
	          'show_count' => 0,
        	  'pad_counts' => 0,
	          'hierarchical' => 1,
        	  'taxonomy' => $tax,
        	  'title_li' => ''
        	);

	     wp_list_categories( $args );
     }
}


?>