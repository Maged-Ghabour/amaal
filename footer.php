</div><!-- #content -->

<!-- ═══════════════════════════════════════════
		 FOOTER
	═══════════════════════════════════════════ -->
<!-- DEBUG: Contact CTA Inclusion -->
<?php 
// Show contact CTA on all pages except the blog (posts index, archives, single posts)
if ( ! ( is_home() || is_archive() || is_singular('post') ) ) : 
    get_template_part('template-parts/sections/contact-cta'); 
endif; 
?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="footer-inner container">

		<!-- Footer Logo + Tagline -->
		<div class="footer-brand">
			<?php if (has_custom_logo()): ?>
				<?php the_custom_logo(); ?>
			<?php else: ?>
				<span class="footer-logo-text"><?php bloginfo('name'); ?></span>
			<?php endif; ?>
			<p class="footer-tagline"><?php bloginfo('description'); ?></p>
		</div>

		<!-- Footer Columns -->
		<div class="footer-columns">

			<!-- Col 1: Important Links -->
			<div class="footer-col">
				<h4 class="footer-col-title"><?php _e('روابط مهمة', 'amal-malki'); ?></h4>
				<h5 class="footer-subtitle"><a href="<?php echo esc_url(home_url('/مكتب-محاماة-معتمد/')); ?>">آمال المالكي للمحاماة والإستشارات القانونية</a></h5>
				<?php
				wp_nav_menu([
					'theme_location' => 'footer-1',
					'container' => false,
					'menu_class' => 'footer-nav-list',
					'fallback_cb' => function () {
						echo '<ul class="footer-nav-list">';
						echo '<li><a href="' . esc_url('https://aamal-sa.com/مكتب-محاماة-معتمد/') . '">' . __('من نحن', 'amal-malki') . '</a></li>';
						echo '<li><a href="' . esc_url(home_url('/المستشارة-آمال-المالكي')) . '">' . __('نبذه عنا', 'amal-malki') . '</a></li>';
						echo '<li><a href="' . esc_url(home_url('/#services')) . '">' . __('الخدمات', 'amal-malki') . '</a></li>';
						echo '<li><a href="https://wa.me/9660541415099" target="_blank" rel="noopener noreferrer">' . __('تواصل معنا', 'amal-malki') . '</a></li>';
						echo '<li><a href="' . esc_url(home_url('/blog')) . '">' . __('المدونة', 'amal-malki') . '</a></li>';
						echo '</ul>';
					},
				]);
				?>
			</div>



			<!-- Col 3: Working Hours -->
			<div class="footer-col">
				<h4 class="footer-col-title"><?php _e('ساعات العمل', 'amal-malki'); ?></h4>
				<p class="footer-hours-label"><?php _e('من الأحد إلى الخميس', 'amal-malki'); ?></p>
				<p class="footer-hours"><?php _e('9:00 ص - 6:00 م', 'amal-malki'); ?></p>
			</div>

			<!-- Col 3: Contact -->
			<div class="footer-col footer-contact">
				<h4 class="footer-col-title"><?php _e('تواصل معنا', 'amal-malki'); ?></h4>

				<?php
				// These values can be moved to Customizer / ACF
				$address = get_theme_mod('footer_address', __('جدة', 'amal-malki'));
				$phone = get_theme_mod('footer_phone', '0541415099');
				$whatsapp = get_theme_mod('footer_whatsapp', '');
				$email = get_theme_mod('footer_email', 'info@aamal-sa.com');
				?>

				<address>
					<?php if ( ! empty( $address ) ) : ?>
					<p class="footer-contact-value"
						style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
						<svg style="color: #c9a84c; flex-shrink: 0;" width="20" height="20" fill="none"
							stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
							stroke-linejoin="round">
							<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
							<circle cx="12" cy="10" r="3"></circle>
						</svg>
						<span><?php echo esc_html($address); ?></span>
					</p>
					<?php endif; ?>

					<?php if ( ! empty( $phone ) ) : ?>
					<p class="footer-contact-value"
						style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
						<svg style="color: #c9a84c; flex-shrink: 0;" width="20" height="20" fill="none"
							stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
							stroke-linejoin="round">
							<path
								d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
							</path>
						</svg>
						<a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>">
							<?php echo esc_html($phone); ?>
						</a>
					</p>
					<?php endif; ?>

					<?php if ( ! empty( $whatsapp ) ) : ?>
					<p class="footer-contact-value"
						style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
						<svg style="color: #c9a84c; flex-shrink: 0;" width="20" height="20" fill="currentColor"
							viewBox="0 0 448 512">
							<path
								d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zM223.9 414.4c-32.8 0-65-8.8-93.1-25.5l-6.7-4-69.2 18.2 18.5-67.4-4.4-7c-18.4-29.2-28.1-63.2-28.1-98.2 0-101.5 82.6-184.1 184.2-184.1 49.2 0 95.4 19.2 130.1 53.9s53.8 81 53.8 130.2c0 101.5-82.6 184.2-184.2 184.2zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
						</svg>
						<a href="https://wa.me/<?php echo esc_attr(preg_replace('/[^0-9]/', '', $whatsapp)); ?>" target="_blank" rel="noopener noreferrer">
							<?php echo esc_html($whatsapp); ?>
						</a>
					</p>
					<?php endif; ?>

					<?php if ( ! empty( $email ) ) : ?>
					<p class="footer-contact-value"
						style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
						<svg style="color: #c9a84c; flex-shrink: 0;" width="20" height="20" fill="none"
							stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
							stroke-linejoin="round">
							<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
							</path>
							<polyline points="22,6 12,13 2,6"></polyline>
						</svg>
						<a href="mailto:<?php echo esc_attr($email); ?>">
							<?php echo esc_html($email); ?>
						</a>
					</p>
					<?php endif; ?>
				</address>

				<!-- Social Icons -->
				<div class="footer-social">
					<?php
					$socials = [
						'snapchat' => ['url' => get_theme_mod('social_snapchat', ''), 'label' => 'Snapchat'],
						'facebook' => ['url' => get_theme_mod('social_facebook', ''), 'label' => 'Facebook'],
						'twitter' => ['url' => get_theme_mod('social_twitter', 'https://x.com/mostshar_sa'), 'label' => 'Twitter / X'],
						'instagram' => ['url' => get_theme_mod('social_instagram', ''), 'label' => 'Instagram'],
						'tiktok' => ['url' => get_theme_mod('social_tiktok', ''), 'label' => 'TikTok'],
						'linkedin' => ['url' => get_theme_mod('social_linkedin', ''), 'label' => 'LinkedIn'],
					];
					foreach ($socials as $key => $item):
						if (empty($item['url']) || $item['url'] === '#')
							continue;
						?>
						<a href="<?php echo esc_url($item['url']); ?>"
							class="social-icon social-icon--<?php echo esc_attr($key); ?>"
							aria-label="<?php echo esc_attr($item['label']); ?>" target="_blank" rel="noopener noreferrer">
							<?php echo amal_get_social_icon($key); ?>
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
				&copy; <?php echo esc_html(date('Y')); ?>
				<?php bloginfo('name'); ?>.
				<?php _e('جميع الحقوق محفوظة.', 'amal-malki'); ?>
			</p>
		</div>
	</div>

</footer><!-- #colophon -->

</div><!-- #page -->

<?php if (get_theme_mod('enable_scroll_to_top', true)): ?>
	<button id="scrollToTopBtn" class="scroll-to-top" aria-label="<?php esc_attr_e('العودة للأعلى', 'amal-malki'); ?>">
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="2" stroke-linecap="round"
				stroke-linejoin="round" />
		</svg>
	</button>
<?php endif; ?>

<!-- WhatsApp Floating Button -->
<a href="https://wa.me/9660541415099" class="whatsapp-float" target="_blank" rel="noopener noreferrer"
	aria-label="<?php esc_attr_e('تواصل معنا عبر الواتساب', 'amal-malki'); ?>">
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor">
		<!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
		<path
			d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zM223.9 414.4c-32.8 0-65-8.8-93.1-25.5l-6.7-4-69.2 18.2 18.5-67.4-4.4-7c-18.4-29.2-28.1-63.2-28.1-98.2 0-101.5 82.6-184.1 184.2-184.1 49.2 0 95.4 19.2 130.1 53.9s53.8 81 53.8 130.2c0 101.5-82.6 184.2-184.2 184.2zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
	</svg>
</a>

<?php wp_footer(); ?>
</body>

</html>