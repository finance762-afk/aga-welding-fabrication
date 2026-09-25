<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Contact Page — AGA Welding & Fabrication (Phase 5)
 * ------------------------------------------------------------------------- */
$pageType    = 'contact';
$currentPage = 'contact';

$pageTitle       = 'Contact AGA Welding & Fabrication | San Antonio Metal Fabrication';
$pageDescription = 'Contact AGA Welding & Fabrication for welding and metal fabrication services in San Antonio, TX. Request a free estimate or call us today for structural steel, custom metalwork, and certified welding.';
$canonicalUrl    = $siteUrl . '/contact/';
$ogImage         = $siteUrl . '/assets/images/logo.png';

/* Schema */
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',    'url' => $siteUrl . '/'],
    ['name' => 'Contact', 'url' => $canonicalUrl],
]);
$schemaMarkup = $breadcrumbSchema;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $schemaMarkup; ?></script>

<main id="main-content">

<!-- ============================ HERO ============================ -->
<section class="hero hero--interior" aria-label="Contact AGA Welding & Fabrication">
  <div class="container">
    <div class="hero-text-center">
      <span class="eyebrow">Get in Touch</span>
      <h1 class="hero-title">Contact <span class="text-accent">AGA Welding &amp; Fabrication</span></h1>
      <p class="hero-answer">Tell us about your welding or metal fabrication project and we'll get back to you the same day with a clear, no-obligation estimate.</p>
    </div>
  </div>
</section>

<!-- ============================ CONTACT FORM & INFO ============================ -->
<section class="section section--light" aria-label="Contact form and business information">
  <div class="container">
    <div class="contact-layout">

      <!-- Contact Form -->
      <div class="contact-form-wrap reveal-up">
        <h2>Send us a message</h2>
        <p>We typically reply within a few hours during business days.</p>

        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="contact-form">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <?php echo p1_attribution_fields('contact'); ?>
          <input type="hidden" name="consent_version" value="v2.1">
          <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

          <div class="form-row">
            <label for="contact-name">Your Name *</label>
            <input id="contact-name" type="text" name="name" autocomplete="name" required>
          </div>

          <div class="form-row">
            <label for="contact-phone">Phone *</label>
            <input id="contact-phone" type="tel" name="phone" autocomplete="tel" required>
          </div>

          <div class="form-row">
            <label for="contact-email">Email *</label>
            <input id="contact-email" type="email" name="email" autocomplete="email" required>
          </div>

          <div class="form-row">
            <label for="contact-service">Service Needed</label>
            <select id="contact-service" name="service">
              <option value="">Select a service</option>
              <?php foreach ($services as $contactSvc): ?>
              <option value="<?php echo htmlspecialchars($contactSvc['name']); ?>"><?php echo htmlspecialchars($contactSvc['name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-row">
            <label for="contact-message">Project Details</label>
            <textarea id="contact-message" name="message" rows="5" placeholder="Tell us about the metal type, dimensions, quantity, drawings, deadline, or any special requirements…"></textarea>
          </div>

          <fieldset class="form-consent-fieldset">
            <legend class="form-consent-legend">Communication Consent</legend>
            <label class="form-consent-item">
              <input type="checkbox" name="email_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label"><strong>Email updates (optional):</strong> I agree to receive emails from <?php echo htmlspecialchars($siteName); ?> about my inquiry and services. I can unsubscribe anytime.</span>
            </label>
            <label class="form-consent-item">
              <input type="checkbox" name="sms_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label"><strong>SMS/Text messages (optional):</strong> I agree to receive texts from <?php echo htmlspecialchars($siteName); ?> at the number I provided. Message and data rates may apply; reply STOP to unsubscribe, HELP for help. <strong>Consent is not a condition of purchase.</strong></span>
            </label>
            <label class="form-consent-item form-consent-required">
              <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
              <span class="consent-label">I have read and agree to the <a href="/privacy-policy/" target="_blank" rel="noopener">Privacy Policy</a> and <a href="/terms/" target="_blank" rel="noopener">Terms of Service</a>. <span class="required-star">*</span></span>
            </label>
          </fieldset>

          <button type="submit" class="btn btn-primary btn-lg btn-block">Send my request</button>
        </form>
      </div>

      <!-- Contact Info Sidebar -->
      <aside class="contact-info reveal-up reveal-delay-1">
        <h3>Visit our shop</h3>

        <div class="contact-info-block">
          <h4><?php echo icon('map-pin', 20); ?> Address</h4>
          <p>
            <?php echo htmlspecialchars($address['street']); ?><br>
            <?php echo htmlspecialchars($address['city']); ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?>
          </p>
        </div>

        <?php if ($phone): ?>
        <div class="contact-info-block">
          <h4><?php echo icon('phone', 20); ?> Phone</h4>
          <p><a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>"><?php echo htmlspecialchars($phone); ?></a></p>
        </div>
        <?php endif; ?>

        <?php if ($email): ?>
        <div class="contact-info-block">
          <h4><?php echo icon('mail', 20); ?> Email</h4>
          <p><a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a></p>
        </div>
        <?php endif; ?>

        <div class="contact-info-block">
          <h4><?php echo icon('clock', 20); ?> Business Hours</h4>
          <p>
            Monday – Friday: 8:00 AM – 5:00 PM<br>
            Saturday & Sunday: Closed
          </p>
        </div>

        <div class="contact-info-block">
          <h4><?php echo icon('map', 20); ?> Service Area</h4>
          <p>We serve the greater San Antonio and Bexar County area, with mobile welding available for on-site work.</p>
        </div>

      </aside>

    </div>
  </div>
</section>

<!-- ============================ MAP ============================ -->
<?php if (!empty($gbpMapEmbed)): ?>
<section class="section map-section" aria-label="Location map">
  <div class="container-wide">
    <div class="section-head reveal-up">
      <h2>Find us in <span class="text-accent">San Antonio</span></h2>
      <p>Our shop is located at <?php echo htmlspecialchars($address['street']); ?> in southeast San Antonio, just off I-37.</p>
    </div>
    <div class="map-embed reveal-up">
      <?php echo $gbpMapEmbed; ?>
    </div>
    <?php if (!empty($geo['lat']) && !empty($geo['lng'])): ?>
    <div style="text-align:center; margin-top:1.5rem;">
      <a href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $geo['lat']; ?>,<?php echo $geo['lng']; ?>" class="btn btn-secondary" target="_blank" rel="noopener">
        <?php echo icon('navigation', 18); ?> Get Directions
      </a>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
