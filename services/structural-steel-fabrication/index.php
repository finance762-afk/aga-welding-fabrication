<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Service page — Structural Steel Fabrication | AGA Welding & Fabrication (Phase 4)
 * ------------------------------------------------------------------------- */
$pageType    = 'service';
$serviceSlug = 'structural-steel-fabrication';
$currentPage = 'services';

/* Pull this service from config */
$svc = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $svc = $s; break; } }

$pageTitle       = 'Structural Steel Fabrication San Antonio, TX | ' . $siteName;
$pageDescription = 'Structural steel fabrication in San Antonio, TX. AGA Welding & Fabrication builds beams, columns and connections to AISC/AWS D1.1 code. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/structural-steel-fabrication/';
$ogImage         = $siteUrl . '/assets/images/fabricated-steel-columns.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'fabricated-steel-columns';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Recent-work photos for this service (real shop photos) */
$spGallery = [
    ['img' => 'steel-beam-fabrication',    'cap' => 'Long-span structural steel beams being fabricated to spec'],
    ['img' => 'structural-steel-frame',    'cap' => 'Structural steel framework built in-house at AGA'],
    ['img' => 'structural-steel-delivery', 'cap' => 'Fabricated structural steel loaded for a San Antonio job site'],
];

/* FAQs — unique to structural steel fabrication in San Antonio */
$faqs = [
    [
        'q' => 'How much does structural steel fabrication cost in San Antonio?',
        'a' => 'AGA Welding & Fabrication prices structural steel by tonnage, connection complexity, and finish, so a handful of base plates costs far less than a full framing package. We build the estimate from your engineered drawings or a site measure and hand you an itemized number before any San Antonio steel is ordered.',
    ],
    [
        'q' => 'Do you fabricate to AISC and AWS D1.1 standards?',
        'a' => 'Yes. AGA Welding & Fabrication fabricates structural steel to AISC detailing practices and AWS D1.1 welding code, matching member sizes, grades, and connection specs to your engineer\'s stamped drawings so the finished steel clears inspection on your San Antonio job site.',
    ],
    [
        'q' => 'How long does a structural steel package take to fabricate?',
        'a' => 'Timeline tracks tonnage, connection detail, and steel lead time. AGA Welding & Fabrication sets a schedule at the quote stage — a short beam-and-column run can ship in days, a full framing package in a few weeks — and we sequence the work to hit a fixed San Antonio erection date.',
    ],
    [
        'q' => 'Can you handle base plates, moment connections, and heavy framing?',
        'a' => 'Yes. AGA Welding & Fabrication regularly builds base plates, stiffeners, gusset plates, moment connections, and heavy load-bearing framing. Certified welders match the procedure to the member and load, then square and finish each assembly so it sets true on your San Antonio structure.',
    ],
];

/* Schema */
$serviceSchema = generateServiceSchema($svc, $canonicalUrl);
$faqSchema     = generateFAQSchema($faqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',     'url' => $siteUrl . '/'],
    ['name' => 'Services', 'url' => $siteUrl . '/services/'],
    ['name' => 'Structural Steel Fabrication', 'url' => $canonicalUrl],
]);

/* "Other services" — 3 related, excluding this one */
$relatedSlugs = ['steel-fabrication', 'metal-assembly', 'structural-metal-repair'];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="Structural steel fabrication in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Finished fabricated steel columns staged inside the AGA Welding & Fabrication shop in San Antonio, TX"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Structural Steel Fabrication &middot; San Antonio, TX</span>
        <h1 class="hero-title">Structural Steel Fabrication in <span class="text-accent">San Antonio</span>, Built to Code</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication engineers and welds structural steel &mdash; beams, columns, base plates, and moment connections &mdash; for San Antonio contractors and industrial builders, fabricating straight from stamped engineering drawings to AISC and AWS D1.1 code so every member sets true and clears inspection.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('shield-check', 18); ?> Licensed &amp; insured</li>
          <li><?php echo icon('building-2', 18); ?> Commercial &amp; industrial builds</li>
          <li><?php echo icon('badge-check', 18); ?> AWS D1.1 certified welders</li>
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
              <option value="Structural Steel Fabrication">Structural Steel Fabrication</option>
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
  <span>Structural Steel Fabrication</span>
</nav>

<!-- ============================ SERVICE DETAIL / ANSWER-FIRST ============================ -->
<section class="section" aria-label="Structural steel fabrication overview">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What does <span class="text-accent">structural steel fabrication in San Antonio</span> involve?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication builds load-bearing structural steel &mdash; beams, columns, girders, base plates, and moment frames &mdash; engineered to AISC and AWS D1.1 standards. Our San Antonio shop cuts, welds, and squares every member from your structural drawings, so it carries its design load and bolts into place without rework.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>Structural steel does not forgive shortcuts &mdash; a beam that is out of square or under-welded shows itself the moment a crane sets it. AGA Welding &amp; Fabrication has fabricated load-bearing steel for San Antonio contractors since 1983, working from stamped engineering drawings so every column, girder, and connection matches its intended load path before it ever leaves our Gardner Rd shop.</p>
        <p>Our certified welders cut each member to length, punch or drill the bolt pattern, fit the connection plate, and weld with the procedure the joint calls for &mdash; flux-cored for heavy structural passes, MIG and stick where the detail fits better. Base plates, stiffeners, gussets, and moment connections are built into the member itself, so nothing is left to field-fit on your San Antonio site.</p>
        <p>Every piece is squared, cleaned, and prepped for primer or galvanizing before it leaves Gardner Rd, and when a connection needs to be finished in the field, our mobile welding rigs handle it on site anywhere in San Antonio. Four decades of structural work means we know what inspectors look for before they arrive.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When you need structural steel fabrication">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When does a project need <span class="text-accent">engineered structural steel</span>?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication supplies engineered structural steel any time a component has to carry real weight safely &mdash; a floor, roof, mezzanine, or piece of heavy equipment. San Antonio contractors bring us these jobs most often, from new framing to additions that tie into an existing building.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('layers', 22); ?></div>
        <h3>You're framing a load-bearing structure</h3>
        <p>Mezzanines, canopies, equipment platforms, and building additions need beams and columns sized to carry the design load, not guessed at.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('ruler', 22); ?></div>
        <h3>An engineer has stamped the drawings</h3>
        <p>When plans specify member sizes, grades, and connection details, the fabricated steel has to match them exactly, down to the bolt pattern.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('shield-check', 22); ?></div>
        <h3>The work has to clear inspection</h3>
        <p>Permitted San Antonio construction means every structural weld gets inspected &mdash; they need to be laid by certified welders to code.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section" aria-label="Why choose AGA for structural steel fabrication">
  <div class="container">
    <div class="split" style="display:grid; grid-template-columns:1fr 1fr; gap:clamp(2rem,5vw,4rem); align-items:center;">
      <div class="reveal-left">
        <span class="big-number">43</span>
        <p class="lead" style="margin-top:.5rem;">years fabricating structural steel in San Antonio &mdash; a family-run shop building for local general contractors and industrial plants since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why do San Antonio builders trust AGA with <span class="text-accent">structural steel</span>?</h2>
        <ul class="card" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Certified welders on every joint.</strong> The welds an inspector checks are laid in-house by certified welders using the procedure the connection calls for &mdash; never subcontracted out.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('ruler', 22); ?><span><strong>Fabricated to fit the field.</strong> We build straight off your stamped drawings and square every member, so it bolts into place on your San Antonio site without cutting or shimming.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>Delivered on your erection date.</strong> We schedule fabrication around your pour or crane date and bring mobile welding for connections that need to be finished on site.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="Our structural steel fabrication process">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">How It Works</span>
      <h2>How does AGA fabricate a <span class="text-accent">structural steel package</span>?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication moves every structural job in San Antonio through four stages: review the engineered drawings, detail and source material, cut-fit-weld, then finish and deliver. Each stage is checked against your plan so the steel erects on schedule without field rework.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Review drawings &amp; quote</b>
        <span>We take member sizes and connections off your stamped drawings, confirm scope, and return an itemized estimate before any steel is ordered.</span>
      </li>
      <li>
        <b>Detail &amp; source material</b>
        <span>We finalize connection details and source the exact grades and shapes your engineer specified for the load path.</span>
      </li>
      <li>
        <b>Cut, fit &amp; weld</b>
        <span>Certified welders cut to length, punch bolt holes, fit connection plates, and weld each member with the right procedure.</span>
      </li>
      <li>
        <b>Finish &amp; deliver</b>
        <span>We square, clean, and prep for primer or galvanizing, then deliver field-ready steel to your San Antonio site on schedule.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to other fabricators">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>What separates AGA from a <span class="text-accent">low-bid steel supplier</span>?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication fits and welds every structural member with certified welders under one San Antonio roof, while a low-bid supplier often ships loose steel or subcontracts the welding &mdash; leaving you to chase fit, quality, and the erection date.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-3 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA Welding &amp; Fabrication</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Certified welders on every structural joint</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Fabricated to stamped drawings and squared true</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Itemized estimate before steel is ordered</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Delivered to your San Antonio erection date</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Low-bid supplier</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Structural welding subcontracted out</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Loose steel that needs field fit-up</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Pricing that grows with change orders</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> No accountability for the erection schedule</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK ============================ -->
<section class="section section--light sp-gallery" id="recent-work" aria-label="Recent structural steel fabrication work">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What structural steel has AGA <span class="text-accent">fabricated recently</span>?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication recently finished structural steel out of our San Antonio shop &mdash; welded beams squared to spec, an assembled frame ready to erect, and fabricated steel staged for delivery. Every piece below was cut, fit, and welded in-house to its engineered drawing.</p>

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
<section class="section" aria-label="Structural steel fabrication FAQs">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">FAQ</span>
      <h2>What do San Antonio builders ask about <span class="text-accent">structural steel fabrication</span>?</h2>
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
      <h2>What other <span class="text-accent">fabrication services</span> might your structural project need?</h2>
    </div>
    <div class="services-grid" style="grid-template-columns:repeat(3,1fr);">
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/related-services.php'; ?>
    </div>
  </div>
</section>

<!-- ============================ FINAL CTA ============================ -->
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a structural steel fabrication estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Ready to get your structural steel fabricated in San Antonio?</h2>
      <p>Send AGA Welding &amp; Fabrication your stamped drawings or project details and we&rsquo;ll follow up the same day with a clear, itemized estimate. We sequence the work to hit your San Antonio erection date.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
