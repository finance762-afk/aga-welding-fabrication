<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/**
 * Research sources (2026-09-25):
 * - https://en.wikipedia.org/wiki/Boerne,_Texas
 * - https://texashillcountry.com/boerne-texas/
 * - https://www.plantmaps.com/78006 (USDA Zone 8b)
 * - https://thegahmrealestateteam.com/top-neighborhoods-in-boerne-texas/
 *
 * Verified details:
 * - Elevation: 1,400-1,526 ft range (sources vary; Wikipedia cites 1,447 ft, others cite 1,526 ft)
 * - USDA Hardiness Zone 8b (15-20°F avg annual minimum)
 * - Cibolo Creek flows through Boerne (96 miles long)
 * - Landmarks: Cascade Caverns, Cave Without A Name, Cibolo Nature Center
 * - Neighborhoods: Esperanza, Cordillera Ranch, Stone Creek Ranch, historic district
 * - Character: Hill Country, limestone hills, clear streams, ~31 miles north of San Antonio
 */

$pageType    = 'city';
$citySlug    = 'boerne';
$currentPage = 'service-areas';

$pageTitle       = 'Welding & Metal Fabrication in Boerne, TX | ' . $siteName;
$pageDescription = 'Expert metal fabrication and welding in Boerne, TX. AGA Welding & Fabrication serves Hill Country homes and businesses with custom railings, gates, structural steel, and architectural metalwork.';
$canonicalUrl    = $siteUrl . '/service-areas/boerne/';
$ogImage         = $siteUrl . '/assets/images/custom-metalwork.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'welding-steel-beam-san-antonio';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Schema */
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => $siteUrl . '/'],
    ['name' => 'Service Areas', 'url' => $siteUrl . '/service-areas/'],
    ['name' => 'Boerne', 'url' => $canonicalUrl],
]);

$localBusinessSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Contractor',
    '@id' => $siteUrl . '/#organization',
    'name' => $siteName,
    'url' => $siteUrl,
    'areaServed' => [
        '@type' => 'City',
        'name' => 'Boerne',
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
<section class="hero hero--photo" aria-label="Welding and metal fabrication in Boerne, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Welding structural steel beam at AGA Welding & Fabrication shop near Boerne, Texas"
           width="1600" height="1067" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Boerne, TX · Hill Country</span>
        <h1 class="hero-title">Metal Fabrication &amp; Welding in <span class="text-accent">Boerne</span></h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication serves Boerne and the Texas Hill Country with custom metal fabrication, architectural railings, gates, and structural steel — delivering precision craftsmanship for Hill Country homes, ranches, and commercial properties.</p>

        <div class="hero-chips">
          <span class="chip">
            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>
            31 Miles from Our Shop
          </span>
          <span class="chip">
            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
            Licensed Texas Contractor
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
        <h2 class="hero-form-title">Free estimate in Boerne</h2>
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

          <button type="submit" class="btn btn-primary btn-block">Send my request</button>
        </form>
      </div>

    </div>
  </div>
</section>

<!-- ============================ LOCAL CONTENT ============================ -->
<section class="section">
  <div class="container-narrow">

    <div class="answer-block" data-animate="reveal-up">
      <h2>Why Choose AGA Welding &amp; Fabrication for Boerne Metal Fabrication?</h2>
      <p class="answer-first">AGA Welding &amp; Fabrication is a licensed Texas contractor serving Boerne and the Hill Country from our San Antonio shop, located 31 miles south — bringing <?php echo $yearsInBusiness; ?> years of welding and metal fabrication expertise to Esperanza, Cordillera Ranch, Stone Creek Ranch, and Boerne's historic district with custom railings, gates, structural steel, and architectural metalwork for residential, ranch, and commercial properties.</p>
    </div>

    <p data-animate="reveal-up" data-delay="1">Boerne sits at an elevation between 1,400 and 1,500 feet in the Texas Hill Country (sources vary; official records cite 1,447 feet), where the 96-mile Cibolo Creek flows through rolling limestone hills and the USDA Hardiness Zone 8b climate (15–20°F average annual minimum) creates distinct fabrication considerations. Hill Country properties often demand custom metalwork that complements limestone architecture and natural topography — from hand-forged gates for ranch entries to structural steel railings that navigate elevation changes, while the region's clear-flowing streams and exposed bedrock require fabrication expertise in both aesthetic design and code-compliant anchoring on challenging terrain.</p>

    <p data-animate="reveal-up" data-delay="2">We fabricate custom handrails and staircases for Boerne's master-planned communities like Esperanza and luxury enclaves such as Cordillera Ranch, deliver structural steel for commercial builds in the historic downtown district, and repair agricultural equipment and ranch infrastructure for Hill Country acreage properties. AGA Welding &amp; Fabrication works from your drawings or develops the design in-house, fabricating carbon steel, stainless, and aluminum in our San Antonio shop and installing on-site in Boerne when field work is required. Whether your project is a decorative metal gate, a commercial handrail system, or a heavy structural repair, we quote clearly, deliver on schedule, and stand behind every weld.</p>

    <p data-animate="reveal-up" data-delay="3">Boerne's Hill Country character — home to Cascade Caverns, Cave Without A Name, and the Cibolo Nature Center's 100-acre trail system through four ecosystems — attracts property owners who value craftsmanship and durability in their built environment. AGA Welding &amp; Fabrication has built a reputation across Kendall County for responsive service, transparent pricing, and metalwork that meets Texas building codes while respecting the aesthetic standards of one of the region's most desirable communities. From the walkable historic district with its restored Craftsman and limestone homes to the expanding new neighborhoods, Boerne clients trust us to deliver precision metalwork that lasts.</p>

  </div>
</section>

<!-- ============================ BOERNE SERVICES ============================ -->
<section class="section bg-alt">
  <div class="container">
    <div class="section-header center">
      <span class="eyebrow">What We Do</span>
      <h2 class="section-title">Metal Fabrication Services for <span class="text-accent">Boerne</span></h2>
    </div>

    <div class="services-compact-grid">
      <div class="service-compact-card" data-animate="reveal-up">
        <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
        <div>
          <h3>Custom Handrails &amp; Railings</h3>
          <p>Architectural railings for Hill Country homes and commercial properties, designed to complement limestone and Hill Country architecture.</p>
          <a href="/services/handrails-railings/">Learn More →</a>
        </div>
      </div>

      <div class="service-compact-card" data-animate="reveal-up" data-delay="1">
        <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
        <div>
          <h3>Gates &amp; Entry Features</h3>
          <p>Custom fabricated gates and ranch entry features, from decorative residential gates to heavy-duty ranch access gates.</p>
          <a href="/services/custom-metalwork/">Learn More →</a>
        </div>
      </div>

      <div class="service-compact-card" data-animate="reveal-up" data-delay="2">
        <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
        <div>
          <h3>Structural Steel Fabrication</h3>
          <p>Commercial structural steel for Boerne businesses and new construction, fabricated to spec and delivered on schedule.</p>
          <a href="/services/structural-steel-fabrication/">Learn More →</a>
        </div>
      </div>

      <div class="service-compact-card" data-animate="reveal-up" data-delay="3">
        <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
        <div>
          <h3>Equipment &amp; Ranch Repairs</h3>
          <p>Welding repairs for agricultural equipment, ranch infrastructure, and Hill Country property metalwork.</p>
          <a href="/services/equipment-metal-repair/">Learn More →</a>
        </div>
      </div>
    </div>

    <div class="section-footer center">
      <a href="/services/" class="btn btn-primary">View All Services</a>
    </div>
  </div>
</section>

<!-- ============================ CTA ============================ -->
<section class="section cta-band" id="estimate">
  <span class="grain" aria-hidden="true"></span>
  <div class="container">
    <div class="cta-content">
      <h2 class="cta-title">Ready to Start Your Boerne Fabrication Project?</h2>
      <p class="cta-text">Get a free estimate for welding and metal fabrication services in Boerne and the Hill Country. We'll review your project, answer your questions, and provide a clear quote.</p>
    </div>
    <div class="cta-actions">
      <?php if ($phone): ?>
      <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="btn btn-primary btn-lg">
        <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" /></svg>
        Call Now
      </a>
      <?php endif; ?>
      <button type="button" class="btn btn-secondary btn-lg" data-open-estimate>Get Free Estimate</button>
    </div>
  </div>
</section>

<style>
/* Services compact grid - same as San Antonio page */
.services-compact-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: var(--space-lg);
  margin-top: var(--space-2xl);
}

.service-compact-card {
  display: flex;
  gap: var(--space-md);
  padding: var(--space-lg);
  background: var(--color-bg);
  border-radius: var(--radius);
  border: 1px solid var(--color-border);
  transition: var(--transition);
}

.service-compact-card:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow);
}

.service-compact-card svg {
  color: var(--color-accent);
  flex-shrink: 0;
  margin-top: 4px;
}

.service-compact-card h3 {
  font-family: var(--font-heading);
  font-size: var(--fs-h5);
  font-weight: 700;
  margin: 0 0 var(--space-xs);
  color: var(--color-text);
}

.service-compact-card p {
  font-size: var(--fs-sm);
  line-height: 1.6;
  color: var(--color-text-light);
  margin: 0 0 var(--space-sm);
}

.service-compact-card a {
  font-size: var(--fs-sm);
  font-weight: 600;
  color: var(--color-accent);
  text-decoration: none;
  display: inline-block;
}

@media (max-width: 768px) {
  .services-compact-grid {
    grid-template-columns: 1fr;
  }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
