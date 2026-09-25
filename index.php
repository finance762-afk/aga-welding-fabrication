<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Homepage (Phase 3) — AGA Welding & Fabrication, San Antonio TX
 * Archetype: bold-industrial · photo-led section script (≥ 8 client photos)
 * ------------------------------------------------------------------------- */

$currentPage = 'home';
$pageType    = 'home';

$pageTitle       = 'Welding & Metal Fabrication in San Antonio, TX | ' . $siteName;
$pageDescription = 'AGA Welding & Fabrication builds and repairs structural steel, custom metalwork, stairs and railings in San Antonio, TX. Certified welders, in-house fabrication, free estimates.';
$canonicalUrl    = $siteUrl . '/';
$ogImage         = $siteUrl . '/assets/images/welding-steel-beam-san-antonio.jpg';

/* Hero LCP image preload (v6.3) — avif srcset for head.php */
$heroPreload = [
    'srcset' => '/assets/images/welding-steel-beam-san-antonio-480.avif 480w, /assets/images/welding-steel-beam-san-antonio-960.avif 960w, /assets/images/welding-steel-beam-san-antonio-1600.avif 1600w',
    'sizes'  => '100vw',
];

/* Home service overview — first 8 of the full service list, each mapped to a
   real client photo + a distinct inline icon. Tints/reveals rotate 1→2→3. */
$homeServices = [
    ['slug' => 'steel-fabrication',            'name' => 'Steel Fabrication',            'img' => 'fabricated-steel-columns',   'icon' => 'flame',       'alt' => 'Fabricated steel columns with welded base plates',                'desc' => 'Precision cutting, forming and assembly of structural and plate steel.',       'bullets' => ['Beams, columns &amp; base plates', 'Shop drawings to finished steel', 'Commercial &amp; industrial jobs']],
    ['slug' => 'structural-steel-fabrication', 'name' => 'Structural Steel Fabrication', 'img' => 'structural-steel-frame',     'icon' => 'building-2',  'alt' => 'Structural steel frame raised against the sky in San Antonio',     'desc' => 'Engineered steel for buildings, frames and load-bearing work.',                 'bullets' => ['Built to engineer specs', 'Moment &amp; braced frames', 'Code-compliant welds']],
    ['slug' => 'sheet-metal-fabrication',      'name' => 'Sheet Metal Fabrication',      'img' => 'custom-steel-fabrication',   'icon' => 'layers',      'alt' => 'Fabricated sheet and plate metal work on the AGA shop floor',      'desc' => 'Cutting, bending and forming panels, brackets and enclosures.',                 'bullets' => ['Custom panels &amp; housings', 'Tight-tolerance bends', 'Steel, aluminum &amp; stainless']],
    ['slug' => 'metal-cutting',                'name' => 'Metal Cutting',                'img' => 'metal-cutting-bandsaw',      'icon' => 'scissors',    'alt' => 'Marvel band saw at the AGA metal-cutting station',                 'desc' => 'Accurate saw, torch and plasma cutting for any project.',                       'bullets' => ['Band-saw &amp; torch cutting', 'Clean, square cuts', 'Fast material prep']],
    ['slug' => 'metal-bending',                'name' => 'Metal Bending',                'img' => 'custom-metal-pipe-support',  'icon' => 'ruler',       'alt' => 'Custom-formed and powder-coated steel pipe support saddle',        'desc' => 'Press-brake bending and forming for custom shapes and members.',                'bullets' => ['Repeatable press-brake bends', 'Angles, channels &amp; plate', 'Custom radii on request']],
    ['slug' => 'metal-assembly',               'name' => 'Metal Assembly',               'img' => 'welded-steel-stands',        'icon' => 'hammer',      'alt' => 'Welded steel trestle stands assembled in the shop',               'desc' => 'Fit-up and welding of multi-part steel structures and weldments.',              'bullets' => ['Jigged, square fit-up', 'Full-penetration welds', 'Bolted or welded joints']],
    ['slug' => 'metal-repair',                 'name' => 'Metal Repair',                 'img' => 'welding-fabrication-shop',   'icon' => 'wrench',      'alt' => 'Welder repairing steel on the AGA Welding & Fabrication shop floor', 'desc' => 'On-site and in-shop repair of damaged steel and equipment.',                    'bullets' => ['Crack &amp; fracture repair', 'Reinforcement &amp; gusseting', 'Mobile welding available']],
    ['slug' => 'structural-metal-repair',      'name' => 'Structural Metal Repair',      'img' => 'structural-steel-beams',     'icon' => 'hard-hat',    'alt' => 'Fabricated wide-flange structural steel beams staged for a job',   'desc' => 'Certified repair and reinforcement of load-bearing steel.',                     'bullets' => ['Beam &amp; column repair', 'Weld-code compliant', 'Safety-first inspection']],
];

/* Recent-work gallery — real client photos only. Captions describe the photo. */
$galleryItems = [
    ['img' => 'structural-steel-frame',     'tag' => 'Structural Steel', 'cap' => 'Steel frame raised against the Texas sky',       'alt' => 'Structural steel frame erected against a cloudy San Antonio sky',    'wide' => true],
    ['img' => 'structural-steel-beams',     'tag' => 'Structural Steel', 'cap' => 'Fabricated wide-flange beams staged for a job',  'alt' => 'Stack of fabricated wide-flange steel beams with bolt holes',        'wide' => false],
    ['img' => 'fabricated-steel-columns',   'tag' => 'Fabrication',      'cap' => 'Welded steel columns with base plates',          'alt' => 'Long fabricated steel columns with welded gusset and base plates',   'wide' => false],
    ['img' => 'steel-beam-fabrication',     'tag' => 'Fabrication',      'cap' => 'Beams laid out on the shop floor',               'alt' => 'Fabricator working on long steel beams laid out in the AGA shop',     'wide' => true],
    ['img' => 'custom-metal-pipe-support',  'tag' => 'Custom Metalwork', 'cap' => 'Powder-coated pipe support saddle',              'alt' => 'Blue powder-coated custom steel pipe support saddle on a bench',      'wide' => false],
    ['img' => 'metal-cutting-bandsaw',      'tag' => 'Metal Cutting',    'cap' => 'Band saw at the cutting station',                'alt' => 'Marvel band saw and roller conveyor at the AGA cutting station',      'wide' => false],
    ['img' => 'welding-fabrication-shop',   'tag' => 'Welding',          'cap' => 'Arc welding on the shop floor',                  'alt' => 'Bright welding arc as a fabricator welds steel in the AGA shop',      'wide' => true],
    ['img' => 'welded-steel-stands',        'tag' => 'Custom Metalwork', 'cap' => 'Welded steel trestle stands',                    'alt' => 'Custom welded steel trestle stands on the shop floor',                'wide' => false],
    ['img' => 'structural-steel-delivery',  'tag' => 'Delivery',         'cap' => 'Finished steel loaded for delivery',             'alt' => 'Fabricated black steel members strapped to a flatbed trailer',        'wide' => false],
    ['img' => 'custom-steel-fabrication',   'tag' => 'Fabrication',      'cap' => 'Steel frame in progress',                        'alt' => 'Custom steel frame being fabricated in the AGA workshop',             'wide' => true],
];

/* Homepage FAQs (research brief + one local) — powers visible FAQ + FAQPage schema */
$faqs = [
    ['q' => 'What metal fabrication services does AGA Welding & Fabrication offer?',
     'a' => 'AGA Welding & Fabrication provides structural and custom steel fabrication, sheet metal work, cutting, bending and assembly, metal and equipment repair, plus handrails, staircases, awnings and racks. We work in steel, aluminum and stainless on projects of any scale.'],
    ['q' => 'How fast can you turn around a project?',
     'a' => 'Timeline depends on scope and complexity. AGA Welding & Fabrication prioritizes efficient scheduling without cutting corners, and we give you a realistic date during the estimate. Rush service is available for urgent repairs and time-sensitive jobs.'],
    ['q' => 'Do you work from existing designs or offer design help?',
     'a' => 'Both. Our team can consult on your concept and help bring it to life, or fabricate directly from your existing blueprints, shop drawings and specifications.'],
    ['q' => 'Are your welders certified and what quality guarantees do you provide?',
     'a' => 'All AGA welders are certified professionals. We hold to rigorous quality-control standards and stand behind our work with a commitment to durability, precision and code-compliant welds.'],
    ['q' => 'Do you serve residential clients or only commercial and industrial?',
     'a' => 'We serve commercial, industrial and residential customers across San Antonio. Whether it is a residential gate or a large industrial frame, AGA Welding & Fabrication has the equipment and expertise to deliver.'],
    ['q' => 'Where is AGA Welding & Fabrication located?',
     'a' => 'AGA Welding & Fabrication is at 8249 Gardner Rd on San Antonio\'s southeast side (78263), serving Bexar County and the surrounding region. Both in-shop and mobile welding are available.'],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ===========================================================================
   Homepage-specific composition (AGA Welding & Fabrication)
   Scaffold framework.css carries the component library; this block adds the
   page's own composition. Tokens only — no hardcoded colors/shadows/spacing.
   =========================================================================== */

/* Hero — tighten the industrial photo hero and give the copy breathing room */
.home-hero .hero-title { max-width: 20ch; }
.home-hero .hero-title .text-accent { white-space: nowrap; }
.home-hero .hero-answer { max-width: 40ch; }
.home-hero .hero-form-card { align-self: end; }
.home-hero .hero-eyebrow { margin-bottom: var(--space-1); }

/* Proof strip — industrial framing with a hairline accent under each number */
.home-proof .stats-row { align-items: stretch; }
.home-proof .stat-item { gap: var(--space-2); }
.home-proof .stat-number { font-size: clamp(1.8rem, 1.2rem + 1.6vw, 2.6rem); }
.home-proof .stat-number::after {
  content: "";
  display: block;
  width: 32px;
  height: 3px;
  margin-top: var(--space-2);
  background: var(--color-accent);
  border-radius: var(--radius-full);
}

/* Gallery — heading row + subtle depth rings behind the scrolling track */
.home-gallery { background: var(--color-surface); position: relative; }
.home-gallery .gallery-head {
  display: grid;
  gap: var(--space-2);
  max-width: 60ch;
  margin-bottom: var(--space-6);
}
.home-gallery .floating-ring { top: -80px; right: -60px; }
.home-gallery .floating-ring--2 { top: auto; bottom: -120px; left: -80px; right: auto; opacity: .05; }
.home-gallery .gallery-foot { margin-top: var(--space-6); }

/* Services — question heading + answer, comfortable grid rhythm */
.home-services .section-head { max-width: 66ch; }
.home-services .services-grid { margin-top: var(--space-8); }
.home-services .services-foot { margin-top: var(--space-8); display: flex; justify-content: center; }

/* Ticker — accent dots between industrial proof items */
.home-ticker .ticker-track > * { color: var(--color-ink-2); }
.home-ticker .ticker-dot { color: var(--color-accent-dark); font-weight: 700; }
.home-ticker svg { color: var(--color-primary); }

/* About / process — asymmetric split: offset framed photo + overlaid stat card */
.home-about { background: var(--color-surface); }
.home-about .about-grid { align-items: center; }
.home-about .about-copy .eyebrow { margin-bottom: var(--space-2); }
.home-about .about-lead { font-size: var(--fs-lead); color: var(--color-ink-2); }
.home-about .about-media { position: relative; margin-top: var(--space-10); }
.home-about .about-media__frame {
  position: relative;
  z-index: 1;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-lg);
  clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%, 0 6%);
}
.home-about .about-media__frame img { width: 100%; height: 100%; object-fit: cover; aspect-ratio: 4 / 3; }
.home-about .about-media::before {
  content: "";
  position: absolute;
  inset: calc(-1 * var(--space-5)) var(--space-5) var(--space-5) calc(-1 * var(--space-5));
  border: 2px solid var(--color-accent);
  opacity: .55;
  border-radius: var(--radius-lg);
  z-index: 0;
}
.home-about .about-stat-card {
  position: absolute;
  z-index: 2;
  right: calc(-1 * var(--space-4));
  bottom: calc(-1 * var(--space-5));
  background: var(--color-surface);
  border: 1px solid var(--color-line);
  border-radius: var(--radius);
  padding: var(--space-4) var(--space-5);
  box-shadow: var(--shadow-lg);
  display: grid;
  gap: var(--space-1);
}
.home-about .about-stat-card b {
  font-family: var(--font-accent);
  font-size: 1.9rem;
  line-height: 1;
  color: var(--color-primary);
  letter-spacing: .02em;
}
.home-about .about-stat-card span { font-size: var(--font-size-sm); color: var(--color-muted); }
@media (max-width: 900px) {
  .home-about .about-stat-card { position: static; margin-top: var(--space-6); }
  .home-about .about-media::before { display: none; }
}

/* Dark mid-page CTA band — grain + brushed gradient already from .texture-grain */
.home-cta.cta-banner .container { align-items: center; }
.home-cta .cta-eyebrow { color: var(--color-accent-bright); }
.home-cta p { max-width: 52ch; }

/* Estimate — form card + "what happens next" rail */
.home-estimate { background: var(--color-surface); }
.home-estimate .estimate__card {
  background: var(--color-paper);
  border: 1px solid var(--color-line);
  border-radius: var(--radius-lg);
  padding: clamp(1.5rem, 3vw, 2.25rem);
  box-shadow: var(--shadow);
}
.home-estimate .estimate__rail { display: grid; gap: var(--space-6); align-content: start; }
.home-estimate .estimate__map { margin-top: var(--space-4); }
.home-estimate .estimate__area { font-size: var(--font-size-sm); color: var(--color-muted); }
</style>

<?php /* ============================ HERO ============================ */ ?>
<section class="hero hero--photo home-hero" aria-label="AGA Welding &amp; Fabrication — San Antonio welding and metal fabrication">
  <div class="hero-bg">
    <picture>
      <source type="image/avif" srcset="/assets/images/welding-steel-beam-san-antonio-480.avif 480w, /assets/images/welding-steel-beam-san-antonio-960.avif 960w, /assets/images/welding-steel-beam-san-antonio-1600.avif 1600w" sizes="100vw">
      <img src="/assets/images/welding-steel-beam-san-antonio.jpg" srcset="/assets/images/welding-steel-beam-san-antonio-480.webp 480w, /assets/images/welding-steel-beam-san-antonio-960.webp 960w, /assets/images/welding-steel-beam-san-antonio-1600.webp 1600w" sizes="100vw" alt="AGA welder joining a structural steel beam with sparks flying in the San Antonio shop" width="1600" height="1200" loading="eager" fetchpriority="high" decoding="async">
    </picture>
  </div>
  <div class="hero-overlay"></div>
  <span class="grain" aria-hidden="true"></span>

  <div class="container">
    <div class="hero-grid hero-grid--form">
      <div class="hero-text">
        <span class="eyebrow hero-eyebrow">San Antonio, TX &middot; Fabricating since 2004</span>
        <h1 class="hero-title">Metal fabrication &amp; <span class="text-accent">welding</span>, built to spec in San Antonio</h1>
        <p class="hero-answer">AGA Welding &amp; Fabrication builds and repairs structural steel, custom metalwork, stairs and railings for San Antonio's commercial, industrial and residential clients &mdash; MIG, TIG, stick and flux-cored, all in-house.</p>
        <div class="hero-actions">
          <button type="button" class="btn btn-primary btn-lg hero-form-open" data-open-estimate>Get a free estimate</button>
        </div>
        <ul class="hero-chips">
          <li><?php echo icon('badge-check', 18); ?> Certified welders</li>
          <li><?php echo icon('calendar', 18); ?> Fabricating since 2004</li>
          <li><?php echo icon('truck', 18); ?> Shop &amp; mobile welding</li>
        </ul>
      </div>

      <aside class="hero-form-card" id="estimate-form">
        <h2>Get a free estimate</h2>
        <p class="hero-form-tagline">No obligation. Same-day reply.</p>
        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" class="hero-form">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <?php echo p1_attribution_fields('hero'); ?>
          <input type="hidden" name="consent_version" value="v2.1">
          <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
          <div class="form-row"><label class="sr-only" for="hero-name">Name</label><input id="hero-name" type="text" name="name" placeholder="Name" autocomplete="name" required></div>
          <div class="form-row"><label class="sr-only" for="hero-phone">Phone</label><input id="hero-phone" type="tel" name="phone" placeholder="Phone" autocomplete="tel" required></div>
          <div class="form-row"><label class="sr-only" for="hero-service">Service</label>
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

<?php /* ============================ PROOF STRIP ============================ */ ?>
<section class="stats-band texture-grain slant-top home-proof" aria-label="Why San Antonio chooses AGA Welding &amp; Fabrication">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div class="stats-row">
      <div class="stat-item">
        <span class="stat-number">Est. <span>2004</span></span>
        <span class="stat-label">Founded &amp; operating in San Antonio</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">In-<span>House</span></span>
        <span class="stat-label">Cut, welded &amp; finished under one roof</span>
      </div>
      <div class="stat-item">
        <span class="stat-number"><span>Bexar</span> County</span>
        <span class="stat-label">Delivered &amp; installed locally</span>
      </div>
      <div class="stat-item">
        <span class="stat-number"><span>Certified</span></span>
        <span class="stat-label">Professional welders on every job</span>
      </div>
    </div>
  </div>
</section>

<?php /* ============================ RECENT WORK GALLERY ============================ */ ?>
<section class="section home-gallery" aria-label="Recent AGA welding and fabrication work">
  <span class="floating-ring" aria-hidden="true"></span>
  <span class="floating-ring floating-ring--2" aria-hidden="true"></span>
  <div class="container">
    <div class="gallery-head reveal-up">
      <span class="eyebrow">Recent Work</span>
      <h2>Steel we've cut, welded and shipped around <span class="text-accent">San Antonio</span></h2>
      <p class="lead">A look inside the shop &mdash; structural beams, custom metalwork and repairs, straight off the AGA floor.</p>
    </div>
  </div>
  <div class="container-wide">
    <div class="gallery-track" data-p1-dynamic tabindex="0" aria-label="Project photos — scroll horizontally">
      <?php foreach ($galleryItems as $g):
        $w = !empty($g['wide']); ?>
      <figure class="gallery-item<?php echo $w ? ' gallery-item--wide' : ''; ?>">
        <picture>
          <source type="image/avif" srcset="/assets/images/<?php echo $g['img']; ?>-480.avif 480w, /assets/images/<?php echo $g['img']; ?>-960.avif 960w, /assets/images/<?php echo $g['img']; ?>-1600.avif 1600w" sizes="<?php echo $w ? '(max-width: 700px) 90vw, 480px' : '(max-width: 700px) 70vw, 320px'; ?>">
          <img src="/assets/images/<?php echo $g['img']; ?>.jpg" srcset="/assets/images/<?php echo $g['img']; ?>-480.webp 480w, /assets/images/<?php echo $g['img']; ?>-960.webp 960w, /assets/images/<?php echo $g['img']; ?>-1600.webp 1600w" sizes="<?php echo $w ? '(max-width: 700px) 90vw, 480px' : '(max-width: 700px) 70vw, 320px'; ?>" alt="<?php echo htmlspecialchars($g['alt']); ?>" width="1600" height="1200" loading="lazy" decoding="async">
        </picture>
        <figcaption>
          <span class="gallery-item__tag"><?php echo htmlspecialchars($g['tag']); ?></span>
          <span class="gallery-item__cap"><?php echo htmlspecialchars($g['cap']); ?></span>
        </figcaption>
      </figure>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="container gallery-foot">
    <a href="/services/" class="btn btn-secondary">See all services</a>
  </div>
</section>

<?php /* ============================ SERVICES ============================ */ ?>
<section class="section home-services" aria-label="Welding and metal fabrication services">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">What We Do</span>
      <h2>What can <span class="text-accent">AGA fabricate and weld</span> for your San Antonio project?</h2>
      <p class="hero-answer">AGA Welding &amp; Fabrication handles the full range of steel and metal work in San Antonio &mdash; structural steel, sheet metal, cutting, bending, assembly and repair &mdash; cut, welded and finished in one shop. From a single bracket to a full building frame, our certified welders build it to spec.</p>
    </div>

    <div class="services-grid">
      <?php
      $tints = [1, 2, 3];
      foreach ($homeServices as $i => $s):
        $t = $tints[$i % 3] ;
        $d = ($i % 3) + 1;
      ?>
      <article class="service-card-with-image card-tint-<?php echo $t; ?> reveal-up reveal-delay-<?php echo $d; ?>">
        <div class="service-card__image">
          <picture>
            <source type="image/avif" srcset="/assets/images/<?php echo $s['img']; ?>-480.avif 480w, /assets/images/<?php echo $s['img']; ?>-960.avif 960w" sizes="(max-width: 720px) 100vw, 300px">
            <img src="/assets/images/<?php echo $s['img']; ?>.jpg" srcset="/assets/images/<?php echo $s['img']; ?>-480.webp 480w, /assets/images/<?php echo $s['img']; ?>-960.webp 960w" sizes="(max-width: 720px) 100vw, 300px" alt="<?php echo htmlspecialchars($s['alt']); ?>" width="600" height="360" loading="lazy" decoding="async">
          </picture>
        </div>
        <div class="service-card__body">
          <div class="service-card__icon"><?php echo icon($s['icon'], 22); ?></div>
          <h3><?php echo htmlspecialchars($s['name']); ?></h3>
          <p class="service-card__desc"><?php echo $s['desc']; ?></p>
          <ul>
            <?php foreach ($s['bullets'] as $b): ?>
            <li><?php echo $b; ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="/services/<?php echo $s['slug']; ?>/" class="service-card__cta">Learn more</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>

    <div class="services-foot">
      <a href="/services/" class="btn btn-primary">View all <?php echo count($services); ?> services</a>
    </div>
  </div>
</section>

<?php /* ============================ TICKER STRIP ============================ */ ?>
<div class="ticker-strip home-ticker" aria-hidden="true">
  <div class="ticker-track">
    <?php
    $tickerItems = [
        ['flame',       'MIG &middot; TIG &middot; Stick &middot; Flux-Cored'],
        ['building-2',  'Structural Steel'],
        ['badge-check', 'Certified Welders'],
        ['scissors',    'Cutting &amp; Bending'],
        ['truck',       'Shop &amp; Mobile Welding'],
        ['hard-hat',    'Commercial &middot; Industrial &middot; Residential'],
        ['map-pin',     'Serving San Antonio &amp; Bexar County'],
        ['calendar',    'Fabricating Since 2004'],
    ];
    // duplicate the set for a seamless loop
    for ($rep = 0; $rep < 2; $rep++):
      foreach ($tickerItems as $t): ?>
      <span><?php echo icon($t[0], 18); ?> <?php echo $t[1]; ?> <span class="ticker-dot">&bull;</span></span>
      <?php endforeach;
    endfor; ?>
  </div>
</div>

<?php /* ============================ ABOUT / PROCESS (asymmetric) ============================ */ ?>
<section class="section home-about" aria-label="About AGA Welding &amp; Fabrication">
  <div class="container">
    <div class="about-grid grid-asymmetric">
      <div class="about-copy reveal-left">
        <span class="eyebrow">Since 2004</span>
        <h2>A San Antonio metal shop that solves problems, not just fills orders</h2>
        <p class="about-lead">AGA Welding &amp; Fabrication has worked out of its southeast-side shop on Gardner Road since 2004, fabricating and repairing steel for builders, plants and homeowners across the San Antonio area.</p>
        <p>We are hands-on by nature. Bring us a napkin sketch, a set of stamped drawings or a broken part, and our certified welders will figure out the cleanest, strongest way to build it &mdash; then cut, weld and finish it in-house so the details are right the first time.</p>
        <p>From structural frames and stairs to custom brackets and on-site repairs, the same crew handles your job start to finish. That is how work stays accountable and on schedule.</p>

        <ol class="process-steps" aria-label="How AGA works">
          <li><b>Consult &amp; quote</b><span>We review your drawings or idea and give a realistic price and timeline.</span></li>
          <li><b>Cut &amp; form</b><span>Steel is measured, cut and press-brake formed to spec in the shop.</span></li>
          <li><b>Weld &amp; assemble</b><span>Certified welders fit up and weld each piece to code.</span></li>
          <li><b>Finish &amp; deliver</b><span>We coat, load and deliver &mdash; or install and repair on site.</span></li>
        </ol>
      </div>

      <div class="about-media reveal-right">
        <div class="about-media__frame">
          <picture>
            <source type="image/avif" srcset="/assets/images/aga-welding-fabrication-shop-480.avif 480w, /assets/images/aga-welding-fabrication-shop-960.avif 960w, /assets/images/aga-welding-fabrication-shop-1600.avif 1600w" sizes="(max-width: 900px) 100vw, 480px">
            <img src="/assets/images/aga-welding-fabrication-shop.jpg" srcset="/assets/images/aga-welding-fabrication-shop-480.webp 480w, /assets/images/aga-welding-fabrication-shop-960.webp 960w, /assets/images/aga-welding-fabrication-shop-1600.webp 1600w" sizes="(max-width: 900px) 100vw, 480px" alt="The AGA Welding & Fabrication shop building in San Antonio, established 2004" width="1600" height="1200" loading="lazy" decoding="async">
          </picture>
        </div>
        <div class="about-stat-card">
          <b>20+ yrs</b>
          <span>Fabricating in San&nbsp;Antonio since 2004</span>
        </div>
      </div>
    </div>
  </div>
</section>

<?php /* ============================ DARK CTA BAND ============================ */ ?>
<section class="cta-banner texture-grain edge-curve-top home-cta" aria-label="Start your welding or fabrication project">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow cta-eyebrow">Ready when you are</span>
      <h2>Have steel that needs cutting, welding or fixing?</h2>
      <p>Tell us about the job and get a free, no-obligation estimate from a real fabricator &mdash; usually the same day. Rush service is available for urgent repairs.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get a free estimate</button>
      <a href="/services/" class="btn btn-outline-white">Browse services</a>
    </div>
  </div>
</section>

<?php /* ============================ FAQ ============================ */ ?>
<section class="section home-faq" aria-label="Frequently asked questions">
  <div class="container">
    <div class="section-head reveal-up">
      <span class="eyebrow-label">Questions</span>
      <h2>Welding &amp; fabrication questions, answered</h2>
      <p>Straight answers about how AGA Welding &amp; Fabrication works in San Antonio.</p>
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

<?php /* ============================ ESTIMATE SECTION ============================ */ ?>
<section class="section home-estimate" id="estimate" aria-label="Request a free estimate">
  <div class="container">
    <div class="estimate">
      <div class="estimate__card reveal-up">
        <span class="eyebrow-label">Free Estimate</span>
        <h2>Tell us about the job</h2>
        <p class="prose">Send the details and AGA Welding &amp; Fabrication will get back to you the same day with next steps.</p>

        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST">
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
          <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
          <?php echo p1_attribution_fields('estimate'); ?>
          <input type="hidden" name="consent_version" value="v2.1">
          <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

          <div class="form-grid">
            <div class="field full">
              <label for="est-name">Your Name</label>
              <input id="est-name" type="text" name="name" autocomplete="name" required>
            </div>
            <div class="field">
              <label for="est-phone">Phone</label>
              <input id="est-phone" type="tel" name="phone" autocomplete="tel" required>
            </div>
            <div class="field">
              <label for="est-email">Email</label>
              <input id="est-email" type="email" name="email" autocomplete="email" required>
            </div>
            <div class="field full">
              <label for="est-service">Service Needed</label>
              <select id="est-service" name="service">
                <option value="">Select a service</option>
                <?php foreach ($services as $estSvc): ?>
                <option value="<?php echo htmlspecialchars($estSvc['name']); ?>"><?php echo htmlspecialchars($estSvc['name']); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="field full">
              <label for="est-message">Project Details</label>
              <textarea id="est-message" name="message" rows="4"></textarea>
            </div>
          </div>

          <fieldset class="form-consent-fieldset">
            <legend class="form-consent-legend">Communication Consent</legend>
            <label class="consent form-consent-item">
              <input type="checkbox" name="email_opt_in" value="yes">
              <span><strong>Email updates (optional):</strong> I agree to receive emails from <?php echo htmlspecialchars($siteName); ?> about my inquiry and services. Unsubscribe anytime.</span>
            </label>
            <label class="consent form-consent-item">
              <input type="checkbox" name="sms_opt_in" value="yes">
              <span><strong>SMS/text (optional):</strong> I agree to receive text messages from <?php echo htmlspecialchars($siteName); ?> at the number provided. Message and data rates may apply. Reply STOP to unsubscribe. <strong>Consent is not a condition of purchase.</strong></span>
            </label>
            <label class="consent form-consent-item">
              <input type="checkbox" name="terms_accepted" value="yes" required>
              <span>I have read and agree to the <a href="/privacy-policy/">Privacy Policy</a> and <a href="/terms/">Terms of Service</a>. <span aria-hidden="true">*</span></span>
            </label>
          </fieldset>

          <button type="submit" class="btn btn-primary btn-block">Send My Request</button>
        </form>
      </div>

      <aside class="estimate__rail reveal-right">
        <div>
          <span class="eyebrow">What happens next</span>
          <ol class="next-steps">
            <li><strong>We review your details</strong>Scope, drawings and timeline &mdash; a real fabricator reads every request.</li>
            <li><strong>You get a free estimate</strong>Clear pricing and a realistic schedule, usually the same day.</li>
            <li><strong>We build it to spec</strong>Cut, welded and finished in-house, then delivered or installed.</li>
          </ol>
        </div>

        <div class="nap">
          <div><?php echo icon('map-pin', 18); ?><span><?php echo htmlspecialchars($address['street']); ?><br><?php echo htmlspecialchars($address['city']); ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?></span></div>
          <div><?php echo icon('clock', 18); ?><span>Monday &ndash; Friday: 8:00 AM &ndash; 5:00 PM</span></div>
        </div>
        <p class="estimate__area">Serving San Antonio and the surrounding Bexar County region &mdash; in-shop and mobile welding.</p>

        <div class="map-embed estimate__map">
          <?php echo str_replace('<iframe ', '<iframe title="Map to AGA Welding & Fabrication in San Antonio, TX" ', $gbpMapEmbed); ?>
        </div>
      </aside>
    </div>
  </div>
</section>

<?php /* FAQPage schema (AI comprehension aid) */ ?>
<script type="application/ld+json">
<?php echo generateFAQSchema($faqs); ?>
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
