<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage WP_Starter
 * @since WP-Starter 1.0
 */

function home_excerpt_length( $length ) { return 70; }
add_filter( 'excerpt_length', 'home_excerpt_length', 999 );

get_header(); ?>

	<div id="content" class="large-9 columns" role="main">
		<?php if ( have_posts() ) : ?>

			<header class="page-header"><h1 class="page-title"><?php printf( __( 'Search Results for "%s"', 'wpstarter' ), '<span>' . get_search_query() . '</span>' ); ?></h1></header>
			<?php /* Start the Loop */ ?>
			<div class="infinite-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			</div>

			<div class="infinite-pagination pagination"><?php posts_nav_link(); ?></div>
			<div class="load-more"></div>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>


	</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>