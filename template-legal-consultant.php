<?php
/**
 * Template Name: مستشار قانوني لتأسيس الشركات
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Specific content for Legal Consultant (with ACF fallbacks)
$title = get_field('hero_title') ?: 'مستشار قانوني معتمد لتأسيس الشركات في السعودية';
$subtitle = get_field('hero_subtitle') ?: 'نلتزم بتقديم استشارات قانونية متميزة لتأسيس الشركات بأنواعها وفق الأنظمة واللوائح المعمول بها في المملكة، من خلال فريق قانوني متخصص يقدم لك الدعم المتكامل لضمان نجاح أعمالك.';
$btn_text = get_field('hero_btn_text') ?: 'اطلب الخدمة الان';
$btn_url = get_field('hero_btn_url') ?: 'https://wa.me/9660541415099';
$bg_url = get_field('hero_bg') ?: AMAL_ASSETS . '/public/company1.png'; // Fallback

?>

<main id="primary" class="site-main page-main" role="main">

	<section id="hero" class="hero-section" style="background-image: url('<?php echo esc_url($bg_url); ?>');"
		aria-label="<?php esc_attr_e('القسم الرئيسي - الاستشارات القانونية', 'amal-malki'); ?>">



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
				$why_title = get_field('why_us_title') ?: 'لماذا تحتاج إلى مستشار قانوني معتمد لتأسيس الشركات؟';
				$why_sub = get_field('why_us_subtitle') ?: 'الإدارة القانونية الصحيحة هي التي تحمي استثماراتك مستقبلا، دورنا كفريق متخصص يشمل:';
				$why_desc = get_field('why_us_desc') ?: '';
				$why_btn_text = get_field('why_us_btn_text') ?: 'اعرف المزيد عن خدماتنا';
				$why_btn_url = get_field('why_us_btn_url') ?: '#';
				$default_list = [
					'تحديد الهيكل القانوني الأمثل للشركة (ذات مسؤولية محدودة، مساهمة مبسطة، إلخ).',
					'صياغة مذكرات التفاهم وعقود التأسيس بما يحفظ حقوق جميع الأطراف.',
					'توفير الاستشارة القانونية للشركات فيما يخص متطلبات وزارة الاستثمار ووزارة التجارة.'
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
				$types_title = get_field('types_title') ?: 'خدماتنا في الاستشارة القانونية للشركات';
				$types_sub = get_field('types_subtitle') ?: 'نقدم استشارات قانونية تغطي كافة احتياجاتك، ومنها:';
				?>
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($types_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($types_sub); ?></p>
			</div>
			
			<div class="contract-types-grid">
				<?php
				$default_types = [
					1 => ['img' => 'certificate1.png', 'title' => 'حوكمة الشركات', 'desc' => 'إعداد لوائح الحوكمة وتطبيق القواعد المنظمة للشركات.'],
					2 => ['img' => 'aqd1.png', 'title' => 'صياغة العقود التجارية', 'desc' => 'صياغة ومراجعة كافة العقود التجارية بشكل احترافي.'],
					3 => ['img' => 'certificate2.png', 'title' => 'السجل التجاري', 'desc' => 'متابعة إصدار وتعديل وتجديد السجلات التجارية للشركات.']
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

	<!-- Trust Section -->
	<section class="trust-section" style="background: var(--color-white); padding-block: 4rem;">
		<div class="container">
			<div class="section-header text-center" style="margin-bottom: 3rem;">
				<?php
				$trust_title = get_field('trust_title') ?: 'كيف نحقق معايير الثقة والخبرة؟';
				$trust_sub = get_field('trust_subtitle') ?: 'نلتزم بتقديم أعلى مستويات الجودة والاحترافية في العمل.';
				?>
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($trust_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($trust_sub); ?></p>
			</div>

			<div class="trust-card" style="max-width: 800px; margin: 0 auto; background: var(--color-off-white); border-radius: 20px; padding: 40px; text-align: center; box-shadow: 0 10px 40px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.05);">
				<?php
				$trust_icon = get_field('trust_icon') ?: AMAL_ASSETS . '/public/badge-icon.svg'; // Or any icon
				$trust_desc = get_field('trust_desc') ?: 'عندما تتعامل مع مستشار قانوني معتمد لتأسيس الشركات من فريقنا، فأنت تحصل على خبرة ممتدة في السوق السعودي مع الالتزام التام بالسرية والاحترافية التي تفرضها هوية المحاماة والاستشارات القانونية.';
				?>
				<div class="trust-icon" style="width: 80px; height: 80px; margin: 0 auto 20px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
					<?php if(strpos($trust_icon, '.svg') === false): ?>
						<img src="<?php echo esc_url($trust_icon); ?>" alt="Trust Icon" style="max-width: 100%; height: auto;">
					<?php else: ?>
						<!-- Default SVG Icon if none provided -->
						<svg viewBox="0 0 24 24" fill="var(--color-gold)" width="60" height="60">
							<path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
						</svg>
					<?php endif; ?>
				</div>
				<p class="trust-desc" style="font-size: 1.2rem; line-height: 1.8; color: var(--color-dark); font-weight: 600;"><?php echo esc_html($trust_desc); ?></p>
			</div>
		</div>
	</section>

	<!-- FAQ Section -->
	<section class="contract-faq-section" style="background: var(--color-white); padding-top: 0;">
		<div class="container">
			<div class="section-header text-center">
				<?php
				$faq_title = get_field('faq_title') ?: 'الأسئلة الشائعة حول الاستشارة القانونية للشركات';
				$faq_sub = get_field('faq_subtitle') ?: 'إجابات على أكثر الأسئلة شيوعاً حول خدماتنا';
				?>
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($faq_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($faq_sub); ?></p>
			</div>

			<div class="faq-accordion">
				<?php
				$default_faqs = [
					1 => ['q' => 'ما هي أهمية وجود مستشار قانوني عند التأسيس؟', 'a' => 'المستشار القانوني يضمن اختيار الكيان القانوني الصحيح وتجنب أي ثغرات قد تكلف الشركة مبالغ طائلة مستقبلاً.'],
					2 => ['q' => 'هل تقدمون استشارات دورية للشركات؟', 'a' => 'نعم، نقدم عقود استشارات قانونية سنوية أو شهرية تلبي كافة احتياجات الشركات التجارية.'],
					3 => ['q' => 'أفضل خيار لتأسيس شركة الآن؟', 'a' => 'يعتمد الخيار الأفضل على حجم استثمارك وعدد الشركاء ونوع النشاط، ولذلك نقوم بدراسة حالتك وتقديم التوصية الأنسب.']
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
