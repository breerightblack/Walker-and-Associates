<?php
/**
 * Template Name: Consultation
 *
 * GENERATED from consultation.html by _build/html-to-php.py — do not hand-edit.
 * Edit consultation.html, then re-run the build script.
 */
get_header();
?>

<div class="page-hero">
  <div class="container">
    <span class="eyebrow">Consultations</span>
    <h1>60-Minute Legal Consultation</h1>
    <p>Sit down with an attorney, lay out your situation, and leave with real answers.</p>
  </div>
</div>

<main id="main" role="main">
  <section class="section">
    <div class="container">
      <div class="consult-layout">

        <!-- Main column -->
        <div>
          <div class="section-header">
            <span class="eyebrow">The Offer</span>
            <h2>Focused counsel on the issue in front of you</h2>
          </div>
          <p style="font-size:1.05rem;color:var(--text-mid);line-height:1.8;margin-bottom:var(--space-md);">We offer a focused 60-minute legal consultation for individuals and businesses who need clear guidance on a specific issue. During this session, you'll meet with an attorney, outline your situation, and receive tailored legal advice and next-step recommendations.</p>
          <p style="font-size:1.05rem;color:var(--text-mid);line-height:1.8;margin-bottom:var(--space-2xl);">This is not a sales call. It is one hour of an attorney's time, spent on your matter.</p>

          <!-- What to Expect -->
          <h3 style="font-family:var(--font-serif);font-size:1.5rem;margin-bottom:var(--space-lg);color:var(--text-dark);">What to Expect</h3>
          <div class="consult-steps">
            <div class="consult-step">
              <div class="consult-step-num">1</div>
              <div>
                <h4>Book and pay</h4>
                <p>Choose a time and pay the consultation fee. Your appointment is confirmed once payment is received.</p>
              </div>
            </div>
            <div class="consult-step">
              <div class="consult-step-num">2</div>
              <div>
                <h4>Brief intake</h4>
                <p>We collect your contact details, the names of any other parties involved, and a short description of the issue so we can run a conflicts check before we meet.</p>
              </div>
            </div>
            <div class="consult-step">
              <div class="consult-step-num">3</div>
              <div>
                <h4>Your hour with an attorney</h4>
                <p>We review your matter, answer your questions, and give you tailored advice and concrete next steps.</p>
              </div>
            </div>
            <div class="consult-step">
              <div class="consult-step-num">4</div>
              <div>
                <h4>Where it goes from here</h4>
                <p>If we both decide to continue, we send a separate written engagement agreement. If not, the advice from your session is still yours to act on.</p>
              </div>
            </div>
          </div>

          <!-- Confidentiality & Privilege -->
          <div class="consult-card" style="margin-top:var(--space-2xl);">
            <h3 style="font-family:var(--font-serif);font-size:1.375rem;margin-bottom:var(--space-sm);color:var(--text-dark);">Confidentiality &amp; Privilege</h3>
            <p style="color:var(--text-mid);line-height:1.75;margin-bottom:var(--space-sm);">Information you share with our attorneys in a consultation is treated as confidential and is protected under applicable rules governing attorney-client communications, even if you do not hire the Firm for ongoing representation.</p>
            <p style="color:var(--text-mid);line-height:1.75;">However, the consultation is limited to advice given during that one-hour session. We do not monitor deadlines, file documents, or take other actions in your case unless and until a separate written engagement agreement is signed.</p>
          </div>
        </div>

        <!-- Booking sidebar -->
        <aside class="consult-aside">
          <div class="consult-price-card">
            <div class="consult-price-label">Consultation Fee</div>
            <div class="consult-price">$250</div>
            <p class="consult-price-sub">A flat $250 fee applies to initial consultations, due prior to your scheduled meeting.</p>
            <p class="consult-price-note">The consultation fee covers up to one hour of an attorney's time to review your matter and advise you. It does not obligate you &mdash; or the Firm &mdash; to move forward with ongoing representation after the consultation.</p>

            <!-- ═══════════════════════════════════════════════════════════
                 BOOKING WIDGET GOES HERE
                 Paste your ThriveCart or Calendly embed inside this div.
                 In WordPress: edit this page, add a "Custom HTML" block,
                 and paste the embed code. Nothing else needs to change.
                 ═══════════════════════════════════════════════════════════ -->
            <div id="booking-widget" class="booking-slot">
              <p class="booking-slot-text">Online booking is coming soon.</p>
              <a href="tel:7708477363" class="btn btn-primary" style="width:100%;justify-content:center;">Call (770) 847-7363 to Book</a>
              <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline" style="width:100%;justify-content:center;margin-top:var(--space-sm);">Submit an Inquiry</a>
            </div>
          </div>

          <!-- Required notice — directly below the pay/book area -->
          <div class="legal-notice" style="margin-top:var(--space-lg);">
            <div class="legal-notice-title"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>Important Information</div>
            <p>Payment of the consultation fee secures your appointment time and entitles you to a one-hour legal consultation. Booking and paying for a consultation creates a limited attorney-client relationship for the duration of that consultation so that we can provide legal advice about your situation. It does not, by itself, create an ongoing attorney-client relationship for continued representation in your matter.</p>
            <p>If, after the consultation, both you and the Firm decide to move forward, we will provide a separate written engagement agreement describing the scope of representation, fees, and responsibilities. Representation begins only after that agreement is signed.</p>
            <p>Do not send confidential documents or information through the website before your consultation is scheduled and confirmed. Confidential information should be shared directly with the attorney during your consultation, or through secure channels we provide.</p>
            <p><a href="<?php echo esc_url( home_url( '/disclaimer/' ) ); ?>">Read our full Disclaimer &amp; Terms</a></p>
          </div>

          <div class="consult-payment-note">
            <p style="font-size:.8125rem;color:var(--taupe);line-height:1.6;">Payment options include Cash App, Zelle, PayPal, MyCase, and wire transfer. <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="color:var(--navy);font-weight:600;">See payment details &rarr;</a></p>
          </div>
        </aside>

      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
