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

/* ── Contact form + consultation-fee copy buttons ──────────────────────── */
(function () {
  var form = document.getElementById('contact-form');
  if (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      this.style.display = 'none';
      var ok = document.getElementById('form-success');
      if (ok) ok.style.display = 'block';
    });
  }

  document.querySelectorAll('.payment-copy-go-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      if (navigator.clipboard) navigator.clipboard.writeText(btn.dataset.copy);
      var status = btn.parentElement.querySelector('.payment-copy-status');
      if (status) {
        status.textContent = btn.dataset.status;
        status.style.display = 'block';
      }
      // Anchors (PayPal) keep navigating; buttons (Zelle) have nowhere to go.
    });
  });
})();

/* ── Photo gallery lightbox ────────────────────────────────────────────── */
(function () {
  var items = Array.prototype.slice.call(document.querySelectorAll('.gallery-item'));
  var box   = document.getElementById('lightbox');
  if (!items.length || !box) return;

  var img     = document.getElementById('lightbox-img');
  var counter = document.getElementById('lightbox-counter');
  var closeEl = document.getElementById('lightbox-close');
  var prevEl  = document.getElementById('lightbox-prev');
  var nextEl  = document.getElementById('lightbox-next');
  var index   = 0;
  var lastFocused = null;

  function show(i) {
    index = (i + items.length) % items.length;
    var btn = items[index];
    img.src = btn.dataset.full;
    img.alt = btn.dataset.alt || '';
    counter.textContent = (index + 1) + ' / ' + items.length;
  }

  function open(i) {
    lastFocused = document.activeElement;
    show(i);
    box.hidden = false;
    document.body.classList.add('lightbox-open');
    closeEl.focus();
  }

  function close() {
    box.hidden = true;
    document.body.classList.remove('lightbox-open');
    img.src = '';
    if (lastFocused) lastFocused.focus();
  }

  items.forEach(function (btn, i) {
    btn.addEventListener('click', function () { open(i); });
  });

  closeEl.addEventListener('click', close);
  prevEl.addEventListener('click', function () { show(index - 1); });
  nextEl.addEventListener('click', function () { show(index + 1); });

  // click the backdrop (not the image or controls) to dismiss
  box.addEventListener('click', function (e) { if (e.target === box) close(); });

  document.addEventListener('keydown', function (e) {
    if (box.hidden) return;
    if (e.key === 'Escape')     close();
    if (e.key === 'ArrowLeft')  show(index - 1);
    if (e.key === 'ArrowRight') show(index + 1);
    // keep tab focus inside the dialog
    if (e.key === 'Tab') {
      var f = [closeEl, prevEl, nextEl];
      var at = f.indexOf(document.activeElement);
      e.preventDefault();
      f[(at + (e.shiftKey ? -1 : 1) + f.length) % f.length].focus();
    }
  });
})();

/* ── Practice-area accordion ───────────────────────────────────────────── */
(function () {
  var triggers = document.querySelectorAll('.pa-accordion-trigger');
  if (!triggers.length) return;

  triggers.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var panel = document.getElementById(btn.getAttribute('aria-controls'));
      var open  = btn.getAttribute('aria-expanded') === 'true';
      btn.setAttribute('aria-expanded', String(!open));
      if (panel) panel.hidden = open;
    });
  });

  // deep link: /practice-areas#book-deals opens that panel
  if (window.location.hash) {
    var t = document.getElementById('pa-trigger-' + window.location.hash.slice(1));
    if (t) {
      t.click();
      t.scrollIntoView({ block: 'center' });
    }
  }
})();
