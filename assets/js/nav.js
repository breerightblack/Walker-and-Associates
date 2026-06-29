/* Shared nav/footer injector — edit once, updates all pages */
(function() {
  const path = window.location.pathname;
  const isTeam = path.includes('/team/');
  const root = isTeam ? '../' : '';

  const nav = `
<div id="topbar">
  <span class="topbar-text">Expanding into Film &amp; Television — <a href="${root}practice-areas.html">Explore our new practice areas →</a></span>
</div>
<header id="site-header">
  <div class="header-inner">
    <a href="${root}index.html" class="logo-wrap">
      <div class="logo-text"><span class="logo-name">Walker</span><span class="logo-sub">&amp; Associates</span></div>
    </a>
    <nav id="primary-nav">
      <ul class="nav-list">
        <li><a href="${root}index.html">Home</a></li>
        <li><a href="${root}about.html">About the Firm</a></li>
        <li><a href="${root}team/james-walker.html">Attorney Walker</a></li>
        <li><a href="${root}team.html">Our Team</a></li>
        <li><a href="${root}practice-areas.html">Practice Areas</a></li>
        <li><a href="${root}media.html">Media &amp; Press</a></li>
        <li><a href="${root}contact.html">Contact</a></li>
      </ul>
    </nav>
    <div class="header-cta">
      <a href="${root}contact.html" class="btn btn-primary">Schedule Consultation</a>
    </div>
    <button class="nav-toggle" aria-label="Toggle navigation" aria-expanded="false">
      <span class="hamburger-line"></span><span class="hamburger-line"></span><span class="hamburger-line"></span>
    </button>
  </div>
</header>`;

  const footer = `
<footer id="site-footer">
  <div class="footer-inner">
    <div class="footer-brand">
      <a href="${root}index.html" class="footer-logo-wrap">
        <div class="footer-logo-text"><span class="footer-logo-name">Walker</span><span class="footer-logo-sub">&amp; Associates</span></div>
      </a>
      <p class="footer-tagline">Atlanta's Premier Entertainment,<br>Film &amp; Television Law Firm</p>
      <div class="footer-social">
        <a href="#" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r=".5" fill="currentColor"/></svg></a>
        <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-4 0v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg></a>
      </div>
    </div>
    <div class="footer-col">
      <h4 class="footer-heading">Practice Areas</h4>
      <ul>
        <li><a href="${root}practice-areas.html#entertainment">Entertainment Law</a></li>
        <li><a href="${root}practice-areas.html#film-tv">Film &amp; Television</a></li>
        <li><a href="${root}practice-areas.html#litigation">Litigation</a></li>
        <li><a href="${root}practice-areas.html#corporate">Corporate Law</a></li>
        <li><a href="${root}practice-areas.html#real-estate">Real Estate</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4 class="footer-heading">The Firm</h4>
      <ul>
        <li><a href="${root}about.html">About the Firm</a></li>
        <li><a href="${root}team/james-walker.html">Attorney Walker</a></li>
        <li><a href="${root}team.html">Our Team</a></li>
        <li><a href="${root}media.html">Media &amp; Press</a></li>
        <li><a href="${root}contact.html">Contact Us</a></li>
      </ul>
    </div>
    <div class="footer-col footer-contact">
      <h4 class="footer-heading">Contact</h4>
      <address>
        <p><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>3421 Main Street<br>Atlanta, GA 30337</p>
        <p><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg><a href="tel:7708477363">(770) 847-7363</a></p>
      </address>
      <a href="${root}contact.html" class="btn btn-outline-light footer-cta">Schedule Consultation</a>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="footer-bottom-inner">
      <p class="footer-legal">&copy; 2026 J. Walker and Associates, LLP. All rights reserved. Attorney advertising. Prior results do not guarantee similar outcomes.</p>
      <nav class="footer-legal-nav"><a href="#">Privacy Policy</a><a href="#">Disclaimer</a><a href="#">Accessibility</a></nav>
    </div>
  </div>
</footer>`;

  document.getElementById('wa-nav').outerHTML = nav;
  document.getElementById('wa-footer').outerHTML = footer;

  // Re-init main.js behaviors after injection
  const header = document.getElementById('site-header');
  if (header) {
    window.addEventListener('scroll', function() {
      header.classList.toggle('scrolled', window.scrollY > 10);
    }, { passive: true });
  }

  // Highlight current page nav link
  const links = document.querySelectorAll('.nav-list a');
  links.forEach(function(link) {
    if (link.href === window.location.href || 
        (window.location.pathname !== '/' && link.href.includes(window.location.pathname.split('/').pop()))) {
      link.closest('li').classList.add('current-menu-item');
    }
  });

  // Mobile nav
  const toggle = document.querySelector('.nav-toggle');
  const navEl = document.getElementById('primary-nav');
  if (toggle && navEl) {
    toggle.addEventListener('click', function() {
      const expanded = this.getAttribute('aria-expanded') === 'true';
      this.setAttribute('aria-expanded', String(!expanded));
      navEl.classList.toggle('mobile-open', !expanded);
    });
  }
})();
