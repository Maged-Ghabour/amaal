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

  /* ── New Contact Form – Dynamic Sub-Type Select ────────────── */
  const newForm = document.getElementById('amalContactForm');

  if (newForm) {
    const caseTypeSelect  = newForm.querySelector('#acf_case_type');
    const subTypeWrap     = newForm.querySelector('#acf_subtype_wrap');
    const subTypeSelect   = newForm.querySelector('#acf_case_subtype');
    const submitBtn       = newForm.querySelector('#amalContactSubmit');
    const feedbackEl      = newForm.querySelector('.acf-feedback');
    const btnText         = submitBtn?.querySelector('.btn-text');
    const btnIcon         = submitBtn?.querySelector('.btn-icon');
    const btnSpinner      = submitBtn?.querySelector('.btn-spinner');

    // ── Dynamic sub-type select ────────────────────────────────
    const caseData = window.amalCaseTypes || {};

    caseTypeSelect?.addEventListener('change', function () {
      const key = this.value;
      // Clear old options
      subTypeSelect.innerHTML = '<option value="">اختر المسار</option>';

      if (key && caseData[key] && caseData[key].subs.length) {
        // Populate sub options
        caseData[key].subs.forEach((sub, idx) => {
          const opt = document.createElement('option');
          opt.value = sub;
          opt.textContent = (idx + 1) + '. ' + sub;
          subTypeSelect.appendChild(opt);
        });
        // Show with animation
        subTypeWrap.style.display = '';
        subTypeWrap.style.animation = 'none';
        subTypeWrap.offsetHeight; // reflow
        subTypeWrap.style.animation = '';
      } else {
        subTypeWrap.style.display = 'none';
      }
    });

    // ── AJAX Submit ────────────────────────────────────────────
    newForm.addEventListener('submit', async (e) => {
      e.preventDefault();

      // Validate required
      const name      = newForm.querySelector('#acf_name').value.trim();
      const phone     = newForm.querySelector('#acf_phone').value.trim();
      const caseType  = newForm.querySelector('#acf_case_type').value;

      if (!name || !phone || !caseType) {
        showAcfFeedback('يرجى ملء جميع الحقول المطلوبة (الاسم، الهاتف، نوع القضية).', 'error');
        return;
      }

      // Loading state
      if (submitBtn) {
        submitBtn.disabled = true;
        if (btnText)    btnText.style.display    = 'none';
        if (btnIcon)    btnIcon.style.display    = 'none';
        if (btnSpinner) btnSpinner.style.display = 'inline-flex';
      }

      const body = new FormData(newForm);
      body.append('action', 'amal_contact');

      try {
        const res  = await fetch(
          (window.amalData && amalData.ajaxUrl) || '/wp-admin/admin-ajax.php',
          { method: 'POST', body }
        );
        const data = await res.json();

        if (data.success) {
          newForm.reset();
          if (subTypeWrap) subTypeWrap.style.display = 'none';
          showAcfFeedback(data.data?.message || 'تم إرسال طلبك بنجاح! سنتواصل معك قريباً.', 'success');
        } else {
          showAcfFeedback(data.data?.message || 'حدث خطأ. يرجى المحاولة مجدداً.', 'error');
        }
      } catch {
        showAcfFeedback('حدث خطأ في الاتصال. يرجى المحاولة مجدداً.', 'error');
      } finally {
        if (submitBtn) {
          submitBtn.disabled = false;
          if (btnText)    btnText.style.display    = '';
          if (btnIcon)    btnIcon.style.display    = '';
          if (btnSpinner) btnSpinner.style.display = 'none';
        }
      }
    });

    function showAcfFeedback(msg, type) {
      if (!feedbackEl) return;
      feedbackEl.textContent = msg;
      feedbackEl.className   = 'acf-feedback ' + type;
      feedbackEl.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      setTimeout(() => {
        feedbackEl.textContent = '';
        feedbackEl.className   = 'acf-feedback';
      }, 7000);
    }
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
