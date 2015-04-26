<?php
/**
 * @package WordPress
 * @subpackage WP_Starter
 * @since WP-Forge 1.0
 */

get_header(); ?>

	<div class="large-12 columns featured-image"><?php the_post_thumbnail('full'); ?></div>

	<div id="content" class="large-9 columns" role="main">

			<?php while ( have_posts() ) : the_post();
				$id = get_the_ID();
				$location = get_field('location', $id);
				$capacity = get_field('capacity', $id);
				$bookings = get_field('bookings', $id);
			?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->

		<div id="secondary" class="large-3 columns widget-area" role="complementary">
			<?php get_search_form(); ?>

			<div class="side-details">
				<?php if(!empty($location)) { ?>
				<h2>Location</h2>
				<h4><address><?php echo $location; ?></address></h4><?php } ?>

				<?php if(!empty($capacity)) { ?>
				<h2>Capacity</h2>
				<h4><?php echo $capacity; ?> People</h4><?php } ?>

				<?php if(!empty($bookings)) { ?>
				<h2>Bookings</h2>
				<h6><?php echo str_replace( array('>http://', '>https://'), '>', make_clickable($bookings)); ?></h6><?php } ?>
			</div>
		</div>
<?php get_footer(); ?>