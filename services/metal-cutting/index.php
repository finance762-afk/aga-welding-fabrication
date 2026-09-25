<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Service page — Metal Cutting | AGA Welding & Fabrication (Phase 4)
 * ------------------------------------------------------------------------- */
$pageType    = 'service';
$serviceSlug = 'metal-cutting';
$currentPage = 'services';

/* Pull this service from config */
$svc = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $svc = $s; break; } }

$pageTitle       = 'Metal Cutting San Antonio, TX | ' . $siteName;
$pageDescription = 'Metal cutting in San Antonio, TX. AGA Welding & Fabrication saw-cuts steel, stainless, and aluminum to any gauge or profile for fabrication. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/metal-cutting/';
$ogImage         = $siteUrl . '/assets/images/metal-cutting-bandsaw.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'metal-cutting-bandsaw';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Recent-work photos for this service (real shop photos) */
$spGallery = [
    ['img' => 'structural-steel-beams',   'cap' => 'Steel cut to length and staged for fabrication'],
    ['img' => 'steel-beam-fabrication',   'cap' => 'Precision-cut beams ready for welding'],
    ['img' => 'custom-steel-fabrication', 'cap' => 'Cut components assembled on the AGA shop floor'],
];

/* FAQs — unique to metal cutting in San Antonio */
$faqs = [
    [
        'q' => 'What metal cutting methods does AGA use?',
        'a' => 'AGA Welding & Fabrication cuts steel, stainless, and aluminum stock with band saws and shop equipment matched to the material thickness and profile, producing clean, square cuts ready for welding or forming. Tell us your material and dimensions and we will confirm the right cutting method for your San Antonio project.',
    ],
    [
        'q' => 'Can you cut metal to exact lengths from a cut list?',
        'a' => 'Yes. AGA Welding & Fabrication cuts from a supplied cut list, drawing, or single sample piece, holding consistent length and squareness across every run. This is common for structural members and repeat parts where multiple identical cuts have to match for a San Antonio job.',
    ],
    [
        'q' => 'Do you cut plate, tube, angle, and bar stock?',
        'a' => 'AGA Welding & Fabrication cuts a full range of steel profiles &mdash; plate, tube, angle, channel, and bar stock &mdash; in the gauge and grade your project calls for. Whether it is a single cut or a bulk order, we prep the stock so it is ready for the next fabrication step.',
    ],
    [
        'q' => 'Is metal cutting available as a standalone service, or only with fabrication?',
        'a' => 'Metal cutting is available on its own for San Antonio contractors and shops that need raw stock cut to size before they weld or install it themselves, or bundled with our full fabrication process when you need the piece cut, welded, and finished in one visit.',
    ],
];

/* Schema */
$serviceSchema = generateServiceSchema($svc, $canonicalUrl);
$faqSchema     = generateFAQSchema($faqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',     'url' => $siteUrl . '/'],
    ['name' => 'Services', 'url' => $siteUrl . '/services/'],
    ['name' => 'Metal Cutting', 'url' => $canonicalUrl],
]);

/* "Other services" — 3 related, excluding this one */
$relatedSlugs = ['metal-bending', 'steel-fabrication', 'sheet-metal-fabrication'];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="Metal cutting in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Band saw and roller conveyor cutting steel stock in the AGA fabrication shop, San Antonio, TX"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Metal Cutting &middot; San Antonio, TX</span>
        <h1 class="hero-title">Metal Cutting in <span class="text-accent">San Antonio</span> Done to Exact Spec</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication saw-cuts steel, stainless, and aluminum stock to any gauge or profile for San Antonio contractors and shops. Every cut is measured and squared before it leaves our floor, ready for welding, forming, or installation.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('scissors', 18); ?> Band saw, shear &amp; profile cuts</li>
          <li><?php echo icon('ruler', 18); ?> Any gauge or profile</li>
          <li><?php echo icon('badge-check', 18); ?> Clean, square cuts</li>
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
              <option value="Metal Cutting">Metal Cutting</option>
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
  <span>Metal Cutting</span>
</nav>

<!-- ============================ SERVICE DETAIL / ANSWER-FIRST ============================ -->
<section class="section" aria-label="Metal cutting overview">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What does <span class="text-accent">metal cutting</span> at AGA actually deliver?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication cuts steel, stainless, and aluminum in our San Antonio shop &mdash; the first step that turns raw stock into a usable, accurate piece, measured, marked, and cut square to your dimensions. The stock you receive is ready to weld, form, or install.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>Contractors, fabricators, and property owners across San Antonio send AGA Welding &amp; Fabrication cut lists, drawings, or a single sample piece when they need raw metal stock cut to precise length and profile. We confirm dimensions and material grade before the first cut is made.</p>
        <p>Our shop cuts plate, tube, angle, channel, and bar stock with band saws and shop equipment sized to the material thickness, holding consistent squareness across a run so every piece matches whether you need one cut or a bulk order.</p>
        <p>Because cutting happens in the same Gardner Rd shop where we weld, form, and finish, a cut piece can move straight into fabrication without a hand-off &mdash; or we deliver cut stock on its own to your San Antonio job site or shop, ready for you to work with.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROBLEM / SIGNS (bento) ============================ -->
<section class="section section--light" aria-label="When you need professional metal cutting">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Know the Signs</span>
      <h2>When should you have metal cut by a <span class="text-accent">professional shop</span>?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication cuts with shop equipment built for accuracy whenever hand tools and portable saws would struggle &mdash; heavy gauge stock, long repeat runs, and tight length tolerances. Here is when San Antonio clients bring us their cutting work.</p>

    <div class="grid-3" style="display:grid; gap:1rem; grid-template-columns:repeat(3,1fr); margin-top:1.5rem;">
      <div class="card reveal-up">
        <div class="service-card__icon"><?php echo icon('ruler', 22); ?></div>
        <h3>Every piece needs to match exactly</h3>
        <p>Repeat cuts for a structural run or a set of identical brackets need consistent length and squareness across the batch.</p>
      </div>
      <div class="card reveal-up reveal-delay-1">
        <div class="service-card__icon"><?php echo icon('scissors', 22); ?></div>
        <h3>The material is too thick for hand tools</h3>
        <p>Heavy plate, structural tube, and thick bar stock need shop-grade cutting equipment, not a portable saw.</p>
      </div>
      <div class="card reveal-up reveal-delay-2">
        <div class="service-card__icon"><?php echo icon('wrench', 22); ?></div>
        <h3>The cut feeds straight into fabrication</h3>
        <p>When the cut piece needs to be welded or formed next, cutting and fabrication under one roof saves a hand-off.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ EXPERT POSITIONING ============================ -->
<section class="section" aria-label="Why choose AGA for metal cutting">
  <div class="container">
    <div class="split" style="display:grid; grid-template-columns:1fr 1fr; gap:clamp(2rem,5vw,4rem); align-items:center;">
      <div class="reveal-left">
        <span class="big-number">43</span>
        <p class="lead" style="margin-top:.5rem;">years cutting and fabricating metal for San Antonio &mdash; a family-run shop working from the same Gardner Rd location since 1983.</p>
      </div>
      <div class="reveal-right">
        <h2 style="margin-bottom:1rem;">Why do San Antonio shops trust AGA for <span class="text-accent">metal cutting</span>?</h2>
        <ul class="service-card-with-image" style="list-style:none; padding:0; margin:0; display:grid; gap:.9rem;">
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('ruler', 22); ?><span><strong>Measured before it&rsquo;s cut.</strong> We confirm dimensions and material grade against your cut list or drawing before the saw runs.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('scissors', 22); ?><span><strong>Consistent across the run.</strong> Whether it&rsquo;s one piece or a bulk order, every cut holds the same length and squareness.</span></li>
          <li style="display:flex; gap:.7rem; align-items:flex-start;"><?php echo icon('truck', 22); ?><span><strong>Ready for the next step.</strong> Cut stock moves straight into our welding and fabrication process, or we deliver it to your San Antonio site as-is.</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="Our metal cutting process">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">How It Works</span>
      <h2>How does AGA handle a <span class="text-accent">metal cutting order</span> start to finish?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication runs every cutting order through four steps: confirm the cut list, select and stage material, cut to spec, then inspect and deliver. Confirming dimensions up front keeps San Antonio orders accurate on the first pass.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Confirm cut list &amp; quote</b>
        <span>We review your cut list, drawing, or sample piece and confirm quantities and material before quoting the job.</span>
      </li>
      <li>
        <b>Select &amp; stage material</b>
        <span>We source or pull the correct grade and profile of stock and stage it for cutting to your specification.</span>
      </li>
      <li>
        <b>Cut to spec</b>
        <span>Each piece is measured, marked, and cut square, with repeat runs checked for consistent length.</span>
      </li>
      <li>
        <b>Inspect &amp; deliver</b>
        <span>We check finished cuts against your order and deliver or hand off cut stock to your San Antonio location.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ COMPARISON ============================ -->
<section class="section" aria-label="AGA compared to other cutting options">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Difference</span>
      <h2>What sets AGA apart for <span class="text-accent">metal cutting in San Antonio</span>?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication cuts to spec on equipment built for consistent, square cuts, and a cut piece can move straight into welding or forming without leaving the building &mdash; shop-grade accuracy with a direct path into fabrication.</p>

    <div class="grid-2" style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-top:1.5rem;">
      <div class="card card-tint-3 reveal-left">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('badge-check', 22); ?> AGA Welding &amp; Fabrication</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Shop-grade band saws for clean, square cuts</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Consistent length across repeat runs</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Cut stock moves straight into fabrication</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('check', 18); ?> Delivery available across San Antonio</li>
        </ul>
      </div>
      <div class="card reveal-right">
        <h3 style="display:flex; align-items:center; gap:.5rem;"><?php echo icon('info', 22); ?> Typical alternative</h3>
        <ul style="list-style:none; padding:0; margin:.75rem 0 0; display:grid; gap:.6rem;">
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Portable saws that struggle with heavy stock</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Length drift across a multi-piece run</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> Cut stock has to ship elsewhere for welding</li>
          <li style="display:flex; gap:.5rem;"><?php echo icon('minus', 18); ?> You arrange your own pickup or freight</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK ============================ -->
<section class="section section--light sp-gallery" id="recent-work" aria-label="Recent metal cutting work">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>What metal has AGA <span class="text-accent">recently cut and fabricated</span>?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication recently cut structural beams and custom steel components to length out of our San Antonio shop, staging each piece for the next stage of assembly. Every piece below started with a precise cut made in-house.</p>

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
<section class="section" aria-label="Metal cutting FAQs">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">FAQ</span>
      <h2>What do San Antonio fabricators ask about <span class="text-accent">metal cutting</span>?</h2>
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
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a metal cutting estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Ready to get your metal cut in San Antonio?</h2>
      <p>Send AGA Welding &amp; Fabrication your cut list or project details and we&rsquo;ll follow up the same day with a clear, itemized estimate. Rush service is available when your deadline can&rsquo;t wait.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
