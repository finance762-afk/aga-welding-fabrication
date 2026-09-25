<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Service page — Staircases | AGA Welding & Fabrication (Phase 4)
 * ------------------------------------------------------------------------- */
$pageType    = 'service';
$serviceSlug = 'staircases';
$currentPage = 'services';

/* Pull this service from config */
$svc = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $svc = $s; break; } }

$pageTitle       = 'Custom Steel Staircases San Antonio, TX | ' . $siteName;
$pageDescription = 'Custom steel staircase fabrication in San Antonio, TX. AGA Welding & Fabrication builds code-compliant stringers, treads, and egress stairs in-house. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/staircases/';
$ogImage         = $siteUrl . '/assets/images/structural-steel-frame.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'structural-steel-frame';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Recent-work photos for this service (real shop photos) */
$spGallery = [
    ['img' => 'fabricated-steel-columns', 'cap' => 'Fabricated steel columns built at the AGA San Antonio shop — the same stringer-and-support work behind a steel staircase'],
    ['img' => 'custom-steel-fabrication', 'cap' => 'Custom steel fabrication in progress on the AGA shop floor'],
    ['img' => 'welded-steel-stands',      'cap' => 'Welded steel stands fabricated in-house, showing the load-bearing joinery used on stair frames'],
];

/* FAQs — unique to staircases in San Antonio */
$faqs = [
    [
        'q' => 'How much does a custom steel staircase cost in San Antonio?',
        'a' => 'Staircase pricing depends on the number of stringers, total rise, tread material, and railing style, so a short interior stair differs sharply from a multi-level egress stair. AGA Welding & Fabrication measures your stairwell or reviews your drawings and gives a clear, itemized estimate before fabrication starts.',
    ],
    [
        'q' => 'How long does it take to fabricate and install a steel staircase?',
        'a' => 'Most straight-run stairs ship in one to two weeks once the design is confirmed; switchback and spiral stairs or multi-level egress stairs take longer. AGA Welding & Fabrication sets a realistic schedule at the quote stage and offers rush turnaround when a San Antonio deadline can\'t move.',
    ],
    [
        'q' => 'Can you build a staircase to meet San Antonio commercial egress code?',
        'a' => 'Yes. AGA Welding & Fabrication fabricates stringers, tread depth, rise height, and landing dimensions to the code your inspector will check, whether it\'s a warehouse egress stair or a multi-tenant commercial building. We confirm the specs with you before cutting any steel.',
    ],
    [
        'q' => 'Do you install the staircase or just fabricate it?',
        'a' => 'We do both. AGA Welding & Fabrication delivers finished staircases ready to bolt down, and our mobile welding crew handles on-site fit-up and final welds when a project needs installation in San Antonio rather than shop pickup.',
    ],
];

/* Schema */
$serviceSchema = generateServiceSchema($svc, $canonicalUrl);
$faqSchema     = generateFAQSchema($faqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',     'url' => $siteUrl . '/'],
    ['name' => 'Services', 'url' => $siteUrl . '/services/'],
    ['name' => 'Staircases', 'url' => $canonicalUrl],
]);

/* "Other services" — 3 related, excluding this one */
$relatedSlugs = ['handrails-railings', 'custom-metalwork', 'structural-steel-fabrication'];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="Custom steel staircases in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Custom steel staircase framework fabricated by AGA Welding & Fabrication in San Antonio"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Custom Steel Staircases &middot; San Antonio, TX</span>
        <h1 class="hero-title">Custom Steel Staircases Built for <span class="text-accent">San Antonio</span> Codes</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication designs and fabricates custom steel staircases in San Antonio &mdash; stringers, treads, platforms, and code-compliant egress stairs for commercial, industrial, and residential projects. Every stair is built in-house from your drawings or a shop measure, then delivered and installed ready to bolt down.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('footprints', 18); ?> Straight, switchback &amp; spiral stairs</li>
          <li><?php echo icon('layers', 18); ?> Code-compliant egress stairs</li>
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
              <option value="Staircases">Staircases</option>
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
  <span>Staircases</span>
</nav>

<!-- ============================ SERVICE DETAIL / ANSWER-FIRST ============================ -->
<section class="section" aria-label="Custom steel staircase overview">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What does <span class="text-accent">custom steel staircase fabrication</span> involve in San Antonio?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication designs, cuts, and welds custom steel staircases from raw stock to a finished, code-ready structure &mdash; stringers, treads, landings, and railings built to your exact rise and run. Every staircase is fabricated in our San Antonio shop and delivered ready to install, whether it&rsquo;s a straight commercial run or a tight residential spiral.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>AGA Welding &amp; Fabrication has fabricated steel for San Antonio for four decades, and staircases are some of the most exacting work that leaves our Gardner Rd shop &mdash; every rise, run, and landing has to match code and carry real foot traffic. We start from architectural drawings or a job-site measure, confirm stringer spacing and tread depth, then cut and form the steel before a single weld goes down.</p>
        <p>Our certified welders join the stringers, treads, and platform framing with MIG, TIG, stick, or flux-cored processes depending on the steel grade and the load the stair carries. Straight runs, switchback stairs, spiral stairs, and multi-level egress stairs all come off the same San Antonio shop floor, built as one coordinated assembly instead of pieced together on site.</p>
        <p>Because AGA cuts, forms, welds, and finishes staircases under one roof in southeast San Antonio, tolerances stay tight from the first stringer to the last handrail bracket. We deliver the finished stair to your San Antonio job site &mdash; or send a mobile welding crew for on-site fit-up and install.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When you need a custom steel staircase">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When does a building need a <span class="text-accent">custom steel staircase</span> instead of a stock unit?</h2>
    </div>
    <p class="answer-block">Call AGA Welding &amp; Fabrication when a prefabricated stair kit won&rsquo;t clear your floor-to-floor height, meet egress code, or fit an odd footprint. We build staircases to your exact dimensions when off-the-shelf options fall short &mdash; these are the situations San Antonio property owners and contractors bring us most.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('ruler', 22); ?></div>
        <h3>Your rise and run don&rsquo;t match stock kits</h3>
        <p>Non-standard floor-to-floor heights or tight stairwells mean a boxed staircase won&rsquo;t fit &mdash; a custom stringer is cut to your exact measurement.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('layers', 22); ?></div>
        <h3>The stair has to pass egress inspection</h3>
        <p>Commercial and industrial stairs must meet code for tread depth, rise height, and landing size &mdash; we fabricate to the numbers your inspector will check.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('hammer', 22); ?></div>
        <h3>You need it to match existing steel</h3>
        <p>Tying a new stair into an existing structure or matching a run across multiple levels calls for precise, repeatable fabrication.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section" aria-label="Why choose AGA for custom steel staircases">
  <div class="container">
    <div class="split" style="display:grid; grid-template-columns:1fr 1fr; gap:clamp(2rem,5vw,4rem); align-items:center;">
      <div class="reveal-left">
        <span class="big-number">43</span>
        <p class="lead" style="margin-top:.5rem;">years fabricating steel in San Antonio &mdash; a family-run shop building staircases and structural steel for local contractors and property owners since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why do San Antonio builders trust AGA for <span class="text-accent">custom steel staircases</span>?</h2>
        <ul class="service-card-with-image" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Certified welders, in-house.</strong> Every stringer weld is laid by a certified welder using the right procedure for the load the stair carries &mdash; no subcontracted structural welds.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('layers', 22); ?><span><strong>One shop, every step.</strong> Cutting, forming, welding, assembly, and finishing all happen on Gardner Rd, so your staircase arrives as one tight, code-ready assembly.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>Delivered ready to set.</strong> We finish and prep your staircase for coating or install, then deliver to your San Antonio site &mdash; or bring a mobile welding crew for on-site fit-up.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="Our staircase fabrication process">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">How It Works</span>
      <h2>How does AGA build a <span class="text-accent">custom staircase</span> from quote to install?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication follows a four-step process on every staircase project in San Antonio: consult and quote, detail and layout, cut-weld-fabricate, then finish and deliver. Each rise, run, and landing is confirmed with you before fabrication so the finished stair fits and passes inspection the first time.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Consult &amp; quote</b>
        <span>We review your drawings or measure the stairwell on site, confirm code requirements, and give you a clear, itemized estimate before any steel is ordered.</span>
      </li>
      <li>
        <b>Detail &amp; layout</b>
        <span>We finalize stringer spacing, tread depth, rise height, and railing layout so the stair meets code and fits the surrounding structure.</span>
      </li>
      <li>
        <b>Cut, weld &amp; fabricate</b>
        <span>Certified welders cut the stringers, form the treads, and join the assembly in-house using MIG, TIG, stick, or flux-cored welding.</span>
      </li>
      <li>
        <b>Finish &amp; deliver</b>
        <span>We grind and finish every weld, prep for coating, and deliver your ready-to-set staircase to your San Antonio job site.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to other stair fabricators">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>What sets AGA apart from other <span class="text-accent">San Antonio stair fabricators</span>?</h2>
    </div>
    <p class="answer-block">The difference is control and accountability. AGA Welding &amp; Fabrication keeps design, cutting, welding, assembly, and finishing under one roof with certified welders, while many shops subcontract the structural welds or split the job across vendors &mdash; adding hand-offs and delays.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-3 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA Welding &amp; Fabrication</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Certified welders on every stringer weld, in-house</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Cut, form, weld, assemble &amp; finish on one floor</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Itemized estimate before any steel is cut</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Delivery and mobile welding across San Antonio</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Typical alternative</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Structural welds subcontracted out of house</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Stringers and railings split across vendors</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Vague pricing that shifts mid-project</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> You coordinate delivery and installation</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK ============================ -->
<section class="section section--light sp-gallery" id="recent-work" aria-label="Recent staircase fabrication work">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What steel staircases has AGA <span class="text-accent">fabricated recently</span>?</h2>
    </div>
    <p class="answer-block">Recent staircase fabrication out of our San Antonio shop &mdash; stringers, treads, and finished stair sections built from raw stock and staged for delivery. Every piece below was cut, welded, and assembled in-house by AGA Welding &amp; Fabrication.</p>

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
<section class="section" aria-label="Staircase FAQs">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">FAQ</span>
      <h2>Common questions about <span class="text-accent">custom steel staircases in San Antonio</span></h2>
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
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a staircase fabrication estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Ready to get your staircase fabricated in San Antonio?</h2>
      <p>Send AGA Welding &amp; Fabrication your stairwell dimensions or drawings and we&rsquo;ll follow up the same day with a clear, itemized estimate. Rush service is available when your deadline can&rsquo;t wait.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
