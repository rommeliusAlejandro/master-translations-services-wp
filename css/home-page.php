<?php
/* 
Template Name: Homepage (Translate)
*/
get_header(); ?>
<div id="main">
		<div id="container" >
			<div id="content" role="main">
				<div id="showcase-area">
					<?php 
						$showcase_shortcode =  of_get_option("home_slider_1","none");
						if($showcase_shortcode != "none")
						{
							echo do_shortcode($showcase_shortcode);
						}						
					 ?>				
				</div>
				<div class="main-content">
					<div class="container">				
					<h2 class="heading">Our Services</h2>
					<?php $list_services = "<ul id='list_services'>";?>				
														
						<div>
							<?php
								$args = array( 'post_type' => 'page', 'posts_per_page' => 10,'order'=> 'ASC', 'orderby' => 'title', 'meta_key' => 'type' );
								$loop = new WP_Query( $args ); 							
							
						   	$trios = array();
						   	$postHTML = "";
						   	$counter = 0;
						   		 while ( $loop->have_posts() ) : $loop->the_post(); 					    
									$postHTML .= '<div class="service-post one-third next">';
									$postHTML .= '<div class="service-price">';
									$postHTML .= do_shortcode(get_field("detail_box_1"));
									$postHTML .= '</div>';												
									$postHTML .= '<div class="service-post-thumbnail">';
									$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
									$alt = get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true);
									$postHTML .= '<img src="'.$url.'" alt="'.$alt.'"/>';
									$postHTML .=  '</div>';		
									$postHTML .= '<h2 class="service-post-title">'.get_the_title().'</h2>';
									$list_services .= "<li><a href='".get_the_permalink()."'>".get_the_title()."</a></li>";
									$postHTML .= '<div class="service-post-content">';
									$postHTML .= '<p>'.get_field('second_excerpt').'</p>';							
									$postHTML .= '</div>';
									$postHTML .= '<a href="'.get_the_permalink().'" rel="bookmark">Learn More&nbsp;<b class="fa fa-angle-right"></b></a>';
									$postHTML .= '</div>';
									$counter ++;
									if($counter == 6)
									{
										array_push($trios, $postHTML);
										$postHTML = "";
										$counter = 0; 
									}
								endwhile; 
								$counter = 1;
								foreach ($trios as $trio)
								{
									echo " <div id='slider$counter'>$trio</div>";
									$counter++;
								}
								?>						   					   						  
						</div>
						<div class="container"><?php echo $list_services; ?></div>
					</div>				
					<div class="container content-section rev-section">
						<?php if ( is_active_sidebar( 'trust_rev' ) ) : ?>
							<div>
								<?php dynamic_sidebar( 'trust_rev' ); ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="blue-section">
						<div class="container">
							<?php if ( is_active_sidebar( 'blue_section' ) ) : ?>
								<div>
									<?php dynamic_sidebar( 'blue_section' ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="container content-section">
						<?php 
							while ( have_posts() ) : the_post(); 
								the_content();
							endwhile;
						?>
					</div>
					<div class="container">
						<?php
							$args = array( 'post_type' => 'page', 'posts_per_page' => 3,'order'=> 'ASC', 'orderby' => 'title', 'meta_key' => 'type');
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
							echo "<div class=' content-section'>";
								echo "<h2>";
								the_field("second_title");
								echo "</h2>";
								echo '<div class="custom_post_content"><p>';
								the_field("first_excerpt"); ?>															
							</p></div>	
							<a href='<?php the_permalink(); ?> ' rel='bookmark'>Learn More&nbsp;<b class='fa fa-angle-right'></b></a>
							<?php
							echo "</div>";
							endwhile; 
						?>
					</div>					
				</div>								
			</div><!-- #content -->
		</div><!-- #container -->
</div>
<?php get_footer(); ?>
