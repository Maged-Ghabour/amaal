/**
 * Amal Malki Theme – Main JavaScript
 * Vanilla JS, no jQuery dependency
 */

(function () {
  'use strict';

  /* ── Sticky Header ──────────────────────────────────────────── */
  const header = document.getElementById('masthead');
  if (header) {
    const onScroll = () => {
      header.classList.toggle('scrolled', window.scrollY > 60);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* ── Mobile Nav ─────────────────────────────────────────────── */
  const toggle  = document.querySelector('.nav-toggle');
  const drawer  = document.getElementById('primary-menu');
  const overlay = document.createElement('div');
  overlay.className = 'nav-overlay';
  document.body.appendChild(overlay);

  function openNav() {
    drawer?.classList.add('open');
    overlay.classList.add('active');
    toggle?.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
  }

  function closeNav() {
    drawer?.classList.remove('open');
    overlay.classList.remove('active');
    toggle?.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }

  toggle?.addEventListener('click', () => {
    const isOpen = drawer?.classList.contains('open');
    isOpen ? closeNav() : openNav();
  });

  overlay.addEventListener('click', closeNav);

  // Close on ESC
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeNav();
  });

  // Close on nav link click (mobile)
  drawer?.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', closeNav);
  });

  /* ── Reveal on Scroll ───────────────────────────────────────────── */
  const reveals = document.querySelectorAll(
    '.service-card, .feature-card, .article-card, .about-block, ' +
    '.why-us-card, .section-title, .about-section, .services-section, ' +
    '.why-us-section, .articles-section, .contact-section, ' +
    '.footer-brand, .footer-col, .contact-form, .about-inner, ' +
    '.service-content-wrap, .single-container, .amal-contact-section'
  );

  if ('IntersectionObserver' in window) {
    const revealObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            revealObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.08, rootMargin: '0px 0px -60px 0px' }
    );

    reveals.forEach((el, i) => {
      el.classList.add('reveal');
      el.style.transitionDelay = `${(i % 4) * 0.12}s`;
      revealObserver.observe(el);
    });
  }

  /* ── Smooth Scroll for anchor links ────────────────────────── */
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const headerH = header ? header.offsetHeight : 0;
        const top = target.getBoundingClientRect().top + window.scrollY - headerH - 16;
        window.scrollTo({ top, behavior: 'smooth' });
      }
    });
  });

  /* ── Contact Form (AJAX) ────────────────────────────────────── */
  const contactForm = document.getElementById('amalContactForm');
  const feedback    = contactForm?.querySelector('.acf-feedback');
  const caseSelect  = document.getElementById('acf_case_type');
  const subWrap     = document.getElementById('acf_subtype_wrap');
  const subSelect   = document.getElementById('acf_case_subtype');

  // Handle Dynamic Sub-Type Selection
  caseSelect?.addEventListener('change', function() {
    const val = this.value;
    const data = window.amalCaseTypes ? window.amalCaseTypes[val] : null;

    if (data && data.subs && data.subs.length > 0) {
      subSelect.innerHTML = '<option value="">اختر المسار</option>';
      data.subs.forEach(sub => {
        const opt = document.createElement('option');
        opt.value = sub;
        opt.textContent = sub;
        subSelect.appendChild(opt);
      });
      subWrap.style.display = 'block';
      subSelect.required = true;
    } else {
      subWrap.style.display = 'none';
      subSelect.required = false;
      subSelect.innerHTML = '<option value="">اختر المسار</option>';
    }
  });

  contactForm?.addEventListener('submit', async (e) => {
    e.preventDefault();
    const submitBtn = document.getElementById('amalContactSubmit');
    const btnText   = submitBtn?.querySelector('.btn-text');
    const spinner   = submitBtn?.querySelector('.btn-spinner');
    const icon      = submitBtn?.querySelector('.btn-icon');
    if (!submitBtn) return;

    submitBtn.disabled = true;
    if (btnText) btnText.style.opacity = '0.7';
    if (spinner) spinner.style.display = 'inline-block';
    if (icon)    icon.style.display = 'none';

    const body = new FormData(contactForm);
    body.append('action', 'amal_contact');

    try {
      const res  = await fetch(amalData?.ajaxUrl || '/wp-admin/admin-ajax.php', {
        method: 'POST',
        body,
      });
      const data = await res.json();
      if (data.success) {
        contactForm.reset();
        if (subWrap) subWrap.style.display = 'none';
        showFeedback(data.data?.message || 'تم إرسال طلبك بنجاح!', 'success');
      } else {
        showFeedback(data.data?.message || 'حدث خطأ. يرجى المحاولة مجدداً.', 'error');
      }
    } catch (err) {
      showFeedback('حدث خطأ في الاتصال. يرجى المحاولة مجدداً.', 'error');
    } finally {
      submitBtn.disabled = false;
      if (btnText) btnText.style.opacity = '1';
      if (spinner) spinner.style.display = 'none';
      if (icon)    icon.style.display = 'inline-block';
    }
  });

  function showFeedback(msg, type) {
    if (!feedback) return;
    feedback.textContent = msg;
    feedback.className   = `acf-feedback ${type}`;
    if (window.innerWidth < 768) {
      feedback.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
    setTimeout(() => {
      feedback.textContent = '';
      feedback.className   = 'acf-feedback';
    }, 8000);
  }

  /* ── Scroll to Top ─────────────────────────────────────────── */
  const scrollTopBtn = document.getElementById('scrollToTopBtn');
  if (scrollTopBtn) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 400) {
        scrollTopBtn.classList.add('active');
      } else {
        scrollTopBtn.classList.remove('active');
      }
    });

    scrollTopBtn.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
      if (document.documentElement.scrollTo) {
        document.documentElement.scrollTo({ top: 0, behavior: 'smooth' });
      }
    });
  }

  /* ── Swiper Initializations ──────────────────────────────────── */
  if (typeof Swiper !== 'undefined') {
    /* ── Hero Swiper ── */
    const heroSwiper = new Swiper('.hero-swiper', {
      slidesPerView: 1,
      loop: true,
      effect: 'fade',
      fadeEffect: { crossFade: true },
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.hero-pagination',
        clickable: true,
      },
      speed: 800,
    });

    /* ── Partners Swiper ── */
    const partnersSwiper = new Swiper('.partners-swiper', {
      slidesPerView: 2,
      spaceBetween: 30,
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      breakpoints: {
        640: { slidesPerView: 3, spaceBetween: 40 },
        768: { slidesPerView: 4, spaceBetween: 50 },
        1024: { slidesPerView: 5, spaceBetween: 50 },
      }
    });
  }

})();
