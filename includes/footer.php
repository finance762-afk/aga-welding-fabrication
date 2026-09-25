</main>

<!-- Site Footer -->
<footer class="site-footer">
  <div class="footer-top">
    <div class="container">
      <div class="footer-grid">
        
        <!-- Column 1: Company Info -->
        <div class="footer-col">
          <a href="/" class="footer-logo">
            <img src="/assets/images/logo.png" alt="<?php echo htmlspecialchars($siteName); ?>" width="160" height="87">
          </a>
          <p class="footer-tagline"><?php echo htmlspecialchars($tagline); ?></p>
          <p class="footer-description">Expert metal fabrication and welding services serving <?php echo $address['city']; ?>, <?php echo $address['state']; ?>. <?php echo $yearsInBusiness; ?> years of precision craftsmanship.</p>
          
          <div class="footer-trust-badges">
            <span class="trust-badge">
              <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
              Licensed & Insured
            </span>
            <span class="trust-badge">
              <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
              <?php echo $yearsInBusiness; ?> Years Experience
            </span>
            <span class="trust-badge">
              <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
              Free Estimates
            </span>
          </div>
        </div>

        <!-- Column 2: Services -->
        <div class="footer-col">
          <h3 class="footer-heading">Our Services</h3>
          <ul class="footer-links">
            <?php 
            $footSvcCount = 0;
            foreach ($services as $footSvc): 
              if ($footSvcCount >= 8) break;
              $footSvcCount++;
            ?>
            <li><a href="/services/<?php echo $footSvc['slug']; ?>/"><?php echo htmlspecialchars($footSvc['name']); ?></a></li>
            <?php endforeach; ?>
            <?php if (count($services) > 8): ?>
            <li><a href="/services/" class="view-all-link">View All Services →</a></li>
            <?php endif; ?>
          </ul>
        </div>

        <!-- Column 3: Company Links -->
        <div class="footer-col">
          <h3 class="footer-heading">Company</h3>
          <ul class="footer-links">
            <li><a href="/about/">About Us</a></li>
            <li><a href="/services/">Services</a></li>
            <?php if (!empty($serviceAreas)): ?>
            <li><a href="/service-areas/">Service Areas</a></li>
            <?php endif; ?>
            <li><a href="/blog/">Blog</a></li>
            <li><a href="/faq/">FAQ</a></li>
            <li><a href="/contact/">Contact</a></li>
          </ul>
        </div>

        <!-- Column 4: Contact Info -->
        <div class="footer-col">
          <h3 class="footer-heading">Contact Us</h3>
          <ul class="footer-contact">
            <?php if ($phone): ?>
            <li>
              <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" /></svg>
              <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>"><?php echo htmlspecialchars($phone); ?></a>
            </li>
            <?php endif; ?>
            
            <?php if ($email): ?>
            <li>
              <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"/><rect x="2" y="4" width="20" height="16" rx="2"/></svg>
              <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a>
            </li>
            <?php endif; ?>
            
            <li>
              <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>
              <span>
                <?php echo htmlspecialchars($address['street']); ?><br>
                <?php echo htmlspecialchars($address['city']); ?>, <?php echo $address['state']; ?> <?php echo $address['zip']; ?>
              </span>
            </li>
            
            <li>
              <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
              <span>Monday - Friday: 8:00 AM - 5:00 PM</span>
            </li>
          </ul>
          
          <a href="/#estimate" class="btn-primary" style="margin-top: 1.5rem;">Get Free Estimate</a>
        </div>

      </div>
    </div>
  </div>

  <!-- AEO Entity Block -->
  <div class="footer-entity">
    <div class="container">
      <div itemscope itemtype="https://schema.org/Contractor">
        <meta itemprop="name" content="<?php echo htmlspecialchars($siteName); ?>">
        <meta itemprop="url" content="<?php echo $siteUrl; ?>">
        <?php if ($phone): ?>
        <meta itemprop="telephone" content="<?php echo htmlspecialchars($phone); ?>">
        <?php endif; ?>
        <p><?php echo htmlspecialchars($siteName); ?> is a licensed Texas contractor based in <?php echo $address['city']; ?>, serving the greater San Antonio area with expert welding and metal fabrication services. With <?php echo $yearsInBusiness; ?> years of experience, we deliver precision craftsmanship for commercial, industrial, and residential clients.</p>
      </div>
    </div>
  </div>

  <!-- Footer Bottom Bar -->
  <div class="footer-bottom">
    <div class="container">
      
      <!-- Legal Links Row (REQUIRED v6.1) -->
      <nav class="footer-legal-row" aria-label="Legal">
        <a href="/privacy-policy/">Privacy Policy</a>
        <span class="footer-legal-divider">|</span>
        <a href="/terms/">Terms of Service</a>
        <span class="footer-legal-divider">|</span>
        <a href="/cookie-policy/">Cookie Policy</a>
        <span class="footer-legal-divider">|</span>
        <a href="/accessibility/">Accessibility</a>
        <span class="footer-legal-divider">|</span>
        <a href="/privacy-policy/#ccpa-rights">Do Not Sell or Share My Personal Information</a>
        <span class="footer-legal-divider">|</span>
        <a href="/sitemap.xml">Sitemap</a>
      </nav>

      <div class="footer-copyright">
        <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($siteName); ?>. All rights reserved.</p>
        <p>
          <a href="https://pageoneinsights.com" rel="dofollow" target="_blank">Web Design & Hosting by Page One Insights, LLC</a>
        </p>
      </div>

    </div>
  </div>

</footer>

<!-- Back to Top Button -->
<button class="back-to-top" aria-label="Back to top" style="display: none;">
  <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
</button>

<!-- Mobile Floating CTA Bar -->
<div class="mobile-cta-bar">
  <?php if ($phone): ?>
  <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="mobile-cta-btn mobile-cta-phone">
    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" /></svg>
    <span>Call Now</span>
  </a>
  <?php endif; ?>
  <a href="/#estimate" class="mobile-cta-btn mobile-cta-estimate">
    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><path d="M14 2v6h6"/><path d="M9 13h6"/><path d="M9 17h3"/></svg>
    <span>Free Estimate</span>
  </a>
</div>

<!-- Estimate Dialog (site-wide; opened by any [data-open-estimate] button) -->
<dialog class="estimate-dialog" id="estimate-dialog" aria-labelledby="estimate-dialog-title">
  <div class="dialog-head">
    <div>
      <h3 id="estimate-dialog-title">Get a free estimate</h3>
      <p class="footnote">We reply the same day.</p>
    </div>
    <button type="button" class="dialog-close" aria-label="Close" data-close-estimate>
      <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
    </button>
  </div>
  <div class="dialog-body">
    <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST">
      <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
      <input type="hidden" name="_next" value="<?php echo htmlspecialchars($siteUrl); ?>/thank-you">
      <?php echo p1_attribution_fields('dialog'); ?>
      <input type="hidden" name="consent_version" value="v2.1">
      <input type="hidden" name="consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

      <div class="form-grid">
        <div class="field">
          <label for="dlg-name">Your Name</label>
          <input id="dlg-name" type="text" name="name" autocomplete="name" required>
        </div>
        <div class="field">
          <label for="dlg-phone">Phone</label>
          <input id="dlg-phone" type="tel" name="phone" autocomplete="tel" required>
        </div>
        <div class="field full">
          <label for="dlg-email">Email</label>
          <input id="dlg-email" type="email" name="email" autocomplete="email" required>
        </div>
        <div class="field full">
          <label for="dlg-service">Service Needed</label>
          <select id="dlg-service" name="service">
            <option value="">Select a service</option>
            <?php foreach ($services as $dlgSvc): ?>
            <option value="<?php echo htmlspecialchars($dlgSvc['name']); ?>"><?php echo htmlspecialchars($dlgSvc['name']); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="field full">
          <label for="dlg-message">Project Details</label>
          <textarea id="dlg-message" name="message" rows="3" placeholder="Metal, size, quantity, drawings, deadline…"></textarea>
        </div>
      </div>

      <fieldset class="form-consent-fieldset">
        <legend class="form-consent-legend">Communication Consent</legend>
        <label class="form-consent-item consent">
          <input type="checkbox" name="email_opt_in" value="yes" class="consent-checkbox">
          <span class="consent-label"><strong>Email updates (optional):</strong> I agree to receive emails from <?php echo htmlspecialchars($siteName); ?> about my inquiry. I can unsubscribe anytime.</span>
        </label>
        <label class="form-consent-item consent">
          <input type="checkbox" name="sms_opt_in" value="yes" class="consent-checkbox">
          <span class="consent-label"><strong>SMS/Text messages (optional):</strong> I agree to receive texts from <?php echo htmlspecialchars($siteName); ?> at the number provided. Message and data rates may apply. Reply STOP to unsubscribe. <strong>Consent is not a condition of purchase.</strong></span>
        </label>
        <label class="form-consent-item consent form-consent-required">
          <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
          <span class="consent-label">I have read and agree to the <a href="/privacy-policy/">Privacy Policy</a> and <a href="/terms/">Terms of Service</a>. <span class="required-star">*</span></span>
        </label>
      </fieldset>

      <button type="submit" class="btn btn-primary btn-block">Send my request</button>
    </form>
  </div>
</dialog>

<!-- Cookie Consent Bar (slim; revealed after first scroll, remembered via localStorage) -->
<div class="cookie-bar" id="cookie-bar" role="region" aria-label="Cookie notice">
  <p>We use cookies to run this site and understand traffic. See our <a href="/cookie-policy/">Cookie Policy</a>.</p>
  <button type="button">Got it</button>
</div>

<!-- Scripts (all with defer per v6.3) -->
<script src="/assets/js/main.js" defer></script>
<script src="/assets/js/animations.js" defer></script>

<!-- Back to top inline script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const backToTop = document.querySelector('.back-to-top');
  
  if (backToTop) {
    window.addEventListener('scroll', function() {
      if (window.pageYOffset > 300) {
        backToTop.style.display = 'flex';
      } else {
        backToTop.style.display = 'none';
      }
    });

    backToTop.addEventListener('click', function(e) {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }
});
</script>

</body>
</html>
