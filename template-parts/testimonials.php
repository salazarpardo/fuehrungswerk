<div class="testimonials ">
	<div class="testimonials-slider">
	    <?php
        $args = array( 'post_type' => 'testimonial', 'posts_per_page' => 5, 'tag' => 'home'  );
		$loop = new WP_Query( $args );
		if( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
		$company = get_the_title();
		$author = get_field('author');
		$position = get_field('position');
		$testimonial = wp_trim_words( get_the_content(), 30, '...' );
		$id= get_the_ID();
        echo '<div class="testimonials-slide"><div class="testimonial-'. $id. ' testimonial-wrap">';
		if ($testimonial!='') : echo '<p class="testimonial"><a class="testimoniallink" href="/referenzen">"' . $testimonial . '"</a></p>';
		endif;
       	echo '<h5 class="author"><strong>' . $author . '</strong>'; 
		if ($position!='') : echo ' ' . $position ;
		endif; 
		echo '</h5><h3 class="company">' . $company . '</h3>';
        echo '</div></div>';
        endwhile; endif;
		?>
	</div>
</div>