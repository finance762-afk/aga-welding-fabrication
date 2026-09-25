<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Service page — General Repairs & Modifications | AGA Welding & Fabrication (Phase 4)
 * ------------------------------------------------------------------------- */
$pageType    = 'service';
$serviceSlug = 'general-repairs-modifications';
$currentPage = 'services';

/* Pull this service from config */
$svc = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $svc = $s; break; } }

$pageTitle       = 'General Metal Repairs & Modifications San Antonio, TX | ' . $siteName;
$pageDescription = 'General metal repairs and modifications in San Antonio, TX. AGA Welding & Fabrication alters, reinforces, and restores metal structures and equipment on-site or in-shop. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/general-repairs-modifications/';
$ogImage         = $siteUrl . '/assets/images/welding-fabrication-shop.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'welding-fabrication-shop';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Recent-work photos for this service (real shop photos) */
$spGallery = [
    ['img' => 'welding-steel-beam-san-antonio', 'cap' => 'Certified welder joining a structural steel beam during a modification job'],
    ['img' => 'custom-steel-fabrication',       'cap' => 'A repaired steel assembly reworked on the AGA shop floor in San Antonio'],
    ['img' => 'steel-beam-fabrication',         'cap' => 'Structural steel beams reinforced and fabricated to updated specs'],
];

/* FAQs — unique to general repairs & modifications in San Antonio */
$faqs = [
    [
        'q' => 'Can you repair metal that another shop already worked on?',
        'a' => 'Yes. AGA Welding & Fabrication routinely repairs and re-welds metal work from other shops, including cracked joints, failed welds, and undersized brackets. We inspect the existing metal, tell you honestly what needs to change, and fix it correctly the first time in San Antonio.',
    ],
    [
        'q' => 'Do you come to my site for repairs, or does the piece come to your shop?',
        'a' => 'Both. AGA Welding & Fabrication offers mobile welding for repairs that can\'t be moved &mdash; fences, equipment, and structural steel on-site &mdash; and shop repair for pieces that travel to Gardner Rd. We\'ll tell you which makes more sense once we see the job.',
    ],
    [
        'q' => 'Can you modify existing metal structures to add capacity or change their use?',
        'a' => 'Yes. AGA Welding & Fabrication adds brackets, mounts, and reinforcement to existing steel, cuts and re-welds sections to change dimensions, and adapts structures for a new load or purpose. We confirm the modification meets the new requirement before calling the job done.',
    ],
    [
        'q' => 'How quickly can you repair damaged metal equipment?',
        'a' => 'Most repair calls in San Antonio are scheduled within days, and rush mobile welding is available when equipment is down and costing you money. AGA Welding & Fabrication gives you a clear estimate and timeline once we see the damage or hear the details.',
    ],
];

/* Schema */
$serviceSchema = generateServiceSchema($svc, $canonicalUrl);
$faqSchema     = generateFAQSchema($faqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',     'url' => $siteUrl . '/'],
    ['name' => 'Services', 'url' => $siteUrl . '/services/'],
    ['name' => 'General Repairs & Modifications', 'url' => $canonicalUrl],
]);

/* "Other services" — 3 related, excluding this one */
$relatedSlugs = ['metal-repair', 'equipment-metal-repair', 'custom-metalwork'];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="General metal repairs and modifications in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Welder making a bright arc weld inside the AGA Welding & Fabrication shop in San Antonio, TX"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Repairs &amp; Modifications &middot; San Antonio, TX</span>
        <h1 class="hero-title">Metal Repairs &amp; Modifications in <span class="text-accent">San Antonio</span></h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication repairs, alters, and reinforces metal structures and equipment for San Antonio clients &mdash; adding brackets and mounts, cutting and re-welding sections, and restoring damaged steel on-site or in our shop.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('wrench', 18); ?> Repairs &amp; retrofits</li>
          <li><?php echo icon('truck', 18); ?> Mobile welding available</li>
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
              <option value="General Repairs &amp; Modifications">General Repairs &amp; Modifications</option>
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
  <span>General Repairs &amp; Modifications</span>
</nav>

<!-- ============================ SERVICE DETAIL / ANSWER-FIRST ============================ -->
<section class="section" aria-label="General repairs and modifications overview">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What do <span class="text-accent">metal repairs and modifications</span> in San Antonio cover?</h2>
    </div>
    <p class="answer-block">General repairs and modifications mean fixing damaged metal or changing existing metal to serve a new purpose &mdash; welding cracks, adding reinforcement, or altering dimensions on parts that already exist. AGA Welding &amp; Fabrication handles both, in our San Antonio shop or on-site with mobile welding.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>Not every metal job starts from raw steel. San Antonio clients call AGA Welding &amp; Fabrication when a bracket has cracked, a frame needs a new mounting point, or an existing structure has to carry a load it wasn't originally built for. We inspect the metal first, then recommend a repair or a modification based on what will actually hold up.</p>
        <p>Our certified welders cut out failed sections and re-weld clean joints, add gussets and reinforcement where stress has taken a toll, and adapt existing steel with new brackets, mounts, or extensions. Every repair uses the process &mdash; MIG, TIG, stick, or flux-cored &mdash; suited to the base metal and the load it needs to carry.</p>
        <p>Because we can work from our Gardner Rd shop or bring mobile welding to your San Antonio site, repairs and modifications get handled wherever the metal already is &mdash; no need to disassemble a structure just to fix one section.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When you need repairs or modifications">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When does metal need a <span class="text-accent">repair or modification</span> instead of replacement?</h2>
    </div>
    <p class="answer-block">Repair or modify instead of replacing when the base structure is sound but one section has failed, when you need to adapt existing steel for a new use, or when full replacement would cost far more than fixing what's there. Here's what San Antonio clients bring us most.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('wrench', 22); ?></div>
        <h3>A weld or joint has cracked</h3>
        <p>A failed weld or fatigued joint usually means the surrounding metal is still sound and just needs to be re-welded correctly.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('layers', 22); ?></div>
        <h3>The structure needs a new purpose</h3>
        <p>Adding equipment, changing a load path, or repurposing a structure often means modifying what's already there rather than starting over.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('truck', 22); ?></div>
        <h3>The piece can't come to a shop</h3>
        <p>Large equipment, fencing, or structural steel that's fixed in place needs a welder on-site rather than a trip to a fabrication shop.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section" aria-label="Why choose AGA for repairs and modifications">
  <div class="container">
    <div class="split" style="display:grid; grid-template-columns:1fr 1fr; gap:clamp(2rem,5vw,4rem); align-items:center;">
      <div class="reveal-left">
        <span class="big-number">43</span>
        <p class="lead" style="margin-top:.5rem;">years repairing and modifying metal in San Antonio &mdash; a family-run shop keeping local structures and equipment running since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why call AGA for <span class="text-accent">repairs and modifications</span>?</h2>
        <ul class="card" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('wrench', 22); ?><span><strong>Honest diagnosis first.</strong> We inspect the metal and tell you plainly whether it needs a repair, a modification, or replacement.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>Shop or on-site.</strong> Mobile welding handles what can't move; our Gardner Rd shop handles pieces that can travel to us.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Certified welds, every time.</strong> Repairs and modifications are welded by certified staff using the process the metal actually needs.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="Our repair and modification process">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">How It Works</span>
      <h2>How does AGA handle a <span class="text-accent">repair or modification</span> job?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication follows a four-step process on every repair or modification in San Antonio: inspect and quote, plan the fix, weld and reinforce, then deliver or complete on-site. You know the scope and cost before we touch the metal.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Inspect &amp; quote</b>
        <span>We look at the damaged or existing metal in person or from photos and give you an itemized estimate for the repair or modification.</span>
      </li>
      <li>
        <b>Plan the fix</b>
        <span>We decide whether to cut and re-weld, add reinforcement, or fabricate a new bracket or mount, based on the load and material.</span>
      </li>
      <li>
        <b>Weld &amp; reinforce</b>
        <span>Certified welders complete the repair or modification in our shop or on-site, using the process suited to the base metal.</span>
      </li>
      <li>
        <b>Deliver or complete on-site</b>
        <span>Shop repairs are finished and delivered back; on-site work is completed, cleaned up, and inspected with you before we leave.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to full replacement">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>Why repair with AGA instead of <span class="text-accent">replacing the whole piece</span>?</h2>
    </div>
    <p class="answer-block">Full replacement makes sense when metal is beyond saving; a targeted repair or modification makes sense far more often. AGA Welding &amp; Fabrication assesses honestly instead of defaulting to a full rebuild that costs more and takes longer than San Antonio clients need.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-2 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA repair &amp; modify</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Fixes only what actually failed</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Lower cost, faster turnaround</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> On-site mobile welding available</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Honest assessment before any work starts</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Full replacement by default</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Removes sound metal along with damaged</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Higher material and labor cost</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Structure often has to be disassembled</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Longer downtime for equipment or structures</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK ============================ -->
<section class="section section--light sp-gallery" id="recent-work" aria-label="Recent repair and modification work">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What has AGA recently <span class="text-accent">repaired or modified</span>?</h2>
    </div>
    <p class="answer-block">Recent repair and modification work out of our San Antonio shop &mdash; a structural beam re-welded on-site, a steel assembly reworked to updated specs, and reinforced structural steel. Every job below was completed by AGA Welding &amp; Fabrication.</p>

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
<section class="section" aria-label="General repairs and modifications FAQs">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">FAQ</span>
      <h2>What do clients ask about <span class="text-accent">metal repairs and modifications</span>?</h2>
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
      <h2>What other services support <span class="text-accent">repairs and modifications</span>?</h2>
    </div>
    <div class="services-grid" style="grid-template-columns:repeat(3,1fr);">
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/related-services.php'; ?>
    </div>
  </div>
</section>

<!-- ============================ FINAL CTA ============================ -->
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a repair or modification estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Have metal that needs repair or modification in San Antonio?</h2>
      <p>Tell AGA Welding &amp; Fabrication what's damaged or what you need changed and we&rsquo;ll follow up the same day with a clear, itemized estimate. Mobile welding is available when the piece can't come to us.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
