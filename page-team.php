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
];
?>

<div class="page-hero">
  <div class="container">
    <span class="eyebrow">Our People</span>
    <h1>Meet the Team</h1>
    <p>12 attorneys and professionals united by a commitment to excellence, creativity, and client success.</p>
  </div>
</div>

<main id="main" role="main">
  <div class="container">
    <div class="team-full-grid">
      <?php foreach ( $team as $member ) :
        $photo = wa_img( 'team/' . $member['file'] );
        $url   = esc_url( home_url( '/team/' . $member['slug'] . '/' ) );
      ?>
      <div class="team-full-card">
        <a href="<?php echo $url; ?>">
          <img
            class="team-full-photo"
            src="<?php echo esc_url( $photo ); ?>"
            alt="<?php echo esc_attr( $member['name'] ); ?>"
            loading="lazy"
          >
          <div class="team-full-name"><?php echo esc_html( $member['name'] ); ?></div>
          <div class="team-full-title"><?php echo esc_html( $member['title'] ); ?></div>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
