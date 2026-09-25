<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Service page — Metal Bending | AGA Welding & Fabrication (Phase 4)
 * ------------------------------------------------------------------------- */
$pageType    = 'service';
$serviceSlug = 'metal-bending';
$currentPage = 'services';

/* Pull this service from config */
$svc = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $svc = $s; break; } }

$pageTitle       = 'Metal Bending San Antonio, TX | ' . $siteName;
$pageDescription = 'Press-brake and roll bending in San Antonio, TX. AGA Welding & Fabrication forms angles, channels, brackets and curved steel to precise, repeatable specs. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/metal-bending/';
$ogImage         = $siteUrl . '/assets/images/custom-steel-fabrication.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'custom-steel-fabrication';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Recent-work photos for this service (real shop photos) */
$spGallery = [
    ['img' => 'structural-steel-frame',   'cap' => 'Curved and formed steel framework fabricated in-house'],
    ['img' => 'custom-metal-pipe-support', 'cap' => 'Formed steel support built to a custom radius'],
    ['img' => 'fabricated-steel-columns', 'cap' => 'Formed and fabricated steel staged for delivery'],
];

/* FAQs — unique to metal bending in San Antonio */
$faqs = [
    [
        'q' => 'What kinds of bends and forms can AGA produce?',
        'a' => 'AGA Welding & Fabrication press-brake bends plate and sheet into precise angles, and roll-bends bar, tube, and channel into consistent curves and radii. Whether you need a single sharp angle or a long sweeping arc, our San Antonio shop forms it to your dimensions.',
    ],
    [
        'q' => 'How accurate is press-brake and roll bending compared to hand forming?',
        'a' => 'Machine forming holds tighter tolerances than hand bending, and it repeats. AGA Welding & Fabrication sets up each job against your drawing so the first bracket and the fiftieth bracket come off the San Antonio shop floor at the same angle and radius.',
    ],
    [
        'q' => 'Can you match a curve or bend from an existing part?',
        'a' => 'Yes. Bring the original part, a sample, or a measurement and AGA Welding & Fabrication will dial in the radius or angle to match it. This is common for replacement brackets and railing sections where the new piece has to tie into existing steel.',
    ],
    [
        'q' => 'What materials can you bend or form?',
        'a' => 'AGA Welding & Fabrication forms carbon steel, stainless, and aluminum in sheet, plate, bar, tube, angle, and channel. Material thickness and grade both affect how tight a bend can go, which we confirm with you before forming begins in San Antonio.',
    ],
];

/* Schema */
$serviceSchema = generateServiceSchema($svc, $canonicalUrl);
$faqSchema     = generateFAQSchema($faqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',     'url' => $siteUrl . '/'],
    ['name' => 'Services', 'url' => $siteUrl . '/services/'],
    ['name' => 'Metal Bending', 'url' => $canonicalUrl],
]);

/* "Other services" — 3 related, excluding this one */
$relatedSlugs = ['metal-cutting', 'sheet-metal-fabrication', 'custom-metalwork'];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="Metal bending in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Custom-formed steel components taking shape on the AGA shop floor in San Antonio, TX"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Metal Bending &middot; San Antonio, TX</span>
        <h1 class="hero-title">Metal Bending &amp; Forming in <span class="text-accent">San Antonio</span></h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication press-brake and roll-bends steel angles, channels, brackets, and curved sections to precise, repeatable specs &mdash; forming the shapes stock steel can&rsquo;t deliver for San Antonio builders and property owners.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('wrench', 18); ?> Press-brake &amp; roll bending</li>
          <li><?php echo icon('ruler', 18); ?> Precise, repeatable forms</li>
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
              <option value="Metal Bending">Metal Bending</option>
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
  <span>Metal Bending</span>
</nav>

<!-- ============================ SERVICE DETAIL / ANSWER-FIRST ============================ -->
<section class="section" aria-label="Metal bending overview">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What does <span class="text-accent">metal bending in San Antonio</span> actually involve?</h2>
    </div>
    <p class="answer-block">Metal bending is the controlled forming of flat or straight steel stock into angles, curves, and custom profiles without cutting or welding a seam. AGA Welding &amp; Fabrication runs both press-brake and roll-bending equipment in our San Antonio shop, so a bracket, channel, or sweeping curve comes out consistent from the first piece to the last.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>Press-brake bending puts a sharp, controlled angle into plate and sheet &mdash; the method behind most brackets, flanges, and structural angles. Roll bending instead feeds bar, tube, angle, or channel through a set of rollers to produce a smooth, continuous curve, which is how AGA Welding &amp; Fabrication forms arched framework and curved railing sections for San Antonio clients.</p>
        <p>Every job starts with your drawing or a sample part. We confirm the material grade and thickness, because both determine how tight a radius or angle the steel can take without cracking or springing back out of shape. Our certified welders then form the piece on calibrated equipment and check it against the spec before it leaves the shop.</p>
        <p>Because bending, cutting, and welding all happen on Gardner Rd, a formed bracket or curved section can move straight into assembly and finishing without leaving our San Antonio facility &mdash; keeping tolerances tight from raw stock to finished part.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When you need metal bending">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When do you need <span class="text-accent">formed steel</span> instead of a straight cut?</h2>
    </div>
    <p class="answer-block">Reach for formed steel when a project calls for a shape stock bar or sheet cannot make on its own. AGA Welding &amp; Fabrication forms San Antonio clients&rsquo; steel into the angles and curves their projects actually require &mdash; here&rsquo;s when that call gets made most often.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('wrench', 22); ?></div>
        <h3>A part needs a precise angle</h3>
        <p>Brackets, flanges, and mounting plates often need one clean, repeatable bend rather than a welded joint that adds bulk and a weak point.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('ruler', 22); ?></div>
        <h3>The design calls for a curve</h3>
        <p>Arched framework, curved handrail sections, and radiused trim can&rsquo;t be cut from straight stock &mdash; they have to be rolled to the exact radius.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('badge-check', 22); ?></div>
        <h3>You need every piece identical</h3>
        <p>A production run of brackets or channel sections needs machine-set consistency so piece 20 matches piece 1 exactly.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section" aria-label="Why choose AGA for metal bending">
  <div class="container">
    <div class="split" style="display:grid; grid-template-columns:1fr 1fr; gap:clamp(2rem,5vw,4rem); align-items:center;">
      <div class="reveal-left">
        <span class="big-number">43</span>
        <p class="lead" style="margin-top:.5rem;">years forming steel in San Antonio &mdash; a family-run shop bending angles, channels, and curves since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why does San Antonio trust AGA to <span class="text-accent">bend and form steel</span>?</h2>
        <p class="answer-block">AGA Welding &amp; Fabrication has formed metal in San Antonio since 1983, running press-brake and roll-bending equipment in-house with certified hands. That means calibrated bends checked against your drawing, forming that feeds straight into welding, and formed steel delivered ready to install across Bexar County.</p>
        <ul class="service-card-with-image" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Calibrated equipment, in-house.</strong> Press-brake and roll-bending machines are set and checked against your drawing before the first piece is formed.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('layers', 22); ?><span><strong>Forming ties straight into fabrication.</strong> A bent bracket or curved section moves right into welding and assembly on the same Gardner Rd floor.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>Delivered ready to install.</strong> We finish the formed steel and deliver to your San Antonio site, or run mobile welding for on-site fitting.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="Our metal bending process">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">How It Works</span>
      <h2>How does the <span class="text-accent">bending process</span> work at AGA?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication follows a four-step process on every bending job in San Antonio: review the spec, select material and set-up, form and inspect, then finish and deliver. Each bend is checked against the drawing before the piece moves forward.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Review the spec</b>
        <span>We look at your drawing, sample part, or measurement and confirm the exact angle or radius required.</span>
      </li>
      <li>
        <b>Material &amp; set-up</b>
        <span>We select the right steel grade and thickness for the bend and calibrate the press brake or roller to match.</span>
      </li>
      <li>
        <b>Form &amp; inspect</b>
        <span>Certified welders form the piece and check it against the spec before moving to the next one in the run.</span>
      </li>
      <li>
        <b>Finish &amp; deliver</b>
        <span>We finish the formed steel and deliver ready-to-install pieces to your San Antonio job site.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to other fabricators">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>What sets AGA apart for <span class="text-accent">bending and forming</span> in San Antonio?</h2>
    </div>
    <p class="answer-block">The difference is calibration and follow-through. AGA Welding &amp; Fabrication checks every bend against your drawing on in-house equipment, while shops without dedicated forming gear outsource bending and lose control of the tolerance and the timeline.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-3 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA Welding &amp; Fabrication</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Press-brake &amp; roll bending in-house</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Every bend checked against your drawing</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Forming feeds straight into welding &amp; assembly</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Delivery and mobile welding across San Antonio</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Typical alternative</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Bending outsourced to a separate vendor</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> No sample check before a full run</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Bent parts shipped back for welding elsewhere</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Longer lead time on every formed piece</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK ============================ -->
<section class="section section--light sp-gallery" id="recent-work" aria-label="Recent metal bending work">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What has AGA <span class="text-accent">formed and bent recently</span>?</h2>
    </div>
    <p class="answer-block">Recent bending and forming work out of our San Antonio shop &mdash; curved framework, custom supports, and finished sections built to radius. Every piece below was formed and finished in-house by AGA Welding &amp; Fabrication.</p>

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
<section class="section" aria-label="Metal bending FAQs">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">FAQ</span>
      <h2>What do San Antonio clients ask about <span class="text-accent">metal bending</span>?</h2>
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
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a metal bending estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Ready to get your steel bent or formed in San Antonio?</h2>
      <p>Send AGA Welding &amp; Fabrication your drawing, sample, or measurement and we&rsquo;ll follow up the same day with a clear, itemized estimate. Rush service is available when your deadline can&rsquo;t wait.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
