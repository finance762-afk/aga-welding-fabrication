<!-- Skip to main content (accessibility) -->
<a href="#main-content" class="skip-link">Skip to main content</a>

<!-- Site Header -->
<header class="site-header" data-header>
  <nav class="navbar" role="navigation" aria-label="Main navigation">
    <div class="navbar-inner container">

      <!-- Logo -->
      <a href="/" class="site-logo" aria-label="<?php echo htmlspecialchars($siteName); ?> home">
        <img src="/assets/images/logo.png" alt="<?php echo htmlspecialchars($siteName); ?>" width="202" height="110">
      </a>

      <!-- Desktop Navigation -->
      <ul class="navbar-links" role="menubar">
        <li role="none">
          <a href="/" role="menuitem" <?php echo ($currentPage ?? '') === 'home' ? 'aria-current="page"' : ''; ?>>Home</a>
        </li>

        <li class="has-dropdown" role="none">
          <a href="/services/" role="menuitem" aria-haspopup="true" aria-expanded="false" <?php echo ($currentPage ?? '') === 'services' ? 'aria-current="page"' : ''; ?>>
            Services
            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
          </a>
          <ul class="dropdown" role="menu" style="display:none">
            <?php foreach ($services as $navSvc): ?>
            <li role="none">
              <a href="/services/<?php echo $navSvc['slug']; ?>/" role="menuitem"><?php echo htmlspecialchars($navSvc['name']); ?></a>
            </li>
            <?php endforeach; ?>
          </ul>
        </li>

        <li role="none">
          <a href="/about/" role="menuitem" <?php echo ($currentPage ?? '') === 'about' ? 'aria-current="page"' : ''; ?>>About</a>
        </li>

        <li role="none">
          <a href="/blog/" role="menuitem" <?php echo ($currentPage ?? '') === 'blog' ? 'aria-current="page"' : ''; ?>>Blog</a>
        </li>

        <li role="none">
          <a href="/contact/" role="menuitem" <?php echo ($currentPage ?? '') === 'contact' ? 'aria-current="page"' : ''; ?>>Contact</a>
        </li>
      </ul>

      <!-- Desktop CTA -->
      <div class="navbar-cta">
        <?php if ($phone): ?>
        <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="navbar-phone" aria-label="Call <?php echo htmlspecialchars($phone); ?>">
          <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1 2-2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" /></svg>
          <span><?php echo htmlspecialchars($phone); ?></span>
        </a>
        <?php endif; ?>
        <a href="/#estimate" class="btn-primary">Free Estimate</a>
      </div>

      <!-- Mobile Hamburger -->
      <button class="hamburger" aria-label="Toggle mobile menu" aria-expanded="false" aria-controls="mobile-menu">
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
      </button>

    </div>
  </nav>
</header>

<!-- Mobile Menu (outside header per v6.3 rules) -->
<div class="mobile-menu" id="mobile-menu" aria-hidden="true">
  <div class="mobile-menu-inner">
    <button class="mobile-menu-close" aria-label="Close mobile menu">
      <svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
    </button>

    <ul class="mobile-menu-links" role="menu">
      <li role="none"><a href="/" role="menuitem">Home</a></li>
      <li role="none"><a href="/services/" role="menuitem">All Services</a></li>

      <?php foreach ($services as $navSvc): ?>
      <li role="none" class="mobile-submenu-item">
        <a href="/services/<?php echo $navSvc['slug']; ?>/" role="menuitem"><?php echo htmlspecialchars($navSvc['name']); ?></a>
      </li>
      <?php endforeach; ?>

      <li role="none"><a href="/about/" role="menuitem">About</a></li>
      <li role="none"><a href="/blog/" role="menuitem">Blog</a></li>
      <li role="none"><a href="/contact/" role="menuitem">Contact</a></li>
    </ul>

    <div class="mobile-menu-cta">
      <a href="/#estimate" class="btn-primary btn-block">Get Free Estimate</a>
      <?php if ($phone): ?>
      <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone); ?>" class="btn-secondary btn-block">
        <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1 2-2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384" /></svg>
        Call Now
      </a>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- Main Content -->
<main id="main-content">
