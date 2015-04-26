<?php
/**
 * @package WordPress
 * @subpackage WP_Starter
 * @since WP-Forge 1.0
 */

get_header(); ?>

	<div class="large-12 columns featured-image"><?php the_post_thumbnail('full'); ?></div>

	<div id="content" class="large-9 columns" role="main">

			<?php while ( have_posts() ) : the_post();?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->

		<div id="secondary" class="large-3 columns widget-area" role="complementary">
			<?php get_search_form(); ?>

			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div>
<?php get_footer(); ?>