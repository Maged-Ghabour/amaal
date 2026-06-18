<?php
/**
 * Template Name: متابعة قضايا الاستئناف
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Specific content for Appeals (with ACF fallbacks)
$title = get_field('hero_title') ?: 'نقض واستئناف في السعودية من مكتب المستشار القانوني آمال المالكي';
$subtitle = get_field('hero_subtitle') ?: 'صدور حكم ابتدائي ليس نهاية المطاف! الاعتراض على الأحكام والمطالبة بالنقض في السعودية من أبرز ما يقدمه مكتب المستشار القانوني آمال المالكي متخصص في تحليل الأحكام واستنباط الأخطاء القانونية لتقديم لوائح اعتراضية قوية تضمن إعادة النظر في الحكم.';
$btn_text = get_field('hero_btn_text') ?: 'اطلب الخدمة الان';
$btn_url = get_field('hero_btn_url') ?: 'https://wa.me/9660541415099';
$bg_url = get_field('hero_bg') ?: AMAL_ASSETS . '/public/company1.png'; // Fallback

?>

<main id="primary" class="site-main page-main" role="main">

	<section id="hero" class="hero-section" style="background-image: url('<?php echo esc_url($bg_url); ?>');"
		aria-label="<?php esc_attr_e('القسم الرئيسي - الاستئناف والنقض', 'amal-malki'); ?>">



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
				$why_title = get_field('why_us_title') ?: 'لماذا تحتاج إلى محامي نقض واستئناف في السعودية؟';
				$why_sub = get_field('why_us_subtitle') ?: 'مرحلة الاستئناف والنقض تتطلب دقة متناهية وفهماً عميقاً لنصوص النظام، حيث نقوم بـ:';
				$why_desc = get_field('why_us_desc') ?: '';
				$why_btn_text = get_field('why_us_btn_text') ?: 'اعرف المزيد عن خدماتنا';
				$why_btn_url = get_field('why_us_btn_url') ?: '#';
				$default_list = [
					'مراجعة دقيقة للحكم الصادر والتأكد من مطابقته للأنظمة الشرعية والنظامية.',
					'رصد الأخطاء الإجرائية أو في تطبيق القانون التي وقعت فيها محكمة الدرجة الأولى.',
					'صياغة لوائح اعتراضية قوية ترتكز على أسانيد قانونية وشرعية متينة.'
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
				$types_title = get_field('types_title') ?: 'خدماتنا في قضايا الاستئناف والنقض';
				$types_sub = get_field('types_subtitle') ?: 'خبرة قانونية دقيقة تضمن لموكلينا أقوى أداء أمام محكمة النقض.';
				?>
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($types_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($types_sub); ?></p>
			</div>
			
			<div class="contract-types-grid">
				<?php
				$default_types = [
					1 => ['img' => 'certificate1.png', 'title' => 'التماس إعادة النظر', 'desc' => 'تقديم طلب إعادة النظر في الأحكام النهائية بناءً على وقائع جديدة.'],
					2 => ['img' => 'aqd1.png', 'title' => 'المحكمة العليا (النقض)', 'desc' => 'رفع دعوى نقض للمحكمة العليا إذا شاب الحكم مخالفة للنظام أو خطأ في تطبيقه.'],
					3 => ['img' => 'certificate2.png', 'title' => 'محكمة الاستئناف', 'desc' => 'الاعتراض على الأحكام الابتدائية في قضايا تجارية وعمالية وأحوال شخصية أمام المحاكم.']
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
				$steps_title = get_field('steps_title') ?: 'مميزات التعامل في قضايا النقض';
				$steps_sub = get_field('steps_subtitle') ?: 'مكتب المستشار القانوني آمال المالكي خيارك الأفضل في قضايا الاستئناف والنقض في السعودية للأسباب التالية:';
				?>
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($steps_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($steps_sub); ?></p>
			</div>

			<div class="steps-flex">
				<?php
				$default_steps = [
					1 => ['title' => 'خبرة قانونية متخصصة', 'desc' => 'فريقنا يضم نخبة من المستشارين متخصصين في صياغة اللوائح الاعتراضية ومذكرات النقض.'],
					2 => ['title' => 'الالتزام بالمواعيد النظامية', 'desc' => 'الالتزام التام بالمدة المحددة للاعتراض لتجنب رفض الدعوى.'],
					3 => ['title' => 'الشفافية في تقييم القضايا', 'desc' => 'الشفافية التامة في تقييم مدى توافر أي أسباب لقبول النقض أو الاستئناف.']
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
				$faq_title = get_field('faq_title') ?: 'الأسئلة الشائعة حول الاستئناف والنقض';
				$faq_sub = get_field('faq_subtitle') ?: 'إجابات على أكثر الأسئلة شيوعاً حول خدماتنا';
				?>
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($faq_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($faq_sub); ?></p>
			</div>

			<div class="faq-accordion">
				<?php
				$default_faqs = [
					1 => ['q' => 'كم مدة الاستئناف في السعودية؟', 'a' => 'مدة الاستئناف هي 30 يوماً من تاريخ استلام الصك، وتتقلص إلى 10 أيام في القضايا المستعجلة.'],
					2 => ['q' => 'هل يمكن تقديم أدلة جديدة في مرحلة الاستئناف؟', 'a' => 'نعم، يجوز تقديم أدلة أو دفوع جديدة لم يسبق تقديمها في محكمة الدرجة الأولى.'],
					3 => ['q' => 'متى يكون الحكم نهائياً؟', 'a' => 'يصبح الحكم نهائياً إذا لم يتم تقديم اعتراض خلال المدة النظامية، أو بعد تأييده من محكمة الاستئناف.']
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
