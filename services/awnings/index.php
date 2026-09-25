<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Service page — Awnings | AGA Welding & Fabrication (Phase 4)
 * ------------------------------------------------------------------------- */
$pageType    = 'service';
$serviceSlug = 'awnings';
$currentPage = 'services';

/* Pull this service from config */
$svc = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $svc = $s; break; } }

$pageTitle       = 'Custom Steel Awnings San Antonio, TX | ' . $siteName;
$pageDescription = 'Custom steel awning fabrication in San Antonio, TX. AGA Welding & Fabrication welds storefront awnings, patio covers, and canopies built for Texas weather. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/awnings/';
$ogImage         = $siteUrl . '/assets/images/structural-steel-delivery.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'structural-steel-frame';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Recent-work photos for this service (real shop photos) */
$spGallery = [
    ['img' => 'custom-steel-fabrication', 'cap' => 'Custom steel fabrication in progress at the AGA San Antonio shop'],
    ['img' => 'welded-steel-stands',      'cap' => 'Welded steel stands built in-house — the same frame-and-bracket work behind an awning structure'],
    ['img' => 'structural-steel-beams',   'cap' => 'Fabricated structural steel beams staged at the AGA shop, showing the load-bearing members used in canopy frames'],
];

/* FAQs — unique to awnings in San Antonio */
$faqs = [
    [
        'q' => 'How much does a custom steel awning cost in San Antonio?',
        'a' => 'Awning pricing depends on the span, steel gauge, and covering material, so a small door canopy differs sharply from a full storefront awning. AGA Welding & Fabrication measures your building or reviews your drawings and gives a clear, itemized estimate before any steel is cut.',
    ],
    [
        'q' => 'How long does it take to fabricate a steel awning frame?',
        'a' => 'Most door canopies and small patio covers ship within a week or two; larger storefront awning frames take longer depending on span and finish. AGA Welding & Fabrication sets a realistic schedule at the quote stage and offers rush service when a San Antonio deadline can\'t move.',
    ],
    [
        'q' => 'Will a welded steel awning frame hold up to San Antonio storms?',
        'a' => 'Yes. AGA Welding & Fabrication sizes the frame members and welds to the span and wind load your awning will face, which is why a welded steel frame outlasts a bolted-together aluminum or fabric-only kit through San Antonio\'s storm season.',
    ],
    [
        'q' => 'Do you handle installation or just build the frame?',
        'a' => 'Both. AGA Welding & Fabrication delivers awning frames ready to mount, and our mobile welding crew handles on-site attachment and final welds when a project needs installation at your San Antonio location rather than shop pickup.',
    ],
];

/* Schema */
$serviceSchema = generateServiceSchema($svc, $canonicalUrl);
$faqSchema     = generateFAQSchema($faqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',     'url' => $siteUrl . '/'],
    ['name' => 'Services', 'url' => $siteUrl . '/services/'],
    ['name' => 'Awnings', 'url' => $canonicalUrl],
]);

/* "Other services" — 3 related, excluding this one */
$relatedSlugs = ['custom-metalwork', 'handrails-railings', 'racks-storage-solutions'];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="Custom steel awnings in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Welded structural steel framework fabricated at the AGA Welding &amp; Fabrication shop in San Antonio, TX"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Custom Steel Awnings &amp; Canopies &middot; San Antonio, TX</span>
        <h1 class="hero-title">Custom Metal Awnings Built for <span class="text-accent">San Antonio</span> Weather</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication designs and welds custom steel awning frames in San Antonio &mdash; storefront awnings, patio covers, walkway canopies, and door canopies built to shed Texas sun and rain. Every frame is fabricated in-house and delivered ready to install for commercial and residential properties.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('umbrella', 18); ?> Storefront &amp; patio awnings</li>
          <li><?php echo icon('sun', 18); ?> Built for Texas sun &amp; rain</li>
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
              <option value="Awnings">Awnings</option>
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
  <span>Awnings</span>
</nav>

<!-- ============================ SERVICE DETAIL / ANSWER-FIRST ============================ -->
<section class="section" aria-label="Custom steel awning overview">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What does <span class="text-accent">custom steel awning fabrication</span> include in San Antonio?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication builds custom metal awnings from raw steel to a finished, weld-ready frame &mdash; cutting, forming, welding, and finishing storefront awnings, patio covers, and door canopies to your exact dimensions. Every frame is fabricated in our San Antonio shop and delivered ready to mount.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>San Antonio&rsquo;s sun and sudden storms put real stress on an awning frame, which is why AGA Welding &amp; Fabrication builds ours from welded steel instead of lightweight stock kits. We start from your building&rsquo;s dimensions or a shop measure, size the frame to the span, and confirm attachment points before a single piece is cut.</p>
        <p>Our certified welders join the frame members with MIG, TIG, stick, or flux-cored processes depending on the steel and the wind load the awning has to carry. Storefront awnings, patio and walkway covers, and door canopies all come off the same San Antonio shop floor, built as one rigid frame rather than bolted-together tubing.</p>
        <p>Because cutting, forming, welding, and finishing all happen under one roof on Gardner Rd, your awning frame arrives square, true, and ready for fabric, metal panel, or polycarbonate covering. We deliver to your San Antonio site or send a mobile welding crew for on-site attachment.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When you need a welded steel awning">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When should a San Antonio business choose a <span class="text-accent">welded steel awning</span> over a fabric kit?</h2>
    </div>
    <p class="answer-block">Choose a welded steel frame when a stock aluminum or fabric awning kit won&rsquo;t span your storefront, survive San Antonio wind, or match your building&rsquo;s look. AGA Welding &amp; Fabrication builds to your exact span and load when off-the-shelf awnings fall short.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('ruler', 22); ?></div>
        <h3>Your span exceeds stock kit sizes</h3>
        <p>Wide storefronts or long walkway runs need a custom-length frame &mdash; stock awning kits stop at standard widths.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('layers', 22); ?></div>
        <h3>Built to handle San Antonio wind and sun</h3>
        <p>A welded, multi-member steel frame handles San Antonio wind gusts and summer heat better than lightweight aluminum or fabric-only kits.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('hammer', 22); ?></div>
        <h3>You need it to match your building</h3>
        <p>A custom frame can match your storefront&rsquo;s color, mounting points, and roofline instead of a generic bolt-on kit.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section" aria-label="Why choose AGA for custom steel awnings">
  <div class="container">
    <div class="split" style="display:grid; grid-template-columns:1fr 1fr; gap:clamp(2rem,5vw,4rem); align-items:center;">
      <div class="reveal-left">
        <span class="big-number">43</span>
        <p class="lead" style="margin-top:.5rem;">years fabricating steel in San Antonio &mdash; a family-run shop building awning frames and structural steel for local businesses and homeowners since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why do San Antonio businesses trust AGA for <span class="text-accent">custom steel awnings</span>?</h2>
        <ul class="service-card-with-image" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Certified welders, in-house.</strong> Every frame joint is welded by a certified welder using the right procedure for the steel and the wind load it has to carry.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('layers', 22); ?><span><strong>One shop, every step.</strong> Cutting, forming, welding, assembly, and finishing all happen on Gardner Rd, so your awning frame arrives square and ready to cover.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>Delivered ready to install.</strong> We finish and prep your awning frame for coating or install, then deliver to your San Antonio site &mdash; or bring mobile welding for on-site work.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="Our awning fabrication process">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">How It Works</span>
      <h2>How does AGA build a <span class="text-accent">custom awning frame</span> from quote to install?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication follows a four-step process on every awning project in San Antonio: consult and quote, detail and material selection, cut-weld-fabricate, then finish and deliver. Each dimension is confirmed with you before fabrication so the finished frame fits your building the first time.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Consult &amp; quote</b>
        <span>We review your building&rsquo;s dimensions or measure the site, confirm span and mounting points, and give you a clear, itemized estimate before any steel is ordered.</span>
      </li>
      <li>
        <b>Detail &amp; material selection</b>
        <span>We finalize frame dimensions, steel gauge, and attachment style so the awning fits your building and holds up to San Antonio wind.</span>
      </li>
      <li>
        <b>Cut, weld &amp; fabricate</b>
        <span>Certified welders cut, form, and join the frame in-house using MIG, TIG, stick, or flux-cored welding processes.</span>
      </li>
      <li>
        <b>Finish &amp; deliver</b>
        <span>We grind and finish every weld, prep for coating, and deliver a ready-to-mount awning frame to your San Antonio job site.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to other awning fabricators">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>What sets AGA apart from other <span class="text-accent">San Antonio awning fabricators</span>?</h2>
    </div>
    <p class="answer-block">The difference is a welded steel frame built in-house, not a bolted-together kit shipped from a catalog. AGA Welding &amp; Fabrication keeps cutting, welding, assembly, and finishing under one roof with certified welders, so your awning is sized and built for your building.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-3 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA Welding &amp; Fabrication</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Certified welders on every frame joint, in-house</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Cut, form, weld, assemble &amp; finish on one floor</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Frame sized to your exact span, not a catalog size</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Delivery and mobile welding across San Antonio</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Typical alternative</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Stock kit sizes that may not fit your span</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Lightweight aluminum or fabric-only construction</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Vague pricing that shifts mid-project</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> You coordinate delivery and installation</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK ============================ -->
<section class="section section--light sp-gallery" id="recent-work" aria-label="Recent awning fabrication work">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What steel awning frames has AGA <span class="text-accent">fabricated recently</span>?</h2>
    </div>
    <p class="answer-block">Recent awning frame fabrication out of our San Antonio shop &mdash; welded steel frames and supports built from raw stock and staged for delivery. Every piece below was cut, welded, and assembled in-house by AGA Welding &amp; Fabrication.</p>

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
<section class="section" aria-label="Awning FAQs">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">FAQ</span>
      <h2>What do people ask about <span class="text-accent">custom steel awnings in San Antonio</span>?</h2>
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
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request an awning fabrication estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Ready to get your awning frame fabricated in San Antonio?</h2>
      <p>Send AGA Welding &amp; Fabrication your building dimensions or awning drawings and we&rsquo;ll follow up the same day with a clear, itemized estimate. Rush service is available when your deadline can&rsquo;t wait.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
