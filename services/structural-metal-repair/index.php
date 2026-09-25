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
$pageDescription = 'Structural metal repair in San Antonio, TX. AGA Welding & Fabrication repairs and reinforces steel beams, columns, and load-bearing frames with certified weld procedures. Free estimates.';
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
    ['img' => 'structural-steel-beams',  'cap' => 'Structural steel beams fabricated and reinforced at the AGA San Antonio shop'],
    ['img' => 'welding-fabrication-shop', 'cap' => 'Certified welding underway on the AGA Welding & Fabrication shop floor'],
    ['img' => 'fabricated-steel-columns', 'cap' => 'Fabricated steel columns staged after reinforcement work'],
];

/* FAQs — unique to structural metal repair in San Antonio */
$faqs = [
    [
        'q' => 'How much does structural metal repair cost in San Antonio?',
        'a' => 'Structural repair pricing depends on access, the amount of steel to remove and replace, and whether shoring is needed. AGA Welding & Fabrication inspects the member first, then gives a clear, itemized estimate before any work begins, so San Antonio clients know the cost of restoring capacity up front.',
    ],
    [
        'q' => 'How long does a structural steel repair take?',
        'a' => 'Most localized repairs — a cracked weld, a reinforced connection, a spliced column — are completed by AGA Welding & Fabrication in a day or two, while larger reinforcement projects run longer. We set a realistic schedule at inspection and offer mobile welding to keep San Antonio downtime short.',
    ],
    [
        'q' => 'Do you repair to engineered specifications and pass inspection?',
        'a' => 'Yes. AGA Welding & Fabrication repairs structural steel to the load path and, when your San Antonio project requires it, works from an engineer\'s repair details or drawings. Our certified weld procedures and finished joints are prepared to meet inspection so the restored member returns to its rated capacity.',
    ],
    [
        'q' => 'Can you reinforce structural steel without shutting down our facility?',
        'a' => 'Often, yes. AGA Welding & Fabrication schedules mobile structural repairs and reinforcement around your operations in San Antonio, using staged shoring and section-by-section welding so load-bearing members are restored while the rest of the facility keeps running. We plan the sequence with you before work starts.',
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
           alt="Certified welder fabricating and reinforcing a structural steel beam at the AGA Welding & Fabrication shop in San Antonio, TX"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Structural Metal Repair &middot; San Antonio, TX</span>
        <h1 class="hero-title">Structural Metal Repair in <span class="text-accent">San Antonio</span> That Holds</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication repairs and reinforces structural steel across San Antonio &mdash; beams, columns, frames, connections, and load-bearing members. Our certified welders restore strength and safety with proven weld procedures, so damaged or overloaded structures stay in service instead of coming down for a full rebuild.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('shield-check', 18); ?> Family-run since 1983</li>
          <li><?php echo icon('layers', 18); ?> Repair &amp; reinforcement</li>
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
      <h2>What does <span class="text-accent">structural metal repair in San Antonio</span> involve?</h2>
    </div>
    <p class="answer-block">Structural metal repair restores the strength of load-bearing steel &mdash; beams, columns, base plates, and connections &mdash; without replacing the whole assembly. AGA Welding &amp; Fabrication inspects the damage, cuts out compromised sections, and rewelds or reinforces with certified procedures, bringing San Antonio structures back to their rated capacity and keeping them safely in service.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>For more than four decades, AGA Welding &amp; Fabrication has kept San Antonio&rsquo;s structural steel standing &mdash; repairing cracked welds, corroded columns, sagging beams, and failed connections on buildings, mezzanines, canopies, and industrial frames. We start with a hands-on assessment to find why the steel failed, because a repair that ignores the cause simply fails again.</p>
        <p>Our certified welders match the repair procedure to the base metal and the load path, using MIG, TIG, stick, and flux-cored processes to lay sound, full-strength joints. Where a member has lost section to rust or impact, we splice in new steel, add gussets or stiffeners, and reinforce connections so the structure carries its design load again.</p>
        <p>Much of this work cannot leave the site, so AGA brings mobile welding to San Antonio job sites and facilities &mdash; shoring, cutting, and rewelding in place to limit downtime. When a piece is better handled in the shop on Gardner Rd, we fabricate the replacement section to spec and set it with minimal disruption.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When structural steel needs repair">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When does structural steel need <span class="text-accent">repair instead of replacement</span>?</h2>
    </div>
    <p class="answer-block">Structural steel needs repair when the damage is localized &mdash; a cracked weld, a corroded base, an impacted column &mdash; and the surrounding member is still sound. AGA Welding &amp; Fabrication evaluates each case in San Antonio and reinforces or splices rather than rebuilds whenever a certified repair can safely restore the structure&rsquo;s rated load.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('ruler', 22); ?></div>
        <h3>Cracks at welds or connections</h3>
        <p>Visible cracking around joints, base plates, or bolted connections signals a repair before the load path fails.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('layers', 22); ?></div>
        <h3>Rust has eaten into the steel</h3>
        <p>Corrosion that has thinned a column, beam, or base plate reduces capacity and needs reinforcement, not paint.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('hammer', 22); ?></div>
        <h3>Impact or overload damage</h3>
        <p>A forklift strike, settling, or added load can bend or crack a member that must be restored to spec.</p>
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
        <p class="lead" style="margin-top:.5rem;">years repairing and reinforcing structural steel in San Antonio &mdash; a family-run shop working for local contractors and property owners since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why do San Antonio builders trust AGA with <span class="text-accent">structural repairs</span>?</h2>
        <p class="answer-block">San Antonio contractors, plant managers, and building owners trust AGA Welding &amp; Fabrication because structural repairs demand certified welds and sound judgment. Family-run since 1983, our welders diagnose the failure, repair to the load path, and stand behind joints that have to hold &mdash; on site or in the Gardner Rd shop.</p>
        <ul class="service-card-with-image" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Certified structural welds.</strong> Every load-bearing joint is repaired by a certified welder using a procedure matched to the steel and the load &mdash; the welds that hold a structure up are not guesswork.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('layers', 22); ?><span><strong>Diagnosis before repair.</strong> We find why the member failed &mdash; corrosion, fatigue, impact, or overload &mdash; so the fix addresses the cause and the steel does not fail in the same spot again.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>Mobile or in-shop.</strong> We repair structural steel on your San Antonio site to limit downtime, or fabricate and set replacement sections from the Gardner Rd shop when that is the safer path.</span></li>
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
      <h2>How does AGA approach a <span class="text-accent">structural metal repair</span>?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication follows four steps on every structural repair in San Antonio: inspect and diagnose, plan the repair and shoring, cut and reweld to the load path, then finish and verify. Each stage is confirmed with you so the restored steel carries its rated load and stays inspection-ready.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Inspect &amp; diagnose</b>
        <span>We assess the damaged member on site, identify why it failed, and confirm whether a repair or a replacement section is the safe call.</span>
      </li>
      <li>
        <b>Plan the repair &amp; shoring</b>
        <span>We plan the sequence, temporary support, and weld procedure so the structure stays stable while the load-bearing steel is worked.</span>
      </li>
      <li>
        <b>Cut &amp; reweld to the load path</b>
        <span>Certified welders remove compromised metal and reweld, splice, or reinforce with MIG, TIG, stick, or flux-cored procedures matched to the load.</span>
      </li>
      <li>
        <b>Finish &amp; verify</b>
        <span>We grind, prep for coating, and confirm the repaired member is back to its rated capacity before we leave your San Antonio site.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to other repair outfits">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>What makes AGA&rsquo;s <span class="text-accent">structural repairs</span> different in San Antonio?</h2>
    </div>
    <p class="answer-block">The difference is diagnosis and certified welds. AGA Welding &amp; Fabrication finds the root cause and repairs to the load path with in-house certified welders, while quick-fix outfits often patch the symptom, subcontract the welding, and leave the same weakness ready to fail again on your San Antonio structure.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-3 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA Welding &amp; Fabrication</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Certified welders repair every load-bearing joint</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Root-cause diagnosis before any steel is cut</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Mobile on-site repair to limit downtime</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Repaired steel verified to its rated load</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Typical alternative</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Symptoms patched without finding the cause</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Structural welds subcontracted out of house</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Repairs that fail again in the same spot</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> No verification that capacity was restored</li>
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
      <h2>What structural repairs has AGA <span class="text-accent">handled recently</span>?</h2>
    </div>
    <p class="answer-block">Recent structural steel work from AGA Welding &amp; Fabrication in San Antonio &mdash; fabricated and reinforced beams, certified welding on the shop floor, and rebuilt columns staged for install. Every piece below was cut, welded, and reinforced in-house by our certified welders on Gardner Rd.</p>

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
      <h2>What do San Antonio clients ask about <span class="text-accent">structural metal repair</span>?</h2>
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
      <h2>What related <span class="text-accent">metal services</span> might your structural project need?</h2>
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
      <h2>Ready to repair your structural steel in San Antonio?</h2>
      <p>Send AGA Welding &amp; Fabrication the details or photos of your damaged steel and we&rsquo;ll follow up the same day to schedule an inspection and a clear, itemized estimate. Mobile welding is available to keep your San Antonio project moving.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
