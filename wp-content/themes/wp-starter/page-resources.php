<?php
/**
 * Template Name: Resources
 *
 * @package WordPress
 * @subpackage WP_Starter
 * @since WP-Starter 1.0
 */
error_reporting(0);
get_header(); ?>

		<div class="large-12 columns top-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>
		</div>

		<div id="content" class="large-8 columns" role="main">

		<?php
			// Query Out Database
			global $wp_query, $wp_rewrite;
			$wp_query = new WP_Query(array( 'post_type' => 'resource', 'posts_per_page' => '-1',
				'orderby' => 'date',
				'order' => 'DESC',
				'paged' => $paged ));

			if ($wp_query->have_posts()) : ?>
			<ul class="large-block-grid-3 small-block-grid-2 primary-grid infinite-grid">
			<?php 
				while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<li>
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumb'); ?></a>
					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					<p><?php echo get_the_excerpt(); ?></p>
					<h6><a href="<?php the_permalink(); ?>">View</a></h6>
				</li>
			<?php endwhile; ?>
			</ul>

			<div class="infinite-pagination pagination"><?php posts_nav_link(); ?></div>
			<div class="load-more for-grid"></div>
			<?php endif; wp_reset_query(); ?>

		</div><!-- #content -->

		<div id="secondary" class="large-3 columns widget-area" role="complementary">
			<?php get_search_form(); ?>

			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div>

<?php get_footer(); ?>