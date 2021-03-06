<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div class="main-container">
	<div class="row">
		<div id="primary" class="content-area col-sm-8">
			<div id="content" class="site-content" role="main">

				<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>
					<?php twentythirteen_post_nav(); ?>
					<?php comments_template(); ?>

				<?php endwhile; ?>

			</div><!-- #content -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
	</div><!-- .row -->
</div><!-- .main-container -->

<?php get_footer(); ?>
