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
				$start_date = strtotime(get_field('start_date', $id));
				$end_date = strtotime(get_field('end_date', $id));
				$start_time = strtotime(get_field('start_time', $id));
				$end_time = strtotime(get_field('end_time', $id));
				$location = get_field('location', $id);
				$more_info = get_field('more_info', $id);
			?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->

		<div id="secondary" class="large-3 columns widget-area" role="complementary">
			<?php get_search_form(); ?>

			<div class="side-details">
				<h2>When</h2>
				<h4 class="date"><?php echo date("d M ", $start_date);
					if($end_date == $start_date) echo date("Y", $start_date);
					else echo "&#8211; ".date("d M Y", $end_date);

					if(!empty($start_time)) {
						echo "<span class='time'>".date("g:ia", $start_time);
						if(!empty($end_time)) echo " &#8211; ".date("g:ia", $end_time);
						echo "</span>"; } ?>
				</h4>

				<?php if(!empty($location)) { ?>
				<h2>Where</h2>
				<h4><address><?php echo $location; ?></address></h4><?php } ?>

				<?php if(!empty($more_info)) { ?>
				<h2>More Info</h2>
				<h6><?php 
				str_replace( array('>http://', '>https://'), '>', make_clickable($more_info)); 
				
				$clickable = make_clickable($more_info);
				$target_blank = preg_replace('/<a /','<a target="_blank" ',$clickable);
				echo $target_blank;
				
				
				?></h6><?php } ?>
			</div>
		</div>
<?php get_footer(); ?>