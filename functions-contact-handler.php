<?php
/**
 * Contact form handler — processes the intake form submission.
 * Included from functions.php via require_once.
 */

add_action( 'admin_post_wa_contact_form',        'wa_handle_contact_form' );
add_action( 'admin_post_nopriv_wa_contact_form', 'wa_handle_contact_form' );

function wa_handle_contact_form() {
    // Verify nonce
    if ( ! isset( $_POST['wa_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['wa_nonce'] ) ), 'wa_contact_form' ) ) {
        wp_die( 'Security check failed.', 'Error', [ 'response' => 403 ] );
    }

    // Honeypot
    if ( ! empty( $_POST['website_url'] ) ) {
        wp_redirect( home_url( '/contact/?submitted=1' ) );
        exit;
    }

    // Sanitize inputs
    $first    = sanitize_text_field( wp_unslash( $_POST['first_name']       ?? '' ) );
    $last     = sanitize_text_field( wp_unslash( $_POST['last_name']        ?? '' ) );
    $email    = sanitize_email(      wp_unslash( $_POST['email']            ?? '' ) );
    $phone    = sanitize_text_field( wp_unslash( $_POST['phone']            ?? '' ) );
    $area     = sanitize_text_field( wp_unslash( $_POST['practice_area']    ?? '' ) );
    $contact  = sanitize_text_field( wp_unslash( $_POST['preferred_contact'] ?? '' ) );
    $message  = sanitize_textarea_field( wp_unslash( $_POST['message']      ?? '' ) );

    // Validate required
    if ( ! $first || ! $last || ! $email || ! $message || ! is_email( $email ) ) {
        wp_redirect( home_url( '/contact/?error=validation' ) );
        exit;
    }

    // Build email
    $to      = get_option('admin_email');
    $subject = "New Client Inquiry — {$first} {$last} ({$area})";
    $body    = "New client inquiry from walkerandassoc.com\n\n"
             . "Name:             {$first} {$last}\n"
             . "Email:            {$email}\n"
             . "Phone:            {$phone}\n"
             . "Practice Area:    {$area}\n"
             . "Preferred Time:   {$contact}\n\n"
             . "Message:\n{$message}\n";
    $headers = [
        "Content-Type: text/plain; charset=UTF-8",
        "Reply-To: {$first} {$last} <{$email}>",
    ];

    wp_mail( $to, $subject, $body, $headers );

    wp_redirect( home_url( '/contact/?submitted=1' ) );
    exit;
}
