<?php
/**
 * Simple Route Translations API
 * Outputs route translations for the headless frontend
 */

// Initialize result array with languages
$result = [];
$languages = $kirby->languages();

// Map each language's basic info
foreach ($languages as $language) {
  $langCode = $language->code();
  $result[$langCode] = [
    'code' => $langCode,
    'name' => $language->name(),
    'default' => $language->isDefault(),
    'routes' => [] // Will hold route translations
  ];
}

// Process all pages recursively
function processPages($pages, &$result) {
  foreach ($pages as $page) {
    if (!$page->isListed()) continue;
    
    // For each page, get its URI in all languages
    $translations = [];
    foreach (array_keys($result) as $langCode) {
      $translations[$langCode] = $page->uri($langCode);
    }
    
    // Add translations to each language's routes map
    foreach ($translations as $lang => $uri) {
      $result[$lang]['routes'][$uri] = $translations;
    }
    
    // Process children
    processPages($page->children()->listed(), $result);
  }
}

// Process all site pages
processPages($site->children(), $result);

// Output as JSON
header('Content-Type: application/json');
echo json_encode($result);