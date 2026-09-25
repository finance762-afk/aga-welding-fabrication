<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Terms of Service — AGA Welding & Fabrication
 * ------------------------------------------------------------------------- */
$pageType        = 'other';
$currentPage     = 'legal';
$pageTitle       = 'Terms of Service | ' . $siteName;
$pageDescription = 'Terms and conditions for using AGA Welding & Fabrication services and website.';
$canonicalUrl    = $siteUrl . '/terms/';
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
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Terms of Service', 'item' => $canonicalUrl],
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
      <h1 style="margin-bottom: 0.5rem;">Terms of Service</h1>
      <p class="hero-answer" style="color: var(--color-text-light); margin-bottom: 1rem;">How we work together</p>
      <p style="font-size: 0.9375rem; color: var(--color-text-light);">Last Updated: <?php echo $lastUpdated; ?></p>
    </div>
  </section>

  <!-- Breadcrumb -->
  <nav class="breadcrumb" aria-label="Breadcrumb" style="background: #fff; border-bottom: 1px solid var(--color-border); padding: 0.75rem 0; font-size: 0.875rem;">
    <div class="container">
      <ol style="display: flex; flex-wrap: wrap; gap: 0.5rem; list-style: none; margin: 0; padding: 0; align-items: center;">
        <li><a href="/" style="color: var(--color-text-light);">Home</a></li>
        <li style="color: rgba(0,0,0,0.25);">›</li>
        <li style="color: var(--color-primary); font-weight: 600;" aria-current="page">Terms of Service</li>
      </ol>
    </div>
  </nav>

  <!-- Legal Content -->
  <article style="max-width: 65ch; margin: 0 auto; padding: 3rem 1.5rem;">

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">1. Agreement to Terms</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">By accessing or using <?php echo $domain; ?> or engaging <?php echo $companyNameFull; ?> for services, you agree to these Terms of Service. If you do not agree, do not use this site or our services.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">2. Use of This Website</h2>
    <p style="margin-bottom: 0.75rem; line-height: 1.7;">You may use this Site for personal, non-commercial purposes to learn about our services and contact us. You may not:</p>
    <ul style="margin-left: 1.5rem; margin-bottom: 1.5rem; line-height: 1.6;">
      <li style="margin-bottom: 0.5rem;">Use the Site for unlawful purposes</li>
      <li style="margin-bottom: 0.5rem;">Attempt to access non-public systems or data</li>
      <li style="margin-bottom: 0.5rem;">Scrape or copy content without written permission</li>
      <li style="margin-bottom: 0.5rem;">Submit false information through our contact forms</li>
      <li style="margin-bottom: 0.5rem;">Use automated systems to extract data from the Site</li>
    </ul>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">3. Service Estimates and Quotes</h2>
    <p style="margin-bottom: 0.75rem; line-height: 1.7;">All estimates are based on information provided and conditions visible at the time of consultation. Final pricing may differ if:</p>
    <ul style="margin-left: 1.5rem; margin-bottom: 1rem; line-height: 1.6;">
      <li style="margin-bottom: 0.5rem;">Project scope changes or expands</li>
      <li style="margin-bottom: 0.5rem;">Hidden conditions or damage are discovered</li>
      <li style="margin-bottom: 0.5rem;">Material costs change between estimate and project start</li>
      <li style="margin-bottom: 0.5rem;">Code requirements differ from initial assumptions</li>
    </ul>
    <p style="margin-bottom: 1rem; line-height: 1.7;">Verbal quotes are non-binding. Only written, signed contracts constitute a final agreement.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">4. Project Work</h2>
    <ul style="margin-left: 1.5rem; margin-bottom: 1.5rem; line-height: 1.6;">
      <li style="margin-bottom: 0.5rem;">Work is governed by a written contract specific to each job.</li>
      <li style="margin-bottom: 0.5rem;">We comply with applicable Texas state and local codes and standards.</li>
      <li style="margin-bottom: 0.5rem;">Work is performed by <?php echo $companyNameFull; ?> employees and qualified subcontractors.</li>
      <li style="margin-bottom: 0.5rem;">All workers carry appropriate insurance as required by Texas law.</li>
      <li style="margin-bottom: 0.5rem;">We are licensed and insured to operate in the state of Texas.</li>
    </ul>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">5. Warranties</h2>
    <p style="margin-bottom: 0.75rem; line-height: 1.7;">Workmanship warranties are detailed in your project contract. Manufacturer warranties on materials are provided by those manufacturers and pass through to you upon project completion. Warranties exclude:</p>
    <ul style="margin-left: 1.5rem; margin-bottom: 1.5rem; line-height: 1.6;">
      <li style="margin-bottom: 0.5rem;">Acts of nature beyond manufacturer ratings</li>
      <li style="margin-bottom: 0.5rem;">Damage from neglect or alteration by others</li>
      <li style="margin-bottom: 0.5rem;">Pre-existing conditions disclosed prior to work</li>
    </ul>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">6. Payment Terms</h2>
    <p style="margin-bottom: 0.75rem; line-height: 1.7;">Payment terms are specified in your project contract. Standard terms include:</p>
    <ul style="margin-left: 1.5rem; margin-bottom: 1rem; line-height: 1.6;">
      <li style="margin-bottom: 0.5rem;">Deposit at contract signing</li>
      <li style="margin-bottom: 0.5rem;">Progress payments at milestones where applicable</li>
      <li style="margin-bottom: 0.5rem;">Final balance due upon project completion</li>
    </ul>
    <p style="margin-bottom: 1rem; line-height: 1.7;">We accept check and electronic transfer. Past-due balances may accrue interest as permitted by Texas law.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">7. Cancellation</h2>
    <p style="margin-bottom: 0.75rem; line-height: 1.7;">Cancellation terms are specified in your contract. Generally:</p>
    <ul style="margin-left: 1.5rem; margin-bottom: 1.5rem; line-height: 1.6;">
      <li style="margin-bottom: 0.5rem;">Cancellation prior to materials ordered: deposit refunded minus administrative costs</li>
      <li style="margin-bottom: 0.5rem;">Cancellation after materials ordered: deposit forfeited; materials become customer property</li>
      <li style="margin-bottom: 0.5rem;">Cancellation after work begins: payment due for work completed plus materials</li>
    </ul>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">8. Limitation of Liability</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">To the maximum extent permitted by Texas law, <?php echo $companyNameFull; ?>'s total liability for any claim related to the Site or our services shall not exceed the amount you paid for the specific service giving rise to the claim. We are not liable for indirect, incidental, special, or consequential damages.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">9. Intellectual Property</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">All content on this Site — text, graphics, photographs, logos — is owned by <?php echo $companyNameFull; ?> or used with permission, and is protected by copyright. You may not reproduce, distribute, or create derivative works without written permission.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">10. Governing Law and Disputes</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">These Terms are governed by the laws of the State of Texas without regard to conflict-of-laws principles. Any disputes shall be resolved in the state or federal courts located in Bexar County, Texas.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">11. Changes to These Terms</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">We may update these Terms at any time. The "Last Updated" date will reflect the most recent version. Continued use of the Site after updates constitutes acceptance of revised Terms.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">12. Contact Us</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">Questions about these Terms?</p>
    <p style="margin-bottom: 1rem; line-height: 1.7;">
      <strong><?php echo $companyNameFull; ?></strong><br>
      <?php if ($email): ?>Email: <a href="mailto:<?php echo $email; ?>" style="color: var(--color-accent); text-decoration: underline;"><?php echo $email; ?></a><br><?php endif; ?>
      <?php if ($phone): ?>Phone: <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" style="color: var(--color-accent); text-decoration: underline;"><?php echo $phone; ?></a><br><?php endif; ?>
      Address: <?php echo $companyAddress; ?>
    </p>

    <div style="background: rgba(var(--color-accent-rgb, 232, 117, 24), 0.1); border-left: 4px solid var(--color-accent); padding: 1.5rem; margin: 3rem 0; border-radius: var(--radius); font-size: 0.9375rem; font-style: italic;">
      This Terms of Service document is provided as a general template. We recommend reviewing this document with a licensed <?php echo $companyState; ?> attorney before publication.
    </div>

  </article>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
