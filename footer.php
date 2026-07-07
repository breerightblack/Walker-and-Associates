<!-- ── FOOTER ──────────────────────────────────────────────────────────── -->
<footer id="site-footer" role="contentinfo">

  <div class="footer-inner">

    <!-- Column 1: Brand -->
    <div class="footer-brand">
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="footer-logo-wrap" aria-label="Home">
        <svg class="footer-logo-svg" viewBox="0 0 100 90" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <polygon points="5,8 30,8 50,62 38,62"  fill="currentColor"/>
          <polygon points="95,8 70,8 50,62 62,62" fill="currentColor"/>
          <polygon points="50,18 57,34 50,50 43,34" fill="#C9B98A"/>
          <polygon points="38,68 62,68 50,88"       fill="#C9B98A"/>
        </svg>
        <div class="footer-logo-text">
          <span class="footer-logo-name">Walker</span>
          <span class="footer-logo-sub">&amp; Associates</span>
        </div>
      </a>
      <p class="footer-tagline">Atlanta's Premier Entertainment,<br>Film &amp; Television Law Firm</p>
      <div class="footer-social">
        <a href="https://www.instagram.com/walkerandassociates/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r=".5" fill="currentColor"/></svg>
        </a>
        <a href="https://www.linkedin.com/company/walker-and-associates/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
          <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
        </a>
      </div>
    </div>

    <!-- Column 2: Practice Areas -->
    <div class="footer-col">
      <h4 class="footer-heading">Practice Areas</h4>
      <ul>
        <li><a href="<?php echo home_url('/practice-areas/#entertainment'); ?>">Entertainment Law</a></li>
        <li><a href="<?php echo home_url('/practice-areas/#film-tv'); ?>">Film &amp; Television</a></li>
        <li><a href="<?php echo home_url('/practice-areas/#music'); ?>">Music Law</a></li>
        <li><a href="<?php echo home_url('/practice-areas/#litigation'); ?>">Litigation</a></li>
        <li><a href="<?php echo home_url('/practice-areas/#corporate'); ?>">Corporate Law</a></li>
        <li><a href="<?php echo home_url('/practice-areas/#real-estate'); ?>">Real Estate</a></li>
      </ul>
    </div>

    <!-- Column 3: Firm -->
    <div class="footer-col">
      <h4 class="footer-heading">The Firm</h4>
      <ul>
        <li><a href="<?php echo home_url('/about/'); ?>">About the Firm</a></li>
        <li><a href="<?php echo home_url('/attorney-james-walker/'); ?>">Attorney Walker</a></li>
        <li><a href="<?php echo home_url('/team/'); ?>">Our Team</a></li>
        <li><a href="<?php echo home_url('/media/'); ?>">Media &amp; Press</a></li>
        <li><a href="<?php echo home_url('/clients/'); ?>">Clients</a></li>
        <li><a href="<?php echo home_url('/contact/'); ?>">Contact Us</a></li>
      </ul>
    </div>

    <!-- Column 4: Contact -->
    <div class="footer-col footer-contact">
      <h4 class="footer-heading">Contact</h4>
      <address>
        <p>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
          The Walker Building, 3421 Main Street<br>Atlanta, GA 30337
        </p>
        <p>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
          <a href="tel:7708477363">(770) 847-7363</a>
        </p>
        <p>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          <a href="<?php echo home_url('/contact/'); ?>">Send a Message</a>
        </p>
      </address>
      <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-outline-light footer-cta">Schedule Consultation</a>
    </div>

  </div><!-- /.footer-inner -->

  <!-- Footer bottom bar -->
  <div class="footer-bottom">
    <div class="footer-bottom-inner">
      <p class="footer-legal">
        &copy; <?php echo date('Y'); ?> J. Walker and Associates, LLP. All rights reserved.
        Attorney advertising. Prior results do not guarantee similar outcomes.
      </p>
      <nav class="footer-legal-nav" aria-label="Legal">
        <a href="<?php echo home_url('/privacy-policy/'); ?>">Privacy Policy</a>
        <a href="<?php echo home_url('/disclaimer/'); ?>">Disclaimer</a>
        <a href="<?php echo home_url('/accessibility/'); ?>">Accessibility</a>
      </nav>
    </div>
  </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
