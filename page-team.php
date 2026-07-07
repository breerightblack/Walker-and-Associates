<?php
/**
 * Template Name: Team Page
 */
get_header();

$team = [
  [
    'slug'  => 'james-walker',
    'name'  => 'James Walker',
    'title' => 'Founding Attorney',
    'file'  => 'james-walker.jpg',
    'focus' => 'Entertainment Law · Film & TV · Litigation',
  ],
  [
    'slug'  => 'j-richard-byrd',
    'name'  => 'J. Richard Byrd',
    'title' => 'COO & Communications Director',
    'file'  => 'j-richard-byrd.jpg',
    'focus' => 'Operations · Communications · Strategy',
  ],
  [
    'slug'  => 'stephanie-hay',
    'name'  => 'Stephanie K. Hay',
    'title' => 'Partner',
    'file'  => 'stephanie-hay.jpg',
    'focus' => 'Film & TV Production · IP Licensing',
  ],
  [
    'slug'  => 'paul-wilson-ii',
    'name'  => 'Paul Wilson II',
    'title' => 'Associate Attorney',
    'file'  => 'paul-wilson-ii.jpg',
    'focus' => 'Entertainment Law · Corporate',
  ],
  [
    'slug'  => 'taja-nave',
    'name'  => 'Taja Nave',
    'title' => 'Incoming Associate Attorney',
    'file'  => 'taja-nave.jpg',
    'focus' => 'Entertainment Law · Contract Review',
  ],
  [
    'slug'  => 'russ-green',
    'name'  => 'Russ Green',
    'title' => 'Executive Assistant',
    'file'  => 'russ-green.jpg',
    'focus' => 'Operations · Business Development',
  ],
  [
    'slug'  => 'khadijah-saifullah',
    'name'  => 'Khadijah Saifullah',
    'title' => 'Director of Finance',
    'file'  => 'khadijah-saifullah.jpg',
    'focus' => 'Financial Management · Compliance',
  ],
  [
    'slug'  => 'gina-e-ryan',
    'name'  => 'Gina E. Ryan',
    'title' => 'Chief PR & Strategic Communications Officer',
    'file'  => 'gina-e-ryan.jpg',
    'focus' => 'Public Relations · Brand Strategy · Media',
  ],
  [
    'slug'  => 'yillian-sarmiento',
    'name'  => 'Yillian Sarmiento',
    'title' => 'Litigation Paralegal',
    'file'  => 'yillian-sarmiento.png',
    'focus' => 'Litigation Support · Case Management',
  ],
  [
    'slug'  => 'sarah-manowitz',
    'name'  => 'Sarah Manowitz',
    'title' => 'Paralegal / Law Clerk',
    'file'  => 'sarah-manowitz.png',
    'focus' => 'Legal Research · Document Drafting',
  ],
  [
    'slug'  => 'joel-snellings',
    'name'  => 'Joél Snellings',
    'title' => 'Legal Intern',
    'file'  => 'joel-snellings.jpg',
    'focus' => 'Entertainment Law Research',
  ],
  [
    'slug'  => 'blythe-silvetz',
    'name'  => 'Blythe Silvetz',
    'title' => 'Communications & Social Media Intern',
    'file'  => 'blythe-silvetz.png',
    'focus' => 'Social Media · Content · Communications',
  ],
  [
    'slug'  => 'enrique-ramos',
    'name'  => 'Enrique Ramos',
    'title' => 'Personal Injury Attorney',
    'file'  => null,
    'focus' => 'Personal Injury · Automobile & Motorcycle Accidents',
  ],
];
?>

<div class="page-hero">
  <div class="container">
    <span class="eyebrow">Our People</span>
    <h1>Meet the Team</h1>
    <p>13 attorneys and professionals united by a commitment to excellence, creativity, and client success.</p>
  </div>
</div>

<main id="main" role="main">
  <div class="container">
    <div class="team-full-grid">
      <?php foreach ( $team as $member ) :
        $url = esc_url( home_url( '/team/' . $member['slug'] . '/' ) );
      ?>
      <div class="team-full-card">
        <a href="<?php echo $url; ?>">
          <?php if ( $member['file'] ) : ?>
          <img
            class="team-full-photo"
            src="<?php echo esc_url( wa_img( 'team/' . $member['file'] ) ); ?>"
            alt="<?php echo esc_attr( $member['name'] ); ?>"
            loading="lazy"
          >
          <?php else : ?>
          <div style="width:100%; aspect-ratio:3/4; background:linear-gradient(135deg,var(--navy),#1B2F5E); border-radius:8px; display:flex; align-items:center; justify-content:center; margin-bottom:var(--space-md);">
            <span style="color:var(--gold-light); font-family:'Cormorant Garamond',serif; font-size:4rem;"><?php
              $initials = '';
              foreach ( explode( ' ', $member['name'] ) as $part ) { $initials .= mb_substr( $part, 0, 1 ); }
              echo esc_html( $initials );
            ?></span>
          </div>
          <?php endif; ?>
          <div class="team-full-name"><?php echo esc_html( $member['name'] ); ?></div>
          <div class="team-full-title"><?php echo esc_html( $member['title'] ); ?></div>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
