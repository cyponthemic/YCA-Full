<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage WP_Forge
 * @since WP-Forge 1.0
 */
?>
		<div id="secondary" class="large-3 columns widget-area" role="complementary">
			<?php get_search_form(); ?>

			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>