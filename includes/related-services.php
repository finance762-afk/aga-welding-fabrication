<?php
/**
 * includes/related-services.php — "Other Services You May Need" 3-card block.
 * Renders photo service cards (required-components compliant) for related pages.
 *
 * Expects (set before include):
 *   $relatedSlugs  — array of 3 service slugs to show
 * Uses globals: $services
 *
 * Photos reuse each service's on-disk hero photo. Alt text honestly describes
 * the photo (real AGA shop fabrication/welding photos), never a false claim.
 */

$relatedImageMap = [
    'steel-fabrication'             => 'structural-steel-beams',
    'structural-steel-fabrication'  => 'steel-beam-fabrication',
    'sheet-metal-fabrication'       => 'custom-metal-pipe-support',
    'metal-cutting'                 => 'metal-cutting-bandsaw',
    'metal-bending'                 => 'custom-steel-fabrication',
    'metal-assembly'                => 'welded-steel-stands',
    'metal-repair'                  => 'welding-fabrication-shop',
    'structural-metal-repair'       => 'steel-beam-fabrication',
    'equipment-metal-repair'        => 'welding-steel-beam-san-antonio',
    'handrails-railings'            => 'custom-metal-pipe-support',
    'staircases'                    => 'structural-steel-frame',
    'awnings'                       => 'structural-steel-frame',
    'racks-storage-solutions'       => 'welded-steel-stands',
    'custom-metalwork'              => 'custom-steel-fabrication',
    'general-repairs-modifications' => 'welding-fabrication-shop',
    'additional-services'           => 'welding-steel-beam-san-antonio',
];

$relatedIconMap = [
    'steel-fabrication'             => 'layers',
    'structural-steel-fabrication'  => 'building-2',
    'sheet-metal-fabrication'       => 'ruler',
    'metal-cutting'                 => 'scissors',
    'metal-bending'                 => 'wrench',
    'metal-assembly'                => 'hammer',
    'metal-repair'                  => 'flame',
    'structural-metal-repair'       => 'shield-check',
    'equipment-metal-repair'        => 'truck',
    'handrails-railings'            => 'route',
    'staircases'                    => 'milestone',
    'awnings'                       => 'home',
    'racks-storage-solutions'       => 'clipboard-list',
    'custom-metalwork'              => 'pen-tool',
    'general-repairs-modifications' => 'wrench',
    'additional-services'           => 'flame',
];

$relatedAltMap = [
    'structural-steel-beams'         => 'Fabricated structural steel I-beams at the AGA shop in San Antonio',
    'steel-beam-fabrication'         => 'Structural steel beams being fabricated at AGA Welding & Fabrication',
    'custom-metal-pipe-support'      => 'Custom fabricated steel pipe support built by AGA in San Antonio',
    'metal-cutting-bandsaw'          => 'Band saw cutting steel stock in the AGA San Antonio shop',
    'custom-steel-fabrication'       => 'Custom steel fabrication on the AGA shop floor in San Antonio',
    'welded-steel-stands'            => 'Welded steel stands fabricated by AGA Welding & Fabrication',
    'welding-fabrication-shop'       => 'Welding and metal work inside the AGA San Antonio shop',
    'welding-steel-beam-san-antonio' => 'Certified welder joining a structural steel beam in San Antonio',
    'structural-steel-frame'         => 'Steel framework fabricated in-house at the AGA San Antonio shop',
];

$relTint = 1;
foreach ($relatedSlugs as $relSlug):
    $relSvc = null;
    foreach ($services as $relS) { if ($relS['slug'] === $relSlug) { $relSvc = $relS; break; } }
    if (!$relSvc) continue;
    $relImg  = $relatedImageMap[$relSlug] ?? 'custom-steel-fabrication';
    $relAlt  = $relatedAltMap[$relImg] ?? ('Steel fabrication by AGA Welding & Fabrication in San Antonio');
    $relIcon = $relatedIconMap[$relSlug] ?? 'flame';
?>
<article class="service-card-with-image card-tint-<?php echo $relTint; ?> reveal-up reveal-delay-<?php echo $relTint; ?>">
  <div class="service-card__image">
    <picture>
      <source type="image/avif" srcset="/assets/images/<?php echo $relImg; ?>-480.avif 480w, /assets/images/<?php echo $relImg; ?>-960.avif 960w" sizes="(max-width: 768px) 100vw, 340px">
      <img src="/assets/images/<?php echo $relImg; ?>.jpg"
           srcset="/assets/images/<?php echo $relImg; ?>-480.webp 480w, /assets/images/<?php echo $relImg; ?>-960.webp 960w"
           sizes="(max-width: 768px) 100vw, 340px"
           alt="<?php echo htmlspecialchars($relAlt); ?>"
           width="600" height="360" loading="lazy" decoding="async">
    </picture>
  </div>
  <div class="service-card__body">
    <div class="service-card__icon"><?php echo icon($relIcon, 22); ?></div>
    <h3><?php echo htmlspecialchars($relSvc['name']); ?></h3>
    <p class="service-card__desc"><?php echo htmlspecialchars($relSvc['description']); ?></p>
    <a href="/services/<?php echo $relSvc['slug']; ?>/" class="service-card__cta">Learn more</a>
  </div>
</article>
<?php $relTint++; endforeach; ?>
