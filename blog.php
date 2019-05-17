<?php
/* 
Template Name: Blog
*/
get_header(); ?>
<div id="main">
    <div id="container" >
      <div id="content" role="main">       
        <div class="main-content">
          <div class="container">
              <h2><?php the_title(); ?></h2>
          </div>
          <div class="container">
            <?php
              $args = array( 'posts_per_page' => 10,'order'=> 'ASC', 'orderby' => 'ID' );
              $loop = new WP_Query( $args ); 
              while ( $loop->have_posts() ) : $loop->the_post();
            ?>
          <div class="one-half next">                       
              <div class="service-post-thumbnail">
                  <?php the_post_thumbnail(); ?>
              </div>    
              <h3 class="service-post-title"><?php the_title(); ?></h3> 
              <label><?php the_category(); ?></label>  
              <div class="service-post-content">
                <?php the_excerpt(); ?>
                <a href='<?php the_permalink(); ?> ' rel='bookmark'>Learn More&nbsp;<b class='fa fa-angle-right'></b></a>
              </div>
          </div>
            <?php endwhile; ?>
          </div>
        </div>                
      </div><!-- #content -->
    </div><!-- #container -->
</div>
<?php get_footer(); ?>
