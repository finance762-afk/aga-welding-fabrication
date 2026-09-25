<?php
/**
 * includes/functions.php — Helper functions for AGA Welding & Fabrication
 * Loaded after config.php on every page.
 */

/**
 * Check if the current page matches the given page name
 * 
 * @param string $page Page identifier (e.g., 'home', 'services', 'about')
 * @return bool
 */
function isActivePage($page) {
    global $currentPage;
    return isset($currentPage) && $currentPage === $page;
}

/**
 * Format phone number for display
 * 
 * @param string $phone Raw phone number
 * @return string Formatted phone number (e.g., "(210) 555-1234")
 */
function formatPhone($phone) {
    // Remove all non-numeric characters
    $clean = preg_replace('/[^0-9]/', '', $phone);
    
    // Format as (XXX) XXX-XXXX
    if (strlen($clean) === 10) {
        return sprintf('(%s) %s-%s', 
            substr($clean, 0, 3),
            substr($clean, 3, 3),
            substr($clean, 6)
        );
    }
    
    // Return original if not 10 digits
    return $phone;
}

/**
 * Generate slug from service name
 * 
 * @param string $name Service name
 * @return string URL-safe slug
 */
function getServiceSlug($name) {
    $slug = strtolower($name);
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
    $slug = trim($slug, '-');
    return $slug;
}

/**
 * Generate slug from city/area name
 * 
 * @param string $city City name
 * @return string URL-safe slug
 */
function getAreaSlug($city) {
    $slug = strtolower($city);
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
    $slug = trim($slug, '-');
    return $slug;
}

/**
 * Generate Service schema for a service page
 * 
 * @param array $service Service array from config
 * @param string $serviceUrl Full URL to service page
 * @return string JSON-LD schema markup
 */
function generateServiceSchema($service, $serviceUrl) {
    global $siteName, $siteUrl, $address, $phone, $email, $geo;
    
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $service['name'],
        'description' => $service['description'],
        'url' => $serviceUrl,
        'provider' => [
            '@type' => 'Organization',
            '@id' => $siteUrl . '#organization',
            'name' => $siteName
        ],
        'areaServed' => [
            '@type' => 'City',
            'name' => $address['city'] . ', ' . $address['state']
        ],
        'serviceType' => $service['name']
    ];
    
    return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}

/**
 * Generate FAQPage schema from FAQ array
 * 
 * @param array $faqs Array of ['q' => 'question', 'a' => 'answer']
 * @return string JSON-LD schema markup
 */
function generateFAQSchema($faqs) {
    $mainEntity = [];
    
    foreach ($faqs as $faq) {
        $mainEntity[] = [
            '@type' => 'Question',
            'name' => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['a']
            ]
        ];
    }
    
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $mainEntity
    ];
    
    return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}

/**
 * Generate BreadcrumbList schema
 * 
 * @param array $breadcrumbs Array of ['name' => 'Page Name', 'url' => 'https://...']
 * @return string JSON-LD schema markup
 */
function generateBreadcrumbSchema($breadcrumbs) {
    $itemListElement = [];
    
    foreach ($breadcrumbs as $index => $crumb) {
        $itemListElement[] = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $crumb['name'],
            'item' => $crumb['url']
        ];
    }
    
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $itemListElement
    ];
    
    return json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}

/**
 * Escape HTML output
 * Convenience wrapper for htmlspecialchars with UTF-8 encoding
 * 
 * @param string $text Text to escape
 * @return string Escaped text
 */
function esc($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

/**
 * Truncate text to specified length with ellipsis
 * 
 * @param string $text Text to truncate
 * @param int $length Maximum length
 * @param string $suffix Suffix to append (default '...')
 * @return string Truncated text
 */
function truncate($text, $length = 150, $suffix = '...') {
    if (strlen($text) <= $length) {
        return $text;
    }
    
    return substr($text, 0, $length - strlen($suffix)) . $suffix;
}

/**
 * Get icon SVG markup
 * Reads inline SVG from references/lucide-icons directory
 * 
 * @param string $name Icon name (e.g., 'phone', 'mail')
 * @param int $size Icon size in pixels (default 24)
 * @return string SVG markup or empty string if not found
 */
function icon($name, $size = 24) {
    // Try local references first, then crm references
    $paths = [
        $_SERVER['DOCUMENT_ROOT'] . '/references/lucide-icons/' . $name . '.svg',
        '/home/calvin/crm/references/lucide-icons/' . $name . '.svg'
    ];
    
    foreach ($paths as $iconPath) {
        if (file_exists($iconPath)) {
            $svg = file_get_contents($iconPath);
            // Strip license comment and add aria-hidden
            $svg = preg_replace('/<!-- @license.*?-->/', '', $svg);
            $svg = str_replace('<svg', '<svg aria-hidden="true"', $svg);
            $svg = preg_replace('/width="\d+"/', 'width="' . $size . '"', $svg);
            $svg = preg_replace('/height="\d+"/', 'height="' . $size . '"', $svg);
            
            return trim($svg);
        }
    }
    
    return '';
}
