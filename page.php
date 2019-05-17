<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="main-content" role="main">	
			<div class="container">
				<h1><?php the_title(); ?></h1>
			</div>
			<div class="container default-page">
				<?php 
					while ( have_posts() ) : the_post(); 
						the_content();
					endwhile;
				?>
			</div>			
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>