<?php
/**
 * Sunipoon Theme Customizer
 *
 * @package Sunipoon
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sunipoon_customize_register( $wp_customize ) {

    //file input sanitization function
    function sunipoon_sanitize_file( $file, $setting ) {
          
        //allowed file types
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png'
        );
          
        //check file type from file name
        $file_ext = wp_check_filetype( $file, $mimes );
          
        //if file has a valid mime type return it, otherwise return default
        return ( $file_ext['ext'] ? $file : $setting->default );
    }

    $wp_customize->add_setting(
        'custom_footer_logo', array(
            'type' => 'theme_mod', // or 'option'
            'capability' => 'edit_theme_options',
            'default' => get_theme_mod( 'custom_footer_logo' ),
            'transport' => 'refresh', // or postMessage
            'sanitize_callback' => 'sunipoon_sanitize_file',
            // 'sanitize_js_callback' => '', // Basically to_json.;
        )
    );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_footer_logo', array(
       'label' => __( 'Footer Logo', 'sunipoon' ),
       'description' => esc_html__( 'You may add a custom footer logo with contrasting color' ),
       'section' => 'title_tagline',
       'priority' => 9, // Optional. Order priority to load the control. Default: 10
       'settings' => 'custom_footer_logo',
       'mime_type' => 'image',
       'button_labels' => array( // Optional.
            'select' => __( 'Select Footer Image' ),
            'change' => __( 'Change Footer Image' ),
            'remove' => __( 'Remove' ),
            'default' => __( 'Default' ),
            'placeholder' => __( 'No image selected' ),
            'frame_title' => __( 'Select Image' ),
            'frame_button' => __( 'Choose Image' ),
            )
        ) )
    );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'sunipoon_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'sunipoon_customize_partial_blogdescription',
		) );
    }
}

add_action( 'customize_register', 'sunipoon_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function sunipoon_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function sunipoon_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sunipoon_customize_preview_js() {
	wp_enqueue_script( 'sunipoon-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'sunipoon_customize_preview_js' );
