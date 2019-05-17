<?php
/**
* The theme option name is set as 'options-theme-customizer' here.
* In your own project, you should use a different option name.
* I'd recommend using the name of your theme.
*
* This option name will be used later when we set up the options
* for the front end theme customizer.
*/

function optionsframework_option_name() {

$optionsframework_settings = get_option('optionsframework');

// Edit 'options-theme-customizer' and set your own theme name instead
$optionsframework_settings['id'] = 'options_theme_customizer';
update_option('optionsframework', $optionsframework_settings);
}

/**
* Defines an array of options that will be used to generate the settings page and be saved in the database.
* When creating the "id" fields, make sure to use all lowercase and no spaces.
*/

function optionsframework_options() {

// Test data
$test_array = array(
"First" => "First Option",
"Second" => "Second Option",
"Third" => "Third Option" );

$options = array();

$options[] = array( "name" => "Theme Settings",
"type" => "heading" );

$options['facebook_link'] = array(
"name" => "Facebook",
"id" => "facebook_link",
"std" => " ",
"type" => "text" );

$options['twitter_link'] = array(
"name" => "Twitter",
"id" => "twitter_link",
"std" => " ",
"type" => "text" );

$options['gplus_link'] = array(
"name" => "G+",
"id" => "gplus_link",
"std" => " ",
"type" => "text" );

$options['phone_number'] = array(
"name" => "Phone number",
"id" => "phone_number",
"std" => " ",
"type" => "text" );

$options['copyright'] = array(
"name" => "Copyright",
"id" => "copyright",
"std" => " ",
"type" => "text" );

$options['home_slider_1'] = array(
"name" => "Home Page Slider 1 (Showcase)",
"id" => "home_slider_1",
"std" => " ",
"type" => "text" );

$options['home_slider_2'] = array(
"name" => "Home Page Slider 2",
"id" => "home_slider_2",
"std" => " ",
"type" => "text" );



$options['logo'] = array(
"name" => "Choose Logo",
"desc" => "Upload your logo",
"id" => "logo",
"type" => "upload" );

$options['favicon'] = array(
"name" => "Choose Favicon",
"desc" => "Upload your favicon",
"id" => "favicon",
"type" => "upload" );

return $options;
}

/**
* Front End Customizer
*
* WordPress 3.4 Required
*/

add_action( 'customize_register', 'options_theme_customizer_register' );

function options_theme_customizer_register($wp_customize) {

/**
* This is optional, but if you want to reuse some of the defaults
* or values you already have built in the options panel, you
* can load them into $options for easy reference
*/

$options = optionsframework_options();

/* Basic */

	
}