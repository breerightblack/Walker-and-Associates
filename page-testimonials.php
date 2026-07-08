<?php
/**
 * Template Name: Testimonials
 */
get_header();

$star = '<svg viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>';

$sample_testimonials = [
  [
    'initials' => 'MJ',
    'name'     => 'Marcus J.',
    'role'     => 'Recording Artist — Atlanta, GA',
    'quote'    => "Attorney Walker and his team handled my label deal with expertise I've never seen from another law firm. They didn't just review the contract — they understood the industry and negotiated terms I didn't even know were possible to get.",
  ],
  [
    'initials' => 'DN',
    'name'     => 'Diane N.',
    'role'     => 'Independent Film Producer',
    'quote'    => 'From our first conversation, I knew this team was different. They handled our film production agreements with the kind of nuanced understanding that only comes from truly being embedded in the industry.',
  ],
  [
    'initials' => 'KT',
    'name'     => 'K. Thomas',
    'role'     => 'Music Executive &amp; Brand Founder',
    'quote'    => 'Walker &amp; Associates protected my brand when I needed it most. They won a case I was told was unwinnable. Their knowledge of entertainment IP law is on another level.',
  ],
  [
    'initials' => 'AR',
    'name'     => 'Angela R.',
    'role'     => 'Author',
    'quote'    => 'Publishing my memoir felt overwhelming until this team stepped in. They negotiated rights I would have signed away and made sure my story stayed mine.',
  ],
  [
    'initials' => 'TB',
    'name'     => 'T. Brooks',
    'role'     => 'Television Producer',
    'quote'    => 'Our production needed counsel who could move as fast as we did. Walker &amp; Associates kept every deal on schedule without ever cutting a corner.',
  ],
  [
    'initials' => 'SK',
    'name'     => 'Sam K.',
    'role'     => 'Playwright &amp; Director',
    'quote'    => "As a first-time playwright, I had no idea what I was signing. Walker &amp; Associates walked me through every clause and made sure the theater respected my rights.",
  ],
];
?>

<div class="page-hero">
  <div class="container">
    <span class="eyebrow">Client Stories</span>
    <h1>Testimonials</h1>
    <p>A preview of the layout — real client testimonials are on the way.</p>
  </div>
</div>

<main id="main" role="main">
  <section class="section">
    <div class="container">
      <div class="testimonials-grid">
        <?php foreach ( $sample_testimonials as $t ) : ?>
        <div class="testimonial-card">
          <div class="testimonial-stars"><?php echo str_repeat( $star, 5 ); ?></div>
          <blockquote><?php echo '"' . $t['quote'] . '"'; ?></blockquote>
          <div class="testimonial-attr">
            <div class="testimonial-initials"><?php echo esc_html( $t['initials'] ); ?></div>
            <div class="testimonial-meta"><strong><?php echo esc_html( $t['name'] ); ?></strong><span><?php echo $t['role']; ?></span></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <p style="text-align:center; color:var(--taupe); font-size:.875rem; margin-top:var(--space-xl);">Sample content shown above — actual client testimonials will replace these placeholders soon.</p>
      <div style="text-align:center; margin-top:var(--space-lg);">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">Back to Homepage</a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
