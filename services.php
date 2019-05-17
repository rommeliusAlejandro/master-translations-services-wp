<?php
/* 

*/
get_header(); 
?>

<div class="clear"></div>
<div id="main">
		<div id="container" class="one-column">
			<div id="content" role="main" class="main-content">
				<div class="container">
					<h1 class="heading"><?php the_title(); ?></h1>
				</di>
				<hr class="heading-separator"/>				
				<div class="content-section">
					<?php
							$args = array( 'post_type' => 'page', 'posts_per_page' => 10,'order'=> 'ASC', 'orderby' => 'title', 'meta_key' => 'type' );
							$loop = new WP_Query( $args ); 
							while ( $loop->have_posts() ) : $loop->the_post();
					?>
					<div class="service-post one-third next">
							<div class="service-price">
								<?php echo do_shortcode(get_field("detail_box_1")); ?>
							</div>												
							<div class="service-post-thumbnail">
									<?php the_post_thumbnail(); ?>
							</div>		
							<h2 class="service-post-title"><?php the_title(); ?></h2>	
							<div class="service-post-content">
							<p>	<?php the_field('second_excerpt'); ?>	</p>							
							</div>
							<div>
							<a href='<?php the_permalink(); ?> ' rel='bookmark'>Learn More&nbsp;<b class='fa fa-angle-right'></b></a>						</div>	
					</div>
						<?php	endwhile; ?>
				</div>
			</div>
		</div>
<?php get_footer(); ?>
