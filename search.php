<?php

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content main-content" role="main">
			<?php if ( have_posts() ) : ?>
				<div class="container">
					<h1 class="heading">Search Results for: <?php echo get_search_query(); ?></h1>
				</div>
				<div class="container">
				 	<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>					
				</div>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>