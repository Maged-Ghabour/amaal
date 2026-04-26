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

$show_why_us = function_exists('get_field') && get_field('show_why_us_section') !== null ? get_field('show_why_us_section') : true;
if (!$show_why_us) {
	return;
}

$why_us_title = function_exists('get_field') && get_field('why_us_title') ? get_field('why_us_title') : __('لماذا نحن؟', 'amal-malki');
$why_us_subtitle = function_exists('get_field') && get_field('why_us_subtitle') ? get_field('why_us_subtitle') : __('لأننا لا نُقدِّم خدمة قانونية تقليدية... بل نبني تجربة متكاملة قائمة على الاحتراف والسرعة والدقة', 'amal-malki');

$bg_color = function_exists('get_field') && get_field('why_us_bg_color') ? get_field('why_us_bg_color') : '#ffffff';
$text_color = function_exists('get_field') && get_field('why_us_text_color') ? get_field('why_us_text_color') : '#6B5B47';
$card_bg_1 = function_exists('get_field') && get_field('why_us_card_bg_1') ? get_field('why_us_card_bg_1') : '#3f1c24';
$card_bg_2 = function_exists('get_field') && get_field('why_us_card_bg_2') ? get_field('why_us_card_bg_2') : '#1e1b2e';
$card_text = function_exists('get_field') && get_field('why_us_card_text') ? get_field('why_us_card_text') : '#ffffff';

$features = [];
for ($i = 1; $i <= 10; $i++) {
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
$top_row_count = function_exists('get_field') && get_field('why_us_top_row') ? (int) get_field('why_us_top_row') : 4;
$bottom_row_count = function_exists('get_field') && get_field('why_us_bottom_row') ? (int) get_field('why_us_bottom_row') : 3;
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
			<?php foreach ($features as $index => $feature):
				$is_top_row = ($index < $top_row_count);
				$cards_per_row = $is_top_row ? $top_row_count : $bottom_row_count;
				?>
				<div class="why-us-card"
					style="--cols: <?php echo esc_attr($cards_per_row); ?>; background: linear-gradient(180deg, #4D201B 0%, #411429 28.35%, #34193A 75%, #231B42 100%);">
					<h3 class="why-us-card__title" style="color: <?php echo esc_attr($card_text); ?>;">
						<?php echo esc_html($feature['title']); ?>
					</h3>
					<p class="why-us-card__text" style="color: <?php echo esc_attr($card_text); ?>; opacity: 0.85;">
						<?php echo esc_html($feature['text']); ?>
					</p>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</section><!-- #why-us -->