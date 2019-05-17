<!DOCTYPE html> 
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'mastests' ), max( $paged, $page ) );

	?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="shortcut icon" href="<?php echo  of_get_option("favicon","none");?>"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/responsive.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<script src="<?php echo get_site_url(); ?>/wp-includes/js/jquery/jquery.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function () {

		jQuery("#open-mobile").click(function()
		{
			jQuery("ul.mobile-menu").fadeIn();
			jQuery("#close-mobile").fadeIn();
		});
		jQuery("#close-mobile").click(function()
		{
			jQuery("ul.mobile-menu").fadeOut();
			jQuery("#close-mobile").fadeOut();
		});
  		jQuery('.mobile-menu > li > a').hover(function(){
    			if (jQuery(this).attr('class') != 'active'){
      				jQuery('.mobile-menu li ul').slideUp();
      				jQuery(this).next().slideToggle();
      				jQuery('mobile-menu li a').removeClass('active');
      				jQuery(this).addClass('active');
    			}		
  		});
	});
</script>
<?php
	wp_head();
?>

</head>

<body <?php body_class(); ?>>
	<div>
		<header id="header">
		<div class="mobile">
			<label id="open-mobile">MENU</label>
			<?php wp_nav_menu( array( 'theme_location' => 'mobile-menu', 'menu_class' => 'mobile-menu' ) ); ?>
			<div class="clear"></div>
			<label class="fa fa-chevron-up" id="close-mobile"></label>
		</div>
		<div class="container">
			<div class="logo">
				<a href="<?php echo get_site_url(); ?>"><img src="<?php echo  of_get_option("logo","none");?>" align=" "></a>
			</div>			
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'main-menu' ) ); ?>
		</div>

		<!-- GOOGLE ANALYTICS -->
		<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			  ga('create', 'UA-26805780-1', 'mastertranslationservices.com');
			  ga('send', 'pageview');

		</script>
		<!-- GOOGLE ANALYTICS -->
		
		</header>
		<div class="clear"></div>
		<div id="main" class="site-main">
