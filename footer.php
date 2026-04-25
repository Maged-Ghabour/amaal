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
					$address = get_theme_mod( 'footer_address', __( 'جدة', 'amal-malki' ) );
					$phone   = get_theme_mod( 'footer_phone',   '0541415099' );
					$email   = get_theme_mod( 'footer_email',   'info@aamal-sa.com' );
					?>

					<address>
						<p class="footer-contact-value" style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
							<svg style="color: #c9a84c; flex-shrink: 0;" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
							<span><?php echo esc_html( $address ); ?></span>
						</p>

						<p class="footer-contact-value" style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
							<svg style="color: #c9a84c; flex-shrink: 0;" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
							<a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>">
								<?php echo esc_html( $phone ); ?>
							</a>
						</p>

						<p class="footer-contact-value" style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
							<svg style="color: #c9a84c; flex-shrink: 0;" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
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
