<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/**
 * Research sources (2026-09-25):
 * - https://www.seguintexas.gov/ (official city website)
 * - https://en.wikipedia.org/wiki/Seguin,_Texas
 * - https://planthardiness.ars.usda.gov/ (USDA zone verification)
 *
 * Verified details:
 * - Population: ~30,000 (Guadalupe County seat)
 * - Location: East of San Antonio on I-10 corridor
 * - Elevation: 500-600 ft
 * - USDA zone: 9a
 * - Key features: Historic downtown, Guadalupe River, "Pecan Capital of Texas", historic district
 * - Economy: Mix of historic preservation, agriculture heritage, and I-10 commercial growth
 */

$pageType    = 'city';
$citySlug    = 'seguin';
$currentPage = 'service-areas';

$pageTitle       = 'Welding & Metal Fabrication in Seguin, TX | ' . $siteName;
$pageDescription = 'Professional welding and metal fabrication serving Seguin, TX. AGA Welding & Fabrication provides structural steel, custom metalwork, and industrial repairs to Seguin businesses from historic downtown to the I-10 corridor.';
$canonicalUrl    = $siteUrl . '/service-areas/seguin/';
$ogImage         = $siteUrl . '/assets/images/structural-steel-beams.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'structural-steel-beams';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Schema */
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => $siteUrl . '/'],
    ['name' => 'Service Areas', 'url' => $siteUrl . '/service-areas/'],
    ['name' => 'Seguin', 'url' => $canonicalUrl],
]);

$localBusinessSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Contractor',
    '@id' => $siteUrl . '/#organization',
    'name' => $siteName,
    'url' => $siteUrl,
    'areaServed' => [
        '@type' => 'City',
        'name' => 'Seguin',
        'containedInPlace' => [
            '@type' => 'State',
            'name' => 'Texas',
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>
<script type="application/ld+json"><?php echo $localBusinessSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="Welding and metal fabrication in Seguin, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Structural steel beams at AGA Welding shop near Seguin, Texas"
           width="1600" height="1067" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Seguin, TX</span>
        <h1 class="hero-title">Welding &amp; Fabrication in <span class="text-accent">Seguin</span></h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication serves Seguin, TX with precision welding and custom metal fabrication — from historic restoration metalwork downtown to commercial projects along the I-10 corridor, delivering structural steel and custom fabrication across Guadalupe County.</p>

        <div class="hero-chips">
          <span class="chip">
            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>
            Serving Seguin, TX
          </span>
          <span class="chip">
            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
            Licensed TX Contractor
          </span>
          <span class="chip">
            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
            <?php echo $yearsInBusiness; ?> Years Experience
          </span>
        </div>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <?php if ($phone): ?>
          <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="btn btn-secondary btn-lg hero-phone">
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" /></svg>
            Call <?php echo htmlspecialchars($phone); ?>
          </a>
          <?php endif; ?>
        </div>
      </div>

      <!-- Hero Form Card (desktop only; mobile opens dialog) -->
      <div class="hero-form-card">
        <h2 class="hero-form-title">Free estimate in Seguin</h2>
        <p class="hero-form-subtitle">We reply the same day.</p>
        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <?php echo p1_attribution_fields('hero'); ?>
          <input type="hidden" name="consent_version" value="v2.1">
          <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

          <div class="form-row">
            <div class="field">
              <label for="hero-name">Your Name</label>
              <input id="hero-name" type="text" name="name" autocomplete="name" required>
            </div>
            <div class="field">
              <label for="hero-phone">Phone</label>
              <input id="hero-phone" type="tel" name="phone" autocomplete="tel" required>
            </div>
            <div class="field full">
              <label for="hero-service">Service Needed</label>
              <select id="hero-service" name="service">
                <option value="">Select a service</option>
                <?php foreach ($services as $heroSvc): ?>
                <option value="<?php echo htmlspecialchars($heroSvc['name']); ?>"><?php echo htmlspecialchars($heroSvc['name']); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <label class="form-consent-item consent form-consent-required">
            <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
            <span class="consent-label footnote">I agree to the <a href="/privacy-policy/">Privacy Policy</a> and <a href="/terms/">Terms</a>. <span class="required-star">*</span></span>
          </label>

          <button type="submit" class="btn btn-primary btn-block">Get free estimate</button>
        </form>
      </div>

    </div>
  </div>
</section>

<!-- ============================ BREADCRUMB ============================ -->
<nav class="breadcrumb container" aria-label="Breadcrumb">
  <a href="/">Home</a><span class="breadcrumb-sep">/</span>
  <a href="/service-areas/">Service Areas</a><span class="breadcrumb-sep">/</span>
  <span>Seguin</span>
</nav>

<!-- ============================ INTRO + LOCAL CONTEXT ============================ -->
<section class="section">
  <div class="container-narrow">
    <h2>Metal Fabrication for Seguin's Historic and Industrial Communities</h2>
    <div class="answer-block">
      <p><strong><?php echo $siteName; ?> is a Texas-licensed welding contractor based in San Antonio, serving Seguin and Guadalupe County with structural steel fabrication, certified welding, and custom metalwork.</strong> Our Gardner Road shop sits 35 minutes from Seguin via I-10, bringing precision metal fabrication to businesses along the commercial corridor and restoration projects in Seguin's historic downtown.</p>
    </div>

    <p>Seguin's identity — rooted in 19th-century architecture as Guadalupe County's seat but growing through modern I-10 logistics development — creates demand for welders who understand both historic restoration metalwork and volume structural fabrication. AGA Welding & Fabrication brings <?php echo $yearsInBusiness; ?> years of metal-joining experience to that challenge, from ornamental railings respecting the downtown historic district's character to structural steel for warehouse builds serving the distribution corridor east of town.</p>

    <p>The terrain here sits in the 500–600 ft elevation range, with the Guadalupe River running through town creating higher localized humidity than San Antonio proper. Our welders account for those conditions — managing moisture on prep surfaces, scheduling outdoor thick-section welds during stable weather windows — to deliver code-compliant joints year-round across the Seguin service area.</p>

    <p>From custom gates for downtown Seguin businesses to pipe supports for industrial contractors working the I-10 corridor, we fabricate on spec, weld to certified procedures, and deliver on the timeline you need. If your Seguin project demands structural integrity, historic sensitivity, or custom metal precision, AGA Welding & Fabrication has the shop, the welders, and the range to handle it.</p>
  </div>
</section>

<!-- ============================ SERVICES IN THIS AREA ============================ -->
<section class="section bg-secondary">
  <span class="grain" aria-hidden="true"></span>
  <div class="container">
    <header class="section-header text-center">
      <span class="eyebrow">What We Do</span>
      <h2>Welding &amp; Fabrication <span class="text-accent">Services</span> in Seguin</h2>
      <p class="section-subtitle">From structural steel to custom metalwork, AGA Welding & Fabrication delivers certified welding and precision fabrication across Seguin and Guadalupe County.</p>
    </header>

    <div class="services-grid">
      <?php
      $serviceHighlights = [
          'steel-fabrication',
          'structural-steel-fabrication',
          'handrails-railings',
          'metal-repair',
          'custom-metalwork',
          'additional-services',
      ];
      $idx = 0;
      foreach ($services as $svc):
          if (!in_array($svc['slug'], $serviceHighlights)) continue;
          $tintClass = 'card-tint-' . (($idx % 3) + 1);
          $delayClass = 'reveal-delay-' . (($idx % 3) + 1);
          $idx++;
      ?>
      <div class="service-card-with-image <?php echo $tintClass; ?> reveal-up <?php echo $delayClass; ?>">
        <div class="service-card__body">
          <h3><?php echo htmlspecialchars($svc['name']); ?></h3>
          <p class="service-card__desc"><?php echo htmlspecialchars($svc['description']); ?></p>
          <a href="/services/<?php echo $svc['slug']; ?>/" class="service-card__cta">Learn more <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================ WHY CHOOSE US ============================ -->
<section class="section">
  <div class="container">
    <div class="split">
      <div class="split-text">
        <span class="eyebrow">Why Seguin Trusts AGA Welding</span>
        <h2>Certified Welders, <span class="text-accent">Local Expertise</span></h2>
        <p>AGA Welding & Fabrication is a Texas-licensed contractor with <?php echo $yearsInBusiness; ?> years fabricating and welding metal for San Antonio-area projects. Our welders are certified in MIG, TIG, stick, and flux-cored processes, matching the right technique to your material and application — whether that's sensitive restoration work preserving historic character or structural steel for commercial builds.</p>
        <p>Based 35 minutes from Seguin via I-10, we deliver quality metalwork to businesses from downtown to the eastern industrial corridor without the markup or scheduling delays of larger metro fabrication shops. You work directly with the welders building your steel — no layers, no confusion.</p>
        <p>When your Seguin project needs structural integrity, historic sensitivity, or custom metal precision, you need a shop that understands the spec and stands behind the weld. That's what AGA Welding & Fabrication delivers.</p>
        <a href="/about/" class="btn btn-primary">More about us</a>
      </div>
      <div class="split-media">
        <picture>
          <source type="image/avif" srcset="/assets/images/aga-welding-fabrication-shop-480.avif 480w, /assets/images/aga-welding-fabrication-shop-960.avif 960w" sizes="(min-width: 768px) 50vw, 100vw">
          <img src="/assets/images/aga-welding-fabrication-shop.jpg"
               srcset="/assets/images/aga-welding-fabrication-shop-480.webp 480w, /assets/images/aga-welding-fabrication-shop-960.webp 960w"
               sizes="(min-width: 768px) 50vw, 100vw"
               alt="AGA Welding & Fabrication shop interior showing welding equipment and steel workpieces"
               width="960" height="720" loading="lazy" decoding="async">
        </picture>
      </div>
    </div>
  </div>
</section>

<!-- ============================ CTA ============================ -->
<section class="cta-band" id="estimate">
  <span class="grain" aria-hidden="true"></span>
  <div class="container">
    <div class="cta-content">
      <h2>Ready to Start Your Seguin Welding Project?</h2>
      <p>Get a free, no-obligation estimate from AGA Welding & Fabrication. We'll review your specs and reply the same day with a clear quote and timeline.</p>
      <div class="cta-actions">
        <button type="button" class="btn btn-primary btn-lg" data-open-estimate>Get free estimate</button>
        <?php if ($phone): ?>
        <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="btn btn-secondary btn-lg">
          <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" /></svg>
          Call Now
        </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
