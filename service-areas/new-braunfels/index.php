<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/**
 * Research sources (2026-09-25):
 * - https://en.wikipedia.org/wiki/New_Braunfels,_Texas
 * - Population: ~116,000+ (principal city in SA-New Braunfels metro)
 * - Location: Guadalupe and Comal counties, ~30 miles northeast of San Antonio
 * - Known for: Guadalupe and Comal rivers, Schlitterbahn, German heritage
 * - Major growth area between San Antonio and Austin corridors
 */

$pageType = 'city'; $citySlug = 'new-braunfels'; $currentPage = 'service-areas';
$pageTitle = 'Welding & Metal Fabrication in New Braunfels, TX | ' . $siteName;
$pageDescription = 'Metal fabrication and welding in New Braunfels, TX. AGA Welding & Fabrication serves Guadalupe and Comal counties with structural steel, custom metalwork, and industrial welding.';
$canonicalUrl = $siteUrl . '/service-areas/new-braunfels/';
$heroImg = 'steel-beam-fabrication';
$heroPreload = ['srcset' => "/assets/images/{$heroImg}-480.avif 480w, /assets/images/{$heroImg}-960.avif 960w, /assets/images/{$heroImg}-1600.avif 1600w", 'sizes' => '100vw'];
$breadcrumbSchema = generateBreadcrumbSchema([['name' => 'Home', 'url' => $siteUrl . '/'], ['name' => 'Service Areas', 'url' => $siteUrl . '/service-areas/'], ['name' => 'New Braunfels', 'url' => $canonicalUrl]]);
$localBusinessSchema = json_encode(['@context' => 'https://schema.org', '@type' => 'Contractor', '@id' => $siteUrl . '/#organization', 'name' => $siteName, 'url' => $siteUrl, 'areaServed' => ['@type' => 'City', 'name' => 'New Braunfels', 'containedInPlace' => ['@type' => 'State', 'name' => 'Texas']]], JSON_UNESCAPED_SLASHES);
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>
<script type="application/ld+json"><?php echo $localBusinessSchema; ?></script>

<section class="hero hero--photo">
  <div class="hero-bg"><picture><source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw"><img src="/assets/images/<?php echo $heroImg; ?>.jpg" srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w" sizes="100vw" alt="Steel beam fabrication at AGA Welding" width="1600" height="1067" loading="eager" fetchpriority="high" decoding="async"></picture></div>
  <div class="hero-overlay"></div><span class="grain"></span>
  <div class="container"><div class="hero-grid hero-grid--form">
    <div class="hero-text">
      <span class="eyebrow">New Braunfels, TX</span>
      <h1 class="hero-title">Welding &amp; Fabrication in <span class="text-accent">New Braunfels</span></h1>
      <p class="hero-answer">AGA Welding &amp; Fabrication serves New Braunfels with comprehensive metal fabrication, structural steel, and expert welding services — delivering precision craftsmanship for commercial, industrial, and residential clients across Guadalupe and Comal counties.</p>
      <div class="hero-chips">
        <span class="chip"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>30 Miles Northeast</span>
        <span class="chip"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>Licensed TX Contractor</span>
        <span class="chip"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg><?php echo $yearsInBusiness; ?> Years</span>
      </div>
      <div class="hero-actions">
        <button type="button" class="btn btn-primary btn-lg" data-open-estimate">Get free estimate</button>
        <?php if ($phone): ?><a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="btn btn-secondary btn-lg">Call Now</a><?php endif; ?>
      </div>
    </div>
    <div class="hero-form-card">
      <h2 class="hero-form-title">Free estimate in New Braunfels</h2>
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
      <h2>Expert Metal Fabrication for New Braunfels</h2>
      <p class="answer-first">AGA Welding &amp; Fabrication is a licensed Texas contractor serving New Braunfels from our San Antonio shop, located 30 miles southwest, delivering structural steel, custom metal fabrication, and welding services to commercial, industrial, and residential clients across Guadalupe and Comal counties with <?php echo $yearsInBusiness; ?> years of precision craftsmanship.</p>
    </div>
    <p>New Braunfels is a principal city in the San Antonio-New Braunfels metropolitan area with a population exceeding 116,000 residents, positioned between the San Antonio and Austin growth corridors where the Guadalupe and Comal rivers converge. This strategic location drives demand for fabrication expertise across diverse sectors — from structural steel for commercial development and industrial facilities to custom railings and gates for residential properties and hospitality businesses serving the region's tourism economy. AGA Welding &amp; Fabrication handles projects ranging from heavy structural beams for New Braunfels commercial sites to architectural metalwork for homes and businesses, fabricating carbon steel, stainless, and aluminum in our shop and installing on-site when required.</p>
    <p>We work from your blueprints or develop designs in-house, quoting projects clearly and delivering on schedule. Whether your New Braunfels project is a commercial handrail system, a custom residential gate, or equipment repair for an industrial facility, AGA Welding &amp; Fabrication brings expertise that meets Texas building codes across both Guadalupe and Comal counties. New Braunfels clients value our responsive service, transparent pricing, and metalwork that stands the test of time.</p>
    <p>Contact AGA Welding &amp; Fabrication for a free estimate on metal fabrication and welding services in New Braunfels. We deliver the same precision craftsmanship and code-compliant work to every project, regardless of size or scope.</p>
  </div>
</section>

<section class="section cta-band" id="estimate">
  <span class="grain"></span>
  <div class="container">
    <div class="cta-content">
      <h2 class="cta-title">Ready to Start Your New Braunfels Project?</h2>
      <p class="cta-text">Get a free estimate for welding and metal fabrication in New Braunfels.</p>
    </div>
    <div class="cta-actions">
      <?php if ($phone): ?><a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="btn btn-primary btn-lg">Call Now</a><?php endif; ?>
      <button type="button" class="btn btn-secondary btn-lg" data-open-estimate">Get Free Estimate</button>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
