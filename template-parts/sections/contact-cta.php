<?php
/**
 * Contact CTA Section
 *
 * @package AmalMalki
 */
$show_contact = function_exists('get_field') && get_field('show_contact_section') !== null ? get_field('show_contact_section') : true;
if ( ! $show_contact ) { return; }

$contact_title = function_exists('get_field') ? get_field('contact_section_title') : null;
$contact_subtitle = function_exists('get_field') ? get_field('contact_section_subtitle') : null;

$sec_title = $contact_title ?: __( 'اطلب استشارتك الآن', 'amal-malki' );
$sec_sub = $contact_subtitle ?: __( 'فريقنا جاهز لمساعدتك في أي وقت', 'amal-malki' );
?>
<section id="contact" class="contact-section" aria-label="<?php esc_attr_e( 'تواصل معنا', 'amal-malki' ); ?>">
	<div class="container">
		<h2 class="section-title contact-title"><?php echo esc_html( $sec_title ); ?></h2>
		<p class="contact-subtitle"><?php echo nl2br( esc_html( $sec_sub ) ); ?></p>

		<form class="contact-form" id="contactForm" novalidate>
			<?php wp_nonce_field( 'amal_contact_form', 'amal_nonce' ); ?>

			<div class="form-row">
				<div class="form-group">
					<label for="contact_name"><?php _e( 'الاسم الكامل', 'amal-malki' ); ?></label>
					<input type="text" id="contact_name" name="name" required
						placeholder="<?php esc_attr_e( 'أدخل اسمك الكامل', 'amal-malki' ); ?>">
				</div>
				<div class="form-group">
					<label for="contact_phone"><?php _e( 'رقم الجوال', 'amal-malki' ); ?></label>
					<input type="tel" id="contact_phone" name="phone" required
						placeholder="<?php esc_attr_e( '05xxxxxxxx', 'amal-malki' ); ?>">
				</div>
			</div>

			<div class="form-group">
				<label for="contact_subject"><?php _e( 'موضوع الاستشارة', 'amal-malki' ); ?></label>
				<input type="text" id="contact_subject" name="subject" required
					placeholder="<?php esc_attr_e( 'أدخل موضوع استشارتك', 'amal-malki' ); ?>">
			</div>

			<div class="form-group">
				<label for="contact_message"><?php _e( 'تفاصيل إضافية', 'amal-malki' ); ?></label>
				<textarea id="contact_message" name="message" rows="5"
					placeholder="<?php esc_attr_e( 'اكتب تفاصيل استشارتك هنا...', 'amal-malki' ); ?>"></textarea>
			</div>

			<button type="submit" class="btn btn--primary btn--wide">
				<?php 
				$btn_text = function_exists('get_field') && get_field('contact_btn_text') ? get_field('contact_btn_text') : __( 'إرسال الطلب', 'amal-malki' );
				echo esc_html( $btn_text ); 
				?>
			</button>

			<div class="form-feedback" aria-live="polite"></div>
		</form>
	</div>
</section>
