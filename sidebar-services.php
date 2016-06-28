<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fuehrungswerk
 */

if ( ! is_active_sidebar( 'services' ) ) {
	return;
}
?>

<aside id="services" class="services-widget-area" role="complementary">
	<?php dynamic_sidebar( 'services' ); ?>
</aside><!-- #secondary -->
