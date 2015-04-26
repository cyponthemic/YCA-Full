<?php
/**
 * @package WordPress
 * @subpackage WP_Starter
 * @since WP-Forge 1.0
 */

get_header(); ?>

	

	<div id="content" class="large-9 columns" role="main">

			<?php while ( have_posts() ) : the_post();
				$id = get_the_ID();
				$location = get_field('location', $id);
			?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->

		<div id="secondary" class="large-3 columns widget-area" role="complementary">
			<?php get_search_form(); ?>

			<div class="side-details">
				<?php if(!empty($location)) { ?>
				<h2>Where</h2>
				<h4><?php echo $location; ?></h4><?php } ?>
				<h5><a  class="button" href="http://yarracityarts.com.au/gallery/">Back to gallery</a></h5>
			</div>
		</div>
<?php get_footer(); ?>