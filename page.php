<?php
/**
 * Generic page fallback.
 *
 * Used for any WordPress page that has no matching page-{slug}.php template —
 * i.e. pages the firm creates later from the WP editor. Hand-authored
 * (no .html source). Safe to edit directly.
 */
get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="page-hero">
  <div class="container">
    <h1><?php the_title(); ?></h1>
  </div>
</div>

<main id="main" role="main">
  <section class="section">
    <div class="container">
      <div class="entry-content" style="max-width:760px;">
        <?php the_content(); ?>
      </div>
    </div>
  </section>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>
