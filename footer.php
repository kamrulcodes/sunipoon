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

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
    
    <?php if ( is_active_sidebar( 'footer-sidebar-1' ) || !empty (get_theme_mod('custom_footer_logo')) ) { ?>
        <section id="footer-widgets" class="footer-widgets container">
            <div id="footer-logo" class="widget footer-logo">
                <img src="<?php echo get_theme_mod( 'custom_footer_logo' ); ?>" alt="logo">
            </div>
            <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
        </section>
    <?php } ?>

		<section class="site-info container">
            <span class="copyright">&copy; Copyright <?php echo date("Y"); ?> - <?php bloginfo( 'name' ); ?>.</span>
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
		</section><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
