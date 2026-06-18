<?php
/**
 * Template Name: خدمات التوثيق
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Specific content for Notarization Services (with ACF fallbacks)
$title = get_field('hero_title') ?: 'محامي توثيق عقود الشركات في جدة والسعودية';
$subtitle = get_field('hero_subtitle') ?: 'توثيق العقود القانونية هو الخطوة الأولى في حماية حقوقك. نحن في مكتب المستشار القانوني آمال المالكي نقدم خدمة التوثيق القانوني بأسلوب دقيق يحفظ حقوق الشركات ورجال الأعمال.';
$btn_text = get_field('hero_btn_text') ?: 'اطلب الخدمة الان';
$btn_url = get_field('hero_btn_url') ?: 'https://wa.me/9660541415099';
$bg_url = get_field('hero_bg') ?: AMAL_ASSETS . '/public/company1.png'; // Fallback

?>

<main id="primary" class="site-main page-main" role="main">

	<section id="hero" class="hero-section" style="background-image: url('<?php echo esc_url($bg_url); ?>');"
		aria-label="<?php esc_attr_e('القسم الرئيسي - التوثيق', 'amal-malki'); ?>">



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
				$why_title = get_field('why_us_title') ?: 'أهمية الاستعانة بـ محامي توثيق عقود الشركات في جدة؟';
				$why_sub = get_field('why_us_subtitle') ?: 'التوثيق ليس مجرد ختم بل هو إقرار بصحة الأوراق القانونية للشركات. نحن نساعدك في:';
				$why_desc = get_field('why_us_desc') ?: '';
				$why_btn_text = get_field('why_us_btn_text') ?: 'اعرف المزيد عن خدماتنا';
				$why_btn_url = get_field('why_us_btn_url') ?: '#';
				$default_list = [
					'إثبات صحة التوقيعات على الاتفاقيات والعقود الخاصة.',
					'توثيق الوكالات التجارية وتصريحات الإدارة.'
				];
				?>
				<div class="why-contract-image">
					<img src="<?php echo esc_url($why_img); ?>" alt="<?php echo esc_attr($why_title); ?>">
				</div>
				<div class="why-contract-content" style="padding-inline-end: 0; padding-inline-start: 1rem;">
					<h2 class="why-contract-title" style="font-size: 1.8rem; line-height: 1.4;"><?php echo esc_html($why_title); ?></h2>
					<?php if ($why_sub): ?>
						<p class="why-contract-desc" style="color: var(--color-gold); font-weight: bold; margin-bottom: 0.5rem;"><?php echo esc_html($why_sub); ?></p>
					<?php endif; ?>
					<?php if ($why_desc): ?>
						<p class="why-contract-desc" style="color: var(--color-dark); font-weight: bold;"><?php echo esc_html($why_desc); ?></p>
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
				$types_title = get_field('types_title') ?: 'خدماتنا في توثيق عقود الشركات';
				$types_sub = get_field('types_subtitle') ?: 'نغطي كافة احتياجات الشركات في جدة والمملكة بشكل عام.';
				?>
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($types_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($types_sub); ?></p>
			</div>
			
			<div class="contract-types-grid">
				<?php
				$default_types = [
					1 => ['img' => 'certificate1.png', 'title' => 'توثيق عقود التأسيس', 'desc' => 'إصدار وتوثيق العقود وتعديلاتها قانونياً.'],
					2 => ['img' => 'aqd1.png', 'title' => 'أعمال الملكية', 'desc' => 'ضمان انتقال الملكية وتوثيق السندات لضمان الحقوق.'],
					3 => ['img' => 'certificate2.png', 'title' => 'التوثيق التجاري للشركات', 'desc' => 'إقرار واعتماد وتوثيق العقود التجارية للشركات الكبرى.']
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
				$steps_title = get_field('steps_title') ?: 'لماذا مكتب المستشار القانوني آمال المالكي للتوثيق القانوني؟';
				$steps_sub = get_field('steps_subtitle') ?: 'إعداد قانوني دقيق يضمن قوة الدعوى بشكل يضمن حقوقك خلال التنفيذ.';
				?>
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($steps_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($steps_sub); ?></p>
			</div>

			<div class="steps-flex">
				<?php
				$default_steps = [
					1 => ['title' => 'إنجاز قانوني باحترافية عالية', 'desc' => 'سرعة ودقة في التعامل مع توثيق عقود وتعديلات الشركات في وقت قياسي.'],
					2 => ['title' => 'مرونة في إجراءات التوثيق', 'desc' => 'القدرة على إنهاء الإجراءات حضورياً أو إلكترونياً بما يناسب وقت العميل.'],
					3 => ['title' => 'توثيق متوافق مع الأنظمة السعودية', 'desc' => 'التأكد من مطابقة جميع المواد وتوثيقها لكافة الأنظمة المعمول بها في السعودية.']
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
				$faq_title = get_field('faq_title') ?: 'الأسئلة الشائعة حول توثيق العقود';
				$faq_sub = get_field('faq_subtitle') ?: 'إجابات على أكثر الأسئلة شيوعاً حول خدماتنا';
				?>
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($faq_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($faq_sub); ?></p>
			</div>

			<div class="faq-accordion">
				<?php
				$default_faqs = [
					1 => ['q' => 'هل التوثيق الإلكتروني معتمد؟', 'a' => 'نعم، التوثيق الإلكتروني عبر منصة الموثق معتمد رسمياً من وزارة العدل وله نفس الحجية القانونية.'],
					2 => ['q' => 'ما هي الأوراق المطلوبة لتوثيق عقد شركة؟', 'a' => 'يطلب السجل التجاري، وهويات الشركاء، وعقد التأسيس المراد توثيقه أو تعديله، وأي قرارات جمعية عمومية إن وجدت.'],
					3 => ['q' => 'هل يمكن توثيق عقود التأسيس إلكترونياً؟', 'a' => 'نعم، يمكن توثيق عقود تأسيس الشركات وملحق التعديل إلكترونياً عبر خدمة الموثق بكل سهولة وموثوقية.']
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
