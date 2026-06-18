<?php
/**
 * Template Name: حضور الجلسات القضائية
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Specific content for Hearings/Representation (with ACF fallbacks)
$title = get_field('hero_title') ?: 'محامي ترافع وتمثيل قانوني للشركات والأفراد';
$subtitle = get_field('hero_subtitle') ?: 'الترافع والمثول أمام المحاكم واللجان القضائية وشبه القضائية يمثل الجزء الأهم من نجاح القضية. نحن في مكتب المستشار القانوني آمال المالكي نضمن لك تمثيلاً قانونياً قوياً من خلال فريق محامين متخصصين في كافة أنواع القضايا التجارية.';
$btn_text = get_field('hero_btn_text') ?: 'اطلب الخدمة الان';
$btn_url = get_field('hero_btn_url') ?: 'https://wa.me/9660541415099';
$bg_url = get_field('hero_bg') ?: AMAL_ASSETS . '/public/company1.png'; // Fallback

?>

<main id="primary" class="site-main page-main" role="main">

	<section id="hero" class="hero-section" style="background-image: url('<?php echo esc_url($bg_url); ?>');"
		aria-label="<?php esc_attr_e('القسم الرئيسي - التمثيل القانوني', 'amal-malki'); ?>">



		<div class="hero-content container">
			<h1 class="hero-title"><?php echo nl2br(esc_html($title)); ?></h1>
			<p class="hero-subtitle"><?php echo esc_html($subtitle); ?></p>
			<a href="<?php echo esc_url($btn_url); ?>" class="btn btn--primary hero-cta"><?php echo esc_html($btn_text); ?></a>
		</div>

	</section><!-- #hero -->

	<!-- Why Us Section -->
	<section class="why-contract-section" style="padding-top: 5rem;">
		<div class="container">
			<div class="why-contract-wrap">
				<?php
				$why_img = get_field('why_us_image') ?: AMAL_ASSETS . '/public/company2.png';
				$why_title = get_field('why_us_title') ?: 'دور محامي ترافع وتمثيل قانوني';
				$why_sub = get_field('why_us_subtitle') ?: 'دورنا لا يقتصر على الحضور الشكلي، بل نقود استراتيجية التقاضي من خلال:';
				$why_desc = get_field('why_us_desc') ?: '';
				$why_btn_text = get_field('why_us_btn_text') ?: 'اعرف المزيد عن خدماتنا';
				$why_btn_url = get_field('why_us_btn_url') ?: '#';
				$default_list = [
					'تمثيل الموكلين أمام كافة المحاكم التجارية، العامة، العمالية، والإدارية.',
					'إعداد الموقف القانوني والرد على استفسارات القضاة بشكل قوي ومقنع.',
					'تقديم الدفوع الشفهية والمكتوبة أثناء الجلسات ببراعة.'
				];
				?>
				<div class="why-contract-image">
					<img src="<?php echo esc_url($why_img); ?>" alt="<?php echo esc_attr($why_title); ?>">
				</div>
								<?php
				$title_color = function_exists('get_field') && get_field('why_us_title_color') ? get_field('why_us_title_color') : '#C38A47';
				$sub1_color = function_exists('get_field') && get_field('why_us_sub1_color') ? get_field('why_us_sub1_color') : '#574c40';
				$sub2_color = function_exists('get_field') && get_field('why_us_sub2_color') ? get_field('why_us_sub2_color') : '#724d49';
				?>
				<div class="why-contract-content" style="padding-inline-end: 0; padding-inline-start: 1rem;">
					<h2 class="why-contract-title" style="font-size: 1.8rem; line-height: 1.4; color: <?php echo esc_attr($title_color); ?>;"><?php echo esc_html($why_title); ?></h2>
					<?php if ($why_sub): ?>
						<p class="why-contract-desc" style="color: <?php echo esc_attr($sub1_color); ?>; font-weight: bold; margin-bottom: 0.5rem;"><?php echo esc_html($why_sub); ?></p>
					<?php endif; ?>
					<?php if ($why_desc): ?>
						<p class="why-contract-desc" style="color: <?php echo esc_attr($sub2_color); ?>; font-weight: bold;"><?php echo esc_html($why_desc); ?></p>
					<?php endif; ?>
					<ul class="why-contract-list">
						<?php 
						for ($i = 1; $i <= 5; $i++) {
							$li = get_field("why_us_list_{$i}");
							if (!$li && isset($default_list[$i-1])) $li = $default_list[$i-1];
							if ($li) {
								echo '<li>' . esc_html($li) . '</li>';
							}
						}
						?>
					</ul>
					<a href="<?php echo esc_url($why_btn_url); ?>" class="why-contract-btn"><?php echo esc_html($why_btn_text); ?></a>
				</div>
			</div>
		</div>
	</section>

	<!-- Specialization Types Section -->
	<section class="contract-types-section" style="background: var(--color-white);">
		<div class="container">
			<div class="section-header text-center">
				<?php
				$types_title = get_field('types_title') ?: 'تمثيل الشركات في القضايا التجارية';
				$types_sub = get_field('types_subtitle') ?: 'تتعرض الشركات لنزاعات معقدة تتطلب محامي ترافع وتمثيل قانوني يفهم لغة الأرقام والسوق:';
				?>
				<h2 class="section-title" style="color: <?php echo esc_attr($sub1_color); ?>;"><?php echo esc_html($types_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($types_sub); ?></p>
			</div>
			
			<div class="contract-types-grid">
				<?php
				$default_types = [
					1 => ['img' => 'certificate1.png', 'title' => 'قضايا المطالبات المالية', 'desc' => 'إثبات الحقوق والمطالبة بالديون والتعويضات المالية.'],
					2 => ['img' => 'aqd1.png', 'title' => 'نزاعات الشركاء', 'desc' => 'التدخل القانوني لتسوية الخلافات وحماية حصص الشركاء.'],
					3 => ['img' => 'certificate2.png', 'title' => 'قضايا الملكية الفكرية', 'desc' => 'الترافع في قضايا العلامات التجارية وحقوق الملكية الفكرية.']
				];
				for ($i = 1; $i <= 3; $i++) {
					$t_img = get_field("type_{$i}_image") ?: AMAL_ASSETS . '/public/' . $default_types[$i]['img'];
					$t_title = get_field("type_{$i}_title") ?: $default_types[$i]['title'];
					$t_desc = get_field("type_{$i}_desc") ?: $default_types[$i]['desc'];
				?>
				<div class="contract-type-card" style="background: var(--color-off-white);">
					<div class="contract-type-image">
						<img src="<?php echo esc_url($t_img); ?>" alt="<?php echo esc_attr($t_title); ?>">
					</div>
					<div class="contract-type-body">
						<h3 class="contract-type-title"><?php echo esc_html($t_title); ?></h3>
						<p class="contract-type-desc"><?php echo esc_html($t_desc); ?></p>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<!-- Steps Section -->
	<section class="contract-steps-section" style="background: var(--color-white); padding-top: 2rem;">
		<div class="container">
			<div class="section-header text-center">
				<?php
				$steps_title = get_field('steps_title') ?: 'لماذا تثق بالتمثيل القانوني؟';
				$steps_sub = get_field('steps_subtitle') ?: 'تمثيل قانوني احترافي يحمي حقوقك ويعزز موقفك الدعوى:';
				?>
				<h2 class="section-title" style="color: <?php echo esc_attr($sub1_color); ?>;"><?php echo esc_html($steps_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($steps_sub); ?></p>
			</div>

			<div class="steps-flex">
				<?php
				$default_steps = [
					1 => ['title' => 'محامون مرخصون وإجراءات ناجز', 'desc' => 'فريقنا يضم نخبة من المحامين والمستشارين مرخصين ومسجلين بنظام ناجز.'],
					2 => ['title' => 'خبرة في القضايا التجارية الكبرى', 'desc' => 'تاريخ طويل من تمثيل الشركات في قضايا تجارية كبرى في المملكة.'],
					3 => ['title' => 'متابعة مستمرة وتحديثات فورية للقضايا', 'desc' => 'نحيط العميل بكافة مستجدات الجلسات ومسار القضية أولاً بأول.']
				];
				for ($i = 1; $i <= 3; $i++) {
					$st_title = get_field("step_{$i}_title") ?: $default_steps[$i]['title'];
					$st_desc = get_field("step_{$i}_desc") ?: $default_steps[$i]['desc'];
				?>
				<div class="step-item">
					<div class="step-icon-wrap">
						<div class="step-number" style="top: 20px; right: 50%; width: 40px; height: 40px; font-size: 1.4rem;"><?php echo $i; ?></div>
						<div class="step-icon" style="background: transparent; border: none; box-shadow: none;"></div>
					</div>
					<h4 class="step-title" style="margin-top: -10px;"><?php echo esc_html($st_title); ?></h4>
					<p class="step-desc"><?php echo esc_html($st_desc); ?></p>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<!-- FAQ Section -->
	<section class="contract-faq-section" style="background: var(--color-white); padding-top: 0;">
		<div class="container">
			<div class="section-header text-center">
				<?php
				$faq_title = get_field('faq_title') ?: 'الأسئلة الشائعة حول التمثيل القضائي';
				$faq_sub = get_field('faq_subtitle') ?: 'إجابات على أكثر الأسئلة شيوعاً حول خدماتنا';
				?>
				<h2 class="section-title" style="color: <?php echo esc_attr($sub1_color); ?>;"><?php echo esc_html($faq_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($faq_sub); ?></p>
			</div>

			<div class="faq-accordion">
				<?php
				$default_faqs = [
					1 => ['q' => 'هل يمكن لمحامي تمثيلي دون حضوري؟', 'a' => 'نعم، بموجب وكالة شرعية يمكننا الترافع والحضور نيابة عنك في كافة الجلسات.'],
					2 => ['q' => 'ما هي أهمية تمثيل الشركات محلياً؟', 'a' => 'تمثيل الشركات يضمن التزامها بالأنظمة المحلية ويحميها من الغرامات أو المساءلة القانونية.'],
					3 => ['q' => 'جلسات الدعوى تبدأ من متى؟', 'a' => 'تبدأ الجلسات فور قيد الدعوى وإحالتها للدائرة القضائية وتحديد موعد الجلسة الأولى.']
				];
				for ($i = 1; $i <= 5; $i++) {
					$q = get_field("faq_{$i}_question");
					$a = get_field("faq_{$i}_answer");
					if (!$q && isset($default_faqs[$i])) {
						$q = $default_faqs[$i]['q'];
						$a = $default_faqs[$i]['a'];
					}
					if ($q) {
				?>
				<div class="faq-item">
					<button class="faq-btn">
						<span><?php echo esc_html($q); ?></span>
						<svg class="faq-icon" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>
					</button>
					<div class="faq-content">
						<p><?php echo esc_html($a); ?></p>
					</div>
				</div>
				<?php } } ?>
			</div>
		</div>
	</section>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const faqBtns = document.querySelectorAll('.faq-btn');
			faqBtns.forEach(btn => {
				btn.addEventListener('click', function() {
					const item = this.parentElement;
					const content = this.nextElementSibling;
					
					item.classList.toggle('active');
					if (item.classList.contains('active')) {
						content.style.maxHeight = content.scrollHeight + 'px';
					} else {
						content.style.maxHeight = null;
					}
				});
			});
		});
	</script>

</main><!-- #primary -->

<?php
get_footer();
