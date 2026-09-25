<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Service page — Additional Services (welding process group) | AGA Welding & Fabrication (Phase 4)
 * ------------------------------------------------------------------------- */
$pageType    = 'service';
$serviceSlug = 'additional-services';
$currentPage = 'services';

/* Pull this service from config (has $svc['subServices'] = 8 welding types) */
$svc = null;
foreach ($services as $s) { if ($s['slug'] === $serviceSlug) { $svc = $s; break; } }

$pageTitle       = 'Additional Welding Services San Antonio, TX | ' . $siteName;
$pageDescription = 'Pipe, stick, MIG, TIG, flux-cored, structural, and mobile welding plus custom metal fabrication in San Antonio, TX. AGA Welding & Fabrication covers every process. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/additional-services/';
$ogImage         = $siteUrl . '/assets/images/welding-steel-beam-san-antonio.jpg';

/* Hero image + LCP preload (v6.3) */
$heroImg = 'welding-steel-beam-san-antonio';
$heroPreload = [
    'srcset' => '/assets/images/' . $heroImg . '-480.avif 480w, /assets/images/' . $heroImg . '-960.avif 960w, /assets/images/' . $heroImg . '-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* FAQs — unique to the welding-process group page */
$faqs = [
    [
        'q' => 'What is the difference between MIG and TIG welding?',
        'a' => 'MIG welding feeds a continuous wire electrode and welds faster, making it well-suited to thicker structural steel and higher-volume work. TIG welding uses a non-consumable tungsten electrode for slower, more precise welds on thinner material or where appearance matters. AGA Welding & Fabrication selects the process based on your San Antonio project\'s material and finish needs.',
    ],
    [
        'q' => 'Do you offer mobile welding in San Antonio?',
        'a' => 'Yes. AGA Welding & Fabrication brings mobile welding equipment to job sites across San Antonio and Bexar County for repairs, structural work, and fabrication that can\'t be moved to our Gardner Rd shop. Call ahead so we can confirm equipment and scheduling for your site.',
    ],
    [
        'q' => 'Are your welders certified?',
        'a' => 'Yes. AGA Welding & Fabrication employs certified welders trained in MIG, TIG, stick, and flux-cored processes, matching the certified procedure to the material, joint, and load requirement on every San Antonio job, from small repairs to structural fabrication.',
    ],
    [
        'q' => 'Can you weld stainless steel and aluminum, not just carbon steel?',
        'a' => 'Yes. AGA Welding & Fabrication welds carbon steel, stainless steel, and aluminum using the process suited to each metal &mdash; typically TIG for aluminum and thin stainless, MIG for carbon steel production work. Tell us the material when you request a quote so we prep correctly.',
    ],
];

/* Schema */
$serviceSchema = generateServiceSchema($svc, $canonicalUrl);
$faqSchema     = generateFAQSchema($faqs);
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home',     'url' => $siteUrl . '/'],
    ['name' => 'Services', 'url' => $siteUrl . '/services/'],
    ['name' => 'Additional Services', 'url' => $canonicalUrl],
]);

/* "Other services" — 3 related, excluding this one */
$relatedSlugs = ['steel-fabrication', 'structural-steel-fabrication', 'metal-repair'];

/* Welding process card data: photo + icon + description + 3 bullets, per confirmed subServices */
$processCards = [
    'Pipe Welding' => [
        'img'  => 'custom-metal-pipe-support',
        'icon' => 'flame',
        'alt'  => 'Custom-built steel pipe support fabricated and welded by AGA in San Antonio',
        'desc' => 'Circumferential and structural pipe welds for supports, runs, and fittings.',
        'bul'  => ['Structural &amp; utility pipe', 'Leak-tight circumferential welds', 'Supports &amp; fittings fabricated'],
    ],
    'Stick Welding' => [
        'img'  => 'welding-fabrication-shop',
        'icon' => 'flame',
        'alt'  => 'Welder making a bright arc weld inside the AGA San Antonio shop',
        'desc' => 'Rugged shielded-metal-arc welding for outdoor, thicker, or field repair work.',
        'bul'  => ['Strong welds on thicker metal', 'Handles rust &amp; mill scale', 'Reliable for field repairs'],
    ],
    'MIG Welding' => [
        'img'  => 'welding-steel-beam-san-antonio',
        'icon' => 'flame',
        'alt'  => 'Certified welder joining a structural steel beam using MIG welding',
        'desc' => 'Fast, clean wire-fed welding for production runs and structural steel.',
        'bul'  => ['Efficient for longer weld runs', 'Clean, consistent beads', 'Great for structural steel'],
    ],
    'TIG Welding' => [
        'img'  => 'steel-beam-fabrication',
        'icon' => 'flame',
        'alt'  => 'Welder fabricating long structural steel beams at the AGA shop',
        'desc' => 'Precise, controlled welds for thin material, stainless, and aluminum.',
        'bul'  => ['Precision on thin material', 'Ideal for stainless &amp; aluminum', 'Clean, cosmetic-grade welds'],
    ],
    'Flux-Cored Welding' => [
        'img'  => 'structural-steel-beams',
        'icon' => 'flame',
        'alt'  => 'Fabricated structural steel I-beams stacked at the AGA San Antonio shop',
        'desc' => 'High-deposition welding for thick sections and outdoor field conditions.',
        'bul'  => ['High deposition, less downtime', 'Performs well outdoors', 'Suited to thick sections'],
    ],
    'Structural Welding' => [
        'img'  => 'structural-steel-frame',
        'icon' => 'building-2',
        'alt'  => 'Geometric steel dome framework fabricated in-house at AGA Welding &amp; Fabrication',
        'desc' => 'Code-focused welding on beams, columns, and load-bearing framework.',
        'bul'  => ['Load-bearing steel connections', 'Certified weld procedures', 'Inspection-ready joints'],
    ],
    'Mobile Welding' => [
        'img'  => 'structural-steel-delivery',
        'icon' => 'truck',
        'alt'  => 'Fabricated steel loaded on a flatbed trailer for delivery from the AGA shop',
        'desc' => 'On-site welding across San Antonio when the job can\'t come to our shop.',
        'bul'  => ['Equipment brought to your site', 'Repairs &amp; structural work', 'Bexar County coverage'],
    ],
    'Custom Metal Fabrication' => [
        'img'  => 'custom-steel-fabrication',
        'icon' => 'hammer',
        'alt'  => 'Custom steel assembly taking shape on the AGA shop floor in San Antonio',
        'desc' => 'Cut-to-weld custom parts and assemblies built from your design or drawing.',
        'bul'  => ['One-off &amp; small-batch parts', 'Built from your drawing', 'Finished &amp; ready to install'],
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $serviceSchema; ?></script>
<script type="application/ld+json"><?php echo $faqSchema; ?></script>
<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="Additional welding services in San Antonio, TX">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $heroImg; ?>-480.avif 480w, /assets/images/<?php echo $heroImg; ?>-960.avif 960w, /assets/images/<?php echo $heroImg; ?>-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/<?php echo $heroImg; ?>.jpg"
           srcset="/assets/images/<?php echo $heroImg; ?>-480.webp 480w, /assets/images/<?php echo $heroImg; ?>-960.webp 960w, /assets/images/<?php echo $heroImg; ?>-1600.webp 1600w"
           sizes="100vw"
           alt="Certified welder joining a structural steel beam at AGA Welding & Fabrication in San Antonio, TX"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">Additional Services &middot; San Antonio, TX</span>
        <h1 class="hero-title">Every Welding Process, One <span class="text-accent">San Antonio</span> Shop</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication covers pipe, stick, MIG, TIG, flux-cored, and structural welding, plus mobile welding and custom metal fabrication &mdash; certified welders matching the right process to your San Antonio project's material and load.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#process-cards">See all processes</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('flame', 18); ?> 8 welding processes</li>
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
              <option value="Custom Metal Fabrication">Custom Metal Fabrication</option>
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
  <span>Additional Services</span>
</nav>

<!-- ============================ SERVICE DETAIL / ANSWER-FIRST ============================ -->
<section class="section" aria-label="Additional welding services overview">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What welding processes does <span class="text-accent">AGA offer in San Antonio</span>?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication offers the full range of welding processes &mdash; pipe, stick, MIG, TIG, flux-cored, and structural welding &mdash; plus mobile welding and custom metal fabrication, so San Antonio clients get the right process for their material in one shop instead of chasing specialists.</p>

    <div class="grid-asymmetric" style="margin-top:2rem; display:grid; gap:2rem;">
      <div class="prose reveal-up">
        <p>Different metals and joints call for different welding processes, and San Antonio projects rarely need just one. AGA Welding &amp; Fabrication's certified welders are trained across pipe, stick, MIG, TIG, and flux-cored welding, so we choose the process that fits your material and load instead of forcing every job through the same technique.</p>
        <p>Beyond the core welding processes, our Gardner Rd shop also handles structural welding for beams and framework, mobile welding for equipment and structures that can't be moved, and custom metal fabrication for one-off parts built from your drawing or concept.</p>
        <p>Whatever combination your San Antonio project needs &mdash; a stainless TIG weld here, a structural MIG run there, mobile stick welding on-site &mdash; it happens under one roof with certified welders who know which process the job actually calls for.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================ WELDING PROCESS CARDS GRID ============================ -->
<section class="section section--light" id="process-cards" aria-label="Welding process options">
  <div class="container-wide">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Welding Processes</span>
      <h2>Which <span class="text-accent">welding process</span> fits your San Antonio job?</h2>
      <p class="hero-answer">From pipe and structural welding to mobile on-site work and custom fabrication, AGA Welding &amp; Fabrication matches the process to your metal, joint, and project. Browse the eight services below or request a quote and we'll recommend the right fit.</p>
    </div>

    <div class="services-grid">
      <?php
      $pi = 0;
      foreach ($processCards as $procName => $pc):
          $tintN = ($pi % 3) + 1;
          $delay = ($pi % 3) + 1;
          $pimg  = $pc['img'];
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tintN; ?> reveal-up reveal-delay-<?php echo $delay; ?>">
        <div class="service-card__image">
          <picture>
            <source type="image/avif" srcset="/assets/images/<?php echo $pimg; ?>-480.avif 480w, /assets/images/<?php echo $pimg; ?>-960.avif 960w" sizes="(max-width: 768px) 100vw, 340px">
            <img src="/assets/images/<?php echo $pimg; ?>.jpg"
                 srcset="/assets/images/<?php echo $pimg; ?>-480.webp 480w, /assets/images/<?php echo $pimg; ?>-960.webp 960w"
                 sizes="(max-width: 768px) 100vw, 340px"
                 alt="<?php echo htmlspecialchars($pc['alt']); ?>"
                 width="600" height="360" loading="lazy" decoding="async">
          </picture>
        </div>
        <div class="service-card__body">
          <div class="service-card__icon"><?php echo icon($pc['icon'], 22); ?></div>
          <h3><?php echo htmlspecialchars($procName); ?></h3>
          <p class="service-card__desc"><?php echo htmlspecialchars($pc['desc']); ?></p>
          <ul>
            <?php foreach ($pc['bul'] as $bullet): ?>
            <li><?php echo $bullet; ?></li>
            <?php endforeach; ?>
          </ul>
          <button type="button" class="service-card__cta" data-open-estimate>Get a quote</button>
        </div>
      </article>
      <?php $pi++; endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================ INDIVIDUAL SERVICE DETAILS ============================ -->
<section class="section" aria-label="Welding process details">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">The Details</span>
      <h2>Which welding process does your <span class="text-accent">San Antonio project</span> need?</h2>
    </div>
    <p class="answer-block">Each welding process trades off speed, precision, and material compatibility differently, so the right choice depends on your metal, joint, and setting. Here's how AGA Welding &amp; Fabrication decides which process to use on a San Antonio job.</p>

    <div class="prose reveal-up" style="margin-top:2rem;">
      <h3>Pipe Welding</h3>
      <p>Pipe welding joins pipe sections and fittings with welds that run the full circumference of the joint, a discipline that demands consistent penetration all the way around. San Antonio clients need this for utility runs, structural pipe supports, and equipment piping where a leak or weak point isn't an option.</p>

      <h3>Stick Welding</h3>
      <p>Stick welding, or shielded metal arc welding, uses a flux-coated electrode that burns down as it welds, making it durable in outdoor conditions and effective on metal with mill scale or light rust. It's a common choice for field repairs and thicker structural steel across San Antonio job sites.</p>

      <h3>MIG Welding</h3>
      <p>MIG welding feeds a continuous wire electrode through the gun, producing fast, clean welds well suited to production runs and structural steel. Most of AGA's structural fabrication in San Antonio relies on MIG welding for its speed and consistent bead quality on thicker carbon steel.</p>

      <h3>TIG Welding</h3>
      <p>TIG welding uses a non-consumable tungsten electrode and a separate filler rod for slow, highly controlled welds, making it the process of choice for stainless steel, aluminum, and thinner material where appearance and precision matter. Custom metalwork and visible welds often call for TIG.</p>

      <h3>Flux-Cored Welding</h3>
      <p>Flux-cored welding uses a tubular wire filled with flux, giving it high deposition rates and strong performance in outdoor or windy conditions where shielding gas would blow away. It's a practical choice for thick structural sections on San Antonio sites without shop shelter.</p>

      <h3>Structural Welding</h3>
      <p>Structural welding joins beams, columns, and framework that carry building loads, following certified procedures so every connection meets code. AGA Welding &amp; Fabrication uses structural welding on framing, supports, and load-bearing assemblies for San Antonio commercial and industrial projects.</p>

      <h3>Mobile Welding</h3>
      <p>Mobile welding brings certified welders and equipment directly to your San Antonio site for repairs, modifications, or fabrication on structures and equipment too large or fixed to move. It's the right call for fencing, heavy equipment, and structural steel already in place.</p>

      <h3>Custom Metal Fabrication</h3>
      <p>Custom metal fabrication covers one-off and small-batch parts built from your drawing, sketch, or concept rather than a standard catalog spec. San Antonio clients use this for brackets, gates, signage frames, and other pieces that don't exist as a stock item.</p>
    </div>
  </div>
</section>

<!-- ============================ PROCESS ============================ -->
<section class="section section--light" aria-label="How we work with you">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">How It Works</span>
      <h2>How does AGA choose the right <span class="text-accent">welding process</span> for your job?</h2>
    </div>
    <p class="answer-block">AGA Welding &amp; Fabrication follows a four-step process on every job in San Antonio: consult and quote, select the process and material, weld and fabricate, then deliver or complete on-site. You know which process we're using and why before work begins.</p>

    <ol class="process-steps reveal-up" style="margin-top:1.5rem;">
      <li>
        <b>Consult &amp; quote</b>
        <span>We review your drawings, photos, or a description of the job and give you a clear, itemized estimate.</span>
      </li>
      <li>
        <b>Select process &amp; material</b>
        <span>We match the welding process &mdash; MIG, TIG, stick, flux-cored, or pipe &mdash; to your metal type, joint, and load requirement.</span>
      </li>
      <li>
        <b>Weld &amp; fabricate</b>
        <span>Certified welders complete the work in our Gardner Rd shop or on-site with mobile welding equipment.</span>
      </li>
      <li>
        <b>Deliver or complete on-site</b>
        <span>Shop work is finished and delivered ready to install; on-site work is completed, cleaned up, and inspected with you.</span>
      </li>
    </ol>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<section class="section section--light" aria-label="Additional welding services FAQs">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">FAQ</span>
      <h2>Which questions come up most about <span class="text-accent">welding processes in San Antonio</span>?</h2>
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
<section class="section" aria-label="Other services you may need">
  <div class="container-wide">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">More From AGA</span>
      <h2>What other <span class="text-accent">fabrication services</span> does AGA provide?</h2>
    </div>
    <div class="services-grid" style="grid-template-columns:repeat(3,1fr);">
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/related-services.php'; ?>
    </div>
  </div>
</section>

<!-- ============================ FINAL CTA ============================ -->
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a welding estimate">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Free Estimate</span>
      <h2>Not sure which welding process your San Antonio project needs?</h2>
      <p>Tell AGA Welding &amp; Fabrication about your material and project and we&rsquo;ll recommend the right process, then follow up the same day with a clear, itemized estimate.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse all services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
