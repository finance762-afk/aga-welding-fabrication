<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Accessibility Statement — AGA Welding & Fabrication
 * ------------------------------------------------------------------------- */
$pageType        = 'other';
$currentPage     = 'legal';
$pageTitle       = 'Accessibility Statement | ' . $siteName;
$pageDescription = 'AGA Welding & Fabrication\'s commitment to digital accessibility and WCAG 2.1 Level AA conformance.';
$canonicalUrl    = $siteUrl . '/accessibility/';
$ogImage         = $siteUrl . '/assets/images/logo.png';

$companyNameFull  = $siteName;
$companyState     = 'Texas';
$companyAddress   = $address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip'];
$lastUpdated      = date('F j, Y');

/* Schema — WebPage + BreadcrumbList */
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
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Accessibility', 'item' => $canonicalUrl],
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
      <h1 style="margin-bottom: 0.5rem;">Accessibility Statement</h1>
      <p class="hero-answer" style="color: var(--color-text-light); margin-bottom: 1rem;">Our commitment to digital accessibility</p>
      <p style="font-size: 0.9375rem; color: var(--color-text-light);">Last Updated: <?php echo $lastUpdated; ?></p>
    </div>
  </section>

  <!-- Breadcrumb -->
  <nav class="breadcrumb" aria-label="Breadcrumb" style="background: #fff; border-bottom: 1px solid var(--color-border); padding: 0.75rem 0; font-size: 0.875rem;">
    <div class="container">
      <ol style="display: flex; flex-wrap: wrap; gap: 0.5rem; list-style: none; margin: 0; padding: 0; align-items: center;">
        <li><a href="/" style="color: var(--color-text-light);">Home</a></li>
        <li style="color: rgba(0,0,0,0.25);">›</li>
        <li style="color: var(--color-primary); font-weight: 600;" aria-current="page">Accessibility</li>
      </ol>
    </div>
  </nav>

  <!-- Legal Content -->
  <article style="max-width: 65ch; margin: 0 auto; padding: 3rem 1.5rem;">

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">1. Our Commitment</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;"><?php echo $companyNameFull; ?> is committed to ensuring digital accessibility for people with disabilities. We continually improve the user experience for everyone and apply relevant accessibility standards to <?php echo $domain; ?>.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">2. Conformance Status</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">This site is designed to conform with Web Content Accessibility Guidelines (WCAG) 2.1 Level AA. WCAG defines requirements for designers and developers to improve accessibility for people with disabilities. Our site partially conforms with WCAG 2.1 Level AA, meaning some content does not yet fully meet the standard. We are working to address all known issues.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">3. Accessibility Features</h2>
    <ul style="margin-left: 1.5rem; margin-bottom: 1.5rem; line-height: 1.6;">
      <li style="margin-bottom: 0.5rem;">Semantic HTML5 markup with proper landmark regions (header, nav, main, footer)</li>
      <li style="margin-bottom: 0.5rem;">Skip-to-content link at the top of every page</li>
      <li style="margin-bottom: 0.5rem;">Visible keyboard focus indicators on all interactive elements</li>
      <li style="margin-bottom: 0.5rem;">Alt text on all meaningful images</li>
      <li style="margin-bottom: 0.5rem;">Sufficient color contrast for body text and interactive elements</li>
      <li style="margin-bottom: 0.5rem;">Responsive design that works across screen sizes and zoom levels</li>
      <li style="margin-bottom: 0.5rem;">prefers-reduced-motion support — animations disabled for users who request reduced motion</li>
      <li style="margin-bottom: 0.5rem;">ARIA labels on navigation and form elements</li>
      <li style="margin-bottom: 0.5rem;">Form field labels associated with inputs</li>
    </ul>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">4. Known Issues</h2>
    <p style="margin-bottom: 0.75rem; line-height: 1.7;">We are aware of these areas needing improvement:</p>
    <ul style="margin-left: 1.5rem; margin-bottom: 1.5rem; line-height: 1.6;">
      <li style="margin-bottom: 0.5rem;">Some third-party embeds may not fully meet WCAG standards. We provide alternative ways to access this information (call us, email us).</li>
      <li style="margin-bottom: 0.5rem;">Some PDF documents may not be fully accessible. Contact us for alternative formats.</li>
    </ul>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">5. Feedback and Reporting Issues</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">If you encounter an accessibility barrier on this site, please tell us. We aim to respond to accessibility feedback within 5 business days.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">6. Alternative Contact Methods</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">If our website is not accessible to you, you can reach us <?php if ($phone): ?>by phone or <?php endif; ?>by mail. We will provide service information in alternative formats on request.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">7. Changes to This Statement</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">We may update this Accessibility Statement from time to time. The "Last Updated" date at the top will reflect the most recent version.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">8. Contact Us</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">To report an accessibility issue or request assistance:</p>
    <p style="margin-bottom: 1rem; line-height: 1.7;">
      <strong><?php echo $companyNameFull; ?></strong><br>
      <?php if ($email): ?>Email: <a href="mailto:<?php echo $email; ?>" style="color: var(--color-accent); text-decoration: underline;"><?php echo $email; ?></a><br><?php endif; ?>
      <?php if ($phone): ?>Phone: <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" style="color: var(--color-accent); text-decoration: underline;"><?php echo $phone; ?></a><br><?php endif; ?>
      Address: <?php echo $companyAddress; ?>
    </p>

  </article>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
