<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fuehrungswerk
 */

if ( ! is_active_sidebar( 'home-intro' ) ) {
	return;
}
?>

<aside id="intro" class="intro-widget-area" role="complementary">
	<?php dynamic_sidebar( 'home-intro' ); ?>
</aside><!-- #secondary -->
