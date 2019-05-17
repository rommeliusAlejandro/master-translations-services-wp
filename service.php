<?php
/**
 * 
 * Template Name: Service
 */

get_header(); ?> 

<div id="primary" class="content-area">
		<div id="content" class="main-content" role="main">
			<div class="container content-section">
			<script type="text/javascript">
				jQuery(document).ready(function(){	
					jQuery('ul.tabs li').click(function(){
						var tab_id = jQuery(this).attr('data-tab');
						jQuery('ul.tabs li').removeClass('current');
						jQuery('.tab-content').removeClass('current');
						jQuery(this).addClass('current');
						jQuery("#"+tab_id).addClass('current');
					})
				})
			</script>	
				<ul class="tabs">
					<li class="tab-link current" data-tab="tab-1">Transcription</li>
					<li class="tab-link" data-tab="tab-2">How It Works</li>
					<li class="tab-link" data-tab="tab-3">FAQ</li>					
				</ul>
				<div id="tab-1" class="tab-content current">
					<div class="widget-post-area">
						<?php  echo do_shortcode('[load_review id="'.get_the_ID().'"]'); ?>
						<br/>
						<div class="one-third next"> 
							<a class="white-buttons medium" href="/checkout">GET STARTED <span class="fa fa-chevron-right"></span></a> 
						</div>
						<div class="one-third next">			
						</div>	
					</div>
				</div>
				<div id="tab-2" class="tab-content">
					<?php if ( is_active_sidebar( 'howitworks_area_widgets' ) ) : ?>
							<div>
								<?php dynamic_sidebar( 'howitworks_area_widgets' ); ?>
							</div>
					<?php endif; ?>
				</div>
				<div id="tab-3" class="tab-content">
					<?php if ( is_active_sidebar( 'fabtab_area_widgets' ) ) : ?>
							<div>
								<?php dynamic_sidebar( 'fabtab_area_widgets' ); ?>
							</div>
					<?php endif; ?>
				</div>				
			</div>
			<div class="container content-section">
					<?php if ( is_active_sidebar( 'trans_area_widgets' ) ) : ?>
							<div>
								<?php dynamic_sidebar( 'trans_area_widgets' ); ?>
							</div>
					<?php endif; ?>				
				<div class="clear"></div>
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