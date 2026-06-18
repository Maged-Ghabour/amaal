<?php
/**
 * Template Name: المذكرات الجوابية
 *
 * @package AmalMalki
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Specific content for Memos (with ACF fallbacks)
$title = get_field('hero_title') ?: 'كتابة مذكرة جوابية في دعوي تجارية بالسعودية';
$subtitle = get_field('hero_subtitle') ?: 'تعتبر كتابة مذكرة جوابية من أهم الخطوات للحفاظ على حقوقك ومواجهة خصمك في الدعوى. نحن في مكتب المستشار القانوني آمال المالكي نقدم أفضل الحلول لصياغة المذكرات الجوابية التي تدعم موقفك أمام القضاء.';
$btn_text = get_field('hero_btn_text') ?: 'اطلب الخدمة الان';
$btn_url = get_field('hero_btn_url') ?: 'https://wa.me/9660541415099';
$bg_url = get_field('hero_bg') ?: AMAL_ASSETS . '/public/' . rawurlencode('مذكرة جوابية.png');

?>

<main id="primary" class="site-main page-main" role="main">

	<section id="hero" class="hero-section" style="background-image: url('<?php echo esc_url($bg_url); ?>');"
		aria-label="<?php esc_attr_e('القسم الرئيسي - المذكرات الجوابية', 'amal-malki'); ?>">



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
				$why_img = get_field('why_us_image') ?: AMAL_ASSETS . '/public/edadda3wa.png';
				$why_title = get_field('why_us_title') ?: 'أهمية إعداد مذكرة جوابيه في دعوي تجارية؟';
				$why_sub = get_field('why_us_subtitle') ?: 'تعد من أهم الخطوات التي تضمن الحفاظ على حقوقك، حيث ترتكز على:';
				$why_desc = get_field('why_us_desc') ?: '';
				$why_btn_text = get_field('why_us_btn_text') ?: 'اعرف المزيد عن خدماتنا';
				$why_btn_url = get_field('why_us_btn_url') ?: '#';
				$default_list = [
					'الرد على كافة الدفوع الموضوعية والشكلية الواردة في صحيفة الدعوى.',
					'تقديم الأدلة والقرائن التي تفند ادعاءات الخصم أو تثبت حقكم.',
					'دعم موقفك أمام القضاء بمنهج قانوني احترافي.'
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
				$types_title = get_field('types_title') ?: 'انواع اللوائح والمذكرات القانونية التي نقدمها';
				$types_sub = get_field('types_subtitle') ?: 'فريقنا القانوني يمتلك القدرة على صياغة كافة أنواع اللوائح، ومنها:';
				?>
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($types_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($types_sub); ?></p>
			</div>
			
			<div class="contract-types-grid">
				<?php
				$default_types = [
					1 => ['img' => 'memo3.png', 'title' => 'لائحة الدعوى (الافتتاحية)', 'desc' => 'تأسيس الدعوى والمطالبة بالحقوق بدقة قانونية.'],
					2 => ['img' => 'memo2.png', 'title' => 'المذكرة الجوابية', 'desc' => 'الرد على دعاوى الخصوم وتقديم الدفوع القوية.'],
					3 => ['img' => 'memo1.png', 'title' => 'لائحة اعتراضية (استئناف)', 'desc' => 'تقديم الاعتراض على الأحكام للجهات المختصة.']
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
				$steps_title = get_field('steps_title') ?: 'لماذا نعد الأفضل في صياغة المذكرات القانونية؟';
				$steps_sub = get_field('steps_subtitle') ?: 'إعداد مذكرات قوية ومحكمة تعتمد على فريق من الخبراء، حيث نقوم بـ:';
				?>
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($steps_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($steps_sub); ?></p>
			</div>

			<div class="steps-flex">
				<?php
				$default_steps = [
					1 => ['title' => 'صياغة مذكرة جوابية احترافية', 'desc' => 'الاعتماد على نصوص قانونية تدعم موقفك وتفند ادعاءات الخصم بشكل احترافي.'],
					2 => ['title' => 'تحليل ثغرات الخصم', 'desc' => 'تحليل دقيق لأقوال الخصم واستخراج الثغرات منها.'],
					3 => ['title' => 'الالتزام بالمواعيد النظامية', 'desc' => 'الاستجابة بالوقت المحدد لتقديم المذكرات للجهات القضائية.']
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
				$faq_title = get_field('faq_title') ?: 'الأسئلة الشائعة حول المذكرات القانونية';
				$faq_sub = get_field('faq_subtitle') ?: 'إجابات على أكثر الأسئلة شيوعاً حول خدماتنا';
				?>
				<h2 class="section-title" style="color: var(--color-gold);"><?php echo esc_html($faq_title); ?></h2>
				<p class="section-subtitle"><?php echo esc_html($faq_sub); ?></p>
			</div>

			<div class="faq-accordion">
				<?php
				$default_faqs = [
					1 => ['q' => 'ماذا يحدث إذا لم يتم تقديم مذكرة جوابية؟', 'a' => 'قد تفقد حقك في الرد على ادعاءات الخصم مما يضعف موقفك القانوني أمام القاضي وقد يؤدي إلى صدور حكم ضدك.'],
					2 => ['q' => 'هل يمكن تعديل المذكرة بعد تقديمها؟', 'a' => 'في أغلب الأحيان لا يمكن تعديل المذكرة بعد إرسالها أو تقديمها رسمياً، لذلك يجب التأكد من صياغتها باحترافية قبل التقديم.'],
					3 => ['q' => 'كم تستغرق صياغة المذكرة الجوابية؟', 'a' => 'يعتمد الوقت على حجم القضية وكمية المستندات، ولكننا نحرص دائماً على تسليمها قبل انتهاء المدة النظامية المحددة.']
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
