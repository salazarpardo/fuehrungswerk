<div class="customers">
	<div class="customers-row">
	    <?php
        $args = array( 'post_type' => 'customer', 'posts_per_page' => 6, 'orderby' => 'rand'  );
		$loop = new WP_Query( $args );
		if( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
		$link = get_post_type_archive_link( 'testimonial' );
		$image = get_the_post_thumbnail();
		$id= get_the_ID();
		if ($image!='') : echo '<a class="customer customer-'. $id. '" href="' . $link . '">' . $image . '</a>';
		endif;
        endwhile; 
        endif;
		?>
	</div>
</div>