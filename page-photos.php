<?php
/**
 * Template Name: Photos
 */
get_header();

$gallery_placeholders = [
  [ 'label' => 'Firm Headquarters',     'tile' => 1 ],
  [ 'label' => 'Attorney Walker',       'tile' => 2 ],
  [ 'label' => 'Our Team',              'tile' => 3 ],
  [ 'label' => 'Client Consultations',  'tile' => 4 ],
  [ 'label' => 'Conference Room',       'tile' => 2 ],
  [ 'label' => 'Awards &amp; Recognition',   'tile' => 1 ],
  [ 'label' => 'Community Events',      'tile' => 3 ],
  [ 'label' => 'Behind the Scenes',     'tile' => 4 ],
  [ 'label' => 'Downtown Atlanta',      'tile' => 2 ],
];
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
      <div class="photo-gallery-grid">
        <?php foreach ( $gallery_placeholders as $tile ) : ?>
        <div class="photo-tile photo-tile--<?php echo (int) $tile['tile']; ?>">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="12" cy="12" r="3.5"/><path d="M8 5l1.5-2h5L16 5"/></svg>
          <span><?php echo $tile['label']; ?></span>
        </div>
        <?php endforeach; ?>
      </div>
      <p style="text-align:center; color:var(--taupe); font-size:.875rem; margin-top:var(--space-xl);">Sample layout shown above — actual photos will replace these placeholders soon.</p>
      <div style="text-align:center; margin-top:var(--space-lg);">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">Back to Homepage</a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
