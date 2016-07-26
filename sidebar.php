<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fuehrungswerk
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php wp_reset_query();
	global $post;
	$template = get_post_meta($post->ID,'_wp_page_template',true);
	/* if ((is_page() || is_single() || is_home()) && $template = 'default') : ?>
		<?php get_template_part( 'template-parts/sidebar-testimonials' ); 
	 endif; */ ?> 
</aside><!-- #secondary -->
