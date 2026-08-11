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
        'name'            => 'J. Walker & Associates, LLC',
        'alternateName'   => 'Walker & Associates',
        'url'             => home_url(),
        'telephone'       => '+17708477363',
        'description'     => 'Atlanta entertainment law firm representing musicians, filmmakers, television and film professionals, and talent. 25+ years of experience.',
        'address'         => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => '3427 Main Street',
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

/* ─────────────────────────────────────────────────────────────────────────────
 * PAGE TEMPLATE SYNC
 *
 * Installing or activating a theme never touches existing content. Each page
 * stores its own template in the _wp_page_template post meta, so pages created
 * before this theme existed stay on "Default template" and render stale post
 * content instead of our template files.
 *
 * WordPress auto-matches page-{slug}.php by slug, but these pages have legacy
 * slugs that don't match our filenames, so the mapping has to be explicit.
 *
 * Runs on activation, and on demand from Tools > Re-sync Page Templates.
 * Idempotent: safe to run any number of times. Never creates or edits pages —
 * it only changes which template an existing page uses.
 * ──────────────────────────────────────────────────────────────────────────── */

/**
 * Legacy page slug => template file in this theme.
 *
 * Deliberately NOT mapped yet (no equivalent template in this build; needs a
 * content decision first):
 *   tv-cable-networks  "Our Clients' TV Partners"
 *   clients            "Past and Present Clients"
 * These are currently pointed at page-photos.php / page-testimonials.php by
 * hand as a stopgap. Leave them alone here so the sync doesn't overwrite that
 * choice or cement placeholder content.
 */
function wa_page_template_map() {
    return apply_filters( 'wa_page_template_map', [
        'about-walker-associates' => 'page-about.php',
        'contact-us'              => 'page-contact.php',
        'blog'                    => 'page-media.php', // "Media and Press", despite the slug.
    ] );
}

/**
 * Apply the mapping to existing pages.
 *
 * @param bool $log Write results to the PHP error log.
 * @return array{updated:array,unchanged:array,missing:array,skipped:array}
 */
function wa_sync_page_templates( $log = true ) {
    $report = [ 'updated' => [], 'unchanged' => [], 'missing' => [], 'skipped' => [] ];
    $posts_page = (int) get_option( 'page_for_posts' );

    foreach ( wa_page_template_map() as $slug => $template ) {

        // Never assume the template shipped — a typo here would blank the page.
        if ( ! locate_template( $template ) ) {
            $report['skipped'][] = "{$slug} => {$template} (template file not found in theme)";
            continue;
        }

        $page = get_page_by_path( $slug );
        if ( ! $page instanceof WP_Post ) {
            $report['missing'][] = $slug;
            continue;
        }

        // The posts page ignores _wp_page_template entirely — WordPress uses
        // home.php/index.php for it. Setting the meta would look like it worked.
        if ( $posts_page && $page->ID === $posts_page ) {
            $report['skipped'][] = "{$slug} (set as Settings > Reading > Posts page; "
                                 . "page templates do not apply — change that setting first)";
            continue;
        }

        if ( get_post_meta( $page->ID, '_wp_page_template', true ) === $template ) {
            $report['unchanged'][] = "{$slug} => {$template}";
            continue;
        }

        update_post_meta( $page->ID, '_wp_page_template', $template );
        $report['updated'][] = "{$slug} (ID {$page->ID}) => {$template}";
    }

    set_transient( 'wa_template_sync_report', $report, DAY_IN_SECONDS );

    if ( $log ) {
        foreach ( [ 'updated', 'missing', 'skipped' ] as $key ) {
            foreach ( $report[ $key ] as $line ) {
                error_log( sprintf( '[Walker & Associates] template sync %s: %s', $key, $line ) );
            }
        }
    }

    return $report;
}

// Run once when the theme is activated.
add_action( 'after_switch_theme', function () {
    wa_sync_page_templates();
} );

// Tools > Re-sync Page Templates — manual re-run.
add_action( 'admin_menu', function () {
    add_management_page(
        'Re-sync Page Templates',
        'Re-sync Page Templates',
        'edit_theme_options',
        'wa-template-sync',
        'wa_template_sync_screen'
    );
} );

function wa_template_sync_screen() {
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        wp_die( 'You do not have permission to do that.' );
    }

    $report = null;
    if ( isset( $_POST['wa_sync'] ) && check_admin_referer( 'wa_template_sync' ) ) {
        $report = wa_sync_page_templates();
    }

    echo '<div class="wrap"><h1>Re-sync Page Templates</h1>';
    echo '<p>Re-applies the Walker &amp; Associates page templates to existing pages. '
       . 'Safe to run repeatedly. Does not create, delete, or edit any page content.</p>';

    echo '<form method="post">';
    wp_nonce_field( 'wa_template_sync' );
    submit_button( 'Re-sync now', 'primary', 'wa_sync' );
    echo '</form>';

    if ( $report ) {
        foreach ( [
            'updated'   => [ 'Updated', 'notice-success' ],
            'unchanged' => [ 'Already correct', 'notice-info' ],
            'missing'   => [ 'Not found — no page with this slug', 'notice-error' ],
            'skipped'   => [ 'Skipped', 'notice-warning' ],
        ] as $key => $meta ) {
            if ( empty( $report[ $key ] ) ) {
                continue;
            }
            printf( '<div class="notice %s"><p><strong>%s</strong></p><ul style="list-style:disc;margin-left:20px;">',
                esc_attr( $meta[1] ), esc_html( $meta[0] ) );
            foreach ( $report[ $key ] as $line ) {
                echo '<li>' . esc_html( $line ) . '</li>';
            }
            echo '</ul></div>';
        }
    }

    echo '</div>';
}

// Surface problems from the activation run as an admin notice.
add_action( 'admin_notices', function () {
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        return;
    }
    $report = get_transient( 'wa_template_sync_report' );
    if ( ! $report || ( empty( $report['missing'] ) && empty( $report['skipped'] ) ) ) {
        return;
    }
    delete_transient( 'wa_template_sync_report' );

    echo '<div class="notice notice-warning is-dismissible"><p><strong>Walker &amp; Associates:</strong> '
       . 'some page templates were not applied.</p><ul style="list-style:disc;margin-left:20px;">';
    foreach ( $report['missing'] as $slug ) {
        echo '<li>No page found with slug <code>' . esc_html( $slug ) . '</code></li>';
    }
    foreach ( $report['skipped'] as $line ) {
        echo '<li>' . esc_html( $line ) . '</li>';
    }
    echo '</ul><p>Run <em>Tools &rarr; Re-sync Page Templates</em> after fixing.</p></div>';
} );
