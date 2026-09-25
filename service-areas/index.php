<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Service Areas Overview | AGA Welding & Fabrication (Phase 6)
 * ------------------------------------------------------------------------- */
$pageType    = 'other';
$currentPage = 'service-areas';

$pageTitle       = 'Service Areas - Welding & Fabrication in San Antonio Metro | ' . $siteName;
$pageDescription = 'AGA Welding & Fabrication serves San Antonio, Boerne, Helotes, Schertz, New Braunfels, and surrounding Texas communities with expert metal fabrication, structural steel, and custom welding services.';
$canonicalUrl    = $siteUrl . '/service-areas/';
$ogImage         = $siteUrl . '/assets/images/logo.png';

/* Breadcrumb schema */
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => $siteUrl . '/'],
    ['name' => 'Service Areas', 'url' => $canonicalUrl],
]);

/* Service area cities — matches config + expanded metro coverage */
$areasList = [
    [
        'name' => 'San Antonio',
        'slug' => 'san-antonio',
        'desc' => 'Our home base in San Antonio provides full-service metal fabrication and welding for commercial, industrial, and residential clients throughout Bexar County.',
    ],
    [
        'name' => 'Boerne',
        'slug' => 'boerne',
        'desc' => 'Serving Boerne and the Hill Country with custom metalwork, structural steel fabrication, and expert welding for residential and commercial projects.',
    ],
    [
        'name' => 'Helotes',
        'slug' => 'helotes',
        'desc' => 'Metal fabrication and welding services in Helotes, including custom railings, gates, structural steel, and industrial repairs.',
    ],
    [
        'name' => 'Schertz',
        'slug' => 'schertz',
        'desc' => 'Northeast corridor welding and fabrication services for Schertz businesses and homeowners, from structural steel to custom metal projects.',
    ],
    [
        'name' => 'New Braunfels',
        'slug' => 'new-braunfels',
        'desc' => 'Comprehensive welding and metal fabrication in New Braunfels, serving industrial, commercial, and residential clients with precision craftsmanship.',
    ],
    [
        'name' => 'Leon Valley',
        'slug' => 'leon-valley',
        'desc' => 'Custom metal fabrication and welding services in Leon Valley, including handrails, gates, structural repairs, and industrial metalwork.',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--interior hero--solid">
  <span class="grain" aria-hidden="true"></span>
  <div class="container">
    <span class="eyebrow">Service Coverage</span>
    <h1 class="hero-title">Welding &amp; Metal Fabrication Across <span class="text-accent">Greater San Antonio</span></h1>
    <p class="hero-answer">AGA Welding &amp; Fabrication serves the San Antonio metro area with expert welding, structural steel fabrication, and custom metalwork — bringing <?php echo $yearsInBusiness; ?> years of precision craftsmanship to commercial, industrial, and residential clients throughout Bexar, Comal, and Guadalupe counties.</p>
  </div>
</section>

<!-- ============================ SERVICE AREAS GRID ============================ -->
<section class="section">
  <div class="container">

    <div class="section-header center">
      <h2 class="section-title">Where We Serve</h2>
      <p class="section-intro">From our San Antonio shop at 8249 Gardner Rd, we deliver expert metal fabrication and welding services throughout the greater San Antonio region. Each community receives the same attention to detail and code-compliant craftsmanship.</p>
    </div>

    <div class="area-cards-grid">
      <?php foreach ($areasList as $idx => $area): ?>
      <article class="area-card card-tint-<?php echo (($idx % 3) + 1); ?>" data-animate="reveal-up" data-delay="<?php echo ($idx % 4) + 1; ?>">
        <div class="area-card__header">
          <svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>
          <h3 class="area-card__name"><?php echo htmlspecialchars($area['name']); ?></h3>
        </div>
        <p class="area-card__desc"><?php echo htmlspecialchars($area['desc']); ?></p>
        <a href="/service-areas/<?php echo $area['slug']; ?>/" class="area-card__link">
          Learn More
          <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </a>
      </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ============================ COVERAGE MAP CALLOUT ============================ -->
<section class="section bg-dark">
  <span class="grain" aria-hidden="true"></span>
  <div class="container-narrow">
    <div class="callout-box" data-animate="reveal-scale">
      <svg aria-hidden="true" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="callout-icon"><circle cx="12" cy="10" r="3"/><path d="M12 2a8 8 0 0 0-8 8c0 1.892.402 3.13 1.5 4.5L12 22l6.5-7.5c1.098-1.37 1.5-2.608 1.5-4.5a8 8 0 0 0-8-8"/></svg>
      <h2 class="callout-title">Not Sure If We Serve Your Area?</h2>
      <p class="callout-text">We regularly work with clients throughout the greater San Antonio metro. If your project location isn't listed above, give us a call — we'll let you know if we can reach you and what our service options are.</p>
      <?php if ($phone): ?>
      <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="btn btn-primary btn-lg">
        <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" /></svg>
        Call <?php echo htmlspecialchars($phone); ?>
      </a>
      <?php else: ?>
      <a href="/#estimate" class="btn btn-primary btn-lg">Request Free Estimate</a>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ============================ WHAT WE DO ============================ -->
<section class="section">
  <div class="container">
    <div class="split">
      <div class="split-content">
        <span class="eyebrow">Our Capabilities</span>
        <h2 class="section-title">Full-Service Metal Fabrication for Every Community</h2>
        <p>AGA Welding &amp; Fabrication brings the same shop capabilities and field expertise to every service area — from downtown San Antonio industrial sites to Hill Country residential projects in Boerne.</p>
        <ul class="check-list">
          <li>
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
            Structural steel fabrication for commercial and industrial builds
          </li>
          <li>
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
            Custom metal fabrication from concept or existing drawings
          </li>
          <li>
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
            MIG, TIG, stick, flux-cored, and pipe welding services
          </li>
          <li>
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
            Handrails, staircases, gates, and architectural metalwork
          </li>
          <li>
            <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
            Equipment repair and structural metal repair services
          </li>
        </ul>
        <a href="/services/" class="btn btn-secondary">View All Services</a>
      </div>
      <div class="split-media">
        <div class="img-reveal">
          <img src="/assets/images/aga-welding-fabrication-shop.jpg"
               srcset="/assets/images/aga-welding-fabrication-shop-480.webp 480w, /assets/images/aga-welding-fabrication-shop-960.webp 960w, /assets/images/aga-welding-fabrication-shop-1600.webp 1600w"
               sizes="(max-width: 900px) 100vw, 50vw"
               alt="AGA Welding & Fabrication shop floor in San Antonio with fabrication equipment and steel inventory"
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
      <h2 class="cta-title">Ready to Start Your Metal Fabrication Project?</h2>
      <p class="cta-text">Get a free estimate for welding and fabrication services anywhere in the greater San Antonio area. We'll review your project, answer your questions, and provide a clear quote with no obligation.</p>
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
/* Service Areas Grid (unique to this page) */
.area-cards-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: var(--space-lg);
  margin-top: var(--space-2xl);
}

.area-card {
  background: var(--color-card-tint-1);
  border-radius: var(--radius);
  padding: var(--space-xl);
  border: 1px solid var(--color-border);
  transition: var(--transition);
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}

.area-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
}

.area-card__header {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
}

.area-card__header svg {
  color: var(--color-accent);
  flex-shrink: 0;
}

.area-card__name {
  font-family: var(--font-heading);
  font-size: var(--fs-h4);
  font-weight: 700;
  margin: 0;
  color: var(--color-text);
}

.area-card__desc {
  font-size: var(--fs-body);
  line-height: 1.6;
  color: var(--color-text-light);
  margin: 0;
}

.area-card__link {
  display: inline-flex;
  align-items: center;
  gap: var(--space-xs);
  font-weight: 600;
  color: var(--color-accent);
  text-decoration: none;
  margin-top: auto;
  transition: var(--transition);
}

.area-card__link:hover {
  gap: var(--space-sm);
}

.area-card__link svg {
  transition: var(--transition);
}

/* Callout Box */
.callout-box {
  background: var(--color-bg);
  border-radius: var(--radius-lg);
  padding: var(--space-3xl);
  text-align: center;
  border: 2px solid var(--color-accent);
}

.callout-icon {
  color: var(--color-accent);
  margin: 0 auto var(--space-lg);
  display: block;
}

.callout-title {
  font-family: var(--font-heading);
  font-size: var(--fs-h3);
  font-weight: 700;
  margin-bottom: var(--space-md);
}

.callout-text {
  font-size: var(--fs-lg);
  line-height: 1.7;
  margin-bottom: var(--space-xl);
  max-width: 60ch;
  margin-left: auto;
  margin-right: auto;
}

/* Check List */
.check-list {
  list-style: none;
  padding: 0;
  margin: var(--space-lg) 0;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
}

.check-list li {
  display: flex;
  align-items: flex-start;
  gap: var(--space-sm);
  font-size: var(--fs-body);
  line-height: 1.6;
}

.check-list svg {
  color: var(--color-accent);
  flex-shrink: 0;
  margin-top: 2px;
}

@media (max-width: 768px) {
  .area-cards-grid {
    grid-template-columns: 1fr;
  }

  .callout-box {
    padding: var(--space-xl);
  }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
