<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Service page — Sheet Metal Fabrication | AGA Welding & Fabrication (Phase 4)
 * ------------------------------------------------------------------------- */
$pageType    = 'service';
$serviceSlug = 'sheet-metal-fabrication';
$currentPage = 'services';

/* Pull this service from config */
$svc = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $svc = $s; break; } }

$pageTitle       = 'Sheet Metal Fabrication San Antonio, TX | ' . $siteName;
$pageDescription = 'Sheet metal fabrication in San Antonio, TX. AGA Welding & Fabrication cuts, bends, forms thin-gauge metal into panels, enclosures, and brackets. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/sheet-metal-fabrication/';
$ogImage         = $siteUrl . '/assets/images/custom-metal-pipe-support.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'custom-metal-pipe-support';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Recent-work photos for this service (real shop photos) */
$spGallery = [
    ['img' => 'metal-cutting-bandsaw',    'cap' => 'Cutting sheet and stock to size on the AGA shop floor'],
    ['img' => 'custom-steel-fabrication', 'cap' => 'Sheet-metal assembly taking shape in San Antonio'],
    ['img' => 'welding-fabrication-shop', 'cap' => 'Welding fabricated sheet-metal panels in the shop'],
];

/* FAQs — unique to sheet metal fabrication in San Antonio */
$faqs = [
    [
        'q' => 'What gauge metal can AGA cut, bend, and form?',
        'a' => 'AGA Welding & Fabrication works with light and heavy gauge carbon steel, stainless, and aluminum sheet and plate, forming it into panels, brackets, enclosures, and ductwork components. Bring us your gauge and material spec and we will confirm the right cutting and bending approach before starting your San Antonio project.',
    ],
    [
        'q' => 'Can you match tight tolerances on sheet metal parts?',
        'a' => 'Yes. Sheet metal work often has to fit an existing enclosure, duct run, or mounting bracket exactly, so AGA Welding & Fabrication measures and confirms tolerances before cutting and checks each formed piece against your specification before it leaves our San Antonio shop.',
    ],
    [
        'q' => 'Do you fabricate sheet metal for HVAC and ductwork?',
        'a' => 'AGA Welding & Fabrication fabricates ducting components, transition panels, and mounting brackets for HVAC contractors and facility managers across San Antonio, forming and welding thin-gauge metal to the dimensions your system needs and finishing edges clean for safe handling and installation.',
    ],
    [
        'q' => 'Can AGA weld and finish sheet metal, not just cut and bend it?',
        'a' => 'Yes. Once your sheet metal is cut and formed, our certified welders join panels and brackets with MIG or TIG welding matched to the metal thickness, then grind and finish the seams so the finished piece is ready to paint, coat, or install at your San Antonio job site.',
    ],
];

/* Schema */
$serviceSchema = generateServiceSchema($svc, $canonicalUrl);
$faqSchema     = generateFAQSchema($faqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',     'url' => $siteUrl . '/'],
    ['name' => 'Services', 'url' => $siteUrl . '/services/'],
    ['name' => 'Sheet Metal Fabrication', 'url' => $canonicalUrl],
]);

/* "Other services" — 3 related, excluding this one */
$relatedSlugs = ['metal-cutting', 'metal-bending', 'custom-metalwork'];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="Sheet metal fabrication in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Custom fabricated steel sheet-metal support built by AGA Welding & Fabrication in San Antonio"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Sheet Metal Fabrication &middot; San Antonio, TX</span>
        <h1 class="hero-title">Sheet Metal Fabrication in <span class="text-accent">San Antonio</span> Cut and Formed to Fit</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication cuts, bends, forms, and assembles sheet and thin-gauge metal into panels, enclosures, brackets, and ductwork components for San Antonio businesses. We hold tight tolerances from your drawings or a shop measure and weld and finish every piece in-house.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('ruler', 18); ?> Tight-tolerance fabrication</li>
          <li><?php echo icon('scissors', 18); ?> Precision cutting &amp; forming</li>
          <li><?php echo icon('badge-check', 18); ?> Certified welders</li>
        </ul>
      </div>

      <aside class="hero-form-card">
        <h2>Get a free estimate</h2>
        <p class="hero-form-tagline">No obligation. Same-day reply.</p>
        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="hero-form">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <?php echo p1_attribution_fields('hero'); ?>
          <input type="hidden" name="consent_version" value="v2.1">
          <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
          <div class="form-row"><label class="sr-only" for="hero-name">Name</label><input id="hero-name" type="text" name="name" placeholder="Name" autocomplete="name" required></div>
          <div class="form-row"><label class="sr-only" for="hero-phone">Phone</label><input id="hero-phone" type="tel" name="phone" placeholder="Phone" autocomplete="tel" required></div>
          <div class="form-row"><label class="sr-only" for="hero-email">Email</label><input id="hero-email" type="email" name="email" placeholder="Email" autocomplete="email" required></div>
          <div class="form-row">
            <label class="sr-only" for="hero-service">Service needed</label>
            <select id="hero-service" name="service">
              <option value="Sheet Metal Fabrication">Sheet Metal Fabrication</option>
              <?php foreach ($services as $heroSvc): if ($heroSvc['slug'] === $serviceSlug) continue; ?>
              <option value="<?php echo htmlspecialchars($heroSvc['name']); ?>"><?php echo htmlspecialchars($heroSvc['name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <label class="consent"><input type="checkbox" name="terms_accepted" value="yes" required><span>I agree to the <a href="/terms/" target="_blank" rel="noopener">Terms</a> and <a href="/privacy-policy/" target="_blank" rel="noopener">Privacy Policy</a> and consent to be contacted. *</span></label>
          <button type="submit" class="btn btn-primary btn-block">Get my free estimate</button>
        </form>
      </aside>

    </div>
  </div>
</section>

<!-- ============================ BREADCRUMB ============================ -->
<nav class="breadcrumb container" aria-label="Breadcrumb" style="padding-top:1.25rem;">
  <a href="/">Home</a><span class="breadcrumb-sep">/</span>
  <a href="/services/">Services</a><span class="breadcrumb-sep">/</span>
  <span>Sheet Metal Fabrication</span>
</nav>

<!-- ============================ SERVICE DETAIL / ANSWER-FIRST ============================ -->
<section class="section" aria-label="Sheet metal fabrication overview">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What does <span class="text-accent">sheet metal fabrication</span> cover at AGA?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication cuts, bends, forms, and welds thin-gauge material into panels, enclosures, brackets, and ductwork &mdash; the precision work of sheet metal fabrication. We hold tight tolerances on every piece in our San Antonio shop, so parts fit the first time they reach your job site.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>San Antonio contractors, facility managers, and business owners bring AGA Welding &amp; Fabrication sheet metal jobs that need to fit an exact opening or mounting point &mdash; equipment enclosures, transition panels, custom brackets, and ductwork components. We measure or work from your drawings and confirm gauge and material before cutting.</p>
        <p>Our shop shears, cuts, and brakes carbon steel, stainless, and aluminum sheet to precise bend angles and dimensions, then our certified welders join seams and panels with MIG or TIG welding sized to the metal thickness. Every seam is ground and finished so edges are safe to handle and ready to coat.</p>
        <p>Because cutting, bending, welding, and finishing all happen at our Gardner Rd shop in southeast San Antonio, a sheet metal order does not pass through multiple vendors before it reaches you &mdash; we deliver the finished panels, brackets, or enclosures ready to install.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When you need sheet metal fabrication">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When do you need <span class="text-accent">custom sheet metal</span> instead of a stock part?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication forms and welds custom sheet metal to your exact dimensions whenever a stock part falls short &mdash; the opening, mounting pattern, or gauge just does not match what is on the shelf. Here is when San Antonio clients most often need a custom piece.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('ruler', 22); ?></div>
        <h3>A stock enclosure won&rsquo;t fit</h3>
        <p>Equipment openings, duct transitions, and mounting brackets often need dimensions no catalog part offers.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('scissors', 22); ?></div>
        <h3>You need a specific gauge or bend</h3>
        <p>Different thicknesses and bend radii call for shop equipment and setup that off-the-shelf parts cannot offer.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('wrench', 22); ?></div>
        <h3>The part needs to be welded, not riveted</h3>
        <p>Panels and brackets that need a continuous, sealed seam require welding sized to thin-gauge metal, not fasteners.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section" aria-label="Why choose AGA for sheet metal fabrication">
  <div class="container">
    <div class="split" style="display:grid; grid-template-columns:1fr 1fr; gap:clamp(2rem,5vw,4rem); align-items:center;">
      <div class="reveal-left">
        <span class="big-number">43</span>
        <p class="lead" style="margin-top:.5rem;">years shaping metal for San Antonio &mdash; a family-run shop that has cut, bent, and welded sheet metal since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why do San Antonio clients choose AGA for <span class="text-accent">sheet metal</span>?</h2>
        <ul class="card" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('scissors', 22); ?><span><strong>Tight tolerances, every time.</strong> We measure and confirm dimensions before cutting so panels, brackets, and enclosures fit on the first try.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Certified welders finish every seam.</strong> Thin-gauge welding takes a different touch &mdash; our welders match the process to the metal so seams stay clean and sealed.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>One shop, start to finish.</strong> Cutting, bending, welding, and finishing happen on Gardner Rd, and we deliver ready-to-install parts across San Antonio.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="Our sheet metal fabrication process">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">How It Works</span>
      <h2>How does AGA turn flat stock into a <span class="text-accent">finished sheet metal part</span>?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication runs every sheet metal job through the same four steps: consult and quote, confirm gauge and dimensions, cut-bend-weld, then finish and deliver. Confirming details up front keeps San Antonio orders accurate and on schedule.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Consult &amp; quote</b>
        <span>We review your drawings or measure the application and give you a clear, itemized estimate before ordering material.</span>
      </li>
      <li>
        <b>Confirm gauge &amp; dimensions</b>
        <span>We lock in material gauge, bend angles, and tolerances so the finished part matches the opening or mount it needs to fit.</span>
      </li>
      <li>
        <b>Cut, bend &amp; weld</b>
        <span>Our shop shears and brakes the metal to size, then certified welders join panels and seams in-house.</span>
      </li>
      <li>
        <b>Finish &amp; deliver</b>
        <span>We grind seams smooth, prep for coating, and deliver the finished sheet metal to your San Antonio location.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to other sheet metal shops">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>What sets AGA apart from other <span class="text-accent">sheet metal shops</span>?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication cuts, bends, welds, and finishes sheet metal on one San Antonio floor with certified welders &mdash; the tolerance and finish control that sets us apart, while many shops outsource welding or skip finishing and leave rough seams and inconsistent fit.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-3 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA Welding &amp; Fabrication</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Cutting, bending &amp; welding under one roof</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Tolerances confirmed before any metal is cut</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Certified welders finish every seam</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Delivery across San Antonio and Bexar County</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Typical alternative</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Welding subcontracted after cutting is done</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Dimensions confirmed after the part is cut</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Rough, unfinished seams left as-is</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> You arrange pickup or freight yourself</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK ============================ -->
<section class="section section--light sp-gallery" id="recent-work" aria-label="Recent sheet metal fabrication work">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What has AGA <span class="text-accent">recently fabricated</span> in sheet metal?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication recently cut, formed, and welded sheet metal out of our San Antonio shop &mdash; stock sized on the band saw, an assembly taking shape on the floor, and panels welded seam to seam. Every piece below was finished in-house to the client&rsquo;s specification.</p>

    <div class="sp-gallery-grid" data-p1-dynamic style="margin-top:1.5rem;">
      <?php foreach ($spGallery as $g): $gi = $g['img']; ?>
      <figure class="sp-gallery-item">
        <picture>
          <source type="image/avif" srcset="/assets/images/<?php echo $gi; ?>-480.avif 480w, /assets/images/<?php echo $gi; ?>-960.avif 960w" sizes="(max-width: 700px) 100vw, 400px">
          <img src="/assets/images/<?php echo $gi; ?>.jpg"
               srcset="/assets/images/<?php echo $gi; ?>-480.webp 480w, /assets/images/<?php echo $gi; ?>-960.webp 960w"
               sizes="(max-width: 700px) 100vw, 400px"
               alt="<?php echo htmlspecialchars($g['cap']); ?>"
               width="600" height="450" loading="lazy" decoding="async">
        </picture>
        <figcaption><?php echo htmlspecialchars($g['cap']); ?></figcaption>
      </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<section class="section" aria-label="Sheet metal fabrication FAQs">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">FAQ</span>
      <h2>What do San Antonio clients ask about <span class="text-accent">sheet-metal fabrication</span>?</h2>
    </div>
    <div class="faq-grid">
      <?php foreach ($faqs as $fi => $faq): ?>
      <details class="faq"<?php echo $fi < 2 ? ' open' : ''; ?>>
        <summary><?php echo htmlspecialchars($faq['q']); ?></summary>
        <p><?php echo htmlspecialchars($faq['a']); ?></p>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================ RELATED SERVICES ============================ -->
<section class="section section--light" aria-label="Other services you may need">
  <div class="container-wide">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">More From AGA</span>
      <h2>What other <span class="text-accent">fabrication services</span> might your project need?</h2>
    </div>
    <div class="services-grid" style="grid-template-columns:repeat(3,1fr);">
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/related-services.php'; ?>
    </div>
  </div>
</section>

<!-- ============================ FINAL CTA ============================ -->
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a sheet metal fabrication estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Ready to get your sheet metal fabricated in San Antonio?</h2>
      <p>Send AGA Welding &amp; Fabrication your drawings or project details and we&rsquo;ll follow up the same day with a clear, itemized estimate. Rush service is available when your deadline can&rsquo;t wait.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
