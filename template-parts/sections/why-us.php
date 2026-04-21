<?php
/**
 * Why Us Section
 *
 * @package AmalMalki
 */

$features = [
	[
		'title'   => __( 'خبرة قانونية موثوقة', 'amal-malki' ),
		'text'    => __( 'نعمل وفق الأنظمة واللوائح السعودية بخبرة عملية تضمن تقديم حلول دقيقة وفعالة للتطبيق.', 'amal-malki' ),
	],
	[
		'title'   => __( 'سرعة الإنجاز وكفاءة الأداء', 'amal-malki' ),
		'text'    => __( 'ندير أعمالك بمنهجية منظمة تضمن سرعة الاستجابة.', 'amal-malki' ),
	],
	[
		'title'   => __( 'خدمات متكاملة في مكان واحد', 'amal-malki' ),
		'text'    => __( 'من صياغة العقود والتوثيق توفر لك كل ما تحتاجه تحت سقف واحد.', 'amal-malki' ),
	],
	[
		'title'   => __( 'سرية وموثوقية عالية', 'amal-malki' ),
		'text'    => __( 'نلتزم بأعلى معايير الخصوصية المهنية لحماية بياناتك ومصالحك القانونية.', 'amal-malki' ),
	],
	[
		'title'   => __( 'رؤية قانونية تصنع الفارق', 'amal-malki' ),
		'text'    => __( 'لا نكتفي بحل المشكلة؛ نل معها بمنطق استباقي قانوني عبر تحليل قانوني استباقي.', 'amal-malki' ),
	],
	[
		'title'   => __( 'دعم متخصص للأفراد والمنشآت', 'amal-malki' ),
		'text'    => __( 'نواكب احتياجات الأفراد وشركاء ورواد الأعمال ونقدم حلولاً تناسب كل مرحلة من مراحل النمو.', 'amal-malki' ),
	],
	[
		'title'   => __( 'تجربة رقمية مرنة', 'amal-malki' ),
		'text'    => __( 'خدماتنا تُقدَّم عن بُعد باحترافية ما يُتيح لك الوصول إلينا بسهولة أينما كنت.', 'amal-malki' ),
	],
];
?>

<section id="why-us" class="why-us-section" aria-label="<?php esc_attr_e( 'لماذا نحن', 'amal-malki' ); ?>">
	<div class="container">

		<div class="why-us-header">
			<h2 class="section-title"><?php _e( 'لماذا نحن؟', 'amal-malki' ); ?></h2>
			<p class="why-us-subtitle">
				<?php _e( 'لأننا لا نُقدِّم خدمة قانونية تقليدية..', 'amal-malki' ); ?><br>
				<?php _e( 'بل نبني تجربة متكاملة قائمة على الاحتراف والسرعة والدقة', 'amal-malki' ); ?>
			</p>
		</div>

		<div class="features-grid">
			<?php foreach ( $features as $feature ) : ?>
				<div class="feature-card">
					<h3 class="feature-card__title"><?php echo esc_html( $feature['title'] ); ?></h3>
					<p class="feature-card__text"><?php echo esc_html( $feature['text'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</section><!-- #why-us -->
