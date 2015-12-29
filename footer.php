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
		<div class="parallax-image" class="parallax-window" data-parallax="scroll" data-image-src="<?php uminchu_get_parallax_image(); ?>">
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php get_sidebar( 'main' ); ?>

			<div class="site-info">
				<div style="margin: 1em 0;">
					<?php echo get_theme_mod( 'wic2015_footer', '<a href="https://firegoby.jp/">WIC2015</a> powered by <a href="https://wordpress.org/">WordPress</a>' ); ?>
				</div>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>
