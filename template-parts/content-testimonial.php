<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fuehrungswerk
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<blockquote>
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fuehrungswerk' ),
					'after'  => '</div>',
				) );
			?>
		</blockquote>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if( get_field('author') ): ?>
			<h4 class="meta author"><?php the_field('author'); ?></h4>
		<?php endif; ?>
		<?php if( get_field('position') ): ?>
			<h4 class="meta position"><?php the_field('position'); ?></h4>
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
