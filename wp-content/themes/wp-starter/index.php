<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage WP_Starter
 * @since WP-Starter 1.0
 */

function home_excerpt_length( $length ) { return 70; }
add_filter( 'excerpt_length', 'home_excerpt_length', 999 );
get_header(); ?>

	<div id="content" class="large-9 columns" role="main">
		<?php if ( have_posts() ) : ?>

			<header class="entry-header"><h1 class="entry-title">News</h1></header>
			<?php /* Start the Loop */ ?>
			<div class="infinite-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			</div>

			<div class="infinite-pagination pagination"><?php posts_nav_link(); ?></div>
			<div class="load-more"></div>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">

			<?php if ( current_user_can( 'edit_posts' ) ) :
				// Show a different message to a logged-in user who can add posts.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'No posts to display', 'wpstarter' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'wpstarter' ), admin_url( 'post-new.php' ) ); ?></p>
				</div><!-- .entry-content -->

			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>

			</article><!-- #post-0 -->

		<?php endif; // end have_posts() check ?>

	</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>