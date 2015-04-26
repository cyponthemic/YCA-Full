<?php
/**
 * Template Name: Front Page Template
 *
 * @package WordPress
 * @subpackage WP_Starter
 * @since WP-Starter 1.0
 */

get_header(); ?>
	</section>
</div><!-- .container -->

	<div class="container home-banner" style="background-image:url(<?php $bgs = ot_get_option( 'banner_backgrounds' ); $bgc = rand(0, count($bgs)-1); echo $bgs[$bgc][image]; ?>);">
		<div class="row">
			<div class="large-7 columns">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-logo.png" />
			</div>
			<div class="large-3 columns" style="height:369px">
				<div class="content-slider">
				<?php
					function front_excerpt_length( $length ) { return 25; }
					add_filter( 'excerpt_length', 'front_excerpt_length', 999 );
					function front_excerpt_more( $more ) { return ''; }
					add_filter( 'excerpt_more', 'front_excerpt_more' );
					
					$posts = get_posts( 'posts_per_page=3&post_type=post' );
					foreach( $posts as $p ){ setup_postdata( $p ); ?>
					<div class="slide">
						<h2><a href="<?php echo get_permalink($p->ID); ?>"><?php echo $p->post_title; ?></a></h2>
						<p><?php the_excerpt(); ?></p>
						<p>&hellip;<strong><a href="<?php echo get_permalink($p->ID); ?>" class="read-more">Read More</a></strong></p>
					</div>
				<?php } wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</div>

<div class="container">
	<section class="row" role="document">

		<div id="content" class="large-9 columns" role="main">

			<h2><?php echo ot_get_option( 'events_title' ); ?></h2>
			<p><?php echo ot_get_option( 'events_description' ); ?></p>
			<ul class="large-block-grid-3 small-block-grid-2 home-grid">
			<?php
				$wp_query = new WP_Query(array( 'post_type' => 'event', 'posts_per_page' => '4',
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
					'order' => 'ASC' ));
				$i = 0;
				if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); $i++;
					$id = get_the_ID();
					$start_date = get_field('start_date', $id);	
					$end_date = get_field('end_date', $id);
				?>
					<li class="p<?php echo $i; ?>"><a href="<?php the_permalink(); ?>" class="caption">
						<?php the_post_thumbnail('thumb'); ?>
						<h3><?php the_title(); ?></h3>
					</a></li>
				<?php endwhile; endif; wp_reset_query(); ?>
			</ul>

			<a href="<?php echo ot_get_option( 'events_link_url' ); ?>" class="button border right"><?php echo ot_get_option( 'events_link_text' ); ?></a>
			<div class="row"></div>

			<h2><?php echo ot_get_option( 'works_title' ); ?></h2>
			<p><?php echo ot_get_option( 'works_description' ); ?></p>
			<ul class="large-block-grid-3 small-block-grid-2 home-grid">
			<?php
				$wp_query = new WP_Query(array( 'post_type' => 'work', 'posts_per_page' => '4',
					'meta_query' => array(
						array(
							'key' => 'featured',
							'value' => '1',
							'compare' => '=', // Return the ones greater than today's date
							'type' => 'NUMERIC,'
						),
					),
					'orderby' => 'date',
					'order' => 'DESC' ));
				$i = 0;
				if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); $i++;
					$id = get_the_ID();
					$start_date = get_field('start_date', $id);	
					$end_date = get_field('end_date', $id);
				?>
					<li class="p<?php echo $i; ?>"><a href="<?php the_permalink(); ?>" class="caption">
						<?php the_post_thumbnail('thumb'); ?>
						<h3><?php the_title(); ?></h3>
					</a></li>
				<?php endwhile; endif; wp_reset_query(); ?>
			</ul>
			<a href="<?php echo ot_get_option( 'works_link_url' ); ?>" class="button border right"><?php echo ot_get_option( 'works_link_text' ); ?></a>
			<div class="row"></div>

			<h2><?php echo ot_get_option( 'venues_title' ); ?></h2>
			<p><?php echo ot_get_option( 'venues_description' ); ?></p>
			<ul class="large-block-grid-3 small-block-grid-2 home-grid">
			<?php
				$wp_query = new WP_Query(array( 'post_type' => 'venue', 'posts_per_page' => '4',
					'meta_query' => array(
						array(
							'key' => 'featured',
							'value' => '1',
							'compare' => '=', // Return the ones greater than today's date
							'type' => 'NUMERIC,'
						),
					),
					'orderby' => 'date',
					'order' => 'DESC' ));
				$i = 0;
				if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); $i++;
					$id = get_the_ID();
					$start_date = get_field('start_date', $id);	
					$end_date = get_field('end_date', $id);
				?>
					<li class="p<?php echo $i; ?>"><a href="<?php the_permalink(); ?>" class="caption">
						<?php the_post_thumbnail('thumb'); ?>
						<h3><?php the_title(); ?></h3>
					</a></li>
				<?php endwhile; endif; wp_reset_query(); ?>
			</ul>
			<a href="<?php echo ot_get_option( 'venues_link_url' ); ?>" class="button border right"><?php echo ot_get_option( 'venues_link_text' ); ?></a>
		</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>