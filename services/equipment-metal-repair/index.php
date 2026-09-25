<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Service page — Equipment Metal Repair | AGA Welding & Fabrication (Phase 4)
 * ------------------------------------------------------------------------- */
$pageType    = 'service';
$serviceSlug = 'equipment-metal-repair';
$currentPage = 'services';

/* Pull this service from config */
$svc = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $svc = $s; break; } }

$pageTitle       = 'Equipment Metal Repair San Antonio, TX | ' . $siteName;
$pageDescription = 'Equipment metal repair in San Antonio, TX. AGA Welding & Fabrication rebuilds cracked trailers, frames, buckets, and machinery components with fast turnaround and mobile welding. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/equipment-metal-repair/';
$ogImage         = $siteUrl . '/assets/images/welding-steel-beam-san-antonio.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'welding-steel-beam-san-antonio';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Recent-work photos for this service (real shop photos) */
$spGallery = [
    ['img' => 'welding-fabrication-shop', 'cap' => 'Certified welding on the AGA Welding & Fabrication shop floor in San Antonio'],
    ['img' => 'custom-steel-fabrication', 'cap' => 'Custom steel components fabricated for a repair job at the AGA shop'],
    ['img' => 'metal-cutting-bandsaw',    'cap' => 'Precision bandsaw cutting steel stock for an equipment repair'],
];

/* FAQs — unique to equipment metal repair in San Antonio */
$faqs = [
    [
        'q' => 'How much does equipment metal repair cost in San Antonio?',
        'a' => 'Equipment repair pricing depends on the damage, the metal, and whether the work is mobile or in-shop. AGA Welding & Fabrication assesses the failed component first, then quotes a clear, itemized estimate — almost always a fraction of replacing the machine or trailer, and well worth avoiding repeat San Antonio downtime.',
    ],
    [
        'q' => 'How fast can you turn around an equipment repair?',
        'a' => 'Many equipment repairs are welded and back in service the same day or next, and AGA Welding & Fabrication offers rush service when a San Antonio job is stalled. Larger rebuilds take longer, but we set a realistic turnaround at assessment and can work on site to shorten downtime.',
    ],
    [
        'q' => 'What kinds of equipment and metals do you repair?',
        'a' => 'AGA Welding & Fabrication repairs trailers, loader buckets, frames, brackets, hitches, racks, and machinery components in carbon steel, stainless, and aluminum. Whether the part sees impact, vibration, or heavy load in your San Antonio operation, we match the weld procedure to the metal so the rebuilt component holds up.',
    ],
    [
        'q' => 'Can you repair equipment on site instead of at the shop?',
        'a' => 'Yes. AGA Welding & Fabrication runs mobile welding across San Antonio and Bexar County, repairing frames, buckets, brackets, and structural equipment right in your yard or on the job site. On-site repair skips the haul on heavy or fixed machinery and gets your equipment back to work faster.',
    ],
];

/* Schema */
$serviceSchema = generateServiceSchema($svc, $canonicalUrl);
$faqSchema     = generateFAQSchema($faqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',     'url' => $siteUrl . '/'],
    ['name' => 'Services', 'url' => $siteUrl . '/services/'],
    ['name' => 'Equipment Metal Repair', 'url' => $canonicalUrl],
]);

/* "Other services" — 3 related, excluding this one */
$relatedSlugs = ['metal-repair', 'structural-metal-repair', 'general-repairs-modifications'];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="Equipment metal repair in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Certified welder repairing heavy steel equipment at the AGA Welding & Fabrication shop in San Antonio, TX"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Equipment Metal Repair &middot; San Antonio, TX</span>
        <h1 class="hero-title">Equipment Metal Repair in <span class="text-accent">San Antonio</span> That Cuts Downtime</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication repairs industrial and commercial metal equipment across San Antonio &mdash; trailers, frames, buckets, brackets, and worn machinery components. Our certified welders rebuild broken and cracked steel with fast turnaround and mobile on-site service, getting your equipment back to work instead of sitting idle in the yard.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('shield-check', 18); ?> Family-run since 1983</li>
          <li><?php echo icon('layers', 18); ?> Trailers, frames &amp; machinery</li>
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
              <option value="Equipment Metal Repair">Equipment Metal Repair</option>
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
  <span>Equipment Metal Repair</span>
</nav>

<!-- ============================ SERVICE DETAIL / ANSWER-FIRST ============================ -->
<section class="section" aria-label="Equipment metal repair overview">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What does <span class="text-accent">equipment metal repair in San Antonio</span> cover?</h2>
    </div>
    <p class="answer-block">Equipment metal repair fixes the steel that keeps machines and trailers working &mdash; cracked frames, broken brackets, worn buckets, and fatigued welds. AGA Welding &amp; Fabrication welds, rebuilds, and reinforces these components in San Antonio, either at our Gardner Rd shop or on site, so failed equipment is back in service fast rather than waiting on a replacement part.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>Downtime is expensive, and AGA Welding &amp; Fabrication has spent over 40 years keeping San Antonio&rsquo;s trailers, loaders, and shop machinery running. When a bucket cracks, a trailer frame splits, or a bracket shears off, our certified welders assess the break, prep the metal, and rebuild the component to take the same working loads it did new.</p>
        <p>We weld and repair carbon steel, stainless, and aluminum using MIG, TIG, stick, and flux-cored processes, choosing the one that suits the base metal and the stress the part sees in service. Beyond a simple reweld, we reinforce weak points, replace torn-out sections, and rebuild worn edges so the fix outlasts the original failure.</p>
        <p>When equipment cannot be hauled in, AGA brings mobile welding to job sites, yards, and shop floors across San Antonio and Bexar County &mdash; repairing frames, hydraulic brackets, and structural components in place. When it makes more sense to bring the piece to Gardner Rd, we turn it around quickly and get it back on the schedule.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When to repair metal equipment">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When should you <span class="text-accent">repair metal equipment</span> instead of replacing it?</h2>
    </div>
    <p class="answer-block">Repair equipment when the base structure is sound and only a weld, bracket, or worn section has failed &mdash; a fraction of the cost of a new machine. AGA Welding &amp; Fabrication inspects the damage in San Antonio and rebuilds cracked frames, buckets, and mounts whenever a certified weld will safely return the equipment to full duty.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('ruler', 22); ?></div>
        <h3>Cracked frames or welds</h3>
        <p>Splits in a trailer frame, bucket, or equipment weld will spread under load and need rewelding before failure.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('layers', 22); ?></div>
        <h3>Broken brackets or mounts</h3>
        <p>Sheared brackets, hangers, and hydraulic mounts can be rebuilt and reinforced instead of scrapping the whole assembly.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('hammer', 22); ?></div>
        <h3>Worn or torn-out steel</h3>
        <p>Edges, teeth, and wear surfaces ground down by use can be rebuilt with weld and hardfacing to restore the part.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section" aria-label="Why choose AGA for equipment metal repair">
  <div class="container">
    <div class="split" style="display:grid; grid-template-columns:1fr 1fr; gap:clamp(2rem,5vw,4rem); align-items:center;">
      <div class="reveal-left">
        <span class="big-number">43</span>
        <p class="lead" style="margin-top:.5rem;">years repairing equipment and machinery steel in San Antonio &mdash; a family-run shop keeping local fleets and facilities running since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why do San Antonio operators bring <span class="text-accent">equipment repairs</span> to AGA?</h2>
        <p class="answer-block">San Antonio contractors, haulers, and facility managers bring equipment repairs to AGA Welding &amp; Fabrication because downtime costs money and certified welds last. Family-run since 1983, we turn repairs around fast, weld to the loads the part actually sees, and come to your site so idle equipment gets back to work sooner.</p>
        <ul class="card" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Fast, certified repairs.</strong> A down machine is losing money, so we schedule equipment repairs quickly and weld them to last &mdash; with rush service when your San Antonio job cannot wait.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('layers', 22); ?><span><strong>Rebuilt, not just patched.</strong> We reinforce weak points, replace torn-out sections, and rebuild worn edges so the repaired equipment outlasts the original failure instead of cracking again next season.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>Mobile on-site welding.</strong> We bring the truck to your yard, job site, or shop floor across San Antonio and Bexar County so heavy or fixed equipment gets repaired without a costly haul.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="Our equipment metal repair process">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">How It Works</span>
      <h2>How does AGA <span class="text-accent">repair metal equipment</span>?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication follows four steps on every equipment repair in San Antonio: assess the failure, prep and stabilize the metal, weld and rebuild the component, then finish and test-fit. We confirm the plan and turnaround with you up front so your equipment returns to service dependable and ready for full working loads.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Assess the failure</b>
        <span>We inspect the broken component on site or in the shop, find why it failed, and confirm what has to be rebuilt to hold.</span>
      </li>
      <li>
        <b>Prep &amp; stabilize the metal</b>
        <span>We clean, grind, and bevel the damaged area and support the assembly so the repair is sound and correctly aligned.</span>
      </li>
      <li>
        <b>Weld &amp; rebuild the component</b>
        <span>Certified welders reweld, splice, and reinforce with MIG, TIG, stick, or flux-cored processes matched to the metal and its working loads.</span>
      </li>
      <li>
        <b>Finish &amp; test-fit</b>
        <span>We grind, dress the welds, and confirm the component fits and moves as it should before your San Antonio equipment goes back to work.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to other repair shops">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>What makes AGA&rsquo;s <span class="text-accent">equipment repairs</span> stand out in San Antonio?</h2>
    </div>
    <p class="answer-block">The difference is speed and durability. AGA Welding &amp; Fabrication turns equipment repairs around fast, welds to the loads the part carries, and rebuilds weak points, while cheaper fixes lay a quick bead that cracks again &mdash; leaving your San Antonio equipment back in the shop within weeks.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-3 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA Welding &amp; Fabrication</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Fast turnaround with rush service available</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Mobile on-site welding across Bexar County</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Weak points reinforced, not just rewelded</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Certified welds matched to working loads</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Typical alternative</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Slow queues that keep equipment idle</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Drop-off only, no mobile option</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> A quick bead that cracks again in weeks</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> One-size welding regardless of the load</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK ============================ -->
<section class="section section--light sp-gallery" id="recent-work" aria-label="Recent equipment metal repair work">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What equipment repairs has AGA <span class="text-accent">completed recently</span>?</h2>
    </div>
    <p class="answer-block">Recent metal work from AGA Welding &amp; Fabrication in San Antonio &mdash; certified welding on the shop floor, custom steel fabrication, and precision bandsaw cutting for repair components. Every job below was welded, cut, and rebuilt in-house by our certified welders on Gardner Rd.</p>

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
<section class="section" aria-label="Equipment metal repair FAQs">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">FAQ</span>
      <h2>What do San Antonio operators ask about <span class="text-accent">equipment metal repair</span>?</h2>
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
      <h2>What related <span class="text-accent">repair services</span> might your equipment need?</h2>
    </div>
    <div class="services-grid" style="grid-template-columns:repeat(3,1fr);">
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/related-services.php'; ?>
    </div>
  </div>
</section>

<!-- ============================ FINAL CTA ============================ -->
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request an equipment metal repair estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Ready to get your equipment back to work in San Antonio?</h2>
      <p>Tell AGA Welding &amp; Fabrication what&rsquo;s down and we&rsquo;ll follow up the same day with a plan, a turnaround, and a clear, itemized estimate. Mobile welding is available across San Antonio and Bexar County to cut your downtime.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
