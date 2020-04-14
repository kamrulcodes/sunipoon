<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sunipoon
 */

?>
        </div><!-- .container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
    
    <section id="footer-widgets" class="footer-widgets container">
    <?php if ( !empty (get_theme_mod('custom_footer_logo')) || is_active_sidebar( 'footer-sidebar-1' ) ) { ?>
        <div class="widget-area fw-1">
            <div id="footer-logo" class="footer-logo">
                <img src="<?php echo get_theme_mod( 'custom_footer_logo' ); ?>" alt="logo">
            </div>
            <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
        </div>
    <?php } if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?>
        <div class="widget-area fw-2">
            <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
        </div>
    <?php } if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?>
        <div class="widget-area fw-3">
            <?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
        </div>
    <?php } if ( is_active_sidebar( 'footer-sidebar-4' ) ) { ?>
        <div class="widget-area fw-4">
            <?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
        </div>
    <?php } ?>
    </section>

		<section class="site-info">
            <div class="container">
                <span class="copyright">&copy; Copyright <?php echo date("Y"); ?> - <?php bloginfo( 'name' ); ?>. </span>
    			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'sunipoon' ) ); ?>">
    				<?php
    				/* translators: %s: CMS name, i.e. WordPress. */
    				printf( esc_html__( 'Powered by %s', 'sunipoon' ), 'WordPress' );
    				?>
    			</a>
    			<span class="sep"> | </span>
    				<?php
    				/* translators: 1: Theme name, 2: Theme author. */
    				printf( esc_html__( 'Theme: %1$s by %2$s.', 'sunipoon' ), 'Sunipoon', '<a href="http://devkamrul.com/">devKamrul.com</a>' );
                    ?>
            </div>
		</section><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
