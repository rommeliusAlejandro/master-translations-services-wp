<?php
/**
 *
 * Template Name:CheckOut
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="main-content checkout" role="main">				
			<div class="container">
				<?php 
				//	while ( have_posts() ) : the_post(); 
				//		the_content();
				//	endwhile;
				?>
				<div class="one-half next">
					<div class="one-third next">
						<label class="special_label">Let’s translate now</label>
					</div>
					<div class="one-third next">
						<label>Simply Fill the Form and it’s Done!</label>
					</div>					
				</div>
				<div class="one-half next get_price">
					<div class="one-third next">
						<h2>Price Request</h2>
					</div>
					<div class="one-third add-left-separator next clear">
						<label>Get a Response Within 1 Hour</label>
					</div>
				</div>				
			</div>
			<div class="container content-section">				
				<?php if ( is_active_sidebar( 'form_widget' ) ) : ?>
					<div>
						<?php dynamic_sidebar( 'form_widget' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>