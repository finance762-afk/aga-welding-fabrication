<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Service page — Custom Metalwork | AGA Welding & Fabrication (Phase 4)
 * ------------------------------------------------------------------------- */
$pageType    = 'service';
$serviceSlug = 'custom-metalwork';
$currentPage = 'services';

/* Pull this service from config */
$svc = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $svc = $s; break; } }

$pageTitle       = 'Custom Metalwork San Antonio, TX | ' . $siteName;
$pageDescription = 'Custom metalwork built to your vision in San Antonio, TX. AGA Welding & Fabrication designs and fabricates gates, railings, signage, and one-off steel pieces in-house. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/custom-metalwork/';
$ogImage         = $siteUrl . '/assets/images/structural-steel-frame.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'structural-steel-frame';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Recent-work photos for this service (real shop photos) */
$spGallery = [
    ['img' => 'custom-metal-pipe-support', 'cap' => 'Custom-built steel pipe support, finish-painted and ready for delivery'],
    ['img' => 'custom-steel-fabrication',  'cap' => 'Custom steel assembly taking shape on the AGA shop floor in San Antonio'],
    ['img' => 'welded-steel-stands',       'cap' => 'Welded steel A-frame stands built to a one-off design'],
];

/* FAQs — unique to custom metalwork in San Antonio */
$faqs = [
    [
        'q' => 'Can AGA build a custom metal piece from just a sketch or idea?',
        'a' => 'Yes. AGA Welding & Fabrication regularly works from a napkin sketch, a photo of something you liked, or a verbal description. Our San Antonio shop develops the dimensions and construction details with you before any steel is cut, so the finished piece matches your vision.',
    ],
    [
        'q' => 'What kinds of custom metalwork do you build?',
        'a' => 'AGA Welding & Fabrication fabricates custom gates, decorative railings, signage frames, art pieces, brackets, and one-off architectural features for San Antonio homes and businesses. If it starts as raw steel and needs a design eye, our shop can build it.',
    ],
    [
        'q' => 'How much does a custom metalwork project cost?',
        'a' => 'Pricing depends on the design, material, and finish you choose, so a small decorative bracket costs far less than a large custom gate. AGA Welding & Fabrication reviews your idea or drawing and provides a clear, itemized estimate before starting any San Antonio project.',
    ],
    [
        'q' => 'Do you finish and paint custom metalwork pieces?',
        'a' => 'Yes. AGA Welding & Fabrication grinds and finishes every weld, then preps and paints or primes the piece to your specification. We can also leave raw steel unfinished if you plan a specialty coating, so your San Antonio piece arrives exactly how you want it.',
    ],
];

/* Schema */
$serviceSchema = generateServiceSchema($svc, $canonicalUrl);
$faqSchema     = generateFAQSchema($faqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',     'url' => $siteUrl . '/'],
    ['name' => 'Services', 'url' => $siteUrl . '/services/'],
    ['name' => 'Custom Metalwork', 'url' => $canonicalUrl],
]);

/* "Other services" — 3 related, excluding this one */
$relatedSlugs = ['handrails-railings', 'staircases', 'awnings'];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="Custom metalwork in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Geometric steel dome framework fabricated in-house by AGA Welding & Fabrication in San Antonio, TX"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Custom Metalwork &middot; San Antonio, TX</span>
        <h1 class="hero-title">Custom Metalwork Built for <span class="text-accent">San Antonio</span></h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication designs and fabricates one-off gates, railings, signage, and decorative or functional steel pieces for San Antonio homes and businesses &mdash; taking your idea from concept sketch to a finished, painted piece in our own shop.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('pen-tool', 18); ?> Built from your concept</li>
          <li><?php echo icon('hammer', 18); ?> Fabricated in-house</li>
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
              <option value="Custom Metalwork">Custom Metalwork</option>
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
  <span>Custom Metalwork</span>
</nav>

<!-- ============================ SERVICE DETAIL / ANSWER-FIRST ============================ -->
<section class="section" aria-label="Custom metalwork overview">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What does <span class="text-accent">custom metalwork in San Antonio</span> actually involve?</h2>
    </div>
    <p class="answer-block">Custom metalwork is one-off metal fabrication built to a design rather than pulled off a shelf &mdash; gates, railings, signage, art, and architectural features shaped to your exact idea. AGA Welding &amp; Fabrication designs, cuts, welds, and finishes every piece in our San Antonio shop, so what you imagined is what arrives.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>San Antonio property owners come to AGA Welding &amp; Fabrication with a concept rather than a spec sheet &mdash; a gate design pulled from a photo, a sign frame sketched on paper, or a decorative feature that needs to match an existing style. We sit down with you, confirm dimensions and materials, and turn that idea into a buildable design before cutting any steel.</p>
        <p>Our certified welders shape carbon steel, stainless, and aluminum using MIG, TIG, stick, and flux-cored processes, matching technique to the look and durability the piece needs. Decorative scrollwork gets the same attention as structural brackets, and every weld is ground and finished so the final piece reads as intentional, not improvised.</p>
        <p>Because design, fabrication, and finishing all happen on Gardner Rd, we can adjust a detail mid-build without waiting on an outside vendor. That flexibility is what makes a genuinely custom piece possible for San Antonio clients on a realistic timeline.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When you need custom metalwork">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When does a project call for <span class="text-accent">custom metalwork</span> instead of a catalog part?</h2>
    </div>
    <p class="answer-block">Reach for custom metalwork when a catalog piece almost fits but not quite, when the design has to match something that already exists, or when nothing on the market matches the look you want. AGA Welding &amp; Fabrication hears these reasons most from San Antonio clients.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('pen-tool', 22); ?></div>
        <h3>You have a specific look in mind</h3>
        <p>A style, pattern, or finish you saw elsewhere can be built from scratch rather than approximated with stock parts.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('ruler', 22); ?></div>
        <h3>It has to match an odd opening</h3>
        <p>Non-standard gate widths, angled railings, or irregular openings need a piece built to that exact measurement.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('award', 22); ?></div>
        <h3>Appearance matters as much as function</h3>
        <p>Entryways, signage, and visible architectural features need clean welds and a finish that holds up to close inspection.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section" aria-label="Why choose AGA for custom metalwork">
  <div class="container">
    <div class="split" style="display:grid; grid-template-columns:1fr 1fr; gap:clamp(2rem,5vw,4rem); align-items:center;">
      <div class="reveal-left">
        <span class="big-number">43</span>
        <p class="lead" style="margin-top:.5rem;">years shaping steel in San Antonio &mdash; a family-run shop building one-off metalwork for local homes and businesses since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why bring your <span class="text-accent">custom metalwork</span> idea to AGA?</h2>
        <ul class="service-card-with-image" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('pen-tool', 22); ?><span><strong>Design help included.</strong> We refine a sketch, photo, or verbal idea into a buildable design with you before any steel is cut.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Certified welders on every joint.</strong> Decorative or structural, each weld is laid and finished by a certified welder in our San Antonio shop.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>Delivered ready to install.</strong> We finish, prime, or paint your piece and deliver it to your San Antonio address ready to hang or set.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="Our custom metalwork process">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">How It Works</span>
      <h2>How does AGA turn an idea into <span class="text-accent">finished metalwork</span>?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication follows a four-step process on every custom piece in San Antonio: design consult, material and finish selection, build, then finish and deliver. You approve the design before we cut, so there are no surprises at pickup.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Design consult</b>
        <span>We talk through your idea, sketch, or reference photo and confirm dimensions before drawing up a buildable design.</span>
      </li>
      <li>
        <b>Material &amp; finish selection</b>
        <span>We choose the steel, stainless, or aluminum and the finish &mdash; painted, primed, or raw &mdash; that fits how the piece will be used.</span>
      </li>
      <li>
        <b>Build</b>
        <span>Certified welders cut, form, and join the piece in-house, checking fit and proportion against your approved design as we go.</span>
      </li>
      <li>
        <b>Finish &amp; deliver</b>
        <span>We grind every weld smooth, apply the chosen finish, and deliver the completed piece to your San Antonio address.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to catalog metalwork">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>Why choose custom metalwork over a <span class="text-accent">catalog part</span>?</h2>
    </div>
    <p class="answer-block">A catalog part is built for the average opening; custom metalwork is built for yours. AGA Welding &amp; Fabrication designs to your exact space and style, while a stock piece forces you to adjust the opening, the look, or both to fit what's available.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-1 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA custom metalwork</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Built to your exact dimensions</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Design matched to your style</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Finish and color chosen by you</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Adjustments made before delivery</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Off-the-shelf catalog part</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Fixed sizes, gaps or trimming needed</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Generic look, limited styles</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Stock finish only</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> No changes once it ships</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK ============================ -->
<section class="section section--light sp-gallery" id="recent-work" aria-label="Recent custom metalwork">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What custom pieces has AGA <span class="text-accent">recently built</span>?</h2>
    </div>
    <p class="answer-block">Recent custom metalwork out of our San Antonio shop &mdash; a finish-painted pipe support, a one-off steel assembly, and welded A-frame stands built to a specific design. Every piece below was designed and fabricated in-house by AGA Welding &amp; Fabrication.</p>

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
<section class="section" aria-label="Custom metalwork FAQs">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">FAQ</span>
      <h2>What do clients ask about <span class="text-accent">custom metalwork in San Antonio</span>?</h2>
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
      <h2>What other <span class="text-accent">fabrication services</span> pair with custom metalwork?</h2>
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
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a custom metalwork estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Ready to build your custom metalwork piece in San Antonio?</h2>
      <p>Send AGA Welding &amp; Fabrication your idea, sketch, or reference photo and we&rsquo;ll follow up the same day with a clear, itemized estimate. Rush service is available when your deadline can&rsquo;t wait.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
