<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Homepage — AGA Welding & Fabrication (Phase 3)
 * ------------------------------------------------------------------------- */
$pageType    = 'home';
$currentPage = 'home';

$pageTitle       = 'Welding & Metal Fabrication in San Antonio, TX | ' . $siteName;
$pageDescription = 'AGA Welding & Fabrication delivers structural steel, custom metalwork, and certified MIG, TIG & stick welding across San Antonio, TX. Family-run since 1983. Free estimates.';
$canonicalUrl    = $siteUrl . '/';
$ogImage         = $siteUrl . '/assets/images/welding-steel-beam-san-antonio.jpg';

/* Hero LCP image preload (v6.3 — AVIF srcset) */
$heroPreload = [
    'srcset' => '/assets/images/welding-steel-beam-san-antonio-480.avif 480w, /assets/images/welding-steel-beam-san-antonio-960.avif 960w, /assets/images/welding-steel-beam-san-antonio-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* FAQs — from research brief (5) + one local-service question */
$faqs = [
    [
        'q' => 'What metal fabrication services does AGA Welding & Fabrication offer?',
        'a' => 'AGA Welding & Fabrication provides structural steel work, custom welding, metal staircases and railings, awnings, storage racks, industrial components, and specialized fabrication. We work with a wide range of metals and handle projects of any scale across San Antonio.',
    ],
    [
        'q' => 'How fast can you turn around a fabrication project?',
        'a' => 'Timeline depends on scope and complexity. AGA Welding & Fabrication prioritizes efficiency without cutting corners, and we set a realistic schedule with you during the consultation. Rush service is available for urgent repairs and deadlines.',
    ],
    [
        'q' => 'Do you work from existing drawings, or can you help with the design?',
        'a' => 'We do both. Our San Antonio team can consult on your concept and bring an idea to life from scratch, or fabricate directly from your existing blueprints and specifications.',
    ],
    [
        'q' => 'Are your welders certified, and what quality guarantees do you provide?',
        'a' => 'All of our welders are certified professionals. AGA Welding & Fabrication maintains rigorous quality-control standards on every joint and stands behind its work with a commitment to durability and precision.',
    ],
    [
        'q' => 'Do you serve residential clients or only commercial and industrial?',
        'a' => 'We serve commercial, industrial, and residential customers throughout San Antonio. Whether it is a backyard gate and railing or a large structural steel package, AGA Welding & Fabrication has the expertise to deliver.',
    ],
    [
        'q' => 'What areas around San Antonio does AGA Welding & Fabrication cover?',
        'a' => 'AGA Welding & Fabrication is based at 8249 Gardner Rd in southeast San Antonio (78263) and serves the greater San Antonio and Bexar County area. Our mobile welding service brings the crew directly to your job site when a project cannot come to the shop.',
    ],
];

/* Schema — FAQPage (LocalBusiness/Contractor already emitted in head.php) */
$schemaMarkup = generateFAQSchema($faqs);

/* Homepage services grid: first 8 of the full service list + View All */
$homeServiceCards = array_slice($services, 0, 8);

/* Photo + icon per home service card (real localized client photos) */
$serviceMedia = [
    'steel-fabrication'            => ['img' => 'structural-steel-beams',     'icon' => 'layers',       'alt' => 'Stacked fabricated structural steel I-beams at the AGA shop in San Antonio'],
    'structural-steel-fabrication' => ['img' => 'fabricated-steel-columns',   'icon' => 'building-2',   'alt' => 'Finished fabricated steel columns laid out inside the AGA welding shop'],
    'sheet-metal-fabrication'      => ['img' => 'custom-metal-pipe-support',  'icon' => 'ruler',        'alt' => 'Custom fabricated blue steel pipe support built by AGA Welding & Fabrication'],
    'metal-cutting'                => ['img' => 'metal-cutting-bandsaw',      'icon' => 'scissors',     'alt' => 'Band saw and roller conveyor cutting steel stock in the San Antonio fabrication shop'],
    'metal-bending'                => ['img' => 'structural-steel-delivery',  'icon' => 'wrench',       'alt' => 'Formed steel frames loaded on a flatbed trailer for delivery in San Antonio'],
    'metal-assembly'               => ['img' => 'welded-steel-stands',        'icon' => 'hammer',       'alt' => 'Welded steel A-frame stands assembled by AGA Welding & Fabrication'],
    'metal-repair'                 => ['img' => 'welding-fabrication-shop',   'icon' => 'flame',        'alt' => 'AGA welder repairing steel with a bright arc weld inside the San Antonio shop'],
    'structural-metal-repair'      => ['img' => 'steel-beam-fabrication',     'icon' => 'shield-check', 'alt' => 'Welder reinforcing long structural steel beams at AGA Welding & Fabrication'],
];

/* 3 short benefit bullets per card */
$serviceBullets = [
    'steel-fabrication'            => ['Precision cut & formed steel', 'Commercial & industrial work', 'Built to spec, every time'],
    'structural-steel-fabrication' => ['Code-compliant structural steel', 'Beams, columns & framing', 'Engineered for heavy loads'],
    'sheet-metal-fabrication'      => ['Cutting, bending & assembly', 'HVAC & industrial panels', 'Tight-tolerance metalwork'],
    'metal-cutting'                => ['Clean, accurate cuts', 'Any gauge or profile', 'Fast shop turnaround'],
    'metal-bending'                => ['Custom shapes & angles', 'Structural & decorative', 'Consistent, repeatable forms'],
    'metal-assembly'              => ['Multi-part steel structures', 'Skilled certified fitters', 'Welded, bolted & finished'],
    'metal-repair'                => ['Restore damaged equipment', 'On-site mobile welding', 'Patch, reinforce & rebuild'],
    'structural-metal-repair'     => ['Frame & framework repair', 'Safety-first reinforcement', 'Certified weld procedures'],
];

/* Recent-work gallery — 12 localized client photos (wide every 3rd) */
$galleryItems = [
    ['img' => 'structural-steel-beams',          'tag' => 'Steel Fabrication',       'cap' => 'Fabricated structural I-beams staged for delivery', 'wide' => true],
    ['img' => 'welding-fabrication-shop',         'tag' => 'Welding',                 'cap' => 'Arc welding in progress inside the shop',           'wide' => false],
    ['img' => 'custom-metal-pipe-support',        'tag' => 'Custom Metalwork',        'cap' => 'Custom-built steel pipe support, finish painted',   'wide' => false],
    ['img' => 'structural-steel-frame',           'tag' => 'Custom Metalwork',        'cap' => 'Geometric steel dome framework fabricated in-house','wide' => true],
    ['img' => 'fabricated-steel-columns',         'tag' => 'Structural Steel',        'cap' => 'Fabricated steel columns ready to ship',           'wide' => false],
    ['img' => 'welded-steel-stands',              'tag' => 'Metal Assembly',          'cap' => 'Welded A-frame steel stands',                      'wide' => false],
    ['img' => 'steel-beam-fabrication',           'tag' => 'Structural Steel',        'cap' => 'Long-span steel beams being fabricated',           'wide' => true],
    ['img' => 'metal-cutting-bandsaw',            'tag' => 'Metal Cutting',           'cap' => 'Cutting station with band saw and conveyor',        'wide' => false],
    ['img' => 'custom-steel-fabrication',         'tag' => 'Fabrication',             'cap' => 'Custom steel assembly taking shape on the shop floor','wide' => false],
    ['img' => 'structural-steel-delivery',        'tag' => 'Delivery',                'cap' => 'Fabricated steel loaded for a San Antonio job site','wide' => true],
    ['img' => 'aga-welding-fabrication-shop',     'tag' => 'Our Shop',                'cap' => 'The AGA Welding & Fabrication shop in San Antonio', 'wide' => false],
    ['img' => 'welding-steel-beam-san-antonio',   'tag' => 'Welding',                 'cap' => 'Certified welder joining a structural steel beam',  'wide' => false],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<!-- FAQ schema (LocalBusiness emitted in head.php) -->
<script type="application/ld+json">
<?php echo $schemaMarkup; ?>
</script>

<!-- ============================ HERO ============================ -->
<section class="hero hero--photo" aria-label="Welding and metal fabrication in San Antonio">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/welding-steel-beam-san-antonio-480.avif 480w, /assets/images/welding-steel-beam-san-antonio-960.avif 960w, /assets/images/welding-steel-beam-san-antonio-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/welding-steel-beam-san-antonio.jpg"
           srcset="/assets/images/welding-steel-beam-san-antonio-480.webp 480w, /assets/images/welding-steel-beam-san-antonio-960.webp 960w, /assets/images/welding-steel-beam-san-antonio-1600.webp 1600w"
           sizes="100vw"
           alt="AGA certified welder joining a structural steel beam in the San Antonio fabrication shop"
           width="1600" height="1199" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">

      <div class="hero-text">
        <span class="eyebrow">San Antonio, TX &middot; Since 1983</span>
        <h1 class="hero-title">Metal Fabrication &amp; <span class="text-accent">Welding</span> Built to Last in San Antonio</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication delivers precision structural steel, custom metalwork, and certified welding across San Antonio &mdash; from one-off repairs to full industrial builds, done right and on time.</p>

        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get my free estimate</button>
          <a class="btn btn-secondary btn-lg" href="#recent-work">See recent work</a>
        </div>

        <ul class="hero-chips">
          <li><?php echo icon('shield-check', 18); ?> Licensed &amp; insured</li>
          <li><?php echo icon('calendar-check', 18); ?> Family-run since 1983</li>
          <li><?php echo icon('badge-check', 18); ?> Certified welders</li>
        </ul>
      </div>

      <aside class="hero-form-card" id="estimate-form">
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
              <option value="">What do you need?</option>
              <?php foreach ($services as $heroSvc): ?>
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

<!-- ============================ PROOF STRIP ============================ -->
<section class="stats-band texture-grain slant-top" aria-label="Why San Antonio trusts AGA Welding &amp; Fabrication">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div class="stats-row">
      <div class="stat-item">
        <span class="stat-number">Est. <span>1983</span></span>
        <span class="stat-label">Fabricating in San Antonio</span>
      </div>
      <div class="stat-item">
        <span class="stat-number"><span>43</span> Years</span>
        <span class="stat-label">Welding &amp; metal fabrication</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">In-<span>House</span></span>
        <span class="stat-label">Cut, welded &amp; finished</span>
      </div>
      <div class="stat-item">
        <span class="stat-number"><span>Certified</span></span>
        <span class="stat-label">MIG &middot; TIG &middot; stick &middot; flux-cored</span>
      </div>
    </div>
  </div>
</section>

<!-- ============================ SERVICES ============================ -->
<section class="section" aria-label="Welding and metal fabrication services">
  <div class="container-wide">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What can <span class="text-accent">AGA fabricate and weld</span> for your San Antonio project?</h2>
      <p class="hero-answer">From structural steel and custom metalwork to on-site repairs, AGA Welding &amp; Fabrication handles the full range of welding and metal fabrication for San Antonio&rsquo;s commercial, industrial, and residential clients &mdash; using MIG, TIG, stick, and flux-cored processes.</p>
    </div>

    <div class="services-grid">
      <?php
      foreach ($homeServiceCards as $i => $svc):
          $slug  = $svc['slug'];
          $media = $serviceMedia[$slug];
          $img   = $media['img'];
          $tintN = ($i % 3) + 1;   // tint + delay rotate 1 → 2 → 3
          $delay = ($i % 3) + 1;
      ?>
      <article class="service-card-with-image card-tint-<?php echo $tintN; ?> reveal-up reveal-delay-<?php echo $delay; ?>">
        <div class="service-card__image">
          <picture>
            <source type="image/avif" srcset="/assets/images/<?php echo $img; ?>-480.avif 480w, /assets/images/<?php echo $img; ?>-960.avif 960w" sizes="(max-width: 768px) 100vw, 340px">
            <img src="/assets/images/<?php echo $img; ?>.jpg"
                 srcset="/assets/images/<?php echo $img; ?>-480.webp 480w, /assets/images/<?php echo $img; ?>-960.webp 960w"
                 sizes="(max-width: 768px) 100vw, 340px"
                 alt="<?php echo htmlspecialchars($media['alt']); ?>"
                 width="600" height="360" loading="lazy" decoding="async">
          </picture>
        </div>
        <div class="service-card__body">
          <div class="service-card__icon"><?php echo icon($media['icon'], 22); ?></div>
          <h3><?php echo htmlspecialchars($svc['name']); ?></h3>
          <p class="service-card__desc"><?php echo htmlspecialchars($svc['description']); ?></p>
          <ul>
            <?php foreach ($serviceBullets[$slug] as $bullet): ?>
            <li><?php echo htmlspecialchars($bullet); ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="/services/<?php echo $slug; ?>/" class="service-card__cta">Learn more</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>

    <div style="text-align:center; margin-top: 2rem;">
      <a href="/services/" class="btn btn-secondary btn-lg">View all <?php echo count($services); ?> services</a>
    </div>
  </div>
</section>

<!-- ============================ RECENT WORK GALLERY ============================ -->
<section class="section section--light gallery-section" id="recent-work" aria-label="Recent welding and fabrication work">
  <span class="floating-ring" aria-hidden="true" style="top:-4rem; right:-6rem;"></span>
  <span class="floating-ring" aria-hidden="true" style="bottom:-6rem; left:-7rem;"></span>
  <div class="container-wide">
    <div class="gallery-head section-head reveal-up">
      <span class="eyebrow-label">Recent Work</span>
      <h2>Steel we&rsquo;ve <span class="text-accent">cut, welded and shipped</span> around San Antonio</h2>
      <p>A look at recent structural steel, custom metalwork, and welding jobs out of our southeast San Antonio shop.</p>
    </div>
  </div>

  <div class="container-wide">
    <div class="gallery-track" data-p1-dynamic tabindex="0" aria-label="Project photos — scroll horizontally">
      <?php foreach ($galleryItems as $g): $gi = $g['img']; ?>
      <figure class="gallery-item<?php echo $g['wide'] ? ' gallery-item--wide' : ''; ?>">
        <picture>
          <source type="image/avif" srcset="/assets/images/<?php echo $gi; ?>-480.avif 480w, /assets/images/<?php echo $gi; ?>-960.avif 960w" sizes="(max-width: 768px) 80vw, 340px">
          <img src="/assets/images/<?php echo $gi; ?>.jpg"
               srcset="/assets/images/<?php echo $gi; ?>-480.webp 480w, /assets/images/<?php echo $gi; ?>-960.webp 960w"
               sizes="(max-width: 768px) 80vw, 340px"
               alt="<?php echo htmlspecialchars($g['cap']); ?>"
               width="480" height="600" loading="lazy" decoding="async">
        </picture>
        <figcaption>
          <span class="gallery-item__tag"><?php echo htmlspecialchars($g['tag']); ?></span>
          <span class="gallery-item__cap"><?php echo htmlspecialchars($g['cap']); ?></span>
        </figcaption>
      </figure>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="container-wide" style="margin-top: 1.5rem;">
    <a href="/services/" class="btn btn-secondary">See all services</a>
  </div>
</section>

<!-- ============================ TICKER ============================ -->
<div class="ticker-strip" aria-hidden="true">
  <div class="ticker-track">
    <?php
    $tickerItems = [
        ['flame', 'Certified Welding'],
        ['building-2', 'Structural Steel'],
        ['hammer', 'Custom Metalwork'],
        ['truck', 'Mobile Welding'],
        ['layers', 'Steel Fabrication'],
        ['shield-check', 'Metal Repair'],
        ['map-pin', 'San Antonio, TX'],
        ['calendar-check', 'Since 1983'],
        ['badge-check', 'Free Estimates'],
    ];
    for ($rep = 0; $rep < 2; $rep++):
        foreach ($tickerItems as $t): ?>
      <span class="ticker-item"><?php echo icon($t[0], 18); ?> <?php echo htmlspecialchars($t[1]); ?></span>
    <?php endforeach; endfor; ?>
  </div>
</div>

<!-- ============================ ABOUT / PROCESS (asymmetric) ============================ -->
<section class="section" aria-label="About AGA Welding &amp; Fabrication">
  <div class="container">
    <div class="about-split">
      <div class="about-left reveal-left">
        <span class="eyebrow-label">Our Story</span>
        <h2>Hands-on fabrication with <span class="text-accent">deep San Antonio roots</span></h2>
        <p>AGA Welding &amp; Fabrication has spent decades solving metal problems for San Antonio &mdash; the kind that need a fabricator who actually understands the region&rsquo;s industrial, commercial, and residential work. We&rsquo;re a family-run shop on Gardner Rd, and every job comes down to the same thing: certified welders, precise cuts, and steel that holds up.</p>
        <p>Whether you bring us a full set of blueprints or a rough idea sketched on a napkin, our team consults, fabricates, and installs &mdash; from a single railing to a full structural steel package. No one-size-fits-all templates, just metalwork built for your project and delivered on schedule.</p>

        <ol class="process-steps">
          <li>
            <b>Consult &amp; quote</b>
            <span>We review your drawings or idea, walk the site if needed, and give you a clear, no-obligation estimate.</span>
          </li>
          <li>
            <b>Design &amp; engineer</b>
            <span>We refine the details and material specs so the finished piece meets code and fits the first time.</span>
          </li>
          <li>
            <b>Cut, weld &amp; fabricate</b>
            <span>Certified welders cut, form, and join your steel in-house using MIG, TIG, stick, and flux-cored processes.</span>
          </li>
          <li>
            <b>Deliver &amp; install</b>
            <span>We deliver to your San Antonio job site and install &mdash; or bring mobile welding to you for on-site work.</span>
          </li>
        </ol>

        <div class="hero-actions" style="margin-top:1.5rem;">
          <button type="button" class="btn btn-primary" data-open-estimate>Start your project</button>
          <a class="btn btn-secondary" href="/about/">More about AGA</a>
        </div>
      </div>

      <div class="about-right reveal-right">
        <div class="about-image-primary">
          <picture>
            <source type="image/avif" srcset="/assets/images/aga-welding-fabrication-shop-480.avif 480w, /assets/images/aga-welding-fabrication-shop-960.avif 960w, /assets/images/aga-welding-fabrication-shop-1600.avif 1600w" sizes="(max-width: 900px) 100vw, 520px">
            <img src="/assets/images/aga-welding-fabrication-shop.jpg"
                 srcset="/assets/images/aga-welding-fabrication-shop-480.webp 480w, /assets/images/aga-welding-fabrication-shop-960.webp 960w, /assets/images/aga-welding-fabrication-shop-1600.webp 1600w"
                 sizes="(max-width: 900px) 100vw, 520px"
                 alt="The AGA Welding &amp; Fabrication shop building in southeast San Antonio, Texas"
                 width="600" height="450" loading="lazy" decoding="async">
          </picture>
        </div>
        <div class="about-stat-card">
          <span class="stat-number"><span>43</span> yrs</span>
          <span class="stat-label">of San Antonio metalwork</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================ MID-PAGE CTA BANNER ============================ -->
<section class="cta-banner texture-grain edge-curve-top" aria-label="Request a fabrication quote">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Got a deadline?</span>
      <h2>Need steel fabricated or a weld repair done right?</h2>
      <p>Tell us about the job and we&rsquo;ll get you a clear estimate &mdash; usually the same day. Rush service is available when your project can&rsquo;t wait, and mobile welding comes to your San Antonio site.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/services/">Browse services</a>
    </div>
  </div>
</section>

<!-- ============================ FAQ ============================ -->
<section class="section section--light" aria-label="Frequently asked questions">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">FAQ</span>
      <h2>Common questions about <span class="text-accent">welding &amp; fabrication in San Antonio</span></h2>
      <p>Straight answers on services, timelines, certification, and how AGA Welding &amp; Fabrication works.</p>
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

<!-- ============================ ESTIMATE SECTION ============================ -->
<section class="section" id="estimate" aria-label="Request your free estimate">
  <div class="container">
    <div class="estimate">

      <div class="reveal-up">
        <span class="eyebrow-label">Free Estimate</span>
        <h2>Tell us about the job</h2>
        <p>Send over the details of your welding or fabrication project and AGA Welding &amp; Fabrication will follow up the same day with a no-obligation estimate.</p>

        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" style="margin-top:1.5rem;">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <?php echo p1_attribution_fields('estimate-section'); ?>
          <input type="hidden" name="consent_version" value="v2.1">
          <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

          <div class="form-row"><label for="est-name">Your name</label><input id="est-name" type="text" name="name" autocomplete="name" required></div>
          <div class="form-row"><label for="est-email">Email</label><input id="est-email" type="email" name="email" autocomplete="email" required></div>
          <div class="form-row"><label for="est-phone">Phone</label><input id="est-phone" type="tel" name="phone" autocomplete="tel" required></div>
          <div class="form-row">
            <label for="est-service">Service needed</label>
            <select id="est-service" name="service">
              <option value="">Select a service</option>
              <?php foreach ($services as $estSvc): ?>
              <option value="<?php echo htmlspecialchars($estSvc['name']); ?>"><?php echo htmlspecialchars($estSvc['name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-row"><label for="est-message">Project details</label><textarea id="est-message" name="message" rows="4"></textarea></div>

          <fieldset class="form-consent-fieldset">
            <legend class="form-consent-legend">Communication consent</legend>
            <label class="form-consent-item">
              <input type="checkbox" name="email_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label"><strong>Email updates (optional):</strong> I agree to receive emails from <?php echo htmlspecialchars($siteName); ?> about my inquiry and services. I can unsubscribe anytime.</span>
            </label>
            <label class="form-consent-item">
              <input type="checkbox" name="sms_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label"><strong>SMS/text messages (optional):</strong> I agree to receive texts from <?php echo htmlspecialchars($siteName); ?> at the number I provided. Message and data rates may apply; reply STOP to unsubscribe. <strong>Consent is not a condition of purchase.</strong></span>
            </label>
            <label class="form-consent-item form-consent-required">
              <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
              <span class="consent-label">I have read and agree to the <a href="/privacy-policy/">Privacy Policy</a> and <a href="/terms/">Terms of Service</a>. <span class="required-star">*</span></span>
            </label>
          </fieldset>

          <button type="submit" class="btn btn-primary btn-lg btn-block">Send my request</button>
        </form>
      </div>

      <aside class="reveal-up reveal-delay-1">
        <h3>What happens next</h3>
        <ol class="next-steps">
          <li><strong>We review your request</strong>We read the details and follow up the same day with any questions.</li>
          <li><strong>You get a clear estimate</strong>A straightforward, no-obligation quote with scope and timeline.</li>
          <li><strong>We fabricate &amp; deliver</strong>Certified welders build your steel and we deliver or install on site.</li>
        </ol>

        <div class="nap">
          <div><?php echo icon('map-pin', 18); ?> <span><?php echo htmlspecialchars($address['street']); ?>, <?php echo htmlspecialchars($address['city']); ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?></span></div>
          <?php if ($phone): ?>
          <div><?php echo icon('phone', 18); ?> <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>"><?php echo htmlspecialchars($phone); ?></a></div>
          <?php endif; ?>
          <?php if ($email): ?>
          <div><?php echo icon('mail', 18); ?> <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a></div>
          <?php endif; ?>
          <div><?php echo icon('clock', 18); ?> <span>Monday&ndash;Friday, 8:00 AM &ndash; 5:00 PM</span></div>
        </div>

        <p style="margin-top:1.2rem; color:var(--color-ink-2); font-size:.95rem;">Serving the greater San Antonio and Bexar County area &mdash; commercial, industrial, and residential.</p>
      </aside>

    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
