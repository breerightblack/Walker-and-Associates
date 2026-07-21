/* Walker & Associates — main.js */

(function() {
  'use strict';

  // ── Sticky header shadow on scroll ──────────────────────────
  const header = document.getElementById('site-header');
  if (header) {
    window.addEventListener('scroll', function() {
      header.classList.toggle('scrolled', window.scrollY > 10);
    }, { passive: true });
  }

  // ── Five A's tabs ────────────────────────────────────────────
  const tabs    = document.querySelectorAll('.five-as-tab');
  const panels  = document.querySelectorAll('.five-as-panel');

  tabs.forEach(function(tab) {
    tab.addEventListener('click', function() {
      const target = this.dataset.tab;

      tabs.forEach(function(t)  { t.classList.remove('active'); });
      panels.forEach(function(p){ p.classList.remove('active'); });

      this.classList.add('active');
      const panel = document.getElementById('tab-' + target);
      if (panel) panel.classList.add('active');
    });
  });

  // ── Mobile nav toggle ────────────────────────────────────────
  const toggle = document.querySelector('.nav-toggle');
  const nav    = document.getElementById('primary-nav');

  if (toggle && nav) {
    toggle.addEventListener('click', function() {
      const expanded = this.getAttribute('aria-expanded') === 'true';
      this.setAttribute('aria-expanded', String(!expanded));
      nav.style.display = expanded ? '' : 'block';
      nav.style.position = 'fixed';
      nav.style.top = 'var(--header-h)';
      nav.style.left = '0';
      nav.style.right = '0';
      nav.style.background = 'white';
      nav.style.padding = '24px';
      nav.style.boxShadow = '0 8px 32px rgba(0,0,0,.12)';
      nav.style.zIndex = '199';
      if (!expanded) {
        nav.querySelector('.nav-list').style.flexDirection = 'column';
        nav.querySelector('.nav-list').style.gap = '16px';
      } else {
        nav.style.display = 'none';
      }
    });
  }

  // ── Animate stats on enter ───────────────────────────────────
  function animateCountUp(el) {
    const target = parseFloat(el.dataset.target || el.textContent);
    const suffix = el.dataset.suffix || '';
    const duration = 1400;
    const start = performance.now();

    function step(ts) {
      const progress = Math.min((ts - start) / duration, 1);
      const ease = 1 - Math.pow(1 - progress, 3);
      const current = Math.round(target * ease * 10) / 10;
      el.textContent = (Number.isInteger(target) ? Math.round(current) : current) + suffix;
      if (progress < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }

  const statNumbers = document.querySelectorAll('.stat-number[data-target]');
  if (statNumbers.length && 'IntersectionObserver' in window) {
    const io = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          animateCountUp(entry.target);
          io.unobserve(entry.target);
        }
      });
    }, { threshold: .5 });

    statNumbers.forEach(function(el) { io.observe(el); });
  }

})();
