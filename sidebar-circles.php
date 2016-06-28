<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fuehrungswerk
 */

if ( ! is_active_sidebar( 'circles' ) ) {
	return;
}
?>

<aside id="circles" class="circles-widget-area" role="complementary">
	<?php dynamic_sidebar( 'circles' ); ?>
</aside><!-- #secondary -->
