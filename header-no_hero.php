<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sunipoon
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sunipoon' ); ?></a>

	<header id="masthead" class="site-header">
    
        <div id="topbar" class="topbar">
            <div class="container">

                <?php
                    if ( get_custom_logo() ){
                        the_custom_logo();
                    } else { ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="custom-logo-link">
                        <img src="<?php echo get_template_directory_uri() . '/images/logo-green.png' ?>" alt="<?php bloginfo( 'name' ); ?>" class="default-logo">
                        </a>
                    <?php } 
                ?>

                <nav id="site-navigation" class="container main-navigation">			
			        <?php
			        wp_nav_menu( array(
				        'theme_location' => 'menu-1',
				        'menu_id'        => 'primary-menu',
			        ) );
			        ?>

                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">&#x2630;</button>

		        </nav><!-- #site-navigation -->

            </div><!-- /.container -->           
        </div><!-- /.topbar -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
        <div class="container">