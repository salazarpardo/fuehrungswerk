<?php if ( is_front_page() ) : ?>
				
	<?php  /* query_posts('posts_per_page=5');
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			// Your loop code
		endwhile;
	else :
		echo wpautop( 'Sorry, no posts were found' );
	endif; */
	$args = array( 'post_type' => 'slide', 'posts_per_page' => 5  );
	$loop = new WP_Query( $args );
	?>

<div class="home-slider orbit-container" role="region" aria-label="<?php _e( 'Home Slider' , 'fuehrungswerk'); ?>" >
	<?php if ( $loop -> have_posts() ) : ?>
			
		    <!-- <button class="orbit-previous" aria-label="previous"><span class="show-for-sr">Previous Slide</span>&#9664;</button>
		    <button class="orbit-next" aria-label="next"><span class="show-for-sr">Next Slide</span>&#9654;</button> -->
			<?php while ( $loop -> have_posts() ) : $loop -> the_post(); ?>
			    <div id="post-<?php the_ID(); ?>" class="orbit-slide">

			    	<?php
			    	$image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large'  );
					$image_width = $image_data[1];
			 		if ( has_post_thumbnail() && $image_width > 1200) : ?>
						<?php  the_post_thumbnail('large'); ?>
					<?php elseif (get_background_image()) : ?>
						<img class="default-header-img " src="<?php echo get_background_image(); ?>" alt="Felicitas Saurenbach" />
					<?php else : ?>
						<img class="default-header-img " src="<?php echo get_bloginfo('template_directory');?>/img/default-image.jpg" alt="Felicitas Saurenbach" />
				
					<?php endif; ?>
					
				  	<figcaption class="orbit-caption">
					  	<div class="circle">
					  		<div class="callout primary clearfix"> 
					  			<header class="entry-header">
									<h2 class="entry-title">
										<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									</h2>
									<div class="entry-content show-for-large">
										<?php the_excerpt(); ?>
										<a href="<?php the_permalink(); ?>" class="read-more">
											<?php _e('Read more', 'fuehrungswerk')?>
										</a>
									</div>
								</header>
							</div>
						</div>
					</figcaption>
				
			    </div>
			<?php endwhile; else: ?>
				<div class="orbit-slide">
					<?php if (get_background_image()) : ?>
			      	<img class="default-header-img " src="<?php echo get_background_image(); ?>" alt="Felicitas Saurenbach" />
					<?php else : ?>
						<img class="default-header-img " src="<?php echo get_bloginfo('template_directory');?>/img/default-image.jpg" alt="Felicitas Saurenbach" />
					<?php endif; ?>
				  	<figcaption class="orbit-caption">
				  			<div class="circle">
					  			<div class="callout primary clearfix"> 
					  				<header class="entry-header">
										<div class="entry-meta">Führungswerk.de</div>
										<h2 class="entry-title">Felicitas Saurenbach</h2>
										<div class="entry-content">
										<p class="show-for-medium">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis scelerisque dui, vel posuere felis. Nulla condimentum magna volutpat.
										</p>
										<a class="read-more">Weiterlesen</a>
										</div>
									</header>
								</div>
							</div>
						</div>
					</figcaption>
				
			    </div>
		
		  <!-- <nav class="orbit-bullets">
		   <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
		   <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
		   <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
		   <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
		 </nav> -->
	<?php endif; ?>
	</div>

	<?php elseif ( (!is_front_page() ) || (is_home() && get_option('page_for_posts')) ) : ?>
		<div class="featured-img-bg text-center">
		    <?php
				if ( ( is_page() || is_single() ) && has_post_thumbnail() ) {
					$image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large'  );
					$image_width = $image_data[1];
					if ( $image_width > 1200) {
						the_post_thumbnail('large');?>
					<?php if (get_post(get_post_thumbnail_id())->post_excerpt) : ?>
				 	<h4 class="featured-img-caption"> <?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?> </h4>
				 	<?php endif; 
					}
					else {
						if (get_background_image()){
						//
						?><img class="default-header-img" src="<?php echo get_background_image(); ?>"/>
						<?php
						}
						else {
							echo '<img class="default-header-img" src="', get_bloginfo('stylesheet_directory'), '/img/default-image.jpg','" alt="Revista T" />';
						}
					}
				}
				elseif (is_home() && get_option('page_for_posts') && get_the_post_thumbnail(get_option( 'page_for_posts' ), 'large') ) {
					$page_for_posts = get_option( 'page_for_posts' );
		        	echo get_the_post_thumbnail($page_for_posts, 'large');
				}
				elseif ((is_post_type_archive() || is_archive()) && have_posts() &&  get_post_thumbnail_id($post->ID) ) { 
					$first = true;
					while (have_posts()) : the_post(); 
					if ( $first) {
						if ($image_width > 1200) {
							$image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large'  );
							$image_width = $image_data[1];
							the_post_thumbnail('large');
						}
						else {
							if (get_background_image()){
							//
							?><img class="default-header-img" src="<?php echo get_background_image(); ?>"/>
							<?php
							}
							else {
								echo '<img class="default-header-img" src="', get_bloginfo('stylesheet_directory'), '/img/default-image.jpg','" alt="Revista T" />';
							}
						}
						$first = false;
					}
					endwhile;
					wp_reset_query();
				}
				else {
					// echo '<img class="default-header-img " src="', get_bloginfo('stylesheet_directory'), '/img/default-image.jpg','" alt="Felicitas Saurenbach" />';
					if (get_background_image()){
						//
						?><img class="default-header-img" src="<?php echo get_background_image(); ?>"/>
						<?php
						}
						else {
							echo '<img class="default-header-img" src="', get_bloginfo('stylesheet_directory'), '/img/default-image.jpg','" alt="Felicitas Saurenbach" />';
						}
				}
			?>
			<div class="header-caption">
				<div class="circle">
					<header class="entry-header">
						<?php if( is_page() || is_single() ) : ?>
							<?php if( get_field('caption') ): ?>
								<h1 class="entry-title big-h"><?php the_field('caption'); ?></h1>
							<?php else : ?>
					    		<h1 class="entry-title big-h"><?php the_title(); ?></h1>
				        	<?php endif; ?>
				        <?php elseif( is_home() && get_option('page_for_posts') ) : ?>
				        
				    		<h1 class="entry-title big-h"><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
				        
				        <?php elseif ( is_post_type_archive() ) : ?>
				       
				       		<h1 class="entry-title big-h"><?php post_type_archive_title(); ?></h1>
				        
				       	<?php elseif ( is_archive() ) : ?>
				       
				       		<h1 class="entry-title big-h"><?php the_archive_title(); ?></h1>
				        
				        <?php elseif( is_search() ) : ?>
				        
				        	<h1 class="entry-title big-h"><?php printf( __( 'Search Results for: %s', 'fuehrungswerk' ), '<br><span>' . get_search_query() . '</span>' ); ?></h1>
				    
						<?php elseif( is_404() ) : ?>

				        	<h1 class="entry-title big-h"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'fuehrungswerk' ); ?></h1>

						<?php endif; ?>
					</header>	
				</div>		
			</div>
		</div>
	<?php endif; ?>