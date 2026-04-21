<?php
/**
 * Why Us Section
 *
 * @package AmalMalki
 */

/**
 * Why Us Section
 *
 * @package AmalMalki
 */

$why_us_title = function_exists('get_field') && get_field('why_us_title') ? get_field('why_us_title') : __('لماذا نحن؟', 'amal-malki');
$why_us_subtitle = function_exists('get_field') && get_field('why_us_subtitle') ? get_field('why_us_subtitle') : __('لأننا لا نُقدِّم خدمة قانونية تقليدية... بل نبني تجربة متكاملة قائمة على الاحتراف والسرعة والدقة', 'amal-malki');

$bg_color = function_exists('get_field') && get_field('why_us_bg_color') ? get_field('why_us_bg_color') : '#ffffff';
$text_color = function_exists('get_field') && get_field('why_us_text_color') ? get_field('why_us_text_color') : '#6B5B47';
$card_bg_1 = function_exists('get_field') && get_field('why_us_card_bg_1') ? get_field('why_us_card_bg_1') : '#3f1c24';
$card_bg_2 = function_exists('get_field') && get_field('why_us_card_bg_2') ? get_field('why_us_card_bg_2') : '#1e1b2e';
$card_text = function_exists('get_field') && get_field('why_us_card_text') ? get_field('why_us_card_text') : '#ffffff';

$features = [];
for ($i = 1; $i <= 7; $i++) {
	$f_title = function_exists('get_field') ? get_field("why_us_f{$i}_title") : '';
	$f_text = function_exists('get_field') ? get_field("why_us_f{$i}_text") : '';
	if ($f_title) {
		$features[] = ['title' => $f_title, 'text' => $f_text];
	}
}

// Default fallback if no features entered in ACF
if (empty($features)) {
	$features = [
		['title' => 'خبرة قانونية موثوقة', 'text' => 'نعمل وفق الأنظمة واللوائح السعودية بخبرة عملية تضمن تقديم حلول دقيقة وقابلة للتطبيق.'],
		['title' => 'خدمات متكاملة في مكان واحد', 'text' => 'من الاستشارة إلى التمثيل القضائي مروراً بصياغة العقود والتوثيق نوفر لك كل ما تحتاجه قانونياً دون تشتت.'],
		['title' => 'سرعة الإنجاز وكفاءة الأداء', 'text' => 'نقدر وقتك لذلك نعتمد آليات عمل منظمة تضمن سرعة الاستجابة وجودة التنفيذ.'],
		['title' => 'سرية وموثوقية عالية', 'text' => 'نلتزم بأعلى معايير الخصوصية المهنية لحماية بياناتك ومصالحك القانونية.'],
		['title' => 'تجربة رقمية مرنة', 'text' => 'خدماتنا تُقدَّم عن بُعد باحترافية مما يتيح لك الوصول إلينا بسهولة أينما كنت.'],
		['title' => 'دعم متخصص للأفراد والمنشآت', 'text' => 'نواكب احتياجات الأفراد ورواد الأعمال والشركات ونقدم حلولاً تناسب كل مرحلة من مراحل النمو.'],
		['title' => 'رؤية قانونية تصنع الفارق', 'text' => 'لا نكتفي بحل المشكلة بل نعمل على منعها قبل حدوثها عبر تحليل قانوني استباقي.'],
	];
}
?>

<section id="why-us" class="why-us-section" style="background-color: <?php echo esc_attr($bg_color); ?>;"
	aria-label="<?php esc_attr_e('لماذا نحن', 'amal-malki'); ?>">
	<div class="container">

		<div class="why-us-header">
			<h2 class="section-title"><?php echo esc_html($why_us_title); ?></h2>
			<p class="why-us-subtitle" style="color: <?php echo esc_attr($text_color); ?>;">
				<?php echo nl2br(esc_html($why_us_subtitle)); ?>
			</p>
		</div>

		<div class="why-us-flex-grid">
			<?php foreach ($features as $feature): ?>
				<div class="why-us-card"
					style="background: linear-gradient(135deg, <?php echo esc_attr($card_bg_1); ?>, <?php echo esc_attr($card_bg_2); ?>);">
					<h3 class="why-us-card__title" style="color: <?php echo esc_attr($card_text); ?>;">
						<?php echo esc_html($feature['title']); ?></h3>
					<p class="why-us-card__text" style="color: <?php echo esc_attr($card_text); ?>; opacity: 0.85;">
						<?php echo esc_html($feature['text']); ?></p>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</section><!-- #why-us -->