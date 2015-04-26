<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 * @subpackage WP_Starter
 * @since WP-Starter 1.0
 */

get_header(); ?>


	<div class="large-12 columns featured-image"><?php the_post_thumbnail('full'); ?></div>
	
	<div id="content" class="large-9 columns" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>