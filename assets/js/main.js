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
    '.service-content-wrap, .single-container'
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
  const form     = document.getElementById('contactForm');
  const feedback = form?.querySelector('.form-feedback');

  form?.addEventListener('submit', async (e) => {
    e.preventDefault();

    const submitBtn = form.querySelector('[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.textContent = amalData?.sending || 'جاري الإرسال...';

    const body = new FormData(form);
    body.append('action', 'amal_contact');

    try {
      const res  = await fetch(amalData?.ajaxUrl || '/wp-admin/admin-ajax.php', {
        method: 'POST',
        body,
      });
      const data = await res.json();

      if (data.success) {
        form.reset();
        showFeedback('تم إرسال طلبك بنجاح! سنتواصل معك قريباً.', 'success');
      } else {
        showFeedback(data.data?.message || 'حدث خطأ. يرجى المحاولة مجدداً.', 'error');
      }
    } catch {
      showFeedback('حدث خطأ في الاتصال. يرجى المحاولة مجدداً.', 'error');
    } finally {
      submitBtn.disabled = false;
      submitBtn.textContent = amalData?.submit || 'إرسال الطلب';
    }
  });

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
      // Smooth scroll for modern browsers
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
      // Fallback for older browsers
      if (document.documentElement.scrollTo) {
        document.documentElement.scrollTo({ top: 0, behavior: 'smooth' });
      }
    });
  }

  function showFeedback(msg, type) {
    if (!feedback) return;
    feedback.textContent   = msg;
    feedback.className     = `form-feedback ${type}`;
    setTimeout(() => { feedback.textContent = ''; feedback.className = 'form-feedback'; }, 6000);
  }

})();
