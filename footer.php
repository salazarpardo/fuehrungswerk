<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fuehrungswerk
 */

?>
				</div><!-- #content -->
				<?php wp_reset_query();

				global $post;
				$template = get_post_meta($post->ID,'_wp_page_template',true);
				 if ((is_page() || is_single()) && $template != 'default') : ?>
					<?php get_template_part( 'template-parts/testimonials' ); ?>
				<?php endif;?>
				<?php if (is_front_page() && !is_home()) : get_template_part( 'template-parts/products' ); endif; ?>
				<?php get_template_part( 'template-parts/customers' ); ?>
				<?php get_sidebar('home-footer'); ?>

				<footer id="colophon" class="footer" role="contentinfo">
						<div class="site-info">
							<!-- <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'fuehrungswerk' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'fuehrungswerk' ), 'WordPress' ); ?></a>
							<span class="sep"> | </span>
							<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'fuehrungswerk' ), 'fuehrungswerk', '<a href="http://salazarpardo.com" rel="designer">salazarpardo</a>' ); ?> -->

							<div class="footer-center">
							 	<?php
								if ( has_nav_menu('footer') ) { ?>
								    <ul class="footer-menu">
									<?php wp_nav_menu( 
							  		array( 
									'theme_location' => 'footer', 
									'items_wrap'     => '%3$s',
									'depth' => 1,                                   
									'container'       => false,
									'fallback_cb' => false, 
									'walker' => new Fuehrungswerk_Top_Bar_Walker()
									) ); 
									?>
								</ul>
								<?php } ?> 
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
									<?php  if ( get_theme_mod( 'skype' ) ) : ?>
									<li>
										<a class="skype" href="<?php echo get_theme_mod( 'skype' ); ?>" target="_blank"><i class="fa fa-skype"></i></a>	
									</li>
									<?php endif;  ?>
									<?php  if ( get_theme_mod( 'xing' ) ) : ?>
									<li>
										<a class="xing" href="<?php echo get_theme_mod( 'xing' ); ?>" target="_blank"><i class="fa fa-xing"></i></a>	
									</li>
									<?php endif;  ?>
									<?php  if ( get_theme_mod( 'mail' ) ) : ?>
									<li>
										<a class="mail" href="mailto:<?php echo get_theme_mod( 'mail' ); ?>"><i class="fa fa-envelope"></i></a>	
									</li>
									<?php endif;  ?>
								</ul>
							</div>
							
							<div class="footer-left">
								<p><strong class="title">FELICITAS SAURENBACH<br>
									Unternehmensberatung für Führungskultur und Werteökonomie</strong><br>
									Gänsemarkt 21-23<br>
									20354 Hamburg<br>
									USt.-ID 239305773<br>
								</p>
							</div>
							
							<div class="footer-right">
								<p>
									<strong class="title">Kontakt</strong><br>
									<br>
									Tel: 040 / 32 901 247<br>
									Fax: 040 / 32 901 100<br>
									<br>
									<strong>mail@felicitassaurenbach.de<br>
									www.felicitassaurenbach.de</strong>
								</p>
							</div>
						</div><!-- .site-info -->
				</footer><!-- #colophon -->
			</div><!-- #page -->
		</div>
    </div>
</div>
<?php wp_footer(); ?>

</body>
</html>
