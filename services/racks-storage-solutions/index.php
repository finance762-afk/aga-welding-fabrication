<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Service page — Racks & Storage Solutions | AGA Welding & Fabrication (Phase 4)
 * ------------------------------------------------------------------------- */
$pageType    = 'service';
$serviceSlug = 'racks-storage-solutions';
$currentPage = 'services';

/* Pull this service from config */
$svc = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $svc = $s; break; } }

$pageTitle       = 'Custom Steel Racks & Storage Solutions San Antonio, TX | ' . $siteName;
$pageDescription = 'Custom steel storage racks in San Antonio, TX. AGA Welding & Fabrication welds pallet racks, cantilever racks, and shelving for warehouses in-house. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/racks-storage-solutions/';
$ogImage         = $siteUrl . '/assets/images/welded-steel-stands.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'welded-steel-stands';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Recent-work photos for this service (real shop photos) */
$spGallery = [
    ['img' => 'fabricated-steel-columns', 'cap' => 'Fabricated steel columns built at the AGA San Antonio shop — the same upright-and-support work behind a storage rack'],
    ['img' => 'structural-steel-beams',   'cap' => 'Fabricated structural steel beams staged at the shop, showing the load-bearing members used in pallet racking'],
    ['img' => 'custom-steel-fabrication', 'cap' => 'Custom steel fabrication in progress on the AGA shop floor'],
];

/* FAQs — unique to racks & storage solutions in San Antonio */
$faqs = [
    [
        'q' => 'How much do custom steel storage racks cost in San Antonio?',
        'a' => 'Rack pricing depends on bay count, load rating, and upright height, so a small shelving run differs sharply from a full pallet racking system. AGA Welding & Fabrication measures your space or reviews your layout and gives a clear, itemized estimate before any steel is cut.',
    ],
    [
        'q' => 'How long does it take to fabricate a custom racking system?',
        'a' => 'Small shelving and cantilever runs often ship in a week or two; full warehouse racking systems take longer depending on bay count and finish. AGA Welding & Fabrication sets a realistic schedule at the quote stage and offers rush service when a San Antonio deadline can\'t move.',
    ],
    [
        'q' => 'Can you build racks to fit an odd warehouse layout?',
        'a' => 'Yes. AGA Welding & Fabrication measures your actual column spacing, ceiling height, and aisle clearance, then welds the uprights and beams to fit — no forcing a standard bay width into a non-standard San Antonio facility.',
    ],
    [
        'q' => 'Do you install the racks or just fabricate them?',
        'a' => 'Both. AGA Welding & Fabrication delivers racks ready to anchor, and our mobile welding crew handles on-site assembly and final welds when a project needs installation at your San Antonio warehouse rather than shop pickup.',
    ],
];

/* Schema */
$serviceSchema = generateServiceSchema($svc, $canonicalUrl);
$faqSchema     = generateFAQSchema($faqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',     'url' => $siteUrl . '/'],
    ['name' => 'Services', 'url' => $siteUrl . '/services/'],
    ['name' => 'Racks & Storage Solutions', 'url' => $canonicalUrl],
]);

/* "Other services" — 3 related, excluding this one */
$relatedSlugs = ['custom-metalwork', 'metal-assembly', 'steel-fabrication'];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="Custom steel storage racks in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Heavy-duty welded steel stands fabricated at the AGA Welding &amp; Fabrication shop in San Antonio, TX"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Custom Racks &amp; Storage Solutions &middot; San Antonio, TX</span>
        <h1 class="hero-title">Heavy-Duty Steel Storage Racks Built for <span class="text-accent">San Antonio</span> Warehouses</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication designs and welds custom steel storage racks in San Antonio &mdash; pallet racks, cantilever racks, shelving, and material-handling frames built to your load and footprint. Every rack is fabricated in-house and delivered ready to install for warehouses, shops, and industrial facilities.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('layers', 18); ?> Pallet, cantilever &amp; shelving racks</li>
          <li><?php echo icon('hammer', 18); ?> Heavy-duty welded construction</li>
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
              <option value="Racks & Storage Solutions">Racks &amp; Storage Solutions</option>
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
  <span>Racks &amp; Storage Solutions</span>
</nav>

<!-- ============================ SERVICE DETAIL / ANSWER-FIRST ============================ -->
<section class="section" aria-label="Custom steel storage rack overview">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What does <span class="text-accent">custom steel rack fabrication</span> include in San Antonio?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication builds storage racks from raw steel stock to a finished, load-rated frame &mdash; cutting, forming, welding, and assembling pallet racks, cantilever racks, and shelving to your warehouse&rsquo;s footprint. Every rack is fabricated in our San Antonio shop and delivered ready to bolt down.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>A warehouse floor plan is rarely a standard grid, which is why AGA Welding &amp; Fabrication builds racks to your actual footprint instead of a catalog size. We start from your facility&rsquo;s dimensions or a shop measure, confirm the load each bay has to carry, then cut and form the steel to size.</p>
        <p>Our certified welders join the uprights, braces, and load beams with MIG, TIG, stick, or flux-cored processes matched to the steel grade and the weight the rack will carry. Pallet racks, cantilever racks, shelving units, and material-handling frames all come off the same San Antonio shop floor, welded as complete, load-rated assemblies.</p>
        <p>Because cutting, forming, welding, and finishing happen under one roof on Gardner Rd, your racking system arrives square and ready to anchor to the slab. We deliver to your San Antonio warehouse or shop, or send a mobile welding crew for on-site assembly.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When you need welded steel racks">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When should a San Antonio facility choose <span class="text-accent">welded steel racks</span> over bolt-together shelving?</h2>
    </div>
    <p class="answer-block">Choose welded steel racking when your load exceeds bolt-together shelving ratings, your footprint doesn&rsquo;t match standard rack widths, or your material-handling equipment needs a custom clearance. AGA Welding &amp; Fabrication builds to your exact load and layout when off-the-shelf racking falls short.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('ruler', 22); ?></div>
        <h3>Your footprint doesn&rsquo;t match standard bays</h3>
        <p>Odd column spacing, low ceilings, or narrow aisles mean stock racking won&rsquo;t fit &mdash; a welded frame is built to your actual layout.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('layers', 22); ?></div>
        <h3>The load exceeds shelf-kit ratings</h3>
        <p>Heavy pallets, coils, or long stock need a rack engineered for the real weight, not a bolt-together shelf rated for light duty.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('hammer', 22); ?></div>
        <h3>You need it to match existing racking</h3>
        <p>Expanding a warehouse or matching an existing racking run calls for repeatable, precise fabrication that keeps bay heights consistent.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section" aria-label="Why choose AGA for custom steel racks">
  <div class="container">
    <div class="split" style="display:grid; grid-template-columns:1fr 1fr; gap:clamp(2rem,5vw,4rem); align-items:center;">
      <div class="reveal-left">
        <span class="big-number">43</span>
        <p class="lead" style="margin-top:.5rem;">years fabricating steel in San Antonio &mdash; a family-run shop building racks and structural steel for local warehouses and shops since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why do San Antonio facilities trust AGA for <span class="text-accent">custom storage racks</span>?</h2>
        <ul class="service-card-with-image" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Certified welders, in-house.</strong> Every upright and load beam weld is laid by a certified welder using the right procedure for the steel grade and the load it carries.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('layers', 22); ?><span><strong>One shop, every step.</strong> Cutting, forming, welding, assembly, and finishing all happen on Gardner Rd, so your racking system arrives as one consistent, load-rated build.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>Delivered ready to install.</strong> We finish and prep your racks for coating or install, then deliver to your San Antonio facility &mdash; or bring mobile welding for on-site assembly.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="Our rack fabrication process">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">How It Works</span>
      <h2>How does AGA build <span class="text-accent">custom storage racks</span> from quote to install?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication follows a four-step process on every racking project in San Antonio: consult and quote, detail and layout, cut-weld-fabricate, then finish and deliver. Each bay dimension and load rating is confirmed with you before fabrication so the finished racks fit your floor plan the first time.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Consult &amp; quote</b>
        <span>We review your warehouse layout or measure the space, confirm load requirements, and give you a clear, itemized estimate before any steel is ordered.</span>
      </li>
      <li>
        <b>Detail &amp; layout</b>
        <span>We finalize bay widths, upright heights, and beam spacing so the racking fits your footprint and clears your material-handling equipment.</span>
      </li>
      <li>
        <b>Cut, weld &amp; fabricate</b>
        <span>Certified welders cut, form, and join the uprights, braces, and load beams in-house using MIG, TIG, stick, or flux-cored welding.</span>
      </li>
      <li>
        <b>Finish &amp; deliver</b>
        <span>We grind and finish every weld, prep for coating, and deliver ready-to-anchor racks to your San Antonio facility.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to other rack fabricators">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>What sets AGA apart from other <span class="text-accent">San Antonio rack fabricators</span>?</h2>
    </div>
    <p class="answer-block">The difference is a rack welded to your real load and footprint, not a bolt-together kit rated for generic duty. AGA Welding &amp; Fabrication keeps cutting, welding, assembly, and finishing under one roof with certified welders, so your racking is built for what it will actually carry.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-3 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA Welding &amp; Fabrication</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Certified welders on every load-bearing joint, in-house</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Cut, form, weld, assemble &amp; finish on one floor</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Racking sized to your load and footprint, not a kit</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Delivery and mobile welding across San Antonio</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Typical alternative</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Bolt-together kits rated for generic light duty</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Standard bay widths that may not fit your space</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Vague pricing that shifts mid-project</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> You coordinate delivery and installation</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK ============================ -->
<section class="section section--light sp-gallery" id="recent-work" aria-label="Recent rack fabrication work">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What steel racks has AGA <span class="text-accent">fabricated recently</span>?</h2>
    </div>
    <p class="answer-block">Recent racking and storage fabrication out of our San Antonio shop &mdash; welded uprights and assemblies built from raw stock and staged for delivery. Every piece below was cut, welded, and assembled in-house by AGA Welding &amp; Fabrication.</p>

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
<section class="section" aria-label="Racks & storage FAQs">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">FAQ</span>
      <h2>What do clients ask about <span class="text-accent">custom steel racks in San Antonio</span>?</h2>
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
      <?php
      $rTint = 1;
      foreach ($relatedSlugs as $rslug):
          $rsvc = null;
          foreach ($services as $s) { if ($s['slug'] === $rslug) { $rsvc = $s; break; } }
          if (!$rsvc) continue;
      ?>
      <article class="service-card-with-image card-tint-<?php echo $rTint; ?> reveal-up reveal-delay-<?php echo $rTint; ?>">
        <div class="service-card__body">
          <h3><?php echo htmlspecialchars($rsvc['name']); ?></h3>
          <p class="service-card__desc"><?php echo htmlspecialchars($rsvc['description']); ?></p>
          <a href="/services/<?php echo $rsvc['slug']; ?>/" class="service-card__cta">Learn more</a>
        </div>
      </article>
      <?php $rTint++; endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================ FINAL CTA ============================ -->
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a racking fabrication estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Ready to get your storage racks fabricated in San Antonio?</h2>
      <p>Send AGA Welding &amp; Fabrication your warehouse layout or load requirements and we&rsquo;ll follow up the same day with a clear, itemized estimate. Rush service is available when your deadline can&rsquo;t wait.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
