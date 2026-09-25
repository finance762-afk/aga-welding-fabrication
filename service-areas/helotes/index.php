<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/**
 * Research sources (2026-09-25):
 * - https://en.wikipedia.org/wiki/Helotes,_Texas
 * - https://en-gb.topographic-map.com/map-7lw5k/Helotes/
 * - https://tpwd.texas.gov/state-parks/government-canyon
 *
 * Verified details:
 * - Elevation: 1,037 ft (316 m)
 * - Location: 20 miles northwest of downtown San Antonio, Bexar County
 * - Helotes Creek valley, Hill Country edge
 * - Landmarks: Old Town Helotes, John T. Floore Country Store, Government Canyon State Natural Area (13,000 acres, 40+ miles trails)
 * - Population: ~9,030 (2020 census)
 */

$pageType    = 'city';
$citySlug    = 'helotes';
$currentPage = 'service-areas';

$pageTitle       = 'Welding & Metal Fabrication in Helotes, TX | ' . $siteName;
$pageDescription = 'Expert metal fabrication and welding in Helotes, TX. AGA Welding & Fabrication serves northwest San Antonio with custom railings, gates, structural steel, and residential metalwork.';
$canonicalUrl    = $siteUrl . '/service-areas/helotes/';
$ogImage         = $siteUrl . '/assets/images/custom-metalwork.jpg';

/* Hero image */
$heroImg = 'custom-metal-pipe-support';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => $siteUrl . '/'],
    ['name' => 'Service Areas', 'url' => $siteUrl . '/service-areas/'],
    ['name' => 'Helotes', 'url' => $canonicalUrl],
]);

$localBusinessSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Contractor',
    '@id' => $siteUrl . '/#organization',
    'name' => $siteName,
    'url' => $siteUrl,
    'areaServed' => [
        '@type' => 'City',
        'name' => 'Helotes',
        'containedInPlace' => ['@type' => 'State', 'name' => 'Texas'],
    ],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>
<script type="application/ld+json"><?php echo $localBusinessSchema; ?></script>

<!-- HERO -->
<section class="hero hero--photo">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg" srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w" sizes="100vw" alt="Custom metal pipe support fabricated by AGA Welding" width="1600" height="1067" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>
  <div class="container">
    <div class="hero-grid hero-grid--form">
      <div class="hero-text">
        <span class="eyebrow">Helotes, TX</span>
        <h1 class="hero-title">Metal Fabrication in <span class="text-accent">Helotes</span></h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication serves Helotes and northwest San Antonio with custom metal fabrication, handrails, gates, and structural welding — delivering precision metalwork for residential and commercial properties 20 miles from our shop.</p>
        <div class="hero-chips">
          <span class="chip"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>Northwest San Antonio</span>
          <span class="chip"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>Licensed Contractor</span>
          <span class="chip"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg><?php echo $yearsInBusiness; ?> Years</span>
        </div>
        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg" data-open-estimate">Get free estimate</button>
          <?php if ($phone): ?><a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="btn btn-secondary btn-lg">Call <?php echo htmlspecialchars($phone); ?></a><?php endif; ?>
        </div>
      </div>
      <div class="hero-form-card">
        <h2 class="hero-form-title">Free estimate in Helotes</h2>
        <p class="hero-form-subtitle">We reply the same day.</p>
        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <?php echo p1_attribution_fields('hero'); ?>
          <input type="hidden" name="consent_version" value="v2.1">
          <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
          <div class="form-row">
            <div class="field"><label for="hero-name">Your Name</label><input id="hero-name" type="text" name="name" required></div>
            <div class="field"><label for="hero-phone">Phone</label><input id="hero-phone" type="tel" name="phone" required></div>
            <div class="field full"><label for="hero-service">Service Needed</label><select id="hero-service" name="service"><option value="">Select a service</option><?php foreach ($services as $s): ?><option value="<?php echo htmlspecialchars($s['name']); ?>"><?php echo htmlspecialchars($s['name']); ?></option><?php endforeach; ?></select></div>
          </div>
          <label class="form-consent-item consent form-consent-required"><input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required><span class="consent-label footnote">I agree to the <a href="/privacy-policy/">Privacy Policy</a> and <a href="/terms/">Terms</a>. *</span></label>
          <button type="submit" class="btn btn-primary btn-block">Send request</button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- LOCAL CONTENT -->
<section class="section">
  <div class="container-narrow">
    <div class="answer-block">
      <h2>Metal Fabrication &amp; Welding for Helotes Homes &amp; Businesses</h2>
      <p class="answer-first">AGA Welding &amp; Fabrication is a licensed Texas contractor serving Helotes from our San Antonio shop, delivering custom metal fabrication, handrails, gates, and structural welding to northwest Bexar County residential and commercial clients with <?php echo $yearsInBusiness; ?> years of precision craftsmanship.</p>
    </div>
    <p>Helotes sits 20 miles northwest of downtown San Antonio at 1,037 feet elevation in the Helotes Creek valley where the waterway exits the Texas Hill Country — a geographic transition zone that creates distinct fabrication demands. The proximity to Government Canyon State Natural Area's 13,000-acre wilderness and 40 miles of trails draws homeowners who value durable, weather-resistant metalwork, while Old Town Helotes and the John T. Floore Country Store anchor a community that balances Hill Country character with suburban growth. Our shop fabricates custom railings for Helotes homes navigating creek-adjacent terrain, gates for Hill Country property entries, and commercial metalwork for local businesses.</p>
    <p>We work from your drawings or develop designs in-house, fabricating carbon steel, stainless, and aluminum for residential railings, commercial handrails, decorative gates, and structural repairs. AGA Welding &amp; Fabrication quotes projects clearly, delivers on schedule, and installs on-site in Helotes when field work is required — bringing welding equipment and expertise directly to your property.</p>
    <p>Helotes clients choose AGA Welding &amp; Fabrication for responsive service, transparent pricing, and metalwork that meets Texas building codes while complementing northwest San Antonio's Hill Country aesthetic. Whether your project is a custom residential gate or a commercial handrail system, you're working with a Texas contractor that stands behind every weld.</p>
  </div>
</section>

<!-- CTA -->
<section class="section cta-band" id="estimate">
  <span class="grain"></span>
  <div class="container">
    <div class="cta-content">
      <h2 class="cta-title">Ready to Start Your Helotes Project?</h2>
      <p class="cta-text">Get a free estimate for welding and metal fabrication in Helotes. We'll review your project and provide a clear quote.</p>
    </div>
    <div class="cta-actions">
      <?php if ($phone): ?><a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="btn btn-primary btn-lg">Call Now</a><?php endif; ?>
      <button type="button" class="btn btn-secondary btn-lg" data-open-estimate">Get Free Estimate</button>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
