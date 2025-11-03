<?php
get_header(); ?>
		<div id="output" class="site-content" role="main">
		<?php  $gets=$_GET;
			query_posts( 'paged=3' );?>
		<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		</div><!-- #content -->
	