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
			</div><!-- #content -->
		</div><!-- #container -->
</div>
<?php get_footer(); ?>
