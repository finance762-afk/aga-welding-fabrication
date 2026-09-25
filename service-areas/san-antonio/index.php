<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/**
 * Research sources (2026-09-25):
 * - https://admortgage.com/blog/san-antonio-top-neighborhoods/
 * - https://livinginsatx.com/stone-oak/
 * - https://lrgrealty.com/lrg-blog/best-neighborhoods-in-alamo-heights-tx/
 * - https://www.niche.com/places-to-live/search/best-suburbs/m/san-antonio-metro-area/
 *
 * Verified details:
 * - Alamo Heights: upscale enclave north of downtown, 1920s development, ~8,300 residents
 * - Stone Oak: master-planned northern community, developed 1980s, median $500k
 * - Downtown: Pearl District (Tobin Hill), Southtown/Lavaca for urban professionals
 * - Shop location: 8249 Gardner Rd, San Antonio, TX 78263 (northeast sector)
 */

$pageType    = 'city';
$citySlug    = 'san-antonio';
$currentPage = 'service-areas';

$pageTitle       = 'Welding & Metal Fabrication in San Antonio, TX | ' . $siteName;
$pageDescription = 'Expert welding and metal fabrication in San Antonio, TX. AGA Welding & Fabrication serves Alamo Heights, Stone Oak, downtown, and all San Antonio neighborhoods with structural steel, custom metalwork, and industrial repairs.';
$canonicalUrl    = $siteUrl . '/service-areas/san-antonio/';
$ogImage         = $siteUrl . '/assets/images/structural-steel-beams.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'structural-steel-delivery';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Schema */
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => $siteUrl . '/'],
    ['name' => 'Service Areas', 'url' => $siteUrl . '/service-areas/'],
    ['name' => 'San Antonio', 'url' => $canonicalUrl],
]);

$localBusinessSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Contractor',
    '@id' => $siteUrl . '/#organization',
    'name' => $siteName,
    'url' => $siteUrl,
    'areaServed' => [
        '@type' => 'City',
        'name' => 'San Antonio',
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
<section class="hero hero--photo" aria-label="Welding and metal fabrication in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Structural steel delivery for a fabrication project in San Antonio, Texas"
           width="1600" height="1067" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">San Antonio, TX</span>
        <h1 class="hero-title">Welding &amp; Metal Fabrication in <span class="text-accent">San Antonio</span></h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication is a San Antonio-based metal fabrication shop serving commercial, industrial, and residential clients across Bexar County — from downtown job sites to Stone Oak custom homes, delivering precision welding and structural steel work built to spec.</p>

        <div class="hero-chips">
          <span class="chip">
            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>
            Based in San Antonio
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
        <h2 class="hero-form-title">Free estimate in San Antonio</h2>
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
      <h2>Why Choose AGA Welding &amp; Fabrication for San Antonio Metal Fabrication?</h2>
      <p class="answer-first">AGA Welding &amp; Fabrication is a licensed Texas contractor based at 8249 Gardner Rd in San Antonio's northeast sector, serving Alamo Heights, Stone Oak, downtown, and every Bexar County neighborhood with <?php echo $yearsInBusiness; ?> years of welding and metal fabrication experience. Operating from a fully equipped San Antonio shop, we cut, form, weld, and assemble structural steel and custom metalwork for commercial construction sites, industrial facilities, and residential properties across the city.</p>
    </div>

    <p data-animate="reveal-up" data-delay="1">San Antonio's diverse built environment — from historic downtown districts to master-planned northern communities like Stone Oak, developed in the 1980s with brick-and-stone housing, and the upscale Alamo Heights enclave north of downtown that began in the 1920s — demands fabrication expertise that spans architectural metalwork, structural steel, and industrial repair. Our shop handles projects ranging from custom handrails and gates for Stone Oak residential clients to heavy structural beams for downtown commercial builds, delivering the same code-compliant craftsmanship whether the job is in Tobin Hill near the Pearl District or an industrial warehouse in the southeast corridor.</p>

    <p data-animate="reveal-up" data-delay="2">We work directly from your blueprints, CAD files, or field measurements, fabricating carbon steel, stainless, and aluminum in plate, bar, tube, angle, and structural shapes. Whether you need a quick equipment repair, a complex structural steel package, or custom architectural metalwork, AGA Welding &amp; Fabrication quotes your project clearly, sets a realistic schedule, and delivers finished steel that fits the first time. San Antonio clients value our ability to handle both shop fabrication and field installation — bringing welding equipment and expertise directly to your job site when on-site work is the practical solution.</p>

    <p data-animate="reveal-up" data-delay="3">From the revitalized downtown core to the expanding northern suburbs, San Antonio's growth places consistent demand on fabrication shops that can deliver quality on schedule. AGA Welding &amp; Fabrication has built a reputation across Bexar County for responsive service, transparent pricing, and work that meets Texas building codes and industry standards. Whether your project is a single custom piece or a multi-phase structural package, you're working with a San Antonio-based team that understands the region's construction landscape and stands behind every weld.</p>

  </div>
</section>

<!-- ============================ SERVICES IN SAN ANTONIO ============================ -->
<section class="section bg-alt">
  <div class="container">
    <div class="section-header center">
      <span class="eyebrow">What We Do</span>
      <h2 class="section-title">Metal Fabrication &amp; Welding Services in <span class="text-accent">San Antonio</span></h2>
      <p class="section-intro">From our San Antonio shop, we deliver the full range of welding and metal fabrication services for residential, commercial, and industrial clients throughout Bexar County.</p>
    </div>

    <div class="services-compact-grid">
      <?php
      $saServices = array_slice($services, 0, 8);
      foreach ($saServices as $idx => $saSvc):
      ?>
      <div class="service-compact-card" data-animate="reveal-up" data-delay="<?php echo ($idx % 4) + 1; ?>">
        <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
        <div>
          <h3><?php echo htmlspecialchars($saSvc['name']); ?></h3>
          <p><?php echo htmlspecialchars($saSvc['description']); ?></p>
          <a href="/services/<?php echo $saSvc['slug']; ?>/">Learn More →</a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="section-footer center">
      <a href="/services/" class="btn btn-primary">View All Services</a>
    </div>
  </div>
</section>

<!-- ============================ NEIGHBORHOODS SERVED ============================ -->
<section class="section">
  <div class="container">
    <div class="split split-reverse">
      <div class="split-content">
        <span class="eyebrow">Coverage Across San Antonio</span>
        <h2 class="section-title">Serving Every San Antonio Neighborhood</h2>
        <p>AGA Welding &amp; Fabrication serves all of San Antonio and Bexar County, including:</p>
        <ul class="area-list">
          <li>Alamo Heights &amp; Terrell Hills</li>
          <li>Stone Oak &amp; North San Antonio</li>
          <li>Downtown &amp; Pearl District (Tobin Hill)</li>
          <li>Southtown &amp; Lavaca</li>
          <li>Medical Center &amp; Northwest</li>
          <li>Northeast corridor (our shop location)</li>
          <li>Southeast industrial districts</li>
          <li>West Side &amp; Military Drive</li>
        </ul>
        <p>Not sure if we serve your San Antonio location? Give us a call — we regularly work throughout the metro area and can confirm coverage for your project.</p>
        <?php if ($phone): ?>
        <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="btn btn-secondary">
          <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" /></svg>
          Call <?php echo htmlspecialchars($phone); ?>
        </a>
        <?php endif; ?>
      </div>
      <div class="split-media">
        <div class="img-reveal">
          <img src="/assets/images/custom-steel-fabrication.jpg"
               srcset="/assets/images/custom-steel-fabrication-480.webp 480w, /assets/images/custom-steel-fabrication-960.webp 960w, /assets/images/custom-steel-fabrication-1600.webp 1600w"
               sizes="(max-width: 900px) 100vw, 50vw"
               alt="Custom steel fabrication project at the AGA Welding shop in San Antonio, TX"
               width="960" height="640" loading="lazy" decoding="async">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ CTA ============================ -->
<section class="section cta-band" id="estimate">
  <span class="grain" aria-hidden="true"></span>
  <div class="container">
    <div class="cta-content">
      <h2 class="cta-title">Ready to Start Your San Antonio Fabrication Project?</h2>
      <p class="cta-text">Get a free estimate for welding and metal fabrication services anywhere in San Antonio. We'll review your project details, answer your questions, and provide a clear quote with no obligation.</p>
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
/* Services compact grid */
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

/* Area list */
.area-list {
  list-style: none;
  padding: 0;
  margin: var(--space-lg) 0;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: var(--space-sm);
}

.area-list li {
  font-size: var(--fs-body);
  color: var(--color-text);
  padding-left: var(--space-md);
  position: relative;
}

.area-list li::before {
  content: '→';
  position: absolute;
  left: 0;
  color: var(--color-accent);
  font-weight: 700;
}

@media (max-width: 768px) {
  .services-compact-grid {
    grid-template-columns: 1fr;
  }

  .area-list {
    grid-template-columns: 1fr;
  }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
