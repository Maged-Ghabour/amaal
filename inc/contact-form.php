<?php
/**
 * Contact Form AJAX Handler – Full Version
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_ajax_amal_contact',        'amal_handle_contact_form' );
add_action( 'wp_ajax_nopriv_amal_contact', 'amal_handle_contact_form' );

function amal_handle_contact_form(): void {

	// ── Verify nonce ──────────────────────────────────────────────
	if ( ! check_ajax_referer( 'amal_contact_form', 'amal_nonce', false ) ) {
		wp_send_json_error( [ 'message' => __( 'انتهت صلاحية الجلسة. يرجى تحديث الصفحة.', 'amal-malki' ) ], 403 );
	}

	// ── Sanitize inputs ───────────────────────────────────────────
	$name           = sanitize_text_field( wp_unslash( $_POST['name']          ?? '' ) );
	$phone          = sanitize_text_field( wp_unslash( $_POST['phone']         ?? '' ) );
	$email          = sanitize_email(      wp_unslash( $_POST['email']         ?? '' ) );
	$city           = sanitize_text_field( wp_unslash( $_POST['city']          ?? '' ) );
	$case_type      = sanitize_text_field( wp_unslash( $_POST['case_type']     ?? '' ) );
	$case_subtype   = sanitize_text_field( wp_unslash( $_POST['case_subtype']  ?? '' ) );
	$message        = sanitize_textarea_field( wp_unslash( $_POST['message']   ?? '' ) );

	// Contact method is an array of checkboxes
	$raw_methods    = $_POST['contact_method'] ?? [];
	$contact_method = is_array( $raw_methods )
		? implode( '، ', array_map( 'sanitize_text_field', $raw_methods ) )
		: sanitize_text_field( $raw_methods );

	// ── Basic validation ──────────────────────────────────────────
	if ( empty( $name ) || empty( $phone ) || empty( $case_type ) ) {
		wp_send_json_error( [ 'message' => __( 'يرجى ملء جميع الحقول المطلوبة (الاسم، الهاتف، نوع القضية).', 'amal-malki' ) ], 422 );
	}

	// ── Build email ───────────────────────────────────────────────
	$admin_email   = get_option( 'admin_email' );
	$site_name     = get_bloginfo( 'name' );

	$email_subject = sprintf( '[%s] طلب جديد – %s', $site_name, $case_type );

	$rows = [
		'الاسم الكامل'           => $name,
		'رقم الهاتف'             => $phone,
		'البريد الإلكتروني'      => $email   ?: '—',
		'المدينة'                => $city    ?: '—',
		'نوع الخدمة'             => $case_type,
		'المسار المطلوب'         => $case_subtype ?: '—',
		'طريقة التواصل المفضلة'  => $contact_method ?: '—',
		'تفاصيل الطلب'           => $message  ?: '—',
	];

	$email_body = "══════════════════════════════\n";
	$email_body .= sprintf( "طلب جديد من موقع %s\n", $site_name );
	$email_body .= "══════════════════════════════\n\n";
	foreach ( $rows as $label => $value ) {
		$email_body .= sprintf( "%s:\n%s\n\n", $label, $value );
	}
	$email_body .= "══════════════════════════════\n";
	$email_body .= sprintf( "التاريخ: %s\n", wp_date( 'Y-m-d H:i:s' ) );

	$reply_to = ! empty( $email ) ? $email : $admin_email;

	$headers = [
		'Content-Type: text/plain; charset=UTF-8',
		sprintf( 'Reply-To: %s <%s>', $name, $reply_to ),
	];

	$sent = wp_mail( $admin_email, $email_subject, $email_body, $headers );

	if ( $sent ) {
		wp_send_json_success( [ 'message' => __( 'تم إرسال طلبك بنجاح! سنتواصل معك قريباً.', 'amal-malki' ) ] );
	} else {
		wp_send_json_error( [ 'message' => __( 'حدث خطأ أثناء الإرسال. يرجى المحاولة مجدداً.', 'amal-malki' ) ], 500 );
	}
}
