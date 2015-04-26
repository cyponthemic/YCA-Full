<?php
/**
 * Taxonomy - Events Category
 *
 * @package WordPress
 * @subpackage WP_Starter
 * @since WP-Starter 1.0
 */

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
get_header(); ?>

		<div class="large-12 columns top-content" role="main">

			<?php /* while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; */ ?>
			<header class="entry-header">
				<h1 class="entry-title">Events - <?php echo $term->name; ?></h1>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<h2><?php echo $term->description; ?></h2>
			</div>
		</div>

		<div id="content" class="large-8 columns left" role="main">

		<?php
			// Query Out Database
			global $wp_query, $wp_rewrite;
			$wp_query = new WP_Query(array( 'post_type' => 'event', 'event_category' => $term->slug, 'posts_per_page' => '99',
				'meta_key' => 'start_date',
				'meta_query' => array(
					array(
						'key' => 'end_date', // Check the end date field
						'value' => date("Ymj"), // Set today's date (note the similar format)
						'compare' => '>=', // Return the ones greater than today's date
						'type' => 'DATE,'
					),
				),
				'orderby' => 'meta_value_num',
				'order' => 'ASC',
				'paged' => $paged ));

			if ($wp_query->have_posts()) : ?>
			<ul class="large-block-grid-3 small-block-grid-2 primary-grid infinite-grid">
			<?php
				while ($wp_query->have_posts()) : $wp_query->the_post();
				$id = get_the_ID();
				$start_date = get_field('start_date', $id);	
				$end_date = get_field('end_date', $id);
				$location = get_field('location', $id);

				// Add Category Classes
				$filters = '';
				$cats = get_the_terms( get_the_ID(), 'event_category' ); 
				if(!empty($cats)) foreach ($cats as $cat) { $filters .= ' '.$cat->slug; }
				$start_date = strtotime(get_field('start_date', $id));	
				$end_date = strtotime(get_field('end_date', $id));
				?>
				<li class="<?php echo $filters; ?>">
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumb'); ?></a>
					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					<h5 class="date"><?php echo date("j M", $start_date) . " ";
											if($end_date == $start_date) echo date("Y", $start_date); else echo "&#8211; ".date("j M Y", $end_date); ?></h5>
					<p><?php echo get_the_excerpt(); ?></p>
				</li>
			<?php endwhile; ?>
			</ul>

			<div class="pagination"><?php posts_nav_link(); ?></div>
			<div class="load-more for-grid"></div>
			<?php endif; wp_reset_query(); ?>

		</div><!-- #content -->

		<div id="secondary" class="large-3 columns widget-area" role="complementary">
			<?php get_search_form(); ?>

			<div class="featured-event">
			<?php
				$wp_query = new WP_Query(array( 'post_type' => 'event', 'event_category' => $term->slug, 'posts_per_page' => '1',
					'meta_key' => 'start_date',
					'meta_query' => array(
						array(
							'key' => 'end_date', // Check the end date field
							'value' => date("Ymd"), // Set today's date (note the similar format)
							'compare' => '>=', // Return the ones greater than today's date
							'type' => 'DATE,'
						),
						array(
							'key' => 'featured',
							'value' => '1',
							'compare' => '=', // Return the ones greater than today's date
							'type' => 'NUMERIC,'
						),
					),
					'orderby' => 'meta_value_num',
					'order' => 'ASC',
					'paged' => $paged ));

				if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
					$id = get_the_ID();
					$start_date = get_field('start_date', $id);	
					$end_date = get_field('end_date', $id);
				?>
					<a href="<?php the_permalink() ?>" class="hide-for-small"><?php the_post_thumbnail('long'); ?></a>
					<a href="<?php the_permalink() ?>" class="show-for-small"><?php the_post_thumbnail('thumb2'); ?></a>
					<div class="panel">
						<h4>Featured Event</h4>
						<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
						<p><?php echo get_the_excerpt(); ?></p>
						<h5 class="date"><?php if(!empty($start_date)) { echo date( 'j M Y', strtotime($start_date) ); } ?></h5>
					</div>
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>
		</div>

<?php get_footer(); ?>