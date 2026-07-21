<?php
/**
 * Walker & Associates — Theme Functions
 */

// ── THEME SETUP ────────────────────────────────────────────────────────────
add_action( 'after_setup_theme', function() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'gallery', 'caption' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 80,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    register_nav_menus([
        'primary'  => __( 'Primary Navigation', 'walker-associates' ),
        'footer'   => __( 'Footer Navigation',  'walker-associates' ),
    ]);
});

// ── ENQUEUE SCRIPTS & STYLES ───────────────────────────────────────────────
add_action( 'wp_enqueue_scripts', function() {
    $ver = wp_get_theme()->get( 'Version' );

    wp_enqueue_style(
        'wa-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;600&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'wa-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [ 'wa-fonts' ],
        $ver
    );

    wp_enqueue_script(
        'wa-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        $ver,
        true
    );
});

// ── CUSTOM POST TYPE: TEAM MEMBER ──────────────────────────────────────────
add_action( 'init', function() {
    register_post_type( 'team_member', [
        'labels' => [
            'name'               => 'Team Members',
            'singular_name'      => 'Team Member',
            'add_new_item'       => 'Add New Team Member',
            'edit_item'          => 'Edit Team Member',
            'new_item'           => 'New Team Member',
            'view_item'          => 'View Team Member',
            'search_items'       => 'Search Team Members',
            'not_found'          => 'No team members found',
        ],
        'public'            => true,
        'show_in_menu'      => true,
        'menu_icon'         => 'dashicons-businessman',
        'supports'          => [ 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ],
        'has_archive'       => true,
        'rewrite'           => [ 'slug' => 'team' ],
        'show_in_rest'      => true,
    ]);
});

// ── CUSTOM POST TYPE: FIVE A's ─────────────────────────────────────────────
add_action( 'init', function() {
    $five_as = [
        'awards'        => [ 'label' => 'Awards',       'icon' => 'dashicons-awards' ],
        'accolades'     => [ 'label' => 'Accolades',    'icon' => 'dashicons-star-filled' ],
        'appearances'   => [ 'label' => 'Appearances',  'icon' => 'dashicons-video-alt2' ],
        'articles'      => [ 'label' => 'Articles',     'icon' => 'dashicons-media-document' ],
        'announcements' => [ 'label' => 'Announcements','icon' => 'dashicons-megaphone' ],
    ];

    foreach ( $five_as as $slug => $config ) {
        register_post_type( "wa_{$slug}", [
            'labels' => [
                'name'          => $config['label'],
                'singular_name' => rtrim( $config['label'], 's' ),
                'add_new_item'  => "Add New {$config['label']}",
                'edit_item'     => "Edit {$config['label']}",
            ],
            'public'        => true,
            'show_in_menu'  => true,
            'menu_icon'     => $config['icon'],
            'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
            'has_archive'   => false,
            'rewrite'       => [ 'slug' => $slug ],
            'show_in_rest'  => true,
        ]);
    }
});

// ── HELPER: Get team member meta ───────────────────────────────────────────
function wa_team_meta( $key, $post_id = null ) {
    $post_id = $post_id ?: get_the_ID();
    return get_post_meta( $post_id, "_wa_{$key}", true );
}

// ── HELPER: Theme image URL ────────────────────────────────────────────────
function wa_img( $path ) {
    return get_template_directory_uri() . '/assets/images/' . ltrim( $path, '/' );
}

// ── Contact form handler ───────────────────────────────────────────────────
require_once get_template_directory() . '/functions-contact-handler.php';

// ── SEO: Output schema.org LegalService markup on homepage ─────────────────
add_action( 'wp_head', function() {
    if ( ! is_front_page() ) return;
    $schema = [
        '@context'        => 'https://schema.org',
        '@type'           => 'LegalService',
        'name'            => 'J. Walker and Associates, LLP',
        'alternateName'   => 'Walker & Associates',
        'url'             => home_url(),
        'telephone'       => '+17708477363',
        'description'     => 'Atlanta entertainment law firm representing musicians, filmmakers, television and film professionals, and talent. 25+ years of experience.',
        'address'         => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => '3421 Main Street',
            'addressLocality' => 'Atlanta',
            'addressRegion'   => 'GA',
            'postalCode'      => '30337',
            'addressCountry'  => 'US',
        ],
        'geo'             => [
            '@type'     => 'GeoCoordinates',
            'latitude'  => '33.7490',
            'longitude' => '-84.3880',
        ],
        'areaServed'      => [ 'Atlanta, GA', 'Georgia', 'United States' ],
        'serviceType'     => [ 'Entertainment Law', 'Film & Television Law', 'Litigation', 'Corporate Law', 'Real Estate Law' ],
        'priceRange'      => '$$$$',
        'foundingDate'    => '1999',
        'sameAs'          => [
            'https://www.instagram.com/walkerandassociates/',
            'https://www.linkedin.com/company/walker-and-associates/',
        ],
    ];
    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
});
