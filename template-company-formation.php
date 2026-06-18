<?php
/**
 * Template Name: تأسيس الشركات
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Specific content for Company Formation (with ACF fallbacks)
$title = get_field('hero_title') ?: 'خدمات تأسيس الشركات في السعودية';
$subtitle = get_field('hero_subtitle') ?: 'تعتبر مرحلة تأسيس الشركات هي الخطوة الاستراتيجية الأهم لأي مستثمر، وفي مكتب المستشار القانوني آمال المالكي نوفر لك دعماً قانونياً متكاملاً لضمان بدء نشاطك التجاري من خلال محامي تأسيس شركات في السعودية يمتلك الخبرة والسرعة في الإنجاز.';
$btn_text = get_field('hero_btn_text') ?: 'اطلب الخدمة الان';
$btn_url = get_field('hero_btn_url') ?: 'https://wa.me/9660541415099';
$bg_url = get_field('hero_bg') ?: AMAL_ASSETS . '/public/' . rawurlencode('تأسيس شركات.png');

?>

<main id="primary" class="site-main page-main" role="main">

	<section id="hero" class="hero-section" style="background-image: url('<?php echo esc_url($bg_url); ?>');"
		aria-label="<?php esc_attr_e('القسم الرئيسي - تأسيس الشركات', 'amal-malki'); ?>">



		<div class="hero-content container">
			<h1 class="hero-title"><?php echo nl2br(esc_html($title)); ?></h1>
			<p class="hero-subtitle"><?php echo esc_html($subtitle); ?></p>
			<a href="<?php echo esc_url($btn_url); ?>" class="btn btn--primary hero-cta"><?php echo esc_html($btn_text); ?></a>
		</div>

	</section><!-- #hero -->

	<!-- Formation Services Section -->
	<section class="formation-services-section">
		<div class="container">
			<?php $services_title = get_field('services_title') ?: 'خدماتنا في تأسيس الشركات'; ?>
			<h2 class="section-title"><?php echo esc_html($services_title); ?></h2>

			<div class="formation-services-grid">
				<?php
				$default_srvs = [
					1 => ['icon' => 'serv1.png', 'title' => 'تأسيس الشركات', 'desc' => 'تأسيس مختلف أنواع الشركات وفق الأنظمة السعودية'],
					2 => ['icon' => 'serv2.png', 'title' => 'تسجيل الشركات', 'desc' => 'تسجيل الشركات في الجهات الرسمية وإنهاء كافة الإجراءات'],
					3 => ['icon' => 'serv3.png', 'title' => 'إعداد العقود التأسيسية', 'desc' => 'صياغة العقود والنظام الأساسي للشركة باحترافية قانونية'],
					4 => ['icon' => 'serv4.png', 'title' => 'استخراج التراخيص', 'desc' => 'استخراج التراخيص اللازمة لممارسة النشاط التجاري'],
					5 => ['icon' => 'serv5.png', 'title' => 'فتح السجل التجاري', 'desc' => 'فتح السجل التجاري وإتمام جميع المتطلبات النظامية'],
					6 => ['icon' => 'serv6.png', 'title' => 'التعديلات القانونية للشركات', 'desc' => 'إجراء التعديلات القانونية على الشركات وتحديث بياناتها']
				];
				for ($i = 1; $i <= 6; $i++) {
					$icon = get_field("srv_{$i}_icon") ?: AMAL_ASSETS . '/public/' . $default_srvs[$i]['icon'];
					$s_title = get_field("srv_{$i}_title") ?: $default_srvs[$i]['title'];
					$s_desc = get_field("srv_{$i}_desc") ?: $default_srvs[$i]['desc'];
				?>
				<div class="formation-service-card">
					<div class="formation-service-icon">
						<img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($s_title); ?>">
					</div>
					<h3 class="formation-service-title"><?php echo esc_html($s_title); ?></h3>
					<p class="formation-service-desc"><?php echo esc_html($s_desc); ?></p>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<!-- Why Us Section -->
	<section class="why-contract-section">
		<div class="container">
			<div class="why-contract-wrap">
				<?php
				$why_img = get_field('why_us_image') ?: AMAL_ASSETS . '/public/whyus.png';
				$why_title = get_field('why_us_title') ?: 'لماذا تختار المؤسسة القانونية للمستشار آمال المالكي كـ مكتب تأسيس شركات؟';
				$why_desc = get_field('why_us_desc') ?: 'التميز في خدماتنا ينبع من فهمنا العميق لمتطلبات السوق السعودي، ونوفر لك:';
				$why_btn_text = get_field('why_us_btn_text') ?: 'اعرف المزيد عن خدماتنا';
				$why_btn_url = get_field('why_us_btn_url') ?: '#';
				$default_list = [
					'فريق عمل متخصص يوضح شروط تأسيس شركة ذات مسؤولية محدودة في السعودية .',
					'تقديم استشارات استباقية تحمي هيكل الشركة من المشاكل المستقبلية.',
					'القدرة على التعامل مع منصات "مراس" و "قوى" بكفاءة عالية.'
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

	<!-- Companies Types Section -->
	<section class="contract-types-section">
		<div class="container">
			<div class="section-header text-center">
				<?php
				$types_title = get_field('types_title') ?: 'الشركات التي نساعدك في تأسيسها';
				$types_badge = get_field('types_badge') ?: 'أنواع الشركات';
				?>
				<h2 class="section-title" style="color: <?php echo esc_attr($sub1_color); ?>;"><?php echo esc_html($types_title); ?></h2>
				<span class="badge-title"><?php echo esc_html($types_badge); ?></span>
			</div>
			
			<div class="contract-types-grid">
				<?php
				$default_types = [
					1 => ['img' => 'company1.png', 'title' => 'المسؤولية المحدودة', 'desc' => 'فصل الذمة المالية للشركاء عن ذمة الشركة'],
					2 => ['img' => 'company2.png', 'title' => 'المساهمة المبسطة', 'desc' => 'مرونة عالية في الإدارة وجذب الاستثمارات'],
					3 => ['img' => 'company3.png', 'title' => 'فروع الشركات الأجنبية', 'desc' => 'تسهيل دخول المستثمر الأجنبي للسوق السعودي وتراخيص وزارة الاستثمار']
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

	<!-- FAQ Section -->
	<section class="contract-faq-section">
		<div class="container">
			<div class="section-header text-center">
				<?php
				$faq_title = get_field('faq_title') ?: 'الأسئلة الشائعة حول تأسيس الشركات';
				$faq_sub = get_field('faq_subtitle') ?: 'إجابات على أكثر الأسئلة شيوعاً حول خدماتنا';
				?>
				<h2 class="section-title" style="color: <?php echo esc_attr($sub1_color); ?>;"><?php echo esc_html($faq_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($faq_sub); ?></p>
			</div>

			<div class="faq-accordion">
				<?php
				$default_faqs = [
					1 => ['q' => 'كم يستغرق تأسيس شركة في السعودية؟', 'a' => 'يعتمد وقت التأسيس على نوع الشركة واكتمال المستندات المطلوبة، وعادة ما يتم إنجاز الإجراءات في وقت قياسي بفضل تعاملنا المباشر مع المنصات الحكومية.'],
					2 => ['q' => 'ما هي تكلفة مكتب تأسيس شركات؟', 'a' => 'تختلف التكلفة باختلاف نوع الشركة وحجم الأعمال والاستشارات المطلوبة. يمكنك التواصل معنا للحصول على عرض سعر مخصص يلبي احتياجاتك.'],
					3 => ['q' => 'ابدأ رحلتك الاستثمارية اليوم!', 'a' => 'نحن في مكتب المستشار القانوني آمال المالكي جاهزون لتقديم الدعم القانوني الكامل لبدء نشاطك التجاري بنجاح. تواصل معنا الآن عبر الواتساب أو نموذج الاتصال.']
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
