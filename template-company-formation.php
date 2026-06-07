<?php
/**
 * Template Name: تأسيس الشركات
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Specific content for Company Formation
$title = 'خدمات تأسيس الشركات في السعودية';
$subtitle = 'تعتبر مرحلة تأسيس الشركات هي الخطوة الاستراتيجية الأهم لأي مستثمر، وفي مكتب المستشار القانوني آمال المالكي نوفر لك دعماً قانونياً متكاملاً لضمان بدء نشاطك التجاري من خلال محامي تأسيس شركات في السعودية يمتلك الخبرة والسرعة في الإنجاز.';
$btn_text = 'اطلب الخدمة الان';
// Link for CTA, fallback to WhatsApp
$btn_url = function_exists('get_field') && get_field('hero_btn_url') ? get_field('hero_btn_url') : 'https://wa.me/9660541415099';

// Background image from assets/public/
$bg_url = AMAL_ASSETS . '/public/' . rawurlencode('تأسيس شركات.png');

?>

<main id="primary" class="site-main page-main" role="main">

	<section id="hero" class="hero-section" style="background-image: url('<?php echo esc_url($bg_url); ?>');"
		aria-label="<?php esc_attr_e('القسم الرئيسي - تأسيس الشركات', 'amal-malki'); ?>">

		<!-- Dark overlay -->
		<div class="hero-overlay" aria-hidden="true"></div>

		<!-- Hero Content -->
		<div class="hero-content container">
			<h1 class="hero-title">
				<?php echo esc_html($title); ?>
			</h1>
			<p class="hero-subtitle">
				<?php echo esc_html($subtitle); ?>
			</p>
			<a href="<?php echo esc_url($btn_url); ?>" class="btn btn--primary hero-cta">
				<?php echo esc_html($btn_text); ?>
			</a>
		</div>

	</section><!-- #hero -->

	<!-- Formation Services Section -->
	<section class="formation-services-section">
		<div class="container">
			<h2 class="section-title">خدماتنا في تأسيس الشركات</h2>

			<div class="formation-services-grid">
				
				<!-- Card 1 -->
				<div class="formation-service-card">
					<div class="formation-service-icon">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/serv1.png'); ?>" alt="تأسيس الشركات">
					</div>
					<h3 class="formation-service-title">تأسيس الشركات</h3>
					<p class="formation-service-desc">تأسيس مختلف أنواع الشركات وفق الأنظمة السعودية</p>
				</div>

				<!-- Card 2 -->
				<div class="formation-service-card">
					<div class="formation-service-icon">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/serv2.png'); ?>" alt="تسجيل الشركات">
					</div>
					<h3 class="formation-service-title">تسجيل الشركات</h3>
					<p class="formation-service-desc">تسجيل الشركات في الجهات الرسمية وإنهاء كافة الإجراءات</p>
				</div>

				<!-- Card 3 -->
				<div class="formation-service-card">
					<div class="formation-service-icon">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/serv3.png'); ?>" alt="إعداد العقود التأسيسية">
					</div>
					<h3 class="formation-service-title">إعداد العقود التأسيسية</h3>
					<p class="formation-service-desc">صياغة العقود والنظام الأساسي للشركة باحترافية قانونية</p>
				</div>

				<!-- Card 4 -->
				<div class="formation-service-card">
					<div class="formation-service-icon">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/serv4.png'); ?>" alt="استخراج التراخيص">
					</div>
					<h3 class="formation-service-title">استخراج التراخيص</h3>
					<p class="formation-service-desc">استخراج التراخيص اللازمة لممارسة النشاط التجاري</p>
				</div>

				<!-- Card 5 -->
				<div class="formation-service-card">
					<div class="formation-service-icon">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/serv5.png'); ?>" alt="فتح السجل التجاري">
					</div>
					<h3 class="formation-service-title">فتح السجل التجاري</h3>
					<p class="formation-service-desc">فتح السجل التجاري وإتمام جميع المتطلبات النظامية</p>
				</div>

				<!-- Card 6 -->
				<div class="formation-service-card">
					<div class="formation-service-icon">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/serv6.png'); ?>" alt="التعديلات القانونية للشركات">
					</div>
					<h3 class="formation-service-title">التعديلات القانونية للشركات</h3>
					<p class="formation-service-desc">إجراء التعديلات القانونية على الشركات وتحديث بياناتها</p>
				</div>

			</div>
		</div>
	</section>

	<!-- Why Us Section -->
	<section class="why-contract-section">
		<div class="container">
			<div class="why-contract-wrap">
				<!-- Image First (Right side in RTL) -->
				<div class="why-contract-image">
					<img src="<?php echo esc_url(AMAL_ASSETS . '/public/whyus.png'); ?>" alt="لماذا تختارنا">
				</div>
				<!-- Content Second (Left side in RTL) -->
				<div class="why-contract-content" style="padding-inline-end: 0; padding-inline-start: 1rem;">
					<h2 class="why-contract-title">لماذا تختار المؤسسة القانونية للمستشار آمال المالكي كـ مكتب تأسيس شركات؟</h2>
					<p class="why-contract-desc">التميز في خدماتنا ينبع من فهمنا العميق لمتطلبات السوق السعودي، ونوفر لك:</p>
					<ul class="why-contract-list">
						<li>فريق عمل متخصص يوضح شروط تأسيس شركة ذات مسؤولية محدودة في السعودية .</li>
						<li>تقديم استشارات استباقية تحمي هيكل الشركة من المشاكل المستقبلية.</li>
						<li>القدرة على التعامل مع منصات "مراس" و "قوى" بكفاءة عالية.</li>
					</ul>
					<a href="#" class="why-contract-btn">اعرف المزيد عن خدماتنا</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Companies Types Section -->
	<section class="contract-types-section">
		<div class="container">
			<div class="section-header text-center">
				<h2 class="section-title" style="color: var(--color-gold);">الشركات التي نساعدك في تأسيسها</h2>
				<span class="badge-title">أنواع الشركات</span>
			</div>
			
			<div class="contract-types-grid">
				
				<!-- Card 1 -->
				<div class="contract-type-card">
					<div class="contract-type-image">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/company1.png'); ?>" alt="المسؤولية المحدودة">
					</div>
					<div class="contract-type-body">
						<h3 class="contract-type-title">المسؤولية المحدودة</h3>
						<p class="contract-type-desc">فصل الذمة المالية للشركاء عن ذمة الشركة</p>
					</div>
				</div>

				<!-- Card 2 -->
				<div class="contract-type-card">
					<div class="contract-type-image">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/company2.png'); ?>" alt="المساهمة المبسطة">
					</div>
					<div class="contract-type-body">
						<h3 class="contract-type-title">المساهمة المبسطة</h3>
						<p class="contract-type-desc">مرونة عالية في الإدارة وجذب الاستثمارات</p>
					</div>
				</div>

				<!-- Card 3 -->
				<div class="contract-type-card">
					<div class="contract-type-image">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/company3.png'); ?>" alt="فروع الشركات الأجنبية">
					</div>
					<div class="contract-type-body">
						<h3 class="contract-type-title">فروع الشركات الأجنبية</h3>
						<p class="contract-type-desc">تسهيل دخول المستثمر الأجنبي للسوق السعودي وتراخيص وزارة الاستثمار</p>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- FAQ Section -->
	<section class="contract-faq-section">
		<div class="container">
			<div class="section-header text-center">
				<h2 class="section-title" style="color: var(--color-gold);">الأسئلة الشائعة حول تأسيس الشركات</h2>
				<p class="section-subtitle">إجابات على أكثر الأسئلة شيوعاً حول خدماتنا</p>
			</div>

			<div class="faq-accordion">
				
				<div class="faq-item">
					<button class="faq-btn">
						<span>كم يستغرق تأسيس شركة في السعودية؟</span>
						<svg class="faq-icon" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>
					</button>
					<div class="faq-content">
						<p>يعتمد وقت التأسيس على نوع الشركة واكتمال المستندات المطلوبة، وعادة ما يتم إنجاز الإجراءات في وقت قياسي بفضل تعاملنا المباشر مع المنصات الحكومية.</p>
					</div>
				</div>

				<div class="faq-item">
					<button class="faq-btn">
						<span>ما هي تكلفة مكتب تأسيس شركات؟</span>
						<svg class="faq-icon" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>
					</button>
					<div class="faq-content">
						<p>تختلف التكلفة باختلاف نوع الشركة وحجم الأعمال والاستشارات المطلوبة. يمكنك التواصل معنا للحصول على عرض سعر مخصص يلبي احتياجاتك.</p>
					</div>
				</div>

				<div class="faq-item">
					<button class="faq-btn">
						<span>ابدأ رحلتك الاستثمارية اليوم!</span>
						<svg class="faq-icon" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>
					</button>
					<div class="faq-content">
						<p>نحن في مكتب المستشار القانوني آمال المالكي جاهزون لتقديم الدعم القانوني الكامل لبدء نشاطك التجاري بنجاح. تواصل معنا الآن عبر الواتساب أو نموذج الاتصال.</p>
					</div>
				</div>

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
					
					// Toggle active class
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

	<!-- Page Content -->
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="container page-content-wrap" style="padding: 40px 15px;">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article entry-content' ); ?>>
				<?php the_content(); ?>
			</article>
		</div>
	<?php endwhile; ?>

</main><!-- #primary -->

<?php
get_footer();
