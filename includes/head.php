<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php
    // SEO variables (set by each page before including this file)
    $pageTitle = $pageTitle ?? ($siteName . ' | ' . $primaryKeyword . ' | ' . $address['city'] . ', ' . $address['state']);
    $pageDescription = $pageDescription ?? ('Expert ' . $primaryKeyword . ' services in ' . $address['city'] . ', ' . $address['state'] . '. ' . $siteName . ' delivers precision craftsmanship and reliable metal fabrication solutions for commercial, industrial, and residential clients.');
    $canonicalUrl = $canonicalUrl ?? ($siteUrl . $_SERVER['REQUEST_URI']);
    $ogImage = $ogImage ?? ($siteUrl . '/assets/images/logo.png');
    ?>
    
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl); ?>">
    
    <!-- Open Graph -->
    <meta property="og:type" content="<?php echo $ogType ?? 'website'; ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($ogImage); ?>">
    <meta property="og:site_name" content="<?php echo htmlspecialchars($siteName); ?>">
    <meta property="og:locale" content="en_US">
    
    <!-- Favicons -->
    <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
    
    <!-- Fonts: Self-hosted, preload heading face only (v6.2) -->
    <link rel="preload" href="/assets/fonts/bricolage-grotesque.woff2" as="font" type="font/woff2" crossorigin>
    
    <!-- Critical CSS (v6.3) -->
    <style><?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/critical.css'; ?></style>
    
    <!-- Framework CSS: async load (v6.3) -->
    <link rel="preload" href="/assets/css/framework.css?v=<?php echo $cssVersion; ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="/assets/css/framework.css?v=<?php echo $cssVersion; ?>"></noscript>
    
    <?php
    // Hero image preload (v6.3)
    if (isset($heroPreload) && !empty($heroPreload['srcset'])):
    ?>
    <link rel="preload" as="image" type="image/avif" imagesrcset="<?php echo $heroPreload['srcset']; ?>" imagesizes="<?php echo $heroPreload['sizes']; ?>" fetchpriority="high">
    <?php endif; ?>
    
    <!-- Google Analytics (placeholder - replace post-launch) -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $googleAnalyticsId; ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '<?php echo $googleAnalyticsId; ?>');
    </script> -->
    
    <?php if (!isset($noindex) || !$noindex): ?>
    <!-- LocalBusiness Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Contractor",
      "@id": "<?php echo $siteUrl; ?>/#organization",
      "name": "<?php echo htmlspecialchars($siteName); ?>",
      "url": "<?php echo $siteUrl; ?>",
      "telephone": "<?php echo htmlspecialchars($phone); ?>",
      "email": "<?php echo htmlspecialchars($email); ?>",
      "description": "<?php echo htmlspecialchars($siteName); ?> provides expert welding and metal fabrication services in <?php echo $address['city']; ?>, <?php echo $address['state']; ?>. <?php echo $yearsInBusiness; ?> years of precision craftsmanship for commercial, industrial, and residential clients.",
      "image": "<?php echo $siteUrl; ?>/assets/images/logo.png",
      "logo": "<?php echo $siteUrl; ?>/assets/images/logo.png",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?php echo htmlspecialchars($address['street']); ?>",
        "addressLocality": "<?php echo htmlspecialchars($address['city']); ?>",
        "addressRegion": "<?php echo $address['state']; ?>",
        "postalCode": "<?php echo $address['zip']; ?>",
        "addressCountry": "US"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": <?php echo $geo['lat']; ?>,
        "longitude": <?php echo $geo['lng']; ?>
      },
      "areaServed": {
        "@type": "City",
        "name": "<?php echo $address['city']; ?>",
        "containedInPlace": {
          "@type": "State",
          "name": "<?php echo $address['state']; ?>"
        }
      },
      "hasMap": "https://www.google.com/maps/place/?q=place_id:<?php echo $gbpPlaceId; ?>",
      "priceRange": "$$",
      "openingHours": "Mo-Fr 08:00-17:00"
    }
    </script>
    <?php endif; ?>
</head>
<body>
