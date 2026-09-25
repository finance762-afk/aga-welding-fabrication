<?php
/**
 * includes/config.php — site-wide configuration for AGA Welding & Fabrication.
 * All pages: require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php'; before head.php.
 * Generated Phase 1 (scaffold) from build-plan.json.
 */

/* ---------------------------------------------------------------------------
 * Identity
 * ------------------------------------------------------------------------- */
$slug            = 'aga-welding-fabrication';               // exact build directory name
$siteName        = 'AGA Welding & Fabrication';
$tagline         = 'Where Precision Meets Steel';
$phone           = '';                                      // not supplied at intake
$phoneSecondary  = '';
$email           = '';                                      // not supplied at intake

$address = [
    'street' => '8249 Gardner Rd',
    'city'   => 'San Antonio',
    'state'  => 'TX',
    'zip'    => '78263',
];

/* ---------------------------------------------------------------------------
 * Domain / URL
 *   No production_domain supplied in build-plan.json → default to preview URL.
 *   $domain must NEVER be blank; $siteUrl must always be a valid absolute URL.
 * ------------------------------------------------------------------------- */
$domain   = $slug . '.pageone.cloud';                       // e.g. aga-welding-fabrication.pageone.cloud
$siteUrl  = 'https://' . $domain;                           // absolute site root, no trailing slash
$industry = 'other';

/* ---------------------------------------------------------------------------
 * Keywords
 * ------------------------------------------------------------------------- */
$primaryKeyword = 'welding san antonio';
$secondaryKeywords = [
    'welding san antonio tx',
    'metal fabrication san antonio',
    'mig welding san antonio',
    'tig welding san antonio',
    'structural welding san antonio',
    'pipe welding san antonio',
    'custom metal fabrication san antonio',
    'sheet metal fabrication san antonio',
    'welding services near me',
    'mobile welding san antonio',
    'steel fabrication san antonio',
    'handrails and railings san antonio',
];

/* ---------------------------------------------------------------------------
 * Services — one entry per built service page (matches build-plan pages/service_grouping).
 *   Each: name, slug (directory under /services/), description, keywords.
 * ------------------------------------------------------------------------- */
$services = [
    [
        'name'        => 'Steel Fabrication',
        'slug'        => 'steel-fabrication',
        'description' => 'Comprehensive steel fabrication services for commercial and industrial needs. Precision cutting, forming, and assembly of steel components.',
        'keywords'    => ['steel fabrication San Antonio', 'steel fabrication TX', 'metal fabrication services', 'industrial steel work'],
    ],
    [
        'name'        => 'Structural Steel Fabrication',
        'slug'        => 'structural-steel-fabrication',
        'description' => 'Engineered structural steel fabrication for construction and heavy-duty applications. Built to specification and industry standards.',
        'keywords'    => ['structural steel fabrication San Antonio', 'steel fabrication TX', 'construction steel', 'industrial fabrication'],
    ],
    [
        'name'        => 'Sheet Metal Fabrication',
        'slug'        => 'sheet-metal-fabrication',
        'description' => 'Precision sheet metal services including cutting, bending, and assembly. Solutions for HVAC, automotive, and industrial applications.',
        'keywords'    => ['sheet metal fabrication San Antonio', 'sheet metal services TX', 'metal fabrication', 'precision metalwork'],
    ],
    [
        'name'        => 'Metal Cutting',
        'slug'        => 'metal-cutting',
        'description' => 'Professional metal cutting services using modern equipment and techniques. Accurate cuts for any metal fabrication project.',
        'keywords'    => ['metal cutting San Antonio', 'metal cutting services TX', 'precision cutting', 'steel cutting'],
    ],
    [
        'name'        => 'Metal Bending',
        'slug'        => 'metal-bending',
        'description' => 'Expert metal bending and forming services for custom shapes and components. Precision work for structural and decorative applications.',
        'keywords'    => ['metal bending San Antonio', 'metal bending services TX', 'metal forming', 'custom bending'],
    ],
    [
        'name'        => 'Metal Assembly',
        'slug'        => 'metal-assembly',
        'description' => 'Professional metal assembly and component integration services. Skilled technicians for complex multi-part metal structures.',
        'keywords'    => ['metal assembly San Antonio', 'assembly services TX', 'metal fabrication', 'component assembly'],
    ],
    [
        'name'        => 'Metal Repair',
        'slug'        => 'metal-repair',
        'description' => 'Comprehensive metal repair services restoring damaged equipment and structures. Expert solutions for welding, patching, and reinforcement.',
        'keywords'    => ['metal repair San Antonio', 'metal repair services TX', 'equipment repair', 'welding repair'],
    ],
    [
        'name'        => 'Structural Metal Repair',
        'slug'        => 'structural-metal-repair',
        'description' => 'Professional repair of structural metal components and frameworks. Certified techniques ensuring safety and longevity.',
        'keywords'    => ['structural metal repair San Antonio', 'structural repair TX', 'metal repair services', 'reinforcement services'],
    ],
    [
        'name'        => 'Equipment Metal Repair',
        'slug'        => 'equipment-metal-repair',
        'description' => 'Expert repair services for industrial and commercial metal equipment. Minimizing downtime with efficient restoration solutions.',
        'keywords'    => ['equipment metal repair San Antonio', 'equipment repair TX', 'industrial equipment repair', 'metal restoration'],
    ],
    [
        'name'        => 'Handrails & Railings',
        'slug'        => 'handrails-railings',
        'description' => 'Custom-designed and fabricated handrails and railings for safety and aesthetics. Professional installation for residential and commercial properties.',
        'keywords'    => ['handrails railings San Antonio', 'custom railings TX', 'stair railings', 'safety railings'],
    ],
    [
        'name'        => 'Staircases',
        'slug'        => 'staircases',
        'description' => 'Custom metal staircase design and fabrication for residential and commercial spaces. Durable and elegant solutions built to specification.',
        'keywords'    => ['metal staircases San Antonio', 'custom staircases TX', 'steel stairs', 'metal stair fabrication'],
    ],
    [
        'name'        => 'Awnings',
        'slug'        => 'awnings',
        'description' => 'Custom metal awning fabrication and installation for businesses and homes. Durable protection with professional design and craftsmanship.',
        'keywords'    => ['metal awnings San Antonio', 'custom awnings TX', 'commercial awnings', 'steel awnings'],
    ],
    [
        'name'        => 'Racks & Storage Solutions',
        'slug'        => 'racks-storage-solutions',
        'description' => 'Custom-designed metal racks and storage systems for warehouses and facilities. Efficient organization with heavy-duty construction.',
        'keywords'    => ['metal racks San Antonio', 'storage racks TX', 'warehouse racks', 'custom racks'],
    ],
    [
        'name'        => 'Custom Metalwork',
        'slug'        => 'custom-metalwork',
        'description' => 'Artistic and functional custom metalwork for decorative and practical applications. Expert craftsmanship tailored to your vision.',
        'keywords'    => ['custom metalwork San Antonio', 'metal craftsmanship TX', 'decorative metalwork', 'custom metal art'],
    ],
    [
        'name'        => 'General Repairs & Modifications',
        'slug'        => 'general-repairs-modifications',
        'description' => 'Versatile repair and modification services for metal structures and equipment. Professional solutions for customization and restoration.',
        'keywords'    => ['metal repairs modifications San Antonio', 'repair services TX', 'equipment modifications', 'metal restoration'],
    ],
    [
        'name'        => 'Additional Services',
        'slug'        => 'additional-services',
        'description' => 'Pipe, stick, MIG, TIG, flux-cored, structural, and mobile welding plus custom metal fabrication — the full range of welding techniques for any San Antonio project.',
        'keywords'    => ['custom metal fabrication San Antonio', 'mig welding San Antonio', 'tig welding San Antonio', 'mobile welding San Antonio'],
        'subServices' => [
            'Pipe Welding',
            'Stick Welding',
            'MIG Welding',
            'TIG Welding',
            'Flux-Cored Welding',
            'Structural Welding',
            'Mobile Welding',
            'Custom Metal Fabrication',
        ],
    ],
];

/* ---------------------------------------------------------------------------
 * Service areas (Premium tier — full area pages, alphabetical order)
 * ------------------------------------------------------------------------- */
$serviceAreas = [
    ['name' => 'San Antonio',    'slug' => 'san-antonio',    'zip' => '78263', 'county' => 'Bexar',     'primary' => true],
    ['name' => 'Boerne',         'slug' => 'boerne',         'zip' => '78006', 'county' => 'Kendall',   'primary' => false],
    ['name' => 'Converse',       'slug' => 'converse',       'zip' => '78109', 'county' => 'Bexar',     'primary' => false],
    ['name' => 'Helotes',        'slug' => 'helotes',        'zip' => '78023', 'county' => 'Bexar',     'primary' => false],
    ['name' => 'Leon Valley',    'slug' => 'leon-valley',    'zip' => '78238', 'county' => 'Bexar',     'primary' => false],
    ['name' => 'Live Oak',       'slug' => 'live-oak',       'zip' => '78233', 'county' => 'Bexar',     'primary' => false],
    ['name' => 'New Braunfels',  'slug' => 'new-braunfels',  'zip' => '78130', 'county' => 'Comal',     'primary' => false],
    ['name' => 'Schertz',        'slug' => 'schertz',        'zip' => '78154', 'county' => 'Bexar',     'primary' => false],
    ['name' => 'Seguin',         'slug' => 'seguin',         'zip' => '78155', 'county' => 'Guadalupe', 'primary' => false],
    ['name' => 'Universal City', 'slug' => 'universal-city', 'zip' => '78148', 'county' => 'Bexar',     'primary' => false],
];

/* ---------------------------------------------------------------------------
 * Social links (only platforms the client uses; none supplied at intake)
 * ------------------------------------------------------------------------- */
$socialLinks = [];

/* ---------------------------------------------------------------------------
 * Analytics (placeholder — replace with client GA4 ID post-launch)
 * ------------------------------------------------------------------------- */
$googleAnalyticsId = 'G-XXXXXXXXXX';

/* ---------------------------------------------------------------------------
 * Brand colors (from build-plan design.colors)
 * ------------------------------------------------------------------------- */
$colors = [
    'primary'   => '#252525',
    'secondary' => '#66717A',
    'accent'    => '#E87518',
];

/* ---------------------------------------------------------------------------
 * Company age
 * ------------------------------------------------------------------------- */
$yearsInBusiness = 43;
$yearEstablished = (int) date('Y') - $yearsInBusiness;      // 43 years in business

/* ---------------------------------------------------------------------------
 * CSS cache-bust — SINGLE source of truth. Pages MUST NOT set their own.
 * Bump this on every framework.css change.
 * ------------------------------------------------------------------------- */
$cssVersion = '1';

/* ---------------------------------------------------------------------------
 * Forms
 * ------------------------------------------------------------------------- */
$formAction = 'https://db.pageone.cloud/functions/v1/leads/aga-welding-fabrication';

/* ---------------------------------------------------------------------------
 * Google Business Profile / geo (from build-plan integrations)
 * ------------------------------------------------------------------------- */
$gbpMapEmbed = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4035.0339425584243!2d-98.3296381!3d29.340730399999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x865cfaa0315f293d%3A0xe28a79947e84152e!2sAGA%20Welding%20%26%20Fabrication!5e1!3m2!1sen!2sph!4v1790374677302!5m2!1sen!2sph" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe>';
$geo = [
    'lat' => 29.3407304,
    'lng' => -98.3296381,
];
$gbpPlaceId = '';

/* ---------------------------------------------------------------------------
 * Lead attribution (v6.3) — MUST be last. Sets first-touch cookie and
 * provides p1_attribution_fields(). Never edit includes/attribution.php.
 * ------------------------------------------------------------------------- */
require_once __DIR__ . '/attribution.php';
