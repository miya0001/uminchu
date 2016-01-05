<?php

if ( ! isset( $content_width ) )
	$content_width = 750;

define( 'UMINCHU_SCRIPTS_VERSION', 'v0.1.26' );

load_theme_textdomain( 'uminchu', get_stylesheet_directory() . '/languages' );


add_action( 'after_setup_theme', 'uminchu_a_after_setup_theme_01', 10 );

function uminchu_a_after_setup_theme_01() {
	// Disable custom header of the Twenty Thirteen
	remove_action( 'after_setup_theme', 'twentythirteen_custom_header_setup', 11 );
}


add_action( 'after_setup_theme', 'uminchu_after_setup_theme_02', 11 );

function uminchu_after_setup_theme_02() {
	set_post_thumbnail_size( 750, 270, true );
	remove_theme_support( 'post-formats' );
}


add_action( "wp_enqueue_scripts", 'uminchu_wp_enqueue_scripts_01', 11 );

function uminchu_wp_enqueue_scripts_01() {
	wp_dequeue_script( 'jquery-masonry' );
	wp_dequeue_script( 'twentythirteen-script' );
}


add_action( 'wp_enqueue_scripts', 'uminchu_wp_enqueue_scripts_02' );

function uminchu_wp_enqueue_scripts_02() {
	wp_enqueue_style(
		'twentythirteen-style',
		get_stylesheet_directory_uri() . '/css/custom-twentythirteen.min.css',
		array(),
		UMINCHU_SCRIPTS_VERSION
	);

	wp_enqueue_style(
		'bootstrap-style',
		get_stylesheet_directory_uri() . '/css/bootstrap.min.css',
		array( 'twentythirteen-style' ),
		UMINCHU_SCRIPTS_VERSION
	);

	wp_enqueue_style( 'dashicons' );

	wp_enqueue_style(
		'genericons',
		get_stylesheet_directory_uri() . '/css/genericons.css',
		array(),
		UMINCHU_SCRIPTS_VERSION
	);

	wp_enqueue_style(
		'uminchu-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'twentythirteen-style', 'bootstrap-style', 'genericons' ),
		UMINCHU_SCRIPTS_VERSION
	);

	wp_enqueue_script(
		'parallax-js',
		get_stylesheet_directory_uri() . '/js/parallax.min.js',
		array( 'jquery' ),
		UMINCHU_SCRIPTS_VERSION,
		true
	);

	wp_enqueue_script(
		'uminchu-script',
		get_stylesheet_directory_uri() . '/js/uminchu.js',
		array( 'parallax-js' ),
		UMINCHU_SCRIPTS_VERSION,
		true
	);
}


add_action( 'widgets_init', 'uminchu_widgets_init', 11 );

function uminchu_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Home Widget Area', 'uminchu' ),
		'id'            => 'home-widget',
		'description'   => __( 'Appears in the home section of the site.', 'uminchu' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-container main-container">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'uminchu' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the footer section of the site.', 'uminchu' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="main-container widget-container">',
		'after_widget'  => '</div></aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Navigation Widget Area', 'uminchu' ),
		'id'            => 'sidebar-nav',
		'description'   => __( 'Appears in the navigation section of the site.', 'uminchu' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="widget-container">',
		'after_widget'  => '</div></aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Widget Area', 'uminchu' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears in the sidebar section of the site.', 'uminchu' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="main-container widget-container">',
		'after_widget'  => '</div></aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}


add_action( "wp_head", "uminchu_wp_head" );

function uminchu_wp_head() {
?>
	<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<?php
}


add_action( 'customize_register', 'uminchu_customize_register' );

function uminchu_customize_register( $wp_customize )
{
	/*
	 * Theme customizer for logo
	 */
	$wp_customize->add_section( 'uminchu_logo', array(
		'title'    => __( 'Logo', 'uminchu' ),
		'priority' => 41,
	) );

	$wp_customize->add_setting( 'uminchu_logo', array(
		'default'    => apply_filters( 'uminchu_default_logo', '' ),
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'uminchu_logo',
		array(
			'label'	   => __( 'Logo', 'uminchu' ),
			'section'  => 'uminchu_logo',
			'settings' => 'uminchu_logo',
		)
	) );

	/*
	 * Theme customizer for header
	 */
	$wp_customize->add_section( 'uminchu_header', array(
		'title'    => __( 'Header', 'uminchu' ),
		'priority' => 100.1,
	) );

	$wp_customize->add_setting( 'uminchu_header_background', array(
		'default'    => uminchu_get_default_header_background(),
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'uminchu_header_background',
		array(
			'label'	   => __( 'Image', 'uminchu' ),
			'section'  => 'uminchu_header',
			'settings' => 'uminchu_header_background',
		)
	) );

	$wp_customize->add_setting( 'uminchu_header_content', array(
		'default' => get_bloginfo( 'description' ),
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'uminchu_header_content', array(
		'label'   => __( 'Content', 'uminchu' ),
		'section' => 'uminchu_header',
		'type'    => 'textarea',
	) );

	/*
	 * Theme customizer for parallax
	 */
	$wp_customize->add_section( 'uminchu_parallax_image', array(
		'title'    => __( 'Parallax Image', 'uminchu' ),
		'priority' => 100.2,
	) );

	$wp_customize->add_setting( 'uminchu_parallax_image', array(
		'default'    => uminchu_get_default_parallax_image(),
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'uminchu_parallax_image',
		array(
			'label'	   => __( 'Parallax Image', 'uminchu' ),
			'section'  => 'uminchu_parallax_image',
			'settings' => 'uminchu_parallax_image',
		)
	) );

	/*
	 * Theme customizer for footer
	 */
	$wp_customize->add_section( 'uminchu_footer', array(
		'title'    => __( 'Footer', 'uminchu' ),
		'priority' => 200,
	) );

	$wp_customize->add_setting( 'uminchu_footer', array(
		'default' => '<a href="https://firegoby.jp/">uminchu</a> powered by <a href="https://wordpress.org/">WordPress</a>',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'uminchu_footer', array(
		'label'   => __( 'Footer', 'uminchu' ),
		'section' => 'uminchu_footer',
		'type'    => 'textarea',
	) );
}

function uminchu_get_default_parallax_image() {
	return apply_filters(
		'uminchu_default_parallax_image',
		get_stylesheet_directory_uri() . "/img/default.jpg"
	);
}

function uminchu_get_parallax_image() {
	if ( get_theme_mod( 'uminchu_parallax_image' ) ) {
		echo esc_url( get_theme_mod( 'uminchu_parallax_image' ) );
	} else {
		echo esc_url( uminchu_get_default_parallax_image() );
	}
}

function uminchu_get_default_header_background() {
	return apply_filters(
		'uminchu_default_header_background',
		get_stylesheet_directory_uri() . "/img/default.jpg"
	);
}

function uminchu_get_header_image() {
	if ( get_theme_mod( 'uminchu_header_background' ) ) {
		echo esc_url( get_theme_mod( 'uminchu_header_background' ) );
	} else {
		echo esc_url( uminchu_get_default_header_background() );
	}
}
