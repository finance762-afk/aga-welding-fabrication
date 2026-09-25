<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Cookie Policy — AGA Welding & Fabrication
 * ------------------------------------------------------------------------- */
$pageType        = 'other';
$currentPage     = 'legal';
$pageTitle       = 'Cookie Policy | ' . $siteName;
$pageDescription = 'How AGA Welding & Fabrication uses cookies and similar tracking technologies on our website.';
$canonicalUrl    = $siteUrl . '/cookie-policy/';
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
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Cookie Policy', 'item' => $canonicalUrl],
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
      <h1 style="margin-bottom: 0.5rem;">Cookie Policy</h1>
      <p class="hero-answer" style="color: var(--color-text-light); margin-bottom: 1rem;">How we use cookies on our site</p>
      <p style="font-size: 0.9375rem; color: var(--color-text-light);">Last Updated: <?php echo $lastUpdated; ?></p>
    </div>
  </section>

  <!-- Breadcrumb -->
  <nav class="breadcrumb" aria-label="Breadcrumb" style="background: #fff; border-bottom: 1px solid var(--color-border); padding: 0.75rem 0; font-size: 0.875rem;">
    <div class="container">
      <ol style="display: flex; flex-wrap: wrap; gap: 0.5rem; list-style: none; margin: 0; padding: 0; align-items: center;">
        <li><a href="/" style="color: var(--color-text-light);">Home</a></li>
        <li style="color: rgba(0,0,0,0.25);">›</li>
        <li style="color: var(--color-primary); font-weight: 600;" aria-current="page">Cookie Policy</li>
      </ol>
    </div>
  </nav>

  <!-- Legal Content -->
  <article style="max-width: 65ch; margin: 0 auto; padding: 3rem 1.5rem;">

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">1. What Are Cookies?</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">Cookies are small text files stored on your device when you visit a website. They are used to make websites work more efficiently and provide information to site owners about how visitors use the site.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">2. Cookies We Use</h2>

    <h3 style="color: var(--color-primary); font-size: 1.125rem; margin-top: 1.5rem; margin-bottom: 0.75rem;">Strictly Necessary</h3>
    <p style="margin-bottom: 1rem; line-height: 1.7;">Essential for site functionality (form submission, security). These cannot be disabled. Example: session cookies during form submission.</p>

    <h3 style="color: var(--color-primary); font-size: 1.125rem; margin-top: 1.5rem; margin-bottom: 0.75rem;">Analytics Cookies</h3>
    <p style="margin-bottom: 1rem; line-height: 1.7;">We may use analytics services to understand how visitors use our site. These services set cookies to collect anonymized data about site usage patterns.</p>

    <h3 style="color: var(--color-primary); font-size: 1.125rem; margin-top: 1.5rem; margin-bottom: 0.75rem;">Third-Party Embeds</h3>
    <p style="margin-bottom: 1rem; line-height: 1.7;">Our site may embed tools and content from third parties (maps, review widgets, etc.). These services may set their own cookies subject to their own privacy policies.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">3. How to Control Cookies</h2>
    <p style="margin-bottom: 0.75rem; line-height: 1.7;">Most browsers allow you to view, delete, or block cookies. You can:</p>
    <ul style="margin-left: 1.5rem; margin-bottom: 1rem; line-height: 1.6;">
      <li style="margin-bottom: 0.5rem;">Block third-party cookies while allowing first-party cookies</li>
      <li style="margin-bottom: 0.5rem;">Block all cookies (note: site functionality may break)</li>
      <li style="margin-bottom: 0.5rem;">Delete cookies after each browsing session</li>
    </ul>
    <p style="margin-bottom: 1rem; line-height: 1.7;">Browser-specific instructions are available from Google Chrome, Mozilla Firefox, Apple Safari, and Microsoft Edge support sites.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">4. Our Cookie Notice</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">We display a brief banner notifying visitors of our cookie use. Once dismissed, the banner is suppressed for future visits via localStorage. You can re-enable the banner by clearing your browser's site data.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">5. Changes to This Policy</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">We may update this Cookie Policy from time to time. The "Last Updated" date at the top will reflect the most recent version.</p>

    <h2 style="color: var(--color-primary); font-size: 1.5rem; margin-top: 2rem; margin-bottom: 1rem;">6. Contact Us</h2>
    <p style="margin-bottom: 1rem; line-height: 1.7;">Questions about cookies or this policy?</p>
    <p style="margin-bottom: 1rem; line-height: 1.7;">
      <strong><?php echo $companyNameFull; ?></strong><br>
      <?php if ($email): ?>Email: <a href="mailto:<?php echo $email; ?>" style="color: var(--color-accent); text-decoration: underline;"><?php echo $email; ?></a><br><?php endif; ?>
      <?php if ($phone): ?>Phone: <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" style="color: var(--color-accent); text-decoration: underline;"><?php echo $phone; ?></a><br><?php endif; ?>
      Address: <?php echo $companyAddress; ?>
    </p>

    <div style="background: rgba(var(--color-accent-rgb, 232, 117, 24), 0.1); border-left: 4px solid var(--color-accent); padding: 1.5rem; margin: 3rem 0; border-radius: var(--radius); font-size: 0.9375rem; font-style: italic;">
      This Cookie Policy is provided as a general template. We recommend reviewing this document with a licensed <?php echo $companyState; ?> attorney before publication.
    </div>

  </article>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
