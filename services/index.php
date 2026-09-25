<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Services listing — AGA Welding & Fabrication (Phase 4)
 * ------------------------------------------------------------------------- */
$pageType    = 'other';
$currentPage = 'services';

$pageTitle       = 'Welding & Metal Fabrication Services in San Antonio, TX | ' . $siteName;
$pageDescription = 'Explore AGA Welding & Fabrication\'s full range of San Antonio services — structural steel, custom metalwork, sheet metal, cutting, bending, repairs, railings, staircases and certified welding.';
$canonicalUrl    = $siteUrl . '/services/';
$ogImage         = $siteUrl . '/assets/images/welding-fabrication-shop.jpg';

/* Image + icon + 3 benefit bullets per service card */
$cardMedia = [
    'steel-fabrication'            => ['img' => 'structural-steel-beams',        'icon' => 'layers',       'alt' => 'Fabricated structural steel I-beams stacked at the AGA shop in San Antonio', 'bullets' => ['Precision cut &amp; formed steel', 'Commercial &amp; industrial work', 'Built to spec, every time']],
    'structural-steel-fabrication' => ['img' => 'fabricated-steel-columns',      'icon' => 'building-2',   'alt' => 'Finished fabricated steel columns inside the AGA welding shop', 'bullets' => ['Code-compliant structural steel', 'Beams, columns &amp; framing', 'Engineered for heavy loads']],
    'sheet-metal-fabrication'      => ['img' => 'custom-metal-pipe-support',     'icon' => 'ruler',        'alt' => 'Custom fabricated steel sheet-metal support built by AGA in San Antonio', 'bullets' => ['Cutting, bending &amp; forming', 'Panels, guards &amp; enclosures', 'Tight-tolerance metalwork']],
    'metal-cutting'                => ['img' => 'metal-cutting-bandsaw',         'icon' => 'scissors',     'alt' => 'Band saw and roller conveyor cutting steel stock in the San Antonio shop', 'bullets' => ['Clean, accurate cuts', 'Any gauge or profile', 'Fast shop turnaround']],
    'metal-bending'                => ['img' => 'custom-steel-fabrication',      'icon' => 'wrench',       'alt' => 'Custom-formed steel components taking shape on the AGA shop floor', 'bullets' => ['Press-brake &amp; roll forming', 'Custom shapes &amp; angles', 'Consistent, repeatable forms']],
    'metal-assembly'               => ['img' => 'welded-steel-stands',           'icon' => 'hammer',       'alt' => 'Welded steel A-frame stands assembled by AGA Welding &amp; Fabrication', 'bullets' => ['Multi-part steel structures', 'Skilled certified fitters', 'Welded, bolted &amp; finished']],
    'metal-repair'                 => ['img' => 'welding-fabrication-shop',      'icon' => 'flame',        'alt' => 'AGA welder repairing steel with a bright arc weld inside the San Antonio shop', 'bullets' => ['Restore damaged metal', 'On-site mobile welding', 'Patch, reinforce &amp; rebuild']],
    'structural-metal-repair'      => ['img' => 'steel-beam-fabrication',        'icon' => 'shield-check', 'alt' => 'Welder reinforcing long structural steel beams at AGA Welding &amp; Fabrication', 'bullets' => ['Frame &amp; framework repair', 'Corrosion &amp; reinforcement', 'Certified weld procedures']],
    'equipment-metal-repair'       => ['img' => 'welding-steel-beam-san-antonio','icon' => 'wrench',       'alt' => 'Certified AGA welder repairing steel equipment components in San Antonio', 'bullets' => ['Rebuild worn components', 'Minimize equipment downtime', 'On-site mobile service']],
    'handrails-railings'           => ['img' => 'custom-metal-pipe-support',     'icon' => 'fence',        'alt' => 'Custom fabricated steel railing built by AGA Welding &amp; Fabrication', 'bullets' => ['Stair, guard &amp; balcony rails', 'ADA &amp; code-compliant heights', 'Fabricated &amp; installed']],
    'staircases'                   => ['img' => 'structural-steel-frame',        'icon' => 'footprints',   'alt' => 'Custom steel staircase framework fabricated by AGA in San Antonio', 'bullets' => ['Stringers, treads &amp; landings', 'Straight, switchback &amp; spiral', 'Code-compliant egress stairs']],
    'awnings'                      => ['img' => 'structural-steel-delivery',     'icon' => 'umbrella',     'alt' => 'Fabricated steel awning framework loaded for a San Antonio install', 'bullets' => ['Storefront &amp; patio covers', 'Welded steel frames', 'Sun &amp; rain protection']],
    'racks-storage-solutions'      => ['img' => 'welded-steel-stands',           'icon' => 'layers',       'alt' => 'Welded steel storage racks fabricated by AGA in San Antonio', 'bullets' => ['Pallet &amp; cantilever racks', 'Built to your footprint', 'Heavy-duty construction']],
    'custom-metalwork'             => ['img' => 'structural-steel-frame',        'icon' => 'pen-tool',     'alt' => 'Custom geometric steel metalwork fabricated by AGA in San Antonio', 'bullets' => ['Gates, panels &amp; signage', 'From sketch or drawings', 'Decorative &amp; functional']],
    'general-repairs-modifications'=> ['img' => 'custom-steel-fabrication',      'icon' => 'wrench',       'alt' => 'AGA welder modifying a fabricated steel assembly in the San Antonio shop', 'bullets' => ['Retrofits &amp; alterations', 'Add brackets &amp; mounts', 'In-shop or mobile welding']],
    'additional-services'          => ['img' => 'welding-steel-beam-san-antonio','icon' => 'flame',        'alt' => 'Certified welder joining a structural steel beam in the San Antonio shop', 'bullets' => ['MIG, TIG, stick &amp; flux-cored', 'Pipe &amp; structural welding', 'Mobile welding available']],
];

/* Schema — BreadcrumbList */
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',     'url' => $siteUrl . '/'],
    ['name' => 'Services', 'url' => $canonicalUrl],
]);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO (interior) ============================ -->
<section class="hero hero--interior texture-grain" aria-label="Welding and metal fabrication services in San Antonio">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <span class="eyebrow-label">San Antonio, TX &middot; Since 1983</span>
    <h1>Welding &amp; Metal Fabrication <span class="text-accent">Services</span> in San Antonio</h1>
    <p class="hero-answer">AGA Welding &amp; Fabrication delivers the full range of metal fabrication and certified welding across San Antonio &mdash; structural steel, custom metalwork, sheet metal, cutting, bending, assembly, repairs, railings, staircases and more, all built in our Gardner Rd shop.</p>
    <div class="hero-actions">
      <button type="button" class="btn btn-primary btn-lg" data-open-estimate>Get my free estimate</button>
      <a class="btn btn-secondary btn-lg" href="/contact/">Contact the shop</a>
    </div>
  </div>
</section>

<!-- ============================ BREADCRUMB ============================ -->
<nav class="breadcrumb container" aria-label="Breadcrumb" style="padding-top:1.25rem;">
  <a href="/">Home</a><span class="breadcrumb-sep">/</span>
  <span>Services</span>
</nav>

<!-- ============================ INTRO / ANSWER-FIRST ============================ -->
<section class="section section--tight" aria-label="Services overview">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What welding and fabrication services does <span class="text-accent">AGA offer in San Antonio</span>?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication offers steel and structural steel fabrication, sheet metal work, precision cutting and bending, metal assembly, structural and equipment repair, custom railings, staircases, awnings, storage racks, custom metalwork, and certified MIG, TIG, stick, flux-cored, pipe and mobile welding &mdash; a full-service shop for commercial, industrial, and residential clients across San Antonio.</p>
  </div>
</section>

<!-- ============================ SERVICES GRID ============================ -->
<section class="section" aria-label="All services">
  <div class="container-wide">
    <div class="services-grid">
      <?php
      foreach ($services as $i => $svc):
          $slug  = $svc['slug'];
          $media = $cardMedia[$slug];
          $img   = $media['img'];
          $tintN = ($i % 3) + 1;
          $delay = ($i % 3) + 1;
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tintN; ?> reveal-up reveal-delay-<?php echo $delay; ?>">
        <div class="service-card__image">
          <picture>
            <source type="image/avif" srcset="/assets/images/<?php echo $img; ?>-480.avif 480w, /assets/images/<?php echo $img; ?>-960.avif 960w" sizes="(max-width: 768px) 100vw, 340px">
            <img src="/assets/images/<?php echo $img; ?>.jpg"
                 srcset="/assets/images/<?php echo $img; ?>-480.webp 480w, /assets/images/<?php echo $img; ?>-960.webp 960w"
                 sizes="(max-width: 768px) 100vw, 340px"
                 alt="<?php echo $media['alt']; ?>"
                 width="600" height="360" loading="lazy" decoding="async">
          </picture>
        </div>
        <div class="service-card__body">
          <div class="service-card__icon"><?php echo icon($media['icon'], 22); ?></div>
          <h3><?php echo htmlspecialchars($svc['name']); ?></h3>
          <p class="service-card__desc"><?php echo htmlspecialchars($svc['description']); ?></p>
          <ul>
            <?php foreach ($media['bullets'] as $bullet): ?>
            <li><?php echo $bullet; ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="/services/<?php echo $slug; ?>/" class="service-card__cta">Learn more</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================ WHY AGA ============================ -->
<section class="section section--light" aria-label="Why choose AGA Welding &amp; Fabrication">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>Why do San Antonio clients bring every metal job to <span class="text-accent">one shop</span>?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication keeps cutting, forming, welding, assembly, finishing, and delivery under one roof on Gardner Rd, so one certified San Antonio team owns your project from quote to install &mdash; tighter tolerances, shorter timelines, and a single point of accountability instead of juggling vendors.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card card-tint-1 reveal-up">
        <div class="service-card__icon"><?php echo icon('badge-check', 22); ?></div>
        <h3>Certified welders</h3>
        <p>Every joint is laid by a certified welder using MIG, TIG, stick, or flux-cored procedures matched to the metal and load.</p>
      </div>
      <div class="card card-tint-2 reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('calendar-check', 22); ?></div>
        <h3>43 years in San Antonio</h3>
        <p>A family-run shop fabricating for local builders, plants, and property owners since 1983 &mdash; with the range to match.</p>
      </div>
      <div class="card card-tint-3 reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('truck', 22); ?></div>
        <h3>Delivery &amp; mobile welding</h3>
        <p>We deliver finished steel to your San Antonio site and bring mobile welding when the work can&rsquo;t come to the shop.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ FINAL CTA ============================ -->
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a fabrication estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Not sure which service you need?</h2>
      <p>Tell AGA Welding &amp; Fabrication about your project and we&rsquo;ll point you to the right solution and follow up the same day with a clear, no-obligation estimate. Rush service is available across San Antonio.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/contact/">Contact us</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
