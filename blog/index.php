<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php';
?>
<?php
$pageType    = 'other';
$currentPage = 'blog';

$pageTitle       = 'Metal Fabrication & Welding Blog | ' . $siteName;
$pageDescription = 'Expert insights on metal fabrication, welding techniques, material selection, and project planning from AGA Welding & Fabrication in San Antonio, TX.';
$canonicalUrl    = $siteUrl . '/blog/';
$ogImage         = $siteUrl . '/assets/images/logo.png';

$breadcrumbSchema = generateBreadcrumbSchema([
    ['name' => 'Home', 'url' => $siteUrl . '/'],
    ['name' => 'Blog', 'url' => $canonicalUrl],
]);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<script type="application/ld+json"><?php echo $breadcrumbSchema; ?></script>

<section class="hero hero--interior hero--solid">
  <span class="grain"></span>
  <div class="container">
    <span class="eyebrow">Expert Insights</span>
    <h1 class="hero-title">Metal Fabrication & Welding <span class="text-accent">Blog</span></h1>
    <p class="hero-answer">Expert guidance on metal fabrication, welding techniques, material selection, and project planning from <?php echo $yearsInBusiness; ?> years of San Antonio metalworking experience.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="blog-grid">
      <?php foreach ($blogPosts as $idx => $post): ?>
      <article class="blog-card" data-animate="reveal-up" data-delay="<?php echo ($idx % 3) + 1; ?>">
        <a href="/blog/<?php echo $post['slug']; ?>/" class="blog-card__image-link">
          <img src="<?php echo $post['image']; ?>" alt="<?php echo htmlspecialchars($post['alt']); ?>" width="960" height="640" loading="lazy" decoding="async">
        </a>
        <div class="blog-card__content">
          <div class="blog-card__meta">
            <span class="blog-card__category"><?php echo htmlspecialchars($post['category']); ?></span>
            <span class="blog-card__date"><?php echo htmlspecialchars($post['date']); ?></span>
            <span class="blog-card__readtime"><?php echo htmlspecialchars($post['readtime']); ?></span>
          </div>
          <h2 class="blog-card__title">
            <a href="/blog/<?php echo $post['slug']; ?>/"><?php echo htmlspecialchars($post['title']); ?></a>
          </h2>
          <p class="blog-card__excerpt"><?php echo htmlspecialchars($post['excerpt']); ?></p>
          <a href="/blog/<?php echo $post['slug']; ?>/" class="blog-card__cta">Read Article →</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section cta-band" id="estimate">
  <span class="grain"></span>
  <div class="container">
    <div class="cta-content">
      <h2 class="cta-title">Ready to Start Your Fabrication Project?</h2>
      <p class="cta-text">Get expert guidance and a free estimate from AGA Welding & Fabrication.</p>
    </div>
    <div class="cta-actions">
      <?php if ($phone): ?><a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="btn btn-primary btn-lg">Call Now</a><?php endif; ?>
      <button type="button" class="btn btn-secondary btn-lg" data-open-estimate">Get Free Estimate</button>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
