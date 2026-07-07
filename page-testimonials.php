<?php
/**
 * Template Name: Testimonials
 */
get_header();
?>

<div class="page-hero">
  <div class="container">
    <span class="eyebrow">Client Stories</span>
    <h1>Testimonials</h1>
  </div>
</div>

<main id="main" role="main">
  <section class="section">
    <div class="container">
      <div style="max-width:560px; margin:0 auto; text-align:center;">
        <h2 style="font-family:var(--font-serif); font-size:clamp(1.75rem,3vw,2.5rem); margin-bottom:var(--space-md); color:var(--text-dark);">Come back soon</h2>
        <p style="color:var(--text-mid); line-height:1.8; margin-bottom:var(--space-xl);">We're collecting testimonials from our clients. Please check back soon to see what they have to say.</p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">Back to Homepage</a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
