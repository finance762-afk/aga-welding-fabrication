<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Privacy Policy — AGA Welding & Fabrication
 * ------------------------------------------------------------------------- */
$pageType        = 'other';
$currentPage     = 'legal';
$pageTitle       = 'Privacy Policy | ' . $siteName;
$pageDescription = 'How AGA Welding & Fabrication collects, uses, and protects your information. Privacy practices for our website and contact forms.';
$canonicalUrl    = $siteUrl . '/privacy-policy/';
$ogImage         = $siteUrl . '/assets/images/logo.png';

$companyNameFull  = $siteName;
$companyState     = 'Texas';
$companyAddress   = $address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip'];
$lastUpdated      = date('F j, Y');

/* Schema — WebPage + BreadcrumbList only (no FAQPage, no Service on legal pages) */
$schemaGraph = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'WebPage',
            '@id' => $canonicalUrl . '#webpage',
            'url' => $canonicalUrl,
            'name' => $pageTitle,
            'description' => $pageDescription,
        ],
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Privacy Policy', 'item' => $canonicalUrl],
            ],
        ],
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- Schema markup -->
<script type="application/ld+json">
<?php echo json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
</script>

<main id="main-content">

  <!-- Hero -->
  <section class="hero hero--interior" style="background: var(--color-bg-alt); padding-top: calc(var(--nav-height) + 3rem); padding-bottom: 3rem;">
    <div class="container" style="max-width: 700px;">
      <span class="eyebrow" style="display: block; margin-bottom: 0.75rem; color: var(--color-accent); font-family: var(--font-accent); text-transform: uppercase; letter-spacing: 0.1em; font-size: 0.875rem;">Legal</span>
      <h1 style="margin-bottom: 0.5rem;">Privacy Policy</h1>
      <p class="hero-answer" style="color: var(--color-text-light); margin-bottom: 1rem;">Your data, our commitments</p>
      <p style="font-size: 0.9375rem; color: var(--color-text-light);">Last Updated: <?php echo $lastUpdated; ?></p>
    </div>
  </section>

  <!-- Breadcrumb -->
  <nav class="breadcrumb" aria-label="Breadcrumb" style="background: #fff; border-bottom: 1px solid var(--color-border); padding: 0.75rem 0; font-size: 0.875rem;">
    <div class="container">
      <ol style="display: flex; flex-wrap: wrap; gap: 0.5rem; list-style: none; margin: 0; padding: 0; align-items: center;">
        <li><a href="/" style="color: var(--color-text-light);">Home</a></li>
        <li style="color: rgba(0,0,0,0.25);">›</li>
        <li style="color: var(--color-primary); font-weight: 600;" aria-current="page">Privacy Policy</li>
      </ol>
    </div>
  </nav>

  <!-- Legal Content -->
  <article style="max-width: 65ch; margin: 0 auto; padding: 3rem 1.5rem;">

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">1. Introduction</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">This Privacy Policy explains how <?php echo $companyNameFull; ?> ("we", "us", "our") collects, uses, and protects your personal information when you visit <?php echo $domain; ?> or interact with our services.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">2. Information We Collect</h2>
    <ul style="margin-left: 1.5rem; margin-bottom: 1.5rem; line-height: 1.6;">
      <li style="margin-bottom: 0.5rem;"><strong>Information you provide:</strong> name, email, phone, project details (via contact forms, phone calls, or in-person consultations)</li>
      <li style="margin-bottom: 0.5rem;"><strong>Photo uploads:</strong> if you submit project reference images or specifications through our forms</li>
      <li style="margin-bottom: 0.5rem;"><strong>Automatically collected:</strong> IP address, browser type, device info, pages visited, referring URL, timestamps (via analytics)</li>
      <li style="margin-bottom: 0.5rem;"><strong>Cookies and similar technologies:</strong> see our <a href="/cookie-policy/" style="color: var(--color-accent); text-decoration: underline;">Cookie Policy</a></li>
    </ul>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">3. How We Use Your Information</h2>
    <ul style="margin-left: 1.5rem; margin-bottom: 1.5rem; line-height: 1.6;">
      <li style="margin-bottom: 0.5rem;">Respond to inquiries and provide requested services</li>
      <li style="margin-bottom: 0.5rem;">Schedule estimates, consultations, and project work</li>
      <li style="margin-bottom: 0.5rem;">Communicate during active projects</li>
      <li style="margin-bottom: 0.5rem;">Send service-related communications (including phone calls and SMS messages where you have consented)</li>
      <li style="margin-bottom: 0.5rem;">Improve our website and services</li>
      <li style="margin-bottom: 0.5rem;">Comply with legal obligations (licensing, insurance, tax)</li>
    </ul>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">4. How We Share Your Information</h2>
    <ul style="margin-left: 1.5rem; margin-bottom: 1.5rem; line-height: 1.6;">
      <li style="margin-bottom: 0.5rem;">We do <strong>NOT</strong> sell personal information.</li>
      <li style="margin-bottom: 0.5rem;"><strong>Service providers:</strong> Analytics services, contact form processors, our hosting provider, and Page One Insights, LLC (our web design partner — receives copies of contact form submissions via forwarding field for lead-tracking purposes).</li>
      <li style="margin-bottom: 0.5rem;"><strong>Subcontractors and material suppliers:</strong> as necessary to complete your project.</li>
      <li style="margin-bottom: 0.5rem;"><strong>Legal compliance:</strong> if required by Texas or federal law.</li>
      <li style="margin-bottom: 0.5rem;"><strong>Business transfers:</strong> in the event of a merger, acquisition, or sale of business assets.</li>
    </ul>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">5. Your Privacy Rights</h2>

    <h3 id="state-rights" style="color: var(--color-primary); font-size: 1.125rem; margin-top: 1.5rem; margin-bottom: 0.75rem;">Texas Residents</h3>
    <p style="margin-bottom: 1rem; line-height: 1.7;">You may request access to or deletion of personal information we hold about you. Contact us using the methods below.</p>

    <h3 id="ccpa-rights" style="color: var(--color-primary); font-size: 1.125rem; margin-top: 1.5rem; margin-bottom: 0.75rem;">California Residents (CCPA / CPRA)</h3>
    <p style="margin-bottom: 1rem; line-height: 1.7;">If you are a California resident, you have the following rights under the California Consumer Privacy Act (CCPA) and California Privacy Rights Act (CPRA):</p>
    <ul style="margin-left: 1.5rem; margin-bottom: 1.5rem; line-height: 1.6;">
      <li style="margin-bottom: 0.5rem;"><strong>Right to know</strong> what personal information we collect, use, disclose, and sell.</li>
      <li style="margin-bottom: 0.5rem;"><strong>Right to delete</strong> personal information we have collected from you, subject to certain exceptions.</li>
      <li style="margin-bottom: 0.5rem;"><strong>Right to correct</strong> inaccurate personal information.</li>
      <li style="margin-bottom: 0.5rem;"><strong>Right to opt-out of sale or sharing</strong> of personal information. (We do not sell personal information, but you may still submit an opt-out request for our records.)</li>
      <li style="margin-bottom: 0.5rem;"><strong>Right to limit use</strong> of sensitive personal information.</li>
      <li style="margin-bottom: 0.5rem;"><strong>Right to non-discrimination</strong> — we will not deny you services or charge different prices based on exercising your rights.</li>
    </ul>
    <p style="margin-bottom: 1rem; line-height: 1.7;"><strong>How to exercise your rights:</strong> <?php if ($email): ?>Email <a href="mailto:<?php echo $email; ?>" style="color: var(--color-accent); text-decoration: underline;"><?php echo $email; ?></a><?php endif; ?><?php if ($phone && $email): ?> or <?php endif; ?><?php if ($phone): ?>call <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" style="color: var(--color-accent); text-decoration: underline;"><?php echo $phone; ?></a><?php endif; ?><?php if (!$email && !$phone): ?>Contact us using the information at the end of this policy<?php endif; ?>. We will respond within 45 days of receipt.</p>

    <h3 style="color: var(--color-primary); font-size: 1.125rem; margin-top: 1.5rem; margin-bottom: 0.75rem;">Other State Residents</h3>
    <p style="margin-bottom: 1rem; line-height: 1.7;">Residents of Colorado, Virginia, Connecticut, Utah, and Texas have similar rights under their respective state privacy laws. Contact us using the same methods above to exercise your rights.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">6. SMS and Phone Communications</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">When you submit our contact form and provide consent, you agree to receive phone calls and SMS text messages from us about your project request. Standard message and data rates may apply. Consent is not a condition of purchase. You can opt out of SMS communications at any time by replying STOP to any text message. You can opt out of phone communications at any time by <?php if ($email): ?>emailing us at <a href="mailto:<?php echo $email; ?>" style="color: var(--color-accent); text-decoration: underline;"><?php echo $email; ?></a><?php else: ?>contacting us directly<?php endif; ?>.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">7. Data Retention</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">We retain contact form submissions and service records for as long as necessary to provide services and comply with legal obligations, typically 5–7 years for business and warranty records. Photos uploaded via contact forms are deleted after the related project is closed unless retained for warranty or legal purposes.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">8. Data Security</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">We use reasonable administrative, technical, and physical safeguards including SSL encryption on all form submissions and secure hosting infrastructure. No system is 100% secure. We cannot guarantee absolute security, but we work to minimize risks.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">9. Children's Privacy</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">This site is not directed to children under 13. We do not knowingly collect information from children. If you believe a child has provided us information, contact us and we will delete it.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">10. Third-Party Links</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">Our website may link to third-party sites (social media, review platforms, industry associations, etc.). We are not responsible for the privacy practices of these sites. Review their privacy policies separately.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">11. Changes to This Policy</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">We may update this Privacy Policy from time to time. The "Last Updated" date at the top will reflect the most recent change. Material changes will be prominently posted on the site.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">12. Contact Us</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">For privacy questions or to exercise your rights:</p>
    <p style="margin-bottom: 1rem; line-height: 1.7;">
      <strong><?php echo $companyNameFull; ?></strong><br>
      <?php if ($email): ?>Email: <a href="mailto:<?php echo $email; ?>" style="color: var(--color-accent); text-decoration: underline;"><?php echo $email; ?></a><br><?php endif; ?>
      <?php if ($phone): ?>Phone: <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" style="color: var(--color-accent); text-decoration: underline;"><?php echo $phone; ?></a><br><?php endif; ?>
      Address: <?php echo $companyAddress; ?>
    </p>

    <div style="background: rgba(var(--color-accent-rgb, 232, 117, 24), 0.1); border-left: 4px solid var(--color-accent); padding: 1.5rem; margin: 3rem 0; border-radius: var(--radius); font-size: 0.9375rem; font-style: italic;">
      This Privacy Policy is provided as a general template. We recommend reviewing this document with a licensed <?php echo $companyState; ?> attorney before publication to ensure compliance with current state and federal privacy laws.
    </div>

  </article>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
