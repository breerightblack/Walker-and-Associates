<?php
/**
 * Template Name: Photos
 *
 * GENERATED from photos.html by _build/html-to-php.py — do not hand-edit.
 * Edit photos.html, then re-run the build script.
 */
get_header();
?>

<div class="page-hero">
  <div class="container">
    <span class="eyebrow">Gallery</span>
    <h1>Photos</h1>
    <p>A preview of the gallery layout — real photos are on the way.</p>
  </div>
</div>

<main id="main" role="main">
  <section class="section">
    <div class="container">
      <div style="text-align:center;padding:var(--space-3xl) 0;">
        <div style="width:64px;height:64px;border-radius:50%;background:var(--bg-light);display:flex;align-items:center;justify-content:center;margin:0 auto var(--space-lg);">
          <svg viewBox="0 0 24 24" fill="none" stroke="var(--navy)" stroke-width="1.5" style="width:28px;height:28px;"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="12" cy="12" r="3.5"/><path d="M8 5l1.5-2h5L16 5"/></svg>
        </div>
        <h2 style="font-family:var(--font-serif);font-size:clamp(1.75rem,3vw,2.5rem);font-weight:300;margin-bottom:var(--space-md);color:var(--text-dark);">Coming Soon</h2>
        <p style="color:var(--taupe);font-size:1rem;max-width:420px;margin:0 auto var(--space-xl);line-height:1.7;">We're curating a gallery of moments from the firm — events, milestones, and the people behind the work. Check back soon.</p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-outline">Back to Homepage</a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
