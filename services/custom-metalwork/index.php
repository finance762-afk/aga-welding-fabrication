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
$pageDescription = 'Custom metalwork in San Antonio, TX. AGA Welding & Fabrication builds gates, panels, and signage from your sketch, photo, or idea. Free estimates.';
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
    ['img' => 'custom-metal-pipe-support', 'cap' => 'Custom steel piece finished and painted in the AGA shop'],
    ['img' => 'custom-steel-fabrication',  'cap' => 'One-off custom metalwork taking shape on the shop floor'],
    ['img' => 'welded-steel-stands',       'cap' => 'Custom welded steel fabrication built to a client design'],
];

/* FAQs — unique to custom metalwork in San Antonio */
$faqs = [
    [
        'q' => 'How much does custom metalwork cost in San Antonio?',
        'a' => 'AGA Welding & Fabrication prices custom metalwork by material, complexity, and finish, so a small decorative bracket costs far less than a full custom gate. We review your sketch or idea and give you a clear estimate before any steel is cut.',
    ],
    [
        'q' => 'Do I need a finished design before I contact AGA?',
        'a' => 'No. A rough sketch, a photo of something you like, or just a description of what you need is enough to start. AGA Welding & Fabrication helps develop the design into a buildable steel piece as part of the quote process.',
    ],
    [
        'q' => 'Can you match an existing gate, railing, or decorative piece?',
        'a' => "Yes. Our certified welders can replicate an existing design's style, pattern, and finish, or build a complementary piece that ties into what's already there \xe2\x80\x94 useful when you're extending a fence line or matching a set of railings.",
    ],
    [
        'q' => 'Do you build custom metalwork for both homes and businesses?',
        'a' => 'Yes. AGA Welding & Fabrication builds custom steel for San Antonio homeowners and commercial clients alike \xe2\x80\x94 decorative gates and railings for residential properties, and signage, brackets, and fixtures for storefronts and facilities.',
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
           alt="Custom geometric steel metalwork fabricated by AGA Welding & Fabrication in San Antonio"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Custom Metalwork &middot; San Antonio, TX</span>
        <h1 class="hero-title">Custom Metalwork Built From Your <span class="text-accent">Idea</span> in San Antonio</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication designs and builds one-of-a-kind steel pieces for San Antonio homes and businesses &mdash; decorative gates, signage, furniture frames, and brackets &mdash; starting from your sketch or a rough idea and carrying it through fabrication, welding, and finish in our Gardner Rd shop.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('pen-tool', 18); ?> Design consult included</li>
          <li><?php echo icon('hammer', 18); ?> One-off &amp; custom builds</li>
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
      <h2>What does <span class="text-accent">custom metalwork in San Antonio</span> actually include?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication turns your sketch, photo reference, or rough idea into a finished steel piece built specifically for your space &mdash; decorative gates, panels, signage, or furniture frames. We handle design consultation, fabrication, welding, and finish work in one San Antonio shop, so nothing gets lost between drawing and steel.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>Since 1983, AGA Welding &amp; Fabrication has been the family-run shop San Antonio homeowners, designers, and business owners call when a project can&rsquo;t be solved with a catalog part. Maybe it&rsquo;s a gate that has to match a specific gap in an entry wall, a decorative panel sized to a single window, or a sign bracket shaped to a logo &mdash; projects with no off-the-shelf answer. We start with a conversation about what you&rsquo;re picturing, then translate that into a workable steel design before any metal is cut.</p>
        <p>Our certified welders bring the piece to life using MIG, TIG, stick, and flux-cored processes, chosen for the metal, the joint, and the look you want &mdash; clean flush welds for a modern gate, heavier beads for a rustic railing bracket. Because the same shop that designs the piece also cuts, welds, and finishes it, changes mid-project are easy to make instead of another round of vendor calls.</p>
        <p>Everything is fabricated at our Gardner Rd shop in southeast San Antonio, then delivered and installed, or we bring mobile welding on-site for pieces that have to be built or finished in place. Whether it&rsquo;s a single decorative bracket or a full custom staircase railing, the same certified welders see it from first sketch to final coat.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When you need custom metalwork">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When do you need <span class="text-accent">custom metalwork</span> instead of a stock part?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication builds custom metalwork when a stock gate, panel, or bracket won&rsquo;t fit your space, match your style, or hold up to the job. Here are the situations San Antonio clients bring us most when nothing off the shelf will do.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('pencil-ruler', 22); ?></div>
        <h3>There&rsquo;s no catalog match</h3>
        <p>Your gap, opening, or design idea doesn&rsquo;t match anything sold pre-made &mdash; it needs to be drawn and built to the exact space.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('home', 22); ?></div>
        <h3>It has to match your home or brand</h3>
        <p>A gate, railing, or sign needs a specific look, finish, or shape that a stock part simply can&rsquo;t deliver.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('layers', 22); ?></div>
        <h3>You want it built to last</h3>
        <p>A one-off piece still needs real welds and the right steel grade &mdash; not a bolt-together kit that won&rsquo;t hold up outdoors.</p>
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
        <p class="lead" style="margin-top:.5rem;">years building custom steel in San Antonio &mdash; a family-run shop turning one-of-a-kind ideas into finished metalwork since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why do San Antonio clients trust AGA with <span class="text-accent">custom metalwork</span>?</h2>
        <ul class="service-card-with-image" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Certified welders shape every piece.</strong> Every custom weld is laid by a certified welder using the process suited to the metal and the finish you want &mdash; not a generic default.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('pen-tool', 22); ?><span><strong>Design help without extra fees.</strong> We help translate your sketch or reference photo into a buildable steel design before fabrication starts, all as part of the quote.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>Delivered or built on-site.</strong> We deliver finished pieces ready to install, or bring mobile welding to your San Antonio property for site-built work.</span></li>
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
      <h2>How does AGA build a <span class="text-accent">custom metalwork</span> piece from your idea?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication turns a concept into finished steel in four steps: design consult, material and detail selection, fabrication and welding, then finish and delivery. You approve the design before we cut any steel, so the final piece matches what you pictured.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Design consult</b>
        <span>Share your sketch, photo, or idea and we&rsquo;ll shape it into a workable steel design and a clear estimate.</span>
      </li>
      <li>
        <b>Material &amp; detail selection</b>
        <span>We choose the steel grade, gauge, and finish that fit the look and the location &mdash; indoor, outdoor, structural, or purely decorative.</span>
      </li>
      <li>
        <b>Fabricate &amp; weld</b>
        <span>Certified welders cut, form, and join the piece in-house using the process suited to the metal and the joint.</span>
      </li>
      <li>
        <b>Finish &amp; deliver</b>
        <span>We grind, finish, and prep for paint or coating, then deliver to your San Antonio address or install on-site.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to other metalwork shops">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>What&rsquo;s different about ordering <span class="text-accent">custom metalwork</span> from AGA?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication keeps your custom piece under one roof from first sketch to delivery, instead of passing your idea between a designer, a welder, and an installer. That single point of accountability is what most San Antonio shops can&rsquo;t offer.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-3 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA Welding &amp; Fabrication</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Design consult included in the estimate</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Certified welders build the piece in-house</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> One shop from sketch to finished steel</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Delivery or on-site mobile welding available</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Typical alternative</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Design and fabrication split across vendors</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Welds subcontracted with no direct oversight</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Multiple hand-offs before the piece is finished</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> You manage delivery and site coordination yourself</li>
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
      <h2>What <span class="text-accent">custom metalwork</span> has AGA finished recently?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication recently completed a run of one-off steel pieces out of our San Antonio shop, each one built from a client&rsquo;s sketch, photo, or rough idea. Every piece shown below was designed, welded, and finished in-house by our certified welders before delivery.</p>

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
      <h2>Got questions about <span class="text-accent">custom metalwork in San Antonio</span>?</h2>
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
      <h2>What other <span class="text-accent">metalwork services</span> might complement this project?</h2>
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
      <h2>Ready to bring your custom metalwork idea to life in San Antonio?</h2>
      <p>Send AGA Welding &amp; Fabrication your sketch, photo, or idea and we&rsquo;ll follow up the same day with a clear estimate. Rush service is available when your deadline can&rsquo;t wait.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
