<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/**
 * Research sources (2026-09-25):
 * - https://www.liveoaktx.gov/ (official city website)
 * - https://en.wikipedia.org/wiki/Live_Oak,_Texas
 *
 * Verified details:
 * - Population: ~16,000
 * - Location: northeast Bexar County, adjacent to Randolph AFB and Universal City
 * - Elevation: 650-750 ft
 * - USDA zone: 9a
 * - Key features: Toepperwein Road commercial corridor, residential neighborhoods
 */

$pageType    = 'city';
$citySlug    = 'live-oak';
$currentPage = 'service-areas';

$pageTitle       = 'Welding & Metal Fabrication in Live Oak, TX | ' . $siteName;
$pageDescription = 'Professional welding services in Live Oak, TX. AGA Welding & Fabrication serves Live Oak with structural steel, custom metalwork, and certified welding — residential and commercial projects across northeast Bexar County.';
$canonicalUrl    = $siteUrl . '/service-areas/live-oak/';
$ogImage         = $siteUrl . '/assets/images/structural-steel-beams.jpg';

$heroImg = 'metal-cutting-bandsaw';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => $siteUrl . '/'],
    ['name' => 'Service Areas', 'url' => $siteUrl . '/service-areas/'],
    ['name' => 'Live Oak', 'url' => $canonicalUrl],
]);

$localBusinessSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Contractor',
    '@id' => $siteUrl . '/#organization',
    'name' => $siteName,
    'url' => $siteUrl,
    'areaServed' => [
        '@type' => 'City',
        'name' => 'Live Oak',
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
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg" srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w" sizes="100vw" alt="Precision metal cutting at AGA Welding shop" width="1600" height="1067" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>
  <div class="container">
    <div class="hero-grid hero-grid--form">
      <div class="hero-text">
        <span class="eyebrow">Live Oak, TX</span>
        <h1 class="hero-title">Welding &amp; Fabrication in <span class="text-accent">Live Oak</span></h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication serves Live Oak, TX with precision welding and metal fabrication — from residential railings to commercial structural steel across northeast Bexar County, delivering certified work 10 minutes from your job site.</p>
        <div class="hero-chips">
          <span class="chip"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>Serving Live Oak</span>
          <span class="chip"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>Licensed TX Contractor</span>
          <span class="chip"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg><?php echo $yearsInBusiness; ?> Years</span>
        </div>
        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg" data-open-estimate>Get free estimate</button>
          <?php if ($phone): ?><a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="btn btn-secondary btn-lg"><svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" /></svg>Call Now</a><?php endif; ?>
        </div>
      </div>
      <div class="hero-form-card">
        <h2 class="hero-form-title">Free estimate in Live Oak</h2>
        <p class="hero-form-subtitle">Same-day reply.</p>
        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off">
          <input type="hidden" name="_next" value="<?php echo $siteUrl; ?>/thank-you">
          <?php echo p1_attribution_fields('hero'); ?>
          <input type="hidden" name="consent_version" value="v2.1">
          <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
          <div class="form-row">
            <div class="field"><label for="hero-name">Name</label><input id="hero-name" type="text" name="name" required></div>
            <div class="field"><label for="hero-phone">Phone</label><input id="hero-phone" type="tel" name="phone" required></div>
            <div class="field full"><label for="hero-service">Service</label><select id="hero-service" name="service"><option value="">Select a service</option><?php foreach ($services as $s): ?><option><?php echo esc($s['name']); ?></option><?php endforeach; ?></select></div>
          </div>
          <label class="consent"><input type="checkbox" name="terms_accepted" value="yes" required><span class="footnote">I agree to the <a href="/privacy-policy/">Privacy Policy</a> and <a href="/terms/">Terms</a>. *</span></label>
          <button type="submit" class="btn btn-primary btn-block">Get estimate</button>
        </form>
      </div>
    </div>
  </div>
</section>

<nav class="breadcrumb container"><a href="/">Home</a><span class="breadcrumb-sep">/</span><a href="/service-areas/">Service Areas</a><span class="breadcrumb-sep">/</span><span>Live Oak</span></nav>

<section class="section">
  <div class="container-narrow">
    <h2>Metal Fabrication Serving Live Oak's Commercial Corridor</h2>
    <div class="answer-block">
      <p><strong><?php echo $siteName; ?> is a Texas-licensed welding contractor serving Live Oak and northeast Bexar County with structural steel, custom metalwork, and certified welding.</strong> Our San Antonio shop sits 10 minutes from Live Oak via Toepperwein Road, putting precision metal fabrication within easy reach for residential and commercial projects citywide.</p>
    </div>
    <p>Live Oak's location between Randolph Air Force Base and the expanding Toepperwein commercial corridor creates steady demand for structural welders and custom fabricators. AGA Welding & Fabrication brings <?php echo $yearsInBusiness; ?> years of metal-joining experience to that mix, handling handrails for multi-family developments, equipment repairs for warehouse operations, and custom steel for Live Oak businesses.</p>
    <p>The elevation range here (650–750 ft) sits slightly lower than Converse but higher than central San Antonio, affecting how crews schedule thick-section outdoor welds during summer heat. Our welders account for those conditions to deliver code-compliant work year-round across the Live Oak service area.</p>
    <p>From residential railings to industrial racks, we fabricate on spec, weld to certified procedures, and deliver on schedule. If your Live Oak project demands structural integrity or custom precision, AGA Welding & Fabrication has the expertise and proximity to handle it.</p>
  </div>
</section>

<section class="cta-band" id="estimate">
  <span class="grain" aria-hidden="true"></span>
  <div class="container">
    <div class="cta-content">
      <h2>Ready to Start Your Live Oak Project?</h2>
      <p>Get a free, no-obligation estimate. We'll review your specs and reply the same day with a clear quote.</p>
      <div class="cta-actions">
        <button type="button" class="btn btn-primary btn-lg" data-open-estimate>Get free estimate</button>
        <?php if ($phone): ?><a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="btn btn-secondary btn-lg"><svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" /></svg>Call</a><?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
