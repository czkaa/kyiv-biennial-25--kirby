<?php
/* SITE DATA */
/** @var \Kirby\Cms\App $kirby */
/** @var \Kirby\Cms\Site $site */
include_once(__DIR__ . "/_balanceImages.php");

// First get the languages array as you have it
$languages = array_map(function ($language) {
  return [
    'code' => $language['code'] ?? '',
    'iso' => isset($language['locale'][6]) ? str_replace('_', '-', $language['locale'][6]) : '',
    'name' => $language['name'] ?? '',
    'translations' => [], // initially empty
    'default' => $language['default']
  ];
}, $kirby->languages()->toArray());

// Now let's find the first pages with the specified templates
$preistragendePage = $site->find('preistragende');
$infoPage = $site->find('info');

// If these pages exist, add their translations to the respective language arrays
if($preistragendePage && $infoPage) {
  foreach($languages as &$language) {
    $code = $language['code'];
    
    // Add translations for the "preistragende" page
    $language['translations']['preistragende'] = [
      'title' => $preistragendePage->content($code)->title()->value(),
      'uri' => $preistragendePage->uri($code)
    ];
    
    // Add translations for the "info" page
    $language['translations']['info'] = [
      'title' => $infoPage->content($code)->title()->value(),
      'uri' => $infoPage->uri($code)
    ];
  }
}



// Process intro images
$portraitImages = [];
$landscapeImages = [];
$allImages = [];

// Assuming we're getting images from preistragende page's children
if ($preistragendePage = page('preistragende')) {
  foreach($preistragendePage->children()->listed() as $child) {
    if($child->gallery()->isNotEmpty()) {
      $files = $child->gallery()->toFiles();
      $index = 0;
      foreach($files as $fileIndex => $file) {
        // Calculate the ratio to determine orientation
        $width = $file->width();
        $height = $file->height();
        $ratio = $width / $height;
        
        // Create the image data object
        $imageData = [
          'url' => $file->thumb(['format' => 'webp'])->url(),
          'width' => $width,
          'height' => $height,
          'ratio' => $file->ratio(),
          'alt' => $file->alt()->value() ?? $file->filename(),
          'srcset' => $file->srcset([
            '600w' => ['width' => 200, 'format' => 'webp', 'quality' => 85],
            '900w' => ['width' => 250, 'format' => 'webp', 'quality' => 85],
            '1500w' => ['width' => 350, 'format' => 'webp', 'quality' => 85],
            '2000w' => ['width' => 500, 'format' => 'webp', 'quality' => 85],
            '2700w' => ['width' => 750, 'format' => 'webp', 'quality' => 85],
          ]),
          'srcsetIntro' => $file->srcset([
            '500w' => ['width' => 250, 'format' => 'webp', 'quality' => 90],
            '700w' => ['width' => 350, 'format' => 'webp', 'quality' => 90],
            '900w' => ['width' => 450, 'format' => 'webp', 'quality' => 90],
            '1200w' => ['width' => 800, 'format' => 'webp', 'quality' => 90],
            '1500w' => ['width' => 900, 'format' => 'webp', 'quality' => 90],
            '1800w' => ['width' => 1200, 'format' => 'webp', 'quality' => 90],
            '2200w' => ['width' => 1100, 'format' => 'webp', 'quality' => 90],
            '2700w' => ['width' => 1400, 'format' => 'webp', 'quality' => 90],
          ]),
          'page' => [
            'uri' => $child->uri(),
            'slug' => $child->slug(),
            'title' => $child->title()->value()
          ],
          'imageIndex' => $index
        ];
        
        // Add to all images array
        $allImages[] = $imageData;
        $index++;
        
        // Add to orientation-specific arrays
        if ($ratio < 1) {
          $portraitImages[] = $imageData;
        } else {
          $landscapeImages[] = $imageData;
        }
      }
    }
  }
}

// Shuffle the all images array
shuffle($allImages);

// Balance the images into two columns
list($leftImages, $rightImages) = balanceImages($allImages);

$data = [
  'title' => $site->title()->value(),
    
  'headerPages' => $site->children()->listed()->filterBy('template', '!=', 'home')->filterBy('template', '!=', 'info')->map(function ($child) use ($kirby) {
      $currentLang = $kirby->language()->code();
      $availableLangs = ['en', 'de'];
      $otherLang = array_values(array_filter($availableLangs, function($lang) use ($currentLang) {
          return $lang !== $currentLang;
      }))[0];
      return [
        'uri' => $child->uri(),
        'title' => $child->title()->value(),
        'translatedTitle' => $child->content($otherLang)->title()->value(),
        'slug' => $child->slug(),
      ];
  })->values(),

  'footerPages' => $site->children()->template('info')->first()->children()->map(function ($child) {
    return [
      'uri' => $child->uri(),
      'title' => $child->title()->value(),
      'slug' => $child->slug(),
    ];
  })->values(),

  'introImages' => [
    'portrait' => $portraitImages,
    'landscape' => $landscapeImages,
  ],


  'galleryImages' => [
    'left' => $leftImages,
    'right' => $rightImages,
  ],

  'seo' => [
    'image' => $site->seoimage()->toFile() ? $site->seoimage()->first()->toFile()->url() 
      : null,
    'description' => $site->seodescription()->value(),
    'title' => $site->seotitle()->value(),
    'keywords' => $site->seokeywords()->value(),
  ],

  'languages' => array_values($languages), 
];

echo \Kirby\Data\Json::encode($data);
?>