/* Shared nav/footer injector — edit once, updates all pages */
(function() {
  const path = window.location.pathname;
  // any page living in a subfolder needs to climb one level for shared links
  const inSubfolder = /\/(team|practice-areas)\//.test(path);
  const root = inSubfolder ? '../' : '';

  const nav = `
<div id="topbar">
  <span class="topbar-text">Our goal every day is to use our resources to touch and inspire and encourage.</span>
</div>
<header id="site-header">
  <div class="header-inner">
    <a href="${root}index.html" class="logo-wrap">
      <div class="logo-text"><span class="logo-name">Walker</span><span class="logo-sub">&amp; Associates</span></div>
      <div class="logo-states">CT &nbsp;·&nbsp; DC &nbsp;·&nbsp; NY &nbsp;·&nbsp; GA</div>
    </a>
    <nav id="primary-nav">
      <ul class="nav-list">
        <li><a href="${root}index.html">Home</a></li>
        <li><a href="${root}about.html">About the Firm</a></li>
        <li><a href="${root}team/james-walker.html">Attorney Walker</a></li>
        <li><a href="${root}team.html">Our Team</a></li>
        <li class="has-dropdown has-dropdown-wide">
          <a href="${root}practice-areas.html">Practice Areas</a>
          <ul class="nav-dropdown nav-dropdown-cols">
            <li class="pa-all"><a href="${root}practice-areas.html"><strong>All Practice Areas</strong></a></li>
            <li class="pa-cols-wrap">
              <ul class="pa-cols">
              <li><a href="${root}practice-areas/advertising-contracts.html">Advertising Contracts</a></li>
              <li><a href="${root}practice-areas/book-deals.html">Book Deals</a></li>
              <li><a href="${root}practice-areas/business-disputes.html">Business Disputes</a></li>
              <li><a href="${root}practice-areas/business-litigation.html">Business Litigation</a></li>
              <li><a href="${root}practice-areas/commercial-contracts.html">Commercial Contracts</a></li>
              <li><a href="${root}practice-areas/commercial-litigation.html">Commercial Litigation</a></li>
              <li><a href="${root}practice-areas/copyright-law.html">Copyright Law</a></li>
              <li><a href="${root}practice-areas/corporate.html">Corporate</a></li>
              <li><a href="${root}practice-areas/crisis-management.html">Crisis Management</a></li>
              <li><a href="${root}practice-areas/digital-and-streaming.html">Digital &amp; Streaming</a></li>
              <li><a href="${root}practice-areas/dispute-resolution.html">Dispute Resolution</a></li>
              <li><a href="${root}practice-areas/employment-and-labor.html">Employment &amp; Labor</a></li>
              <li><a href="${root}practice-areas/entertainment-law.html">Entertainment Law</a></li>
              <li><a href="${root}practice-areas/family-law.html">Family Law (Divorces, Pre-Nups &amp; More)</a></li>
              <li><a href="${root}practice-areas/film-deals.html">Film Deals</a></li>
              <li><a href="${root}practice-areas/immigration.html">Immigration</a></li>
              <li><a href="${root}practice-areas/intellectual-property-and-entertainment-law.html">Intellectual Property and Entertainment Law</a></li>
              <li><a href="${root}practice-areas/internet-protection.html">Internet Protection</a></li>
              <li><a href="${root}practice-areas/llc-s-corp-and-c-corp-set-up.html">LLC, S-Corp &amp; C-Corp Set Up</a></li>
              <li><a href="${root}practice-areas/personal-injury.html">Personal Injury</a></li>
              <li><a href="${root}practice-areas/power-of-attorney.html">Power of Attorney</a></li>
              <li><a href="${root}practice-areas/production-and-financing-agreements.html">Production &amp; Financing Agreements</a></li>
              <li><a href="${root}practice-areas/publishing-deals.html">Publishing Deals</a></li>
              <li><a href="${root}practice-areas/real-estate.html">Real Estate</a></li>
              <li><a href="${root}practice-areas/recording-contracts.html">Recording Contracts</a></li>
              <li><a href="${root}practice-areas/small-business-governance-and-operations.html">Small Business Governance &amp; Operations</a></li>
              <li><a href="${root}practice-areas/synchronization-and-mechanical-licensing.html">Synchronization &amp; Mechanical Licensing</a></li>
              <li><a href="${root}practice-areas/taxes.html">Taxes</a></li>
              <li><a href="${root}practice-areas/trademarks.html">Trademarks</a></li>
              <li><a href="${root}practice-areas/wills-and-trusts.html">Wills &amp; Trusts</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="has-dropdown">
          <a href="${root}media.html">Media &amp; Press</a>
          <ul class="nav-dropdown">
            <li><a href="${root}media.html">Media &amp; Press</a></li>
            <li><a href="${root}photos.html">Photos</a></li>
            <li><a href="${root}testimonials.html">Testimonials</a></li>
          </ul>
        </li>
        <li class="has-dropdown">
          <a href="${root}contact.html">Contact</a>
          <ul class="nav-dropdown">
            <li><a href="${root}contact.html">Contact Us</a></li>
            <li><a href="${root}consultation.html">Book a Consultation</a></li>
          </ul>
        </li>
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
      <p class="footer-tagline">A Multi-Market Legal Firm for Entertainment, Business, Film, and Television</p>
      <div class="footer-social">
        <a href="https://www.instagram.com/jameswalkerjresq/?hl=en" aria-label="Instagram — James L. Walker, Jr." target="_blank" rel="noopener noreferrer"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r=".5" fill="currentColor"/></svg></a>
        <a href="https://www.linkedin.com/in/james-l-walker-jr-a324035/" aria-label="LinkedIn — James L. Walker, Jr." target="_blank" rel="noopener noreferrer"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-4 0v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg></a>
      </div>
    </div>
    <div class="footer-col">
      <h4 class="footer-heading">Practice Areas</h4>
      <ul>
        <li><a href="${root}entertainment-law.html">Entertainment Law</a></li>
        <li><a href="${root}film-and-television-law.html">Film &amp; Television Law</a></li>
        <li><a href="${root}litigation.html">Litigation</a></li>
        <li><a href="${root}corporate-law.html">Corporate Law</a></li>
        <li><a href="${root}practice-areas/real-estate.html">Real Estate Law</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4 class="footer-heading">The Firm</h4>
      <ul>
        <li><a href="${root}about.html">About the Firm</a></li>
        <li><a href="${root}team/james-walker.html">Attorney Walker</a></li>
        <li><a href="${root}team.html">Our Team</a></li>
        <li><a href="${root}media.html">Media &amp; Press</a></li>
        <li><a href="${root}photos.html">Photos</a></li>
        <li><a href="${root}testimonials.html">Testimonials</a></li>
        <li><a href="${root}contact.html">Contact Us</a></li>
        <li><a href="${root}consultation.html">Book a Consultation</a></li>
      </ul>
    </div>
    <div class="footer-col footer-contact">
      <h4 class="footer-heading">Contact</h4>
      <address>
        <p><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>The Walker Building<br>3427 Main Street<br>Atlanta, GA 30337</p>
        <p><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg><a href="tel:7708477363">(770) 847-7363</a></p>
      </address>
      <a href="${root}contact.html" class="btn btn-outline-light footer-cta">Schedule Consultation</a>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="footer-bottom-inner">
      <p class="footer-disclaimer">This website is for general information only and is an attorney advertisement. The content on this site is not legal advice and should not be relied on as such. Viewing this site, using its forms or chat, or communicating with the firm through this site does not create an attorney-client relationship. <a href="${root}disclaimer.html">Read our full Disclaimer &amp; Terms</a>.</p>
      <div class="footer-bottom-row">
        <p class="footer-legal">&copy; 2026 J. Walker and Associates, LLP. All rights reserved. Prior results do not guarantee similar outcomes.</p>
        <nav class="footer-legal-nav"><a href="${root}privacy-policy.html">Privacy Policy</a><a href="${root}disclaimer.html">Disclaimer</a><a href="${root}accessibility.html">Accessibility</a></nav>
      </div>
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
