<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Service page — Steel Fabrication | AGA Welding & Fabrication (Phase 4)
 * ------------------------------------------------------------------------- */
$pageType    = 'service';
$serviceSlug = 'steel-fabrication';
$currentPage = 'services';

/* Pull this service from config */
$svc = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $svc = $s; break; } }

$pageTitle       = 'Steel Fabrication San Antonio, TX | ' . $siteName;
$pageDescription = 'Precision steel fabrication in San Antonio, TX. AGA Welding & Fabrication cuts, forms, welds and assembles structural and custom steel for commercial and industrial jobs. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/steel-fabrication/';
$ogImage         = $siteUrl . '/assets/images/structural-steel-beams.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'structural-steel-beams';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Recent-work photos for this service (real shop photos) */
$spGallery = [
    ['img' => 'custom-steel-fabrication', 'cap' => 'Custom steel assembly taking shape on the AGA shop floor in San Antonio'],
    ['img' => 'steel-beam-fabrication',   'cap' => 'Long-span steel beams being fabricated to spec'],
    ['img' => 'fabricated-steel-columns', 'cap' => 'Finished fabricated steel columns staged for delivery'],
];

/* FAQs — unique to steel fabrication in San Antonio */
$faqs = [
    [
        'q' => 'How much does steel fabrication cost in San Antonio?',
        'a' => 'Most steel fabrication in San Antonio is priced by material weight, complexity, and finish, so a small bracket run differs sharply from a structural package. AGA Welding & Fabrication quotes from your drawings or a shop measure and gives a clear, itemized estimate before any steel is cut.',
    ],
    [
        'q' => 'How long does a steel fabrication project take?',
        'a' => 'Turnaround depends on scope, material availability, and finishing. AGA Welding & Fabrication sets a realistic schedule at the quote stage — small jobs often ship in days, larger structural packages in weeks — and rush service is available when a San Antonio deadline cannot move.',
    ],
    [
        'q' => 'Can you fabricate steel from my own drawings or shop plans?',
        'a' => 'Yes. AGA Welding & Fabrication works directly from your blueprints, CAD files, or shop drawings, and can also develop the details in-house if you only have a concept. We confirm dimensions and material specs before cutting so the finished steel fits the first time.',
    ],
    [
        'q' => 'What types of steel and metal do you fabricate?',
        'a' => 'AGA Welding & Fabrication fabricates carbon steel, stainless, and aluminum in plate, bar, tube, angle, and structural shapes. Whether you need light gauge brackets or heavy structural members, our San Antonio shop handles the cutting, forming, welding, and assembly under one roof.',
    ],
];

/* Schema */
$serviceSchema = generateServiceSchema($svc, $canonicalUrl);
$faqSchema     = generateFAQSchema($faqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',     'url' => $siteUrl . '/'],
    ['name' => 'Services', 'url' => $siteUrl . '/services/'],
    ['name' => 'Steel Fabrication', 'url' => $canonicalUrl],
]);

/* "Other services" — 3 related, excluding this one */
$relatedSlugs = ['structural-steel-fabrication', 'metal-cutting', 'custom-metalwork'];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="Steel fabrication in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Fabricated structural steel I-beams stacked at the AGA Welding & Fabrication shop in San Antonio, TX"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Steel Fabrication &middot; San Antonio, TX</span>
        <h1 class="hero-title">Steel Fabrication in <span class="text-accent">San Antonio</span> Built to Spec</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication is a San Antonio steel fabrication shop that cuts, forms, welds, and assembles structural and custom steel for commercial and industrial clients &mdash; working from your drawings and delivering finished, code-ready steel.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('shield-check', 18); ?> Licensed &amp; insured</li>
          <li><?php echo icon('layers', 18); ?> Structural &amp; custom steel</li>
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
              <option value="Steel Fabrication">Steel Fabrication</option>
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
  <span>Steel Fabrication</span>
</nav>

<!-- ============================ SERVICE DETAIL / ANSWER-FIRST ============================ -->
<section class="section" aria-label="Steel fabrication overview">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What does <span class="text-accent">steel fabrication in San Antonio</span> actually include?</h2>
    </div>
    <p class="answer-block">Steel fabrication is the full process of turning raw steel into a finished, ready-to-install component &mdash; cutting, forming, welding, and assembling to your specifications. AGA Welding &amp; Fabrication handles every step in our San Antonio shop, so your beams, frames, brackets, and custom assemblies come off one floor, built to spec and inspection-ready.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>For four decades, AGA Welding &amp; Fabrication has fabricated steel for San Antonio&rsquo;s builders, plant managers, and property owners &mdash; the kind of work that has to fit exact dimensions, carry real loads, and pass inspection. We start from your blueprints, CAD files, or a shop measure, confirm the material specs, then cut and form the steel to size before a single weld is laid.</p>
        <p>Our certified welders join carbon steel, stainless, and aluminum using MIG, TIG, stick, and flux-cored processes, matching the procedure to the material and the load. From there we assemble multi-part structures, grind and finish the welds, and prep for coating or galvanizing so the finished steel arrives at your San Antonio job site ready to set.</p>
        <p>Because everything happens under one roof on Gardner Rd &mdash; cutting, bending, welding, assembly, and finishing &mdash; there is no shuffling your project between vendors. That keeps tolerances tight, timelines short, and accountability with one San Antonio shop from quote to delivery.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When you need steel fabrication">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When should you call a <span class="text-accent">steel fabricator</span> instead of buying off the shelf?</h2>
    </div>
    <p class="answer-block">Call a fabricator when stock parts do not fit, will not carry the load, or do not exist for your application. AGA Welding &amp; Fabrication builds to your exact dimensions when off-the-shelf steel falls short &mdash; here are the situations San Antonio clients bring us most.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('ruler', 22); ?></div>
        <h3>Nothing fits your dimensions</h3>
        <p>Odd spans, custom heights, or tight clearances mean stock steel will not work &mdash; a fabricated part is built to your measurement.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('layers', 22); ?></div>
        <h3>The load demands real engineering</h3>
        <p>When a beam, frame, or support has to carry weight safely, it needs the right shape, grade, and welds &mdash; not a bolt-together guess.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('hammer', 22); ?></div>
        <h3>You need it to match existing steel</h3>
        <p>Tying into an existing structure or matching a run of parts calls for repeatable, precise fabrication that keeps everything consistent.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section" aria-label="Why choose AGA for steel fabrication">
  <div class="container">
    <div class="split" style="display:grid; grid-template-columns:1fr 1fr; gap:clamp(2rem,5vw,4rem); align-items:center;">
      <div class="reveal-left">
        <span class="big-number">43</span>
        <p class="lead" style="margin-top:.5rem;">years fabricating steel in San Antonio &mdash; a family-run shop that has built for local contractors, plants, and property owners since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why does San Antonio trust AGA for <span class="text-accent">steel fabrication</span>?</h2>
        <ul class="service-card-with-image" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Certified welders, in-house.</strong> Every joint is laid by a certified welder using the correct procedure for the metal and load &mdash; no subcontracting your critical welds.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('layers', 22); ?><span><strong>One shop, every step.</strong> Cutting, forming, welding, assembly, and finishing all happen on Gardner Rd, so tolerances stay tight and the schedule stays yours.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>Delivered ready to set.</strong> We finish and prep your steel for coating or install, then deliver to your San Antonio site &mdash; or bring mobile welding for on-site work.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="Our steel fabrication process">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">How It Works</span>
      <h2>How does the <span class="text-accent">fabrication process</span> work at AGA?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication follows a four-step process on every steel job in San Antonio: consult and quote, detail and material selection, cut-weld-fabricate, then finish and deliver. Each step is confirmed with you so the finished steel fits and passes inspection the first time.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Consult &amp; quote</b>
        <span>We review your drawings or measure the job, confirm scope, and give you a clear, itemized estimate before any steel is ordered.</span>
      </li>
      <li>
        <b>Detail &amp; material selection</b>
        <span>We finalize dimensions, steel grade, and shapes so the piece meets code and fits the surrounding structure.</span>
      </li>
      <li>
        <b>Cut, weld &amp; fabricate</b>
        <span>Certified welders cut, form, and join the steel in-house using MIG, TIG, stick, and flux-cored processes.</span>
      </li>
      <li>
        <b>Finish &amp; deliver</b>
        <span>We grind and finish the welds, prep for coating, and deliver ready-to-set steel to your San Antonio job site.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to other fabricators">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>What sets AGA apart from other <span class="text-accent">San Antonio steel shops</span>?</h2>
    </div>
    <p class="answer-block">The difference is control and accountability. AGA Welding &amp; Fabrication keeps cutting, welding, assembly, and finishing under one roof with certified welders, while many shops split the work or subcontract the welds &mdash; adding hand-offs, delays, and quality gaps.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-3 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA Welding &amp; Fabrication</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Certified welders on every joint, in-house</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Cut, form, weld, assemble &amp; finish on one floor</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Itemized estimate before any steel is cut</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Delivery and mobile welding across San Antonio</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Typical alternative</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Critical welds subcontracted out of house</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Work split across vendors, adding hand-offs</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Vague pricing that shifts mid-project</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> You coordinate delivery and installation</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK ============================ -->
<section class="section section--light sp-gallery" id="recent-work" aria-label="Recent steel fabrication work">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What steel has AGA <span class="text-accent">fabricated recently</span>?</h2>
    </div>
    <p class="answer-block">Recent steel fabrication out of our San Antonio shop &mdash; structural members, custom assemblies, and finished columns built from raw stock. Every piece below was cut, welded, and assembled in-house by AGA Welding &amp; Fabrication.</p>

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
<section class="section" aria-label="Steel fabrication FAQs">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">FAQ</span>
      <h2>What do San Antonio clients ask about <span class="text-accent">steel fabrication</span>?</h2>
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
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a steel fabrication estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Ready to get your steel fabricated in San Antonio?</h2>
      <p>Send AGA Welding &amp; Fabrication your drawings or project details and we&rsquo;ll follow up the same day with a clear, itemized estimate. Rush service is available when your deadline can&rsquo;t wait.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
