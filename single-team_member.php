<?php
/**
 * Single Team Member bio page
 * Used for all 12 team members.
 * GENERATED from team/*.html by _build/gen-team-bios.py — do not hand-edit the $bios array.
 */

$bios = [

  'james-walker' => [
    'name'  => 'James Walker',
    'title' => 'Founding Attorney',
    'file'  => 'James.jpg',
    'focus' => [ 'Television &amp; Film', 'Theatre &amp; Broadway', 'Music &amp; Recording', 'Intellectual Property', 'Entertainment Litigation' ],
    'bio'   => [
      'p',
      'h3',
      'p',
      'p',
      'h3',
      'p',
      'h3',
      'p',
      'h3',
      'p',
      'h3',
      'p',
      'p',
    ],
  ],

  'paul-wilson-ii' => [
    'name'  => 'Paul Wilson II',
    'title' => 'Attorney',
    'file'  => 'paul-wilson-ii.jpg',
    'focus' => [ 'Entertainment Law', 'Corporate Law', 'Contract Negotiation' ],
    'bio'   => [
      'p',
      'p',
      'p',
    ],
  ],

  'enrique-ramos' => [
    'name'  => 'Enrique Ramos',
    'title' => 'Attorney',
    'file'  => 'enrique-ramos.jpg',
    'focus' => [ 'Personal Injury Litigation', 'Automobile &amp; Motorcycle Accidents', 'Premises Liability', 'Serious Injury Matters' ],
    'bio'   => [
      'p',
      'p',
      'p',
      'p',
    ],
  ],

  'stephanie-hay' => [
    'name'  => 'Stephanie K. Hay',
    'title' => 'Of Counsel — Film &amp; Television',
    'file'  => 'stephanie-hay.jpg',
    'focus' => [ 'Film &amp; Television', 'Music', 'Podcasting', 'Influencer Partnerships', 'NIL Deals' ],
    'bio'   => [
      'p',
      'p',
      'h3',
      'p',
      'h3',
      'p',
    ],
  ],

  'taja-nave' => [
    'name'  => 'Taja Nave',
    'title' => 'Incoming Associate Attorney',
    'file'  => 'taja-nave.jpg',
    'focus' => [ 'Entertainment Law', 'Intellectual Property', 'Contract Review', 'Artist Rights' ],
    'bio'   => [
      'p',
      'p',
      'p',
      'p',
    ],
  ],

  'russ-green' => [
    'name'  => 'Russ Green',
    'title' => 'Executive Assistant',
    'file'  => 'russ-green.jpg',
    'focus' => [ 'Operations Support', 'Client Relations', 'Scheduling &amp; Coordination' ],
    'bio'   => [
      'p',
      'p',
      'p',
    ],
  ],

  'j-richard-byrd' => [
    'name'  => 'J. Richard Byrd',
    'title' => 'COO &amp; Communications Director',
    'file'  => 'Richard.webp',
    'focus' => [ 'Crisis Management', 'Strategic Communications', 'Business Development', 'Media &amp; Content' ],
    'bio'   => [
      'p',
      'p',
      'p',
    ],
  ],

  'gina-e-ryan' => [
    'name'  => 'Gina E. Ryan',
    'title' => 'Chief PR &amp; Strategic Communications Officer',
    'file'  => 'gina-e-ryan.jpg',
    'focus' => [ 'Public Relations', 'Brand Strategy', 'Media Relations', 'Crisis Communications' ],
    'bio'   => [
      'p',
      'p',
      'p',
      'p',
    ],
  ],

  'yillian-sarmiento' => [
    'name'  => 'Yillian Sarmiento',
    'title' => 'Litigation Paralegal',
    'file'  => 'yillian-sarmiento.png',
    'focus' => [ 'Litigation Support', 'Case Management', 'Legal Research', 'Document Preparation' ],
    'bio'   => [
      'p',
      'p',
      'p',
    ],
  ],

  'sarah-manowitz' => [
    'name'  => 'Sarah Manowitz',
    'title' => 'Paralegal / Law Clerk',
    'file'  => 'sarah-manowitz.png',
    'focus' => [ 'Legal Research', 'Contract Review', 'Document Drafting', 'Client Communication' ],
    'bio'   => [
      'p',
      'p',
      'p',
      'p',
    ],
  ],

  'joel-snellings' => [
    'name'  => 'Joél Snellings',
    'title' => 'Legal Intern',
    'file'  => 'joel-snellings.jpg',
    'focus' => [ 'Legal Research', 'Entertainment Law', 'Contract Analysis' ],
    'bio'   => [
      'p',
      'p',
      'p',
      'p',
    ],
  ],

  'blythe-silvetz' => [
    'name'  => 'Blythe Silvetz',
    'title' => 'Communications &amp; Social Media Intern',
    'file'  => 'blythe-silvetz.png',
    'focus' => [ 'Social Media', 'Content Creation', 'Digital Communications', 'Brand Awareness' ],
    'bio'   => [
      'p',
      'p',
      'p',
    ],
  ],

];

get_header();

// Resolve the current team member from the URL slug
$current_slug = get_query_var('name');
if ( ! $current_slug ) {
    // Fallback: try to match by post slug if this is a real CPT post
    $current_slug = get_post_field( 'post_name', get_the_ID() );
}

$member = isset( $bios[ $current_slug ] ) ? $bios[ $current_slug ] : null;
?>

<main id="main" role="main">

<?php if ( $member ) : ?>

<div class="page-hero" style="background: var(--tan-pale);">
  <div class="container" style="display:flex; align-items:center; gap:12px;">
    <a href="<?php echo esc_url( home_url('/team/') ); ?>" style="color:var(--taupe); font-size:13px; font-weight:500;">← Our Team</a>
    <span style="color:var(--color-border);">/</span>
    <span style="color:var(--text-mid); font-size:13px;"><?php echo esc_html( $member['name'] ); ?></span>
  </div>
</div>

<div class="container">
  <div class="bio-layout">

    <!-- Sidebar: Photo + Quick info -->
    <aside class="bio-sidebar">
      <img
        class="bio-photo"
        src="<?php echo esc_url( wa_img( 'team/' . $member['file'] ) ); ?>"
        alt="<?php echo esc_attr( $member['name'] ); ?>"
      >
      <h1 class="bio-name"><?php echo esc_html( $member['name'] ); ?></h1>
      <p class="bio-title"><?php echo esc_html( $member['title'] ); ?></p>

      <?php if ( ! empty( $member['focus'] ) ) : ?>
      <div style="margin-top: var(--space-lg);">
        <p style="font-size:11px; font-weight:600; letter-spacing:.12em; text-transform:uppercase; color:var(--taupe); margin-bottom:var(--space-sm);">Practice Focus</p>
        <div style="display:flex; flex-direction:column; gap:8px;">
          <?php foreach ( $member['focus'] as $area ) : ?>
          <span style="font-size:.875rem; color:var(--text-mid); display:flex; align-items:center; gap:8px;">
            <span style="width:6px; height:6px; border-radius:50%; background:var(--gold-dark); flex-shrink:0;"></span>
            <?php echo esc_html( $area ); ?>
          </span>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <div style="margin-top: var(--space-xl);">
        <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="btn btn-primary" style="width:100%; justify-content:center;">Schedule a Consultation</a>
        <a href="tel:7708477363" style="display:block; text-align:center; margin-top:var(--space-sm); font-size:13px; font-weight:600; color:var(--taupe);">(770) 847-7363</a>
      </div>
    </aside>

    <!-- Main bio content -->
    <article class="bio-content">
      <?php if ( have_posts() ) : the_post(); ?>
        <?php if ( get_the_content() ) : ?>
          <?php the_content(); ?>
        <?php else : ?>
          <?php foreach ( $member['bio'] as $block ) : ?>
          <?php echo wp_kses_post( $block ); ?>
          <?php endforeach; ?>
        <?php endif; ?>
      <?php else : ?>
        <?php foreach ( $member['bio'] as $block ) : ?>
        <?php echo wp_kses_post( $block ); ?>
        <?php endforeach; ?>
      <?php endif; ?>
    </article>

  </div>
</div>

<?php else : ?>
<div class="container" style="padding: var(--space-2xl) 48px;">
  <h1>Team Member Not Found</h1>
  <p><a href="<?php echo esc_url( home_url('/team/') ); ?>">← Back to Our Team</a></p>
</div>
<?php endif; ?>

</main>

<?php get_footer(); ?>
