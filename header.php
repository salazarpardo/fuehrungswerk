<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fuehrungswerk
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="off-canvas-wrapper">
	    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
	      	<div class="off-canvas position-left" id="offCanvas" data-off-canvas>
		      	<ul class="vertical menu">
					<li>
						<label>
							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title-link">
								<?php if ( get_header_image() ) : ?>
								<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="	<?php bloginfo( 'name' ); ?>">
							
								<?php else : ?>
								<?php bloginfo( 'name' ); ?>
								<?php endif; // End header image check. ?>
								</a>
							</h1>
						</label>
					</li>
				</ul>
				<?php wp_nav_menu( array( 
					'theme_location' 	=> 'primary',
					'container'  		=> false, 
					'depth'  			=> 3,
					'items_wrap' 		=> '<ul id="%1$s" class="%2$s menu vertical " data-accordion-menu>%3$s</ul>',
					'fallback_cb' 		=> false,
					'walker'			=> new Fuehrungswerk_Mobile_Walker(),
				) ); ?>
				<hr>
				<?php wp_nav_menu( 
			  		array( 
					'theme_location' 	=> 'top',
					'container'  		=> false,  
					'items_wrap' 		=> '<ul id="%1$s" class="%2$s menu vertical" data-accordion-menu>%3$s</ul>',
					'depth' 			=> 1,                                   // Limit the depth of the nav
					'fallback_cb' 		=> false, 
					'walker' => 		new Fuehrungswerk_Mobile_Walker()
					) ); 
				?>
		      
	      	</div>
	      	<div class="off-canvas-content" data-off-canvas-content>
		      	<div class="title-bar hide-for-medium">
					<div class="title-bar-left">
						<button class="menu-icon" type="button" data-open="offCanvas"></button>
					    <span class="title-bar-title">
					    <?php 
					    if (has_site_icon()) :
							// User set a Site Icon, do something awesome!
							?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img class="title-bar-icon" src="<?php site_icon_url() ?>" width="<?php echo esc_attr( get_site_icon_url()->width ); ?>" height="<?php echo esc_attr( get_site_icon_url()->height ); ?>" alt="	<?php bloginfo( 'name' ); ?>">
							</a>
						<?php else: ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						<?php endif; ?>
					    	
						</span>
					</div>
				</div>
				<div id="page" class="site">
					<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fuehrungswerk' ); ?></a>
					<?php if ( has_nav_menu( 'top' ) ) { ?>
						<div class="gray-top-bar show-for-medium">
							<div class="row"><!-- Foundation .row start -->
								<div class="small-12 columns"><!-- Foundation .columns start -->
									<div class="top-bar">
										<div class="top-bar-right">
										  	<?php wp_nav_menu( 
										  		array( 
												'theme_location' => 'top', 
												'menu_id' => 'top-nav',
												'menu_class' => 'dropdown menu',
												'items_wrap'     => '<ul id="%1$s" class="%2$s show-for-medium" data-dropdown-menu>%3$s</ul>',
												'depth' => 3,                                   // Limit the depth of the nav
												'fallback_cb' => false, 
												'walker' => new Fuehrungswerk_Top_Bar_Walker()
												) ); 
											?>
										    <!-- <ul class="dropdown menu" data-dropdown-menu>
										      <li class="menu-text">Site Title</li>
										      <li class="has-submenu">
										        <a href="#">One</a>
										        <ul class="submenu menu vertical" data-submenu>
										          <li><a href="#">One</a></li>
										          <li><a href="#">Two</a></li>
										          <li><a href="#">Three</a></li>
										        </ul>
										      </li>
										      <li><a href="#">Two</a></li>
										      <li><a href="#">Three</a></li>
										    </ul> -->
										</div>
									  	<!-- <div class="top-bar-right">
										  	<ul class="menu social">
												<?php  if ( get_theme_mod( 'facebook' ) ) : ?>
												<li>
													<a class="facebook" href="<?php echo get_theme_mod( 'facebook' ); ?>" target="_blank"><i class="fa fa-facebook-official"></i></a>	
												</li>
												<?php endif;  ?>
												<?php  if ( get_theme_mod( 'twitter' ) ) : ?>
												<li>
													<a class="twitter" href="<?php echo get_theme_mod( 'twitter' ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>	
												</li>
												<?php endif;  ?>
												<?php  if ( get_theme_mod( 'instagram' ) ) : ?>
												<li>
													<a class="instagram" href="<?php echo get_theme_mod( 'instagram' ); ?>" target="_blank"><i class="fa fa-instagram"></i></a>	
												</li>
												<?php endif;  ?>
												<?php  if ( get_theme_mod( 'googleplus' ) ) : ?>
												<li>
													<a class="googleplus" href="<?php echo get_theme_mod( 'googleplus' ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>	
												</li>
												<?php endif;  ?>
												<?php  if ( get_theme_mod( 'linkedin' ) ) : ?>
												<li>
													<a class="linkedin" href="<?php echo get_theme_mod( 'linkedin' ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>	
												</li>
												<?php endif;  ?>
												<?php  if ( get_theme_mod( 'youtube' ) ) : ?>
												<li>
													<a class="youtube" href="<?php echo get_theme_mod( 'youtube' ); ?>" target="_blank"><i class="fa fa-youtube"></i></a>	
												</li>
												<?php endif;  ?>
												<?php  if ( get_theme_mod( 'tumblr' ) ) : ?>
												<li>
													<a class="tumblr" href="<?php echo get_theme_mod( 'tumblr' ); ?>" target="_blank"><i class="fa fa-tumblr"></i></a>	
												</li>
												<?php endif;  ?>
												<?php wp_nav_menu( 
										  		array( 
												'theme_location' => 'top-right', 
												'items_wrap'     => '%3$s',
												'depth' => 1,                                   
												'container'       => false,
												'fallback_cb' => false, 
												'walker' => new Fuehrungswerk_Top_Bar_Walker()
												) ); 
												?>
											</ul>
									  	</div> -->
									</div>
								</div>
							</div>
						</div>
						<?php } ?> 
					<header id="masthead" class="site-header show-for-medium" role="banner">
						<div class="scrolled-column-row">
							<div class="site-branding">
								<h1 class="site-title">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title-link">
										<?php if ( get_header_image() ) : ?>
										<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="	<?php bloginfo( 'name' ); ?>">
									
										<?php else : ?>
										<?php bloginfo( 'name' ); ?>
										<?php endif; // End header image check. ?>
									</a>
									<p class="site-description hide"><small><?php bloginfo( 'description' ); ?></small></p>
								</h1>
							</div><!-- .site-branding -->

							<!-- Foundation top-bar navigation start -->
							<nav id="site-navigation" class="main-navigation top-bar hide-for-small" role="navigation" data-topbar >
								<section class="top-bar-section">
								<?php wp_nav_menu( 
							  		array( 
									'theme_location' => 'primary', 
									'menu_id' => 'main-nav',
									'menu_class' => 'dropdown menu',
									'items_wrap'     => '<ul id="%1$s" class="%2$s show-for-medium" data-dropdown-menu>%3$s</ul>',
									'depth' => 3,                                   // Limit the depth of the nav
	        						'fallback_cb' => false, 
									'walker' => new Fuehrungswerk_Top_Bar_Walker()
									) ); 
								?>
								</section>
							</nav><!-- #site-navigation -->
						</div>
						<!-- .row -->
						<!-- Foundation top-bar navigation end -->

						<!-- <nav id="site-navigation" class="main-navigation" role="navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'fuehrungswerk' ); ?></button>
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
						</nav><!-- #site-navigation --> 
					</header><!-- #masthead -->
					<?php get_template_part( 'template-parts/header', 'images' ); ?>
					<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

					<div id="content" class="site-content">