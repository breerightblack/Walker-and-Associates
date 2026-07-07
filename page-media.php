<?php
/**
 * Template Name: Media & Press (Five A's)
 */
get_header();
?>

<div class="page-hero">
  <div class="container">
    <span class="eyebrow">Media &amp; Press</span>
    <h1>Industry Recognition</h1>
    <p>Recognition from the industry, peers, and press that reflects Walker &amp; Associates' commitment to excellence.</p>
  </div>
</div>

<main id="main" role="main">

<?php
$sections = [
  'awards' => [
    'label'   => 'Awards',
    'cpt'     => 'wa_awards',
    'eyebrow' => 'Recognition',
    'heading' => 'Awards &amp; Rankings',
    'icon'    => '<path d="M8.21 13.89L7 23l5-3 5 3-1.21-9.12M12 2l2.4 6.72H21l-5.75 4.18 2.17 6.82L12 15.78 6.58 19.72l2.17-6.82L3 8.72h6.6z"/>',
  ],
  'accolades' => [
    'label'   => 'Accolades',
    'cpt'     => 'wa_accolades',
    'eyebrow' => 'Peer Recognition',
    'heading' => 'Industry Accolades',
    'icon'    => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
  ],
  'appearances' => [
    'label'   => 'Appearances',
    'cpt'     => 'wa_appearances',
    'eyebrow' => 'On Camera & On Stage',
    'heading' => 'Media Appearances &amp; Speaking',
    'icon'    => '<rect x="2" y="2" width="20" height="20" rx="2.18"/><path d="M7 2v20M17 2v20M2 12h20M2 7h5M2 17h5M17 17h5M17 7h5"/>',
  ],
  'articles' => [
    'label'   => 'Articles',
    'cpt'     => 'wa_articles',
    'eyebrow' => 'Published Work',
    'heading' => 'Articles &amp; Press Features',
    'icon'    => '<path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/>',
  ],
  'press' => [
    'label'    => 'Press',
    'cpt'      => 'wa_press',
    'eyebrow'  => 'External Coverage',
    'heading'  => 'In the Press',
    'icon'     => '<circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20 15.3 15.3 0 010-20z"/>',
    'external' => true,
  ],
  'announcements' => [
    'label'   => 'Announcements',
    'cpt'     => 'wa_announcements',
    'eyebrow' => 'Firm News',
    'heading' => 'Announcements',
    'icon'    => '<path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0"/>',
  ],
];

foreach ( $sections as $key => $config ) :
  $query = new WP_Query([
    'post_type'      => $config['cpt'],
    'posts_per_page' => 9,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ]);
?>

<section id="<?php echo esc_attr( $key ); ?>" class="section <?php echo $key === 'accolades' ? 'section-alt' : ''; ?>" aria-labelledby="heading-<?php echo esc_attr( $key ); ?>">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow"><?php echo $config['eyebrow']; ?></span>
      <h2 id="heading-<?php echo esc_attr( $key ); ?>"><?php echo $config['heading']; ?></h2>
    </div>

    <div class="three-col-grid">

      <?php
      $link_attrs = ! empty( $config['external'] ) ? ' target="_blank" rel="noopener noreferrer"' : '';
      if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();
          $link = get_post_meta( get_the_ID(), '_wa_article_url', true );
      ?>
        <div class="five-as-card">
          <div class="card-year"><?php echo esc_html( get_the_date('F Y') ); ?></div>
          <h4><?php the_title(); ?></h4>
          <p><?php the_excerpt(); ?></p>
          <?php if ( $link ) : ?>
            <a href="<?php echo esc_url( $link ); ?>" class="card-link"<?php echo $link_attrs; ?>>Read More</a>
          <?php endif; ?>
        </div>
      <?php endwhile; wp_reset_postdata();

      else :
        // Placeholder content per section
        $placeholders = [
          'awards' => [
            ['year'=>'2024','title'=>'Super Lawyers — Entertainment & Sports Law','body'=>'Attorney James Walker selected to the 2024 Super Lawyers list, recognizing attorneys with a high degree of peer recognition and professional achievement in Entertainment & Sports Law.'],
            ['year'=>'2023','title'=>'Best Law Firms — Atlanta Magazine','body'=>'Walker & Associates recognized among Atlanta\'s Best Law Firms for Entertainment Law in the annual Atlanta Magazine ranking of top regional legal practices.'],
            ['year'=>'2022','title'=>'Georgia Trend Legal Elite','body'=>'Selected to the Georgia Trend Legal Elite list, honoring top attorneys as voted by their peers in the state bar across all major practice areas.'],
          ],
          'accolades' => [
            ['year'=>'2024','title'=>'Martindale-Hubbell AV Preeminent Rating','body'=>'The firm holds the highest possible rating in both legal ability and ethical standards — a designation fewer than 10% of attorneys receive.'],
            ['year'=>'2023','title'=>'GRAMMY Recording Academy — Voting Member','body'=>'Attorney Walker serves as a Voting Member of the Recording Academy, recognizing his deep ties to and advocacy for the music community.'],
            ['year'=>'2022','title'=>'Top 100 Black Lawyers — National Bar Association','body'=>'Named to the National Bar Association\'s Top 100 Black Lawyers, honoring excellence in legal service, leadership, and community impact.'],
          ],
          'appearances' => [
            ['year'=>'2024','title'=>'BET+ Original Series — Legal Consultant','body'=>'Served as on-set legal consultant for a BET+ original series filmed in Atlanta, advising on clearance, talent agreements, and production legal matters.'],
            ['year'=>'2024','title'=>'NAACP LDF — Panel Speaker','body'=>'Featured speaker at the NAACP Legal Defense Fund entertainment law symposium, addressing IP rights for Black creators in the streaming era.'],
            ['year'=>'2023','title'=>'Urban One Radio — "Your Legal Rights" Segment','body'=>'Monthly recurring legal commentary segment on Urban One Radio Atlanta, educating listeners on entertainment contracts and artist rights.'],
          ],
          'articles' => [
            ['year'=>'September 4, 2024','title'=>'Judge Rules Trump Cannot Use Isaac Hayes Song at Rally','link'=>'https://walkerandassoc.com/1438-2/'],
            ['year'=>'September 3, 2024','title'=>'Judge Blocks Trump Campaign from Using Iconic Isaac Hayes Song: A Victory for Artists\' Rights','link'=>'https://walkerandassoc.com/judge-blocks-trump-campaign-from-using-iconic-isaac-hayes-song-a-victory-for-artists-rights/'],
            ['year'=>'September 2, 2024','title'=>'Family of Isaac Hayes Granted Day in Court – The Reid Out','link'=>'https://walkerandassoc.com/family-of-isaac-hayes-granted-day-in-court-the-reid-out/'],
            ['year'=>'September 1, 2024','title'=>'Isaac Hayes Son Says Family Plans to Sue Donald Trump – Scripps News','link'=>'https://walkerandassoc.com/isaac-hayes-son-says-family-plans-to-sue-donald-trump-scripps-news/'],
            ['year'=>'September 1, 2024','title'=>'Isaac Hayes Family Smack Donald Trump with Lawsuit – Roland Martin','link'=>'https://walkerandassoc.com/isaac-hayes-family-smack-donald-trump-with-lawsuit-roland-martin/'],
            ['year'=>'April 15, 2024','title'=>'Congratulations to Attorney James L. Walker, Jr. on Being Named One of Billboard Magazine\'s Top Entertainment Attorneys for 2024','link'=>'https://walkerandassoc.com/congratulations-to-attorney-james-l-walker-jr-on-being-named-one-of-billboard-magazines-top-entertainment-attorneys-for-2024/'],
            ['year'=>'July 10, 2023','title'=>'Call to Action – Darlene McCoy','link'=>'https://walkerandassoc.com/call-to-action/'],
            ['year'=>'April 19, 2022','title'=>'H.E.R.\'s "Could\'ve Been" Song Hit with Another Copyright Infringement Lawsuit','link'=>'https://walkerandassoc.com/491-2/'],
            ['year'=>'August 5, 2021','title'=>'Three Reasons: Political, Civil & Criminal! Why Gov. Cuomo Must Resign Immediately!','link'=>'https://walkerandassoc.com/three-reasons-political-civil-criminal-why-gov-cuomo-must-resign-immediately/'],
            ['year'=>'February 11, 2021','title'=>'The Source: H.E.R. Was Reportedly Sued For Alleged Copyright Infringement For \'Focus\'','link'=>'https://walkerandassoc.com/457-2/'],
          ],
          'press' => [
            ['year'=>'PRLog','title'=>'Entertainment Attorney James L. Walker Jr. Successfully Settles Copyright Infringement Lawsuit on Behalf of Take 6 and Co-Writers','link'=>'https://www.prlog.org/12961180-entertainment-attorney-james-walker-jr-successfully-settles-copyright-infringement-lawsuit-on-behalf-of-take-6-and-co-writers.html'],
            ['year'=>'PRWeb','title'=>'Prominent Entertainment Lawyer James L. Walker, Jr. Buys Landmark Building in Greater Atlanta — Becoming a Major Legal Force in the Georgia Area','link'=>'https://www.prweb.com/releases/2017/07/prweb14476061.htm'],
            ['year'=>'Business Wire','title'=>'Black-Owned Law Firm Walker and Associates, LLP Announces That Sony BMG Settles Major Legal Battle for the Rights of Artists','link'=>'https://www.businesswire.com/news/home/20130429005470/en/CORRECTING-and-REPLACING-Black-Owned-Law-Firm-Walker-and-Associates-LLP-Announces-That-Sony-BMG-Settles-Major-Legal-Battle-for-the-Rights-of-Artists'],
            ['year'=>'CBS News','title'=>'Howard Student Is Falsely Accused of Embezzling Over $400K','link'=>'https://www.cbsnews.com/video/tyrone-hankerson-howard-university-speaks-out/'],
            ['year'=>'Penguin Random House','title'=>'This Business of Urban Music: A Practical Guide to Achieving Success in the Industry, from Gospel to Funk to R&B to Hip-Hop','link'=>'https://www.penguinrandomhouse.ca/books/184924/this-business-of-urban-music-by-james-l-walker-jr/9780307874979'],
          ],
          'announcements' => [
            ['year'=>'June 2024','title'=>'Firm Launches Film & Television Practice','body'=>'Walker & Associates formally launches its Film & Television practice area with the addition of Of Counsel Stephanie K. Hay, bringing 15+ years of production legal experience.'],
            ['year'=>'April 2024','title'=>'Taja Nave Joins as Incoming Associate Attorney','body'=>'We welcome Taja Nave to the Walker & Associates family as an incoming Associate Attorney, bringing a passion for entertainment law from Emory University School of Law.'],
            ['year'=>'Jan 2024','title'=>'Official Legal Partner — American Black Film Festival','body'=>'Designated as official legal partner of ABFF, providing pro bono contract review services for emerging filmmakers in the competition program.'],
          ],
        ];

        if ( isset( $placeholders[$key] ) ) :
          foreach ( $placeholders[$key] as $p ) : ?>
            <div class="five-as-card">
              <div class="card-year"><?php echo esc_html( $p['year'] ); ?></div>
              <h4><?php echo esc_html( $p['title'] ); ?></h4>
              <?php if ( ! empty( $p['body'] ) ) : ?>
                <p><?php echo esc_html( $p['body'] ); ?></p>
              <?php endif; ?>
              <?php if ( ! empty( $p['link'] ) ) : ?>
                <a href="<?php echo esc_url( $p['link'] ); ?>" class="card-link"<?php echo $link_attrs; ?>>Read More</a>
              <?php endif; ?>
            </div>
          <?php endforeach;
        endif;
      endif; ?>

    </div><!-- /.grid -->

    <p style="margin-top:var(--space-lg); font-size:.875rem; color:var(--taupe);">
      This section is managed from the WordPress admin. Add <?php echo esc_html( $config['label'] ); ?> entries via <strong><?php echo esc_html( $config['label'] ); ?></strong> in the dashboard.
    </p>

  </div>
</section>

<?php endforeach; ?>

</main>

<?php get_footer(); ?>
