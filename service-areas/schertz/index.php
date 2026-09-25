<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/**
 * Research sources (2026-09-25):
 * - https://en.wikipedia.org/wiki/Schertz,_Texas
 * - https://www.zipdatamaps.com/en/places/us/city/texas/schertz (2026 population: 44,265)
 * - https://worldpopulationreview.com/us-cities/texas/schertz
 *
 * Verified details:
 * - Population: ~44,000-46,000 (2026 estimates vary by source)
 * - Location: Guadalupe, Bexar, and Comal counties (tri-county)
 * - Part of San Antonio-New Braunfels metropolitan area
 * - Northeast corridor from San Antonio
 * - Rapid growth: 31,465 (2010) → 42,002 (2020) → 44,265+ (2026)
 */

$pageType = 'city'; $citySlug = 'schertz'; $currentPage = 'service-areas';
$pageTitle = 'Welding & Metal Fabrication in Schertz, TX | ' . $siteName;
$pageDescription = 'Metal fabrication and welding in Schertz, TX. AGA Welding & Fabrication serves the northeast San Antonio metro with structural steel, handrails, and custom metalwork.';
$canonicalUrl = $siteUrl . '/service-areas/schertz/';
$heroImg = 'welding-fabrication-shop';
$heroPreload = ['srcset' => "/assets/images/{$heroImg}-480.avif 480w, /assets/images/{$heroImg}-960.avif 960w, /assets/images/{$heroImg}-1600.avif 1600w", 'sizes' => '100vw'];
$breadcrumbSchema = generateBreadcrumbSchema([['name' => 'Home', 'url' => $siteUrl . '/'], ['name' => 'Service Areas', 'url' => $siteUrl . '/service-areas/'], ['name' => 'Schertz', 'url' => $canonicalUrl]]);
$localBusinessSchema = json_encode(['@context' => 'https://schema.org', '@type' => 'Contractor', '@id' => $siteUrl . '/#organization', 'name' => $siteName, 'url' => $siteUrl, 'areaServed' => ['@type' => 'City', 'name' => 'Schertz', 'containedInPlace' => ['@type' => 'State', 'name' => 'Texas']]], JSON_UNESCAPED_SLASHES);
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>
<script type="application/ld+json"><?php echo $localBusinessSchema; ?></script>

<section class="hero hero--photo">
  <div class="hero-bg"><picture><source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw"><img src="/assets/images/<?php echo $heroImg; ?>.jpg" srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w" sizes="100vw" alt="AGA Welding & Fabrication shop" width="1600" height="1067" loading="eager" fetchpriority="high" decoding="async"></picture></div>
  <div class="hero-overlay"></div><span class="grain"></span>
  <div class="container"><div class="hero-grid hero-grid--form">
    <div class="hero-text">
      <span class="eyebrow">Schertz, TX</span>
      <h1 class="hero-title">Metal Fabrication in <span class="text-accent">Schertz</span></h1>
      <p class="hero-answer">AGA Welding &amp; Fabrication serves Schertz and the northeast San Antonio metro with structural steel, custom fabrication, and welding services for commercial and residential clients across Guadalupe, Bexar, and Comal counties.</p>
      <div class="hero-chips">
        <span class="chip"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>Northeast Metro</span>
        <span class="chip"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>Licensed Contractor</span>
        <span class="chip"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg><?php echo $yearsInBusiness; ?> Years</span>
      </div>
      <div class="hero-actions">
        <button type="button" class="btn btn-primary btn-lg" data-open-estimate">Get free estimate</button>
        <?php if ($phone): ?><a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="btn btn-secondary btn-lg">Call Now</a><?php endif; ?>
      </div>
    </div>
    <div class="hero-form-card">
      <h2 class="hero-form-title">Free estimate in Schertz</h2>
      <p class="hero-form-subtitle">We reply the same day.</p>
      <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST">
        <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off">
        <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
        <?php echo p1_attribution_fields('hero'); ?>
        <input type="hidden" name="consent_version" value="v2.1"><input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
        <div class="form-row">
          <div class="field"><label for="hero-name">Your Name</label><input id="hero-name" type="text" name="name" required></div>
          <div class="field"><label for="hero-phone">Phone</label><input id="hero-phone" type="tel" name="phone" required></div>
          <div class="field full"><label for="hero-service">Service Needed</label><select id="hero-service" name="service"><option value="">Select a service</option><?php foreach ($services as $s): ?><option><?php echo htmlspecialchars($s['name']); ?></option><?php endforeach; ?></select></div>
        </div>
        <label class="form-consent-item consent form-consent-required"><input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required><span class="consent-label footnote">I agree to the <a href="/privacy-policy/">Privacy Policy</a> and <a href="/terms/">Terms</a>. *</span></label>
        <button type="submit" class="btn btn-primary btn-block">Send request</button>
      </form>
    </div>
  </div></div>
</section>

<section class="section">
  <div class="container-narrow">
    <div class="answer-block">
      <h2>Metal Fabrication for Schertz's Growing Northeast Corridor</h2>
      <p class="answer-first">AGA Welding &amp; Fabrication is a licensed Texas contractor serving Schertz from our San Antonio shop, delivering structural steel, custom fabrication, and welding services to the northeast metro's commercial and residential clients across Guadalupe, Bexar, and Comal counties with <?php echo $yearsInBusiness; ?> years of precision craftsmanship.</p>
    </div>
    <p>Schertz spans three counties (Guadalupe, Bexar, and Comal) in the San Antonio-New Braunfels metropolitan area, with a 2026 population estimated at 44,000–46,000 residents — a rapid expansion from 31,465 in 2010 and 42,002 in 2020 that reflects the northeast corridor's appeal to military families and suburban homeowners. This growth places consistent demand on fabrication shops that can deliver structural steel for new commercial construction, handrails for multi-family housing developments, and custom metalwork for residential properties. AGA Welding &amp; Fabrication fabricates carbon steel, stainless, and aluminum for Schertz projects, working from your drawings or developing designs in-house.</p>
    <p>We serve Schertz businesses with structural fabrication, equipment repairs, and commercial handrails, and residential clients with custom gates, railings, and architectural metalwork. Every project is quoted clearly, fabricated to spec, and delivered on schedule — with on-site installation when field work is required. Schertz clients value our responsive service, transparent pricing, and work that meets Texas building codes across all three counties.</p>
    <p>Whether your project is a single custom piece for a Schertz home or a multi-phase structural package for a commercial site, AGA Welding &amp; Fabrication brings northeast metro expertise and stands behind every weld. Contact us for a free estimate on metal fabrication and welding services in Schertz.</p>
  </div>
</section>

<section class="section cta-band" id="estimate">
  <span class="grain"></span>
  <div class="container">
    <div class="cta-content">
      <h2 class="cta-title">Ready to Start Your Schertz Project?</h2>
      <p class="cta-text">Get a free estimate for metal fabrication and welding in Schertz. We'll review your project and provide a clear quote.</p>
    </div>
    <div class="cta-actions">
      <?php if ($phone): ?><a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="btn btn-primary btn-lg">Call Now</a><?php endif; ?>
      <button type="button" class="btn btn-secondary btn-lg" data-open-estimate">Get Free Estimate</button>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
