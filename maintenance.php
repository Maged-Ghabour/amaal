<?php
/**
 * Maintenance Mode Template
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php esc_html_e( 'تحت الصيانة', 'amal-malki' ); ?> - <?php bloginfo( 'name' ); ?></title>
	
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Arabic:wght@400;500;600;700&display=swap" rel="stylesheet">
	
	<style>
		:root {
			--primary-color: #c19b6c; /* Elegant Gold */
			--bg-color: #0d1319; /* Deep Blue/Black */
			--text-color: #f2f2f2;
			--text-muted: #a0a5aa;
			--font-primary: 'Noto Serif Arabic', serif;
		}

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			background-color: var(--bg-color);
			color: var(--text-color);
			font-family: var(--font-primary);
			display: flex;
			align-items: center;
			justify-content: center;
			min-height: 100vh;
			text-align: center;
			overflow: hidden;
			position: relative;
		}

		/* Background Pattern / Gradient */
		.bg-overlay {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: radial-gradient(circle at center, rgba(193, 155, 108, 0.1) 0%, rgba(13, 19, 25, 1) 70%);
			z-index: 1;
		}

		.container {
			position: relative;
			z-index: 2;
			max-width: 800px;
			padding: 40px 20px;
		}

		.logo {
			margin-bottom: 40px;
			animation: fadeInDown 1s ease-out;
		}

		.logo svg {
			width: 80px;
			height: auto;
			fill: var(--primary-color);
		}

		.logo img {
			max-width: 200px;
			height: auto;
		}

		h1 {
			font-size: 3rem;
			font-weight: 700;
			color: var(--primary-color);
			margin-bottom: 20px;
			animation: fadeInUp 1s ease-out 0.3s backwards;
		}

		p {
			font-size: 1.25rem;
			color: var(--text-muted);
			line-height: 1.8;
			margin-bottom: 40px;
			animation: fadeInUp 1s ease-out 0.6s backwards;
		}

		.contact-info {
			display: flex;
			flex-direction: column;
			gap: 15px;
			align-items: center;
			justify-content: center;
			animation: fadeInUp 1s ease-out 0.9s backwards;
			margin-top: 20px;
			border-top: 1px solid rgba(193, 155, 108, 0.2);
			padding-top: 30px;
		}

		.contact-item {
			display: flex;
			align-items: center;
			gap: 10px;
			color: var(--primary-color);
			text-decoration: none;
			font-size: 1.1rem;
			transition: opacity 0.3s ease;
		}

		.contact-item:hover {
			opacity: 0.8;
		}

		.contact-item svg {
			width: 20px;
			height: 20px;
			fill: currentColor;
		}

		/* Animations */
		@keyframes fadeInDown {
			from { opacity: 0; transform: translateY(-30px); }
			to { opacity: 1; transform: translateY(0); }
		}

		@keyframes fadeInUp {
			from { opacity: 0; transform: translateY(30px); }
			to { opacity: 1; transform: translateY(0); }
		}

		@media (max-width: 768px) {
			h1 { font-size: 2.2rem; }
			p { font-size: 1.1rem; }
		}
	</style>
</head>
<body>
	<div class="bg-overlay"></div>
	
	<div class="container">
		<div class="logo">
			<?php
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			
			if ( has_custom_logo() ) {
				echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
			} else {
				// Fallback generic legal scale icon if no logo
				echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2L1 21h22L12 2zm0 3.83L19.5 19h-15L12 5.83zM11 10h2v5h-2v-5zm1 7.25c-.69 0-1.25-.56-1.25-1.25s.56-1.25 1.25-1.25 1.25.56 1.25 1.25-.56 1.25-1.25 1.25z"/></svg>';
			}
			?>
		</div>

		<h1><?php esc_html_e( 'الموقع تحت الصيانة', 'amal-malki' ); ?></h1>
		
		<p>
			نعمل حالياً على إجراء بعض التحديثات الهامة لتحسين تجربة استخدامكم.<br>
			نعتذر عن هذا الإزعاج المؤقت، وسنعود للعمل في أقرب وقت ممكن.
		</p>

		<div class="contact-info">
			<?php 
			$phone = get_theme_mod( 'footer_phone', '+966 00000000' );
			$email = get_theme_mod( 'footer_email', 'mail@mail.com' );
			?>
			
			<?php if ( $phone ) : ?>
			<a href="tel:<?php echo esc_attr( preg_replace('/[^\d+]/', '', $phone) ); ?>" class="contact-item" dir="ltr">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
				<?php echo esc_html( $phone ); ?>
			</a>
			<?php endif; ?>

			<?php if ( $email ) : ?>
			<a href="mailto:<?php echo esc_attr( $email ); ?>" class="contact-item">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
				<?php echo esc_html( $email ); ?>
			</a>
			<?php endif; ?>
		</div>
	</div>
</body>
</html>
