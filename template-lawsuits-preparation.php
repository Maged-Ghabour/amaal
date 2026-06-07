<?php
/**
 * Template Name: إعداد الدعاوى القضائية
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Specific content for Lawsuits Preparation
$title = 'استشارة قانونية لرفع دعاوي وإعداد صحف الدعوى';
$subtitle = 'إعداد صحائف الدعوى من خلال أحدث الأساليب التكنولوجية من شأنها تيسير وتسهيل العمل، وفي مكتب المستشار القانوني آمال المالكي يقدم فريقنا القانوني المختص أفضل الاستشارات على مستوى إعداد صحائف الدعوى وأنواع القضايا العمالية والتجارية في المملكة.';
$btn_text = 'اطلب الخدمة الان';
// Link for CTA, fallback to WhatsApp
$btn_url = function_exists('get_field') && get_field('hero_btn_url') ? get_field('hero_btn_url') : 'https://wa.me/9660541415099';

// Background image from assets/public/
$bg_url = AMAL_ASSETS . '/public/' . rawurlencode('إعداد الدعاوى القضائية.png');

?>

<main id="primary" class="site-main page-main" role="main">

	<section id="hero" class="hero-section" style="background-image: url('<?php echo esc_url($bg_url); ?>');"
		aria-label="<?php esc_attr_e('القسم الرئيسي - إعداد الدعاوى', 'amal-malki'); ?>">

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

	<!-- Why Us Section -->
	<section class="why-contract-section" style="padding-top: 5rem;">
		<div class="container">
			<div class="why-contract-wrap">
				<!-- Image First (Right side in RTL) -->
				<div class="why-contract-image">
					<img src="<?php echo esc_url(AMAL_ASSETS . '/public/edadda3wa.png'); ?>" alt="أهمية الاستشارة القانونية">
				</div>
				<!-- Content Second (Left side in RTL) -->
				<div class="why-contract-content" style="padding-inline-end: 0; padding-inline-start: 1rem;">
					<h2 class="why-contract-title" style="font-size: 1.8rem; line-height: 1.4;">أهمية الحصول على استشارة قانونية لرفع دعاوي؟</h2>
					<p class="why-contract-desc" style="color: var(--color-gold); font-weight: bold; margin-bottom: 0.5rem;">قبل التوجه للمحكمة يجب التأكد من سلامة موقفك القانوني</p>
					<p class="why-contract-desc" style="color: var(--color-dark); font-weight: bold;">نحن نساعدك في:</p>
					<ul class="why-contract-list">
						<li>تحديد الاختصاص المكاني الصحيح للدعوى (محكمة عامة، تجارية، أحوال شخصية).</li>
						<li>صياغة صحيفة الدعوى بأسلوب قانوني يضمن قبولها شكلاً وموضوعاً.</li>
						<li>جمع وترتيب الأدلة والبينات اللازمة لتقوية ملف القضية.</li>
					</ul>
					<a href="#" class="why-contract-btn">اعرف المزيد عن خدماتنا</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Specialization Types Section -->
	<section class="contract-types-section" style="background: var(--color-white);">
		<div class="container">
			<div class="section-header text-center">
				<h2 class="section-title" style="color: var(--color-gold);">تخصصنا في اعداد دعاوي الاحوال الشخصية</h2>
				<p class="section-subtitle">نظراً لحساسية هذه القضايا، نوفر فريقاً متخصصاً يهتم بـ:</p>
			</div>
			
			<div class="contract-types-grid">
				
				<!-- Card 1 (Right) -->
				<div class="contract-type-card" style="background: var(--color-off-white);">
					<div class="contract-type-image">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/edadda3wa3.png'); ?>" alt="دعوى الحضانة والنفقة">
					</div>
					<div class="contract-type-body">
						<h3 class="contract-type-title">دعوى الحضانة والنفقة</h3>
						<p class="contract-type-desc">إعداد مذكرات قانونية تحفظ حقوق الأبناء واستقرار الأسرة.</p>
					</div>
				</div>

				<!-- Card 2 (Middle) -->
				<div class="contract-type-card" style="background: var(--color-off-white);">
					<div class="contract-type-image">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/edadda3wa2.png'); ?>" alt="دعاوى المواريث والتركات">
					</div>
					<div class="contract-type-body">
						<h3 class="contract-type-title">دعاوى المواريث والتركات</h3>
						<p class="contract-type-desc">قسمة التركات وحصر الورثة والمطالبة بالحقوق الشرعية.</p>
					</div>
				</div>

				<!-- Card 3 (Left) -->
				<div class="contract-type-card" style="background: var(--color-off-white);">
					<div class="contract-type-image">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/edadda3wa1.png'); ?>" alt="دعوى الفسخ والخلع">
					</div>
					<div class="contract-type-body">
						<h3 class="contract-type-title">دعوى الفسخ والخلع</h3>
						<p class="contract-type-desc">تجهيز ملفات قوية ومتابعة الأمور القانونية بسرية تامة.</p>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Steps Section (3 Steps) -->
	<section class="contract-steps-section" style="background: var(--color-white); padding-top: 2rem;">
		<div class="container">
			<div class="section-header text-center">
				<h2 class="section-title" style="color: var(--color-gold);">خطواتنا في إعداد الدعاوى القضائية</h2>
				<p class="section-subtitle">نعتمد منهجية احترافية تضمن قوة موقفك القانوني وتجنب رد الدعوى:</p>
			</div>

			<div class="steps-flex">
				
				<!-- Step 1 -->
				<div class="step-item">
					<div class="step-icon-wrap">
						<div class="step-number" style="top: 20px; right: 50%; width: 40px; height: 40px; font-size: 1.4rem;">1</div>
						<div class="step-icon" style="background: transparent; border: none; box-shadow: none;"></div>
					</div>
					<h4 class="step-title" style="margin-top: -10px;">الاستشارة القانونية الأولية</h4>
					<p class="step-desc">جلسة استماع لفهم وقائع النزاع وتقييم الموقف القانوني للعميل.</p>
				</div>

				<!-- Step 2 -->
				<div class="step-item">
					<div class="step-icon-wrap">
						<div class="step-number" style="top: 20px; right: 50%; width: 40px; height: 40px; font-size: 1.4rem;">2</div>
						<div class="step-icon" style="background: transparent; border: none; box-shadow: none;"></div>
					</div>
					<h4 class="step-title" style="margin-top: -10px;">دراسة القضية وتحليل المستندات</h4>
					<p class="step-desc">مراجعة كافة الأوراق والأدلة وتحديد السند النظامي والشرعي.</p>
				</div>

				<!-- Step 3 -->
				<div class="step-item">
					<div class="step-icon-wrap">
						<div class="step-number" style="top: 20px; right: 50%; width: 40px; height: 40px; font-size: 1.4rem;">3</div>
						<div class="step-icon" style="background: transparent; border: none; box-shadow: none;"></div>
					</div>
					<h4 class="step-title" style="margin-top: -10px;">إعداد وصياغة الدعوى إلكترونياً</h4>
					<p class="step-desc">إعداد صحيفة الدعوى وتقديمها عبر منصة ناجز وربطها بالأسانيد القانونية.</p>
				</div>

			</div>
		</div>
	</section>

	<!-- FAQ Section -->
	<section class="contract-faq-section" style="background: var(--color-white); padding-top: 0;">
		<div class="container">
			<div class="section-header text-center">
				<h2 class="section-title" style="color: var(--color-gold);">الأسئلة الشائعة حول إعداد الدعاوى</h2>
				<p class="section-subtitle">إجابات على أكثر الأسئلة شيوعاً حول خدماتنا</p>
			</div>

			<div class="faq-accordion">
				
				<div class="faq-item">
					<button class="faq-btn">
						<span>كيف يتم تقديم صحيفة الدعوى؟</span>
						<svg class="faq-icon" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>
					</button>
					<div class="faq-content">
						<p>يتم تقديم صحيفة الدعوى إلكترونياً عبر منصة ناجز التابعة لوزارة العدل، مع إرفاق كافة المستندات والأدلة الداعمة بشكل منظم.</p>
					</div>
				</div>

				<div class="faq-item">
					<button class="faq-btn">
						<span>هل أحتاج لمحام من بداية النزاع؟</span>
						<svg class="faq-icon" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>
					</button>
					<div class="faq-content">
						<p>نعم، الاستعانة بمحامٍ متخصص من البداية يضمن صياغة الدعوى بشكل صحيح قانونياً، مما يوفر الوقت والجهد ويزيد من احتمالية كسب القضية.</p>
					</div>
				</div>

				<div class="faq-item">
					<button class="faq-btn">
						<span>اسعار مذكرات الردود؟</span>
						<svg class="faq-icon" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>
					</button>
					<div class="faq-content">
						<p>تعتمد أسعار إعداد المذكرات على تعقيد القضية وحجم المستندات التي تتطلب الدراسة. يمكنك التواصل معنا للحصول على تقييم مبدئي وعرض سعر.</p>
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
