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

$pageTitle       = 'General Repairs & Modifications San Antonio, TX | ' . $siteName;
$pageDescription = 'Steel repairs and modifications in San Antonio, TX. AGA Welding & Fabrication retrofits, reinforces, and alters steel in-shop or on-site. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/general-repairs-modifications/';
$ogImage         = $siteUrl . '/assets/images/custom-steel-fabrication.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'custom-steel-fabrication';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Recent-work photos for this service (real shop photos) */
$spGallery = [
    ['img' => 'welding-fabrication-shop',        'cap' => 'Arc welding a modification onto an existing steel structure'],
    ['img' => 'welding-steel-beam-san-antonio',  'cap' => 'Certified welder altering a steel member to spec'],
    ['img' => 'welded-steel-stands',             'cap' => 'Modified and reinforced steel components on the shop floor'],
];

/* FAQs — unique to general repairs & modifications in San Antonio */
$faqs = [
    [
        'q' => 'How do I know if my steel structure needs repair or full replacement?',
        'a' => 'AGA Welding & Fabrication inspects the damaged section in person or from photos and gives you an honest answer — most localized cracks, worn mounts, and bent members are repairable, while structures with widespread failure may cost more to patch than replace.',
    ],
    [
        'q' => "Can you modify equipment or structures that weren't originally welded by AGA?",
        'a' => 'Yes. We repair and modify steel regardless of who originally built it. Our certified welders assess the existing material and welds, then match the repair method so the new work performs consistently with the rest of the structure.',
    ],
    [
        'q' => "Do you offer mobile welding for repairs that can't come to the shop?",
        'a' => 'Yes. When a structure is too large to move or taking it offline isn\'t practical, AGA Welding & Fabrication brings mobile welding equipment to your San Antonio site and completes the repair or modification in place.',
    ],
    [
        'q' => "How fast can you repair equipment that's currently down?",
        'a' => 'AGA Welding & Fabrication prioritizes downtime repairs and can often quote and schedule urgent jobs the same day. Turnaround depends on the extent of the damage, but we\'ll give you a realistic timeline before work begins.',
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
<section class="hero hero--photo" aria-label="General repairs and modifications in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="AGA welder modifying a fabricated steel assembly in the San Antonio shop"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">General Repairs &amp; Modifications &middot; San Antonio, TX</span>
        <h1 class="hero-title">Steel Repairs &amp; Modifications for <span class="text-accent">San Antonio</span> Structures</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication repairs, retrofits, and modifies steel structures and equipment for San Antonio businesses and property owners &mdash; patching damage, reinforcing weak points, adding brackets or mounts, and altering existing steel to fit a new use, handled in our Gardner Rd shop or on-site with mobile welding.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('wrench', 18); ?> Repairs &amp; retrofits</li>
          <li><?php echo icon('hammer', 18); ?> Modifications on-site or in-shop</li>
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
      <h2>What counts as a <span class="text-accent">general repair or modification</span> at AGA?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication handles the repair and modification work that doesn&rsquo;t fit neatly into one category &mdash; patching a cracked frame, reinforcing a worn support, adding a bracket or mount, or altering an existing structure for a new purpose. If it&rsquo;s steel and it needs fixing or changing, our San Antonio shop takes it on.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>AGA Welding &amp; Fabrication has been repairing and modifying steel for San Antonio since 1983, when the family-run shop first opened on Gardner Rd. Equipment breaks, structures age, and plans change &mdash; a trailer frame cracks, a rack needs a new mounting point, a gate has to be widened for a new vehicle. We look at the piece, tell you honestly whether it&rsquo;s a repair or a rebuild, and quote accordingly.</p>
        <p>Our certified welders repair carbon steel, stainless, and aluminum using MIG, TIG, stick, and flux-cored processes, matching the method to the metal and the stress the piece will carry again once it&rsquo;s back in service. Modifications get the same care &mdash; cutting, reshaping, and re-welding so the altered structure holds up exactly like a piece built that way from the start.</p>
        <p>Most repairs come to our southeast San Antonio shop, but when a structure is too large to move or downtime isn&rsquo;t an option, we bring mobile welding to your site &mdash; commercial, industrial, or residential. Either way, the same certified welders who fabricate new steel handle the repair, so the fix matches the original work in quality.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When steel needs repair">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When does <span class="text-accent">steel</span> need repair instead of replacement?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication repairs steel when the base structure is sound and the damage or wear is localized &mdash; cracks, worn mounts, bent members, or outdated fittings. Replacement only makes sense when the steel itself has failed. Here&rsquo;s how San Antonio clients usually tell the two apart.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('wrench', 22); ?></div>
        <h3>A crack or break has formed</h3>
        <p>A weld has failed or the metal has cracked under stress &mdash; often fixable with the right repair weld and reinforcement.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('scissors', 22); ?></div>
        <h3>The structure needs a new function</h3>
        <p>Adding a bracket, cutting an opening, or resizing a frame for new equipment counts as a modification, not a rebuild.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('layers', 22); ?></div>
        <h3>Wear has weakened a load point</h3>
        <p>Rust, fatigue, or years of use have thinned a critical section &mdash; reinforcing it now is cheaper than replacing the whole piece.</p>
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
        <p class="lead" style="margin-top:.5rem;">years repairing and modifying steel in San Antonio &mdash; a family-run shop that has kept local equipment and structures running since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why do San Antonio businesses call AGA for <span class="text-accent">repairs and modifications</span>?</h2>
        <ul class="service-card-with-image" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('badge-check', 22); ?><span><strong>Certified welders diagnose and fix.</strong> The same certified welders who fabricate new steel evaluate your repair, so the fix is engineered, not guessed at.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('wrench', 22); ?><span><strong>Repairs matched to the original build.</strong> We match material, weld type, and finish to the existing structure so the repaired section performs like the rest of it.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>In-shop or on-site, your choice.</strong> Bring it to Gardner Rd or we&rsquo;ll bring mobile welding to your San Antonio site when the piece can&rsquo;t be moved.</span></li>
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
    <p class="answer-block">AGA Welding &amp; Fabrication follows the same four-step process on every repair: inspect and quote, plan the fix, weld and modify, then finish and return to service. You get a clear diagnosis and price before we touch the steel, whether the job is in our shop or at your San Antonio site.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Inspect &amp; quote</b>
        <span>We assess the damage or the change you need in person or from photos and give you a straight answer and a price.</span>
      </li>
      <li>
        <b>Plan the fix</b>
        <span>We decide the repair method or modification approach, matching material and weld type to what&rsquo;s already there.</span>
      </li>
      <li>
        <b>Weld &amp; modify</b>
        <span>Certified welders make the repair or alteration in-shop or on-site with mobile welding equipment.</span>
      </li>
      <li>
        <b>Finish &amp; return to service</b>
        <span>We grind, finish, and inspect the work so the piece goes back into use ready for real load.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to a quick patch job">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>What makes AGA&rsquo;s <span class="text-accent">repair work</span> different from a quick patch job?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication repairs the actual problem instead of tacking a weld over it. Certified welders evaluate why a piece failed before fixing it, and modifications are engineered to carry real load &mdash; not just get you through the week.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-3 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA Welding &amp; Fabrication</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Certified welders diagnose the real problem</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Repairs matched to material and load, not just patched</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> In-shop or mobile welding across San Antonio</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Clear price before any welding starts</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Typical alternative</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> A quick weld over the symptom, not the cause</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> No evaluation of why the piece failed</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Limited to shop visits only</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Price changes once work is underway</li>
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
      <h2>What <span class="text-accent">repair and modification work</span> has AGA completed recently?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication recently completed a range of repair and modification work from our San Antonio shop &mdash; structures patched, brackets added, and equipment reinforced to get it back into service. Every job shown below was diagnosed and repaired in-house by our certified welders.</p>

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
      <h2>Got questions about <span class="text-accent">repairs and modifications in San Antonio</span>?</h2>
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
      <h2>What other <span class="text-accent">services</span> pair well with a repair or modification?</h2>
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
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a repair or modification estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Ready to get your steel repaired or modified in San Antonio?</h2>
      <p>Send AGA Welding &amp; Fabrication photos or details of what needs fixing or changing and we&rsquo;ll follow up the same day with a clear estimate. Mobile welding is available when the job can&rsquo;t come to us.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
