<?php
// site/plugins/text-block/index.php

Kirby::plugin('your-project/customheading', [
  // Register the block blueprint
  'blueprints' => [
    'blocks/customheading' => kirby()->root('blueprints') . '/blocks/customheading.yml'
  ],
  
  // Register the block snippet for frontend rendering
  'snippets' => [
    'blocks/customheading' => __DIR__ . '/snippets/blocks/customheading.php'
  ],
  
  // Register assets for the Panel
  'assets' => [
    'css' => [
      'index.css'
    ],
    'js' => [
      'index.js'
    ]
  ]
]);