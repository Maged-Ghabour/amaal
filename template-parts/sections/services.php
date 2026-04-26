<?php
/**
 * Services Section
 *
 * @package AmalMalki
 */

$show_services = function_exists('get_field') && get_field('show_services_section') !== null ? get_field('show_services_section') : true;
if ( ! $show_services ) { return; }

$services_title = function_exists('get_field') ? get_field('services_section_title') : null;
$services_count = function_exists('get_field') ? get_field('services_post_count') : 8;

$sec_title = $services_title ?: __( 'خدماتنا', 'amal-malki' );

$args = [
	'post_type'      => 'service',
	'posts_per_page' => $services_count ? (int)$services_count : 8,
	'post_status'    => 'publish',
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
];

$services = new WP_Query( $args );
?>

<section id="services" class="services-section" aria-label="<?php esc_attr_e( 'خدماتنا', 'amal-malki' ); ?>">
	<div class="container">

		<h2 class="section-title services-title"><?php echo esc_html( $sec_title ); ?></h2>

		<?php if ( $services->have_posts() ) : ?>

			<div class="services-grid">
				<?php while ( $services->have_posts() ) : $services->the_post(); ?>
					<?php get_template_part( 'template-parts/components/service-card' ); ?>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>

		<?php else : ?>

			<!-- Fallback static cards if no CPT posts yet -->
			<div class="services-grid">
				<?php
				$fallback_services = [
					[ 'title' => __( 'إعداد الدعوى القضائية', 'amal-malki' ),  'excerpt' => __( 'إعداد مذكرات قضائية وصياغة الدعاوى بأعلى معايير المهنة القانونية.', 'amal-malki' ) ],
					[ 'title' => __( 'المذكرات الجوابية', 'amal-malki' ),       'excerpt' => __( 'صياغة ردود احترافية تحمي موقفك القانوني أمام المحاكم.', 'amal-malki' ) ],
					[ 'title' => __( 'حضور الجلسات القضائية', 'amal-malki' ),  'excerpt' => __( 'تمثيلك القانوني الكامل في جلسات المحاكم بكل مستوياتها.', 'amal-malki' ) ],
					[ 'title' => __( 'متابعة قضايا الاستئناف', 'amal-malki' ), 'excerpt' => __( 'متابعة مسار قضيتك أمام محاكم الاستئناف للحصول على أفضل النتائج.', 'amal-malki' ) ],
					[ 'title' => __( 'صياغة وتدقيق العقود', 'amal-malki' ),    'excerpt' => __( 'صياغة العقود ومراجعتها وتدقيقها لحماية حقوقك القانونية.', 'amal-malki' ) ],
					[ 'title' => __( 'خدمات التوثيق', 'amal-malki' ),          'excerpt' => __( 'خدمات التوثيق الرسمي وإصدار الوكالات والمستندات القانونية.', 'amal-malki' ) ],
					[ 'title' => __( 'الاستشارة القانونية', 'amal-malki' ),     'excerpt' => __( 'استشارات قانونية متخصصة تجمع بين الدقة والسرعة والاحترافية.', 'amal-malki' ) ],
					[ 'title' => __( 'تأسيس الشركات', 'amal-malki' ),           'excerpt' => __( 'إجراءات تأسيس الشركات وتسجيلها وفق الأنظمة واللوائح السعودية.', 'amal-malki' ) ],
				];
				foreach ( $fallback_services as $svc ) : ?>
					<div class="service-card">
						<div class="service-card__thumb service-card__thumb--placeholder"></div>
						<div class="service-card__body">
							<h3 class="service-card__title"><?php echo esc_html( $svc['title'] ); ?></h3>
							<p class="service-card__excerpt"><?php echo esc_html( $svc['excerpt'] ); ?></p>
							<a href="#contact" class="service-card__link">
								<?php _e( 'تواصل معنا', 'amal-malki' ); ?>
								<span class="service-card__arrow" aria-hidden="true">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
										<line x1="17" y1="7" x2="7" y2="17"/>
										<polyline points="7 7 7 17 17 17"/>
									</svg>
								</span>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

		<?php endif; ?>

	</div>
</section><!-- #services -->
