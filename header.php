<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner" class="parallax-window" data-parallax="scroll" data-image-src="<?php uminchu_get_header_image(); ?>" data-position-y="center">
			<?php if ( is_home() ): ?>
			<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<h1 class="site-title"><?php
					$logo = get_theme_mod( 'wic2015_logo' );

					if ( $logo ) {
						$image = '<img id="site-logo" src="%s" alt="%s" style="max-width:100%%; height:auto;">';
						printf(
							$image,
							esc_url( $logo ),
							esc_attr( get_bloginfo( 'name' ) )
						);
					} else {
						bloginfo( 'name' );
					}
				?></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</a>
			<?php elseif ( is_single() ) : ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>
			<?php endif; ?>

			<?php if ( is_home() ): ?>
				<div id="nav-icon" class="visible-xs-block"><a class="scroll" href="#main"><span class="dashicons dashicons-arrow-down-alt2"></span></a></div>
			<?php endif; ?>

			<div id="navbar" class="navbar">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					<?php if ( ! is_home() ): ?>
					<h1 class="site-name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php endif; ?>
					<div class="menu">
						<button class="menu-toggle"></button>
						<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
					</div>
				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->
		</header><!-- #masthead -->

		<nav id="large-navigation">
			<div class="large-navigation-container row">
				<div class="col-sm-6 hidden-xs">
					<div class="navigation-widget-area">
						<?php dynamic_sidebar( 'sidebar-nav' ); ?>
					</div>
				</div>
				<div class="col-sm-6">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?>
				</div>
			</div>
		</nav>

		<div id="main" class="site-main">
