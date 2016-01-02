<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
		</div><!-- #main -->

		<div id="parallax-image" class="parallax-window" data-parallax="scroll" data-image-src="<?php uminchu_get_parallax_image(); ?>" data-position-y="bottom">
		</div>

		<footer id="colophon" class="site-footer" role="contentinfo">
				<?php get_sidebar( 'main' ); ?>

				<div class="site-info">
					<div class="site-info-container main-container">
						<?php echo get_theme_mod( 'uminchu_footer', '<a href="https://firegoby.jp/">UMINCHU</a> powered by <a href="https://wordpress.org/">WordPress</a>' ); ?>
					</div>
				</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->
	<?php wp_footer(); ?>
</body>
</html>
