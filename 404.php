<?php
/**
 * 404 — page not found.
 *
 * Hand-authored (no .html source). Safe to edit directly.
 */
get_header();
?>

<div class="page-hero">
  <div class="container">
    <span class="eyebrow">Error 404</span>
    <h1>Page Not Found</h1>
    <p>The page you're looking for has moved or no longer exists.</p>
  </div>
</div>

<main id="main" role="main">
  <section class="section">
    <div class="container">
      <div style="max-width:640px;">
        <p style="color:var(--text-mid);line-height:1.8;margin-bottom:var(--space-lg);">Try one of these instead, or call us directly and we'll point you to the right place.</p>

        <ul style="list-style:none;display:grid;gap:2px;margin-bottom:var(--space-xl);">
          <li><a href="<?php echo home_url( '/' ); ?>" style="display:block;padding:12px 8px;border-bottom:1px solid var(--color-border);color:var(--text-dark);">Home</a></li>
          <li><a href="<?php echo home_url( '/practice-areas/' ); ?>" style="display:block;padding:12px 8px;border-bottom:1px solid var(--color-border);color:var(--text-dark);">Practice Areas</a></li>
          <li><a href="<?php echo home_url( '/all-practice-areas/' ); ?>" style="display:block;padding:12px 8px;border-bottom:1px solid var(--color-border);color:var(--text-dark);">All 30 Practice Areas</a></li>
          <li><a href="<?php echo home_url( '/team/' ); ?>" style="display:block;padding:12px 8px;border-bottom:1px solid var(--color-border);color:var(--text-dark);">Our Team</a></li>
          <li><a href="<?php echo home_url( '/contact/' ); ?>" style="display:block;padding:12px 8px;border-bottom:1px solid var(--color-border);color:var(--text-dark);">Contact</a></li>
        </ul>

        <a href="<?php echo home_url( '/contact/' ); ?>" class="btn btn-primary">Schedule a Consultation</a>
        <a href="tel:7708477363" style="display:inline-block;margin-left:var(--space-md);font-size:13px;font-weight:600;color:var(--taupe);">(770) 847-7363</a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
