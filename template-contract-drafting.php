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

		<div class="hero-overlay" aria-hidden="true"></div>

		<div class="hero-content container">
			<h1 class="hero-title"><?php echo nl2br(esc_html($title)); ?></h1>
			<p class="hero-subtitle"><?php echo esc_html($subtitle); ?></p>
			<a href="<?php echo esc_url($btn_url); ?>" class="btn btn--primary hero-cta"><?php echo esc_html($btn_text); ?></a>
		</div>
	</section>

	<!-- Stats Section -->
	<section class="stats-section">
		<div class="container">
			<div class="stats-grid">
				<?php 
				$default_stats = [
					1 => ['icon' => 'icon4.png', 'num' => '+200', 'title' => 'عميل راضٍ', 'desc' => 'من الشركات والأفراد'],
					2 => ['icon' => 'icon3.png', 'num' => '%98', 'title' => 'نسبة النجاح', 'desc' => 'في حسم النزاعات العمالية'],
					3 => ['icon' => 'icon2.png', 'num' => '+15', 'title' => 'خبير قانوني', 'desc' => 'متخصصون في القضايا العمالية'],
					4 => ['icon' => 'icon1.png', 'num' => '+10', 'title' => 'سنوات خبرة', 'desc' => 'في تقديم الاستشارات القانونية']
				];
				for ($i = 1; $i <= 4; $i++) {
					$icon = get_field("stat_{$i}_icon") ?: AMAL_ASSETS . '/public/' . $default_stats[$i]['icon'];
					$num = get_field("stat_{$i}_number") ?: $default_stats[$i]['num'];
					$s_title = get_field("stat_{$i}_title") ?: $default_stats[$i]['title'];
					$s_desc = get_field("stat_{$i}_desc") ?: $default_stats[$i]['desc'];
				?>
				<div class="stat-card">
					<div class="stat-icon"><img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($s_title); ?>"></div>
					<div class="stat-number"><?php echo esc_html($num); ?></div>
					<div class="stat-title"><?php echo esc_html($s_title); ?></div>
					<div class="stat-desc"><?php echo esc_html($s_desc); ?></div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<!-- Why Contract Section -->
	<section class="why-contract-section">
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
				<div class="why-contract-image">
					<img src="<?php echo esc_url($why_img); ?>" alt="<?php echo esc_attr($why_title); ?>">
				</div>
				<div class="why-contract-content" style="padding-inline-end: 0; padding-inline-start: 1rem;">
					<h2 class="why-contract-title"><?php echo esc_html($why_title); ?></h2>
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
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($types_title); ?></h2>
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
	<section class="contract-steps-section">
		<div class="container">
			<div class="section-header text-center">
				<?php
				$steps_title = get_field('steps_title') ?: 'خطواتنا في إعداد وتدقيق العقود';
				$steps_sub = get_field('steps_subtitle') ?: 'نعتمد منهجية واضحة تضمن لك عقوداً مُحكمة تحمي أعمالك من كافة الجوانب القانونية';
				?>
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($steps_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($steps_sub); ?></p>
			</div>

			<div class="steps-flex">
				<?php
				$default_steps = [
					1 => ['title' => 'الاستشارة الأولية ودراسة المتطلبات', 'desc' => 'نجتمع معك لفهم طبيعة الصفقة التجارية والأهداف المرجوة من العقد.'],
					2 => ['title' => 'تحديد المخاطر والالتزامات', 'desc' => 'نحلل الجوانب القانونية والتجارية لتحديد المخاطر المحتملة والالتزامات الضرورية.'],
					3 => ['title' => 'صياغة المسودة الأولى', 'desc' => 'يقوم خبراؤنا بصياغة المسودة الأولى للعقد مع مراعاة كافة الأنظمة المعمول بها.'],
					4 => ['title' => 'المراجعة والتعديل المشترك', 'desc' => 'نناقش المسودة معك لإبداء الملاحظات والتعديلات اللازمة قبل الاعتماد النهائي.'],
					5 => ['title' => 'التدقيق النهائي والتسليم', 'desc' => 'مراجعة لغوية وقانونية أخيرة لضمان خلو العقد من أي ثغرات وتسليمه جاهزاً للتوقيع.']
				];
				for ($i = 1; $i <= 5; $i++) {
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
	<section class="contract-faq-section">
		<div class="container">
			<div class="section-header text-center">
				<?php
				$faq_title = get_field('faq_title') ?: 'الأسئلة الشائعة حول صياغة العقود';
				$faq_sub = get_field('faq_subtitle') ?: 'إجابات على أكثر الأسئلة شيوعاً حول خدماتنا';
				?>
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($faq_title); ?></h2>
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
