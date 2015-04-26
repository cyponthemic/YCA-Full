<?php
/*
YARPP Template: Foundation
Description: For Yarra City Arts Website (WP-Starter)
Author: 
*/ ?>
<?php if (have_posts()): ?>
<h2>Other <?php $type_objects = get_post_type_object( get_post_type () ); echo $type_objects->labels->name; ?></h2>
<ul class="large-block-grid-3 small-block-grid-2 home-grid">
	<?php $i=0; while (have_posts()) : the_post(); $i++; ?>
		<li class="p<?php echo $i; ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="caption">
			<?php the_post_thumbnail('thumb'); ?>
			<h3><?php the_title(); ?></h3>
		</a></li>
	<?php endwhile; ?>
</ul>
<?php endif; ?>
