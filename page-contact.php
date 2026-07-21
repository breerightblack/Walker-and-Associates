<?php
/**
 * Template Name: Contact Page
 */
get_header();
?>

<div class="page-hero">
  <div class="container">
    <span class="eyebrow">Get In Touch</span>
    <h1>Contact Walker &amp; Associates</h1>
    <p>Ready to discuss your legal needs? Schedule a confidential consultation or send us a message below.</p>
  </div>
</div>

<main id="main" role="main">
<section class="section">
  <div class="container">
    <div style="display:grid; grid-template-columns:1fr 400px; gap:var(--space-3xl); align-items:start;">

      <!-- Intake Form -->
      <div>
        <div class="section-header">
          <span class="eyebrow">New Client Inquiry</span>
          <h2>Tell Us About Your Matter</h2>
          <p>All inquiries are confidential. We will respond within one business day.</p>
        </div>

        <?php
        // If WPForms or Gravity Forms is active, replace this with the shortcode:
        // echo do_shortcode('[wpforms id="XXX"]');
        // For now, render a native HTML form (works standalone, no plugin required)
        ?>

        <form
          id="contact-form"
          method="post"
          action="<?php echo esc_url( admin_url('admin-post.php') ); ?>"
          novalidate
          style="margin-top: var(--space-xl);"
        >
          <?php wp_nonce_field( 'wa_contact_form', 'wa_nonce' ); ?>
          <input type="hidden" name="action" value="wa_contact_form">
          <!-- Honeypot -->
          <input type="text" name="website_url" value="" style="position:absolute;left:-9999px;" tabindex="-1" autocomplete="off">

          <div style="display:grid; grid-template-columns:1fr 1fr; gap:var(--space-md); margin-bottom:var(--space-md);">
            <div>
              <label for="first_name" style="display:block; font-size:12px; font-weight:600; letter-spacing:.08em; text-transform:uppercase; color:var(--taupe); margin-bottom:6px;">First Name *</label>
              <input type="text" id="first_name" name="first_name" required autocomplete="given-name" style="width:100%; padding:12px 16px; border:1px solid var(--color-border); border-radius:var(--radius-sm); font-family:var(--font-sans); font-size:.9375rem; color:var(--text-dark); background:var(--white); transition:border-color var(--ease);" onfocus="this.style.borderColor='var(--green)'" onblur="this.style.borderColor='var(--color-border)'">
            </div>
            <div>
              <label for="last_name" style="display:block; font-size:12px; font-weight:600; letter-spacing:.08em; text-transform:uppercase; color:var(--taupe); margin-bottom:6px;">Last Name *</label>
              <input type="text" id="last_name" name="last_name" required autocomplete="family-name" style="width:100%; padding:12px 16px; border:1px solid var(--color-border); border-radius:var(--radius-sm); font-family:var(--font-sans); font-size:.9375rem; color:var(--text-dark); background:var(--white); transition:border-color var(--ease);" onfocus="this.style.borderColor='var(--green)'" onblur="this.style.borderColor='var(--color-border)'">
            </div>
          </div>

          <div style="display:grid; grid-template-columns:1fr 1fr; gap:var(--space-md); margin-bottom:var(--space-md);">
            <div>
              <label for="email" style="display:block; font-size:12px; font-weight:600; letter-spacing:.08em; text-transform:uppercase; color:var(--taupe); margin-bottom:6px;">Email Address *</label>
              <input type="email" id="email" name="email" required autocomplete="email" style="width:100%; padding:12px 16px; border:1px solid var(--color-border); border-radius:var(--radius-sm); font-family:var(--font-sans); font-size:.9375rem; color:var(--text-dark); background:var(--white); transition:border-color var(--ease);" onfocus="this.style.borderColor='var(--green)'" onblur="this.style.borderColor='var(--color-border)'">
            </div>
            <div>
              <label for="phone" style="display:block; font-size:12px; font-weight:600; letter-spacing:.08em; text-transform:uppercase; color:var(--taupe); margin-bottom:6px;">Phone Number</label>
              <input type="tel" id="phone" name="phone" autocomplete="tel" style="width:100%; padding:12px 16px; border:1px solid var(--color-border); border-radius:var(--radius-sm); font-family:var(--font-sans); font-size:.9375rem; color:var(--text-dark); background:var(--white); transition:border-color var(--ease);" onfocus="this.style.borderColor='var(--green)'" onblur="this.style.borderColor='var(--color-border)'">
            </div>
          </div>

          <div style="margin-bottom:var(--space-md);">
            <label for="practice_area" style="display:block; font-size:12px; font-weight:600; letter-spacing:.08em; text-transform:uppercase; color:var(--taupe); margin-bottom:6px;">Practice Area *</label>
            <select id="practice_area" name="practice_area" required style="width:100%; padding:12px 16px; border:1px solid var(--color-border); border-radius:var(--radius-sm); font-family:var(--font-sans); font-size:.9375rem; color:var(--text-dark); background:var(--white); transition:border-color var(--ease); -webkit-appearance:none; appearance:none; background-image:url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%238B7D75' stroke-width='1.5' fill='none'/%3E%3C/svg%3E\"); background-repeat:no-repeat; background-position:right 16px center;">
              <option value="">Select a practice area...</option>
              <option value="entertainment">Entertainment Law</option>
              <option value="film-tv">Film &amp; Television Law</option>
              <option value="music">Music Law</option>
              <option value="litigation">Litigation</option>
              <option value="corporate">Corporate Law</option>
              <option value="real-estate">Real Estate Law</option>
              <option value="other">Other / Not Sure</option>
            </select>
          </div>

          <div style="margin-bottom:var(--space-md);">
            <label for="preferred_contact" style="display:block; font-size:12px; font-weight:600; letter-spacing:.08em; text-transform:uppercase; color:var(--taupe); margin-bottom:6px;">Preferred Contact Time</label>
            <select id="preferred_contact" name="preferred_contact" style="width:100%; padding:12px 16px; border:1px solid var(--color-border); border-radius:var(--radius-sm); font-family:var(--font-sans); font-size:.9375rem; color:var(--text-dark); background:var(--white); -webkit-appearance:none; appearance:none; background-image:url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%238B7D75' stroke-width='1.5' fill='none'/%3E%3C/svg%3E\"); background-repeat:no-repeat; background-position:right 16px center;">
              <option value="">No preference</option>
              <option value="morning">Morning (9am – 12pm ET)</option>
              <option value="afternoon">Afternoon (12pm – 5pm ET)</option>
              <option value="evening">Evening (5pm – 7pm ET)</option>
            </select>
          </div>

          <div style="margin-bottom:var(--space-lg);">
            <label for="message" style="display:block; font-size:12px; font-weight:600; letter-spacing:.08em; text-transform:uppercase; color:var(--taupe); margin-bottom:6px;">Describe Your Matter *</label>
            <textarea id="message" name="message" required rows="6" style="width:100%; padding:12px 16px; border:1px solid var(--color-border); border-radius:var(--radius-sm); font-family:var(--font-sans); font-size:.9375rem; color:var(--text-dark); background:var(--white); resize:vertical; transition:border-color var(--ease);" onfocus="this.style.borderColor='var(--green)'" onblur="this.style.borderColor='var(--color-border)'" placeholder="Please provide a brief description of your legal matter. All communications are confidential."></textarea>
          </div>

          <div style="margin-bottom:var(--space-xl);">
            <label style="display:flex; align-items:flex-start; gap:12px; cursor:pointer;">
              <input type="checkbox" name="consent" required style="margin-top:3px; flex-shrink:0; accent-color:var(--green);">
              <span style="font-size:.875rem; color:var(--taupe); line-height:1.55;">
                I consent to Walker &amp; Associates contacting me regarding my legal matter. I understand that submitting this form does not create an attorney-client relationship. <a href="<?php echo home_url('/privacy-policy/'); ?>" style="color:var(--green);">Privacy Policy</a>
              </span>
            </label>
          </div>

          <button type="submit" class="btn btn-primary" style="font-size:14px; padding:16px 40px;">Submit Inquiry</button>
        </form>

        <!-- Payment Section -->
        <div id="payment-section" style="margin-top:var(--space-3xl); padding-top:var(--space-xl); border-top:1px solid var(--color-border);">
          <span class="eyebrow">Consultation Fee</span>
          <h2 style="font-family:var(--font-serif); font-size:1.875rem; margin-bottom:var(--space-sm);">Secure Consultation Payment</h2>
          <p style="color:var(--taupe); margin-bottom:var(--space-xl);">
            If you have already spoken with our team and are ready to pay your consultation fee,
            you can do so securely below. WooCommerce / Stripe payment integration will be activated
            here upon installation.
          </p>
          <!-- Payment embed placeholder — replace with WooCommerce product shortcode or Stripe embed -->
          <div style="background:var(--tan-pale); border:1px solid var(--color-border); border-radius:var(--radius-md); padding:var(--space-xl); text-align:center;">
            <svg viewBox="0 0 24 24" fill="none" stroke="var(--taupe)" stroke-width="1.5" style="width:48px; height:48px; margin:0 auto var(--space-md);" aria-hidden="true"><rect x="1" y="4" width="22" height="16" rx="2"/><path d="M1 10h22"/></svg>
            <p style="font-size:.9375rem; color:var(--taupe);">Secure payment powered by Stripe.<br><strong style="color:var(--text-mid);">Payment form activates after WooCommerce + Stripe setup.</strong></p>
            <!-- [woocommerce_checkout] or [woocommerce_cart] shortcode goes here -->
          </div>
        </div>
      </div>

      <!-- Sidebar: Contact info + map placeholder -->
      <aside style="position:sticky; top:calc(var(--header-h) + var(--space-lg));">
        <div style="background:var(--tan-pale); border-radius:var(--radius-lg); padding:var(--space-xl); margin-bottom:var(--space-lg);">
          <h3 style="font-family:var(--font-serif); font-size:1.5rem; margin-bottom:var(--space-lg); color:var(--text-dark);">Office Information</h3>
          <div style="display:flex; flex-direction:column; gap:var(--space-md);">
            <div style="display:flex; gap:12px; align-items:flex-start;">
              <svg viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="1.5" style="width:20px; height:20px; flex-shrink:0; margin-top:2px;" aria-hidden="true"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
              <div>
                <p style="font-size:.9375rem; font-weight:600; color:var(--text-dark); margin-bottom:2px;">Address</p>
                <p style="font-size:.875rem; color:var(--taupe);">3421 Main Street<br>Atlanta, GA 30337</p>
              </div>
            </div>
            <div style="display:flex; gap:12px; align-items:flex-start;">
              <svg viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="1.5" style="width:20px; height:20px; flex-shrink:0; margin-top:2px;" aria-hidden="true"><path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
              <div>
                <p style="font-size:.9375rem; font-weight:600; color:var(--text-dark); margin-bottom:2px;">Phone</p>
                <a href="tel:7708477363" style="font-size:.875rem; color:var(--green);">(770) 847-7363</a>
              </div>
            </div>
            <div style="display:flex; gap:12px; align-items:flex-start;">
              <svg viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="1.5" style="width:20px; height:20px; flex-shrink:0; margin-top:2px;" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              <div>
                <p style="font-size:.9375rem; font-weight:600; color:var(--text-dark); margin-bottom:2px;">Office Hours</p>
                <p style="font-size:.875rem; color:var(--taupe);">Monday – Friday<br>9:00 AM – 6:00 PM ET</p>
              </div>
            </div>
          </div>
        </div>

        <div style="background:var(--green); border-radius:var(--radius-lg); padding:var(--space-xl); color:var(--white);">
          <h3 style="font-family:var(--font-serif); font-size:1.375rem; color:var(--white); margin-bottom:var(--space-sm);">Need Immediate Assistance?</h3>
          <p style="font-size:.9rem; color:rgba(255,255,255,.75); margin-bottom:var(--space-lg); line-height:1.6;">
            For time-sensitive matters, please call our office directly or send us a message indicating urgency.
          </p>
          <a href="tel:7708477363" class="btn btn-outline-light" style="width:100%; justify-content:center;">(770) 847-7363</a>
        </div>
      </aside>

    </div>
  </div>
</section>
</main>

<?php get_footer(); ?>
