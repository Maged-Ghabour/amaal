<?php
/**
 * Template Name: إعداد الدعاوى القضائية
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Specific content for Lawsuits Preparation (with ACF fallbacks)
$title = get_field('hero_title') ?: 'استشارة قانونية لرفع دعاوي وإعداد صحف الدعوى';
$subtitle = get_field('hero_subtitle') ?: 'إعداد صحائف الدعوى من خلال أحدث الأساليب التكنولوجية من شأنها تيسير وتسهيل العمل، وفي مكتب المستشار القانوني آمال المالكي يقدم فريقنا القانوني المختص أفضل الاستشارات على مستوى إعداد صحائف الدعوى وأنواع القضايا العمالية والتجارية في المملكة.';
$btn_text = get_field('hero_btn_text') ?: 'اطلب الخدمة الان';
$btn_url = get_field('hero_btn_url') ?: 'https://wa.me/9660541415099';
$bg_url = get_field('hero_bg') ?: AMAL_ASSETS . '/public/' . rawurlencode('إعداد الدعاوى القضائية.png');

?>

<main id="primary" class="site-main page-main" role="main">

	<section id="hero" class="hero-section" style="background-image: url('<?php echo esc_url($bg_url); ?>');"
		aria-label="<?php esc_attr_e('القسم الرئيسي - إعداد الدعاوى', 'amal-malki'); ?>">

		<div class="hero-overlay" aria-hidden="true"></div>

		<div class="hero-content container">
			<h1 class="hero-title"><?php echo esc_html($title); ?></h1>
			<p class="hero-subtitle"><?php echo esc_html($subtitle); ?></p>
			<a href="<?php echo esc_url($btn_url); ?>" class="btn btn--primary hero-cta"><?php echo esc_html($btn_text); ?></a>
		</div>

	</section><!-- #hero -->

	<!-- Why Us Section -->
	<section class="why-contract-section" style="padding-top: 5rem;">
		<div class="container">
			<div class="why-contract-wrap">
				<?php
				$why_img = get_field('why_us_image') ?: AMAL_ASSETS . '/public/edadda3wa.png';
				$why_title = get_field('why_us_title') ?: 'أهمية الحصول على استشارة قانونية لرفع دعاوي؟';
				$why_sub = get_field('why_us_subtitle') ?: 'قبل التوجه للمحكمة يجب التأكد من سلامة موقفك القانوني';
				$why_desc = get_field('why_us_desc') ?: 'نحن نساعدك في:';
				$why_btn_text = get_field('why_us_btn_text') ?: 'اعرف المزيد عن خدماتنا';
				$why_btn_url = get_field('why_us_btn_url') ?: '#';
				$default_list = [
					'تحديد الاختصاص المكاني الصحيح للدعوى (محكمة عامة، تجارية، أحوال شخصية).',
					'صياغة صحيفة الدعوى بأسلوب قانوني يضمن قبولها شكلاً وموضوعاً.',
					'جمع وترتيب الأدلة والبينات اللازمة لتقوية ملف القضية.'
				];
				?>
				<div class="why-contract-image">
					<img src="<?php echo esc_url($why_img); ?>" alt="<?php echo esc_attr($why_title); ?>">
				</div>
				<div class="why-contract-content" style="padding-inline-end: 0; padding-inline-start: 1rem;">
					<h2 class="why-contract-title" style="font-size: 1.8rem; line-height: 1.4;"><?php echo esc_html($why_title); ?></h2>
					<p class="why-contract-desc" style="color: var(--color-gold); font-weight: bold; margin-bottom: 0.5rem;"><?php echo esc_html($why_sub); ?></p>
					<p class="why-contract-desc" style="color: var(--color-dark); font-weight: bold;"><?php echo esc_html($why_desc); ?></p>
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
				$types_title = get_field('types_title') ?: 'تخصصنا في اعداد دعاوي الاحوال الشخصية';
				$types_sub = get_field('types_subtitle') ?: 'نظراً لحساسية هذه القضايا، نوفر فريقاً متخصصاً يهتم بـ:';
				?>
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($types_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($types_sub); ?></p>
			</div>
			
			<div class="contract-types-grid">
				<?php
				$default_types = [
					1 => ['img' => 'edadda3wa3.png', 'title' => 'دعوى الحضانة والنفقة', 'desc' => 'إعداد مذكرات قانونية تحفظ حقوق الأبناء واستقرار الأسرة.'],
					2 => ['img' => 'edadda3wa2.png', 'title' => 'دعاوى المواريث والتركات', 'desc' => 'قسمة التركات وحصر الورثة والمطالبة بالحقوق الشرعية.'],
					3 => ['img' => 'edadda3wa1.png', 'title' => 'دعوى الفسخ والخلع', 'desc' => 'تجهيز ملفات قوية ومتابعة الأمور القانونية بسرية تامة.']
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
				$steps_title = get_field('steps_title') ?: 'خطواتنا في إعداد الدعاوى القضائية';
				$steps_sub = get_field('steps_subtitle') ?: 'نعتمد منهجية احترافية تضمن قوة موقفك القانوني وتجنب رد الدعوى:';
				?>
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($steps_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($steps_sub); ?></p>
			</div>

			<div class="steps-flex">
				<?php
				$default_steps = [
					1 => ['title' => 'الاستشارة القانونية الأولية', 'desc' => 'جلسة استماع لفهم وقائع النزاع وتقييم الموقف القانوني للعميل.'],
					2 => ['title' => 'دراسة القضية وتحليل المستندات', 'desc' => 'مراجعة كافة الأوراق والأدلة وتحديد السند النظامي والشرعي.'],
					3 => ['title' => 'إعداد وصياغة الدعوى إلكترونياً', 'desc' => 'إعداد صحيفة الدعوى وتقديمها عبر منصة ناجز وربطها بالأسانيد القانونية.']
				];
				for ($i = 1; $i <= 3; $i++) {
					$st_title = get_field("step_{$i}_title") ?: $default_steps[$i]['title'];
					$st_desc = get_field("step_{$i}_desc") ?: $default_steps[$i]['desc'];
				?>
				<div class="step-item">
					<div class="step-icon-wrap">
						<?php 
						$st_icon = get_field("step_{$i}_icon");
						if ($st_icon) : ?>
							<div class="step-icon">
								<img src="<?php echo esc_url($st_icon); ?>" alt="<?php echo esc_attr($st_title); ?>">
							</div>
						<?php else : ?>
							<div class="step-number"><?php echo $i; ?></div>
						<?php endif; ?>
					</div>
					<h4 class="step-title"><?php echo esc_html($st_title); ?></h4>
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
				$faq_title = get_field('faq_title') ?: 'الأسئلة الشائعة حول إعداد الدعاوى';
				$faq_sub = get_field('faq_subtitle') ?: 'إجابات على أكثر الأسئلة شيوعاً حول خدماتنا';
				?>
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($faq_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($faq_sub); ?></p>
			</div>

			<div class="faq-accordion">
				<?php
				$default_faqs = [
					1 => ['q' => 'كيف يتم تقديم صحيفة الدعوى؟', 'a' => 'يتم تقديم صحيفة الدعوى إلكترونياً عبر منصة ناجز التابعة لوزارة العدل، مع إرفاق كافة المستندات والأدلة الداعمة بشكل منظم.'],
					2 => ['q' => 'هل أحتاج لمحام من بداية النزاع؟', 'a' => 'نعم، الاستعانة بمحامٍ متخصص من البداية يضمن صياغة الدعوى بشكل صحيح قانونياً، مما يوفر الوقت والجهد ويزيد من احتمالية كسب القضية.'],
					3 => ['q' => 'اسعار مذكرات الردود؟', 'a' => 'تعتمد أسعار إعداد المذكرات على تعقيد القضية وحجم المستندات التي تتطلب الدراسة. يمكنك التواصل معنا للحصول على تقييم مبدئي وعرض سعر.']
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
