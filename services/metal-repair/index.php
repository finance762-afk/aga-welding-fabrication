<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Service page — Metal Repair | AGA Welding & Fabrication (Phase 4)
 * ------------------------------------------------------------------------- */
$pageType    = 'service';
$serviceSlug = 'metal-repair';
$currentPage = 'services';

/* Pull this service from config */
$svc = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $svc = $s; break; } }

$pageTitle       = 'Metal Repair San Antonio, TX | ' . $siteName;
$pageDescription = 'Metal and steel repair in San Antonio, TX. AGA Welding & Fabrication patches, reinforces and rebuilds trailers, gates and equipment in-shop or on-site. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/metal-repair/';
$ogImage         = $siteUrl . '/assets/images/welding-fabrication-shop.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'welding-fabrication-shop';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Recent-work photos for this service (real shop photos) */
$spGallery = [
    ['img' => 'welding-steel-beam-san-antonio', 'cap' => 'Certified welder repairing a structural steel member'],
    ['img' => 'steel-beam-fabrication',         'cap' => 'Reinforcing and rebuilding damaged steel to spec'],
    ['img' => 'custom-steel-fabrication',       'cap' => 'Repaired and modified steel assembly on the shop floor'],
];

/* FAQs — unique to metal repair in San Antonio */
$faqs = [
    [
        'q' => 'What kinds of metal repairs does AGA handle?',
        'a' => 'AGA Welding & Fabrication repairs cracked, broken, bent, and worn steel &mdash; trailers, gates, equipment frames, and structural brackets. We patch, reinforce, or rebuild the damaged section in our San Antonio shop, or on-site when the piece can&rsquo;t be moved.',
    ],
    [
        'q' => 'Can you repair equipment on-site instead of hauling it to the shop?',
        'a' => 'Yes. AGA Welding & Fabrication runs mobile welding across San Antonio for repairs on equipment, trailers, and structures too large or too critical to move. We assess the damage on-site and repair it there to minimize downtime.',
    ],
    [
        'q' => 'Is it better to repair damaged steel or replace it?',
        'a' => 'It depends on the extent of the damage and how the piece carries load. AGA Welding & Fabrication inspects the crack, break, or wear point and tells you honestly whether a repair will hold or whether the section needs to be rebuilt or replaced.',
    ],
    [
        'q' => 'How fast can you get a repair done?',
        'a' => 'Most straightforward repairs &mdash; a cracked bracket, a broken gate hinge, a worn trailer frame &mdash; are same-day or next-day in our San Antonio shop. AGA Welding & Fabrication gives you a realistic timeline once we&rsquo;ve seen the damage, and rush service is available when downtime is costing you.',
    ],
];

/* Schema */
$serviceSchema = generateServiceSchema($svc, $canonicalUrl);
$faqSchema     = generateFAQSchema($faqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',     'url' => $siteUrl . '/'],
    ['name' => 'Services', 'url' => $siteUrl . '/services/'],
    ['name' => 'Metal Repair', 'url' => $canonicalUrl],
]);

/* "Other services" — 3 related, excluding this one */
$relatedSlugs = ['structural-metal-repair', 'equipment-metal-repair', 'general-repairs-modifications'];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="Metal repair in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="AGA welder repairing steel with a bright arc weld inside the San Antonio shop"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Metal Repair &middot; San Antonio, TX</span>
        <h1 class="hero-title">Metal Repair in <span class="text-accent">San Antonio</span>, Shop or On-Site</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication patches, reinforces, and rebuilds cracked, broken, and worn steel &mdash; trailers, gates, and equipment &mdash; in our San Antonio shop or on-site with mobile welding to keep your project moving.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('flame', 18); ?> Crack &amp; break repair</li>
          <li><?php echo icon('wrench', 18); ?> Shop or mobile welding</li>
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
              <option value="Metal Repair">Metal Repair</option>
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
  <span>Metal Repair</span>
</nav>

<!-- ============================ SERVICE DETAIL / ANSWER-FIRST ============================ -->
<section class="section" aria-label="Metal repair overview">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What does <span class="text-accent">metal repair in San Antonio</span> restore?</h2>
    </div>
    <p class="answer-block">Metal repair is restoring cracked, broken, bent, or worn steel back to safe, working condition instead of scrapping and replacing it outright. AGA Welding &amp; Fabrication inspects the damage, then patches, reinforces, or rebuilds the section in our San Antonio shop or on-site so the piece goes back to work.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>Every repair starts the same way: we look at how and where the steel failed before we touch a torch. A stress crack in a trailer frame, a broken gate hinge, and a worn support bracket all fail differently, and the repair has to address the actual cause &mdash; not just fill the visible gap.</p>
        <p>Certified welders at AGA Welding &amp; Fabrication then cut out compromised material, fit reinforcement where the original design was undersized, and weld the repair using the process suited to the metal and the load. Trailers, gates, brackets, and equipment frames all come through our San Antonio shop for this kind of work.</p>
        <p>When the damaged piece is too large, too heavy, or too critical to haul in, we bring the repair to you. Mobile welding lets AGA Welding &amp; Fabrication fix equipment and structures on-site across San Antonio, cutting the downtime a shop trip would otherwise cost.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When you need metal repair">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When does damaged steel need a <span class="text-accent">repair, not a replacement</span>?</h2>
    </div>
    <p class="answer-block">Most cracked or worn steel can be repaired if the core structure is still sound. AGA Welding &amp; Fabrication sees these situations most often from San Antonio clients trying to avoid an unnecessary full replacement.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('flame', 22); ?></div>
        <h3>A crack or break has appeared</h3>
        <p>Stress cracks in a trailer frame or a snapped bracket usually can be reinforced and rewelded rather than scrapped.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('wrench', 22); ?></div>
        <h3>A gate or hinge won&rsquo;t hold</h3>
        <p>Worn hinges, sagging gates, and loose mounting points are common repair calls that restore function fast.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('badge-check', 22); ?></div>
        <h3>Equipment can&rsquo;t come off the job</h3>
        <p>When downtime is the real cost, an on-site mobile repair keeps equipment working without a shop trip.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section" aria-label="Why choose AGA for metal repair">
  <div class="container">
    <div class="split" style="display:grid; grid-template-columns:1fr 1fr; gap:clamp(2rem,5vw,4rem); align-items:center;">
      <div class="reveal-left">
        <span class="big-number">43</span>
        <p class="lead" style="margin-top:.5rem;">years repairing steel in San Antonio &mdash; a family-run shop that&rsquo;s kept trailers, gates, and equipment working since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why does San Antonio trust AGA for <span class="text-accent">metal repair</span>?</h2>
        <p class="answer-block">AGA Welding &amp; Fabrication has repaired steel in San Antonio since 1983, backing every fix with a full fabrication shop and certified welders. That means repairs that address why the metal failed, replacement parts built when patching won&rsquo;t do, and mobile welding brought to your site to cut downtime.</p>
        <ul class="card" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Honest repair-or-replace calls.</strong> We inspect the damage first and tell you straight whether a repair will hold or the piece needs rebuilding.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('flame', 22); ?><span><strong>Certified welders on every repair.</strong> Cracks and breaks are reinforced and rewelded by welders certified in the process the material needs.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>Mobile welding when you can&rsquo;t come to us.</strong> We repair on-site across San Antonio for equipment and structures too costly to move.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="Our metal repair process">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">How It Works</span>
      <h2>How does the <span class="text-accent">repair process</span> work at AGA?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication follows a four-step process on every repair in San Antonio: inspect and diagnose, quote the fix, repair or rebuild, then finish and return. We confirm the plan with you before any cutting or welding starts.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Inspect &amp; diagnose</b>
        <span>We examine the crack, break, or wear point and identify why the steel failed, not just where.</span>
      </li>
      <li>
        <b>Quote the fix</b>
        <span>We give you a clear repair-or-rebuild recommendation and an itemized estimate before work begins.</span>
      </li>
      <li>
        <b>Repair or rebuild</b>
        <span>Certified welders patch, reinforce, or rebuild the section in-shop or on-site with mobile welding.</span>
      </li>
      <li>
        <b>Finish &amp; return</b>
        <span>We grind and finish the repair, then return the piece to service at your San Antonio location.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to other fabricators">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>What sets AGA apart for <span class="text-accent">metal repair</span> in San Antonio?</h2>
    </div>
    <p class="answer-block">The difference is diagnosis before the torch. AGA Welding &amp; Fabrication identifies why the steel failed before repairing it, while a quick patch job without that step often cracks again at the same spot within months.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-3 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA Welding &amp; Fabrication</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Damage diagnosed before repair begins</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Honest repair-vs-rebuild recommendation</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Certified welders, shop or mobile</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Same-day and rush service available</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Typical alternative</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Quick patch weld with no root-cause check</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Same crack reappears months later</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> No mobile option &mdash; you haul it in</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Long wait for a repair slot</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK ============================ -->
<section class="section section--light sp-gallery" id="recent-work" aria-label="Recent metal repair work">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What has AGA <span class="text-accent">repaired recently</span>?</h2>
    </div>
    <p class="answer-block">Recent repair work out of our San Antonio shop &mdash; structural members, reinforced sections, and rebuilt assemblies restored to working condition. Every piece below was repaired by AGA Welding &amp; Fabrication.</p>

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
<section class="section" aria-label="Metal repair FAQs">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">FAQ</span>
      <h2>What do San Antonio clients ask about <span class="text-accent">metal repair</span>?</h2>
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
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a metal repair estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Ready to get damaged steel repaired in San Antonio?</h2>
      <p>Send AGA Welding &amp; Fabrication a photo or description of the damage and we&rsquo;ll follow up the same day with a clear, itemized estimate. Rush and mobile service are available when downtime can&rsquo;t wait.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
