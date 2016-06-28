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
		<?php if( get_field('date') ): ?>
			<?php 

				$format_in = 'Ymd'; // the format your value is saved in (set in the field options)
				$format_out = 'd.m.Y'; // the format you want to end up with

				$date = DateTime::createFromFormat($format_in, get_field('date'));

				?>
			<p class="entry-meta"><?php _e('Published on ', 'fuehrungswerk'); echo $date->format( $format_out ); ?></p>
		<?php endif; ?>
		<?php
		if ( has_post_thumbnail() ) {
			$image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large'  );
			$image_width = $image_data[1];
			if ( $image_width < 1200) {
				if( get_field('link') ): ?> <a class="thumbnail" href="<?php the_field('link'); ?>"> <?php endif; 
				the_post_thumbnail('large');
				if( get_field('link') ): ?> </a> <?php endif;
			}
		}
		?>
		<?php if( get_field('media') ): ?>
			<p><?php the_field('media'); ?></p>
		<?php endif; ?>
		<?php if( get_field('pdf_file') ): ?>
			<a class="button" href="<?php the_field('pdf_file'); ?>"><?php _e('Download','fuehrungswerk'); ?></a>
		<?php endif; ?>
		<?php if( get_field('link') ): ?>
			<a class="button" href="<?php the_field('link'); ?>"><?php _e('See more','fuehrungswerk'); ?></a>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fuehrungswerk' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'fuehrungswerk' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
