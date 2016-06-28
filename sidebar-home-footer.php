<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fuehrungswerk
 */

if ( ! is_active_sidebar( 'home-footer' ) ) {
	return;
}
?>

<aside id="home-footer" class="footer-widget-area" role="complementary">
	<div class="widget-row">
		<?php dynamic_sidebar( 'home-footer' ); ?>
	</div>
</aside><!-- #secondary -->
