<?php
/**
 * The sidebar containing the secondary widget area
 *
 * Displays on posts and pages.
 *
 * If no active widgets are in this sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

if ( is_home() || is_singular() ) :
	if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div id="tertiary" class="sidebar-container col-sm-4 hidden-xs" role="complementary">
			<div class="sidebar-inner">
				<div class="widget-area">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div><!-- .widget-area -->
			</div><!-- .sidebar-inner -->
		</div><!-- #tertiary -->
	<?php endif; ?>
<?php endif; ?>
