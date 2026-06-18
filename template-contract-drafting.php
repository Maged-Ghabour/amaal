<?php
/**
 * Template Name: صياغة العقود
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Specific content for Contract Drafting (with ACF fallbacks)
$title = get_field('hero_title') ?: "أفضل محامي صياغة عقود تجارية\nوتدقيقها في السعودية";
$subtitle = get_field('hero_subtitle') ?: 'تُعد صياغة العقود حجر الزاوية في حماية الحقوق وضمان استدامة الأعمال في المملكة. وفي مكتب المستشار القانوني آمال المالكي نقدم خدمة صياغة عقد شراكة في السعودية بمهنية عالية تضمن لك ولشركائك الوضوح التام والالتزام بالأنظمة المعمول بها';
$btn_text = get_field('hero_btn_text') ?: 'اطلب الخدمة الان';
$btn_url = get_field('hero_btn_url') ?: 'https://wa.me/9660541415099';
$bg_url = get_field('hero_bg') ?: AMAL_ASSETS . '/public/' . rawurlencode('صياغة عقود.png');

?>

<main id="primary" class="site-main page-main" role="main">

	<section id="hero" class="hero-section" style="background-image: url('<?php echo esc_url($bg_url); ?>');"
		aria-label="<?php esc_attr_e('القسم الرئيسي - صياغة العقود', 'amal-malki'); ?>">



		<div class="hero-content container">
			<h1 class="hero-title"><?php echo nl2br(esc_html($title)); ?></h1>
			<p class="hero-subtitle"><?php echo esc_html($subtitle); ?></p>
			<a href="<?php echo esc_url($btn_url); ?>" class="btn btn--primary hero-cta"><?php echo esc_html($btn_text); ?></a>
		</div>
	</section>

	<!-- Why Contract Section -->
	<section class="why-contract-section" style="padding-block: var(--space-2xl);">
		<div class="container">
			<div class="why-contract-wrap">
				<?php
				$why_img = get_field('why_us_image') ?: AMAL_ASSETS . '/public/3qwd.png';
				$why_title = get_field('why_us_title') ?: 'لماذا تحتاج إلى محامي صياغة عقود تجارية؟';
				$why_desc = get_field('why_us_desc') ?: 'العقود ليست مجرد أوراق، بل هي درع قانوني يحمي استثماراتك. الاستعانة بمختص يضمن لك:';
				$why_btn_text = get_field('why_us_btn_text') ?: 'اعرف المزيد عن خدماتنا';
				$why_btn_url = get_field('why_us_btn_url') ?: '#';
				$default_list = [
					'تجنب الثغرات القانونية التي قد تؤدي إلى نزاعات مستقبلية طويلة الأمد.',
					'الامتثال التام لنظام الشركات السعودي الجديد وتعديلاته الأخيرة.',
					'صياغة بنود واضحة للحقوق والالتزامات وتوزيع الأرباح والخسائر.'
				];
				?>
				<div class="why-contract-image" style="max-width: 500px; margin: 0 auto;">
					<img src="<?php echo esc_url($why_img); ?>" alt="<?php echo esc_attr($why_title); ?>">
				</div>
								<?php
				$title_color = function_exists('get_field') && get_field('why_us_title_color') ? get_field('why_us_title_color') : '#C38A47';
				$sub1_color = function_exists('get_field') && get_field('why_us_sub1_color') ? get_field('why_us_sub1_color') : '#574c40';
				$sub2_color = function_exists('get_field') && get_field('why_us_sub2_color') ? get_field('why_us_sub2_color') : '#724d49';
				?>
				<div class="why-contract-content" style="padding-inline-end: 0; padding-inline-start: 1rem;">
					<h2 class="why-contract-title" style="font-size: 1.8rem; line-height: 1.4; color: <?php echo esc_attr($title_color); ?>;"><?php echo esc_html($why_title); ?></h2>
					<p class="why-contract-desc"><?php echo esc_html($why_desc); ?></p>
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

	<!-- Contracts Types Section -->
	<section class="contract-types-section">
		<div class="container">
			<div class="section-header text-center">
				<?php
				$types_title = get_field('types_title') ?: 'نغطي كافة أنواع التعاقدات';
				$types_badge = get_field('types_badge') ?: 'أنواع العقود';
				?>
				<h2 class="section-title" style="color: <?php echo esc_attr($sub1_color); ?>;"><?php echo esc_html($types_title); ?></h2>
				<span class="badge-title"><?php echo esc_html($types_badge); ?></span>
			</div>
			
			<div class="contract-types-grid">
				<?php
				$default_types = [
					1 => ['img' => 'aqd1.png', 'title' => 'عقود الشراكة', 'desc' => 'تحديد حقوق والتزامات الشركاء وحماية الاستثمارات المشتركة'],
					2 => ['img' => 'aqd2.png', 'title' => 'عقود التوريد والخدمات', 'desc' => 'ضمان التدفق التجاري السلس مع الموردين ومقدمي الخدمات'],
					3 => ['img' => 'aqd3.png', 'title' => 'عقود الامتياز التجاري (الفرنشايز)', 'desc' => 'توسيع نطاق أعمالك وحماية علامتك التجارية باحترافية']
				];
				for ($i = 1; $i <= 3; $i++) {
					$t_img = get_field("type_{$i}_image") ?: AMAL_ASSETS . '/public/' . $default_types[$i]['img'];
					$t_title = get_field("type_{$i}_title") ?: $default_types[$i]['title'];
					$t_desc = get_field("type_{$i}_desc") ?: $default_types[$i]['desc'];
				?>
				<div class="contract-type-card">
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
	<section class="contract-steps-section" style="padding-block: 4rem; background: var(--color-white);">
		<div class="container">
			<div class="section-header text-center" style="margin-bottom: 4rem;">
				<?php
				$steps_title = get_field('steps_title') ?: 'صياغة عقد الشراكة';
				$steps_sub = get_field('steps_subtitle') ?: 'عملية بسيطة وواضحة لضمان حصولك على عقد قانوني احترافي بكل سهولة';
				?>
				<h2 class="section-title" style="color: #c48c5a; font-size: 2rem; font-weight: bold; margin-bottom: 10px;"><?php echo esc_html($steps_title); ?></h2>
				<p class="section-subtitle" style="color: #666; font-size: 1rem;"><?php echo esc_html($steps_sub); ?></p>
			</div>

			<div class="steps-flex" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1.5rem; text-align: center; direction: rtl;">
				<?php
				$default_steps = [
					1 => ['title' => 'طلب الخدمة', 'desc' => 'قدم طلبك وحدد نوع العقد الذي تحتاجه', 'icon' => 'public/doc-icon.svg'],
					2 => ['title' => 'دراسة المتطلبات', 'desc' => 'نقوم بدراسة احتياجاتك ومتطلباتك القانونية بدقة', 'icon' => 'public/search-icon.svg'],
					3 => ['title' => 'إعداد وصياغة العقد', 'desc' => 'فريقنا يصيغ العقد وفقاً لأعلى المعايير القانونية', 'icon' => 'public/pen-icon.svg'],
					4 => ['title' => 'المراجعة القانونية', 'desc' => 'مراجعة شاملة للتأكد من التوافق القانوني الكامل', 'icon' => 'public/check-icon.svg'],
					5 => ['title' => 'تسليم النسخة النهائية', 'desc' => 'استلم عقدك الجاهز مع الدعم القانوني المستمر', 'icon' => 'public/send-icon.svg']
				];
				for ($i = 1; $i <= 5; $i++) {
					$st_title = get_field("step_{$i}_title") ?: $default_steps[$i]['title'];
					$st_desc = get_field("step_{$i}_desc") ?: $default_steps[$i]['desc'];
				?>
				<div class="step-item" style="display: flex; flex-direction: column; align-items: center;">
					<div class="step-visual" style="display: flex; flex-direction: column; align-items: center; margin-bottom: 1.5rem;">
						<div class="step-number" style="width: 60px; height: 60px; background-color: #4a2824; color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 26px; font-weight: bold; position: relative; z-index: 1;">
							<?php echo $i; ?>
						</div>
						<?php 
						$st_icon = get_field("step_{$i}_icon");
						if (!$st_icon && isset($default_steps[$i]['icon'])) {
							// Temporary fallback icons just for visual structure if no icon is set
							$st_icon = AMAL_ASSETS . '/' . $default_steps[$i]['icon'];
						}
						?>
						<div class="step-icon-card" style="width: 70px; height: 70px; background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); display: flex; align-items: center; justify-content: center; margin-top: -20px; position: relative; z-index: 2; padding: 15px; border: 1px solid rgba(0,0,0,0.02);">
							<?php if($st_icon): ?>
								<img src="<?php echo esc_url($st_icon); ?>" alt="<?php echo esc_attr($st_title); ?>" style="max-width: 100%; max-height: 100%;">
							<?php else: ?>
								<!-- SVG placeholder if no icon image -->
								<svg viewBox="0 0 24 24" fill="none" stroke="#4a2824" stroke-width="2" style="width:100%;height:100%;"><circle cx="12" cy="12" r="10"></circle></svg>
							<?php endif; ?>
						</div>
					</div>
					<h4 class="step-title" style="color: #666; font-size: 1.1rem; margin-bottom: 0.5rem; font-weight: bold;"><?php echo esc_html($st_title); ?></h4>
					<p class="step-desc" style="color: #999; font-size: 0.85rem; line-height: 1.6; margin: 0;"><?php echo esc_html($st_desc); ?></p>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<!-- FAQ Section -->
	<section class="contract-faq-section">
		<div class="container">
			<div class="section-header text-center">
				<?php
				$faq_title = get_field('faq_title') ?: 'الأسئلة الشائعة حول صياغة العقود';
				$faq_sub = get_field('faq_subtitle') ?: 'إجابات على أكثر الأسئلة شيوعاً حول خدماتنا';
				?>
				<h2 class="section-title" style="color: <?php echo esc_attr($sub1_color); ?>;"><?php echo esc_html($faq_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($faq_sub); ?></p>
			</div>

			<div class="faq-accordion">
				<?php
				$default_faqs = [
					1 => ['q' => 'كم يستغرق إعداد عقد شراكة تجاري؟', 'a' => 'يعتمد الوقت على مدى تعقيد الشراكة، لكننا نسعى دائماً لإنجاز المسودة الأولى خلال 3-5 أيام عمل.'],
					2 => ['q' => 'هل تراجعون العقود المكتوبة مسبقاً؟', 'a' => 'نعم، نقدم خدمة تدقيق ومراجعة العقود الجاهزة لبيان الثغرات القانونية وتعديلها لتتوافق مع مصلحتك.'],
					3 => ['q' => 'هل تصيغون عقود العمل للموظفين؟', 'a' => 'بالتأكيد، نصيغ عقود العمل بما يتوافق تماماً مع نظام العمل السعودي والقرارات الوزارية الحديثة.']
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
