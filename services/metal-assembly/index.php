<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Service page — Metal Assembly | AGA Welding & Fabrication (Phase 4)
 * ------------------------------------------------------------------------- */
$pageType    = 'service';
$serviceSlug = 'metal-assembly';
$currentPage = 'services';

/* Pull this service from config */
$svc = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $svc = $s; break; } }

$pageTitle       = 'Metal Assembly San Antonio, TX | ' . $siteName;
$pageDescription = 'Multi-part steel assembly in San Antonio, TX. AGA Welding & Fabrication fits, welds and bolts frames, skids and stands into finished weldments. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/metal-assembly/';
$ogImage         = $siteUrl . '/assets/images/welded-steel-stands.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'welded-steel-stands';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Recent-work photos for this service (real shop photos) */
$spGallery = [
    ['img' => 'custom-steel-fabrication', 'cap' => 'Multi-part steel assembly fitted on the AGA shop floor'],
    ['img' => 'structural-steel-frame',   'cap' => 'Assembled steel framework built in San Antonio'],
    ['img' => 'fabricated-steel-columns', 'cap' => 'Assembled and finished steel components ready to ship'],
];

/* FAQs — unique to metal assembly in San Antonio */
$faqs = [
    [
        'q' => 'What does a metal assembly project typically involve?',
        'a' => 'Metal assembly is fitting multiple fabricated steel pieces &mdash; frames, brackets, panels, supports &mdash; into one finished weldment, joined by welding, bolting, or both. AGA Welding & Fabrication fits and joins every part in our San Antonio shop so the finished assembly arrives complete and square.',
    ],
    [
        'q' => 'Do you build jigs and fixtures for repeat assembly runs?',
        'a' => 'Yes. When a project needs multiple identical assemblies, AGA Welding & Fabrication builds a jig or fixture first so every unit holds the same dimensions and joint locations. This keeps a run of skids, stands, or frames consistent from the first piece to the last.',
    ],
    [
        'q' => 'Can you assemble parts I supply along with parts you fabricate?',
        'a' => 'Yes. Bring pre-cut or purchased components and AGA Welding & Fabrication will fit, weld, and bolt them together with our own fabricated pieces into one finished structure. We confirm fit and tolerance before final welds are laid in San Antonio.',
    ],
    [
        'q' => 'How do you decide whether to weld or bolt an assembly together?',
        'a' => 'It depends on the load, whether the structure needs to come apart for service or shipping, and the specification. AGA Welding & Fabrication reviews your drawing and application, then welds, bolts, or combines both methods so the assembly performs the way your San Antonio project needs.',
    ],
];

/* Schema */
$serviceSchema = generateServiceSchema($svc, $canonicalUrl);
$faqSchema     = generateFAQSchema($faqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',     'url' => $siteUrl . '/'],
    ['name' => 'Services', 'url' => $siteUrl . '/services/'],
    ['name' => 'Metal Assembly', 'url' => $canonicalUrl],
]);

/* "Other services" — 3 related, excluding this one */
$relatedSlugs = ['steel-fabrication', 'structural-steel-fabrication', 'custom-metalwork'];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="Metal assembly in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Welded steel A-frame stands assembled by AGA Welding & Fabrication in San Antonio"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Metal Assembly &middot; San Antonio, TX</span>
        <h1 class="hero-title">Metal Assembly in <span class="text-accent">San Antonio</span>, Fit to Finish</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication fits, welds, and bolts multi-part steel into finished frames, skids, and stands &mdash; using jigs for repeat runs so every San Antonio assembly holds the same dimensions from the first unit to the last.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('hammer', 18); ?> Fitted, welded &amp; bolted</li>
          <li><?php echo icon('layers', 18); ?> Frames, skids &amp; stands</li>
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
              <option value="Metal Assembly">Metal Assembly</option>
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
  <span>Metal Assembly</span>
</nav>

<!-- ============================ SERVICE DETAIL / ANSWER-FIRST ============================ -->
<section class="section" aria-label="Metal assembly overview">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What does <span class="text-accent">metal assembly in San Antonio</span> cover?</h2>
    </div>
    <p class="answer-block">Metal assembly is the fitting and joining stage that turns separate fabricated steel parts into one finished structure. AGA Welding &amp; Fabrication squares, tack-welds, finish-welds, and bolts multi-part frames, skids, and stands together in our San Antonio shop, checking dimensions at every stage before final assembly.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>A complex assembly rarely comes together in one pass. Our team lays out the parts, dry-fits them against the drawing, and tack-welds the structure square before any permanent joint goes in. That sequence catches a dimensional problem while it&rsquo;s still cheap to fix, instead of after the whole frame is welded solid.</p>
        <p>For repeat orders &mdash; a run of equipment stands, mounting skids, or matching brackets &mdash; AGA Welding &amp; Fabrication builds a jig or fixture first. The fixture holds every part in the same position, so a San Antonio client ordering ten stands gets ten stands that are actually interchangeable, not ten close approximations.</p>
        <p>Once fit and welded, we grind joints, check squareness and level, and prep the assembly for coating or galvanizing. Because cutting, forming, and assembly all happen on Gardner Rd, a multi-part order moves through our shop as one continuous job, not a string of vendor hand-offs.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When you need metal assembly">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When does a project need <span class="text-accent">assembled steel</span>, not just parts?</h2>
    </div>
    <p class="answer-block">A project needs assembly whenever the finished structure is made of more than one piece that has to be joined square, level, and to spec. AGA Welding &amp; Fabrication assembles San Antonio projects that fall into one of these situations most often.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('hammer', 22); ?></div>
        <h3>Multiple parts need one structure</h3>
        <p>Frames, skids, and stands are built from several fabricated pieces that need to be fitted and joined into a single, square unit.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('layers', 22); ?></div>
        <h3>You need matching units, repeatably</h3>
        <p>Ordering several identical assemblies calls for a jig or fixture so each unit holds the same dimensions as the last.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('badge-check', 22); ?></div>
        <h3>Squareness and level actually matter</h3>
        <p>Equipment stands and mounting frames need to sit true, so the assembly stage has to be checked, not assumed.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section" aria-label="Why choose AGA for metal assembly">
  <div class="container">
    <div class="split" style="display:grid; grid-template-columns:1fr 1fr; gap:clamp(2rem,5vw,4rem); align-items:center;">
      <div class="reveal-left">
        <span class="big-number">43</span>
        <p class="lead" style="margin-top:.5rem;">years assembling steel structures in San Antonio &mdash; a family-run shop fitting frames, skids, and stands since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why does San Antonio trust AGA to <span class="text-accent">assemble multi-part steel</span>?</h2>
        <p class="answer-block">AGA Welding &amp; Fabrication has assembled steel in San Antonio since 1983, using certified fitters, jigs, and fixtures to hold every build square. That means components checked for fit before welding, load-bearing joints laid by certified hands, and finished assemblies delivered or set on your site.</p>
        <ul class="service-card-with-image" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Dry-fit before final weld.</strong> Every assembly is squared and tack-welded first, so dimensional issues get caught before a joint is permanent.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('layers', 22); ?><span><strong>Jigs for repeat runs.</strong> Multi-unit orders get a fixture built first, keeping every stand or skid interchangeable with the next.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>One shop, no hand-offs.</strong> Cutting, forming, and assembly happen on the same Gardner Rd floor, then we deliver to your San Antonio site.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="Our metal assembly process">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">How It Works</span>
      <h2>How does <span class="text-accent">assembly</span> work at AGA?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication follows a four-step process on every assembly job in San Antonio: layout and dry-fit, tack and square, finish-weld or bolt, then finish and deliver. Each stage is checked against the drawing before moving forward.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Layout &amp; dry-fit</b>
        <span>We lay out every part against your drawing and dry-fit the structure before any permanent joint is made.</span>
      </li>
      <li>
        <b>Tack &amp; square</b>
        <span>The assembly is tack-welded and checked for square and level, catching dimensional issues early.</span>
      </li>
      <li>
        <b>Finish-weld or bolt</b>
        <span>Certified welders complete the permanent joints &mdash; welded, bolted, or both, per your specification.</span>
      </li>
      <li>
        <b>Finish &amp; deliver</b>
        <span>We grind welds, prep for coating, and deliver the finished assembly to your San Antonio job site.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to other fabricators">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>What sets AGA apart for <span class="text-accent">multi-part assembly</span> in San Antonio?</h2>
    </div>
    <p class="answer-block">The difference is the dry-fit step. AGA Welding &amp; Fabrication squares and tack-welds every assembly before finishing it, while shops that skip the check risk a frame that&rsquo;s out of square by the time the last weld is laid.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-3 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA Welding &amp; Fabrication</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Dry-fit and squared before final weld</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Jigs built for repeat, matching units</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Cutting, forming &amp; assembly on one floor</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Delivery and mobile welding across San Antonio</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Typical alternative</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Parts welded solid without a dry-fit check</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> No fixture, so repeat units drift out of spec</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Assembly outsourced from a separate fab shop</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> You coordinate delivery yourself</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK ============================ -->
<section class="section section--light sp-gallery" id="recent-work" aria-label="Recent metal assembly work">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What has AGA <span class="text-accent">assembled recently</span>?</h2>
    </div>
    <p class="answer-block">Recent assembly work out of our San Antonio shop &mdash; multi-part frames, fitted supports, and finished components built and joined in-house. Every piece below was assembled and finished by AGA Welding &amp; Fabrication.</p>

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
<section class="section" aria-label="Metal assembly FAQs">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">FAQ</span>
      <h2>What do San Antonio clients ask about <span class="text-accent">metal assembly</span>?</h2>
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
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a metal assembly estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Ready to get your steel assembled in San Antonio?</h2>
      <p>Send AGA Welding &amp; Fabrication your drawings or parts list and we&rsquo;ll follow up the same day with a clear, itemized estimate. Rush service is available when your deadline can&rsquo;t wait.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
