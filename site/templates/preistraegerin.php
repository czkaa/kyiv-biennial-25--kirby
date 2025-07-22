<?php
/** @var \Kirby\Cms\Page $page */
include_once(__DIR__ . "/blocks/_blocks.php");

// Prepare gallery data if it exists
$gallery = $page->gallery()->isNotEmpty()
  ? $page->gallery()->toFiles()->map(function ($image) {
      return [
        'url' => $image->thumb(['format' => 'webp'])->url(),
        'alt' => $image->alt()->value(),
        'caption' => $image->caption()->kt()->value(),
        'hasShowmore' => $image->hasshowmore()->value === 'true' ? true : false,
        'showmore' => $image->showmore()->isNotEmpty() ? $image->showmore()->kt()->value() : null,
        'width' => $image->width(),
        'height' => $image->height(),
        'thumb' => $image->resize(400)->url(),
        'ratio' => $image->ratio(),
        'srcset' => $image->srcset([
          '600w' => ['width' => 200, 'format' => 'webp', 'quality' => 85],
          '900w' => ['width' => 300, 'format' => 'webp', 'quality' => 85],
          '1000w' => ['width' => 400, 'format' => 'webp', 'quality' => 85],
          '1300w' => ['width' => 500, 'format' => 'webp', 'quality' => 85],
          '1800w' => ['width' => 600, 'format' => 'webp', 'quality' => 85],
          '2700w' => ['width' => 900, 'format' => 'webp', 'quality' => 85],
          '3600w' => ['width' => 1200, 'format' => 'webp', 'quality' => 85]
          ]),
        ];
    })->values()
  : null;

// Prepare portrait data if it exists
$portrait = $page->portrait()->toFile()
  ? [
      'url' => $page->portrait()->toFile()->thumb(['format' => 'webp'])->url(),
      'alt' => $page->portrait()->toFile()->alt()->value(),
      'ratio' => $page->portrait()->toFile()->ratio(),
      'width' => $page->portrait()->toFile()->width(),
      'caption' => $page->portrait()->toFile()->caption()->isNotEmpty() ?  $page->portrait()->toFile()->caption()->kt()->value() : null,
      'height' => $page->portrait()->toFile()->height(),
      'srcset' => $page->portrait()->toFile()->srcset([
        '600w' => ['width' => 200, 'format' => 'webp', 'quality' => 85],
        '900w' => ['width' => 300, 'format' => 'webp', 'quality' => 85],
        '1000w' => ['width' => 400, 'format' => 'webp', 'quality' => 85],
        '1300w' => ['width' => 500, 'format' => 'webp', 'quality' => 85],
        '1800w' => ['width' => 600, 'format' => 'webp', 'quality' => 85],
        '2700w' => ['width' => 900, 'format' => 'webp', 'quality' => 85],
        '3600w' => ['width' => 1200, 'format' => 'webp', 'quality' => 85]
      ]),
    ]
  : null;



// Compile the data
$data = [
    'meta' => [
    'title' => $site->title()->value(),
    'description' => $site->description()->value(),
    'uri' => $page->uri(),
    'template' => $page->template()->name()
  ],
  'id' => $page->id(),
  'template' => $page->template()->name(),
  'title' => $page->title()->value(),
  'gallery' => $gallery,
  'portrait' => $portrait,
  'blocks' => $page->blocks()->toBlocks()->isEmpty() ? null : $page->blocks()->toBlocks()->map(fn($block) => block($block))->values(),
  // 'exhibitions' => $page->exhibitions()->toBlocks()->isEmpty() ? null : $page->exhibitions()->toBlocks()->map(fn($block) => block($block))->values(),
  // 'prizes' =>  $page->prizes()->toBlocks()->isEmpty() ? null : $page->prizes()->toBlocks()->map(fn($block) => block($block))->values(),
  // 'judging' => $page->judging()->toBlocks()->isEmpty() ? null : $page->judging()->toBlocks()->map(fn($block) => block($block))->values(),
];

echo json_encode($data);