<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ---------------------------------------------------------------------------
 * Thank You Page — AGA Welding & Fabrication
 * ------------------------------------------------------------------------- */
$pageTitle       = 'Thank You | ' . $siteName;
$pageDescription = 'Thank you for contacting AGA Welding & Fabrication. We will respond to your inquiry within 1 business day.';
$canonicalUrl    = $siteUrl . '/thank-you';
$currentPage     = 'thank-you';
$noindex         = true; // Do not index thank-you page

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<main id="main-content">

  <!-- Thank You Hero -->
  <section class="hero hero--interior" style="background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%); color: #fff; padding-top: calc(var(--nav-height) + 5rem); padding-bottom: 5rem; text-align: center;">
    <div class="container" style="max-width: 700px; margin: 0 auto;">

      <!-- Success Icon -->
      <div style="display: inline-flex; align-items: center; justify-content: center; width: 120px; height: 120px; background: rgba(255,255,255,0.15); border-radius: 50%; margin-bottom: 2rem; backdrop-filter: blur(10px);">
        <svg aria-hidden="true" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M20 6 9 17l-5-5"/>
        </svg>
      </div>

      <h1 style="color: #fff; font-size: 2.5rem; margin-bottom: 1rem;">Thank You!</h1>
      <p style="font-size: 1.25rem; color: rgba(255,255,255,0.95); margin-bottom: 0; line-height: 1.6;">
        We've received your request and will get back to you within <strong>1 business day</strong>.
      </p>
    </div>
  </section>

  <!-- What Happens Next -->
  <section style="padding: 4rem 0; background: #fff;">
    <div class="container" style="max-width: 800px;">
      <h2 style="text-align: center; margin-bottom: 3rem; font-size: 1.875rem;">What Happens Next</h2>

      <div style="display: grid; gap: 2rem;">

        <!-- Step 1 -->
        <div style="display: flex; gap: 1.5rem; align-items: start;">
          <div style="flex-shrink: 0; width: 48px; height: 48px; background: var(--color-accent); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 700;">
            1
          </div>
          <div>
            <h3 style="font-size: 1.25rem; margin-bottom: 0.5rem;">We Review Your Request</h3>
            <p style="color: var(--color-text-light); margin: 0; line-height: 1.6;">
              Our team will carefully review your project details to understand your needs and timeline.
            </p>
          </div>
        </div>

        <!-- Step 2 -->
        <div style="display: flex; gap: 1.5rem; align-items: start;">
          <div style="flex-shrink: 0; width: 48px; height: 48px; background: var(--color-accent); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 700;">
            2
          </div>
          <div>
            <h3 style="font-size: 1.25rem; margin-bottom: 0.5rem;">We Contact You</h3>
            <p style="color: var(--color-text-light); margin: 0; line-height: 1.6;">
              A member of our team will reach out to discuss your project and answer any questions.
            </p>
          </div>
        </div>

        <!-- Step 3 -->
        <div style="display: flex; gap: 1.5rem; align-items: start;">
          <div style="flex-shrink: 0; width: 48px; height: 48px; background: var(--color-accent); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 700;">
            3
          </div>
          <div>
            <h3 style="font-size: 1.25rem; margin-bottom: 0.5rem;">We Provide an Estimate</h3>
            <p style="color: var(--color-text-light); margin: 0; line-height: 1.6;">
              We'll provide a detailed estimate with transparent pricing and a clear timeline.
            </p>
          </div>
        </div>

        <!-- Step 4 -->
        <div style="display: flex; gap: 1.5rem; align-items: start;">
          <div style="flex-shrink: 0; width: 48px; height: 48px; background: var(--color-accent); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 700;">
            4
          </div>
          <div>
            <h3 style="font-size: 1.25rem; margin-bottom: 0.5rem;">We Get to Work</h3>
            <p style="color: var(--color-text-light); margin: 0; line-height: 1.6;">
              Once approved, our certified welders and fabricators deliver precision craftsmanship on time.
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Need Immediate Help -->
  <section style="padding: 4rem 0; background: var(--color-bg-alt);">
    <div class="container" style="max-width: 700px; text-align: center;">
      <h2 style="margin-bottom: 1rem; font-size: 1.75rem;">Need Immediate Help?</h2>
      <p style="color: var(--color-text-light); margin-bottom: 2rem; font-size: 1.0625rem;">
        For urgent requests or questions, you can reach us directly:
      </p>
      <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
        <?php if ($phone): ?>
        <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="btn btn-primary btn-lg">
          <?php echo icon('phone', 20); ?>
          Call Us Now
        </a>
        <?php endif; ?>
        <a href="/" class="btn btn-secondary btn-lg">Return to Homepage</a>
      </div>
    </div>
  </section>

  <!-- Keep Exploring -->
  <section style="padding: 4rem 0; background: #fff;">
    <div class="container" style="max-width: 900px; text-align: center;">
      <h2 style="margin-bottom: 1rem; font-size: 1.75rem;">While You Wait</h2>
      <p style="color: var(--color-text-light); margin-bottom: 3rem; max-width: 600px; margin-left: auto; margin-right: auto;">
        Learn more about our <?php echo $yearsInBusiness; ?> years of experience in welding and metal fabrication.
      </p>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; text-align: left;">

        <a href="/about/" style="display: block; background: var(--color-bg-alt); padding: 2rem; border-radius: var(--radius); border-left: 4px solid var(--color-accent); text-decoration: none; color: inherit; transition: transform var(--transition), box-shadow var(--transition);" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.12)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
          <h3 style="font-size: 1.125rem; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <?php echo icon('info', 20); ?>
            About Us
          </h3>
          <p style="color: var(--color-text-light); margin: 0; font-size: 0.95rem;">
            Discover our story and commitment to precision craftsmanship.
          </p>
        </a>

        <a href="/services/" style="display: block; background: var(--color-bg-alt); padding: 2rem; border-radius: var(--radius); border-left: 4px solid var(--color-accent); text-decoration: none; color: inherit; transition: transform var(--transition), box-shadow var(--transition);" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.12)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
          <h3 style="font-size: 1.125rem; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <?php echo icon('layers', 20); ?>
            Our Services
          </h3>
          <p style="color: var(--color-text-light); margin: 0; font-size: 0.95rem;">
            Explore our complete range of welding and fabrication services.
          </p>
        </a>

        <a href="/faq/" style="display: block; background: var(--color-bg-alt); padding: 2rem; border-radius: var(--radius); border-left: 4px solid var(--color-accent); text-decoration: none; color: inherit; transition: transform var(--transition), box-shadow var(--transition);" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.12)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
          <h3 style="font-size: 1.125rem; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <?php echo icon('help-circle', 20); ?>
            FAQ
          </h3>
          <p style="color: var(--color-text-light); margin: 0; font-size: 0.95rem;">
            Get answers to common questions about our services.
          </p>
        </a>

      </div>
    </div>
  </section>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
