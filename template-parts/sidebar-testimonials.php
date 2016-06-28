<div class="testimonials ">
	<div class="testimonials-slider sidebar-testimonials">
	    <?php
        $args = array( 'post_type' => 'testimonial', 'posts_per_page' => 5 );
		$loop = new WP_Query( $args );
		if( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
		$company = get_the_title();
		$link = get_permalink();
		$author = get_post_meta(get_the_ID(), 'author', true);
		$position = get_post_meta(get_the_ID(), 'position', true);
		$testimonial = wp_trim_words( get_the_content(), 18, '...' );
		$id= get_the_ID();
        echo '<div class="testimonials-slide"><div class="testimonial-'. $id. ' testimonial-wrap">';
		if ($testimonial!='') : echo '<p class="testimonial">"' . $testimonial . '"</p>';
		echo '<p><a class="read-more" href="' . $link . '">' . esc_html__( '[&hellip;] more', 'fuehrungswerk' ) . '</a></p>';
		endif;
       	echo '<h5 class="author"><strong>' . $author . '</strong>'; 
		if ($position!='') : echo ', ' . $position ;
		endif; 
		echo '</h5><h3 class="company">' . $company . '</h3>';
        echo '</div></div>';
        endwhile; endif;
		?>
	</div>
</div>