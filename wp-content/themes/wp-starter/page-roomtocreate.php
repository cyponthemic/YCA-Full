<?php
/**
 * Template Name: Room to create
 *
 * @package WordPress
 * @subpackage WP_Starter
 * @since WP-Starter 1.0
 */
error_reporting(0);
get_header(); ?>


	<div id="content" class="large-9 columns" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->

		<div id="secondary" class="large-3 columns widget-area" role="complementary">
			<?php get_search_form(); ?>

        <?php dynamic_sidebar( 'sidebar-3' ); ?>


			</div>
		</div>


<?php get_footer(); ?>