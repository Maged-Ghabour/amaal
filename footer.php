	</div><!-- #content -->

	<!-- ═══════════════════════════════════════════
	     FOOTER
	═══════════════════════════════════════════ -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-inner container">

			<!-- Footer Logo + Tagline -->
			<div class="footer-brand">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<span class="footer-logo-text"><?php bloginfo( 'name' ); ?></span>
				<?php endif; ?>
				<p class="footer-tagline"><?php bloginfo( 'description' ); ?></p>
			</div>

			<!-- Footer Columns -->
			<div class="footer-columns">

				<!-- Col 1: Important Links -->
				<div class="footer-col">
					<h4 class="footer-col-title"><?php _e( 'روابط مهمة', 'amal-malki' ); ?></h4>
					<?php
					wp_nav_menu( [
						'theme_location' => 'footer-1',
						'container'      => false,
						'menu_class'     => 'footer-nav-list',
						'fallback_cb'    => function() {
							echo '<ul class="footer-nav-list">';
							echo '<li><a href="' . esc_url( home_url( '/#about' ) )    . '">' . __( 'من نحن', 'amal-malki' )     . '</a></li>';
							echo '<li><a href="' . esc_url( home_url( '/#services' ) ) . '">' . __( 'الخدمات', 'amal-malki' )    . '</a></li>';
							echo '<li><a href="' . esc_url( home_url( '/#contact' ) )  . '">' . __( 'تواصل معنا', 'amal-malki' ) . '</a></li>';
							echo '<li><a href="' . esc_url( home_url( '/blog' ) )      . '">' . __( 'المدونة', 'amal-malki' )    . '</a></li>';
							echo '</ul>';
						},
					] );
					?>
				</div>

				<!-- Col 2: Working Hours -->
				<div class="footer-col">
					<h4 class="footer-col-title"><?php _e( 'ساعات العمل', 'amal-malki' ); ?></h4>
					<p class="footer-hours-label"><?php _e( 'من الأحد إلى الإثنين', 'amal-malki' ); ?></p>
					<p class="footer-hours"><?php _e( '9:00 ص - 6:00 م', 'amal-malki' ); ?></p>
				</div>

				<!-- Col 3: Contact -->
				<div class="footer-col footer-contact">
					<h4 class="footer-col-title"><?php _e( 'تواصل معنا', 'amal-malki' ); ?></h4>

					<?php
					// These values can be moved to Customizer / ACF
					$address = get_theme_mod( 'footer_address', __( 'برج الرياض، الرياض', 'amal-malki' ) );
					$phone   = get_theme_mod( 'footer_phone',   '+966 00000000' );
					$email   = get_theme_mod( 'footer_email',   'mail@mail.com' );
					?>

					<address>
						<p class="footer-contact-label"><?php _e( 'العنوان', 'amal-malki' ); ?></p>
						<p class="footer-contact-value"><?php echo esc_html( $address ); ?></p>

						<p class="footer-contact-label"><?php _e( 'الجوال', 'amal-malki' ); ?></p>
						<p class="footer-contact-value">
							<a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>">
								<?php echo esc_html( $phone ); ?>
							</a>
						</p>

						<p class="footer-contact-label"><?php _e( 'البريد الإلكتروني', 'amal-malki' ); ?></p>
						<p class="footer-contact-value">
							<a href="mailto:<?php echo esc_attr( $email ); ?>">
								<?php echo esc_html( $email ); ?>
							</a>
						</p>
					</address>

					<!-- Social Icons -->
					<div class="footer-social">
						<?php
						$socials = [
							'instagram' => [ 'url' => get_theme_mod( 'social_instagram', '#' ), 'label' => 'Instagram' ],
							'twitter'   => [ 'url' => get_theme_mod( 'social_twitter',   '#' ), 'label' => 'Twitter / X' ],
							'facebook'  => [ 'url' => get_theme_mod( 'social_facebook',  '#' ), 'label' => 'Facebook' ],
							'snapchat'  => [ 'url' => get_theme_mod( 'social_snapchat',  '#' ), 'label' => 'Snapchat' ],
						];
						foreach ( $socials as $key => $item ) : ?>
							<a href="<?php echo esc_url( $item['url'] ); ?>" class="social-icon social-icon--<?php echo esc_attr( $key ); ?>" aria-label="<?php echo esc_attr( $item['label'] ); ?>" target="_blank" rel="noopener noreferrer">
								<?php echo amal_get_social_icon( $key ); ?>
							</a>
						<?php endforeach; ?>
					</div>
				</div>

			</div><!-- .footer-columns -->

		</div><!-- .footer-inner -->

		<!-- Bottom Bar -->
		<div class="footer-bottom">
			<div class="container">
				<p class="footer-copy">
					&copy; <?php echo esc_html( date( 'Y' ) ); ?>
					<?php bloginfo( 'name' ); ?>.
					<?php _e( 'جميع الحقوق محفوظة.', 'amal-malki' ); ?>
				</p>
			</div>
		</div>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php if ( get_theme_mod( 'enable_scroll_to_top', true ) ) : ?>
<button id="scrollToTopBtn" class="scroll-to-top" aria-label="<?php esc_attr_e( 'العودة للأعلى', 'amal-malki' ); ?>">
	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>
</button>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
