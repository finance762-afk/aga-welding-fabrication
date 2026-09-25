<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Service page — Handrails & Railings | AGA Welding & Fabrication (Phase 4)
 * ------------------------------------------------------------------------- */
$pageType    = 'service';
$serviceSlug = 'handrails-railings';
$currentPage = 'services';

/* Pull this service from config */
$svc = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $svc = $s; break; } }

$pageTitle       = 'Handrails & Railings San Antonio, TX | ' . $siteName;
$pageDescription = 'Custom steel handrails and railings in San Antonio, TX. AGA Welding & Fabrication builds code-compliant stair, ramp, and balcony rails, welded solid for homes and businesses. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/handrails-railings/';
$ogImage         = $siteUrl . '/assets/images/custom-metal-pipe-support.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'custom-metal-pipe-support';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Recent-work photos — general shop fabrication, NOT finished railings (honest captions) */
$spGallery = [
    ['img' => 'welded-steel-stands',      'cap' => 'Welded steel stands fabricated at the AGA San Antonio shop'],
    ['img' => 'custom-steel-fabrication', 'cap' => 'Custom steel fabrication in progress at the AGA Welding & Fabrication shop'],
    ['img' => 'structural-steel-frame',   'cap' => 'Welded steel frame work at the AGA shop in San Antonio'],
];

/* FAQs — unique to handrails & railings in San Antonio */
$faqs = [
    [
        'q' => 'How much do custom handrails and railings cost in San Antonio?',
        'a' => 'Railing cost depends on the length, the style, the number of posts, and the mounting surface. AGA Welding & Fabrication measures your stair, ramp, or balcony in San Antonio first, then gives a clear, itemized estimate — a fabricated steel rail costs more than a kit but fits right and lasts far longer.',
    ],
    [
        'q' => 'How long does a custom railing take to build and install?',
        'a' => 'Most residential railings are fabricated and installed by AGA Welding & Fabrication within one to two weeks of measuring, depending on length and finish. Larger commercial guardrail runs take longer. We set a realistic schedule at the measure and confirm install timing before fabrication starts on your San Antonio job.',
    ],
    [
        'q' => 'Are your railings built to code-compliant heights?',
        'a' => 'Yes. AGA Welding & Fabrication builds handrails and guardrails to the code-compliant heights required for your San Antonio stair, ramp, or landing, whether residential or commercial. We confirm the required height and graspable handrail dimensions at the measure so the finished railing passes inspection and functions safely in a fall.',
    ],
    [
        'q' => 'Do you make railings for both homes and businesses?',
        'a' => 'Yes. AGA Welding & Fabrication fabricates residential railings for porches, entries, and interior stairs, plus commercial and industrial guardrails for ramps, mezzanines, and loading areas across San Antonio. Every rail is welded steel, built to the setting, and prepped for the paint or coating finish your property needs.',
    ],
];

/* Schema */
$serviceSchema = generateServiceSchema($svc, $canonicalUrl);
$faqSchema     = generateFAQSchema($faqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',     'url' => $siteUrl . '/'],
    ['name' => 'Services', 'url' => $siteUrl . '/services/'],
    ['name' => 'Handrails & Railings', 'url' => $canonicalUrl],
]);

/* "Other services" — 3 related, excluding this one */
$relatedSlugs = ['staircases', 'custom-metalwork', 'awnings'];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="Handrails and railings in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Custom fabricated steel pipe support built at the AGA Welding & Fabrication shop in San Antonio, TX"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Handrails &amp; Railings &middot; San Antonio, TX</span>
        <h1 class="hero-title">Handrails &amp; Railings in <span class="text-accent">San Antonio</span>, Welded to Code</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication custom-fabricates steel handrails and railings for San Antonio homes and businesses &mdash; stair rails, ramp rails, balcony guardrails, and code-compliant barriers. Our certified welders build each railing to your measurements, weld it solid, and finish it clean so it adds safety and looks right on your property.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('shield-check', 18); ?> Family-run since 1983</li>
          <li><?php echo icon('layers', 18); ?> Stair, ramp &amp; balcony rails</li>
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
              <option value="Handrails &amp; Railings">Handrails &amp; Railings</option>
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
  <span>Handrails &amp; Railings</span>
</nav>

<!-- ============================ SERVICE DETAIL / ANSWER-FIRST ============================ -->
<section class="section" aria-label="Handrails and railings overview">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What goes into <span class="text-accent">custom handrails and railings in San Antonio</span>?</h2>
    </div>
    <p class="answer-block">Custom handrails and railings are steel guards fabricated to fit a specific stair, ramp, balcony, or landing and welded to hold real force. AGA Welding &amp; Fabrication measures the opening, builds the railing to code-compliant heights in our San Antonio shop, and installs it solid so it protects people and finishes the space cleanly.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>For four decades, AGA Welding &amp; Fabrication has built steel railings for San Antonio stairways, porches, ramps, mezzanines, and rooftop landings &mdash; the kind of guard that has to stop a fall, meet code, and still look intentional. We measure on site, confirm the mounting surface, and fabricate each rail to the exact rise, run, and height your project calls for.</p>
        <p>Our certified welders work in steel pipe, square tube, and bar stock, joining posts, rails, and pickets with MIG, TIG, stick, and flux-cored welds, then grinding every joint smooth. Whether you want a plain shop-grade guardrail for a warehouse or a cleaner rail for a home entry, the railing is built to take a firm push and hold its line for years.</p>
        <p>Because AGA fabricates in the shop on Gardner Rd and installs across San Antonio and Bexar County, one team handles measuring, welding, finishing, and mounting. That keeps heights consistent, anchors solid, and the finished railing prepped for coating or paint so it stands up to Texas weather and daily use.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When you need a new railing">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When do you need a <span class="text-accent">new or replacement railing</span> in San Antonio?</h2>
    </div>
    <p class="answer-block">You need a railing when a stair, ramp, balcony, or raised landing has an open edge, or when an existing rail is loose, rusted, or below code height. AGA Welding &amp; Fabrication fabricates and installs code-compliant steel railings across San Antonio, closing fall hazards and replacing failing rails with welded steel that holds.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('ruler', 22); ?></div>
        <h3>An open stair, ramp, or edge</h3>
        <p>Any stair, ramp, or raised landing without a guard is a fall hazard that code requires you to rail off.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('layers', 22); ?></div>
        <h3>A loose or wobbly existing rail</h3>
        <p>A rail that shifts when you lean on it has failed at the welds or anchors and needs to be rebuilt or replaced.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('hammer', 22); ?></div>
        <h3>Rusted or below-code railing</h3>
        <p>Corroded steel or a rail below required height will not pass inspection and should be replaced with new welded steel.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section" aria-label="Why choose AGA for handrails and railings">
  <div class="container">
    <div class="split" style="display:grid; grid-template-columns:1fr 1fr; gap:clamp(2rem,5vw,4rem); align-items:center;">
      <div class="reveal-left">
        <span class="big-number">43</span>
        <p class="lead" style="margin-top:.5rem;">years fabricating steel railings and guards in San Antonio &mdash; a family-run shop building for local homes, builders, and businesses since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why do San Antonio property owners choose AGA for <span class="text-accent">railings</span>?</h2>
        <p class="answer-block">San Antonio homeowners, builders, and property managers choose AGA Welding &amp; Fabrication for railings because a guard is only as safe as its welds and anchors. Family-run since 1983, our certified welders build each rail to code-compliant heights, mount it solid, and finish it clean so it protects people and looks right.</p>
        <ul class="card" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Built to code height.</strong> Every stair rail, ramp rail, and guardrail is fabricated to the code-compliant heights your San Antonio project requires, so it passes inspection and does its job in a fall.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('layers', 22); ?><span><strong>Welded and mounted solid.</strong> Posts, rails, and pickets are welded by certified welders and anchored to hold a hard push &mdash; no wobble, no rattling fasteners working loose over time.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>Measured and installed locally.</strong> We measure on site, fabricate on Gardner Rd, and install across San Antonio and Bexar County, so heights and anchors are right the first time.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="Our railing fabrication process">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">How It Works</span>
      <h2>How does AGA <span class="text-accent">build and install a railing</span>?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication follows four steps on every railing in San Antonio: measure and confirm code, fabricate the rail in the shop, weld and finish the steel, then install and anchor on site. We confirm heights and mounting with you up front so the finished railing is solid, safe, and inspection-ready.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Measure &amp; confirm code</b>
        <span>We measure the stair, ramp, or opening on site and confirm the code-compliant height and mounting your San Antonio project requires.</span>
      </li>
      <li>
        <b>Fabricate the rail</b>
        <span>We cut posts, rails, and pickets to size and fit the railing in the shop so it matches the exact rise, run, and layout.</span>
      </li>
      <li>
        <b>Weld &amp; finish the steel</b>
        <span>Certified welders join every connection with MIG, TIG, stick, or flux-cored welds, then grind the joints smooth and prep for coating.</span>
      </li>
      <li>
        <b>Install &amp; anchor on site</b>
        <span>We set the railing, anchor the posts solid, and confirm it holds a firm push before we leave your San Antonio property.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to railing kits">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>What sets AGA&rsquo;s <span class="text-accent">railings</span> apart in San Antonio?</h2>
    </div>
    <p class="answer-block">The difference is welded strength and a proper fit. AGA Welding &amp; Fabrication fabricates each railing to your measurements and welds it solid, while bolt-together kits and big-box rails come in fixed sizes, work loose over time, and rarely match a San Antonio stair or ramp exactly.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-3 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA Welding &amp; Fabrication</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Fabricated to your exact measurements</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Welded connections that stay tight</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Built to code-compliant heights</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Measured and installed by one local team</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Typical alternative</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Fixed-size kits that rarely fit right</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Bolted joints that work loose over time</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> No guarantee of code-compliant height</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> You measure, buy, and install yourself</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK ============================ -->
<section class="section section--light sp-gallery" id="recent-work" aria-label="Recent steel fabrication work from the AGA shop">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What kind of <span class="text-accent">steel work</span> comes out of the AGA shop?</h2>
    </div>
    <p class="answer-block">The photos below show recent fabrication from the AGA Welding &amp; Fabrication shop in San Antonio &mdash; welded steel stands, custom assemblies, and structural framing. They are not finished railings, but they show the same certified welding and clean steelwork we bring to every San Antonio handrail and guardrail.</p>

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
<section class="section" aria-label="Handrails and railings FAQs">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">FAQ</span>
      <h2>What do San Antonio clients ask about <span class="text-accent">handrails and railings</span>?</h2>
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
      <h2>What related <span class="text-accent">metalwork</span> might your railing project need?</h2>
    </div>
    <div class="services-grid" style="grid-template-columns:repeat(3,1fr);">
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/related-services.php'; ?>
    </div>
  </div>
</section>

<!-- ============================ FINAL CTA ============================ -->
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a handrails and railings estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Ready for a custom steel railing in San Antonio?</h2>
      <p>Send AGA Welding &amp; Fabrication your stair, ramp, or balcony details and we&rsquo;ll follow up the same day to schedule a measure and a clear, itemized estimate. Every railing is welded to code and built to fit your San Antonio property.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
