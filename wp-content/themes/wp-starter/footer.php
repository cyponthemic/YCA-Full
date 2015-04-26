<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage WP_Starter
 * @since WP-Starter 1.0
 */
?>
</section><!-- #main .wrapper -->
</div>

<div class="container footer-columns">
	<div id="secondary-sidebar" class="row widget-area" role="complementary">
		<div class="large-3 columns">
			<?php dynamic_sidebar( 'sidebar-4' ); ?>
		</div>
		<div class="large-3 columns with-logo">
			<a href="http://www.yarracity.vic.gov.au/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-white.png" alt="City of Yarra"></a>
		</div>
		<div class="large-3 columns">
			<?php dynamic_sidebar( 'sidebar-5' ); ?>
		</div>
		<div class="large-3 columns">
			<?php dynamic_sidebar( 'sidebar-6' ); ?>
		</div>
	</div>
</div>

<div role="contentinfo" class="site-footer container">
	<div class="row">
		<div class="large-12 columns site-info">
			<p class="left">&copy; Yarra City Council <?php echo date('Y'); ?></p>
			<?php wp_nav_menu( array(
				'theme_location' => 'secondary',
				'container' => false,
				'menu_class' => 'inline-list left',
				'fallback_cb' => false
			) ); ?>

			<p class="site-by right">Site by <a href="http://www.cameronboyle.com.au/" target="_blank">Cameron Boyle</a></p>
		</div>
	</div>
</div>

</div>

<nav id="mobile-nav" role="navigation">
<?php wp_nav_menu( array(
	'theme_location' => 'primary',
	'container' => false,
	'depth' => 0,
	'items_wrap' => '<ul class="primary-nav">%3$s</ul>',
	'fallback_cb' => 'wpforge_menu_fallback',
	'walker' => new wpforge_walker( array(
		'in_top_bar' => false,
		'item_type' => 'li'
	) ),
) ); ?>
</nav>

<?php wp_footer(); ?>
<script>
</script>
</body>
</html>
