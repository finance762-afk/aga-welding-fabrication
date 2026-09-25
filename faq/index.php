<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * FAQ Page — AGA Welding & Fabrication (Phase 5)
 * ------------------------------------------------------------------------- */
$pageType    = 'faq';
$currentPage = 'faq';

$pageTitle       = 'Welding & Fabrication FAQ | AGA Welding & Fabrication San Antonio';
$pageDescription = 'Common questions about welding and metal fabrication services in San Antonio, TX. AGA Welding & Fabrication answers your questions about pricing, timelines, certification, and project requirements.';
$canonicalUrl    = $siteUrl . '/faq/';
$ogImage         = $siteUrl . '/assets/images/logo.png';

/* Comprehensive FAQ list organized by category */
$faqCategories = [
    'General' => [
        ['q' => 'What metal fabrication services does AGA Welding & Fabrication offer?', 'a' => 'We provide structural steel work, custom welding, metal staircases and railings, awnings, storage racks, industrial components, and specialized fabrication. We work with a wide range of metals and handle projects of any scale across San Antonio.'],
        ['q' => 'What areas around San Antonio does AGA Welding & Fabrication serve?', 'a' => 'AGA Welding & Fabrication is based at 8249 Gardner Rd in southeast San Antonio (78263) and serves the greater San Antonio and Bexar County area. Our mobile welding service brings the crew directly to your job site when a project cannot come to the shop.'],
        ['q' => 'Do you serve residential clients or only commercial and industrial?', 'a' => 'We serve commercial, industrial, and residential customers throughout San Antonio. Whether it is a backyard gate and railing or a large structural steel package, AGA Welding & Fabrication has the expertise to deliver.'],
        ['q' => 'Are your welders certified, and what quality guarantees do you provide?', 'a' => 'All of our welders are certified professionals. AGA Welding & Fabrication maintains rigorous quality-control standards on every joint and stands behind its work with a commitment to durability and precision.'],
    ],
    'Services' => [
        ['q' => 'Do you work from existing designs or offer design help?', 'a' => 'We do both. Our San Antonio team can consult on your concept and bring an idea to life from scratch, or fabricate directly from your existing blueprints and specifications.'],
        ['q' => 'What welding processes do you use?', 'a' => 'AGA Welding & Fabrication uses MIG, TIG, stick (SMAW), flux-cored, and pipe welding processes. We select the best technique based on the metal type, thickness, application, and code requirements for your project.'],
        ['q' => 'Can you fabricate steel from my own drawings or shop plans?', 'a' => 'Yes. AGA Welding & Fabrication works directly from your blueprints, CAD files, or shop drawings, and can also develop the details in-house if you only have a concept. We confirm dimensions and material specs before cutting so the finished steel fits the first time.'],
        ['q' => 'What types of steel and metal do you fabricate?', 'a' => 'AGA Welding & Fabrication fabricates carbon steel, stainless, and aluminum in plate, bar, tube, angle, and structural shapes. Whether you need light gauge brackets or heavy structural members, our San Antonio shop handles the cutting, forming, welding, and assembly under one roof.'],
        ['q' => 'Do you offer mobile welding services?', 'a' => 'Yes. When your project cannot come to the shop, AGA Welding & Fabrication brings the crew and equipment directly to your San Antonio site for on-location repairs and fabrication work.'],
    ],
    'Pricing & Timeline' => [
        ['q' => 'How much does metal fabrication cost in San Antonio?', 'a' => 'Costs vary based on material weight, complexity, and finish requirements. A small bracket run differs sharply from a structural package. AGA Welding & Fabrication quotes from your drawings or a shop measure and gives a clear, itemized estimate before any steel is cut.'],
        ['q' => 'How fast can you turn around a fabrication project?', 'a' => 'Timeline depends on scope and complexity. AGA Welding & Fabrication prioritizes efficiency without cutting corners, and we set a realistic schedule with you during the consultation. Rush service is available for urgent repairs and deadlines.'],
        ['q' => 'Do you provide free estimates?', 'a' => 'Yes. AGA Welding & Fabrication provides no-obligation estimates for all welding and metal fabrication projects in San Antonio. Contact us with your project details and we will follow up the same day.'],
        ['q' => 'What payment methods do you accept?', 'a' => 'We accept check, electronic transfer, and major credit cards. Payment terms are detailed in your project contract, typically including a deposit at contract signing and final balance due upon completion.'],
    ],
    'Process & Requirements' => [
        ['q' => 'What is your fabrication process from start to finish?', 'a' => 'We start with a consultation and quote, then design and engineer the details to meet code. Our certified welders cut, form, and join your steel in-house. Finally, we deliver to your San Antonio job site and install — or bring mobile welding to you for on-site work.'],
        ['q' => 'Do I need engineered drawings for my project?', 'a' => 'Not always. For structural steel that must meet building codes, engineered drawings are required. For non-structural custom work like railings, awnings, or decorative pieces, a sketch or photo is often sufficient. We can help determine what is needed during the estimate.'],
        ['q' => 'Can you handle both small custom jobs and large industrial projects?', 'a' => 'Absolutely. AGA Welding & Fabrication has the capacity and experience to handle single custom pieces and large-scale industrial fabrication projects. Our shop is equipped for jobs of any size.'],
        ['q' => 'Do you offer installation or just fabrication?', 'a' => 'We offer both. AGA Welding & Fabrication can fabricate at the shop and deliver to your site, or provide full installation services. We also offer mobile welding for on-site fabrication and installation when required.'],
    ],
];

/* FAQPage schema */
$allFaqs = [];
foreach ($faqCategories as $catFaqs) {
    $allFaqs = array_merge($allFaqs, $catFaqs);
}
$faqSchema = generateFAQSchema($allFaqs);

/* Breadcrumb schema */
$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => $siteUrl . '/'],
    ['name' => 'FAQ',  'url' => $canonicalUrl],
]);

$schemaMarkup = json_encode([
    '@context' => 'https://schema.org',
    '@graph'   => [
        json_decode($faqSchema, true),
        json_decode($breadcrumbSchema, true),
    ]
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $schemaMarkup; ?></script>

<main id="main-content">

<!-- ============================ HERO ============================ -->
<section class="hero hero--interior" aria-label="Frequently Asked Questions">
  <div class="container">
    <div class="hero-text-center">
      <span class="eyebrow">FAQ</span>
      <h1 class="hero-title">Welding &amp; Fabrication <span class="text-accent">Questions Answered</span></h1>
      <p class="hero-answer">Common questions about AGA Welding &amp; Fabrication's services, pricing, timelines, certification, and how we work on metal fabrication projects in San Antonio.</p>
    </div>
  </div>
</section>

<!-- ============================ FAQ SECTIONS ============================ -->
<section class="section section--light" aria-label="FAQ categories">
  <div class="container">

    <?php foreach ($faqCategories as $category => $faqs): ?>
    <div class="faq-category">
      <h2 class="faq-category-title reveal-up"><?php echo htmlspecialchars($category); ?></h2>
      <div class="faq-grid">
        <?php foreach ($faqs as $i => $faq): ?>
        <details class="faq reveal-up reveal-delay-<?php echo ($i % 3) + 1; ?>"<?php echo $i < 2 ? ' open' : ''; ?>>
          <summary><?php echo htmlspecialchars($faq['q']); ?></summary>
          <p><?php echo htmlspecialchars($faq['a']); ?></p>
        </details>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endforeach; ?>

  </div>
</section>

<!-- ============================ CTA SECTION ============================ -->
<section class="cta-banner texture-grain edge-curve-top" id="estimate" aria-label="Still have questions?">
  <span class="grain-layer" aria-hidden="true"></span>
  <div class="container">
    <div>
      <span class="eyebrow-label">Still Have Questions?</span>
      <h2>Let's talk about your fabrication project</h2>
      <p>Can't find the answer you're looking for? Send us your project details and we'll get back to you the same day with answers and a clear estimate.</p>
    </div>
    <div class="actions">
      <button type="button" class="btn btn-accent btn-lg" data-open-estimate>Get free estimate</button>
      <a class="btn btn-outline-white btn-lg" href="/contact/">Contact us</a>
    </div>
  </div>
</section>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
