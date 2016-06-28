<div class="products">
	<div class="product-slider">
	    <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => 14  );
		$loop = new WP_Query( $args );
		$i = 1;
		if( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
		$link = get_field('link');
		$image = get_the_post_thumbnail($id, 'thumbnail');
		$id= get_the_ID();
        echo '<div class="product-'. $id . ' product" data-slide-template="'. $i .'">';
        if ($link) : echo '<a class="product-link" href="' . $link . '">';
        endif;
		if ($image!='') : echo $image;
		endif;
		if ($link) : echo '</a>';
		endif;
        echo '</div>';
        $i++;
        endwhile; endif;
		?>
	</div>
</div>