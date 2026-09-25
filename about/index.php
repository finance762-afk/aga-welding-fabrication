<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * About Page — AGA Welding & Fabrication (Phase 5)
 * ------------------------------------------------------------------------- */
$pageType    = 'about';
$currentPage = 'about';

$pageTitle       = 'About AGA Welding & Fabrication | San Antonio Metal Fabrication Since 1983';
$pageDescription = 'Family-run San Antonio metal fabrication shop since 1983. AGA Welding & Fabrication delivers structural steel, custom metalwork, and certified MIG, TIG & stick welding across Texas.';
$canonicalUrl    = $siteUrl . '/about/';
$ogImage         = $siteUrl . '/assets/images/aga-welding-fabrication-shop.jpg';

/* Hero LCP preload */
$heroPreload = [
    'srcset' => '/assets/images/aga-welding-fabrication-shop-480.avif 480w, /assets/images/aga-welding-fabrication-shop-960.avif 960w, /assets/images/aga-welding-fabrication-shop-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Schema */
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',  'url' => $siteUrl . '/'],
    ['name' => 'About', 'url' => $canonicalUrl],
]);
$schemaMarkup = $breadcrumbSchema;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $schemaMarkup; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="About AGA Welding & Fabrication">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/aga-welding-fabrication-shop-480.avif 480w, /assets/images/aga-welding-fabrication-shop-960.avif 960w, /assets/images/aga-welding-fabrication-shop-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/aga-welding-fabrication-shop.jpg"
           srcset="/assets/images/aga-welding-fabrication-shop-480.webp 480w, /assets/images/aga-welding-fabrication-shop-960.webp 960w, /assets/images/aga-welding-fabrication-shop-1600.webp 1600w"
           sizes="100vw"
           alt="The AGA Welding & Fabrication shop building in southeast San Antonio, Texas"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-text-center">
      <span class="eyebrow">About Us &middot; Since 1983</span>
      <h1 class="hero-title"><span class="text-accent">43 Years</span> Welding &amp; Fabricating Steel in San Antonio</h1>
      <p class="hero-answer">AGA Welding &amp; Fabrication is a family-run San Antonio metal fabrication shop delivering structural steel, custom metalwork, and certified welding for commercial, industrial, and residential clients across Texas.</p>
    </div>
  </div>
</section>

<!-- ============================ STORY ============================ -->
<section class="section" aria-label="Our story">
  <div class="container">
    <div class="about-split">
      <div class="about-left reveal-left">
        <span class="eyebrow-label">Our Story</span>
        <h2>Precision <span class="text-accent">metal fabrication</span> rooted in San Antonio</h2>
        <p>Since 1983, AGA Welding &amp; Fabrication has been solving San Antonio's structural steel and custom metalwork challenges — one job at a time. We're a family-run shop based on Gardner Rd, and every project comes down to the same commitment: precision cuts, certified welds, and steel that stands up.</p>
        <p>Whether you're bringing us a full set of engineered drawings or a rough sketch on a napkin, our team consults, designs, fabricates, and installs — from a single handrail to a complete structural steel package. No cookie-cutter templates, just metalwork built specifically for your project and delivered on schedule.</p>
        <p>Our shop handles everything in-house: cutting, forming, welding (MIG, TIG, stick, flux-cored), and finishing. When a job can't come to us, our mobile welding service brings the crew and equipment directly to your San Antonio site for on-location repairs and fabrication.</p>
      </div>

      <div class="about-right reveal-right">
        <div class="about-image-primary">
          <picture>
            <source type="image/avif" srcset="/assets/images/welding-fabrication-shop-480.avif 480w, /assets/images/welding-fabrication-shop-960.avif 960w" sizes="(max-width: 900px) 100vw, 520px">
            <img src="/assets/images/welding-fabrication-shop.jpg"
                 srcset="/assets/images/welding-fabrication-shop-480.webp 480w, /assets/images/welding-fabrication-shop-960.webp 960w"
                 sizes="(max-width: 900px) 100vw, 520px"
                 alt="AGA welder at work inside the San Antonio fabrication shop, bright arc weld illuminating the workspace"
                 width="600" height="450" loading="lazy" decoding="async">
          </picture>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ VALUES ============================ -->
<section class="section section--light" aria-label="Our values">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What Drives Us</span>
      <h2>The AGA <span class="text-accent">approach</span> to metal fabrication</h2>
    </div>

    <div class="values-grid">
      <article class="value-card card-tint-1 reveal-up reveal-delay-1">
        <div class="value-icon"><?php echo icon('ruler', 28); ?></div>
        <h3>Built to Spec</h3>
        <p>Every piece of steel we cut, weld, and deliver meets your exact specifications and local building codes. We confirm dimensions and material specs before cutting, so the finished product fits the first time — no surprises, no rework.</p>
      </article>

      <article class="value-card card-tint-2 reveal-up reveal-delay-2">
        <div class="value-icon"><?php echo icon('badge-check', 28); ?></div>
        <h3>Certified Craftsmanship</h3>
        <p>All our welders are certified professionals who maintain rigorous quality-control standards on every joint. We stand behind our work with a commitment to durability, precision, and long-term structural integrity.</p>
      </article>

      <article class="value-card card-tint-3 reveal-up reveal-delay-3">
        <div class="value-icon"><?php echo icon('calendar-check', 28); ?></div>
        <h3>On Time, Every Time</h3>
        <p>When we give you a schedule, we stick to it. AGA Welding &amp; Fabrication sets realistic timelines during the estimate phase and delivers on deadline — with rush service available when your project can't wait.</p>
      </article>
    </div>
  </div>
</section>

<!-- ============================ CAPABILITIES ============================ -->
<section class="section" aria-label="Our capabilities">
  <div class="container">
    <div class="about-split">
      <div class="about-left reveal-left">
        <div class="about-image-primary">
          <picture>
            <source type="image/avif" srcset="/assets/images/structural-steel-beams-480.avif 480w, /assets/images/structural-steel-beams-960.avif 960w" sizes="(max-width: 900px) 100vw, 520px">
            <img src="/assets/images/structural-steel-beams.jpg"
                 srcset="/assets/images/structural-steel-beams-480.webp 480w, /assets/images/structural-steel-beams-960.webp 960w"
                 sizes="(max-width: 900px) 100vw, 520px"
                 alt="Fabricated structural steel I-beams stacked and ready for delivery at the AGA shop in San Antonio"
                 width="600" height="450" loading="lazy" decoding="async">
          </picture>
        </div>
      </div>

      <div class="about-right reveal-right">
        <span class="eyebrow-label">Capabilities</span>
        <h2>Full-service <span class="text-accent">metal fabrication</span> under one roof</h2>
        <p>AGA Welding &amp; Fabrication handles the entire fabrication process in our southeast San Antonio shop:</p>

        <ul class="capabilities-list">
          <li><?php echo icon('check', 20); ?> <span><strong>Structural steel fabrication</strong> — beams, columns, framing for commercial &amp; industrial construction</span></li>
          <li><?php echo icon('check', 20); ?> <span><strong>Custom metalwork</strong> — handrails, staircases, awnings, storage racks, decorative &amp; functional pieces</span></li>
          <li><?php echo icon('check', 20); ?> <span><strong>Certified welding</strong> — MIG, TIG, stick, flux-cored &amp; pipe welding for all metals</span></li>
          <li><?php echo icon('check', 20); ?> <span><strong>Metal repair</strong> — structural reinforcement, equipment restoration, on-site mobile welding</span></li>
          <li><?php echo icon('check', 20); ?> <span><strong>Cutting &amp; forming</strong> — precision cutting, bending &amp; shaping for any project</span></li>
          <li><?php echo icon('check', 20); ?> <span><strong>Assembly &amp; installation</strong> — multi-part structures welded, bolted &amp; delivered to your San Antonio job site</span></li>
        </ul>

        <div class="hero-actions" style="margin-top:1.5rem;">
          <button type="button" class="btn btn-primary" data-open-estimate>Request estimate</button>
          <a class="btn btn-secondary" href="/services/">View all services</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ CTA BANNER ============================ -->
<section class="cta-banner texture-grain edge-curve-top" id="estimate" aria-label="Get your free estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Ready to Start?</span>
      <h2>Tell us about your fabrication project</h2>
      <p>Whether it's structural steel for a commercial build, custom railings for a residence, or an on-site weld repair, AGA Welding &amp; Fabrication delivers precision metalwork across San Antonio. We'll get back to you the same day with a clear, no-obligation estimate.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/contact/">Contact us</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
