<?php
/**
 * Services Section
 *
 * @package AmalMalki
 */

$args = [
	'post_type'      => 'service',
	'posts_per_page' => 8,
	'post_status'    => 'publish',
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
];

$services = new WP_Query( $args );
?>

<section id="services" class="services-section" aria-label="<?php esc_attr_e( 'خدماتنا', 'amal-malki' ); ?>">
	<div class="container">

		<h2 class="section-title services-title"><?php _e( 'خدماتنا', 'amal-malki' ); ?></h2>

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
								<span class="service-card__arrow" aria-hidden="true">&#8592;</span>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

		<?php endif; ?>

	</div>
</section><!-- #services -->
