<?php get_header(); ?>

<main id="main" role="main">

<!-- ── HERO ──────────────────────────────────────────────────── -->
<section class="hero" aria-label="Hero">
  <video class="hero-video" autoplay muted loop playsinline>
    <source src="<?php echo esc_url( get_template_directory_uri() . '/assets/video/hero.mp4' ); ?>" type="video/mp4">
  </video>
  <div class="hero-overlay" aria-hidden="true"></div>
  <div class="hero-content">
    <div class="hero-body">
      <p class="hero-eyebrow">Atlanta Entertainment Law · Film &amp; Television · Music</p>
      <h1>
        Representing the<br>
        <em>voices that move</em><br>
        culture forward
      </h1>
      <p>
        From the recording studio to the production stage, J. Walker and Associates
        has protected artists, filmmakers, and talent for over 25 years.
        Your story deserves counsel that understands the industry.
      </p>
      <div class="hero-actions">
        <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="btn btn-accent">Schedule a Consultation</a>
        <a href="<?php echo esc_url( home_url('/practice-areas/') ); ?>" class="btn btn-outline-light">Explore Practice Areas</a>
      </div>
    </div>
  </div>
</section>

<!-- ── CREDIBILITY BAR ────────────────────────────────────────── -->
<div class="credibility-bar" aria-label="Press mentions">
  <div class="credibility-bar-inner">
    <span class="credibility-label">As Seen In</span>
    <div class="credibility-divider" aria-hidden="true"></div>
    <div class="credibility-logos" aria-label="Media outlets">
      <span>Rolling Stone</span>
      <span>Billboard</span>
      <span>The Hollywood Reporter</span>
      <span>Variety</span>
      <span>Atlanta Business Chronicle</span>
    </div>
    <div class="credibility-divider" aria-hidden="true"></div>
    <div class="credibility-stat">
      <strong data-target="25" data-suffix="+">25+</strong>
      Years in Practice
    </div>
    <div class="credibility-stat">
      <strong data-target="500" data-suffix="+">500+</strong>
      Clients Served
    </div>
    <div class="credibility-stat">
      <strong data-target="12">12</strong>
      Attorneys &amp; Professionals
    </div>
  </div>
</div>

<!-- ── ABOUT INTRO ────────────────────────────────────────────── -->
<section class="section about-intro" aria-labelledby="about-heading">
  <div class="about-intro-grid container">
    <div class="about-intro-text">
      <div class="section-header">
        <span class="eyebrow">About the Firm</span>
        <h2 id="about-heading">
          A cutting-edge law firm built for the entertainment industry
        </h2>
      </div>
      <p>
        Walker &amp; Associates is a cutting-edge law firm that provides top-tier legal
        services tailored to your unique needs. We bring institutional knowledge,
        creative strategy, and unwavering advocacy to every matter — from record deal
        negotiations to major motion picture transactions.
      </p>
      <p>
        Founded by Attorney James Walker and headquartered in Atlanta, the firm has
        grown from a music-industry powerhouse into one of the Southeast's premier
        entertainment, film &amp; television legal practices. Our team understands not
        just the law — but the business of creativity.
      </p>
      <a href="<?php echo esc_url( home_url('/about/') ); ?>" class="btn btn-outline">Learn About the Firm</a>
    </div>
    <div class="about-intro-visual">
      <img
        class="about-intro-img"
        src="<?php echo esc_url( wa_img('courthouse.jpg') ); ?>"
        alt="Walker &amp; Associates firm exterior, Atlanta Georgia"
        loading="lazy"
        onerror="this.style.display='none'"
      >
      <div class="about-intro-accent">
        <strong>25+</strong>
        <span>Years of excellence in entertainment law</span>
      </div>
    </div>
  </div>
</section>

<!-- ── MISSION ────────────────────────────────────────────────── -->
<section class="section section-dark" aria-labelledby="mission-heading">
  <div class="container">
    <div style="max-width:800px; margin:0 auto; text-align:center;">
      <span class="eyebrow" style="color:var(--gold-light);">Our Mission</span>
      <h2 id="mission-heading" style="font-family:var(--font-serif); font-style:italic; font-size:clamp(1.75rem,2.8vw,2.75rem); color:var(--white); line-height:1.3;">
        "Our goal every day is to use our resources to touch and inspire and encourage."
      </h2>
    </div>
  </div>
</section>

<!-- ── STATS BAR ──────────────────────────────────────────────── -->
<div class="stats-bar" aria-label="Firm statistics">
  <div class="container">
    <div class="stats-grid">
      <div class="stat-item">
        <div class="stat-number" data-target="25" data-suffix="+">25+</div>
        <div class="stat-label">Years in Practice</div>
      </div>
      <div class="stat-item">
        <div class="stat-number" data-target="500" data-suffix="+">500+</div>
        <div class="stat-label">Clients Represented</div>
      </div>
      <div class="stat-item">
        <div class="stat-number" data-target="5">5</div>
        <div class="stat-label">Practice Areas</div>
      </div>
      <div class="stat-item">
        <div class="stat-number" data-target="12">12</div>
        <div class="stat-label">Legal Professionals</div>
      </div>
    </div>
  </div>
</div>

<!-- ── PRACTICE AREAS ─────────────────────────────────────────── -->
<section class="section practice-areas" aria-labelledby="practice-heading">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">What We Do</span>
      <h2 id="practice-heading">Comprehensive Entertainment Legal Services</h2>
      <p>From your first contract to your landmark deal — we protect what you've built and position you for what's next.</p>
    </div>

    <div class="practice-grid">

      <div class="practice-card featured">
        <div class="practice-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M7 4V20M17 4V20M3 8H7M17 8H21M3 16H7M17 16H21M7 8H17V16H7V8Z"/></svg>
        </div>
        <h3>Film &amp; Television Law</h3>
        <p>Production agreements, talent contracts, IP licensing, co-production deals, and distribution negotiations for the screen industry. New — and growing.</p>
        <a href="<?php echo home_url('/practice-areas/#film-tv'); ?>" class="practice-link">Learn More</a>
      </div>

      <div class="practice-card">
        <div class="practice-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2z"/></svg>
        </div>
        <h3>Entertainment Law</h3>
        <p>Recording contracts, publishing deals, management agreements, touring, and artist rights — comprehensive counsel for music industry professionals.</p>
        <a href="<?php echo home_url('/practice-areas/#entertainment'); ?>" class="practice-link">Learn More</a>
      </div>

      <div class="practice-card">
        <div class="practice-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 6h18M3 10h18M3 14h18M3 18h18" stroke-linecap="round"/></svg>
        </div>
        <h3>Litigation</h3>
        <p>When disputes escalate, our experienced litigators provide aggressive, strategic representation to protect your interests in state and federal court.</p>
        <a href="<?php echo home_url('/practice-areas/#litigation'); ?>" class="practice-link">Learn More</a>
      </div>

      <div class="practice-card">
        <div class="practice-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/></svg>
        </div>
        <h3>Corporate Law</h3>
        <p>Entity formation, governance, contract drafting, joint ventures, and business transactions. Build the legal foundation that scales with your success.</p>
        <a href="<?php echo home_url('/practice-areas/#corporate'); ?>" class="practice-link">Learn More</a>
      </div>

      <div class="practice-card">
        <div class="practice-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9,22 9,12 15,12 15,22"/></svg>
        </div>
        <h3>Real Estate Law</h3>
        <p>Commercial and residential transactions, lease negotiations, development agreements, and dispute resolution for your real property investments.</p>
        <a href="<?php echo home_url('/practice-areas/#real-estate'); ?>" class="practice-link">Learn More</a>
      </div>

    </div>
  </div>
</section>

<!-- ── CASE SHOWCASE ──────────────────────────────────────────── -->
<section class="section case-showcase" aria-labelledby="cases-heading">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Track Record</span>
      <h2 id="cases-heading">Landmark Matters &amp; Notable Representations</h2>
      <p>Our clients trust us with the matters that define careers. Here's a look at the work that speaks for itself.</p>
    </div>

    <div class="case-grid">

      <div class="case-card">
        <span class="case-tag">Film &amp; Television</span>
        <h3>Major Production Agreement — Studio Distribution Deal</h3>
        <p>Negotiated a multi-picture distribution agreement on behalf of an Atlanta-based independent production company, securing favorable backend participation and IP retention rights across international territories.</p>
        <div class="case-outcome">Result: Favorable terms secured across 14 international territories</div>
      </div>

      <div class="case-card">
        <span class="case-tag">Music Industry</span>
        <h3>Recording Contract Renegotiation — Major Label Release</h3>
        <p>Successfully renegotiated recording and publishing terms for a Grammy-nominated artist following a disputed multi-album deal, restoring creative control and improving royalty structure.</p>
        <div class="case-outcome">Result: Artist retained master ownership and publishing rights</div>
      </div>

      <div class="case-card">
        <span class="case-tag">Litigation</span>
        <h3>IP Infringement — Trademark &amp; Copyright Defense</h3>
        <p>Defended an entertainment client against a high-profile intellectual property infringement claim, mounting a comprehensive defense strategy that resulted in dismissal and recovery of legal fees.</p>
        <div class="case-outcome">Result: Case dismissed with prejudice; legal fees recovered</div>
      </div>

    </div>
  </div>
</section>

<!-- ── TEAM PREVIEW ───────────────────────────────────────────── -->
<section class="section team-preview" aria-labelledby="team-heading">
  <div class="container">
    <div class="section-header" style="display:flex; justify-content:space-between; align-items:flex-end;">
      <div>
        <span class="eyebrow">Our People</span>
        <h2 id="team-heading">The Minds Behind the Firm</h2>
        <p>12 attorneys and professionals who bring expertise, creativity, and dedication to every client relationship.</p>
      </div>
      <a href="<?php echo esc_url( home_url('/team/') ); ?>" class="btn btn-outline" style="flex-shrink:0; margin-bottom:10px;">Meet the Full Team</a>
    </div>

    <div class="team-grid-preview">

      <?php
      $featured = [
        [ 'slug' => 'james-walker',   'name' => 'James Walker',      'title' => 'Founding Attorney',                'file' => 'james-walker.jpg'   ],
        [ 'slug' => 'paul-wilson-ii', 'name' => 'Paul Wilson II',    'title' => 'Associate Attorney',               'file' => 'paul-wilson-ii.jpg' ],
        [ 'slug' => 'stephanie-hay',  'name' => 'Stephanie K. Hay',  'title' => 'Partner',                          'file' => 'stephanie-hay.jpg'  ],
        [ 'slug' => 'gina-e-ryan',    'name' => 'Gina E. Ryan',      'title' => 'Chief PR &amp; Strategic Communications', 'file' => 'gina-e-ryan.jpg' ],
      ];
      foreach ( $featured as $member ) :
        $photo_url = wa_img( 'team/' . $member['file'] );
        $bio_url   = esc_url( home_url( '/team/' . $member['slug'] . '/' ) );
      ?>
      <div class="team-card">
        <a href="<?php echo $bio_url; ?>" class="team-card-photo" aria-label="View <?php echo esc_attr( $member['name'] ); ?>'s bio">
          <img
            src="<?php echo esc_url( $photo_url ); ?>"
            alt="<?php echo esc_attr( $member['name'] ); ?>"
            loading="lazy"
          >
          <div class="team-card-photo-overlay"><span>View Bio</span></div>
        </a>
        <h3><a href="<?php echo $bio_url; ?>"><?php echo esc_html( $member['name'] ); ?></a></h3>
        <p class="team-card-title"><?php echo $member['title']; ?></p>
      </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<!-- ── FIVE A's PREVIEW ───────────────────────────────────────── -->
<section class="section five-as section-alt" aria-labelledby="fiveas-heading">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Media &amp; Recognition</span>
      <h2 id="fiveas-heading">Industry Recognition</h2>
    </div>

    <div class="five-as-tabs" role="tablist" aria-label="Media categories">
      <button class="five-as-tab active" role="tab" aria-selected="true"  aria-controls="tab-awards"        data-tab="awards">Awards</button>
      <button class="five-as-tab"        role="tab" aria-selected="false" aria-controls="tab-accolades"     data-tab="accolades">Accolades</button>
      <button class="five-as-tab"        role="tab" aria-selected="false" aria-controls="tab-appearances"   data-tab="appearances">Appearances</button>
      <button class="five-as-tab"        role="tab" aria-selected="false" aria-controls="tab-articles"      data-tab="articles">Articles</button>
      <button class="five-as-tab"        role="tab" aria-selected="false" aria-controls="tab-announcements" data-tab="announcements">Announcements</button>
    </div>

    <!-- Awards Panel -->
    <div id="tab-awards" class="five-as-panel active" role="tabpanel">
      <?php
      $awards_query = new WP_Query([
        'post_type'      => 'wa_awards',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
      ]);
      if ( $awards_query->have_posts() ) :
        while ( $awards_query->have_posts() ) : $awards_query->the_post();
      ?>
        <div class="five-as-card">
          <div class="card-year"><?php echo esc_html( get_the_date('Y') ); ?></div>
          <h4><?php the_title(); ?></h4>
          <p><?php the_excerpt(); ?></p>
        </div>
      <?php endwhile; wp_reset_postdata();
      else : ?>
        <div class="five-as-card">
          <div class="card-year">2024</div>
          <h4>Super Lawyers — Entertainment &amp; Sports Law</h4>
          <p>Attorney James Walker selected to the 2024 Super Lawyers list in the Entertainment &amp; Sports Law category, recognizing attorneys who have attained a high degree of peer recognition and professional achievement.</p>
        </div>
        <div class="five-as-card">
          <div class="card-year">2023</div>
          <h4>Best Law Firms — Atlanta Magazine</h4>
          <p>Walker &amp; Associates recognized among Atlanta's Best Law Firms for Entertainment Law in the annual Atlanta Magazine ranking of top legal practices in the region.</p>
        </div>
        <div class="five-as-card">
          <div class="card-year">2022</div>
          <h4>Georgia Trend Legal Elite</h4>
          <p>Selected to the Georgia Trend Legal Elite list, honoring the top attorneys as voted by their peers in the state bar across all major practice areas.</p>
        </div>
      <?php endif; ?>
    </div>

    <!-- Accolades Panel -->
    <div id="tab-accolades" class="five-as-panel" role="tabpanel">
      <div class="five-as-card">
        <div class="card-year">2024</div>
        <h4>Martindale-Hubbell AV Preeminent Rating</h4>
        <p>The firm holds the highest possible rating in both legal ability and ethical standards as determined by Martindale-Hubbell peer review — a designation fewer than 10% of attorneys receive.</p>
      </div>
      <div class="five-as-card">
        <div class="card-year">2023</div>
        <h4>GRAMMY Recording Academy — Voting Member</h4>
        <p>Attorney Walker serves as a Voting Member of the Recording Academy, recognizing his deep ties to and advocacy for the music industry community.</p>
      </div>
      <div class="five-as-card">
        <div class="card-year">2022</div>
        <h4>Top 100 Black Lawyers — National Bar Association</h4>
        <p>Named to the National Bar Association's Top 100 Black Lawyers in America, honoring excellence in legal service, leadership, and community impact.</p>
      </div>
    </div>

    <!-- Appearances Panel -->
    <div id="tab-appearances" class="five-as-panel" role="tabpanel">
      <div class="five-as-card">
        <div class="card-year">2024</div>
        <h4>BET+ Original Series — Legal Consultant</h4>
        <p>Served as on-set legal consultant for a BET+ original series production filmed in Atlanta, advising on clearance, talent agreements, and production legal matters.</p>
      </div>
      <div class="five-as-card">
        <div class="card-year">2024</div>
        <h4>NAACP Legal Defense Fund — Panel Speaker</h4>
        <p>Featured speaker at the NAACP Legal Defense Fund's entertainment law symposium, addressing IP rights for Black creators in the streaming era.</p>
      </div>
      <div class="five-as-card">
        <div class="card-year">2023</div>
        <h4>Urban One Radio — "Your Legal Rights" Segment</h4>
        <p>Monthly recurring legal commentary segment on Urban One Radio Atlanta, educating listeners on entertainment contracts, artist rights, and industry trends.</p>
      </div>
    </div>

    <!-- Articles Panel -->
    <div id="tab-articles" class="five-as-panel" role="tabpanel">
      <?php
      $articles_query = new WP_Query([
        'post_type'      => 'wa_articles',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
      ]);
      if ( $articles_query->have_posts() ) :
        while ( $articles_query->have_posts() ) : $articles_query->the_post();
          $link = get_post_meta( get_the_ID(), '_wa_article_url', true );
      ?>
        <div class="five-as-card">
          <div class="card-year"><?php echo esc_html( get_the_date('F Y') ); ?></div>
          <h4><?php the_title(); ?></h4>
          <p><?php the_excerpt(); ?></p>
          <?php if ( $link ) : ?>
          <a href="<?php echo esc_url( $link ); ?>" class="card-link" target="_blank" rel="noopener noreferrer">Read Article</a>
          <?php endif; ?>
        </div>
      <?php endwhile; wp_reset_postdata();
      else : ?>
        <div class="five-as-card">
          <div class="card-year">May 2024</div>
          <h4>The New Music Business: What Artists Need to Know About Streaming Royalties</h4>
          <p>An in-depth analysis of streaming royalty structures, direct licensing opportunities, and what independent artists can do to maximize income in the post-CD era.</p>
          <a href="<?php echo esc_url( home_url('/media/') ); ?>" class="card-link">Read More</a>
        </div>
        <div class="five-as-card">
          <div class="card-year">Feb 2024</div>
          <h4>From Script to Screen: Understanding Film Production Legal Essentials</h4>
          <p>A practical guide to the contracts every filmmaker needs — from development agreements to distribution deals — before shooting a single frame.</p>
          <a href="<?php echo esc_url( home_url('/media/') ); ?>" class="card-link">Read More</a>
        </div>
        <div class="five-as-card">
          <div class="card-year">Nov 2023</div>
          <h4>Protecting Your Brand: Trademark Registration for Entertainers</h4>
          <p>Why stage names, logos, and creative marks are valuable business assets — and how to protect them before someone else does.</p>
          <a href="<?php echo esc_url( home_url('/media/') ); ?>" class="card-link">Read More</a>
        </div>
      <?php endif; ?>
    </div>

    <!-- Announcements Panel -->
    <div id="tab-announcements" class="five-as-panel" role="tabpanel">
      <?php
      $ann_query = new WP_Query([
        'post_type'      => 'wa_announcements',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
      ]);
      if ( $ann_query->have_posts() ) :
        while ( $ann_query->have_posts() ) : $ann_query->the_post();
      ?>
        <div class="five-as-card">
          <div class="card-year"><?php echo esc_html( get_the_date('F Y') ); ?></div>
          <h4><?php the_title(); ?></h4>
          <p><?php the_excerpt(); ?></p>
        </div>
      <?php endwhile; wp_reset_postdata();
      else : ?>
        <div class="five-as-card">
          <div class="card-year">June 2024</div>
          <h4>Firm Expands Film &amp; Television Practice</h4>
          <p>Walker &amp; Associates is proud to announce the formal launch of our Film &amp; Television practice area, with the addition of Of Counsel Stephanie K. Hay, an industry veteran with 15+ years of film production legal experience.</p>
        </div>
        <div class="five-as-card">
          <div class="card-year">April 2024</div>
          <h4>Taja Nave Joins as Incoming Associate Attorney</h4>
          <p>We welcome Taja Nave to the Walker &amp; Associates family as an incoming Associate Attorney. Taja brings a passion for entertainment law and a strong academic background from Emory University School of Law.</p>
        </div>
        <div class="five-as-card">
          <div class="card-year">Jan 2024</div>
          <h4>Walker &amp; Associates Named Official Legal Partner — ABFF</h4>
          <p>The firm has been designated as an official legal partner of the American Black Film Festival, providing pro bono contract review services for emerging filmmakers participating in the festival's competition program.</p>
        </div>
      <?php endif; ?>
    </div>

  </div>
</section>

<!-- ── TESTIMONIALS ───────────────────────────────────────────── -->
<section class="section testimonials" aria-labelledby="testimonials-heading">
  <div class="container">
    <div class="section-header center">
      <span class="eyebrow">Client Stories</span>
      <h2 id="testimonials-heading">What Our Clients Say</h2>
    </div>

    <div class="testimonials-grid">

      <div class="testimonial-card">
        <div class="testimonial-stars" aria-label="5 out of 5 stars">
          <?php for ( $i = 0; $i < 5; $i++ ) : ?><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><?php endfor; ?>
        </div>
        <blockquote>
          "Attorney Walker and his team handled my label deal with expertise I've never seen from another law firm. They didn't just review the contract — they understood the industry and negotiated terms I didn't even know were possible to get."
        </blockquote>
        <div class="testimonial-attr">
          <div class="testimonial-initials" aria-hidden="true">MJ</div>
          <div class="testimonial-meta">
            <strong>Marcus J.</strong>
            <span>Recording Artist — Atlanta, GA</span>
          </div>
        </div>
      </div>

      <div class="testimonial-card">
        <div class="testimonial-stars" aria-label="5 out of 5 stars">
          <?php for ( $i = 0; $i < 5; $i++ ) : ?><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><?php endfor; ?>
        </div>
        <blockquote>
          "From our first conversation, I knew this team was different. They handled our film production agreements with the kind of nuanced understanding that only comes from truly being embedded in the industry. Highly recommend."
        </blockquote>
        <div class="testimonial-attr">
          <div class="testimonial-initials" aria-hidden="true">DN</div>
          <div class="testimonial-meta">
            <strong>Diane N.</strong>
            <span>Independent Film Producer</span>
          </div>
        </div>
      </div>

      <div class="testimonial-card">
        <div class="testimonial-stars" aria-label="5 out of 5 stars">
          <?php for ( $i = 0; $i < 5; $i++ ) : ?><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><?php endfor; ?>
        </div>
        <blockquote>
          "Walker &amp; Associates protected my brand and my business when I needed it most. They won a case I was told was unwinnable. Their knowledge of entertainment IP law is on another level."
        </blockquote>
        <div class="testimonial-attr">
          <div class="testimonial-initials" aria-hidden="true">KT</div>
          <div class="testimonial-meta">
            <strong>K. Thomas</strong>
            <span>Music Executive &amp; Brand Founder</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ── CTA BAND ────────────────────────────────────────────────── -->
<section class="cta-band" aria-labelledby="cta-heading">
  <div class="cta-band-inner">
    <div>
      <h2 id="cta-heading">
        When the stakes are your legacy,<br>you need Walker.
      </h2>
      <p>Ready to protect what you've built? Schedule a confidential consultation and let's talk about your legal needs.</p>
    </div>
    <div class="cta-band-actions">
      <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="btn btn-outline-light" style="background:rgba(255,255,255,.15); border-color:rgba(255,255,255,.6); font-size:14px; padding:16px 36px;">Schedule Consultation</a>
      <a href="tel:7708477363" class="btn btn-ghost" style="color:rgba(255,255,255,.75); font-size:13px;">(770) 847-7363</a>
    </div>
  </div>
</section>

</main>

<?php get_footer(); ?>
