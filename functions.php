<?php


/*** MENUS ADDED FOR ROMMEL ***/
//Navigation
function register_my_menus()
{
  register_nav_menus(
    array(
      'header-menu' => __( 'Main Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
      'mobile-menu' => __( 'Mobile Menu' )	
    )
  );
}
add_action( 'init', 'register_my_menus' );

add_filter( 'widget_text', 'do_shortcode' );

/** THEME SETTINGS **/
if ( !function_exists( 'of_get_option' ) )
{
	function of_get_option($name, $default = false) 
	{

		$optionsframework_settings = get_option('optionsframework');
		// Gets the unique option id
		$option_name = $optionsframework_settings['id'];

			if ( get_option($option_name) ) 
			{
				$options = get_option($option_name);
			}

			if ( isset($options[$name]))
			{
				return $options[$name];
			} 
			else 
			{
				return $default;
			}
		}
}

/***  Home WIDGETS ***/
function trust_rev_widgets_init() {

	register_sidebar( array(
		'name' => 'Trust Rev Widget',
		'id' => 'trust_rev'
	) );
}
add_action( 'widgets_init', 'trust_rev_widgets_init' );

function blue_section_widgets_init() {

	register_sidebar( array(
		'name' => 'Blue Section Widget',
		'id' => 'blue_section'
	) );
}
add_action( 'widgets_init', 'blue_section_widgets_init' );

function form_widgets_init() {

	register_sidebar( array(
		'name' => 'Form Widget Area',
		'id' => 'form_widget'
	) );
}
add_action( 'widgets_init', 'form_widgets_init' );


function trans_area_widgets_init() {

	register_sidebar( array(
		'name' => 'Audio Translation Tabs Area 2',
		'id' => 'trans_area_widgets'
	) );
}
add_action( 'widgets_init', 'trans_area_widgets_init' );

function faqtab_area_widgets_init() {

	register_sidebar( array(
		'name' => 'FAQ Tab Area',
		'id' => 'fabtab_area_widgets'
	) );
}
add_action( 'widgets_init', 'faqtab_area_widgets_init' );

function howitworks_area_widgets_init() {

	register_sidebar( array(
		'name' => 'How It Works Tab Area',
		'id' => 'howitworks_area_widgets'
	) );
}
add_action( 'widgets_init', 'howitworks_area_widgets_init' );


/*** LOGIN FUNCTION ***/
function restrict_admin()
{
	if ( ! current_user_can( 'manage_options' ) && '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF'] ) {
                wp_redirect( site_url() );
	}
}
add_action( 'admin_init', 'restrict_admin', 1 );

add_action( 'wp_login_failed', 'pu_login_failed' ); // hook failed login

function pu_login_failed( $user ) {
  	// check what page the login attempt is coming from
  	$referrer = $_SERVER['HTTP_REFERER'];

  	// check that were not on the default login page
	if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $user!=null ) {
		// make sure we don't already have a failed login attempt
		if ( !strstr($referrer, '?login=failed' )) {
			// Redirect to the login page and append a querystring of login failed
	    	wp_redirect( $referrer . '?login=failed');
	    } else {
	      	wp_redirect( $referrer );
	    }

	    exit;
	}
}
add_action( 'authenticate', 'pu_blank_login');

function pu_blank_login( $user ){
  	// check what page the login attempt is coming from
  	$referrer = $_SERVER['HTTP_REFERER'];

  	$error = false;

  	if($_POST['log'] == '' || $_POST['pwd'] == '')
  	{
  		$error = true;
  	}

  	// check that were not on the default login page
  	if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $error ) {

  		// make sure we don't already have a failed login attempt
    	if ( !strstr($referrer, '?login=failed') ) {
    		// Redirect to the login page and append a querystring of login failed
        	wp_redirect( $referrer . '?login=failed' );
      	} else {
        	wp_redirect( $referrer );
      	}

    exit;

  	}
}


/*** SHORTCODES ***/
// [load_review id="rev_id"]
function load_review_func( $atts ) {
    $args = shortcode_atts( array(
        'id' => ' '
    ), $atts );   

    $args = array( 'post_type' => 'page', 'p' => $args['id'], 'posts_per_page' => 1,'meta_key' => 'type' );       
	$loop = new WP_Query( $args );	
	while ( $loop->have_posts() ) : $loop->the_post();				
			   
		ob_start(); ?>
		<div class="widget-post-area">
		<div class="one-half next-l">
				<h1>
					<?php the_field('subtitle'); ?>
				</h1>
	    		<?php the_field( 'extra_excerpt' ); ?>
	    </div> 
		<div class="one-half next">
			<?php the_post_thumbnail(); ?>
		</div>		
		<div>
			<?php 
			for($i=1; $i<=3; $i++)
			{
				echo do_shortcode(get_field("detail_box_".$i));
			}
			?>
		</div>
		</div>			
		<?php				
		endwhile; 			

    return ob_get_clean();
}
add_shortcode( 'load_review', 'load_review_func' );

/* [detail_box simbol="$"" number=1 text="blah"][/detail_box] */
function load_detail_box($atts, $content=null)
{
		extract( shortcode_atts(
		array(
			'simbol' => '',
			'number' => ''
		), $atts ));
		ob_start();
		?>
		<div class="one-third next add-left-separator">
			<div class="detail_box">			   
			    	<p><?php echo $simbol; ?></p>
			    	<p id="number"><?php echo $number; ?></p>
			    	<p><?php echo $content; ?></p>			    
			</div>
		</div>
		<?php
		
		
		return ob_get_clean();
} 
add_shortcode("detail_box","load_detail_box");

/* [showcase]TEXT[/showcase] */
function load_showcase($atts, $content=null)
{
		extract( shortcode_atts(
		array(
			'background' => ''			
		), $atts ));
		ob_start();
		?>
		<div class="container">			
			<p><?php echo $content; ?></p>	    
		</div>
		<?php		
		return ob_get_clean();
} 
add_shortcode("showcase","load_showcase");
