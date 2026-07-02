<?php
/**
 * Single Team Member bio page
 * Used for all 12 team members.
 * Bio data is hardcoded here until ACF custom fields are populated in WP admin.
 */

$bios = [

  'james-walker' => [
    'name'  => 'James Walker',
    'title' => 'Founding Attorney',
    'file'  => 'james-walker.jpg',
    'focus' => [ 'Entertainment Law', 'Film & Television', 'Litigation', 'Corporate Law' ],
    'bio'   => [
      'James Walker is the founding attorney of J. Walker and Associates, LLP, one of Atlanta\'s most prominent entertainment law firms. With over 25 years of experience in the legal industry, Attorney Walker has built a reputation for providing strategic, results-driven counsel to clients in the music, film, television, and corporate sectors.',
      'After earning his Juris Doctor from a leading law school, Walker launched his practice with a focus on the intersection of law and the entertainment industry — a space that was underserved, particularly for Black artists and creators. His vision: every artist, filmmaker, and entrepreneur deserves the same quality of legal representation that the major studios and labels command.',
      'Over the course of his career, Attorney Walker has negotiated hundreds of recording contracts, publishing agreements, and distribution deals. He has represented Grammy-nominated recording artists, award-winning filmmakers, major-label executives, and independent creators at every stage of their careers.',
      'As the firm expands into film and television law, Walker brings the same commitment to excellence that has defined his work in music law — providing comprehensive production legal services, talent agreements, IP licensing, and co-production negotiations for clients in front of and behind the camera.',
      'In addition to his legal practice, Attorney Walker is a Voting Member of the Recording Academy, a frequent lecturer at universities and industry conferences, and a passionate advocate for creator rights and equitable representation in the entertainment industry.',
    ],
  ],

  'russ-green' => [
    'name'  => 'Russ Green',
    'title' => 'Executive Assistant',
    'file'  => 'russ-green.jpg',
    'focus' => [ 'Operations', 'Business Development', 'Client Relations', 'Strategic Planning' ],
    'bio'   => [
      'Russ Green serves as Executive Assistant at J. Walker and Associates, LLP, supporting the firm\'s day-to-day operations, business development strategy, and client relations. With a background spanning business management and the entertainment industry, Green brings a unique blend of operational expertise and creative industry knowledge to the firm\'s leadership team.',
      'As Executive Assistant, Green works in close partnership with Attorney Walker to support the firm\'s continued growth, helping coordinate the firm\'s expansion into film and television legal services while maintaining the high-touch client experience that has defined the practice for over two decades.',
      'Green\'s work ensures that every client who engages Walker & Associates receives not only exceptional legal counsel but a seamlessly managed matter from intake through resolution. His focus on systems, process, and client communication has been instrumental in the firm\'s operational evolution.',
      'Green is deeply committed to the firm\'s mission of providing elite legal services to the creative community, and believes that access to top-tier legal counsel is a competitive advantage that every artist, filmmaker, and entrepreneur deserves.',
    ],
  ],

  'yillian-sarmiento' => [
    'name'  => 'Yillian Sarmiento',
    'title' => 'Litigation Paralegal',
    'file'  => 'yillian-sarmiento.png',
    'focus' => [ 'Litigation Support', 'Case Management', 'Legal Research', 'Document Preparation' ],
    'bio'   => [
      'Yillian Sarmiento is a skilled Litigation Paralegal at J. Walker and Associates, LLP, providing critical support across the firm\'s litigation practice. With a meticulous approach to case management and a thorough command of civil procedure, Sarmiento plays an essential role in the preparation and execution of the firm\'s litigation matters.',
      'Sarmiento\'s responsibilities include conducting legal research, drafting and filing court documents, managing discovery processes, and coordinating with opposing counsel and the courts. Her dedication to detail and her ability to manage complex, multi-party litigation files has made her an indispensable member of the litigation team.',
      'Prior to joining Walker & Associates, Sarmiento gained experience in civil litigation and corporate legal departments, developing expertise in electronic discovery, case management software, and legal document management systems.',
      'Sarmiento holds a paralegal certificate from an accredited institution and is committed to ongoing professional development in entertainment and IP litigation.',
    ],
  ],

  'sarah-manowitz' => [
    'name'  => 'Sarah Manowitz',
    'title' => 'Paralegal / Law Clerk',
    'file'  => 'sarah-manowitz.png',
    'focus' => [ 'Legal Research', 'Contract Review', 'Document Drafting', 'Client Communication' ],
    'bio'   => [
      'Sarah Manowitz serves as a Paralegal and Law Clerk at J. Walker and Associates, LLP, providing comprehensive legal research and document support across multiple practice areas. As a law student gaining valuable practical experience, Manowitz brings academic rigor and fresh perspective to the firm\'s work.',
      'In her role, Manowitz conducts in-depth legal research on entertainment law, contract law, and intellectual property matters. She assists with the preparation of contracts, correspondence, and legal memoranda, and supports the firm\'s attorneys in managing client files and deadlines.',
      'Manowitz is currently pursuing her Juris Doctor with a concentration in entertainment and intellectual property law. Her academic background and practical experience at Walker & Associates have given her a strong foundation in the intersection of law and the creative industries.',
      'Committed to becoming an entertainment law attorney, Manowitz brings enthusiasm, intellectual curiosity, and a genuine passion for advocating on behalf of artists, creators, and entertainment professionals.',
    ],
  ],

  'j-richard-byrd' => [
    'name'  => 'J. Richard Byrd',
    'title' => 'COO & Communications Director',
    'file'  => 'j-richard-byrd.jpg',
    'focus' => [ 'Operations', 'Communications', 'Strategic Planning', 'Media Relations' ],
    'bio'   => [
      'J. Richard Byrd serves as Chief Operating Officer and Communications Director for J. Walker and Associates, LLP, overseeing the firm\'s internal operations, communications strategy, and public-facing messaging. Byrd brings over two decades of experience in organizational leadership, communications, and business operations to his dual role at the firm.',
      'As COO, Byrd manages the firm\'s operational infrastructure — from staffing and technology systems to workflow processes and performance metrics — ensuring the firm runs with the efficiency and precision required to serve a high-profile client base. As Communications Director, he oversees all external communications, media relations, brand positioning, and thought leadership content.',
      'Byrd\'s career has spanned the intersection of business and culture, giving him a deep understanding of the industries the firm serves. His communications expertise has elevated the firm\'s profile across the entertainment legal community, helping Walker & Associates establish itself as the go-to legal partner for serious professionals in music, film, and television.',
      'A strategic thinker with a talent for both big-picture planning and operational execution, Byrd is a cornerstone of the firm\'s leadership team and a key driver of its ongoing growth into new practice areas.',
    ],
  ],

  'khadijah-saifullah' => [
    'name'  => 'Khadijah Saifullah',
    'title' => 'Director of Finance',
    'file'  => 'khadijah-saifullah.jpg',
    'focus' => [ 'Financial Management', 'Compliance', 'Budgeting', 'Firm Administration' ],
    'bio'   => [
      'Khadijah Saifullah is the Director of Finance for J. Walker and Associates, LLP, responsible for overseeing the firm\'s financial operations, budgeting, compliance, and reporting. With a background in financial management and a deep commitment to organizational excellence, Saifullah ensures the firm\'s financial health supports its mission and growth.',
      'In her role, Saifullah manages accounts receivable and payable, client billing, payroll, and financial reporting. She works closely with firm leadership to develop and monitor budgets, identify opportunities for cost efficiency, and ensure compliance with all applicable financial regulations and professional responsibility rules.',
      'Saifullah brings a values-driven approach to financial management, believing that a well-run financial operation is the backbone of a firm that can consistently deliver exceptional legal services. Her attention to detail and commitment to accuracy have made her a trusted member of the firm\'s leadership team.',
      'Beyond her financial role, Saifullah is committed to the firm\'s broader mission of empowering artists and creators, and takes pride in contributing to an organization that champions equitable access to elite legal services.',
    ],
  ],

  'joel-snellings' => [
    'name'  => 'Joél Snellings',
    'title' => 'Legal Intern',
    'file'  => 'joel-snellings.jpg',
    'focus' => [ 'Legal Research', 'Entertainment Law', 'Contract Analysis' ],
    'bio'   => [
      'Joél Snellings is a Legal Intern at J. Walker and Associates, LLP, gaining practical experience in entertainment law while pursuing his legal education. As a law student with a passion for the creative industries, Snellings brings intellectual curiosity and a strong work ethic to his role at the firm.',
      'In his internship, Snellings supports the firm\'s attorneys with legal research, document review, contract analysis, and client matter support. He has developed a foundational understanding of entertainment contracts, intellectual property law, and the legal framework that governs the music and film industries.',
      'Snellings is pursuing a Juris Doctor with a focus on entertainment and IP law. His internship at Walker & Associates has provided hands-on exposure to the full spectrum of entertainment legal practice, from recording agreements to film production legal matters.',
      'Driven by a belief that the law should work for creators, Snellings aspires to become an entertainment attorney and continue the kind of client-centered legal advocacy that defines Walker & Associates.',
    ],
  ],

  'paul-wilson-ii' => [
    'name'  => 'Paul Wilson II',
    'title' => 'Associate Attorney',
    'file'  => 'paul-wilson-ii.jpg',
    'focus' => [ 'Entertainment Law', 'Corporate Law', 'Contract Negotiation', 'Business Transactions' ],
    'bio'   => [
      'Paul Wilson II is an Associate Attorney at J. Walker and Associates, LLP, where he focuses on entertainment law, corporate transactions, and contract negotiation. With a sharp legal mind and a comprehensive understanding of the entertainment industry, Wilson has become a valued member of the firm\'s legal team.',
      'Wilson\'s practice encompasses a broad range of entertainment and corporate legal matters, including recording and publishing agreements, management contracts, corporate entity formation, and business transactions for entertainment industry clients. He brings a client-centered approach to every matter, working to understand the business goals behind each legal need.',
      'Prior to joining Walker & Associates, Wilson gained experience in entertainment and corporate legal practice, developing expertise in contract drafting, business structure, and deal negotiation. His background gives him a nuanced perspective on the legal challenges facing artists, executives, and entrepreneurs in the modern entertainment landscape.',
      'Wilson holds a Juris Doctor from an accredited law school and is a member of the Georgia State Bar. He is committed to providing the same caliber of legal representation to independent artists and emerging companies that major industry players have always had access to.',
    ],
  ],

  'gina-e-ryan' => [
    'name'  => 'Gina E. Ryan',
    'title' => 'Chief PR & Strategic Communications Officer',
    'file'  => 'gina-e-ryan.jpg',
    'focus' => [ 'Public Relations', 'Brand Strategy', 'Media Relations', 'Crisis Communications' ],
    'bio'   => [
      'Gina E. Ryan serves as Chief PR and Strategic Communications Officer for J. Walker and Associates, LLP, leading the firm\'s public relations strategy, media relations, and brand communications. With an extensive background in PR, brand management, and strategic communications, Ryan has been instrumental in elevating the firm\'s profile as Atlanta\'s premier entertainment law practice.',
      'Ryan oversees all aspects of the firm\'s external communications — including media placements, press releases, thought leadership content, executive visibility, and crisis communications. Her relationships with journalists, media outlets, and industry contacts across the entertainment, legal, and business sectors have resulted in significant media coverage for the firm and its attorneys.',
      'Beyond media relations, Ryan develops and executes the firm\'s strategic communications plan — ensuring that every public-facing message reflects the firm\'s brand values, expertise, and commitment to clients. Her work has helped position Attorney Walker and the firm\'s team as leading voices in entertainment law.',
      'Ryan brings to her role not just PR expertise but a genuine passion for the entertainment industry and for the clients the firm serves. She believes that strategic communications is a critical component of building a law firm that can compete at the highest levels of the industry.',
    ],
  ],

  'taja-nave' => [
    'name'  => 'Taja Nave',
    'title' => 'Incoming Associate Attorney',
    'file'  => 'taja-nave.jpg',
    'focus' => [ 'Entertainment Law', 'Intellectual Property', 'Contract Review', 'Artist Rights' ],
    'bio'   => [
      'Taja Nave joins J. Walker and Associates, LLP as an Incoming Associate Attorney, bringing academic excellence and a deep commitment to entertainment law. Nave is passionate about representing artists, creators, and entertainment professionals — and is eager to contribute to the firm\'s expanding practice.',
      'During her legal education, Nave developed a strong foundation in intellectual property, contract law, and entertainment industry business practices. Her coursework and clinical experience have given her hands-on familiarity with the kinds of legal matters that are central to Walker & Associates\' practice: recording agreements, talent contracts, IP licensing, and artist rights.',
      'Nave brings to her role at the firm not just legal skill but a genuine understanding of and empathy for the creative community. She believes that every artist deserves knowledgeable, dedicated legal counsel — and she is committed to providing exactly that.',
      'Nave earned her Juris Doctor from Emory University School of Law, where she focused on intellectual property and entertainment law. She is a member of the Georgia State Bar and is actively engaged in the entertainment legal community.',
    ],
  ],

  'stephanie-hay' => [
    'name'  => 'Stephanie K. Hay',
    'title' => 'Partner',
    'file'  => 'stephanie-hay.jpg',
    'focus' => [ 'Film & TV Production', 'IP Licensing', 'Distribution Agreements', 'Talent Contracts' ],
    'bio'   => [
      'Stephanie K. Hay is a Partner at J. Walker and Associates, LLP with a focus on Film and Television law. With over 15 years of experience in film and television production legal services, Hay brings unparalleled industry expertise to the firm\'s rapidly growing screen production practice.',
      'Hay\'s career has spanned the full spectrum of film and television legal work — from development agreements and co-production deals to distribution negotiations, talent agreements, IP licensing, and clearance. She has represented studios, independent production companies, directors, writers, and talent across both scripted and unscripted television and feature film.',
      'Her experience includes work with major studios, streaming platforms, and independent productions. She has been involved in projects distributed by major networks and streaming services, bringing a sophisticated understanding of the deals that drive the industry.',
      'As the entertainment industry increasingly converges around Atlanta as a major production hub, Hay\'s expertise positions Walker & Associates to serve the full range of clients in Georgia\'s thriving film and television ecosystem — from local independents to productions backed by major studio resources.',
      'Hay is a member of the State Bar of California and the Georgia Bar, and is actively engaged in the entertainment legal community through speaking engagements, industry events, and professional organizations.',
    ],
  ],

  'blythe-silvetz' => [
    'name'  => 'Blythe Silvetz',
    'title' => 'Communications & Social Media Intern',
    'file'  => 'blythe-silvetz.png',
    'focus' => [ 'Social Media', 'Content Creation', 'Digital Communications', 'Brand Awareness' ],
    'bio'   => [
      'Blythe Silvetz is the Communications and Social Media Intern at J. Walker and Associates, LLP, supporting the firm\'s digital presence and content strategy. With a background in communications and a passion for the entertainment industry, Silvetz brings energy, creativity, and a modern perspective to the firm\'s communications team.',
      'In her role, Silvetz manages the firm\'s social media presence, develops content for digital platforms, and supports the firm\'s communications and public relations initiatives. She works closely with the Chief PR Officer to ensure the firm\'s digital communications are consistent, compelling, and effective.',
      'Silvetz is pursuing a degree in communications with a focus on media and entertainment. Her internship at Walker & Associates has provided her with practical experience at the intersection of law, business, and the creative industries — a unique and valuable combination for her career goals.',
      'Committed to elevating the firm\'s digital footprint, Silvetz brings a fresh, culturally aware perspective to communications strategy, helping Walker & Associates connect with clients and creative professionals across digital platforms.',
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

<div class="page-hero" style="background: var(--bg-light);">
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
          <?php foreach ( $member['bio'] as $para ) : ?>
          <p><?php echo esc_html( $para ); ?></p>
          <?php endforeach; ?>
        <?php endif; ?>
      <?php else : ?>
        <?php foreach ( $member['bio'] as $para ) : ?>
        <p><?php echo esc_html( $para ); ?></p>
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
