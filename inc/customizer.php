<?php
/**
 * fuehrungswerk Theme Customizer.
 *
 * @package fuehrungswerk
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fuehrungswerk_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$colors = array();
	$colors[] = array(
	  'slug'=>'content_text_color', 
	  'default' => '#000',
	  'label' => __('Content Text Color', 'fuehrungswerk')
	);
	$colors[] = array(
	  'slug'=>'content_link_color', 
	  'default' => '#333',
	  'label' => __('Content Link Color', 'fuehrungswerk')
	);
	foreach( $colors as $color ) {
	  // SETTINGS
	  $wp_customize->add_setting(
	    $color['slug'], array(
	      'default' => $color['default'],
	      'type' => 'option', 
	      'capability' => 'edit_theme_options',
	      'transport' => 'postMessage',
	    )
	  );
	  // CONTROLS
	  $wp_customize->add_control(
	    new WP_Customize_Color_Control(
	      $wp_customize,
	      $color['slug'], 
	      array('label' => $color['label'], 
	      'section' => 'colors',
	      'settings' => $color['slug'])
	    )
	  );
	}
	// Add Social Media Section
	$wp_customize->add_section( 'social-media' , array(
	    'title' => __( 'Social Media', 'fuehrungswerk' ),
	    'priority' => 150,
	    'description' => __( 'Enter the URL to your account for each service for the icon to appear in the header.', 'fuehrungswerk' )
	) );
	// Add Facebook Setting
	$wp_customize->add_setting( 'facebook' , array( 'default' => '' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook', array(
	    'label' => __( 'Facebook', 'fuehrungswerk' ),
	    'section' => 'social-media',
	    'settings' => 'facebook',
	) ) );
	// Add Twitter Setting
	$wp_customize->add_setting( 'twitter' , array( 'default' => '' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter', array(
	    'label' => __( 'Twitter', 'fuehrungswerk' ),
	    'section' => 'social-media',
	    'settings' => 'twitter',
	) ) );
	// Add Instagram Setting
	$wp_customize->add_setting( 'instagram' , array( 'default' => '' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram', array(
	    'label' => __( 'Instagram', 'fuehrungswerk' ),
	    'section' => 'social-media',
	    'settings' => 'instagram',
	) ) );
	// Add LinkedIn Setting
	$wp_customize->add_setting( 'linkedin' , array( 'default' => '' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'linkedin', array(
	    'label' => __( 'LinkedIn', 'fuehrungswerk' ),
	    'section' => 'social-media',
	    'settings' => 'linkedin',
	) ) );
	// Add Google+ Setting
	$wp_customize->add_setting( 'googleplus' , array( 'default' => '' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'googleplus', array(
	    'label' => __( 'Google+', 'fuehrungswerk' ),
	    'section' => 'social-media',
	    'settings' => 'googleplus',
	) ) );
	// Add Youtube Setting
	$wp_customize->add_setting( 'youtube' , array( 'default' => '' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'youtube', array(
	    'label' => __( 'Youtube', 'fuehrungswerk' ),
	    'section' => 'social-media',
	    'settings' => 'youtube',
	) ) );
	// Add Tumblr Setting
	$wp_customize->add_setting( 'tumblr' , array( 'default' => '' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tumblr', array(
	    'label' => __( 'Tumblr', 'fuehrungswerk' ),
	    'section' => 'social-media',
	    'settings' => 'tumblr',
	) ) );
	// Add Skype Setting
	$wp_customize->add_setting( 'skype' , array( 'default' => '' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'skype', array(
	    'label' => __( 'Skype', 'fuehrungswerk' ),
	    'section' => 'social-media',
	    'settings' => 'skype',
	) ) );
	// Add Xing Setting
	$wp_customize->add_setting( 'xing' , array( 'default' => '' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xing', array(
	    'label' => __( 'Xing', 'fuehrungswerk' ),
	    'section' => 'social-media',
	    'settings' => 'xing',
	) ) );
	// Add Mail Setting
	$wp_customize->add_setting( 'mail' , array( 'default' => '' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mail', array(
	    'label' => __( 'Mail', 'fuehrungswerk' ),
	    'section' => 'social-media',
	    'settings' => 'mail',
	) ) );


	if ( $wp_customize->is_preview() ) {
    	add_action( 'wp_footer', 'fuehrungswerk_customize_preview_js', 21);
	}
}
add_action( 'customize_register', 'fuehrungswerk_customize_register' );


/**
 * Adds styles to HEAD
 */
add_action('wp_head','hook_css');
function hook_css() {

  	$content_text_color = get_option('content_text_color');
  	$content_link_color = get_option('content_link_color');

	$output="<style> body, h1, h2, h3, h4, h5, h6, blockquote, blockquote p, abbr, acronym { color: ". $content_text_color."; } a { color:". $content_link_color."; }</style>";

	echo $output;

}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fuehrungswerk_customize_preview_js() {
	wp_enqueue_script( 'fuehrungswerk_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'fuehrungswerk_customize_preview_js' );
