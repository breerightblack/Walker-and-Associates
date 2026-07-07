<?php
/**
 * Template Name: Photos
 */
get_header();
?>

<div class="page-hero">
  <div class="container">
    <span class="eyebrow">Gallery</span>
    <h1>Photos</h1>
  </div>
</div>

<main id="main" role="main">
  <section class="section">
    <div class="container">
      <div style="max-width:560px; margin:0 auto; text-align:center;">
        <h2 style="font-family:var(--font-serif); font-size:clamp(1.75rem,3vw,2.5rem); margin-bottom:var(--space-md); color:var(--text-dark);">Come back soon</h2>
        <p style="color:var(--text-mid); line-height:1.8; margin-bottom:var(--space-xl);">We're putting together our photo gallery. Please check back soon to see it.</p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">Back to Homepage</a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
