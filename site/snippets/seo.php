<?php
// site/snippets/seo.php

// Get default values from site config
$site_title = $site->title()->escape();
$site_description = $site->description()->escape();

// Page-specific SEO
$seo_title = $page->seo_title()->isNotEmpty() 
  ? $page->seo_title()->escape() 
  : $page->title()->escape();

$seo_description = $page->seo_description()->isNotEmpty() 
  ? $page->seo_description()->escape() 
  : ($page->intro()->isNotEmpty() 
    ? $page->intro()->excerpt(160)->escape() 
    : $site_description);

$seo_keywords = $page->seo_keywords()->isNotEmpty() 
  ? $page->seo_keywords()->escape() 
  : $site->keywords()->escape();

// Open Graph image
$og_image = $page->og_image()->toFile();
if(!$og_image) {
  $og_image = $page->images()->first();
}
if(!$og_image) {
  $og_image = $site->images()->first();
}
?>

<title><?= $seo_title ?> | <?= $site_title ?></title>
<meta name="description" content="<?= $seo_description ?>">
<?php if($seo_keywords->isNotEmpty()): ?>
<meta name="keywords" content="<?= $seo_keywords ?>">
<?php endif ?>

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?= $page->url() ?>">
<meta property="og:title" content="<?= $seo_title ?>">
<meta property="og:description" content="<?= $seo_description ?>">
<?php if($og_image): ?>
<meta property="og:image" content="<?= $og_image->url() ?>">
<?php endif ?>

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?= $page->url() ?>">
<meta property="twitter:title" content="<?= $seo_title ?>">
<meta property="twitter:description" content="<?= $seo_description ?>">
<?php if($og_image): ?>
<meta property="twitter:image" content="<?= $og_image->url() ?>">
<?php endif ?>

<!-- Canonical URL -->
<link rel="canonical" href="<?= $page->url() ?>">