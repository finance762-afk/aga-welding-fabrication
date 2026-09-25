<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Service page — Structural Metal Repair | AGA Welding & Fabrication (Phase 4)
 * ------------------------------------------------------------------------- */
$pageType    = 'service';
$serviceSlug = 'structural-metal-repair';
$currentPage = 'services';

/* Pull this service from config */
$svc = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $svc = $s; break; } }

$pageTitle       = 'Structural Metal Repair San Antonio, TX | ' . $siteName;
$pageDescription = 'Structural metal repair in San Antonio, TX. AGA Welding & Fabrication repairs cracked beams, corroded columns and failed welds with certified procedures. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/structural-metal-repair/';
$ogImage         = $siteUrl . '/assets/images/steel-beam-fabrication.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'steel-beam-fabrication';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Recent-work photos for this service (real shop photos) */
$spGallery = [
    ['img' => 'structural-steel-beams',        'cap' => 'Fabricated structural steel I-beams staged for a San Antonio repair job'],
    ['img' => 'welding-fabrication-shop',       'cap' => 'A bright arc weld reinforcing a structural member inside the AGA shop'],
    ['img' => 'welding-steel-beam-san-antonio', 'cap' => 'A certified welder joining a structural steel beam during a repair'],
];

/* FAQs — unique to structural metal repair in San Antonio */
$faqs = [
    [
        'q' => 'How do I know if a structural steel beam needs repair instead of replacement?',
        'a' => 'AGA Welding & Fabrication inspects the crack, corrosion, or failed weld and checks how much of the original section is still sound. If enough base metal remains to carry the load once repaired and reinforced, repair is faster and less costly than replacement; if corrosion has eaten through the section, we will tell you honestly and price a replacement instead.',
    ],
    [
        'q' => 'Can a cracked or corroded structural column be repaired without shutting down my San Antonio site?',
        'a' => 'Often, yes. AGA Welding & Fabrication can sequence structural repairs around your operating hours and, where the member allows it, temporarily shore the load so work continues on one column or beam while the rest of the structure stays in service. We confirm shoring and sequencing with you before work starts.',
    ],
    [
        'q' => 'What causes structural steel to crack or corrode in the first place?',
        'a' => 'Fatigue from repeated loading, a weld that was undersized for the stress it carries, standing moisture at a base plate, or an impact from equipment are the most common causes AGA Welding & Fabrication sees on San Antonio structures. We identify the root cause during inspection so the repair does not fail again from the same condition.',
    ],
    [
        'q' => 'How long does a structural metal repair take?',
        'a' => 'A single cracked weld or localized corrosion repair can often be completed in a day; a multi-column reinforcement package takes longer depending on shoring and access. AGA Welding & Fabrication gives you a firm timeline after the on-site inspection, before any cutting or welding begins.',
    ],
];

/* Schema */
$serviceSchema = generateServiceSchema($svc, $canonicalUrl);
$faqSchema     = generateFAQSchema($faqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',     'url' => $siteUrl . '/'],
    ['name' => 'Services', 'url' => $siteUrl . '/services/'],
    ['name' => 'Structural Metal Repair', 'url' => $canonicalUrl],
]);

/* "Other services" — 3 related, excluding this one */
$relatedSlugs = ['metal-repair', 'structural-steel-fabrication', 'equipment-metal-repair'];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="Structural metal repair in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Welder fabricating a long structural steel beam at the AGA Welding & Fabrication shop in San Antonio, TX"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Structural Metal Repair &middot; San Antonio, TX</span>
        <h1 class="hero-title">Structural Metal Repair in <span class="text-accent">San Antonio</span> Done Right</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication repairs cracked beams, corroded columns, and failed welds in load-bearing structural steel &mdash; using certified procedures so the repaired member is safe, code-ready, and built to last in San Antonio&rsquo;s heat and humidity.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('shield-check', 18); ?> Licensed &amp; insured</li>
          <li><?php echo icon('hard-hat', 18); ?> Load-bearing repair specialists</li>
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
              <option value="Structural Metal Repair">Structural Metal Repair</option>
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
  <span>Structural Metal Repair</span>
</nav>

<!-- ============================ SERVICE DETAIL / ANSWER-FIRST ============================ -->
<section class="section" aria-label="Structural metal repair overview">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What does <span class="text-accent">structural metal repair in San Antonio</span> actually involve?</h2>
    </div>
    <p class="answer-block">Structural metal repair restores a load-bearing steel member &mdash; a beam, column, or connection &mdash; back to safe, code-compliant condition after cracking, corrosion, or a failed weld. AGA Welding &amp; Fabrication inspects the damage on-site, engineers a repair sequence, and reinforces or replaces the affected section without compromising what is above or below it.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>Structural steel does not fail all at once &mdash; it usually shows warning signs first: a hairline crack near a connection, rust bleeding through paint at a base plate, or a weld that has started to separate under repeated loading. AGA Welding &amp; Fabrication has spent 43 years reading those signs for San Antonio property owners, contractors, and plant managers, and knowing the difference between a cosmetic issue and a load-carrying problem.</p>
        <p>Once we confirm the extent of the damage, our certified welders remove the compromised material, prep the surrounding steel, and rebuild the section using the correct process for the metal and the load &mdash; MIG, TIG, stick, or flux-cored. Where the original design was undersized for its actual load, we reinforce with additional plate or gusseting rather than simply re-welding the same failure point.</p>
        <p>Every repair happens under one roof at 8249 Gardner Rd, or on-site with our mobile welding rigs when the member cannot be removed from your San Antonio building or plant. Either way, the finished repair is ground, inspected, and documented before we call the job done.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="Signs you need structural metal repair">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>What are the warning signs a <span class="text-accent">structural member needs repair</span>?</h2>
    </div>
    <p class="answer-block">Structural steel gives warning before it fails outright. AGA Welding &amp; Fabrication urges San Antonio property owners and contractors to call as soon as any of these three signs appear, rather than waiting for the problem to spread.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('hammer', 22); ?></div>
        <h3>A visible crack at a weld or connection</h3>
        <p>Cracking at a joint means the connection is carrying stress it was not designed for &mdash; it will not heal on its own and tends to spread.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('shield-check', 22); ?></div>
        <h3>Rust bleeding through at the base</h3>
        <p>Corrosion at a base plate or column foot eats away load-bearing section thickness long before it looks serious from a distance.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('ruler', 22); ?></div>
        <h3>Noticeable sag, sway, or deflection</h3>
        <p>A beam that has started to sag or a frame that sways under normal use is telling you the steel is no longer performing as designed.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section" aria-label="Why choose AGA for structural metal repair">
  <div class="container">
    <div class="split" style="display:grid; grid-template-columns:1fr 1fr; gap:clamp(2rem,5vw,4rem); align-items:center;">
      <div class="reveal-left">
        <span class="big-number">43</span>
        <p class="lead" style="margin-top:.5rem;">years repairing structural steel in San Antonio &mdash; a family-run shop that has kept local buildings and plants standing safely since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why does San Antonio trust AGA for <span class="text-accent">structural metal repair</span>?</h2>
        <ul class="service-card-with-image" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('hard-hat', 22); ?><span><strong>We diagnose the cause, not just the symptom.</strong> AGA Welding &amp; Fabrication traces cracking and corrosion back to what caused it, so the repair does not fail again from the same condition.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Certified welders on every load-bearing joint.</strong> Structural repairs are laid by certified welders using the procedure matched to the metal and the load &mdash; never a quick patch weld.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>Shop or mobile, your choice.</strong> We repair in our San Antonio shop or bring mobile welding rigs to your site when the member cannot be moved.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="Our structural metal repair process">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">How It Works</span>
      <h2>How does AGA <span class="text-accent">repair a structural member</span> safely?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication follows a four-step process on every structural repair in San Antonio: inspect and diagnose, plan the repair sequence, cut and reinforce, then weld and verify. The sequence protects the surrounding structure while the damaged section is rebuilt.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Inspect &amp; diagnose</b>
        <span>We examine the crack, corrosion, or failed weld on-site and identify the root cause before proposing a fix.</span>
      </li>
      <li>
        <b>Plan the repair sequence</b>
        <span>We determine whether shoring is needed, what stays in service, and confirm the plan with you before any steel is cut.</span>
      </li>
      <li>
        <b>Cut &amp; reinforce</b>
        <span>Compromised material is removed and the section is reinforced with matched steel, plate, or gusseting as the repair requires.</span>
      </li>
      <li>
        <b>Weld &amp; verify</b>
        <span>Certified welders rebuild the joint, grind and inspect the finished weld, and confirm the repaired member is ready to carry load.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to other structural repair options">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>Why not just have a <span class="text-accent">handyman patch the weld</span>?</h2>
    </div>
    <p class="answer-block">A patch weld can hide a crack without fixing why it happened. AGA Welding &amp; Fabrication diagnoses the underlying cause and reinforces the member with certified welders, so San Antonio property owners get a repair that holds instead of a cosmetic fix that fails again.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-3 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA Welding &amp; Fabrication</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Root-cause diagnosis before any weld is laid</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Certified welders on every structural joint</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Reinforcement, not just a patch over the crack</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Shop or mobile repair across San Antonio</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Typical patch-weld approach</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Crack re-welded without finding the cause</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> No verification the load path was restored</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Corrosion left untreated beneath the patch</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Failure recurs at the same connection</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK ============================ -->
<section class="section section--light sp-gallery" id="recent-work" aria-label="Recent structural metal repair work">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What structural repairs has AGA <span class="text-accent">completed recently</span>?</h2>
    </div>
    <p class="answer-block">Recent structural repair and reinforcement work out of our San Antonio shop and on-site at client buildings and plants. Every joint below was cut, welded, and verified in-house or in the field by AGA Welding &amp; Fabrication.</p>

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
<section class="section" aria-label="Structural metal repair FAQs">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">FAQ</span>
      <h2>Common questions about <span class="text-accent">structural metal repair in San Antonio</span></h2>
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
      <h2>What other <span class="text-accent">repair services</span> might your project need?</h2>
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
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a structural metal repair estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Ready to have a structural member repaired in San Antonio?</h2>
      <p>Send AGA Welding &amp; Fabrication photos or details of the crack, corrosion, or weld failure and we&rsquo;ll follow up the same day with a clear, itemized estimate. Rush inspection is available for safety concerns.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
