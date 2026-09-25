<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * 404 Error Page — AGA Welding & Fabrication (Phase 5)
 * ------------------------------------------------------------------------- */
http_response_code(404);

$pageType        = 'other';
$currentPage     = '';
$noindex         = true;  // Do not index 404 pages

$pageTitle       = 'Page Not Found | ' . $siteName;
$pageDescription = 'The page you are looking for could not be found. Browse our welding and metal fabrication services or contact us for help.';
$canonicalUrl    = $siteUrl . '/404/';
$ogImage         = $siteUrl . '/assets/images/logo.png';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<main id="main-content">

  <!-- 404 Hero -->
  <section class="hero hero--interior" style="background: var(--color-bg-alt); padding-top: calc(var(--nav-height) + 4rem); padding-bottom: 4rem;">
    <div class="container" style="text-align: center; max-width: 700px; margin: 0 auto;">
      <div style="display: inline-flex; align-items: center; justify-content: center; width: 100px; height: 100px; background: rgba(var(--color-accent-rgb, 232, 117, 24), 0.1); border-radius: 50%; margin-bottom: 2rem;">
        <svg aria-hidden="true" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="10"/>
          <path d="m15 9-6 6"/>
          <path d="m9 9 6 6"/>
        </svg>
      </div>
      <h1 style="font-size: 2.5rem; margin-bottom: 1rem;">Page Not Found</h1>
      <p style="font-size: 1.125rem; color: var(--color-text-light); margin-bottom: 2rem; line-height: 1.6;">
        We couldn't find the page you're looking for. It may have been moved, renamed, or removed.
      </p>
      <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
        <a href="/" class="btn btn-primary">Back to Homepage</a>
        <a href="/services/" class="btn btn-secondary">View Our Services</a>
      </div>
    </div>
  </section>

  <!-- Helpful Links Section -->
  <section style="padding: 4rem 0; background: #fff;">
    <div class="container" style="max-width: 900px;">
      <h2 style="text-align: center; margin-bottom: 3rem; font-size: 1.75rem;">Looking for something?</h2>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">

        <!-- Quick Link Card -->
        <div style="background: var(--color-bg-alt); padding: 2rem; border-radius: var(--radius); border-left: 4px solid var(--color-accent);">
          <h3 style="font-size: 1.25rem; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
            <?php echo icon('layers', 24); ?>
            Our Services
          </h3>
          <p style="color: var(--color-text-light); margin-bottom: 1rem; font-size: 0.95rem;">
            Explore our complete range of welding and metal fabrication services.
          </p>
          <a href="/services/" style="color: var(--color-accent); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 0.25rem;">
            View Services
            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m9 18 6-6-6-6"/>
            </svg>
          </a>
        </div>

        <!-- Quick Link Card -->
        <div style="background: var(--color-bg-alt); padding: 2rem; border-radius: var(--radius); border-left: 4px solid var(--color-accent);">
          <h3 style="font-size: 1.25rem; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
            <?php echo icon('message-circle', 24); ?>
            Contact Us
          </h3>
          <p style="color: var(--color-text-light); margin-bottom: 1rem; font-size: 0.95rem;">
            Get in touch for a free estimate or project consultation.
          </p>
          <a href="/contact/" style="color: var(--color-accent); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 0.25rem;">
            Contact Us
            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m9 18 6-6-6-6"/>
            </svg>
          </a>
        </div>

        <!-- Quick Link Card -->
        <div style="background: var(--color-bg-alt); padding: 2rem; border-radius: var(--radius); border-left: 4px solid var(--color-accent);">
          <h3 style="font-size: 1.25rem; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
            <?php echo icon('info', 24); ?>
            About Us
          </h3>
          <p style="color: var(--color-text-light); margin-bottom: 1rem; font-size: 0.95rem;">
            Learn about our <?php echo $yearsInBusiness; ?> years of precision craftsmanship.
          </p>
          <a href="/about/" style="color: var(--color-accent); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 0.25rem;">
            Learn More
            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m9 18 6-6-6-6"/>
            </svg>
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section style="padding: 4rem 0; background: var(--color-bg-dark); color: #fff; text-align: center;">
    <div class="container" style="max-width: 700px;">
      <h2 style="color: #fff; margin-bottom: 1rem; font-size: 1.875rem;">Need Help?</h2>
      <p style="color: rgba(255,255,255,0.85); margin-bottom: 2rem; font-size: 1.125rem;">
        Can't find what you're looking for? Contact us and we'll be happy to help.
      </p>
      <a href="/#estimate" class="btn btn-primary btn-lg" data-open-estimate>Get Free Estimate</a>
    </div>
  </section>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
