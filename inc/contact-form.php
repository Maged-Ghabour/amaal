<?php
/**
 * Contact Form AJAX Handler
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_ajax_amal_contact',        'amal_handle_contact_form' );
add_action( 'wp_ajax_nopriv_amal_contact', 'amal_handle_contact_form' );

function amal_handle_contact_form(): void {
	// Verify nonce
	if ( ! check_ajax_referer( 'amal_nonce', 'amal_nonce', false ) ) {
		wp_send_json_error( [ 'message' => __( 'انتهت صلاحية الجلسة. يرجى تحديث الصفحة.', 'amal-malki' ) ], 403 );
	}

	// Sanitize inputs
	$name    = sanitize_text_field( wp_unslash( $_POST['name']    ?? '' ) );
	$phone   = sanitize_text_field( wp_unslash( $_POST['phone']   ?? '' ) );
	$subject = sanitize_text_field( wp_unslash( $_POST['subject'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );

	// Basic validation
	if ( empty( $name ) || empty( $phone ) || empty( $subject ) ) {
		wp_send_json_error( [ 'message' => __( 'يرجى ملء جميع الحقول المطلوبة.', 'amal-malki' ) ], 422 );
	}

	// Email to site admin
	$admin_email = get_option( 'admin_email' );
	$site_name   = get_bloginfo( 'name' );

	$email_subject = sprintf( '[%s] %s', $site_name, $subject );

	$email_body  = sprintf( __( 'استشارة جديدة من موقع %s', 'amal-malki' ), $site_name ) . "\n\n";
	$email_body .= sprintf( __( 'الاسم: %s', 'amal-malki' ),    $name )    . "\n";
	$email_body .= sprintf( __( 'الجوال: %s', 'amal-malki' ),   $phone )   . "\n";
	$email_body .= sprintf( __( 'الموضوع: %s', 'amal-malki' ),  $subject ) . "\n\n";
	$email_body .= sprintf( __( 'الرسالة:', 'amal-malki' ) )                 . "\n" . $message;

	$headers = [
		'Content-Type: text/plain; charset=UTF-8',
		sprintf( 'Reply-To: %s <%s>', $name, $admin_email ),
	];

	$sent = wp_mail( $admin_email, $email_subject, $email_body, $headers );

	if ( $sent ) {
		wp_send_json_success( [ 'message' => __( 'تم إرسال طلبك بنجاح!', 'amal-malki' ) ] );
	} else {
		wp_send_json_error( [ 'message' => __( 'حدث خطأ أثناء الإرسال. يرجى المحاولة مجدداً.', 'amal-malki' ) ], 500 );
	}
}
