<?php
/**
 * Contact CTA Section – Full Form with Dynamic Case Sub-Type
 *
 * @package AmalMalki
 */
$show_contact = function_exists('get_field') && get_field('show_contact_section') !== null
    ? get_field('show_contact_section')
    : true;

if ( ! $show_contact ) {
    return;
}

/* ── مساعد: يتحقق من صحة قيمة ACF (4 أحرف كحد أدنى) ── */
function amal_valid_acf( $key, $fallback ) {
    if ( ! function_exists('get_field') ) return $fallback;
    $val = get_field( $key );
    return ( ! empty($val) && mb_strlen( trim($val) ) >= 4 ) ? $val : $fallback;
}

$sec_title = amal_valid_acf( 'contact_section_title',    __( 'يرجى تعبئة البيانات التالية، وسيتم التواصل معكم في أقرب وقت ممكن:', 'amal-malki' ) );
$sec_sub   = amal_valid_acf( 'contact_section_subtitle', '' );

/* ── القضايا الرئيسية وفروعها ── */
$case_types = [
    'lawsuit'       => [
        'label'  => 'خدمة إعداد الدعوى القضائية',
        'subs'   => [
            'دراسة مستندات وأوراق القضية',
            'صياغة صحيفة الدعوى',
            'تقييد الدعوى إلكترونيًا',
            'كتابة مذكرة تحرير الدعوى',
            'متابعة الحالة حتى تحديد الموعد',
        ],
    ],
    'memo'          => [
        'label'  => 'خدمة المذكرات الجوابية',
        'subs'   => [
            'دراسة مستندات وضبوط القضية',
            'جلسة مناقشة مع المحامي المختص',
            'كتابة مذكرة جوابية واحدة',
            'تقييد المذكرة',
            'استشارة بعد الجلسة',
        ],
    ],
    'session'       => [
        'label'  => 'خدمة حضور الجلسات القضائية',
        'subs'   => [
            'مراجعة مستندات القضية',
            'مناقشة تفاصيل القضية',
            'إعداد مذكرة حضور مختصرة',
            'حضور الجلسة بواسطة محامٍ',
            'تقرير بعد الجلسة',
        ],
    ],
    'appeal'        => [
        'label'  => 'خدمة متابعة قضايا الاستئناف',
        'subs'   => [
            'دراسة الحكم وملف القضية',
            'مناقشة الملف مع المحامي المختص',
            'إعداد اللائحة الاعتراضية',
            'متابعة القضية حتى تحديد جلسة الاستئناف',
        ],
    ],
    'contracts'     => [
        'label'  => 'خدمة صياغة وتدقيق العقود',
        'subs'   => [
            'خدمة صياغة العقود القانونية',
            'خدمة تدقيق ومراجعة العقود',
            'خدمة تطوير وتحسين البنود التعاقدية',
            'خدمة إعداد العقود التجارية المتخصصة',
        ],
    ],
    'consultation'  => [
        'label'  => 'خدمة الاستشارات القانونية',
        'subs'   => [
            'الاستشارة القانونية الفورية',
            'الاستشارة القانونية المجدولة',
        ],
    ],
    'notarization'  => [
        'label'  => 'خدمات التوثيق',
        'subs'   => [
            'تدقيق وتوثيق العقود والاتفاقيات',
            'إصدار الوكالات الشرعية',
        ],
    ],
    'company'       => [
        'label'  => 'خدمات تأسيس الشركات',
        'subs'   => [
            'دراسة النشاط واختيار الكيان المناسب وإعداد الهيكلة القانونية والتنظيمية',
            'حجز الاسم التجاري',
            'إصدار السجل التجاري',
            'التسجيل في الجهات الحكومية',
        ],
    ],
];

/* JSON للجافا سكريبت */
$case_types_json = wp_json_encode( array_map( fn($v) => ['label' => $v['label'], 'subs' => $v['subs']], $case_types ), JSON_UNESCAPED_UNICODE );
?>

<!-- ═══════════════════════════════════════
     CONTACT FORM SECTION
═══════════════════════════════════════ -->
<section id="contact" class="amal-contact-section" aria-label="<?php esc_attr_e( 'تواصل معنا', 'amal-malki' ); ?>">
    <div class="container">

        <h2 class="section-title"><?php echo esc_html( $sec_title ); ?></h2>
        <?php if ( $sec_sub ): ?>
            <p class="why-us-subtitle" style="color: var(--color-text-muted); margin-bottom: 2rem;"><?php echo nl2br( esc_html( $sec_sub ) ); ?></p>
        <?php endif; ?>

        <div class="amal-contact-card">

            <form class="amal-contact-form" id="amalContactForm" novalidate autocomplete="off">
                <?php wp_nonce_field( 'amal_contact_form', 'amal_nonce' ); ?>

                <!-- Row 1: Name + Phone -->
                <div class="acf-row">
                    <div class="acf-group">
                        <label for="acf_name"><?php _e( 'الاسم الكامل', 'amal-malki' ); ?> <span class="acf-req">*</span></label>
                        <input type="text" id="acf_name" name="name" required
                               placeholder="<?php esc_attr_e( 'أدخل اسمك', 'amal-malki' ); ?>">
                    </div>
                    <div class="acf-group">
                        <label for="acf_phone"><?php _e( 'رقم الهاتف', 'amal-malki' ); ?> <span class="acf-req">*</span></label>
                        <input type="tel" id="acf_phone" name="phone" required
                               placeholder="<?php esc_attr_e( 'أدخل رقمك', 'amal-malki' ); ?>">
                    </div>
                </div>

                <!-- Row 2: Email + City -->
                <div class="acf-row">
                    <div class="acf-group">
                        <label for="acf_email"><?php _e( 'البريد الإلكتروني', 'amal-malki' ); ?></label>
                        <input type="email" id="acf_email" name="email"
                               placeholder="<?php esc_attr_e( 'أدخل بريدك الالكتروني', 'amal-malki' ); ?>">
                    </div>
                    <div class="acf-group">
                        <label for="acf_city"><?php _e( 'مدينة العميل', 'amal-malki' ); ?></label>
                        <input type="text" id="acf_city" name="city"
                               placeholder="<?php esc_attr_e( 'أدخل المدينه', 'amal-malki' ); ?>">
                    </div>
                </div>

                <!-- Row 3: Case Type (Main) -->
                <div class="acf-row acf-row--single">
                    <div class="acf-group">
                        <label for="acf_case_type"><?php _e( 'نوع القضية أو الاستفسار', 'amal-malki' ); ?> <span class="acf-req">*</span></label>
                        <div class="acf-select-wrap">
                            <select id="acf_case_type" name="case_type" required>
                                <option value=""><?php _e( 'أختر نوع القضية', 'amal-malki' ); ?></option>
                                <?php foreach ( $case_types as $key => $ct ) : ?>
                                    <option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $ct['label'] ); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <svg class="select-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Row 4: Sub-type (generated dynamically) -->
                <div class="acf-row acf-row--single" id="acf_subtype_wrap" style="display:none;">
                    <div class="acf-group">
                        <label for="acf_case_subtype"><?php _e( 'فضلاً اختر المسار المطلوب من الخدمة', 'amal-malki' ); ?> <span class="acf-req">*</span></label>
                        <div class="acf-select-wrap">
                            <select id="acf_case_subtype" name="case_subtype">
                                <option value=""><?php _e( 'اختر المسار', 'amal-malki' ); ?></option>
                            </select>
                            <svg class="select-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Row 5: Contact Method Checkboxes -->
                <div class="acf-row acf-row--single">
                    <div class="acf-group">
                        <label><?php _e( 'طريقة التواصل المفضلة', 'amal-malki' ); ?></label>
                        <div class="acf-checkboxes">
                            <label class="acf-check-label">
                                <input type="checkbox" name="contact_method[]" value="اتصال هاتفي">
                                <span class="acf-check-box"></span>
                                <span><?php _e( 'اتصال هاتفي', 'amal-malki' ); ?></span>
                            </label>
                            <label class="acf-check-label">
                                <input type="checkbox" name="contact_method[]" value="واتساب">
                                <span class="acf-check-box"></span>
                                <span><?php _e( 'واتساب', 'amal-malki' ); ?></span>
                            </label>
                            <label class="acf-check-label">
                                <input type="checkbox" name="contact_method[]" value="بريد إلكتروني">
                                <span class="acf-check-box"></span>
                                <span><?php _e( 'بريد إلكتروني', 'amal-malki' ); ?></span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Row 6: Message -->
                <div class="acf-row acf-row--single">
                    <div class="acf-group">
                        <label for="acf_message"><?php _e( 'تفاصيل مختصرة عن الطلب', 'amal-malki' ); ?></label>
                        <textarea id="acf_message" name="message" rows="5"
                                  placeholder="<?php esc_attr_e( 'اكتب تفاصيل الطلب....', 'amal-malki' ); ?>"></textarea>
                    </div>
                </div>

                <!-- Submit -->
                <div class="acf-submit-wrap">
                    <button type="submit" class="acf-submit-btn" id="amalContactSubmit">
                        <span class="btn-text"><?php
                            echo esc_html( amal_valid_acf( 'contact_btn_text', __( 'أرسل طلبك الآن', 'amal-malki' ) ) );
                        ?></span>
                        <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                        <span class="btn-spinner" style="display:none;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="spin-icon">
                                <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
                                <path d="M12 2a10 10 0 0 1 10 10" stroke-opacity="1"></path>
                            </svg>
                        </span>
                    </button>
                </div>

                <div class="acf-feedback" aria-live="polite" role="alert"></div>

            </form>
        </div><!-- .amal-contact-card -->
    </div><!-- .container -->
</section>

<!-- Pass case-types data to JS -->
<script>
window.amalCaseTypes = <?php echo $case_types_json; ?>;
</script>
