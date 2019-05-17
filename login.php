<?php
/*
* Template Name: Login Page
*/


get_header(); 
?>
<div id="main">
		<div id="container" >
			<div id="content" role="main">
				<div class="container content-section">
				<?php
				$args = array(
				        'echo' => true,
				        'redirect' => get_site_url(), 
				        'form_id' => 'loginform',
				        'label_username' => __( 'Username' ),
				        'label_password' => __( 'Password' ),
				        'label_remember' => __( 'Remember Me' ),
				        'label_log_in' => __( 'Log In' ),
				        'id_username' => 'user_login',
				        'id_password' => 'user_pass',
				        'id_remember' => 'rememberme',
				        'id_submit' => 'wp-submit',
				        'remember' => true,
				        'value_username' => NULL,
				        'value_remember' => false ); 

				if(isset($_GET['login']) && $_GET['login'] == 'failed')
				{
					?>
						<div id="login-error" style="background-color: #FFEBE8;border:1px solid #C00;padding:5px;">
							<p>Login failed: You have entered an incorrect Username or password, please try again.</p>
						</div>
					<?php
				}


				wp_login_form( $args );

				?>
			</div>
</div><!-- #content -->
		</div><!-- #container -->
<?php
get_footer(); 
?>