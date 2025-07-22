<?php
  $content = [
    'logos' => $block->logos()->isNotEmpty()
  ? $block->logos()->toFiles()->map(function ($image) {
      return [
        'url' => $image->thumb(['format' => 'webp'])->url(),
        'alt' => $image->alt()->value(),
        'width' => $image->width(),
        'height' => $image->height(),
        'ratio' => $image->ratio(),
        'srcset' => $image->srcset([
            '900w' => ['width' => 200, 'format' => 'webp', 'quality' => 85],
            '1800w' => ['width' => 300, 'format' => 'webp', 'quality' => 85],
            '2700w' => ['width' => 400, 'format' => 'webp', 'quality' => 85],
            '3600w' => ['width' => 800, 'format' => 'webp', 'quality' => 85]
          ]),
        ];
    })->values()
  : null
  ];
?>
