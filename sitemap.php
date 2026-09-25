<?php
/**
 * Dynamic Sitemap - AGA Welding & Fabrication
 * Accessed via /sitemap.xml (rewritten by .htaccess)
 */

header('Content-Type: application/xml; charset=utf-8');

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';

// Check if blog exists
$hasBlog = file_exists($_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php');
if ($hasBlog) {
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/blog-data.php';
}

$baseUrl = 'https://' . $domain;
$currentDate = date('Y-m-d');

// Page registry
$pages = [
    // Main pages
    ['loc' => '/', 'lastmod' => '2026-09-25', 'changefreq' => 'weekly', 'priority' => '1.0'],
    ['loc' => '/about/', 'lastmod' => '2026-09-25', 'changefreq' => 'monthly', 'priority' => '0.8'],
    ['loc' => '/contact/', 'lastmod' => '2026-09-25', 'changefreq' => 'monthly', 'priority' => '0.8'],
    ['loc' => '/faq/', 'lastmod' => '2026-09-25', 'changefreq' => 'monthly', 'priority' => '0.7'],

    // Services main
    ['loc' => '/services/', 'lastmod' => '2026-09-25', 'changefreq' => 'monthly', 'priority' => '0.9'],
];

// Add all service pages
foreach ($services as $svc) {
    $pages[] = [
        'loc' => '/services/' . $svc['slug'] . '/',
        'lastmod' => '2026-09-25',
        'changefreq' => 'monthly',
        'priority' => '0.8'
    ];
}

// Add blog if it exists
if ($hasBlog) {
    $pages[] = ['loc' => '/blog/', 'lastmod' => $currentDate, 'changefreq' => 'weekly', 'priority' => '0.7'];
}

// Legal pages (Premium tier)
$pages[] = ['loc' => '/privacy-policy/', 'lastmod' => $currentDate, 'changefreq' => 'yearly', 'priority' => '0.3'];
$pages[] = ['loc' => '/terms/', 'lastmod' => $currentDate, 'changefreq' => 'yearly', 'priority' => '0.3'];
$pages[] = ['loc' => '/cookie-policy/', 'lastmod' => $currentDate, 'changefreq' => 'yearly', 'priority' => '0.3'];
$pages[] = ['loc' => '/accessibility/', 'lastmod' => $currentDate, 'changefreq' => 'yearly', 'priority' => '0.3'];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($pages as $page): ?>
  <url>
    <loc><?php echo htmlspecialchars($baseUrl . $page['loc']); ?></loc>
    <lastmod><?php echo $page['lastmod']; ?></lastmod>
    <changefreq><?php echo $page['changefreq']; ?></changefreq>
    <priority><?php echo $page['priority']; ?></priority>
  </url>
<?php endforeach; ?>

<?php if ($hasBlog && isset($blogPosts)): ?>
<?php foreach ($blogPosts as $post): ?>
  <url>
    <loc><?php echo htmlspecialchars($baseUrl . '/blog/' . $post['slug'] . '/'); ?></loc>
    <lastmod><?php echo $post['dateISO']; ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.6</priority>
  </url>
<?php endforeach; ?>
<?php endif; ?>
</urlset>
