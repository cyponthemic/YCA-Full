<?php
/**
 * Template Name: Full-width Page Template, No Sidebar
 *
 * @package WordPress
 * @subpackage WP_Starter
 * @since WP-Starter 1.0
 */

get_header(); ?>

		<div id="content" class="large-12 columns" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

<?php get_footer(); ?>