<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		<footer id="footer">
			<a id="toTop" href="#header"><span class="fa fa-chevron-up"></span></a>
			<div class="phone-icons">
				<span class="phone"><span class="fa fa-phone"></span>&nbsp;<?php echo  of_get_option("phone_number","none");?></span>				
				<span class="icons">
					<a href="<?php echo get_site_url(); ?>/feed"><span class="fa fa-rss-square"></span></a>
					<a href="<?php echo  of_get_option("gplus_link","none");?>"><span class="fa fa-google-plus-square"></span></a>
					<a href="<?php echo  of_get_option("facebook_link","none");?>"><span class="fa fa-facebook-square"></span></a>
					<a href="<?php echo  of_get_option("twitter_link","none");?>"><span class="fa fa-twitter-square"></span></a>
				</span>					 
			</div>
			<hr class="separator" />
			<div class="footer-nav">
				<?php wp_nav_menu (array('menu'=>'footer-menu','menu_class' => 'footer-menu'));?>				
			</div>	
			<div class="clear"></div>
			<div class="copyright">
					<?php echo  of_get_option("copyright","none");?>
		    </div>
		</footer><!-- #colophon -->
	</div><!-- #page -->
	<?php wp_footer(); ?>
</body>
</html>