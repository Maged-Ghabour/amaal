<?php
/**
 * Template Name: صياغة العقود
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Specific content for Contract Drafting
$title = 'أفضل محامي صياغة عقود تجارية وتدقيقها في السعودية';
$subtitle = 'تُعد صياغة العقود حجر الزاوية في حماية الحقوق وضمان استدامة الأعمال في المملكة. وفي مكتب المستشار القانوني آمال المالكي نقدم خدمة صياغة عقد شراكة في السعودية بمهنية عالية تضمن لك ولشركائك الوضوح التام والالتزام بالأنظمة المعمول بها';
$btn_text = 'اطلب الخدمة الان';
// Link for CTA, fallback to WhatsApp
$btn_url = function_exists('get_field') && get_field('hero_btn_url') ? get_field('hero_btn_url') : 'https://wa.me/9660541415099';

// Background image from assets/public/
$bg_url = AMAL_ASSETS . '/public/' . rawurlencode('صياغة عقود.png');

?>

<main id="primary" class="site-main page-main" role="main">

	<section id="hero" class="hero-section" style="background-image: url('<?php echo esc_url($bg_url); ?>');"
		aria-label="<?php esc_attr_e('القسم الرئيسي - صياغة العقود', 'amal-malki'); ?>">

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

	<!-- Stats Section -->
	<section class="stats-section">
		<div class="container">
			<div class="stats-grid">
				
				<!-- Stat 1 -->
				<div class="stat-card">
					<div class="stat-icon">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/icon4.png'); ?>" alt="عميل راض">
					</div>
					<div class="stat-number">+200</div>
					<div class="stat-title">عميل راضٍ</div>
					<div class="stat-desc">من الشركات والأفراد</div>
				</div>

				<!-- Stat 2 -->
				<div class="stat-card">
					<div class="stat-icon">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/icon3.png'); ?>" alt="عقد منجز">
					</div>
					<div class="stat-number">+400</div>
					<div class="stat-title">عقد منجز</div>
					<div class="stat-desc">بمختلف التخصصات</div>
				</div>

				<!-- Stat 3 -->
				<div class="stat-card">
					<div class="stat-icon">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/icon2.png'); ?>" alt="سنة خبرة">
					</div>
					<div class="stat-number">+20</div>
					<div class="stat-title">سنة خبرة</div>
					<div class="stat-desc">في المجال القانوني</div>
				</div>

				<!-- Stat 4 -->
				<div class="stat-card">
					<div class="stat-icon">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/icon1.png'); ?>" alt="نسبة الرضا">
					</div>
					<div class="stat-number">%99</div>
					<div class="stat-title">نسبة الرضا</div>
					<div class="stat-desc">من عملائنا</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Why Contract Section -->
	<section class="why-contract-section">
		<div class="container">
			<div class="why-contract-wrap">
				<div class="why-contract-image">
					<img src="<?php echo esc_url(AMAL_ASSETS . '/public/3qwd.png'); ?>" alt="محامي صياغة عقود تجارية">
				</div>
				<div class="why-contract-content" style="padding-inline-end: 0; padding-inline-start: 1rem;">
					<h2 class="why-contract-title">لماذا تحتاج إلى محامي صياغة عقود تجارية؟</h2>
					<p class="why-contract-desc">العقود ليست مجرد أوراق، بل هي درع قانوني يحمي استثماراتك. الاستعانة بمختص يضمن لك:</p>
					<ul class="why-contract-list">
						<li>تجنب الثغرات القانونية التي قد تؤدي إلى نزاعات مستقبلية طويلة الأمد.</li>
						<li>الامتثال التام لنظام الشركات السعودي الجديد وتعديلاته الأخيرة.</li>
						<li>صياغة بنود واضحة للحقوق والالتزامات وتوزيع الأرباح والخسائر.</li>
					</ul>
					<a href="#" class="why-contract-btn">اعرف المزيد عن خدماتنا</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Contracts Types Section -->
	<section class="contract-types-section">
		<div class="container">
			<div class="section-header text-center">
				<h2 class="section-title" style="color: var(--color-gold);">نغطي كافة أنواع التعاقدات</h2>
				<span class="badge-title">أنواع العقود</span>
			</div>
			
			<div class="contract-types-grid">
				
				<!-- Card 1 -->
				<div class="contract-type-card">
					<div class="contract-type-image">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/aqd1.png'); ?>" alt="عقود الشراكة">
					</div>
					<div class="contract-type-body">
						<h3 class="contract-type-title">عقود الشراكة</h3>
						<p class="contract-type-desc">تنظيم العلاقة بين الشركاء وتحديد نسب الحصص وآليات التخارج بوضوح</p>
					</div>
				</div>

				<!-- Card 2 -->
				<div class="contract-type-card">
					<div class="contract-type-image">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/aqd2.png'); ?>" alt="عقود التوريد">
					</div>
					<div class="contract-type-body">
						<h3 class="contract-type-title">عقود التوريد</h3>
						<p class="contract-type-desc">ضمان حقوق الاستلام والتسليم والالتزامات المالية والتعويضات</p>
					</div>
				</div>

				<!-- Card 3 -->
				<div class="contract-type-card">
					<div class="contract-type-image">
						<img src="<?php echo esc_url(AMAL_ASSETS . '/public/aqd3.png'); ?>" alt="عقود الامتياز التجاري">
					</div>
					<div class="contract-type-body">
						<h3 class="contract-type-title">عقود الامتياز التجاري</h3>
						<p class="contract-type-desc">حماية العلامة التجارية وتنظيم حقوق الممنوح والمانح وفق نظام الامتياز</p>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Steps Section -->
	<section class="contract-steps-section">
		<div class="container">
			<div class="section-header text-center">
				<h2 class="section-title" style="color: var(--color-gold);">صياغة عقد الشراكة</h2>
				<p class="section-subtitle">عملية بسيطة وواضحة لضمان حصولك على عقد قانوني احترافي بكل سهولة</p>
			</div>

			<div class="steps-flex">
				
				<!-- Step 1 -->
				<div class="step-item">
					<div class="step-icon-wrap">
						<div class="step-number">1</div>
						<div class="step-icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
						</div>
					</div>
					<h4 class="step-title">طلب الخدمة</h4>
					<p class="step-desc">قدم طلبك وحدد نوع العقد الذي تحتاجه</p>
				</div>

				<!-- Step 2 -->
				<div class="step-item">
					<div class="step-icon-wrap">
						<div class="step-number">2</div>
						<div class="step-icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
						</div>
					</div>
					<h4 class="step-title">دراسة المتطلبات</h4>
					<p class="step-desc">نقوم بدراسة احتياجاتك ومتطلباتك القانونية بدقة</p>
				</div>

				<!-- Step 3 -->
				<div class="step-item">
					<div class="step-icon-wrap">
						<div class="step-number">3</div>
						<div class="step-icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
						</div>
					</div>
					<h4 class="step-title">إعداد وصياغة العقد</h4>
					<p class="step-desc">فريقنا يصيغ العقد وفقاً لأعلى المعايير القانونية</p>
				</div>

				<!-- Step 4 -->
				<div class="step-item">
					<div class="step-icon-wrap">
						<div class="step-number">4</div>
						<div class="step-icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
						</div>
					</div>
					<h4 class="step-title">المراجعة القانونية</h4>
					<p class="step-desc">مراجعة شاملة للتأكد من التوافق القانوني الكامل</p>
				</div>

				<!-- Step 5 -->
				<div class="step-item">
					<div class="step-icon-wrap">
						<div class="step-number">5</div>
						<div class="step-icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
						</div>
					</div>
					<h4 class="step-title">تسليم النسخة النهائية</h4>
					<p class="step-desc">استلم عقدك الجاهز مع الدعم القانوني المستمر</p>
				</div>

			</div>
		</div>
	</section>

	<!-- FAQ Section -->
	<section class="contract-faq-section">
		<div class="container">
			<div class="section-header text-center">
				<h2 class="section-title" style="color: var(--color-gold);">الأسئلة الشائعة حول صياغة العقود التجارية</h2>
				<p class="section-subtitle">إجابات على أكثر الأسئلة شيوعاً حول خدماتنا</p>
			</div>

			<div class="faq-accordion">
				
				<div class="faq-item">
					<button class="faq-btn">
						<span>ما هي أهم البنود في عقد الشراكة؟</span>
						<svg class="faq-icon" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>
					</button>
					<div class="faq-content">
						<p>أهم البنود تشمل تحديد حصص الشركاء، توزيع الأرباح والخسائر، آلية التخارج، وحل النزاعات.</p>
					</div>
				</div>

				<div class="faq-item">
					<button class="faq-btn">
						<span>هل يمكن تعديل العقد بعد التوقيع؟</span>
						<svg class="faq-icon" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>
					</button>
					<div class="faq-content">
						<p>نعم، يمكن تعديل العقد بموافقة جميع الأطراف عبر ملحق عقد يوقع عليه الجميع.</p>
					</div>
				</div>

				<div class="faq-item">
					<button class="faq-btn">
						<span>هل تبحث عن محامي صياغة عقود تجارية موثوق؟</span>
						<svg class="faq-icon" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5" fill="none" stroke="currentColor" stroke-width="2"/></svg>
					</button>
					<div class="faq-content">
						<p>نحن في مكتب المستشار القانوني آمال المالكي نقدم أفضل الخدمات القانونية لضمان حقوقك واستثماراتك.</p>
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

<?php get_footer(); ?>
