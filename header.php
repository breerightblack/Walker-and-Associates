<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <!-- SEO: Primary meta description fallback (Yoast overrides this) -->
  <?php if ( is_front_page() ) : ?>
  <meta name="description" content="A Multi-market Legal Firm for Entertainment, Business, Film, and Television. 30+ years advising founders, rights holders, executives, and talent. Call (770) 847-7363." />
  <?php endif; ?>

  <!-- OG defaults (Yoast overrides per-page) -->
  <meta property="og:site_name" content="J. Walker &amp; Associates, LLC" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo esc_url( home_url( $_SERVER['REQUEST_URI'] ) ); ?>" />

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ── TOPBAR ─────────────────────────────────────────────────────────── -->
<div id="topbar" role="banner" aria-label="Firm announcement">
  <span class="topbar-text">Our goal every day is to use our resources to touch and inspire and encourage.</span>
</div>

<!-- ── SITE HEADER ────────────────────────────────────────────────────── -->
<header id="site-header" role="banner">
  <div class="header-inner">

    <!-- Logo -->
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-wrap" aria-label="<?php bloginfo( 'name' ); ?> — Home">
      <?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
      <svg class="logo-svg" viewBox="0 0 100 90" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <polygon points="5,8 30,8 50,62 38,62"  fill="currentColor" class="logo-v"/>
        <polygon points="95,8 70,8 50,62 62,62" fill="currentColor" class="logo-v"/>
        <polygon points="50,18 57,34 50,50 43,34" fill="white"/>
        <polygon points="38,68 62,68 50,88"       fill="white"/>
      </svg>
      <?php endif; ?>
      <div class="logo-text">
        <span class="logo-name">Walker</span>
        <span class="logo-sub">&amp; Associates</span>
      </div>
    </a>

    <!-- Primary Nav -->
    <nav id="primary-nav" aria-label="Primary navigation">
      <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'menu_class'     => 'nav-list',
        'container'      => false,
        'fallback_cb'    => function() { ?>
          <ul class="nav-list">
            <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
            <li><a href="<?php echo home_url('/about/'); ?>">About the Firm</a></li>
            <li><a href="<?php echo home_url('/attorney-james-walker/'); ?>">Attorney Walker</a></li>
            <li><a href="<?php echo home_url('/team/'); ?>">Our Team</a></li>
            <li class="has-dropdown has-dropdown-wide">
          <a href="<?php echo home_url('/practice-areas/'); ?>">Practice Areas</a>
          <ul class="nav-dropdown nav-dropdown-cols">
            <li class="pa-all"><a href="<?php echo home_url('/practice-areas/'); ?>"><strong>All Practice Areas</strong></a></li>
            <li class="pa-cols-wrap">
              <ul class="pa-cols">
              <li><a href="<?php echo home_url('/practice-areas/advertising-contracts/'); ?>">Advertising Contracts</a></li>
              <li><a href="<?php echo home_url('/practice-areas/book-deals/'); ?>">Book Deals</a></li>
              <li><a href="<?php echo home_url('/practice-areas/business-disputes/'); ?>">Business Disputes</a></li>
              <li><a href="<?php echo home_url('/practice-areas/business-litigation/'); ?>">Business Litigation</a></li>
              <li><a href="<?php echo home_url('/practice-areas/commercial-contracts/'); ?>">Commercial Contracts</a></li>
              <li><a href="<?php echo home_url('/practice-areas/commercial-litigation/'); ?>">Commercial Litigation</a></li>
              <li><a href="<?php echo home_url('/practice-areas/copyright-law/'); ?>">Copyright Law</a></li>
              <li><a href="<?php echo home_url('/practice-areas/corporate/'); ?>">Corporate</a></li>
              <li><a href="<?php echo home_url('/practice-areas/crisis-management/'); ?>">Crisis Management</a></li>
              <li><a href="<?php echo home_url('/practice-areas/digital-and-streaming/'); ?>">Digital &amp; Streaming</a></li>
              <li><a href="<?php echo home_url('/practice-areas/dispute-resolution/'); ?>">Dispute Resolution</a></li>
              <li><a href="<?php echo home_url('/practice-areas/employment-and-labor/'); ?>">Employment &amp; Labor</a></li>
              <li><a href="<?php echo home_url('/practice-areas/entertainment-law/'); ?>">Entertainment Law</a></li>
              <li><a href="<?php echo home_url('/practice-areas/family-law/'); ?>">Family Law (Divorces, Pre-Nups &amp; More)</a></li>
              <li><a href="<?php echo home_url('/practice-areas/film-deals/'); ?>">Film Deals</a></li>
              <li><a href="<?php echo home_url('/practice-areas/immigration/'); ?>">Immigration</a></li>
              <li><a href="<?php echo home_url('/practice-areas/intellectual-property/'); ?>">Intellectual Property</a></li>
              <li><a href="<?php echo home_url('/practice-areas/internet-protection/'); ?>">Internet Protection</a></li>
              <li><a href="<?php echo home_url('/practice-areas/llc-s-corp-and-c-corp-set-up/'); ?>">LLC, S-Corp &amp; C-Corp Set Up</a></li>
              <li><a href="<?php echo home_url('/practice-areas/personal-injury/'); ?>">Personal Injury</a></li>
              <li><a href="<?php echo home_url('/practice-areas/power-of-attorney/'); ?>">Power of Attorney</a></li>
              <li><a href="<?php echo home_url('/practice-areas/production-and-financing-agreements/'); ?>">Production &amp; Financing Agreements</a></li>
              <li><a href="<?php echo home_url('/practice-areas/publishing-deals/'); ?>">Publishing Deals</a></li>
              <li><a href="<?php echo home_url('/practice-areas/real-estate/'); ?>">Real Estate</a></li>
              <li><a href="<?php echo home_url('/practice-areas/recording-contracts/'); ?>">Recording Contracts</a></li>
              <li><a href="<?php echo home_url('/practice-areas/small-business-governance-and-operations/'); ?>">Small Business Governance &amp; Operations</a></li>
              <li><a href="<?php echo home_url('/practice-areas/synchronization-and-mechanical-licensing/'); ?>">Synchronization &amp; Mechanical Licensing</a></li>
              <li><a href="<?php echo home_url('/practice-areas/taxes/'); ?>">Taxes, 501(c)(3)s &amp; Churches</a></li>
              <li><a href="<?php echo home_url('/practice-areas/trademarks/'); ?>">Trademarks</a></li>
              <li><a href="<?php echo home_url('/practice-areas/wills-and-trusts/'); ?>">Wills &amp; Trusts</a></li>
              </ul>
            </li>
          </ul>
        </li>
            <li class="has-dropdown">
          <a href="<?php echo home_url('/media/'); ?>">Media &amp; Press</a>
          <ul class="nav-dropdown">
            <li><a href="<?php echo home_url('/media/'); ?>">Media &amp; Press</a></li>
            <li><a href="<?php echo home_url('/photos/'); ?>">Photos</a></li>
            <li><a href="<?php echo home_url('/testimonials/'); ?>">Testimonials</a></li>
          </ul>
        </li>
            <li class="has-dropdown">
          <a href="<?php echo home_url('/contact/'); ?>">Contact</a>
          <ul class="nav-dropdown">
            <li><a href="<?php echo home_url('/contact/'); ?>">Contact Us</a></li>
            <li><a href="<?php echo home_url('/consultation/'); ?>">Book a Consultation</a></li>
          </ul>
        </li>
          </ul>
        <?php },
      ]);
      ?>
    </nav>

    <!-- Header CTA -->
    <div class="header-cta">
      <a href="tel:7708477363" class="header-phone">(770) 847-7363</a>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">Schedule Consultation</a>
    </div>

    <!-- Mobile hamburger -->
    <button class="nav-toggle" aria-label="Toggle navigation" aria-expanded="false" aria-controls="primary-nav">
      <span class="hamburger-line"></span>
      <span class="hamburger-line"></span>
      <span class="hamburger-line"></span>
    </button>

  </div>
</header>
