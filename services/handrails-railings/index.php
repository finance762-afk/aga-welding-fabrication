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
$pageDescription = 'Custom handrails and railings in San Antonio, TX. AGA Welding & Fabrication welds code-compliant guardrails for homes and businesses. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/handrails-railings/';
$ogImage         = $siteUrl . '/assets/images/custom-steel-fabrication.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'custom-steel-fabrication';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Recent-work photos for this service (real shop photos) */
$spGallery = [
    ['img' => 'structural-steel-frame', 'cap' => 'A geometric steel framework fabricated in-house ahead of railing install'],
    ['img' => 'welded-steel-stands',    'cap' => 'Welded steel A-frame stands built to support a railing run'],
    ['img' => 'custom-metal-pipe-support', 'cap' => 'A custom-built, finish-painted steel support matched to a railing job'],
];

/* FAQs — unique to handrails and railings in San Antonio */
$faqs = [
    [
        'q' => 'What height and spacing do handrails need to meet code in San Antonio?',
        'a' => 'Residential guardrails generally need to be at least 36 inches tall with balusters spaced so a 4-inch sphere cannot pass through, while commercial stair rails typically run 42 inches with different spacing rules. AGA Welding & Fabrication confirms the exact requirement for your property type before fabricating so the finished railing passes inspection.',
    ],
    [
        'q' => 'Can you match a railing to an existing style on my property?',
        'a' => 'Yes. AGA Welding & Fabrication can replicate baluster spacing, rail profile, and finish to extend an existing run, or design something new if you are starting from scratch. We confirm the match with a shop drawing before fabrication so there are no surprises on installation day.',
    ],
    [
        'q' => 'Do you install the railings or just fabricate them?',
        'a' => 'AGA Welding & Fabrication both fabricates and installs handrails and guardrails for San Antonio homes and businesses. We measure the site, weld the railing to spec in our shop, then install and secure it in place so it is inspection-ready the day we leave.',
    ],
    [
        'q' => 'How long does a custom railing project take from quote to installation?',
        'a' => 'A straightforward residential handrail often moves from measurement to installation within one to two weeks; larger commercial guardrail runs take longer depending on length and finish. AGA Welding & Fabrication gives you a firm schedule once the site measurement and design are confirmed.',
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
           alt="Custom steel assembly taking shape on the AGA Welding & Fabrication shop floor in San Antonio, TX ahead of a railing install"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Handrails &amp; Railings &middot; San Antonio, TX</span>
        <h1 class="hero-title">Custom Handrails &amp; Railings Welded for <span class="text-accent">San Antonio</span></h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication designs, welds, and installs code-compliant handrails and guardrails for San Antonio homes and businesses &mdash; interior or exterior, matched to your property and built to pass inspection.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('shield-check', 18); ?> Licensed &amp; insured</li>
          <li><?php echo icon('fence', 18); ?> Residential &amp; commercial</li>
          <li><?php echo icon('badge-check', 18); ?> Code-compliant welds</li>
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
    <p class="answer-block">Custom handrails and railings are measured, designed, welded, and installed to fit your exact stairs, porch, balcony, or walkway &mdash; not pulled off a shelf. AGA Welding &amp; Fabrication builds each railing from steel or aluminum to meet code height and baluster spacing while matching the look of your San Antonio property.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>Stock railings rarely fit a real staircase or an uneven grade the way San Antonio properties actually need &mdash; steps vary, landings sit at odd angles, and older homes and buildings were not built to a single standard. AGA Welding &amp; Fabrication measures your site directly and designs the railing to fit it, not the other way around.</p>
        <p>Our certified welders fabricate the rail, posts, and balusters in-house, checking height and spacing against code for your property type before a single piece is cut. Whether you want a clean, simple guardrail or a more detailed design, everything is welded and ground smooth at our shop on Gardner Rd.</p>
        <p>Once fabricated, we install the railing on-site and secure it to your stairs, deck, or landing, leaving it inspection-ready. Residential porches, commercial stairwells, and everything between are within scope across San Antonio and Bexar County.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When you need custom handrails or railings">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When should you replace or add a <span class="text-accent">handrail</span>?</h2>
    </div>
    <p class="answer-block">A railing is a safety feature first and a design feature second. AGA Welding &amp; Fabrication hears these three situations most often from San Antonio homeowners and property managers deciding it is time to call a fabricator.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('fence', 22); ?></div>
        <h3>The railing wobbles or has rusted through</h3>
        <p>Loose posts or rust at the base mean the railing is no longer doing its job &mdash; and a fall risk that should not wait.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('footprints', 22); ?></div>
        <h3>A stair or landing has no railing at all</h3>
        <p>Many older San Antonio properties were built before current code required one &mdash; adding one closes an inspection gap.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('ruler', 22); ?></div>
        <h3>Baluster spacing fails a code inspection</h3>
        <p>Wide gaps between balusters are a common inspection flag &mdash; a custom rebuild brings the spacing into compliance.</p>
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
        <p class="lead" style="margin-top:.5rem;">years fabricating railings and custom metalwork for San Antonio homes and businesses &mdash; family-run since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why does San Antonio choose AGA for <span class="text-accent">handrails and railings</span>?</h2>
        <ul class="service-card-with-image" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('ruler', 22); ?><span><strong>Measured to your site, not a catalog.</strong> AGA Welding &amp; Fabrication builds every railing to the exact dimensions of your stairs, porch, or landing.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Code-checked before fabrication.</strong> Height and baluster spacing are confirmed for your property type before we cut steel, not after installation.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('hard-hat', 22); ?><span><strong>Fabricated and installed by one crew.</strong> We weld it in our shop and install it on-site, so fit and finish are our responsibility start to finish.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="Our handrail and railing process">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">How It Works</span>
      <h2>How does AGA build a <span class="text-accent">custom railing</span>?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication follows a four-step process on every railing project in San Antonio: measure and design, confirm code and material, weld and finish, then install and secure. Each step is confirmed with you before moving to the next.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Measure &amp; design</b>
        <span>We measure your stairs, porch, or landing on-site and design the railing to fit the exact dimensions and style.</span>
      </li>
      <li>
        <b>Confirm code &amp; material</b>
        <span>We check height and baluster spacing against code for your property type and select steel or aluminum for the finish you want.</span>
      </li>
      <li>
        <b>Weld &amp; finish</b>
        <span>Certified welders fabricate the rail, posts, and balusters in-house, then grind and finish for a clean, paint-ready surface.</span>
      </li>
      <li>
        <b>Install &amp; secure</b>
        <span>We install the finished railing on-site and secure it to the structure, leaving it inspection-ready before we leave.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to prefab railing options">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>Why choose custom over a <span class="text-accent">prefab railing kit</span>?</h2>
    </div>
    <p class="answer-block">A prefab kit is built for an average staircase, not yours. AGA Welding &amp; Fabrication welds each railing to your property's actual measurements, so San Antonio customers get a rail that fits the first time and meets code without field-cutting a kit to make it work.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-3 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA Welding &amp; Fabrication</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Built to your exact site measurements</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Height and spacing checked against code first</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Welded joints, not bolted kit hardware</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Fabricated and installed by the same crew</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Typical prefab kit</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Standard lengths field-cut to fit</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Spacing may not match local code</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Bolted connections that loosen over time</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Installer separate from the manufacturer</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK ============================ -->
<section class="section section--light sp-gallery" id="recent-work" aria-label="Recent handrail and railing work">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What railings has AGA <span class="text-accent">fabricated recently</span>?</h2>
    </div>
    <p class="answer-block">Recent railing and support fabrication out of our San Antonio shop &mdash; framework, stands, and supports built ahead of installation. Every piece below was cut, welded, and finished in-house by AGA Welding &amp; Fabrication.</p>

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
      <h2>Common questions about <span class="text-accent">handrails and railings in San Antonio</span></h2>
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
      <h2>What other <span class="text-accent">custom metalwork</span> might your property need?</h2>
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
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a handrail or railing estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Ready for a custom railing at your San Antonio property?</h2>
      <p>Send AGA Welding &amp; Fabrication your stair or landing details and we&rsquo;ll follow up the same day with a clear, itemized estimate. Rush service is available when your project deadline can&rsquo;t wait.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
