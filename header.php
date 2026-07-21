<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <!-- SEO: Primary meta description fallback (Yoast overrides this) -->
  <?php if ( is_front_page() ) : ?>
  <meta name="description" content="Atlanta entertainment law firm specializing in film, television, and music law. J. Walker and Associates represents musicians, filmmakers, and talent nationwide. Call (770) 847-7363." />
  <?php endif; ?>

  <!-- OG defaults (Yoast overrides per-page) -->
  <meta property="og:site_name" content="J. Walker and Associates, LLP" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo esc_url( home_url( $_SERVER['REQUEST_URI'] ) ); ?>" />

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ── TOPBAR ─────────────────────────────────────────────────────────── -->
<div id="topbar" role="banner" aria-label="Firm announcement">
  <span class="topbar-text">
    Expanding into Film &amp; Television —
    <a href="<?php echo esc_url( home_url( '/practice-areas/' ) ); ?>">Explore our new practice areas →</a>
  </span>
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
            <li><a href="<?php echo home_url('/practice-areas/'); ?>">Practice Areas</a></li>
            <li><a href="<?php echo home_url('/media/'); ?>">Media &amp; Press</a></li>
            <li><a href="<?php echo home_url('/contact/'); ?>">Contact</a></li>
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
